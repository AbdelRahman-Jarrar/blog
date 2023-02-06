<?php
use App\Http\Controllers\ProductController;
$total=ProductController::getcart();
?>
@extends('layouts.app')
@section('content')

<h1> cart table</h1>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<form method="POST" action="/makeorder">
    @csrf
<table class="table">
    <thead>
      <tr>
        <th scope="col">Item Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($carts as $key => $cart)
{{-- @dd($cart); --}}
      <tr>
        <input type="hidden" name="data[{{ $key }}][product_id]" class="form-control" value="{{ $cart->product_id }}">
        <input type="hidden" name="data[{{ $key }}][user_id]" class="form-control" value="{{ $cart->user_id }}">
        <input type="hidden" name="data[{{ $key }}][buyer]" class="form-control" value="{{ Auth::user()->id }}">
        <th  value="{{ $cart->name }}">{{ $cart->name }}</th>
        <input type="hidden" name="data[{{ $key }}][name]" class="form-control" value="{{ $cart->name }}">
        <td  value="{{ $cart->price }}">{{ $cart->price }}</td>
        <input type="hidden" name="data[{{ $key }}][price]" class="form-control" value="{{ $cart->price }}">
        <input type="hidden" name="data[{{ $key }}][saller]" class="form-control" value="{{ $cart->saller }}">

        <td>
            <div class="qty mt-1" >
            <span class="minus bg-dark"
            data-id="{{ $cart->id }}"
            >-</span>
            <input
            type="number"
             style="width: 1cm;" class="count "
              id="number{{ $cart->id }}"
              name="data[{{ $key }}][qty]" value="{{ $cart->qty }}">
            <span class="plus bg-dark" data-id="{{ $cart->id }}">+</span>
            </div>
        </td>
        <td >{{ $cart->price  }}</td>

        <td>

     <a class="btn btn-danger" href="/click_delete/{{ $cart->id }}">  delete </a>


        </td>
      </tr>

      @endforeach


    </tbody>
  </table>
  <button class="btn btn-success">make order</button>
</form>


    <footer class="my-5 pt-5 text-muted text-center text-small">

    </footer>
@endsection
