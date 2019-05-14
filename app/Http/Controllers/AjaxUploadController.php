<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
class AjaxUploadController extends Controller
{
    function index()
    {
        return view('ajax_upload');
    }

    function action(Request $request)
    {
        $validation = Validator::make($request->all(), [
            // 'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            'select_file' => 'required|mimes:pdf|max:20008'
        ]);
        if ($validation->passes()) {
            $file = $request->file('select_file');
            $new_name = $file->getClientOriginalName();
            // $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $randnumber = rand();
            $file->move(public_path('upload'), $new_name);
            return response()->json([
                'name' =>$new_name,
                'message'   => "訊息 : $new_name 上傳成功!!",
                'uplist' => "<li><a href='../public/upload/ $new_name'>$new_name</a></li>",
                'class_name'  => 'alert-success',
                'randnumber'    => "$randnumber"
            ]);
        } else {
            $error = $validation->errors()->all();
            $randnumber = rand();
            return response()->json([
                'message'   =>  $error,
                'uploaded_image' => '',
                'class_name'  => 'alert-danger',
                'randnumber'    => "$randnumber"
            ]);
        }
    }
}
