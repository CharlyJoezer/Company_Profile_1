<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Parts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PartsController extends Controller
{
    public function getDataParts(Request $request){
        try{
            if(isset($request->search)){
                $validation = Validator::make($request->all(), [
                    'search' => 'string|max:50'
                ]);
                if($validation->fails()){
                    return response()->json([
                        'message' => $validation->errors(),
                    ], 400);
                }
                $getDataParts = Parts::where('nama_parts', 'LIKE', "%$request->search%")->select('nama_parts as nama','gambar_parts as gambar')->paginate(4);
                return response()->json([
                    'message' => 'Success',
                    'data' => $getDataParts,
                ], 200);
            }else{
                $getDataParts = Parts::select('nama_parts as nama','gambar_parts as gambar')->paginate(4);
                return response()->json([
                    'message' => 'Success',
                    'data' => $getDataParts,
                ], 200);
            }
        }catch(Exception){
            return response()->json([
                'status' => 'SERVER 500'
            ], 500);
        }
    }
    public function viewcreateDataParts(){
        return view('Admin.Dashboard.Pages.tambah-parts',[
            'title' => 'Tambah Parts | Admin Panel',
            'css' => 'tambah-parts.css',
        ]);
    }
    public function createDataParts(Request $request){
        $dataRequest = $request->validate([
            'name' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        try{
            // CREATE STRING FOR IMAGE
            $randStrImage = Str::random(40);
            while (Parts::where('gambar_parts', $randStrImage)->exists()) {
                $randStrImage = Str::random(40);
            }
            $extImage = $request->file('image')->getClientOriginalExtension();
            $imageName = $randStrImage.'.'.$extImage;
            // STORE IMAGE
            $request->file('image')->storeAs('parts_images', $imageName, 'local'); 
            
            
            // CREATE SLUG PARTS
            $slugParts = Str::random(50);
            while (Parts::where('slug', $slugParts)->exists()) {
                $slugParts = Str::random(50);
            }

            $data = [
                'nama_parts' => $dataRequest['name'],
                'slug' => $slugParts,
                'gambar_parts' => $imageName,
            ];
            $createParts = Parts::create($data);
            if($createParts){
                return redirect('/admin/dashboard/parts')->with('success', '1 Data Berhasil ditambahkan!');
            }else{
                return redirect('/admin/dashboard/parts')->with('failed', 'Terjadi Kesalahan');
            }
        }catch(Exception $e){
            abort(500);
        }
    }
    public function viewEditDataParts($slug){
        try{
            $getDataParts = Parts::where('slug', $slug)->first();
            if(!isset($getDataParts)){
                abort(404);
            }
        }catch(Exception $e){
            abort(500);
        }
        return view('Admin.Dashboard.Pages.edit-parts',[
            'title' => 'Edit Parts | Admin Panel',
            'css' => 'edit-parts.css',
            'parts' => $getDataParts,
        ]);
    }
    public function updateDataParts(Request $request){
        $dataRequest = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'required|string',
            'image' => ($request->file('image') != null) ? 'required|image|mimes:jpeg,png,jpg|max:1024' : '',
        ]);

        try{
            $finalData = [
                'nama_parts' => $dataRequest['name'],
            ];
            if($request->file('image') != null){
                $randStrImage = Str::random(40);
                while (Parts::where('gambar_parts', $randStrImage)->exists()) {
                    $randStrImage = Str::random(40);
                }
                $extImage = $request->file('image')->getClientOriginalExtension();
                $imageName = $randStrImage.'.'.$extImage;
                $finalData['gambar_parts'] = $imageName;

                // STORE IMAGE
                $request->file('image')->storeAs('parts_images', $imageName, 'local'); 
                $getPartsData = Parts::where('slug', $dataRequest['slug'])->first();
                if(!isset($getPartsData)){
                    abort(404);
                }
                Storage::disk('local')->delete("parts_images/".$getPartsData['gambar_parts']);   
            }
            $updateData = Parts::where('slug', $dataRequest['slug'])->update($finalData);
            if($updateData > 0){
                return redirect('/admin/dashboard/parts')->with('success', 'Update data berhasil!');
            }else{
                return redirect('/admin/dashboard/parts')->with('failed', 'Terjadi Kesalahan');
            }
        }catch(Exception){
            abort(500);
        }
    }

    public function deleteDataParts(Request $request){
        $validation = Validator::make($request->all(), [
            'slug' => 'required|string'
        ]);
        if($validation->fails()){
            return back()->with('failed', "Gagal Menghapus ".$validation->errors()['slug'][0]);
        }

        // try{
            $getDataParts = Parts::where('slug', $request->slug)->get();
            if(!isset($getDataParts[0]['nama_parts'])){
                abort(404);
            }
            $deleteParts = Parts::where('slug', $request->slug)->delete();
            if($deleteParts > 0){
                // DELETE IMAGE PARTS STORAGE
                Storage::disk('local')->delete("parts_images/".$getDataParts[0]['gambar_parts']);   
                return back()->with('success', '1 Data berhasil dihapus!');
            }else{
                return back()->with('failed', 'Terjadi Kesalahan!');
            }
        // }catch(Exception $e){
        //     abort(500);
        // }
    }
}
