<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{
    public function getImage($path_image, $image_name){
            $path = '';
            if($path_image === 'parts'){
                $path = 'parts_images/' . $image_name;
            }else if($path_image === 'gallery'){
                $path = 'gallery_images/' . $image_name;
            }else{
                abort(404);
            }

            
            
            // return $path;
            if(!Storage::exists($path)){
                abort(404);
            }
            $image = Storage::get($path);
            $type = Storage::mimeType($path);
            
            return Response::make($image, 200, ['Content-Type' => $type]);
    }
}
