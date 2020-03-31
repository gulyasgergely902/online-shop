<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showProfile(){
    	$details = \DB::table('user-details')->where('id', Auth::id())->first();
    	$myListings = \DB::table('items')->where('added-by', Auth::id())->get();
        return view('profile', [
        	'details' => $details,
        	'myListings' => $myListings
        ]);
    }

    public function changeAddress(Request $request){
    	\DB::table('user-details')->where('id', Auth::id())->update(['address' => $request->input('new-address')]);
    	return redirect('/profile')->with(['message' => 'You changed your address successfully!', 'alert' => 'alert-success']);
    }

    public function becomeSeller(Request $request){
    	\DB::table('user-details')->where('id', Auth::id())->update(['isSeller' => 1]);
    	return redirect('/profile')->with(['message' => 'You became a seller!', 'alert' => 'alert-success']);
    }

    public function saveSettings(Request $request){
        if($request->input("darkModeCheck") == "on"){
            $request->session()->put('darkMode', 'on');
        } else {
            $request->session()->put('darkMode', 'off');
        }

        return redirect('/profile')->with(['message' => 'Settings saved!', 'alert' => 'alert-success']);
    }
}
