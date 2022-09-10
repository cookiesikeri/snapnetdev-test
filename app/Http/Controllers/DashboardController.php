<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{


    public function index()
    {
        $citizens = Citizen::latest()->take(10)->get();;


        return view('cms.index', compact('citizens'));
    }

    public function DeleterUser($id) {
        User::destroy($id);
        Session::flash('success', 'User Deleted successfully!');
        return redirect()->back();
      }

      public function Userdetails($id)

      {
        $citizens = Citizen::where('id', $id)->first();

          return view('cms.user_details', compact(['citizens']));
      }
}
