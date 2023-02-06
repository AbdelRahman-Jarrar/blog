@extends('layouts.app')


@section('content')
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"><img src="{{ asset($product->image)   }}" /></div>
                      <div class="tab-pane" id="pic-2"><img src="" /></div>
                      <div class="tab-pane" id="pic-3"><img src="" /></div>
                      <div class="tab-pane" id="pic-4"><img src="" /></div>
                      <div class="tab-pane" id="pic-5"><img src="" /></div>
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                      <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="" /></a></li>
                      <li><a data-target="#pic-2" data-toggle="tab"><img src="" /></a></li>
                      <li><a data-target="#pic-3" data-toggle="tab"><img src="" /></a></li>
                      <li><a data-target="#pic-4" data-toggle="tab"><img src="" /></a></li>
                      <li><a data-target="#pic-5" data-toggle="tab"><img src="" /></a></li>
                    </ul>

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{ $product->name }}</h3>

                    <p class="product-description">{{ $product->detail }}</p>
                    <br><br>
                    <h4 class="price">current price: <span>${{ $product->price }}</span></h4>
                    <h5 class="colors">colors:
                        <span class="color orange"></span>
                        <span class="color green"></span>
                        <span class="color blue"></span>
                    </h5>
                    <form action="/add_to_cart" method="POST">
                        @csrf
                        <input type="hidden" name='product_id' value="{{ $product['id'] }}">
                        <input type="hidden" name='price' value="{{ $product['price'] }}">

                        <button class="add-to-cart btn btn-default">add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
