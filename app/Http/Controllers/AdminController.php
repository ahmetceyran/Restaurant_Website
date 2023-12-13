<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\User;
use App\Models\Reservation;
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

    public function update_view($id)
    {
        $data = food::find($id);

        return view('admin.update_view', compact('data'));

    }

    public function update_food(Request $request,$id)
    {

        $data = food::find($id);

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $image=$request->image;

        if($image)
        {

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('foodimage', $imagename);

            $data->image=$imagename;

        }

        $data->save();

        return redirect()->back();

    }

    public function viewreservation()
    {
        $data = reservation::all();

        return view('admin.admin_reservation', compact('data'));

    }

    public function viewchef()
    {

        return view('admin.adminchef');

    }

    public function add_chef(Request $request)
    {

        $data = new chef;

        $data->name = $request->name;
        $data->speciality = $request->speciality;

        $image=$request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('chefimage', $imagename);

        $data->image = $imagename;
        

        $data->save();

        return redirect()->back();

    }


}
