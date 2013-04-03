<?php 
class Guestbook extends CI_Controller
{    
    function __construct()
    {
        parent::__construct();     
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('guestbook_model');
    }

    
    function index(){

        $this->load->helper('form');
        
        $data = array(
            'guestbooks' => $this->guestbook_model->lihat()
        );

        $this->load->view('guestbook_form', $data);

    }

    function post(){
        

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('komentar', 'Komentar', 'trim|required');

        if($this->form_validation->run() == TRUE){
            $nama    = $this->input->post('nama');
            $email   = $this->input->post('email');
            $comment = $this->input->post('komentar');
                
            $this->guestbook_model->tambah($nama, $email, $comment);

            redirect();
        }
        else{
            echo validation_errors();
        }



        // input ke database

        // fungsi yang redirect ke halamnan utama

    }

    function about(){
        echo 'tentang kami';
    }

}
?>