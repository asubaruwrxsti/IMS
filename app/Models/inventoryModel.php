<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database as ConfigDatabase;

$db = ConfigDatabase::connect();

class inventoryModel extends Model
{
    public function getInventory()
    {
        $sql = "SELECT * FROM inventory";
        $result = $this->db->query($sql);

        return $result;
    }

    public function createEntry($data)
    {
        foreach ($data as $k => $v) {

            $sql = "INSERT INTO inventory (user_id, item_serial, item_description, qty, price) VALUES (:user_id:, :item_serial:, :item_description:, :qty:, :price:)";
            $this->db->query($sql, [
                'user_id' => $v['id'],
                'item_serial' => $v['item_serial'],
                'item_description' => $v['item_description'],
                'qty' => $v['qty'],
                'price' => $v['price']
            ]);
        }
    }

    public function editEntry($data)
    {
        foreach ($data as $k => $v) {
            $sql = "UPDATE inventory SET item_serial = :item_serial:, item_description = :item_description:, qty = :qty:, price = :price:";
            $this->db->query($sql, [
                'item_serial' => $v['item_serial'],
                'item_description' => $v['item_description'],
                'qty' => $v['qty'],
                'price' => $v['price']
            ]);
        }
    }

    public function deleteEntry($id){
        $sql = "DELETE FROM inventory WHERE id = :id:";
        $this->db->query($sql, [
            'id' => $id
        ]);
    }
}
