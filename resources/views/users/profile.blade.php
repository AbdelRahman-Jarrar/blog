@extends('layouts.app')

@section('content')

<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ asset($user->profilepic) ?? '/storage/images/profilepic/download.jpeg'}}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $user->name }}</h5>
              <p class="text-muted mb-1">{{ $user->role }}</p>
              <br>
                <div class="d-flex justify-content-center mb-2">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('Address') }}" > Add Address</a>
                    <form method="post" action="/add_profile_pic" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <input  type="file" class="custom-file-input" name="image" id="profilePicInput">
                    <label  class="btn btn-success" for="profilePicInput">profile pic
                    </label>
                    </form>
                </div>



            </div>

        </div>
          </div>

        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> {{ $user->name }} </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> {{ $user->email }} </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->phone ?? 'no phone found' }}</p>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">



                    <p class="text-muted mb-0"> {{ $user->address->Address ?? 'pls add streat'}},
                        {{ $user->address->Country ?? 'pls add contry'}},
                         {{ $user->address->zipCode?? 'pls add ZipCode' }}  </p>



                </div>
              </div>
            </div>
          </div>

  </section>



  @endsection
@section('scripts')
<script>
    $(document).on('change','#profilePicInput',function(){
        let form = $(this).closest('form');
        form.ajaxSubmit({
            dataType:"JSON",
            success:function(res){

            },
            error:function(exception){
                console.log(exception)
            }
        })
    })
</script>
@endsection
