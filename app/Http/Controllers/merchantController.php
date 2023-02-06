<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class merchantController extends Controller
{

    public function index(Request $request)
    {

        $data = User::orderBy('id','DESC')->where('role','driver')->paginate(5);
        return view('merchant.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }



    public function show($id)
    {
        $user = User::find($id);
        return view('merchant.show',compact('user'));
    }




    public function create()
    {
        return view('merchant.create');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('merchant.index')
                        ->with('success','User deleted successfully');
    }


    public function edit($id)
    {
        $user = User::find($id);


        return view('merchant.edit',compact('user','roles','userRole'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        return redirect()->route('merchant.index')
                        ->with('success','User created successfully');
    }



}
