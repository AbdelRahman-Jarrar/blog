@extends('layouts.app')

@section('content')
<form action="/add_Address" method="POST" >
    @csrf
<div class="container">
    <div class="row">

         <div class="col-md-8 order-md-1">

            <h4 class="mb-3">Address</h4>


                <div class="mb-3">
                    <label style="text-left" for="address"></label>
                    <input type="text" class="form-control" id="Address"  name="Address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="Country">Country</label>
                        <select class="custom-select d-block w-100" id="Country" name="Country" required="">
                            <option value="">Choose...</option>
                            <option>Jordan</option>
                        </select>
                        <div class="invalid-feedback"> Please select a valid country. </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="Ctate">State</label>
                        <select class="custom-select d-block w-100" id="State" name="State" required="">
                            <option value="">Choose...</option>
                            <option>Amman</option>
                            <option>Irbid</option>
                            <option>Zarqa</option>
                            <option>Balqa</option>
                            <option>Aqaba</option>

                        </select>
                        <div class="invalid-feedback"> Please provide a valid state. </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zipCode">Zip</label>
                        <input type="text" name="zipCode" class="form-control" placeholder="ZipCode">
                        <div class="invalid-feedback"> Zip code required. </div>
                    </div>
                </div>

                    <button class="add-to-cart btn  btn-success">Add Address</button>

           </div>


    </div>

</div>
</form>



@endsection
