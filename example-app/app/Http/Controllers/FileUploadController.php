<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $number = $request->cookie('number_of_uploads') ? : 0;

        if($number > 2){
            return response('Too many uploads ' . $number);
        }

        $name = $request->input('file_name');
        $file = $request->file('uploaded_file');

        $tempPath = $file->getRealPath();
        $newFileName = $name . '.' . $file->getClientOriginalExtension();

        try {
            $file->move('public/uploads', $newFileName);
            $number++;
            echo '<pre>';
            var_dump($request->header());
            echo '</pre>';

            return response($request->header('host') . '/public/uploads/' . $newFileName)->cookie('number_of_uploads', $number);
        } catch (e) {
            return throw new Exception(e);
        }

//         echo '<pre>';
//         var_dump($file);
//         echo '</pre>';
    }
}
