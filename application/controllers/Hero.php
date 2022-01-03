<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Hero extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/valorant/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data hero
    function index(){
        $data['datahero'] = json_decode($this->curl->simple_get($this->API.'/hero'));
        
        $data['datahero'] = $data['datahero']->data ;
        $this->load->view('hero',$data);
        
    }
    
    
    // tambah data 
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_hero'       =>  $this->input->post('id_hero'),
                'nama'      =>  $this->input->post('nama'),
                'peran'      =>  $this->input->post('peran'),
                'biodata'      =>  $this->input->post('biodata'),
                'url_hero'=>  $this->input->post('url_hero'));
            $insert =  $this->curl->simple_post($this->API.'/hero', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Data Berhasil Ditambahkan');
            }else
            {
               $this->session->set_flashdata('hasil','Data Gagal Ditambahkan');
            }
            redirect('hero');
        }else{
            $this->load->view('view_tambah');
        }
    }
 

    // edit data 
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_hero'       =>  $this->input->post('id_hero'),
                'nama'      =>  $this->input->post('nama'),
                'peran'      =>  $this->input->post('peran'),
                'biodata'      =>  $this->input->post('biodata'),
                'url_hero'=>  $this->input->post('url_hero'));
            $update =  $this->curl->simple_put($this->API.'/hero', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('hero');
            }else{
            $params =  $this->uri->segment(3);
            $params = $params - 1;
            $data['datahero'] = json_decode($this->curl->simple_get($this->API.'/hero'));
            $data['datahero'] = $data['datahero']->data[$params] ;
            $this->load->view('view_edit',$data);
            
           
        }
    }
    
    // delete data 
    function delete($id_hero){
        if(empty($id_hero)){
            redirect('hero');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/hero', array('id_hero'=>$id_hero), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('hero');
        }
    }
}