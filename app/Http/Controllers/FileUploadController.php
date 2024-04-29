<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $count = $request->cookie('count_file_of_uploads') ? : 0;

        if ($count > 2) {
            return response('Too many uploads');
        }

        $name = $request->input('file_name');
        $file = $request->file('file_uploaded');

        // $tempPath = $file->getRealPath();
        $newFileName = $name . '.' . $file->getClientOriginalExtension();

        // move_uploaded_file($tempPath, 'uploads/' . $newFileName);
        $file->move('uploads', $newFileName);

        return response($request->header('host') . '/uploads/' . $newFileName)
            ->cookie('count_file_of_uploads', ++$count);
    }
}
