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
      $rules = [
         "nama" => "required",
         "title" => "required",
         "gambar" => "required",
      ];

      $messages = [
         "nama" => [
            "required" => "Name is required"
         ],
         "title" => [
            "required" => "Email required",
         ],
         "gambar" => [
            "required" => "Phone Number is required"
         ],
      ];
      if (!$this->validate($rules, $messages)) {

         $response = [
            'status' => 500,
            'error' => true,
            'message' => $this->validator->getErrors(),
            'data' => []
         ];
         return $this->respond($response, 500);
      } else {

         $emp = new ProductModels();

         $data['nama'] = $this->request->getVar("nama");
         $data['title'] = $this->request->getVar("title");
         $data['gambar'] = $this->request->getVar("gambar");

         $emp->save($data);

         $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Product added successfully',
            'data' => []
         ];
         return $this->respondCreated($response);
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
