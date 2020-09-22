<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;

class AdminMediaController extends Controller
{
    public function index(){
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function upload(){
        return view('admin.media.upload');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $name = time().$file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['file'=>$name]);
    }

    public function destroy($id){
        $photo = Photo::findOrfail($id);
        if(file_exists(public_path().$photo->file)){
            unlink(public_path().$photo->file);
        }
        $photo->delete();
        return redirect('admin/media');
    }

    public function deleteMedia(Request $request){
        if(empty($request->checkBoxArray)){
            return redirect()->back();
        }
        $photos = Photo::findOrFail($request->checkBoxArray);
        foreach($photos as $photo){
            if(file_exists(public_path().$photo->file)){
                unlink(public_path().$photo->file);
            }
            $photo->delete();
        }
        return redirect()->back();
    }
}
