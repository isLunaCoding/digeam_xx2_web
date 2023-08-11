<?php

namespace App\Http\Controllers;

use App\Model\imgUpload;
use Illuminate\Http\Request;
use Storage;

class CkeditorUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $image = request()->file('upload');

        if ($image->getMimeType() != 'image/jpeg' && $image->getMimeType() != 'image/png') {
            return "<script>alert('限定上傳JPG/PNG檔案類型,請關閉視窗後重新上傳')</script>";
        }
        // $path = $image->store('public/upload/ckeditor');
        // $path = $image->move(public_path('upload/ckeditor'), $image);
        $new_filename = $image->getClientOriginalName();
        $path = ($request->file('upload')->move(public_path('upload/ckeditor'), $new_filename));
        // $getFileName = explode('ckeditor/', $path);

        $url = Storage::disk('cke')->url($path);
        $callback = $request->input('CKEditorFuncNum');
        $CKEditor = $request->input('CKEditor');

        $imgUpload = new imgUpload();
        $imgUpload->file_name = $new_filename;
        $imgUpload->type = 'ckeditor';
        $imgUpload->save();

        return "<script>alert('上傳成功')</script>";
    }
    public function getImage()
    {
        $imgUpload = imgUpload::get();
        return response()->json(['imgUpload' => $imgUpload]);
    }
}
