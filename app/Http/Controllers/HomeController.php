<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use DB;
class HomeController extends Controller
{
    public function index() 
    {
        $files = File::all();

       // $files = DB::table('files')
       // ->join('users', 'users.id', '=', 'files.user_id')
      
      // ->select('users.name as user','users.cid','files.id','files.name','files.size','files.type')
      // ->get();

        return view('home.index', [
            'files' => $files
        ]);    }
}
