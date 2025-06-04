<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function showForm()
    {
        return view('imageUpload');
    }

    public function uploadImage(Request $request)
    {
//         if($request->hasFile('uploadImage')) {
//             $file = $request->file('uploadImage');
//             echo $file->path();
//             echo '<br>';
//             echo $file->getClientOriginalName();
//             echo '<br>';
//             echo $file->getClientOriginalExtension();
//
//             $file->storeAs('images', $file->getClientOriginalName());
//         } else
//         {
//             echo 'No file uploaded';
//         }

        foreach($request->uploadImage as $photo) {
            var_dump($photo);
        }

    }
}
