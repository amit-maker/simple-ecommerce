<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Feature;
use App\Models\Arrival;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (Auth::id()) 
        {
            if (Auth::user()->usertype=='0') {

                $search = $request['search'] ?? "";
                if ($search != ""){
                    $feature = feature::where('name','LIKE','%'.$search.'%')->get();
                    $arrival = arrival::where('name','LIKE','%'.$search.'%')->get();
                } 
                else{
                    $feature= feature::all();
                    $arrival= arrival::all();

                }

                $data= compact('feature','arrival','search');
        
                return view('home')->with($data);;
            }
            else
            {
                return view('admin.index');
            }
        }
    }
}
