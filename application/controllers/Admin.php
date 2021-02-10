<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Master Gelar';
        //var_dump($this->session->userdata('username'));
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['gelar'] = $this->db->get('Title')->result_array();

        $array = array(
            'KdTitle'   => 'KdTitle',
            'NamaTitle' => 'judul',
            'KodeExternal' => 'kodeexternal',
            'NamaExternal' => 'namaexternal',
            'StatusEnabled' => '1'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else
            $this->db->insert('Title', ['NamaTitle' => $this->input->post('judul')]);
        $this->db->insert('Title', ['StatusEnabled' => $this->input->post('statusaktif')]);


        // var_dump();
        // die;
    }
}
