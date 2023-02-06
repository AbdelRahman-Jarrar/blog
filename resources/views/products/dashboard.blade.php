
@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>

        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div class="row">
	    @foreach ($listings as $listing)
            <div class="column"   >
                <div class="card" style="fixd">

                    <img src="{{ asset($listing->image) }}" class="card-img-top" alt="">
                    <div class="card-body">
                    <h5 class="card-title">Name:{{ $listing->name }}</h5>
                    <p class="card-text" style="height:100px;">details:{{ $listing->detail }}</p>
                    <p class="card-text">price:{{ $listing->price }}</p>
                    <a class="btn btn-info" href=" {{ route('products.show',$listing->id) }}">Show</a>
                    </div>
                </div>
            </div >

	    @endforeach

    </div>
    {!! $listings->links() !!}


<p class="text-center text-primary"><small></small></p>
@endsection
