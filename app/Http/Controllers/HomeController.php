<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Parts;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewHome(){
        try{
            $gallery = Gallery::paginate(6);
        }catch(Exception){
            abort(500);
        }
        return view('Home', [
            'title' => 'ABT SOLUTION',
            'gallery' => $gallery,
        ]);
    }
}
