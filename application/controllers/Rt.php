<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class rt extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }else{
            if($this->session->userdata('level')!='administrator'){
                redirect('welcome');
            }
        }
        $this->load->model('rt_m');
    }
    
    public function index()
    {
        $data['mRt'] = true;
        $data['rt'] = $this->rt_m->getAll();
        $data['content'] = 'v_rt';
        $this->load->view('index',$data);
    }

    public function tambah()
    {
        $data = [
            'nama_rt'=>$this->input->post('nama_rt',true)
        ];
        $this->rt_m->tambahBaru($data);
        $this->session->set_flashdata('berhasil','Anda berhasil menambahkan data rt');
        redirect('rt');
    }

    public function hapus($id){
        $this->rt_m->hapus($id);
        $this->session->set_flashdata('berhasil','Anda berhasil menghapus data rt');
        redirect('rt');
    }
}

/* End of file rt.php */