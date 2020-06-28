<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

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
   * @return Renderable
   */
  public function index()
  {
    $doctor = User::where('Role', 1)->where('status', 0)->where('delete', 0)->count();
    $store = User::where('Role', 2)->where('status', 0)->where('delete', 0)->count();
    $user = User::where('Role', 3)->where('status', 0)->where('delete', 0)->count();

    $data = [
      'doctor' => $doctor,
      'store' => $store,
      'user' => $user,
    ];

    //tampilan admin
    if (Auth::user()->role == 0) {
      return view('home', $data);
    } else if (Auth::user()->role == 1) {
      return view('home', $data);
    } else {
      return view('home', $data);
    }
  }
}
