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
    public function createImage($img_request, $image, $folder){
        if($img_request){
            // Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $image->getClientOriginalExtension();
            // Filename to store
            $filenameToStor = $filename.'_'.time().'.'.$extension;
            //remove space if exist
            $pics = str_replace(' ','_', $filenameToStor);
            //save in folder
            $pictures = $image;
            //create save in app
            Image::make($pictures)->fit(500, 500)->save( public_path('storage/' . $folder . '/' . $pics ) );
            //create Large
        }else{
            $pics = 'default.svg';
        }
        return $pics;
    }

    // function for update images
    public function updateImage($img_request, $image, $folder){
        if($img_request){
            // Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $image->getClientOriginalExtension();
            // Filename to store
            $filenameToStor = $filename.'_'.time().'.'.$extension;
            //remove space if exist
            $pics = str_replace(' ','_', $filenameToStor);
            //save in folder
            $pictures = $image;
            //update save in app
            Image::make($pictures)->fit(500, 500)->save( public_path('storage/' . $folder . '/' . $pics ) );

            return $pics;
        }
    }


    // function for create image
    public function imageCreate($img_request, $image, $folder){
        if($img_request){
            // Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $image->getClientOriginalExtension();
            // Filename to store
            $filenameToStor = $filename.'_'.time().'.'.$extension;
            //remove space if exist
            $pics = str_replace(' ','_', $filenameToStor);
            //save in folder
            $pictures = $image;
            //create save in app
            Image::make($pictures)->fit(150, 150)->save( public_path('storage/' . $folder . '/' . $pics ) );
        }else{
            $pics = 'default.svg';
        }
        return $pics;
    }

    // function for update images
    public function imageUpdate($img_request, $image, $folder){
        if($img_request){
            // Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $image->getClientOriginalExtension();
            // Filename to store
            $filenameToStor = $filename.'_'.time().'.'.$extension;
            //remove space if exist
            $pics = str_replace(' ','_', $filenameToStor);
            //save in folder
            $pictures = $image;

            //update save in app
            Image::make($pictures)->fit(150, 150)->save( public_path('storage/' . $folder . '/' . $pics ) );

            return $pics;
        }
    }

}