<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Commands\Database\Seed;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login/login.php', $data);
    }
    public function loginProses()
    {
        $loginuser = new \App\Models\Login();
        $login = $this->request->getVar('login');
        //validate login with flashdata
        if ($login) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            //remove whitespace
            $username = preg_replace('/\s+/', '', $username);
            $password = preg_replace('/\s+/', '', $password);
            //check if username and password is empty
            if ($username == '' or $password == '') {
                session()->setFlashdata('error', 'Masukan Username dan Password');
                return redirect()->to('/login');
            }
            if (empty($err)) {
                $cek = $loginuser->where('username', $username)->first();
                if ($cek) {
                    if ($cek['password'] === md5($password) && $cek['username'] === $username) {
                        $session = session();
                        $session->set('username', $cek['username']);
                        $session->set('id', $cek['id']);
                        return redirect()->to('/dashboard');
                    } else {
                        session()->setFlashdata('error', 'Username atau Password Salah');
                        return redirect()->to('/login');
                    }
                } else {
                    session()->setFlashdata('error', 'Username Tidak Ditemukan');
                    return redirect()->to('/login');
                }
            }
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        $data = [
            'title' => 'Register User'
        ];
        return view('register/register.php', $data);
    }

    public function inputRegister()
    {
        $loginuser = new \App\Models\Login();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        //remove whitespace
        $username = preg_replace('/\s+/', '', $username);
        $password = preg_replace('/\s+/', '', $password);
        //check if username already exist
        $cek = $loginuser->where('username', $username)->first();
        if ($cek) {
            $err = "Username Sudah Terdaftar";
        }
        //check if username and password is empty
        if ($username == '' or $password == '') {
            $err = "Masukan Username dan Password";
        }
        //set flash data
        if (empty($err)) {
            $data = [
                'username' => $username,
                'password' => md5($password)
            ];
            $loginuser->insert($data);
            return redirect()->to('/login');
        } else {
            session()->setFlashdata('error', $err);
            return redirect()->to('/register');
        }
    }
}
