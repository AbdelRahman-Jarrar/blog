<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(6);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


    }
    public static function indexx(){

        $listings = Product::latest()->paginate(5);
        return view('/products/listings',compact('listings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

            }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'



        ]);
        $input= $request->all();

        // if ($request->hasFile('image'))
        // {
        //     $destination_path ='public/images/products';
        //     $image = $request->file('image');
        //     $image_name = $image->getClientOriginalName();

        //     $path = $request->file('image')->storeAs($destination_path,$image_name);
        //     $path_two=$request->file('image')->storeAs('storage/images/products/',$image_name);
        //     $input['image'] = $path_two;

        // }
        $imageName = time().'.'.$request->image->extension();

        $request->image->storeAs('images', $imageName);
        $input['user_id'] =Auth::user()->id;
        Product::create($input);
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
    public function cartlist(Request $request)
    {

        $userId=Auth::id();
        $carts=Cart::join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.*')
        ->get();
        // dd($carts);
            return view('/checkout/checkout', compact('carts'));
    }
    public function checkout(){

        function request() {
	$url = "https://eu-test.oppwa.com/v1/checkouts";
	$data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                "&amount=92.00" .
                "&currency=EUR" .
                "&paymentType=DB";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return $responseData;
}
$responseData = request();
return view('checkhyper', $responseData);


    }








    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',

        ]);
        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( Product $product )
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }




public function removeitem(Cart $cart){

        // DB::table('carts')->where('product_id', $id)->delete();
        $cart->delete();

        return redirect()->route('check')
                        ->with('success','Product deleted successfully');



}

static function getcart(){

 return  cart::where('user_id', '=', Auth::id())->count();


}


public function addToCart(Request $request){

    $product_id=$request->input('product_id');
    $product_name=$request->input('name');
        //  $saller=$request->input('user_id');

      $product_check= Product::where('id',$product_id);
         if($product_check){
        // dd($request->all());
           if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
              {
           return redirect()->route('listings')
                ->with('failed','already in cart'); ;
               }
            else{
              $cart= new Cart;
              $cart->user_id = Auth::id();
              $cart->saller=$request->saller;
              $cart->product_id=$request->product_id;

              $cart->save();
          return redirect('/listings');


}

    }
        }

public function makeorder(Request $request, Cart $cart){
    // dd($request->all());
    // print_r($request->all());die;
    $input= $request->all();
    function request() {
        $url = route('checkhyper');
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=92.00" .
                    "&currency=EUR" .
                    "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $responseData;
    }
    $responseData = request();


// foreach($input['data'] as $data){
// // dd($data);
//     Item::create(
//         [
//         'name'=> $data['name'],
//         'qty'=> $data['qty'],
//         'price'=> $data['price'],
//         'buyer'=> $data['buyer'],
//         'saller'=>$data['saller'],
//         'total'=> ((int)$data['price']* (int)$data['qty']),
//         'status'=> 'pending'
//         ]
//     );
// }

//         $id= Auth::id();
//         DB::table('carts')->where('user_id', $id)->delete();
//         $cart->delete();

    return redirect('/listings');


}

public function accept(){

    // $orders = DB::select('select * from items');
    // return view('/products/order', compact('orders'))
    // ->with('i', (request()->input('page', 1) - 1) * 5);

    // $carts=Cart::join('products','carts.product_id','=','products.id')
    // ->where('carts.user_id',$userId)
    // ->select('products.*','carts.*')
    // ->get();


    $orders=Item::join('items','items.saller','=','users.id')
    ->where('items.saller', 'users.id')
    ->select('items.*','users.*')
    ->get();
        dd($orders);
    // $orders = Item::latest('id')->paginate(5);
    // return view('/products/order',compact('orders'))
    //     ->with('i', (request()->input('page', 1) - 1) * 5);

}
public function removeorder(Cart $cart){

    // DB::table('carts')->where('product_id', $id)->delete();
    $cart->delete();

    return redirect()->route('check')
                    ->with('success','Product deleted successfully');



}

public function merchantupdate(Request $request, Item $item){


    $item->update($request->all());




}
}
