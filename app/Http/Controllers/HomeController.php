<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

use App\Folder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $user = auth()->user();

    //     return view('home')->with(compact("user"));
    // }

    // public function currentUser(Request $request){    
           
    //     if($request->ajax()){
    //         $user = auth()->user();
    //         return response()->json($user);
    //     }

    // }



    public function index() {
        // return view('home');

        $item = Folder::find(1); // 1: HOME


        return view('fixed.home',['item' => $item, 'isFixed' => true]);

    }


}
