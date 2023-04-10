<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModels;


class ProductController extends ResourceController
{

   use ResponseTrait;
   public function index()
   {
      $model = new ProductModels();
      $data = $model->findAll();
      return $this->respond($data);
   }

   public function insertData()
   {
      $model = new ProductModels();
      $data = [
         "nama" => $this->request->getVar("nama"),
         "title" => $this->request->getVar("title"),
         "gambar" => $this->request->getVar("gambar")
      ];
      $result = $model->save($data);

      if ($result) {
         $response = [
            "status" => 201,
            "message" => "Successfully Added"
         ];
         return $this->respondCreated($response);
      } else {
         $response = [
            "status" => 400,
            "message" => "Cannot Added"
         ];
         return $this->respond($response, 400);
      }
   }

   public function getProductById($id)
   {
      $model = new ProductModels();
      $data = $model->where("id", $id)->findAll();
      return $this->respond($data);
   }
   public function getProductByName($name)
   {
      $model = new ProductModels();
      $data = $model->where("nama", $name)->findAll();
      return $this->respond($data);
   }


   public function editProductById($id)
   {
      $model = new ProductModels();
      $data = [
         "nama" => $this->request->getVar("nama"),
         "title" => $this->request->getVar("title"),
         "gambar" => $this->request->getVar("gambar")
      ];
      $result = $model->update($id, $data);

      if ($result) {
         $response = [
            "status" => 201,
            "message" => "Successfully Updated"
         ];
         return $this->respondCreated($response);
      } else {
         $response = [
            "status" => 400,
            "message" => "Cannot Updated"
         ];
         return $this->respond($response, 400);
      }
   }
   public function deleteProductById($id)
   {
      $model = new ProductModels();
      $result = $model->delete($id);

      if ($result) {
         $response = [
            "status" => 201,
            "message" => "Successfully Deleted"
         ];
         return $this->respondCreated($response);
      } else {
         $response = [
            "status" => 400,
            "message" => "Cannot Deleted"
         ];
         return $this->respond($response, 400);
      }
   }
}
