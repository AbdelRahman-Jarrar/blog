@extends('layouts.app')


@section('content')



    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1>Orders</h1>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>quantity</th>
            <th>price</th>
            <th>total</th>
            <th>seller</th>
            <th width="280px">statis</th>
            <th width="280px">action</th>

        </tr>
	    @foreach ($orders as $order)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $order->name }}</td>
	        <td>{{ $order->qty }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->saller }}</td>
            <td>{{ $order->status }}</td>

            <td>
            <a class="btn btn-info" href="">accepit</a>
            <a class="btn btn-primary" href="">deny</a>
            </td>
        </tr>

	        </td>
	    @endforeach
    </table>




<p class="text-center text-primary"><small></small></p>
@endsection
