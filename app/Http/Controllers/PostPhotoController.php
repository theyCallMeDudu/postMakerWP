<?php

namespace App\Http\Controllers;

use App\ModelPost;
use App\ModelPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostPhotoController extends Controller
{
    public function removePhoto(Request $request){
        $photoName = $request->get('photoName');

        if(Storage::disk('public')->exists($photoName)){
            Storage::disk('public')->delete($photoName);
        }

        $removePhoto = ModelPhoto::where('image', $photoName);
        $removePhoto->delete();

        flash('Imagem removida com sucesso')->success();
        return back()->withInput();
    }
    
}
