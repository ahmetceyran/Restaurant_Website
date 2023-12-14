<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        $data = food::all();
        $data2 = chef::all();

        return view('home', compact('data', 'data2'));

    }

    public function redirect()
    {
        $data = food::all();

        $data2 = chef::all();

        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {
            return view('admin.adminhome');
        }
        else
        {
            $user_id = Auth::id();

            $count = cart::where('user_id', $user_id)->count();

            return view('home', compact('data', 'data2', 'count'));
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

    public function add_cart(Request $request, $id)
    {

        if(Auth::id())
        {
            $userdata = Auth::user();

            $cart = new cart;

            $cart->user_id = $userdata->id;
            $cart->user_name = $userdata->name;
            $cart->food_id = $id;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }

        

    }


}
