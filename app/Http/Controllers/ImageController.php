<?php

namespace App\Http\Controllers;


use App\Http\Requests\ImageUploadRequest;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload(ImageUploadRequest $request)
    {

        // Replaced with the (ImageUploadRequest)
/*        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:2048',
        ]);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }*/

        if ($request->file('image')) {
            $file = $request->file('image');
            $name = Str::random('10');
            $url = Storage::putFileAs('images', $file, $name . '.' . $file->extension());
        }









/*        if ($request->file('image')) {
            //$name = Str::random('10');
            //$file = $request->file('image')->store('images');
            $name = $request->file('image')->getClientOriginalName();
            //$url = Storage::putFileAs('images', $request->file('image'), $name);
            $url = $request->file('image')->move('images', $name);
            //$url = Storage::putFileAs('images',$file,$name);
            //$url = Storage::url($file);
        }*/

        return [
            'url' => env('APP_URL') . '/' . $url
        ];
    }
}
