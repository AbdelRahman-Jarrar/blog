@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('MerchantProduct.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>price</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
            <td>{{ $product->price }}</td>

	        <td>
                    <a class="btn btn-info" href="{{ route('MerchantProduct.show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('MerchantProduct.edit',$product->id) }}">Edit</a>


                    <form action="{{ route('MerchantProduct.destroy', [$product->id]) }}" method="POST" style="display:inline">
                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn btn-danger ">Delete</button>
                    </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $products->links() !!}


<p class="text-center text-primary"><small></small></p>
@endsection