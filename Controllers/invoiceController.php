<?php

namespace App\Controllers;

use App\Models\invoiceModel;
use CodeIgniter\I18n\Time;


class invoiceController extends BaseController
{

    private function generateRandomString($length = 10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index()
    {
        $model = model(invoiceModel::class);
        $data['data'] = $model->get_orders();

        echo view('/templates/header/index.php');
        echo view("invoiceView", $data);
    }

    public function archive()
    {
        $model = model(invoiceModel::class);
        $data['data'] = $model->getArchivedOrders();

        echo view('/templates/header/index.php');
        echo view("archiveView", $data);
    }

    public function create()
    {
        echo view('/templates/header/index.php');
        echo view("createInvoiceView");
    }

    public function createInvoice()
    {
        $barcode = $this->generateRandomString();
        $now = date('m/d/Y');

        $values[] = array(
            'BARCODE' => $barcode,
            'First_Name' => $this->request->getVar('First_Name'),
            'Last_Name' => $this->request->getVar('Last_Name'),
            'Contact' => $this->request->getVar('Contact'),
            'Date_Entry' => $now,
            'Operator' => $this->request->getVar('Operator'),
            'Device' => $this->request->getVar('Device'),
            'Qty' => $this->request->getVar('Qty'),
            'Comments' => $this->request->getVar('Comments')
        );

        $model = model(invoiceModel::class);
        $model->createInvoice($values);

        return redirect()->to(site_url('/public/'));
    }

    public function edit($id)
    {
        if ($id) {
            $model = model(invoiceModel::class);
            $data['data'] = $model->fetchOrderData($id);

            echo view('/templates/header/index.php');
            echo view("editInvoiceView", $data);
        }
    }

    public function editInvoice($id)
    {
        $values[] = array(
            'First_Name' => $this->request->getVar('First_Name'),
            'Last_Name' => $this->request->getVar('Last_Name'),
            'Operator' => $this->request->getVar('Operator'),
            'Device' => $this->request->getVar('Device'),
            'Contact' => $this->request->getVar('Contact'),
            'Qty' => $this->request->getVar('Qty'),
            'Status_Repaired' => $this->request->getVar('Status_Repaired'),
            'Price' => $this->request->getVar('Price'),
            'Status_Paid' => $this->request->getVar('Status_Paid'),
            'Status_Dispatched' => $this->request->getVar('Status_Dispatched'),
            'Operator_Dispatch' => $this->request->getVar('Operator_Dispatch'),
            'Comments' => $this->request->getVar('Comments')
        );

        $model = model(invoiceModel::class);
        $model->editInvoice($id, $values);

        return redirect()->to(site_url('/public/'));
    }

    public function setRepaired($id)
    {
        $model = model(invoiceModel::class);
        $model->setRepaired($id);

        return redirect()->to(site_url('/public/'));
    }

    public function delete($id)
    {
        if ($id) {
            $model = model(invoiceModel::class);
            $model->deleteOrderData($id);
        }
    }

    public function print($id)
    {
        if ($id) {
            $model = model(invoiceModel::class);
            $data['data'] = $model->fetchOrderData($id);

            echo view('/templates/header/index.php');
            echo view("printInvoiceView", $data);
        }
    }
}
