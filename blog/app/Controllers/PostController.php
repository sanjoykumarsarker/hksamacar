<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;

class PostController extends BaseController
{
    public function index()
    {
        helper('text');
        $model = new Post();

        $q = trim($this->request->getGet('q'));
        if ($q) {
            $model = $model->like('title', $q);
        }

        $posts = $model->orderBy('posts.id', 'desc')
            // ->select('posts.*, c.name as category')
            // ->join('categories c', 'c.id=posts.category_id')
            ->paginate(20, 'posts');
        $pager = $model->pager;
        // $details = (object) ['total' => $pager->getTotal(), 'per_page' => $pager->getPerPage()];
        $details = (object) ['total' => 2000, 'per_page' => $pager->getPerPage()];
        return view('admin/posts/index', compact('posts', 'pager', 'details'));
    }

    public function new()
    {
        helper(['form', 'input']);
        $categories = $this->categories();
        return view('admin/posts/new', compact('categories'));
    }

    public function categories()
    {
        $cache = \Config\Services::cache();
        return $cache->remember('categories', 24 * 7 * 60 * 60, function () {
            return (new Category())->active()->findAll();
        });
    }

    private function rules($except = null)
    {
        $rules = [
            'title' => 'required|min_length[5]|max_length[255]',
            'slug' => 'required|min_length[5]|max_length[255]|is_unique[posts.slug]',
            'image' => 'permit_empty|uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp,image/gif]|max_size[image,300]',
            'category' => 'numeric',
            'tags' => 'string',
            'status' => 'string',
            'youtube-url' => 'permit_empty|valid_url_strict',
            // 'created_at' => 'permit_empty|valid_date',
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


    public function handleImage($image, $model)
    {
        helper('text');
        $location = $model->imageLocation;
        // $imageName = $image->getRandomName();
        $filename = pathinfo($image->getClientName(), PATHINFO_FILENAME);
        $filename = $model->cleanURL($filename);
        $ext = pathinfo($image->getClientName(), PATHINFO_EXTENSION);
        // $ext = $image->guessExtension();
        $type = $image->getMimeType();
        $randomString = random_string('alpha');
        $imageName = "hksamacar-$filename-$randomString.$ext";
        $image->move($location, $imageName);
        $model->createThumbnailImage($imageName);

        $media = model('Media')->insert([
            'user_id' => Auth::id(),
            'location' => $location,
            'name' => $imageName,
            'alt' => $filename,
            'type' => $type,
        ]);

        return $media;
    }

    public function handleLink($link, $model, $title)
    {
        $location = $model->imageLocation;
        $imageName = $model->downloadYouTubeThumbnailImage($link, 'MAXIMUM', null, $location);

        $media = model('Media')->insert([
            'user_id' => Auth::id(),
            'location' => $location,
            'name' => $imageName,
            'alt' => $title,
            'type' => 'image/jpg',
        ]);

        $model->createThumbnailImage($imageName);
        return $media;
    }

    public function save()
    {

        if (!$this->validate($this->rules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postModel = new Post();

        $postData = [
            'title' => trim($this->request->getVar('title')),
            'slug' => trim($this->request->getVar('slug')),
            'body' => trim($this->request->getVar('body')),
            'tags' => trim($this->request->getVar('tags')),
            'active' => $this->request->getVar('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'comment_active' => $this->request->getVar('comment_active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'category_id' => $this->request->getVar('category', FILTER_VALIDATE_INT),
            'user_id' => Auth::id(),
            'status' => $this->request->getVar('status'),
            'author' => trim($this->request->getVar('author')),
            // 'created_at' => $this->request->getVar('date') ?? date('D, d M Y H:i:s')
        ];


        try {
            // Image Upload
            $link =  $this->request->getVar('youtube-url', FILTER_VALIDATE_URL);
            $image = $this->request->getFile('image');
            $media = null;
            if ($image->isValid() && !$image->hasMoved()) {
                $media = $this->handleImage($image, $postModel);
            }

            if ($link) {
                $postData['link'] = $link;
                $media = $this->handleLink($postData['link'], $postModel, $postData['title']);
            }

            if (isset($media)) {
                $postData['media_id'] = $media;
                if ($postModel->insert($postData)) {
                    return redirect()->to(url_to('admin.posts.new'))->with('msg', 'Post Created Successfully');
                } else {
                    return redirect()->back()->withInput()->with('errors', $postModel->errors());
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('errors', $th->getMessage());
        }
    }

    public function edit($id)
    {
        helper(['input', 'form']);
        $postModel = new Post();
        $categories = $this->categories();
        $post = $postModel->select("posts.*,media.name as image")
            ->where("posts.id", $id)
            ->join('media', 'media.id=posts.media_id')
            ->first();
        return view('admin/posts/edit', compact('post', 'categories'));
    }

    public function toggle(int $id)
    {
        $postModel = new Post();
        $post = $postModel->find($id);
        if (!$post) return redirect()->back()->with('msg', 'POST not found!');
        $postModel->update($id, ['active' => !$post->active]);
        return redirect()->back()->with('msg', 'Status Updated Successfully!');
    }

    public function update($id)
    {
        $id = (int) $id;
        $rules = $this->rules(['slug']);
        $rules['slug'] = "required|min_length[5]|max_length[255]|is_unique[posts.slug,id,$id]";

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'title' => trim($this->request->getVar('title')),
            'slug' => trim($this->request->getVar('slug')),
            'body' => trim($this->request->getVar('body')),
            'tags' => trim($this->request->getVar('tags')),
            'active' => $this->request->getVar('active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'comment_active' => $this->request->getVar('comment_active', FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'category_id' => $this->request->getVar('category', FILTER_VALIDATE_INT),
            'status' => $this->request->getVar('status'),
            'author' => trim($this->request->getVar('author')),
        ];

        $link = $this->request->getVar('youtube-url', FILTER_VALIDATE_URL);
        $postModel = new Post();
        try {
            $post = $postModel->find($id);
            $deleteMedia = false;
            // $this->db->transStart();
            if ($link && $link !== $post->link) {
                $media = $this->handleLink($link, $postModel, $data['title']);
                $data['link'] = $link;
                $data['media_id'] = $media;
                $deleteMedia = true;
            }

            $image = $this->request->getFile('image');

            if (isset($image) && $image->isValid() && !$image->hasMoved()) {
                $media = $this->handleImage($image, $postModel);
                $data['media_id'] = $media;
                $deleteMedia = true;
            }

            $success = $postModel->save($data);

            if ($success && $deleteMedia) {
                model('Media')->delete($post->media_id);
            }

            // $this->db->transComplete();
            $msg = $success ? 'Post Updated Successfully!' : 'Sorry! Try Again';
            return redirect()->to(url_to('admin.posts'))->with('msg', $msg);
        } catch (\Throwable $th) {
            return redirect()->back()->with('msg', $th->getMessage());
        }
    }
}
