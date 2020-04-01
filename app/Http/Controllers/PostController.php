<?php

namespace App\Http\Controllers;

use App\Custom\StorageSaveImage;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class PostController extends Controller
{

    public function store(PostRequest $request)
    {
        try {
            Post::create([
                'title' => $request->title,
                'descriptions' => $request->descriptions,
                'user_id' => Auth::user()->id,
                'image' => $request->file('image')->getClientOriginalName()
            ]);

            if ($image = $request->file('image')) {
                StorageSaveImage::saveImageStorage($image);
            }
        }catch (\Exception $e) {

            return redirect()->route('cabinet')->with(['error' => 'Щось пішло не так!']);
        }

        return redirect()->route('cabinet')->with(['success' => 'Объявления создано!']);

    }

}
