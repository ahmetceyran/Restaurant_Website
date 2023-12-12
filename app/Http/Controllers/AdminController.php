<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function users()
    {
        $data = User::all();

        return view('admin.users', compact('data'));

    }

    public function delete_user($id)
    {
        $data = user::find($id);

        $data->delete();

        return redirect()->back();


    }

    public function foodmenu()
    {
        $data = food::all();

        return view('admin.foodmenu', compact('data'));

    }

    public function add_food(Request $request)
    {

        $data = new food;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $image=$request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('foodimage', $imagename);

        $data->image = $imagename;
        

        $data->save();

        return redirect()->back();

    }

    public function delete_food($id)
    {
        $data = food::find($id);

        $data->delete();

        return redirect()->back();

    }

}
