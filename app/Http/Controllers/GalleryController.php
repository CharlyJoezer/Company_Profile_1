<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function updateDataGallery(Request $request){
        $request->validate([
            'gallery_image1' => 'image|mimes:png,jpg,jpeg|max:1024',
            'gallery_image2' => 'image|mimes:png,jpg,jpeg|max:1024',
            'gallery_image3' => 'image|mimes:png,jpg,jpeg|max:1024',
            'gallery_image4' => 'image|mimes:png,jpg,jpeg|max:1024',
            'gallery_image5' => 'image|mimes:png,jpg,jpeg|max:1024',
            'gallery_image6' => 'image|mimes:png,jpg,jpeg|max:1024',
        ]);
        $finalData = [
            'image1' => $request->gallery_image1,
            'image2' => $request->gallery_image2,
            'image3' => $request->gallery_image3,
            'image4' => $request->gallery_image4,
            'image5' => $request->gallery_image5,
            'image6' => $request->gallery_image6,
        ];
        $filteredArray = array_filter($finalData, function ($value) {
            return $value !== null && $value;
        });
        // try{
            $name_field = array_keys($filteredArray)[0];
            $getDataImage = Gallery::where('slug', $name_field)->first();
            if(!isset($getDataImage['slug'])){
                abort(404);
            }
            // CREATE STRING FOR IMAGE
            $randStrImage = Str::random(40);
            while (Gallery::where('slug', $randStrImage)->exists()) {
                $randStrImage = Str::random(40);
            }
            $extImage = $finalData[$name_field]->getClientOriginalExtension();
            $imageName = $randStrImage.'.'.$extImage;

            $updateData = Gallery::where('slug', $name_field)->update(['gambar' => $imageName]);

            if($updateData > 0){
                $finalData[$name_field]->storeAs('gallery_images', $imageName, 'local');
                if($getDataImage['gambar'] !== null){
                    Storage::disk('local')->delete("gallery_images/".$getDataImage['gambar']);   
                }
                return back()->with('success', 'Gambar berhasil diupdate!');
            }else{
                return back()->with('failed', 'Terjadi Kesalahan!');
            }

        // }catch(Exception){
        //     abort(500);
        // }
    }
}
