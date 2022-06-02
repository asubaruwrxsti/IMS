<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database as ConfigDatabase;

$db = ConfigDatabase::connect();

class invoiceModel extends Model
{
    public function get_inventory($id)
    {
        $sql = "SELECT * FROM inventory WHERE user_id = $id";
        $data = $this->db->query($sql);
        return $data;
    }

    public function addProduct($values)
    {
        foreach($values as $key) {
            $sql = "INSERT INTO inventory (user_id, product, SN, qty) VALUES (:user_id:, :product:, :SN:, :qty:)";
            $this->db->query($sql, [
                'user_id' => $key['user_id'],
                'product' => $key['product'],
                'SN' => $key['SN'],
                'qty' => $key['qty']
            ]);
        }
    }

    public function editProduct($id, $values)
    {
        $sql = "UPDATE inventory SET product = :product:, SN = :SN:, qty = :qty: WHERE id = $id";
        $this->db->query($sql, [
            'product' => $values['product'],
            'SN' => $values['SN'],
            'qty' => $values['qty']
        ]);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM inventory WHERE id = $id";
        $this->db->query($sql);
    }
}
