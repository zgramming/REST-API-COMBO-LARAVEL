<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Api\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //? Directory untuk upload foto
    protected $uploadDirectory = "public/images/";

    //? directory untuk menghapus foto
    protected $completeUploadDirectory = "app/public/images/";

    public function getAll()
    {
        $this->uploadDirectory;
        $users = UserModel::all();

        return response()->json([
            "message" => "Berhasil mendapatkan user",
            "data" => $users
        ], 200);
    }


    public function getSingle($id)
    {

        $user = UserModel::find($id);


        if (!empty($user)) {
            return response()->json([
                'message' => 'User ditemukan',
                'data' => $user
            ]);
        } else {
            return response()->json([
                'message' => 'Tidak dapat menemukan user dengan id ' . $id . ' ',
                'data' => null
            ], 404);
        }
    }

    public function getWhere1($id)
    {
        $user = UserModel::where('id_user', '!=', $id)->get();
        if ($user->isEmpty()) {
            return response()->json([
                "message" => "User tidak ditemukan",
                "data" => null
            ], 404);
        } else {
            return response()->json([
                "message" => "Berhasil menemukan user",
                "data" => $user
            ], 200);
        }
    }

    public function insertWithoutFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_user' => 'required',
            'password_user' => 'required|min:5|max:8',
            'email_user' => 'required|email|unique:tbl_user,email_user',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'message' => $validator->errors()
            ], 401);
        }


        $user = new UserModel();

        $user->name_user = $request->name_user;
        $user->password_user = Hash::make($request->password_user);
        $user->email_user = $request->email_user;
        $result = $user->save();

        if ($result) {

            return response()->json([
                "message" => "Berhasil menambah user",
            ], 200);
        } else {

            return response()->json([
                "message" => "Gagal menambah user",
                "data" => null
            ], 500);
        }
    }


    public function insertWithFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_user' => 'required',
            'password_user' => 'required|min:5|max:8',
            'email_user' => 'required|email|unique:tbl_user,email_user',
            'image_user' => 'required|mimes:jpeg,png,jpg|max:200'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'message' => $validator->errors()
            ], 401);
        }


        if ($request->file('image_user')->isValid()) {

            $fileImage = $request->file('image_user');


            $user = new UserModel();

            $user->name_user = $request->name_user;
            $user->password_user = Hash::make($request->password_user);
            $user->email_user = $request->email_user;
            $user->image_user  = $fileImage->hashName();
            $result = $user->save();

            if ($result) {

                //? Lokasi folder berada di [storage/app/?]
                //? Jika ingin otomatis generate nama filenya
                $fileImage->store($this->uploadDirectory);

                //? Jika ingin custom nama filenya
                // $fileImage->storeAs($this->uploadDirectory, $nameImage);

                return response()->json([
                    "message" => "Berhasil Tambah user dengan foto",
                ], 200);
            } else {
                return response()->json([
                    "message" => "Gagal tambah user dengan foto",
                    "data" => null
                ], 400);
            }
        }
    }

    public function updateWithFile(Request $request, $id)
    {
        if (UserModel::where('id_user', $id)->exists()) {
            $user = UserModel::find($id);

            $validator = Validator::make($request->all(), [
                "name_user" => "required",
                "password_user" => "required|min:5|max:8",
                "email_user" => "required|email",
                "image_user" => "required|mimes:jpeg,jpg,png|max:200"
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "message" => $validator->errors()
                ], 401);
            }

            if ($request->file('image_user')->isValid()) {
                $fileImage = $request->file('image_user');

                $fileIsExist = is_file(storage_path($this->completeUploadDirectory . $user->image_user));

                if ($fileIsExist) {
                    unlink(storage_path($this->completeUploadDirectory . $user->image_user));
                }

                $user->name_user            = $request->name_user;
                $user->password_user        = Hash::make($request->password_user);
                $user->email_user           = $request->email_user;
                $user->image_user           = $fileImage->hashName();
                $result = $user->save();

                if ($result) {

                    $fileImage->store($this->uploadDirectory);

                    return response()->json([
                        "message" => "Berhasil update user dengan foto baru",
                        "data" => $user,
                    ], 200);
                } else {
                    return response()->json([
                        "message" => "Gagal update user denga foto baru"
                    ], 400);
                }
            }
        } else {
            return response()->json([
                "message" => "User tidak ditemukan",
                "data" => null
            ], 404);
        }
    }

    public function updateWithoutFile(Request $request, $id)
    {
        if (UserModel::where('id_user', $id)->exists()) {

            $validator = Validator::make($request->all(), [
                "name_user" => "required",
                "password_user" => "required|min:5|max:8",
                "email_user" => "required|email"
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'message' => $validator->errors()
                ], 401);
            }

            $user = UserModel::find($id);

            $user->name_user = $request->name_user;
            $user->password_user = Hash::make($request->password_user);
            $user->email_user = $request->email_user;
            $result = $user->save();

            if ($result) {
                return response()->json([
                    "message" => "Berhasil update user",
                    "data" => $user
                ], 200);
            } else {
                return response()->json(["message" => "Gagal update user", "data" => null], 400);
            }
        } else {
            // echo "test";
            return response()->json([
                "message" => "User tidak ditemukan",
            ], 404);
        }
    }

    public function deleteWithoutFile(Request $request, $id)
    {
        $user = UserModel::find($id);

        if ($user == null) {
            return response()->json([
                "message" => "User tidak ditemukan"
            ], 404);
        } else {
            $result = $user->delete();
            if ($result) {

                return response()->json([
                    "message" => "Berhasil hapus user",
                    "data" => $result
                ], 200);
            } else {
                return response()->json(["message" => "Gagal hapus user", "data" => null], 400);
            }
        }
    }

    public function deleteWithFile(Request $request, $id)
    {
        $user = UserModel::find($id);

        if ($user == null) {
            return response()->json([
                "message" => "User tidak ditemukan"
            ], 404);
        } else {
            $fileIsExist = is_file(storage_path($this->completeUploadDirectory . $user->image_user));

            if ($fileIsExist) {
                unlink(storage_path($this->completeUploadDirectory . $user->image_user));
            }

            $result = $user->delete();

            if ($result) {
                return response()->json([
                    "message" => "delete user dengan filenya berhasil"
                ], 200);
            } else {
                return response()->json([
                    "message" => "Delete user dengan filenya gagal"
                ], 400);
            }
        }
    }

    public function login(Request $request)
    {
        $user = UserModel::where('email_user', $request->email_user)->first();
        if ($user == null) {
            return response()->json([
                "message" => "User tidak ditemukan", "data" => null
            ], 404);
        }


        if (!Hash::check($request->password_user, $user->password_user)) {
            return response()->json([
                "message" => "password tidak valid",
                "data" => null
            ], 400);
        }


        return response()->json([
            "message" => "Berhasil login",
            "data" => $user
        ], 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name_user" => "required",
            "email_user" => "required|email|unique:tbl_user,email_user",
            "password_user" => "required|min:5|max:8",
            "password_confirmation" => "required|same:password_user"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => $validator->errors()->first(),
                "data" => null
            ], 401);
        }

        $user = new UserModel();

        $user->name_user = $request->name_user;
        $user->email_user  = $request->email_user;
        $user->password_user = Hash::make($request->password_user);

        $result = $user->save();

        if ($result) {
            $this->sendEmail($request->name_user, $request->email_user);

            return response()->json([
                "message" => "Berhasil register",
                "data" => "ok"
            ], 200);
        } else {
            return response()->json([
                "message" => "Gagal registrasi , coba beberapa saat lagi...",
                "data" => null
            ], 400);
        }
    }

    private function sendEmail($nameUser, $emailUser)
    {
        $title = 'Terimakasih sudah mendaftar di aplikasi ini ' . $nameUser . ' :*';
        $userDetail = ['name' => $nameUser,  'email' => $emailUser];

        $sendmail = Mail::to($userDetail['email'])->send(new SendMail($title, $userDetail));

        if (empty($sendmail)) {
            return response()->json(['message' => 'Mail Sent Sucssfully'], 200);
        } else {
            return response()->json(['message' => 'Mail Sent fail'], 400);
        }
    }
}
