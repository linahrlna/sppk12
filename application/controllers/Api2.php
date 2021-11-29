<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api2 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $res = array('message' => 'Nothing here');

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($res));
    }

    public function get_class() {
        $this->load->model('student/Student_model_petugas');
        $res = $this->Student_model_petugas->get_class();

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($res));
    }

    public function get_class2() {
        $this->load->model('student/Student_model_petugas');
        $res = $this->Student_model_petugas->get(array('group'=>true));

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($res));
    }


    public function get_student_by_class($id = NULL) {
        if ($id != NULL) {
            $this->load->model('student/Student_model_petugas');
            $res = $this->Student_model_petugas->get(array('status'=>1, 'class_id'=>$id));

            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
        } else {
            redirect('api2');
        }
    }


    public function get_student_by_id($student_id= NULL) {
        if ($payment_id != NULL) {
            $this->load->model('student/Student_model_petugas');
            $res = $this->Student_model_petugas->get(array('id' => $student_id));

            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
        } else {
            redirect('api2');
        }
    }


    public function get_payout_bulan($payment_id = NULL, $student_id= NULL) {
        if ($payment_id != NULL) {
            $this->load->model('bulan/Bulan_model_petugas');
            $res = $this->Bulan_model_petugas->get(array('payment_id' => $payment_id, 'student_id' => $student_id));

            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
        } else {
            redirect('api2');
        }
    }

}
