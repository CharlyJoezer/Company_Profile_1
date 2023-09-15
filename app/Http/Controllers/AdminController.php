<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Parts;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function viewAdminLogin(){
        return view('Admin.Auth.login');
    }
    public function processAdminLogin(Request $request){
        $dataRequest = $request->validate([
            'username' => 'required|string|max:60',
            'password' => 'required|string|max:60',
        ]);

        try{
            if (Auth::attempt($dataRequest)) {
                $request->session()->regenerate();
     
                return redirect('/admin/dashboard/beranda');
            }else{
                return back()->with('invalid', 'Username / Password Salah!');
            }
        }catch(Exception $e){
            abort(500);
        }
    }

    public function processAdminlogout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

    public function viewDashboardBeranda(){
        return view('Admin.Dashboard.Pages.beranda',[
            'title' => 'Beranda | Admin Panel',
            'css' => 'home.css',
        ]);
    }
    public function viewDashboardParts(Request $request){
        try{
            if(isset($request->search)){
                $request->validate([
                    'search' => 'string|max:50'
                ]);
                $data = Parts::where('nama_parts', 'LIKE', "%$request->search%")->paginate(5);
            }else{
                $data = Parts::orderBy('id_parts', 'desc')->paginate(5);
            }
        }catch(Exception){
            abort(500);
        }
        return view('Admin.Dashboard.Pages.parts',[
            'title' => 'Parts | Admin Panel',
            'css' => 'parts.css',
            'parts' => $data,
            'prev_search' => $request->search,
        ]);
    }
    public function viewDashboardGallery(){
        try{
            $getGallery = Gallery::all();
        }catch(Exception){
            abort(500);
        }
        return view('Admin.Dashboard.Pages.gallery',[
            'title' => 'Gallery | Admin Panel',
            'css' => 'gallery.css',
            'gallery' => $getGallery,
        ]);
    }
}
