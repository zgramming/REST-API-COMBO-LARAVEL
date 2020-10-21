<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    //? Definisi nama table custom
    protected $table = 'tbl_user';

    //? Definisi Primary Key custom
    protected $primaryKey = 'id_user';

    //? Apakah primarykey akan increment/tidak
    // public $incrementing = false;

    //? Jika tidak mau menggunakan [created_at,updated_at] , set menjadi false
    // public $timestamps = false;

    //? Format timeStamp 
    // protected $dateFormat = 'U';

    //? Custom nama timestamp dari [created_at,updated_at], menjadi [creation_date,last_update]
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';

    //? Custom nama database koneksi
    // protected $connection = 'connection-name';

    //? Setting default value 
    // protected $attributes = [
    //     'delayed' => false,
    // ];


}
