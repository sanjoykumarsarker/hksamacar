<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;
use App\Models\Page;

class PageController extends BaseController
{
    public function index($slug)
    {
        helper('text');
        if (file_exists(APPPATH . "Views/pages/$slug.php")) {
            return view("pages/$slug");
        } else {
            $pageModel = new Page();
            $page = $pageModel->where('slug', $slug)->first();
            if (!$page) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            return view('pages/index', compact('page'));
        }
    }

    public function manage()
    {
        $pageModel = new Page();
        $q = trim($this->request->getGet('q'));

        if ($q) {
            $pageModel = $pageModel->like('title', $q);
        }

        $pages = $pageModel->orderBy('id', 'desc')->paginate(20);
        $pager = $pageModel->pager;
        return view('admin/pages/index', compact('pages', 'pager'));
    }

    public function toggle($id)
    {
        $pageModel = new Page();
        $page = $pageModel->find($id);
        if (!$page) return redirect()->back()->with('msg', 'PAGE not found!');
        $pageModel->update($id, ['active' => !$page->active]);
        return redirect()->back()->with('msg', 'Status Updated Successfully!');
    }

    public function new()
    {
        helper(['form', 'input']);
        return view('admin/pages/new');
    }

    public function rules($except = null)
    {
        $rules = [
            'title' => 'required|min_length[5]|max_length[255]',
            'slug' => 'required|min_length[5]|max_length[255]|is_unique[posts.slug]',
            'body' => 'required'
        ];
        if (isset($except) && is_array($except)) {
            $excepts = [];
            foreach ($except as $value) {
                $excepts[$value] = 0;
            }
            return array_diff_key($rules, $excepts);
        }

        return $rules;
    }

    public function save()
    {
        // dd($this->request->getFiles('img'));
        if (!$this->validate($this->rules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'title' => trim($this->request->getPost('title')),
            'slug' => trim($this->request->getPost('slug')),
            'body' => trim($this->request->getPost('body')),
            'fullpage' =>  $this->request->getPost('fullpage', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'active' =>  $this->request->getPost('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'comment_active' => $this->request->getPost('comment_active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'user_id' => Auth::id()
        ];
        $pageModel = new Page();
        $pageModel->insert($data);
        return redirect()->to(url_to('admin.pages.new'))->with('msg', 'New Page Created Successfully!');
    }

    public function edit($id)
    {
        helper(['form', 'input']);
        $page = model('Page')->find($id);
        if (!$page) return redirect()->back()->with('msg', 'PAGE not found!');
        return view('admin/pages/edit', compact('page'));
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'title' => trim($this->request->getPost('title')),
            'slug' => trim($this->request->getPost('slug')),
            'body' => trim($this->request->getPost('body')),
            'fullpage' =>  $this->request->getPost('fullpage', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'active' =>  $this->request->getPost('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'comment_active' => $this->request->getPost('comment_active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
        ];
        $success = model('Page')->save($data);
        $msg = $success ? 'Page Updated Successfully!' : 'Sorry! Try Again';
        return redirect()->to(url_to('admin.pages'))->with('msg', $msg);
    }
}
