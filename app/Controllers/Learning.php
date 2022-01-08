<?php

namespace App\Controllers;

use \App\Models\pelajarModel;

class Learning extends BaseController
{

    function __construct() {

        $this->session = session();
        $this->modelPelajar = new pelajarModel();

    }

    function index()
    {
        $data = [
            'title' => 'Halaman Registrasi',
            'user' => $this->session->get('username')
        ];
        return view('E-Learning/index', $data);
    }

    function submitRegister()
    {
        $data = [
            'nama_depan' => $this->request->getVar('nama_depan'),
            'nama_belakang' => $this->request->getVar('nama_belakang'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'kelas' => $this->request->getVar('kelas'),
        ];

        $this->modelPelajar->insert($data);

        return redirect()->to('/register');


    }

    function register() {
        
        $data = [
            'title' => 'Halaman Registrasi | E-Learning '
        ];

        return view('/E-Learning/register');
    }

    function login() {
        
        $data = [
            'title' => 'Halaman Login | E-Learning'
        ];

        return view('/E-Learning/login', $data);
    }
    
    function auth() {

        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->modelPelajar->where('username', $username)->first();
        if($data){
            $pass = $data['password'];          
            if($password == $pass){                
                $this->session->setFlashdata('pesan', 'Berhasil Login');  
            }else{                
                $this->session->setFlashdata('pesan', 'Username atau password anda salah');    
                // return redirect()->to('/login/');   
            // return view('/E-Learning/login');            
            }
        }else{
            $this->session->setFlashdata('pesan', 'Username atau password anda salah');  
            // return redirect()->to('/login/');
            // return view('/E-Learning/login');   
        }

    }
 
    function logout() {

        $session = session();
        $session->destroy();
        return redirect()->to('/login/');
    }
}
