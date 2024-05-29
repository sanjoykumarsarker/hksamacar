<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;
use App\Models\RoleModel;
use CodeIgniter\View\Table;

class PermissionController extends BaseController
{
    public function index()
    {
        $tableModel = new Table();
        $roles = model('RoleModel')->all();
        $template = [
            'table_open' => '<div class="table-wrapper table-responsive">
                            <table class="table table-hover">',
            'heading_cell_start' => '<th class="border-gray-200">',
            'table_close' => '</table></div>',
        ];

        $tableModel->setTemplate($template);
        $tableModel->setHeading(['ID', 'Name', 'Description', 'Action']);
        $csrf = csrf_field();
        foreach ($roles as $role) {
            $edit_url =  url_to('admin.roles.edit', $role['id']);
            $delete_url =  url_to('admin.roles.delete', $role['id']);
            $buttons = in_array($role['name'], ['superadmin', Auth::role()]) ? '' : ['data' => "<a href='$edit_url' class='btn mr-1 py-0 btn-sm btn-info'>Edit</a>
            <form class='d-inline' method='post' action='$delete_url'>$csrf<button type='submit' class='btn btn-sm py-0 btn-danger'>Delete</button></form>"];
            $tableModel->addRow([$role['id'], $role['name'], $role['description'],  $buttons]);
        }
        $table = $tableModel->generate();
        return view('admin/roles/index', compact('table'));
    }

    public function manage($id)
    {
        $permissions = $this->request->getVar('permissions');
        $role_id = (int) $id;

        $all_permissions = model('PermissionModel')->all();
        $user_permissions = model('User')->permissions($role_id);

        $permissions_added = array_diff($permissions, $user_permissions);
        $permissions_removed = array_diff($user_permissions, $permissions);

        $values_to_remove = array_values($permissions_removed);
        $values_to_save = array_values($permissions_added);

        $keys_to_remove = [];
        $keys_to_save = [];

        foreach ($all_permissions as  $perms) {
            if (in_array($perms['name'], $values_to_remove)) {
                $keys_to_remove[] = (int) $perms['id'];
            } elseif (in_array($perms['name'], $values_to_save)) {
                $keys_to_save[] = [
                    'role_id' => $role_id,
                    'permission_id' => (int) $perms['id']
                ];
            }
        }

        if (count($keys_to_remove)) {
            $remove = model('RolePermissionsModel')
                ->whereIn('permission_id', $keys_to_remove)
                ->where('role_id', $role_id)
                ->delete();
        }

        if (count($keys_to_save)) {
            $update = model('RolePermissionsModel')->insertBatch($keys_to_save);
        }


        // if (!$this->authorize('manage_permission')) return redirect()->back()->with('msg', "Permission denied for this operation.");

        return redirect()->back()->with('msg', 'Permissions Updated Successfully');
    }

    public function new()
    {
        if (!$this->authorize('add_role')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        helper(['form', 'input']);
        return view('admin/roles/new');
    }

    public function edit($id)
    {
        if (!$this->authorize('update_role')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        helper(['form', 'input']);
        $model = new RoleModel();
        $role = $model->find($id);

        $all_permissions = model('PermissionModel')->all();

        $permissions = [];
        foreach ($all_permissions as $permission) {
            $splitted = explode('_', $permission['name']);
            $permissions[end($splitted)][] = $permission;
        }

        $role_permissions = model('User')->permissions($role['id']);

        return view('admin/roles/edit', compact('role', 'permissions', 'role_permissions'));
    }

    public function save()
    {
        if (!$this->authorize('add_role')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]|is_unique[roles.name]',
            'description' => 'permit_empty|min_length[3]|max_length[250]',
        ];

        if (!$this->validate($rules)) return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        $model = new RoleModel();
        $data = [
            'name' => strtolower(trim($this->request->getPost('name'))),
            'description' => $this->request->getPost('description'),
            'active' =>  $this->request->getPost('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
        ];
        try {
            $model->insert($data);
            return redirect()->back()->with('msg', 'New Role Successfully Added');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('msg', $th->getMessage());
        }
    }

    public function update($id)
    {
        if (!$this->authorize('update_role')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        $rules = [
            'name' => "required|min_length[3]|max_length[100]|is_unique[roles.name,id,$id]",
            'description' => 'permit_empty|min_length[3]|max_length[250]',
        ];

        if (!$this->validate($rules)) return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        $model = new RoleModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'active' =>  $this->request->getPost('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
        ];
        try {
            $model->update($id, $data);
            return redirect()->back()->with('msg', 'Role Successfully Updated');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('msg', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        if (!$this->authorize('delete_role')) return redirect()->back()->with('msg', "Permission denied for this operation.");
        try {
            $model = new RoleModel();
            $user = model('User')->where('role_id', $id)->countAllResults();
            if ($user) return redirect()->back()->with('msg', "The Role is assigned to $user users, You cannot delete it!");
            model('RolePermissionsModel')->where('role_id', $id)->delete();
            $model->delete($id);
            return redirect()->back()->with('msg', 'Role Successfully Deleted');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('msg', $th->getMessage());
        }
    }
}
