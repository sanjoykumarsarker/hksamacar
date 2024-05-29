<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;
use App\Models\Media;
use CodeIgniter\API\ResponseTrait;

class ImageController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        // $rules = [
        //     'alt' => 'permit_empty|string',
        //     'file' => [
        //         'uploaded[file]',
        //         'is_image[file]',
        //         'mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
        //     ],
        // ];
        // if (!$this->validate($rules)) return $this->fail($this->validator->getErrors(), 400);

        $image = $this->request->getFile('file');
        $model = new Media();
        $location = $model->imageBodyLocation;
        try {
            if ($image->isValid()) {
                $imageName = $image->getRandomName();
                $type = $image->getMimeType();
                $alt = pathinfo($image->getClientName(), PATHINFO_FILENAME);

                $image->move($location, $imageName);

                model('Media')->insert([
                    'user_id' => Auth::id(),
                    'location' => $location,
                    'name' => $imageName,
                    'alt' => $alt,
                    'type' => $type,
                ]);

                // $data = ['url' => base_url($location . $imageName), 'alt' => $alt, 'name' => $imageName];
                $data = ['location' => base_url($location . $imageName)];
                return $this->respond($data, 200);
            }
        } catch (\Throwable $th) {
            $data = ['msg' => $th->getMessage()];
            return $this->fail($data);
        }

        $data = ['msg' => 'Image Not Found, Try Again'];
        return $this->fail($data);
    }

    public function upload()
    {
        // reset($_FILES);
        // $file = current($_FILES);
        // move_uploaded_file();
    }
}
