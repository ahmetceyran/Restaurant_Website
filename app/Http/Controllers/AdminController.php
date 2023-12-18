<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function users()
    {

        if(Auth::id())
        {

            $data = User::all();

            return view('admin.users', compact('data'));

        }
        else
        {

            return redirect('login');

        }
        

    }

    public function delete_user($id)
    {
        $data = user::find($id);

        $data->delete();

        return redirect()->back();


    }

    public function foodmenu()
    {

        if(Auth::id())
        {

            $data = food::all();

        return view('admin.foodmenu', compact('data'));

        }
        else
        {

            return redirect('login');

        }
        
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

        if(Auth::id())
        {

            $data = food::find($id);

        return view('admin.update_view', compact('data'));

        }
        else
        {

            return redirect('login');

        }        
        

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

        if(Auth::id())
        {

            $data = reservation::all();

            return view('admin.admin_reservation', compact('data'));

        }
        else
        {

            return redirect('login');

        }

    }

    public function viewchef()
    {

        if(Auth::id())
        {

            $data = chef::all();

        return view('admin.adminchef', compact('data'));

        }
        else
        {

            return redirect('login');

        }
        

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

    public function delete_chef($id)
    {
        $data = chef::find($id);

        $data->delete();

        return redirect()->back();

    }

    public function updatechef_view($id)
    {

        if(Auth::id())
        {
            
        $data = chef::find($id);

        return view('admin.updatechef_view', compact('data'));

        }
        else
        {

            return redirect('login');

        }

    }

    public function update_chef(Request $request,$id)
    {

        $data = chef::find($id);

        $data->name = $request->name;
        $data->speciality = $request->speciality;

        $image=$request->image;

        if($image)
        {

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('chefimage', $imagename);

            $data->image=$imagename;

        }

        $data->save();

        return redirect()->back();

    }

    public function vieworders()
    {

        if(Auth::id())
        {
            
            $data = order::all();

        return view('admin.orders', compact('data'));

        }
        else
        {

            return redirect('login');

        }

    }

    public function search(Request $request)
    {

        $search = $request->search;
        
        $data = order::where('name', 'LIKE', '%'.$search.'%')->orWhere('foodname', 'LIKE', '%'.$search.'%')->get();

        return view('admin.orders', compact('data'));

    }


}
