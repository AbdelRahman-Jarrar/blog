@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf


         <div class="row">



            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
            <strong>Product Image:</strong>

            <div class="input-group mb-3">

                <div class="input-group-prepend">
                  {{-- <span class="input-group-text">Upload</span> --}}
                </div>
                <div class="custom-file">
                  {{-- <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label> --}}

                  {{-- <label class="form-label" for="customFile" name="image" id="inputGroupFile01"></label>
                  <input type="file" class="form-control" id="customFile" for="inputGroupFile01"/> --}}
                  <input type="file" class="form-control" name="image" />

                  <button type="submit" class="btn btn-sm">Upload</button>
              </form>
                </div>
              </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Price:</strong>
		            <input type="text" name="price" class="form-control" placeholder="Price">
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small> </small></p>
@endsection
