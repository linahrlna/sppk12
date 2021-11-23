<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance_set_petugas extends CI_Controller {

	public function __construct() {
		parent::__construct(TRUE);
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('petugas/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model(array('setting/Setting_model_petugas'));
	}

    // kredit view in list
	public function index() {

		$config['base_url'] = site_url('petugas/maintenance/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");

		$data['title'] = 'Maintenance';
		$data['main'] = 'maintenance/maintenance_list_petugas';
		$this->load->view('petugas/layout', $data);
	}

	public function backup() {
		$this->load->dbutil();
		$data['setting_school'] = $this->Setting_model_petugas->get(array('id' => SCHOOL_NAME));
		$prefs = [
			'format' => 'zip',
			'filename' => $data['setting_school']['setting_value'].'-'.date("Y-m-d H-i-s").'.sql'
		];
		$backup = $this->dbutil->backup($prefs); 
		$file_name = $data['setting_school']['setting_value'].'-'.date("Y-m-d-H-i-s") .'.zip';
		$this->zip->download($file_name);
	}

}

/* End of file Maintenance_set_petugas.php */
/* Location: ./application/modules/maintenance/controllers/Maintenance_set_petugas.php */