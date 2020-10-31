<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Api\ProdukModel as ProdukModel;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Api\ReusableController;

use Exception;

class ProdukController extends Controller
{
    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllProduk()
    {
        try {
            $produk = ProdukModel::all();
            if ($produk == null || empty($produk)) {
                throw new Exception('Produk tidak ditemukan', 404);
            }
            return response()->json(["status" => "ok", "message" => "Mendapatkan semua produk", "data" => $produk], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }


    public function getSingleProduk($id)
    {
        try {
            $produk = ProdukModel::find($id);

            if ($produk == null) {

                throw new Exception('Produk tidak ditemukan', 404);
            }

            return response()->json(["status" => "ok", "message" => "Produk ditemukan", "data" => $produk], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insert(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "name" => "required",
                "price" => "required",
                "stock" => "required",
                "summary" => "required",
                "description" => "required",
                "image_product" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $produk = new ProdukModel();

            $fileName = strtotime(date('Y-m-d H:i:s')) . uniqid() . ".png";

            $createFile =  $this->reusableController->base64ToFile(
                $request->image_product,
                $fileName,
                $this->reusableController->uploadProdukDirectory
            );

            if (!$createFile) {

                throw new Exception('Gagal upload gambar ' . $produk->name . '', 400);
            }

            $produk->name = $request->name;
            $produk->price = $request->price;
            $produk->stock = $request->stock;
            $produk->summary = $request->summary;
            $produk->description = $request->description;
            $produk->image_product = $fileName;

            $result = $produk->save();

            if (!$result) {

                throw new Exception('Tidak dapat menambahkan produk , coba beberapa saat lagi...', 400);
            }

            $currentInsertData = ProdukModel::find($produk->id_product);
            return response()->json(["status" => "ok", "message" => "Berhasil menambahkan produk " . $request->name . "", "data" => $currentInsertData], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "name" => "required",
                "price" => "required",
                "stock" => "required",
                "summary" => "required",
                "description" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $produk = ProdukModel::find($id);

            if ($produk == null) {

                throw new Exception('Produk tidak ditemukan', 404);
            }

            $produk->name = $request->name;
            $produk->price   = $request->price;
            $produk->stock   = $request->stock;
            $produk->summary   = $request->summary;
            $produk->description   = $request->description;

            $result = $produk->save();

            if (!$result) {

                throw new Exception('Update produk ' . $produk->name . ' gagal diupdate', 400);
            }

            return response()->json(["status" => "ok", "message" => "Produk  " . $produk->name . " berhasil diupdate ", "data" => $produk], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function updateImage(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "image_product" => "required"
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $produk = ProdukModel::find($id);

            if ($produk == null) {

                throw new Exception('Produk tidak ditemukan', 404);
            }

            $fileName = strtotime(date('Y-m-d H:i:s')) . uniqid() . ".png";

            if ($produk->image_product != null || !empty($produk->image_product)) {
                $this->deleteImage($produk->id_product);
            }

            $createFile = $this->reusableController->base64ToFile(
                $request->image_product,
                $fileName,
                $this->reusableController->uploadProdukDirectory
            );

            if (!$createFile) {

                throw new Exception('Gagal update gambar ' . $produk->name . '', 400);
            }

            $produk->image_product = $fileName;
            $result = $produk->save();

            if (!$result) {

                throw new Exception('Terjadi masalah saat update nama produk', 400);
            }

            return response()->json(["status" => "ok", "message" => "Berhasil update gambar " . $produk->name . " ", "data" => $produk], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $produk = ProdukModel::find($id);

            if ($produk == null) {

                throw new Exception('Produk tidak ditemukan', 404);
            }

            $fileIsExist = is_file(storage_path($this->reusableController->completeUploadProdukDirectory . $produk->image_product));

            if (!$fileIsExist) {

                throw new Exception('Gambar produk tidak ditemukan', 400);
            }

            $storagePath = storage_path($this->reusableController->completeUploadProdukDirectory . $produk->image_product);
            $deleteImage = @unlink($storagePath);

            if (!$deleteImage) {

                throw new Exception('Gambar tidak dapat dihapus , coba beberapa saat lagi', 404);
            }

            $result = $produk->delete();

            if (!$result) {

                throw new Exception('Produk tidak dapat dihapus', 400);
            }

            return response()->json(["status" => "ok", "message" => "Produk berhasil dihapus"], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deleteImage($id)
    {
        try {
            $produk = ProdukModel::find($id);

            if ($produk == null) {

                throw new Exception('Produk tidak dapat ditemukan', 404);
            }

            $fileIsExist = is_file(storage_path($this->reusableController->completeUploadProdukDirectory . $produk->image_product));

            if (!$fileIsExist) {

                throw new Exception('Gambar produk tidak ditemukan', 404);
            }

            $deleteImage = @unlink(storage_path($this->reusableController->completeUploadProdukDirectory . $produk->image_product));

            if (!$deleteImage) {

                throw new Exception('Gambar produk tidak dapat dihapus , coba beberapa saat lagi', 400);
            }

            $produk->image_product = null;

            $result = $produk->save();

            if (!$result) {

                throw new Exception('Gagal mengubah nama produk menjadi null', 400);
            }

            return response()->json(["status" => "ok", "message" => "Berhasil menghapus gambar produk"], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }
}
