<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Month_set_petugas extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged') == NULL) {
      header("Location:" . site_url('petugas/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
  }
  $list_access = array(EXTRAUSER);
  if (!in_array($this->session->userdata('uroleid'),$list_access)) {
      redirect('petugas');
  }

  $this->load->model('bulan/Bulan_model_petugas');
  $this->load->helper(array('form', 'url'));
}

// User_customer view in list
public function index($offset = NULL) {
    $this->load->library('pagination');
// Apply Filter
// Get $_GET variable
    $f = $this->input->get(NULL, TRUE);

    $data['f'] = $f;

    $params = array();
// Nip
    if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
      $params['class_name'] = $f['n'];
  }

  $paramsPage = $params;
  $params['limit'] = 12;
  $params['offset'] = $offset;
  $data['month'] = $this->Bulan_model_petugas->get_month($params);

  $config['per_page'] = 12;
  $config['uri_segment'] = 4;
  $config['base_url'] = site_url('petugas/month/index');
  $config['suffix'] = '?' . http_build_query($_GET, '', "&");
  $config['total_rows'] = count($this->Bulan_model_petugas->get_month($paramsPage));
  $this->pagination->initialize($config);

  $data['title'] = 'Bulan';
  $data['main'] = 'month/month_list_petugas';
  $this->load->view('petugas/layout', $data);
}

// Add User_customer and Update
public function add($id = NULL) {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('month_name', 'Name', 'trim|required|xss_clean');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button ket="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
    $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

    if ($_POST AND $this->form_validation->run() == TRUE) {

        if ($this->input->post('month_id')) {
            $params['month_id'] = $this->input->post('month_id');
        }
        $params['month_name'] = $this->input->post('month_name');
        $status = $this->Bulan_model_petugas->add_month($params);


        $this->session->set_flashdata('success', $data['operation'] . ' Bulan');
        redirect('petugas/month');

        if ($this->input->post('from_angular')) {
            echo $status;
        }
    } else {
        if ($this->input->post('month_id')) {
            redirect('petugas/month/edit/' . $this->input->post('month_id'));
        }

            // Edit mode
        if (!is_null($id)) {
            $object = $this->Bulan_model_petugas->get_month(array('id' => $id));
            if ($object == NULL) {
                redirect('petugas/month');
            } else {
                $data['month'] = $object;
            }
        }
        $data['title'] = $data['operation'] . ' Bulan';
        $data['main'] = 'month/month_add_petugas';
        $this->load->view('petugas/layout', $data);
    }
}

}
