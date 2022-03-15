<?php
    namespace App\Controllers;
    use CodeIgniter\Controller;

    class createInvoice extends Controller{
        
        public function index(){

            $this->load->model('createInvoice_Model');
            
            $data['invoice'] = $this->createInvoice_Model->get_customer(3);

            $this->load->view('createInvoice_View');

            echo view('createInvoice_View', $data);
        }
    }
?>