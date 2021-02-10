<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title']  = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _ecript($strData)
    {
        $strData = '-' . $strData;
        $Code = "1234567890";
        $result = "";
        for ($i = 1; $i <= strlen($strData) - 1; $i++) {
            $lokasi = (($i) % strlen($Code));
            $result = $result . chr(ord(substr($strData, $i, 1)) ^ ord(substr($Code, $lokasi, 1)));
        }
        return $result;
    }

    private function _login()
    {
        $username       =   $this->input->post('username');
        $password       =   $this->input->post('password');

        $login          = $this->db->get('Login')->result();
        $user           = $this->db->get_where('Login', ['cast(Username as varchar)=' => $username])->row_array();
        $pwd_ecript     = $this->_ecript($user['Password']);
        $password       = $this->db->get_where('Login', ['cast(Password as varchar)=' => $pwd_ecript])->row_array();



        if ($user) {
            if ($password = $user['Password']) {
                $data = [
                    'username' => $user['Username']
                ];
                $this->session->set_userdata($data);
                //$this->session->set_userdata('coba');
                redirect('admin');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Password Salah</div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Username Tidak Ada.</div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Anda berhasil keluar.</div>'
        );
        redirect('auth');
    }
}
