<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendMail;

class ReusableController extends Controller
{
    //? Directory untuk upload foto
    public $uploadUserDirectory = "public/images/user/";

    //? directory untuk menghapus foto
    public $completeUploadUserDirectory = "app/public/images/user/";

    //? Directory Produk Images

    public $uploadProdukDirectory = "public/images/produk/";
    public $completeUploadProdukDirectory = "app/public/images/produk/";

    public function base64ToFile($base64String, $nameFile, $directoryUpload)
    {
        $file = Storage::put($directoryUpload . $nameFile, base64_decode($base64String));
        return $file;
    }

    public function sendEmail($nameUser, $emailUser)
    {
        $title = 'Terimakasih sudah mendaftar di aplikasi ini ' . $nameUser . ' :*';
        $userDetail = ['name' => $nameUser,  'email' => $emailUser];

        $sendmail = Mail::to($userDetail['email'])->send(new SendMail($title, $userDetail));

        if (empty($sendmail)) {
            return response()->json(
                ["status" => "ok", 'message' => 'Mail Sent Successfully'],
                200
            );
        } else {
            return response()->json(
                ['message' => 'Mail Sent fail'],
                400
            );
        }
    }
}
