<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table  = 'tbl_produk';

    protected $primaryKey = 'id_product';

    protected $casts = array(
        "price" => "double",
        "stock" => "integer",
    );
}
