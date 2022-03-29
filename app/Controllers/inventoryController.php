<?php

namespace App\Controllers;

use App\Models\invoiceModel;
use CodeIgniter\I18n\Time;

class inventoryController extends BaseController
{

    public function index(){
        $model = model(inventoryModel::class);
        $data['inventory_data'] = $model->getInventory();

        return view('inventory_view', $data);
    }
}
