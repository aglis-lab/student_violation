<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;
use App\Models\Student;

class Auth extends BaseController
{
    private Admin $adminModel;
    private Student $studentModel;

    public function __construct()
    {
        $this->adminModel = new Admin();
        $this->studentModel = new Student();
    }

    public function index()
    {
        return redirect()->to(base_url('/auth/login?type=admin'));
    }

    public function login()
    {
        if ($this->isLogin()) {
            return redirect()->to(base_url('/student'));
        }

        $type = $this->request->getGet('type');
        if (!$type) {
            $type = 'student';
        }

        return view('Pages/Auth/Login', $this->data([
            'type' => $type
        ]));
    }

    public function loginAction()
    {
        $ok = $this->validate([
            'username' => 'required',
            'password' => 'required|min_length[6]'
        ]);

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, 'input tidak valid');

            return redirect()->back();
        }

        $username = $this->request->getPost('username') ?? '';
        $password = $this->request->getPost('password') ?? '';
        $type = $this->request->getGet('type');
        $error = NULL;
        $user = NULL;
        if ($type == 'admin') {
            $user = $this->adminModel->getByUsername($username);
            if (!$user) {
                $error = 'tidak ada admin dengan username ' . $username;
            }
        } else {
            $user = $this->studentModel->getByUsername($username);
            if (!$user) {
                $error = 'tidak ada siswa dengan nis ' . $username;
            }
        }

        if (!$error) {
            if (!verifyPassword($password, $user['password'])) {
                $error = 'password yang anda masukan salah';
            }
        }

        if ($error) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata('message_error', $error);

            return redirect()->back();
        }

        $this->setBulkLoginSession($user);

        return redirect()->to(base_url('/student'));
    }

    public function logoutAction()
    {
        $this->session->destroy();
        return redirect()->to('/student');
    }
}
