
@extends('layouts.app')
<head>
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}" >


</head>

@section('content')



    @if ($message = Session::get('failed'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div class="row">
	    @foreach ($listings as $listing)
            <div class="column"   >
                {{-- <div class="card" style="fixd">

                    <img src="{{ asset($listing->image) }}" class="card-img-top" alt="">
                    <div class="card-body">
                    <h5 class="card-title">Name:{{ $listing->name }}</h5>
                    <p class="card-text" style="height:100px;">details:{{ $listing->detail }}</p>
                    <p class="card-text">price:{{ $listing->price }}</p>
                    <a class="btn btn-info" href=" {{ route('products.show',$listing->id) }}">Show</a>
                    </div>
                </div> --}}



                    <div class="shell">
                      <div class="container">
                        <div class="row">
                          <div class="">
                            <div class="wsk-cp-product">
                              <div class="wsk-cp-img">
                                <img src="{{ asset($listing->image) }}" />
                              </div>
                              <div class="wsk-cp-text">
                                <div class="category">
                                  <a  href=" {{ route('products.show',$listing->id) }}">more detail</a>
                                </div>
                                <div class="title-product">
                                  <h3>{{ $listing->name }}</h3>
                                </div>
                                <div class="description-prod">
                                  <p>Description: {{ $listing->detail }}</p>
                                </div>
                                <div class="card-footer">
                                  <div class="wcf-left"><span class="price">$ {{ $listing->price }}</span></div>
                                  <form action="/add_to_cart" method="POST">
                                    @csrf
                                    <input type="hidden" name='product_id' value="{{ $listing['id'] }}">
                                    <input type="hidden" name='price' value="{{ $listing['price'] }}">
                                    <input type="hidden" name='saller' value="{{ $listing['user_id'] }}">

                                    <div class="wcf-right " >
                                    <button class="button2" type="submit"  href=" ">Add to cart </button>
                                </div>
                            </form>

                                </div>
                              </div>
                            </div>
                          </div>



                          {{-- <div class="col-md-6">
                            <div class="wsk-cp-product">
                              <div class="wsk-cp-img">
                                <img src="https://3.bp.blogspot.com/-eDeTttUjHxI/WVSvmI-552I/AAAAAAAAAKw/0T3LN6jABKMyEkTRUUQMFxpe6PLvtcMMwCPcBGAYYCw/s1600/001-culture-clash-matthew-gianoulis.jpg" alt="Product" class="img-responsive" />
                              </div>
                              <div class="wsk-cp-text">
                                <div class="category">
                                  <span>Ethnic</span>
                                </div>
                                <div class="title-product">
                                  <h3>My face not my heart</h3>
                                </div>
                                <div class="description-prod">
                                  <p>Description Product tell me how to change playlist height size like 600px in html5 player. player good work now check this link</p>
                                </div>
                                <div class="card-footer">
                                  <div class="wcf-left"><span class="price">Rp500.000</span></div>
                                  <div class="wcf-right"><a href="#" class="buy-btn"><i class="zmdi zmdi-shopping-basket"></i></a></div>
                                </div>
                              </div>
                            </div>
                          </div> --}}


                        </div>
                      </div>
                    </div>



            </div >

	    @endforeach

    </div>


    {!! $listings->links() !!}


<p class="text-center text-primary"><small></small></p>
@endsection
