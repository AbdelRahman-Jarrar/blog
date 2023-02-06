<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Address;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();
        $input['password'] =Hash::make($request->password);

        $user = User::create($input);

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    public function storeAddres(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        $address = new Address();
        $address->Address = $request->Address;
        $address->Country = $request->Country;
        $address->State = $request->State;
        $address->zipCode = $request->zipCode;
        $address->user_id = Auth::id();
        $address->save();
        $request->session()->put('address',$address['Address']);
        return redirect('/profile/ ')->with('status', 'Blog Post Form Data Has Been inserted');

    }
    public function storeProfilePic(Request $request)
    {
        $input= $request->all();

        if ($request->hasFile('image'))
        {
            $destination_path ='public/images/profilepic';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();

            $path = $request->file('image')->storeAs($destination_path,$image_name);
            $path_two=$request->file('image')->storeAs('/storage/images/profilepic',$image_name);
            $input['profilepic'] = $path_two;

        }

        auth()->user()->update($input);
        return response()->json([
            'image'=>asset($path_two)
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function showProfile()
    {

        $user = Auth::user();


        return view('users/profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {


        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user )
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => [],
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user->update($request->all());


        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
