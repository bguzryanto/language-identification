<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guestbook_Model extends CI_Model { 

    function __construct(){
        parent::__construct();
    }

    function tambah($nama, $email, $comment){

        $waktu = time();

        $data = array(
            'nama'    => $nama,
            'email'   => $email,
            'comment' => $comment,
            'waktu'   => $waktu,
        );

        $this->db->insert('guestbook_ci', $data);
    }

    function lihat(){
        $sql = "SELECT * FROM guestbook_ci order by id DESC";
        return $this->db->query($sql);
    }

}