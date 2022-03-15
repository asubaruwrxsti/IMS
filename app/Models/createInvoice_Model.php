<?php

use CodeIgniter\Model;

class createInvoice_Model extends Model {
    
    public function get_customer($id) {
        $data['id'] = 3;
        $data['first_name'] = 'John';
        $data['last_name'] = 'Doe';
        $data['address'] = 'Kingstone';

        return $data;
    }
}
