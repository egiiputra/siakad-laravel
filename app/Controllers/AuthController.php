<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
        helper(['form', 'url']);
    }

    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            var_dump($username);
            $user = $this->userModel->findByUsername($username);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // Set session
                    $this->session->set([
                        'user_id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'isLoggedIn' => true,
                    ]);
                    return redirect()->to('/pendaftaran');
                } else {
                    $data['error'] = 'Password salah.';
                }
            } else {
                $data['error'] = 'Username tidak ditemukan.';
            }
        } else {
            $data = [];
        }

        return view('auth/login', $data);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/auth/login');
    }
}
