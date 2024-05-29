<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Post;
use CodeIgniter\View\Table;

class CategoryController extends BaseController
{
    public function index()
    {
        $tableModel = new Table();
        $categoryModel = new Category();
        $categories = $categoryModel->select('id,name,active,created_at')->asArray()->paginate(20);
        $tableModel->setHeading(['ID', 'Name', 'Status', 'Created', 'Action']);
        $template = [
            'table_open' => '<div class="table-wrapper table-responsive">
                            <table class="table table-hover">',
            'heading_cell_start' => '<th class="border-gray-200">',
            'table_close' => '</table></div>',
        ];

        $tableModel->setTemplate($template);
        $csrf = csrf_field();
        foreach ($categories as $user) {
            $active = $user['active'] === '1' ? 'active' : 'inactive';
            $class =  $user['active'] === '1' ? 'bg-success' : 'bg-danger';
            $url =  url_to('admin.category.toggle', $user['id']);
            $delete_url =  url_to('admin.category.delete', $user['id']);
            $edit_url =  url_to('admin.category.edit', $user['id']);

            $status = ['data' => "<a href='$url'><button class='badge $class'>$active</button></a>"];
            $buttons = ['data' => "<a href='$edit_url' class='btn py-0 mr-1 btn-sm btn-info'>Edit</a>
            <form class='d-inline' method='post' action='$delete_url'>$csrf<button type='submit' class='btn btn-sm py-0 btn-danger'>Delete</button></form>"];
            $tableModel->addRow([$user['id'], $user['name'], $status, $user['created_at'], $buttons]);
        }

        $table = $tableModel->generate();
        $pager = $categoryModel->pager;
        return view('admin/category/index', compact('table', 'pager'));
    }

    public function new()
    {
        if (!$this->authorize('add_category'))  return $this->denied();
        helper(['form', 'input']);
        return view('admin/category/new');
    }

    public function edit($id)
    {
        if (!$this->authorize('update_category'))  return $this->denied();
        helper(['form', 'input']);
        $category = (new Category())->find($id);
        return view('admin/category/edit', compact('category'));
    }

    public function toggle($id)
    {
        if (!$this->authorize('update_category'))  return $this->denied();
        $model = new Category();
        $category = $model->find($id);
        if (!$category)  return $this->denied('CATEGORY not found!');
        $model->update($id, ['active' => !$category['active']]);
        return $this->denied('Status Updated Successfully!');
    }

    public function save()
    {
        if (!$this->authorize('add_category'))  return $this->denied();
        $rules = ['name' => 'required|min_length[3]|max_length[100]|is_unique[categories.name]'];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => trim($this->request->getVar('name')),
            'active' => $this->request->getVar('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
        ];

        try {
            (new Category())->insert($data);
            return $this->denied('Category Saved Successfully!');
        } catch (\Throwable $th) {
            return $this->denied($th->getMessage());
        }
    }

    public function update($id)
    {
        if (!$this->authorize('update_category'))  return $this->denied();

        $rules = ['name' => "required|min_length[3]|max_length[100]|is_unique[categories.name,id,$id]"];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => trim($this->request->getVar('name')),
            'active' => $this->request->getVar('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
        ];

        try {
            (new Category())->update($id, $data);
            return $this->denied('Category Updated Successfully!');
        } catch (\Throwable $th) {
            return $this->denied($th->getMessage());
        }
    }

    public function destroy($id)
    {
        if (!$this->authorize('delete_category'))  return $this->denied();
        try {
            $model = new Category();
            $category = $model->find($id);
            if (!$category)  return $this->denied('Category Not Found!');
            // $posts = (new Post())->asArray()->where('category_id', $category->id)->select('COUNT(id) as total')->first();
            $posts = (new Post())->asArray()->where('category_id', $id)->countAllResults();

            if ($posts)  return $this->denied("This Category has $posts posts you cannot delete it!");
            $model->delete($id);
            return  $this->denied('Category Deleted Successfully!');
        } catch (\Throwable $th) {
            return  $this->denied($th->getMessage());
        }
    }
}
