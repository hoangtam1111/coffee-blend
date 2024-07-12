@extends('layouts.app')
@section('content')

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('images/layouts/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">About Us</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    @include('components.our_story')

    @include('components.customer_say')

    @include('components.our_menu')

    @include('components.number')
@endsection
