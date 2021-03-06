<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_petugas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('petugas/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('users/Users_model_petugas', 'holiday/Holiday_model_petugas'));
        $this->load->model(array('student/Student_model_petugas', 'kredit/Kredit_model_petugas', 'debit/Debit_model_petugas', 'bulan/Bulan_model_petugas', 'setting/Setting_model_petugas', 'information/Information_model', 'bebas/Bebas_model', 'bebas/Bebas_pay_model'));
        $this->load->library('user_agent');
    }

    public function index() {
        $id = $this->session->userdata('uid'); 
        $data['user'] = count($this->Users_model_petugas->get());
        $data['student'] = count($this->Student_model_petugas->get(array('status'=>1)));
        $data['kredit'] = $this->Kredit_model_petugas->get(array('date'=> date('Y-m-d')));
        $data['information'] = $this->Information_model->get(array('information_publish'=>1));
        $data['debit'] = $this->Debit_model_petugas->get(array('date'=> date('Y-m-d')));
        $data['bulan_day'] = $this->Bulan_model_petugas->get_total(array('status'=>1, 'date'=> date('Y-m-d')));
        $data['bebas_day'] = $this->Bebas_pay_model->get(array('date'=> date('Y-m-d')));

        $data['total_kredit'] = 0;
        foreach ($data['kredit'] as $row) {
            $data['total_kredit'] += $row['kredit_value'];
        }

        $data['total_debit'] = 0;
        foreach ($data['debit'] as $row) {
            $data['total_debit'] += $row['debit_value'];
        }

        $data['total_bulan'] = 0;
        foreach ($data['bulan_day'] as $row) {
            $data['total_bulan'] += $row['bulan_bill'];
        }

        $data['total_bebas'] = 0;
        foreach ($data['bebas_day'] as $row) {
            $data['total_bebas'] += $row['bebas_pay_bill'];
        }

        $this->load->library('form_validation');
        if ($this->input->post('add', TRUE)) {
            $this->form_validation->set_rules('date', 'Tanggal', 'required');
            $this->form_validation->set_rules('info', 'Info', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($_POST AND $this->form_validation->run() == TRUE) {
                list($tahun, $bulan, $tanggal) = explode('-', $this->input->post('date', TRUE));

                $params['year'] = $tahun;
                $params['date'] = $this->input->post('date');
                $params['info'] = $this->input->post('info');

                $ret = $this->Holiday_model_petugas->add($params);

                $this->session->set_flashdata('success', 'Tambah Agenda berhasil');
                redirect('petugas');
            }
        }elseif ($this->input->post('del', TRUE)) {
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($_POST AND $this->form_validation->run() == TRUE) {
                $id = $this->input->post('id', TRUE);
                $this->Holiday_model_petugas->delete($id);

                $this->session->set_flashdata('success', 'Hapus Agenda berhasil');
                redirect('petugas');
            }
        }
        $data['setting_logo'] = $this->Setting_model_petugas->get(array('id' => 6));
        $data['holiday'] = $this->Holiday_model_petugas->get();
        $data['title'] = 'Dashboard';
        $data['main'] = 'dashboard/dashboard_petugas';
        $this->load->view('petugas/layout', $data);
    }

    public function get() {
        $events = $this->Holiday_model_petugas->get();
        foreach ($events as $i => $row) {
            $data[$i] = array(
                'id' => $row['id'],
                'title' => strip_tags($row['info']),
                'start' => $row['date'],
                'end' => $row['date'],
                'year' => $row['year'],
                    //'url' => event_url($row)
            );
        }
        echo json_encode($data, TRUE);
    }

}
