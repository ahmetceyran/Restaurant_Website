<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
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

    public function show_cart(Request $request, $id)
    {

        $count = cart::where('user_id', $id)->count();

        $data2 = cart::select('*')->where('user_id', '=', $id)->get();

        $data = cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();

        return view('show_cart', compact('count', 'data', 'data2'));

    }

    public function remove_cart($id)
    {

        $data = cart::find($id);

        $data->delete();

        return redirect()->back();

    }

    public function order_confirm(Request $request)
    {

        foreach($request->foodname as $key =>$foodname)
        {

            $data = new order;

            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];

            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;

            $data->save();

        }

        $userdata = Auth::user();

        $data2 = cart::where('user_id', '=', $userdata->id)->get();

        foreach($data2 as $data2)
        {

            $data2->delete();

        }

        return redirect()->back();

    }

}
