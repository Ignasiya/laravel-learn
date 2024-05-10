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

        if($request->hasFile('file_uploaded')) {
            return response('No file uploaded');
        }

        $name = $request->input('file_name');

        $file = $request->file('file_uploaded');
        echo  $file->path() . PHP_EOL;
        $file->storeAs('images', $file->getClientOriginalExtension());

        $tempPath = $file->getRealPath();
        echo $tempPath . PHP_EOL;

        $newFileName = $name . '.' . $file->getClientOriginalExtension();
        echo $newFileName . PHP_EOL;

        // move_uploaded_file($tempPath, 'uploads/' . $newFileName);
        $file->move('uploads', $newFileName);

        return response($request->header('host') . '/uploads/' . $newFileName)
            ->cookie('count_file_of_uploads', ++$count);
    }
}
