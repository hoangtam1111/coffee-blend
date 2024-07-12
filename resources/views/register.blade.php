@extends('layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('images/layouts/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Register</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Register</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
			<form action="{{ route('storeRegister') }}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
				@csrf
                <h3 class="mb-4 billing-heading">Register</h3>
	          	<div class="row align-items-end">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Username">Name</label>
                            <input type="text" class="form-control" placeholder="Username" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="text-sm text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="text-sm text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                            @error('password')
                            <div class="text-sm text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-4">
                            <div class="radio">
                                <button class="btn btn-primary py-3 px-4">Register</button>
                            </div>
                        </div>
                    </div>
                </div>

	          </form><!-- END -->
          </div> <!-- .col-md-8 -->
          </div>
        </div>
      </div>
    </section> <!-- .section -->

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){

		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            $('#quantity').val(quantity + 1);


		            // Increment

		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });

		});
	</script>

@endsection
