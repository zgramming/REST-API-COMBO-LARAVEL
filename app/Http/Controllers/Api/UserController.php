<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;


class UserController extends Controller
{

    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAll()
    {
        $users = UserModel::all();

        return response()->json([
            "status" => "ok",
            "message" => "Berhasil mendapatkan user",
            "data" => $users
        ], 200);
    }


    public function getSingle($id)
    {

        $user = UserModel::find($id);


        if (!empty($user)) {
            return response()->json([
                "status" => "ok",
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

    public function updateImage(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "image_user" => "required"
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $user = UserModel::find($id);

            if ($user == null) {

                throw new Exception('User tidak ditemukan', 404);
            }

            $fileName = strtotime(date('Y-m-d H:i:s')) . uniqid() . ".png";

            if ($user->image_user != null || !empty($user->image_user)) {
                $this->deleteImage($user->id_user);
            }

            $createFile = $this->reusableController->base64ToFile(
                $request->image_user,
                $fileName,
                $this->reusableController->uploadUserDirectory
            );

            if (!$createFile) {

                throw new Exception('Gagal update gambar ' . $user->name_user . '', 400);
            }

            $user->image_user = $fileName;
            $result = $user->save();

            if (!$result) {

                throw new Exception('Terjadi masalah saat update gambar ', 400);
            }

            return response()->json(["status" => "ok", "message" => "Berhasil update gambar " . $user->name_user . " ", "data" => $user], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $user = UserModel::find($id);

            if ($user == null) {

                throw new Exception('User tidak ditemukan', 404);
            }

            $fileIsExist = is_file(storage_path($this->reusableController->completeUploadUserDirectory . $user->image_user));

            if (!$fileIsExist) {

                throw new Exception('Gambar user tidak ditemukan', 400);
            }

            $storagePath = storage_path($this->reusableController->completeUploadUserDirectory . $user->image_user);
            $deleteImage = @unlink($storagePath);

            if (!$deleteImage) {

                throw new Exception('Gambar tidak dapat dihapus , coba beberapa saat lagi', 404);
            }

            $result = $user->delete();

            if (!$result) {

                throw new Exception('User tidak dapat dihapus', 400);
            }

            return response()->json(["status" => "ok", "message" => "User berhasil dihapus"], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deleteImage($id)
    {

        try {
            $user = UserModel::find($id);

            if ($user == null) {

                throw new Exception('User tidak dapat ditemukan', 404);
            }

            $fileIsExist = is_file(storage_path($this->reusableController->completeUploadUserDirectory . $user->image_user));

            if (!$fileIsExist) {

                throw new Exception('Gambar User tidak ditemukan', 404);
            }

            $deleteImage = @unlink(storage_path($this->reusableController->completeUploadUserDirectory . $user->image_user));

            if (!$deleteImage) {

                throw new Exception('Gambar user tidak dapat dihapus , coba beberapa saat lagi', 400);
            }

            $user->image_user = null;

            $result = $user->save();

            if (!$result) {

                throw new Exception('Gagal mengubah gambar user menjadi null', 400);
            }

            return response()->json(["status" => "ok", "message" => "Berhasil menghapus gambar user"], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "email_user" => "required|email",
                "password_user" => "required|min:5|max:8",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $user = UserModel::where('email_user', $request->email_user)->first();
            if ($user == null) {

                throw new Exception("User dengan email " . $request->email_user . " tidak ditemukan ", 404);
            }


            if (!Hash::check($request->password_user, $user->password_user)) {

                throw new Exception("Password tidak valid", 400);
            }
            return response()->json(["status" => "ok", "message" => "Berhasil login", "data" => $user], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "name_user" => "required",
                "email_user" => "required|email|unique:tbl_user,email_user",
                "password_user" => "required|min:5|max:8",
                "password_confirmation" => "required|same:password_user"
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $user = new UserModel();

            $user->name_user = $request->name_user;
            $user->email_user  = $request->email_user;
            $user->password_user = Hash::make($request->password_user);

            $result = $user->save();

            if (!$result) {

                throw new Exception("Gagal registrasi , coba beberapa saat lagi...", 400);
            }

            $this->reusableController->sendEmail($request->name_user, $request->email_user);

            return response()->json(["status" => "ok", "message" => "Berhasil registrasi , terimakasih atas waktunya untuk mencoba aplikasi ini :D",], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }
}
