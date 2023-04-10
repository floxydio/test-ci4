<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModels extends Model {
   protected $table = 'product';
   protected $primaryKey = "id";
   protected $allowedFields = ["nama","title","gambar"];
}
?>
