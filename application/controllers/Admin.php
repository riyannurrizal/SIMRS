<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    //constructor
    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('m_title');
    }

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

        $this->form_validation->set_rules('judul', 'Nama Title', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');


            $this->session->set_flashdata('message1', '<div class="alert alert-danger" 
            role="alert">Silahkan Isi Nama Title </div>');
        } else {
            $stsaktif   =  $this->input->post('statusaktif');

            if ($stsaktif  != '1') {
                $stsaktif   = '0';
            }

            $query = $this->db->query("SELECT MAX(KdTitle) as max_id FROM Title");
            $row = $query->row_array();
            $max_id = $row['max_id'];
            //$max_id1 = (int) substr($max_id, 1, 2);
            $max_id1 = (int) $max_id;
            $kdtitle = $max_id1 + 1;

            $data = array(
                'NamaTitle' => $this->input->post('judul'),
                'StatusEnabled' => $stsaktif,
                'KdTitle' => $kdtitle,
                'KodeExternal' => '',
                'NamaExternal' => ''
            );

            $this->db->insert('Title', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" 
            role="alert">Berhasil Menambahkan Title </div>');
            redirect('admin');
        }
    }
    public function update()
    {
        $id['KdTitle'] = $this->input->post("e_title");
        $data = array(

            'NamaTitle'         => $this->input->post("e_namatitle"),
            'KodeExternal'      => $this->input->post("e_kodeexternal"),
            'NamaExternal'      => $this->input->post("e_namaexternal"),

        );
    }
    public function edit($editkdtitle)
    {
        $data1['title'] = 'Edit Title';
        $editkdtitle = $this->uri->segment(3);
        $data = array(
            'gelar' => $this->m_title->edit($editkdtitle),

        );
        $this->load->view('templates/header', $data1);
        // $this->load->view('admin/edit_title', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($kdtitle)
    {
        $kodetitle['KdTitle'] = $this->uri->segment(3);
        $this->m_title->hapus($kodetitle);
        redirect('admin');
    }
}
