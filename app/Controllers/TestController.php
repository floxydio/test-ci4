<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TestModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class TestController extends ResourceController
{
   use ResponseTrait;
   public function index()

   {
      $model = new TestModel();
      $data["product"] = $model->findAll();

      return view('test_data', $data);
   }

   public function insertData()
   {
      $model = new TestModel();
      $data = [
         "name" => $this->request->getVar("name"),
         "detail" => $this->request->getVar("detail"),
         "gambar" => $this->request->getVar("gambar")
      ];
      $model->insert($data);
      // return redirect()->to("/test");
      // return $this->respond($data, 200)
      return redirect()->to("/test");
   }
   public function updateData($id)
   {
      $model = new TestModel();
      $data = [
         "name" => $this->request->getVar("name"),
         "detail" => $this->request->getVar("detail"),
         "gambar" => $this->request->getVar("gambar")
      ];
      $model->update($id, $data);
      return redirect()->to("/test");
   }
}
