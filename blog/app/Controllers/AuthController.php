<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;
use App\Models\User;
// use CodeIgniter\API\ResponseTrait;

class AuthController extends BaseController
{
    public function rules($login = true)
    {
        $email = $login ? '|is_not_unique[users.email]' : '|is_unique[users.email]';
        $rules = [
            'email'   => 'required|min_length[4]|max_length[100]|valid_email' . $email,
            'password' => 'required|min_length[4]|max_length[50]',
        ];
        if (!$login) {
            return $rules + ['name' => 'required|min_length[2]|max_length[50]'];
        }
        return $rules;
    }

    public function login()
    {
        helper(['auth', 'form']);
        $data = [];
        if ($this->request->getMethod() === 'post') {
            if ($this->validate([
                'email'   => 'required|min_length[4]|max_length[100]|valid_email',
                'password' => 'required|min_length[4]|max_length[50]',
            ])) {

                $email =  trim($this->request->getPost('email'));
                $password =  trim($this->request->getPost('password'));
                $userModel = new User();
                $user_info = $userModel->where('users.email', $email)->first();
                // ->join('role_permissions rp', 'rp.role_id = users.role_id')
                // ->join('permission p', 'p.id=rp.permission_id')
                if (password_verify($password, $user_info['password'])) {

                    $user_info['permissions'] = $userModel->permissions($user_info['role_id']);
                    set_signin($user_info);

                    if ($user_info['role'] == $userModel->ADMIN) {
                        return redirect()->to($userModel->HOME)->with('msg', 'Login Successful');
                    } else {
                        // redirecting to last requested page if any
                        if (session()->has('last_page')) {
                            $last_page = session()->get('last_page');
                            session()->remove('last_page');
                            return redirect()->to($last_page)->with('msg', 'Login Successful');
                        }
                        return redirect()->to('/')->with('msg', 'Login Successful');
                    }
                } else {
                    return redirect()->to('/login')->with('msg', 'Wrong Password')->withInput();
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        // dd($this->validator);
        return view('auth/login', $data);
    }

    public function logout()
    {
        if (Auth::logout()) {
            return redirect()->back()->with('msg', 'Log Out Successfull');
        }
        return redirect()->back();
    }

    public function register()
    {
        helper('form');
        return view('auth/signup');
    }

    public function signup()
    {
        if (true) return redirect()->back()->with('msg', 'Sign Up is not Implemented!');
        helper(['auth', 'form']);
        if ($this->validate($this->rules(false))) {
            try {
                $userModel = new User();
                $data = [
                    'name'     => trim($this->request->getVar('name')),
                    'email'    => trim($this->request->getVar('email')),
                    'password' => password_hash(trim($this->request->getVar('password')), PASSWORD_DEFAULT)
                ];

                $userModel->insert($data);
            } catch (\Throwable $th) {
                return redirect()->to('/register')->with('msg', $th->getMessage());
            }

            $last_id = $userModel->insertID();
            set_signin($userModel->find($last_id));

            return redirect()->to($userModel->HOME)->with('msg', 'Registration Successful');
        } else {
            $data['validation'] = $this->validator;
            return view('auth/signup', $data);
        }
    }

    public function google()
    {
        helper(['auth', 'text']);
        try {
            $CLIENT_ID = env('google_client_id');
            $id_token = $this->request->getPost('credential');

            $client = new \Google_Client(['client_id' => $CLIENT_ID,
             'client_secret'=>env('google_client_secret', )]);
            $payload = $client->verifyIdToken($id_token);
            if ($payload) {
                $user_google_id = $payload['sub'];
                $name = $payload["name"];
                $email = $payload["email"];
                $picture = $payload["picture"];

                $model = new User();
                $user = $model->where('email', $email)->first();

                if ($user) {
                    $model->updateGoogle($user, ['google_id' => $user_google_id, 'image' => $picture]);
                    set_signin($model->attachPermission($user));

                    return redirect()->back()->with('msg', 'Login Successful');
                } else {
                    if (!setting('allow_signup', true)) {
                        return redirect()->back()->with('msg', 'Currently Registration is not Available');
                    }
                    $password = random_string('alpha');
                    $filename = $model->makeFilename($name);
                    $image = $model->downloadGoogleImage($picture, $filename);

                    $newUser = $model->insert([
                        'name' => $name,
                        'email' => $email,
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'image' => $image,
                        'google_id' => $user_google_id,
                        'verified' => 1
                    ]);

                    $added_user = $model->find($newUser);
                    set_signin($model->attachPermission($added_user));
                    return redirect()->back()->with('msg', 'Registration Successful');
                }
            } else {
                return redirect()->back()->with('msg', 'Unknown Error!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('msg', $th->getMessage());
        }
    }
}
