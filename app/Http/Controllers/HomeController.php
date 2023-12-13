<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        $data = food::all();

        return view('home', compact('data'));

    }

    public function redirect()
    {
        $data = food::all();

        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {
            return view('admin.adminhome');
        }
        else
        {
            return view('home', compact('data'));
        }

    }

    public function reservation(Request $request)
    {

        if(Auth::id())
        {
            $data = new reservation;

            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->guest = $request->guest;
            $data->date = $request->date;
            $data->time = $request->time;
            $data->message = $request->message;

            $data->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }

        

    }


}
