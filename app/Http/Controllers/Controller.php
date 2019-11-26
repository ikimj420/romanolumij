<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // function for create image
    public function createImage($img_request, $img, $folder){
        if($img_request){
            // Filename with extension
            $filenameWithExt = $img->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $img->getClientOriginalExtension();
            // Filename to store
            $filenameToStor = $filename.'_'.time().'.'.$extension;
            //remove space if exist
            $pics = str_replace(' ','_', $filenameToStor);
            //save in folder
            $pictures = $img;
            //create thumbnail save in app
            Image::make($pictures)->fit(100, 100)->save( public_path('storage/' . $folder . '/thumbnail/' . $pics ) );
            //create save in app
            Image::make($pictures)->fit(500, 500)->save( public_path('storage/' . $folder . '/' . $pics ) );
            //create Large
            Image::make($pictures)->fit(1280, 720)->save( public_path('storage/' . $folder . '/large/' . $pics ) );
        }else{
            $pics = 'default.svg';
        }
        return $pics;
    }

    // function for update images
    public function updateImage($img_request, $img, $folder){
        if($img_request){
            // Filename with extension
            $filenameWithExt = $img->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $img->getClientOriginalExtension();
            // Filename to store
            $filenameToStor = $filename.'_'.time().'.'.$extension;
            //remove space if exist
            $pics = str_replace(' ','_', $filenameToStor);
            //save in folder
            $pictures = $img;
            //update thumbnail save in app
            Image::make($pictures)->fit(100, 100)->save( public_path('storage/' . $folder . '/thumbnail/' . $pics ) );
            //update save in app
            Image::make($pictures)->fit(500, 500)->save( public_path('storage/' . $folder . '/' . $pics ) );
            //create Large
            Image::make($pictures)->fit(1280, 720)->save( public_path('storage/' . $folder . '/large/' . $pics ) );

            return $pics;
        }
    }
}