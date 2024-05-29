<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;
use App\Models\User;
use CodeIgniter\View\Table;

class UserController extends BaseController
{
    public function index()
    {
        $tableModel = new Table();
        $userModel = new User();
        $users = $userModel->select('id,name,email,active,role,created_at')->paginate(20);
        $tableModel->setHeading(['ID', 'Name', 'Email', 'Status', 'Role', 'Created', 'Action']);
        $template = [
            'table_open' => '<div class="table-wrapper table-responsive">
                            <table class="table table-hover">',
            'heading_cell_start' => '<th class="border-gray-200">',
            'table_close' => '</table></div>',
        ];

        $tableModel->setTemplate($template);
        $currentUserId = Auth::id();
        foreach ($users as $user) {
            $active = $user['active'] === '1' ? 'active' : 'inactive';
            $class =  $user['active'] === '1' ? 'bg-success' : 'bg-danger';
            $url =  url_to('admin.users.toggle', $user['id']);

            // $delete_url =  url_to('admin.users.delete', $user['id']);
            $edit_url =  url_to('admin.users.edit', $user['id']);
            $isCurrent = $currentUserId == $user['id'];
            $status = $isCurrent ? '' : ['data' => "<a href='$url'><button class='badge $class'>$active</button></a>"];
            $buttons = $isCurrent ? '' : ['data' => "<a href='$edit_url' class='btn py-0 btn-sm btn-info'>Edit</a>"];
            $tableModel->addRow([$user['id'], $user['name'], $user['email'], $status, strtoupper($user['role']), $user['created_at'], $buttons]);
        }

        $table = $tableModel->generate();
        $pager = $userModel->pager;
        return view('admin/users/index', compact('table', 'pager'));
    }

    public function new()
    {
        if (!$this->authorize('add_user')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        helper(['form', 'input']);
        $roles = model('RoleModel')->all();
        return view('admin/users/new', compact('roles'));
    }

    public function edit($id)
    {
        if (!$this->authorize('update_user')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        helper(['form', 'input']);
        $user = model('User')->find($id);

        $roles = model('RoleModel')->all();

        return view('admin/users/edit', compact('user', 'roles'));
    }

    public function toggle($id)
    {
        if (!$this->authorize('update_user')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        $model = new User();
        $user = $model->find($id);
        if (!$user) return redirect()->back()->with('msg', 'USER not found!');
        $model->update($id, ['active' => !$user['active']]);
        return redirect()->back()->with('msg', 'Status Updated Successfully!');
    }

    public function save()
    {
        if (!$this->authorize('add_user')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
        ];
        if (!$this->validate($rules)) return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        $data = [
            'name' => trim($this->request->getPost('name')),
            'email' => trim($this->request->getPost('email')),
            'password' => password_hash(trim($this->request->getPost('password')), PASSWORD_DEFAULT),
            'active' => $this->request->getPost('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'verified' => 1
        ];

        $role = $this->request->getPost('role');

        if ($role) {
            $data['role_id'] = (int) $role;
            $data['role'] = model('RoleModel')->all($role);
        }

        try {
            $user = model('User')->insert($data);
            return redirect()->back()->with('msg', 'New User Successfully Added');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('msg', $th->getMessage());
        }
    }

    public function update($id)
    {
        return 'Hello';
        if(service('auth')::id == $id) return redirect()->back()->with('msg', "Permission denied for this operation.");
        if (!$this->authorize('update_user')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => "required|min_length[4]|max_length[100]|valid_email|is_unique[users.email,id,$id]",
        ];
        if (!$this->validate($rules)) return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        $data = [
            'name' => trim($this->request->getPost('name')),
            'email' => trim($this->request->getPost('email')),
            'active' => $this->request->getPost('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'verified' => $this->request->getPost('verified', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
        ];

        $role = $this->request->getPost('role');
        $password = $this->request->getPost('password');

        if ($role) {
            $data['role_id'] = (int) $role;
            $data['role'] = model('RoleModel')->all($role);
        }

        if ($password) {
            $data['password'] = password_hash(trim($password), PASSWORD_DEFAULT);
        }

        try {
            $user = model('User')->update($id, $data);
            return redirect()->back()->with('msg', 'User Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('msg', $th->getMessage());
        }
    }
}
