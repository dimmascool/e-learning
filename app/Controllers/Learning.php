<?php

namespace App\Controllers;

use \App\Models\pelajarModel;
use \App\Models\materiModel;
use \App\Models\tugasModel;
use \App\Models\berkasJawabanModel;
use \App\Models\latihanModel;
use \App\Models\jawabanPelajarModel;
use \App\Models\akunguruModel;

class Learning extends BaseController
{


    function __construct() {

        $this->session = session();
        $this->modelPelajar = new pelajarModel();
        $this->modelMateri = new materiModel();
        $this->tugasModel = new tugasModel();
        $this->berkasJawaban = new berkasJawabanModel();
        $this->latihanModel = new latihanModel();
        $this->jawabanPelajar = new jawabanPelajarModel();
        $this->akunGuru = new akunguruModel();

    }

    function index()
    {
        $data = [
            'title' => 'Halaman Registrasi',
            'user' => $this->session->get('user'),
            'id_pelajar' => $this->session->get('id_pelajar')
        ];
        return view('E-Learning/index', $data);
    }

    function learning()
    {
        $data = [
            'title' => 'Halaman learning | E-Learning',
            'user' => $this->session->get('user'),
            'id_pelajar' => $this->session->get('id_pelajar')
        ];

        return view('E-Learning/learning', $data);
    }

    function information()
    {
        $data = [
            'title' => 'Halaman Infromasi | E-Learning',
            'user' => $this->session->get('user'),
            'id_pelajar' => $this->session->get('id_pelajar')
        ];
        return view('E-Learning/information', $data);
    }

    function materi(){
        $materi = $this->modelMateri->where('kelas', $this->session->get('kelas'))->findAll();
        $data = [
            'title' => 'Halaman Materi | E-Learning',
            'user' => $this->session->get('user'),
            'id_pelajar' => $this->session->get('id_pelajar'),
            'materi' => $materi
        ];
        return view('E-Learning/materi', $data);
    }

    function detailMateri($idMateri)
    {        
        $materi = $this->modelMateri->find($idMateri);

        $data = [
            'title' => 'Halaman Materi | E-Learning',
            'user' => $this->session->get('user'),
            'id_pelajar' => $this->session->get('id_pelajar'),
            'materi' => $materi
        ];

        return view('E-Learning/detail_materi', $data);
    }

    function latihan()
    {
        $pelajaran = $this->modelMateri->where('kelas', $this->session->get('kelas'))->findAll();

        $data = [
            'title' => 'Halaman Latihan | E-Learning',
            'user' => $this->session->get('user'),
            'id_pelajar' => $this->session->get('id_pelajar'),
            'pelajaran' => $pelajaran
        ];

        return view('E-Learning/latihan', $data);
    }

    function pertanyaanLatihan($idMateri) 
    {
        error_reporting(0);
        $pelajaran = $this->modelMateri->find($idMateri);
        $pertanyaan = $this->latihanModel->where('id_materi', $idMateri)->findAll();
        $jumlahPertanyaan = $this->latihanModel->where('id_materi', $idMateri)->countAllResults();


        $data = [
            'title' => 'Soal Latihan | E-Learning',
            'user' => $this->session->get('user'),
            'id_pelajar'        => $this->session->get('id_pelajar'),
            'pelajaran'         => $pelajaran,
            'soal'              => $pertanyaan,
            'jumlahPertanyaan'  => $jumlahPertanyaan 
        ];

        return view('E-Learning/pertanyaan', $data);
    }

    function jawabLatihanSoal() {

        $postData = $this->request->getVar();

        // d($postData);

        $idMateri = $this->request->getVar('id_materi');

        $jumlahPertanyaan = $this->latihanModel->where('id_materi', $idMateri)->countAllResults() + 1;
        $userId = $this->session->get('id_pelajar');

        for ($i=1; $i < $jumlahPertanyaan; $i++) { 
            
            $idSoal = $this->request->getVar('id_soal_'.$i);
            $jawabanSoal = $this->request->getVar('jawaban_'.$i);

            $data = [
                    'id_soal' => $idSoal,
                    'id_pelajar' => $this->session->get('id_pelajar'),
                    'id_materi' => $idMateri,
                    'jawaban_pelajar' => $jawabanSoal
            ];    

            $this->jawabanPelajar->insert($data);        
        }        
                  
        $this->session->setFlashdata('pesan_berhasil', 'Jawaban disimpan');
        return redirect()->to('/learning/latihan/'.$idMateri);        

    }

    function tugas()
    {
        $pelajaran = $this->modelMateri->where('kelas', $this->session->get('kelas'))->findAll();;

        $data = [
            'title' => 'Halaman Tugas | E-Learning',
            'user' => $this->session->get('user'),
            'id_pelajar' => $this->session->get('id_pelajar'),
            'pelajaran' => $pelajaran
        ];

        return view('E-Learning/tugas', $data);
    }

    function detailTugas($idMateri){


        $materi = $this->modelMateri->find($idMateri);

        $tugas = $this->tugasModel->where('id_materi', $idMateri)->findAll();


        $data = [
            'title' => 'Halaman Materi | E-Learning',
            'user' => $this->session->get('user'),
            'id_pelajar' => $this->session->get('id_pelajar'),
            'pelajaran' => $materi,
            'tugas' => $tugas
        ];

        return view('E-Learning/detail_tugas', $data);
    }

    function ngumpulinTugas() {

        $dataForm = $this->request->getVar();
        $materi = $this->request->getVar('id_materi');

        $idMateri = $this->modelMateri->find($materi);
        $pemateri = $idMateri['pemateri'];


        // d($dataForm);

        $berkas = $this->request->getFile('berkas');
        $file = $berkas->getName();

        $data = [
            'nama_file'     => $file,
            'id_tugas'      => $dataForm['id_tugas'],
            'id_pelajar'    => $dataForm['id_pelajar'],
            'pemateri'      => $pemateri
            ];

        if ($this->berkasJawaban->insert($data)) {
            $berkas->move('upload_jawaban/', $file);
            $this->session->setFlashdata('pesanBerhasil', 'berhasil upload jawaban');
            return redirect()->to('/learning/tugas/'.$materi);
        } else {
            $this->session->setFlashdata('pesanGagal', 'Gagal upload berkas');
            return redirect()->to('/learning/tugas/'.$materi);
        }
    }


    function submitRegister()
    {
        $data = [
            'nama_depan' => $this->request->getVar('nama_depan'),
            'nama_belakang' => $this->request->getVar('nama_belakang'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'kelas' => $this->request->getVar('kelas')
        ];

        $this->modelPelajar->insert($data);
        $this->session->setFlashdata('pesan', 'data berhasil didaftarkan silahkan login');  

        return redirect()->to('/login');


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
                $data_login = array(
                    'user'          => $data['nama_depan']." ".$data['nama_belakang'],
                    'id_pelajar'    => $data['id_pelajar'],
                    'kelas'         => $data['kelas']
                );     
                $this->session->set($data_login);  
                return redirect()->to('/learning/'); 
            }else{                
                $this->session->setFlashdata('pesan', 'Username atau password anda salah');    
                return redirect()->to('/login/');           
            }
        }else{
            $this->session->setFlashdata('pesan', 'Username atau password anda salah');  
            return redirect()->to('/login/'); 
        }

    }
 
    function logout() {

        $session = session();
        $session->destroy();
        return redirect()->to('/login/');
    }


    function loginGuru(){

        $data = [
            'title'         => 'Login Guru'
        ];

        return view('E-Learning/guru/loginguru', $data);

    }

    function authguru(){

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->akunGuru->where('username', $username)->first();
        if($data){
            $pass = $data['password'];          
            if($password == $pass){           
                $data_login = array(
                    'guru'          => $data['nama_lengkap'],
                    'id_guru'    => $data['id_guru']
                );     
                $this->session->set($data_login);  
                return redirect()->to('/halamanguru/'); 
            }else{                
                $this->session->setFlashdata('pesan', 'Username atau password anda salah');    
                return redirect()->to('/loginguru/');           
            }
        }else{
            $this->session->setFlashdata('pesan', 'Username atau password anda salah');  
            return redirect()->to('/loginguru/'); 
        }                
    }

    function halamanGuru() {
        $data = [
            'title' => 'Halaman Guru',
            'guru' => $this->session->get('guru'),
            'id_guru' => $this->session->get('id_guru')
        ];

        return view('E-Learning/guru/indexguru', $data);
    }

    function materiGuru() {
        $materi = $this->modelMateri->where('pemateri', $this->session->get('guru'))->findAll();
        $data = [
            'title' => 'Materi | Guru',
            'guru' => $this->session->get('guru'),
            'id_guru' => $this->session->get('id_guru'),
            'listMateri' => $materi
        ];

        return view('E-Learning/guru/materi', $data);
    }

    function detailMateriGuru($idMateri)
    {        
        $materi = $this->modelMateri->find($idMateri);

        $data = [
            'title' => 'Halaman Materi | E-Learning',
            'guru' => $this->session->get('guru'),
            'id_guru' => $this->session->get('id_guru'),
            'materi' => $materi
        ];

        return view('E-Learning/guru/detail_materi', $data);
    }

    function editMateri($idMateri)
    {        
        $materi = $this->modelMateri->find($idMateri);

        $data = [
            'title' => 'Halaman Materi | E-Learning',
            'guru' => $this->session->get('guru'),
            'id_guru' => $this->session->get('id_guru'),
            'materi' => $materi
        ];

        return view('E-Learning/guru/edit_materi', $data);
    }

    function submitEditMateri() {
        $idMateri = $this->request->getVar('id_materi');
        $isiMateri = $this->request->getVar('isi');

        if ($this->modelMateri->update($idMateri, ['isi' => $isiMateri])) {
            $this->session->setFlashdata('pesan', 'Materi berhasil diedit');
            return redirect()->to('/guru/materi/'.$idMateri);
        } else {            
            $this->session->setFlashdata('pesan', 'Gagal Edit');
            return redirect()->to('/guru/edit_mater/'.$idMateri);
        }
    }

    function buatMateri() {

        $data = [
            'title' => 'Halaman Materi | E-Learning',
            'guru' => $this->session->get('guru'),
            'id_guru' => $this->session->get('id_guru')
        ];

        return view('/E-Learning/guru/buat_materi', $data);
    }

    function submitMateriBaru() {

        $pengajar = $this->session->get('guru');

        $data = [
            'judul'     => $this->request->getVar('judul'),
            'pemateri'  => $pengajar,
            'isi'       => $this->request->getVar('isi'),
            'kelas'     => $this->request->getVar('kelas')
        ];

        if ($this->modelMateri->insert($data)) {
            $this->session->setFlashdata('pesan', 'Materi berhasil dibuat');
            return redirect()->to('/guru/materi');
        } else {
            $this->session->setFlashdata('pesan', 'Gagal');
            return redirect()->to('/guru/buat_materi');
        }

    }

    function hapus_materi($idMateri) {

        

        if ($this->modelMateri->delete($idMateri)) {
            $this->session->setFlashdata('pesan', 'Materi berhasil hapus');
            return redirect()->to('/guru/materi');
        } 
    }



    function latihanGuru() {
        $materi = $this->modelMateri->where('pemateri', $this->session->get('guru'))->findAll();

        $data = [
            'title' => 'latihan Soal | Guru',
            'guru' => $this->session->get('guru'),
            'id_guru' => $this->session->get('id_guru'),
            'listMateri' => $materi
        ];
        return view('E-Learning/guru/latihan', $data);
        
    }

    function buatSoalBaru() {
        $materi = $this->modelMateri->where('pemateri', $this->session->get('guru'))->findAll();
        $data = [
            'title'     => 'Buat Soal | E-Learning',
            'guru'      => $this->session->get('guru'),
            'id_guru'   => $this->session->get('id_guru'),
            'materi'    => $materi
        ];

        return view('/E-Learning/guru/buat_soal', $data);
    }

    function submitSoalBaru() {
        $pengajar = $this->session->get('guru');
        $kelas = $this->modelMateri->find($this->request->getVar('materi'))['kelas'];
        $data = [
            'id_materi'     => $this->request->getVar('materi'),
            'soal'          => $this->request->getVar('soal'),
            'jawaban_benar' => $this->request->getVar('jawaban_benar'),
            'jawaban1'      => $this->request->getVar('jawaban1'),
            'jawaban2'      => $this->request->getVar('jawaban2'),
            'jawaban3'      => $this->request->getVar('jawaban3'),
            'jawaban4'      => $this->request->getVar('jawaban4'),
            'poin_soal'     => $this->request->getVar('poin_soal'),
            'kelas'         =>  $kelas,
            'pemateri'      => $pengajar
        ];

        if ($this->latihanModel->insert($data)) {
            $this->session->setFlashdata('pesan', 'Soal berhasil dibuat');
            return redirect()->to('/guru/latihan');
        } else {
            $this->session->setFlashdata('pesan', 'Gagal');
            return redirect()->to('/guru/buat_soal');
        }
    }

    function latihanSoal($idMateri){

        $pelajaran = $this->modelMateri->find($idMateri);
        $soal = $this->latihanModel->where('id_materi', $idMateri)->findAll();

        $data = [
            'title'     => 'Halaman Materi | E-Learning',
            'guru'      => $this->session->get('guru'),
            'id_guru'   => $this->session->get('id_guru'),
            'listSoal'  => $soal,
            'pelajaran' => $pelajaran
        ];

        return view('E-Learning/guru/latihan_soal', $data);
    }

    function editSoal($idSoal) {

        $soal = $this->latihanModel->find($idSoal);

        $data = [
            'title'     => 'Edit Soal | E-Learning',
            'guru'      => $this->session->get('guru'),
            'id_guru'   => $this->session->get('id_guru'),
            'soal'      => $soal,
            'judul'     => $this->modelMateri->find($soal['id_materi'])['judul']
        ];

        return view('E-Learning/guru/edit_soal', $data);
    }

    function submitEditSoal(){
        $idSoal = $this->request->getVar('id_soal');
        $idMateri = $this->request->getVar('id_materi');

        $data = [
            'soal'          => $this->request->getVar('soal'),
            'jawaban_benar' => $this->request->getVar('jawaban_benar'),
            'jawaban1'      => $this->request->getVar('jawaban1'),
            'jawaban2'      => $this->request->getVar('jawaban2'),
            'jawaban3'      => $this->request->getVar('jawaban3'),
            'jawaban4'      => $this->request->getVar('jawaban4'),
            'poin_soal'     => $this->request->getVar('poin_soal'),
        ];

        if ($this->latihanModel->update($idSoal, $data)) {
            $this->session->setFlashdata('pesan', 'Soal berhasil diubah');
            return redirect()->to('/guru/latihan_soal/'.$idMateri);
        }
    }   

    function hapusSoal($idSoal, $idMateri){

        if ($this->latihanModel->delete($idSoal)) {
            $this->session->setFlashdata('pesan', 'Soal berhasil dihapus');
            return redirect()->to('/guru/latihan_soal/'.$idMateri);
        }

    }

    function tugasGuru() {
        $materi = $this->modelMateri->where('pemateri', $this->session->get('guru'))->findAll();

        $data = [
            'title' => 'Materi | Guru',
            'guru' => $this->session->get('guru'),
            'id_guru' => $this->session->get('id_guru'),
            'listMateri' => $materi,
        ];
        return view('E-Learning/guru/tugas', $data);        
    }

    function tambahTugas() {
        $materi = $this->modelMateri->where('pemateri', $this->session->get('guru'))->findAll();

        $data = [
            'title'         => 'Materi | Guru',
            'guru'          => $this->session->get('guru'),
            'id_guru'       => $this->session->get('id_guru'),
            'listMateri'    => $materi
        ];
        return view('E-Learning/guru/buat_tugas', $data);
    }


    function submitTugas() {

        $idMateri = $this->request->getVar('id_materi');
        $kelas = $this->modelMateri->find($idMateri)['kelas'];

        $data = [
            'id_materi'     => $this->request->getVar('id_materi'),
            'tugas'         => $this->request->getVar('tugas'),
            'kelas'         => $kelas
        ];

        if ($this->tugasModel->insert($data)) {
            $this->session->setFlashdata('pesan', 'Tugas berhasil dibuat');
            return redirect()->to('/guru/tugas');
        }
    }

    function detailTugasGuru($idMateri) {

        $materi = $this->modelMateri->find($idMateri);

        $tugas = $this->tugasModel->where('id_materi', $idMateri)->findAll();


        $data = [
            'title'         => 'Materi | Guru',
            'guru'          => $this->session->get('guru'),
            'id_guru'       => $this->session->get('id_guru'),
            'pelajaran'     => $materi,
            'listTugas'     => $tugas
        ];

        return view('E-Learning/guru/detail_tugas', $data);
    }

    function hapus_soal($idSoal, $idMateri){

        if ($this->tugasModel->delete($idSoal)) {
            $this->session->setFlashdata('pesan', 'Tugas berhasil dihapus');
            return redirect()->to('/guru/tugas/'.$idMateri);
        }

    }

    function menuNilaiLatihan(){
        $materi = $this->modelMateri->where('pemateri', $this->session->get('guru'))->findAll();

        $data = [
            'title'         => 'Materi | Guru',
            'guru'          => $this->session->get('guru'),
            'id_guru'       => $this->session->get('id_guru'),
            'listMateri'    => $materi
        ];

        return view('E-Learning/guru/menu_penilaian_latihan', $data);
    }

    function menuNilaiTugas(){
        $materi = $this->modelMateri->where('pemateri', $this->session->get('guru'))->findAll();

        $data = [
            'title'         => 'Materi | Guru',
            'guru'          => $this->session->get('guru'),
            'id_guru'       => $this->session->get('id_guru'),
            'listMateri'    => $materi
        ];

        return view('E-Learning/guru/menu_penilaian_tugas', $data);
    }
    
    function NilaiTugas() {
        $listBerkasTugas = $this->berkasJawaban->where('pemateri', $this->session->get('guru'))->findAll();

        $data = [
            'title'         => 'Halaman Rekap Nilai Tugas',
            'guru'          => $this->session->get('guru'),
            'id_guru'       => $this->session->get('id_guru'),
            'listBerkas'    => $listBerkasTugas
        ];

        return view('E-Learning/guru/penilaian_tugas', $data);
    }

    function ngasihNilaiTugas($idBerkas){
        $berkas = $this->berkasJawaban->find($idBerkas);

        $data = [
            'title'         => 'Halaman Rekap Nilai Tugas',
            'guru'          => $this->session->get('guru'),
            'id_guru'       => $this->session->get('id_guru'),
            'berkas'        => $berkas
        ];

        return view('E-Learning/guru/ngasih_nilai', $data);
    }

    function beri_nilai(){
        $id_jawaban = $this->request->getVar('id_berkas');

        $data = [
            'nilai_tugas' => $this->request->getVar('nilai')
        ];

        if ($this->berkasJawaban->update($id_jawaban, $data)) {

            $this->session->setFlashdata('pesan', 'berhasil memberi nilai');
            return redirect()->to('/guru/penilaian_tugas/');
        }
    }

    function NilaiLatihan($idMateri) {

    }


}
