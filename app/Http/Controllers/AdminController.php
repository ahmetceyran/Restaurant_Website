<?php

namespace App\Http\Controllers;

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

}
