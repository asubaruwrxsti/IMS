<?php

namespace App\Controllers;

use App\Models\inventoryModel;

class inventoryController extends BaseController
{

    public function index()
    {
            $model = model(inventoryModel::class);
            $data['users'] = $model->get_users();

            echo view('/templates/header/index.php');
            echo view("/inventory/inventoryView", $data);
    }

    public function getInventory($id)
    {
        $model = model(inventoryModel::class);
        $data['inventory'] = $model->get_inventory($id)->getResult();
        echo json_encode($data['inventory']);
    }

    public function add($id)
    {
        $values[] = array(
            'user_id' => $id,
            'product' => $this->request->getVar('product'),
            'SN' => $this->request->getVar('SN'),
            'qty' => $this->request->getVar('qty')
        );

        $model = model(inventoryModel::class);
        $model->addProduct($values);

        return redirect()->to(site_url('/inventory'));
    }

    public function edit($id)
    {

        $values = array(
            'product' => $this->request->getVar('product'),
            'SN' => $this->request->getVar('SN'),
            'qty' => $this->request->getVar('qty')
        );

        $model = model(inventoryModel::class);
        $model->editProduct($id, $values);

        return redirect()->to(site_url('/inventory'));
    }

    public function delete($id)
    {
        if ($id) {
            $model = model(inventoryModel::class);
            $model->deleteProduct($id);
        }

        return redirect()->to(site_url('/inventory'));
    }
}
