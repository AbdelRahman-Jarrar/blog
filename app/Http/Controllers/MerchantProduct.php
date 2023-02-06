<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MerchantProduct extends Controller
{

    public function index()
    {
        $products = Product::latest()->where( 'user_id',Auth::id())->paginate(6);
        return view('MerchantProduct.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 6);


    }
    public function create()
    {
        return view('MerchantProduct.create');
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',

        ]);
        $input= $request->all();

        if ($request->hasFile('image'))
        {
            $destination_path ='public/images/products';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();

            $path = $request->file('image')->storeAs($destination_path,$image_name);
            $path_two=$request->file('image')->storeAs('storage/images/products/',$image_name);
            $input['image'] = $path_two;

        }

        $input['user_id'] =Auth::user()->id;
        Product::create($input);
        return redirect()->route('MerchantProduct.index')
                        ->with('success','Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('MerchantProduct.show',compact('product'));
    }

    public function edit(Product $product ,$id)
    {

        $productt = Product::find($id);

        return view('MerchantProduct.edit',compact('productt'));
    }


    public function destroy(Product $product,$id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('MerchantProduct.index')
                        ->with('success','Product deleted successfully');
    }

}
