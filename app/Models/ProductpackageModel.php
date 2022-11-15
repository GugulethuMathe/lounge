<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductpackageModel extends Model
{

   
    public function getPackageById($package_id){

        $sql = "select * from packages where id=$package_id";
        return $this->db->query($sql)->getResult();
    }
}
