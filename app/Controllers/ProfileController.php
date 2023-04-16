<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;


class ProfileController extends ResourceController
{
   use ResponseTrait;
   public function getDataFromRawQuery()
   {
      //SELECT users.name, transaction.quantity,transaction.price,promo.diskon, FORMAT(transaction.price * (1 - promo.diskon/100),2) as result FROM transaction LEFT JOIN promo ON transaction.id = promo.id LEFT JOIN users ON transaction.user_id;
      $db = \Config\Database::connect();
      $query = $db->query("SELECT users.name,profile.image FROM profile LEFT JOIN users on profile.user_id = users.id;
      ");
      $data["profile"] = $query->getResultArray();
      return view("profile_view", $data);
      // return $this->respond($data, 200);
   }
}
