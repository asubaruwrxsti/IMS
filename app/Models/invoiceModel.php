<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database as ConfigDatabase;

$db = ConfigDatabase::connect();

class invoiceModel extends Model
{
    public function createInvoice($data)
    {
        foreach ($data as $key) {

            $sql = "INSERT INTO orders (BARCODE ,First_Name ,Last_Name, Contact ,Date_Entry ,Operator ,Device ,Qty ,Comments) 
                VALUES(:BARCODE: ,:First_Name: ,:Last_Name: ,:Contact: ,:Date_Entry: ,:Operator: ,:Device: ,:Qty: ,:Comments:)";

            $this->db->query($sql, [
                'BARCODE' => $key['BARCODE'],
                'First_Name' => $key['First_Name'],
                'Last_Name' => $key['Last_Name'],
                'Contact' => $key['Contact'],
                'Date_Entry' => $key['Date_Entry'],
                'Operator' => $key['Operator'],
                'Device' => $key['Device'],
                'Qty' => $key['Qty'],
                'Comments' => $key['Comments']
            ]);
        }
    }

    public function editInvoice($id, $data)
    {
        foreach ($data as $key) {

            $sql = "UPDATE orders SET First_Name = :First_Name:, Last_Name = :Last_Name: Device = :Device:, Contact = :Contact: ,Comments = :Comments:, Qty = :Qty:, Status_Repaired = :Status_Repaired:,
            Status_Dispatched = :Status_Dispatched:, Date_Dispatched = :Date_Dispatched:, Price = :Price:, Status_Paid = :Status_Paid:, Operator_Dispatch = :Operator_Dispatch: WHERE orders.id = :id:";

            $this->db->query($sql, [
                'id' => $id,
                'First_Name' => $key['First_Name'],
                'Last_Name' => $key['Last_Name'],
                'Device' => $key['Device'],
                'Contact' => $key['Contact'],
                'Comments' => $key['Comments'],
                'Qty' => $key['Qty'],
                'Status_Repaired' => $key['Status_Repaired'],
                'Status_Dispatched' => $key['Status_Dispatched'],
                'Date_Dispatched' => $key['Date_Dispatched'],
                'Price' => $key['Price'],
                'Status_Paid' => $key['Status_Paid'],
                'Operator_Dispatch' => $key['Operator_Dispatch']
            ]);
        }
    }

    public function get_orders()
    {
        $data = $this->db->query('SELECT * FROM orders');
        return $data;
    }

    public function getArchivedOrders()
    {
        $data = $this->db->query('SELECT * FROM orders WHERE orders.Status_Repaired = 1');
        return $data;
    }
    
    public function fetchOrderData($id)
    {
        $data = $this->db->query('SELECT * FROM orders WHERE orders.id = ' . $id);
        return $data;
    }

    public function deleteOrderData($id)
    {
        $this->db->query('DELETE FROM orders WHERE orders.id = ' . $id);
    }
}
