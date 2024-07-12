
@extends('layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('images/layouts/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Product Detail</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product Detail</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    @if($product)
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-5 ftco-animate">
                        @if ($product->product_type_id==1)
                            <a href="images/menu-2.jpg" class="image-popup"><img src="{{ asset('images/products/drinks/'.$product->image) }}" class="img-fluid" alt="Colorlib Template"></a>
                        @else
                            <a href="images/menu-2.jpg" class="image-popup"><img src="{{ asset('images/products/desserts/'.$product->image) }}" class="img-fluid" alt="Colorlib Template"></a>
                        @endif
                    </div>
                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                        <h3>{{ $product->name }}</h3>
                        <p class="price"><span>${{ $product->price }}</span></p>
                        <p>{{ $product->description }}</p>
                        <form action="{{ route('cart.add-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="row mt-4">
                                <div class="w-100"></div>
                                <div class="input-group col-md-6 d-flex mb-3">
                                    <span class="input-group-btn mr-2">
                                        <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                                            <i class="icon-minus"></i>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                    <span class="input-group-btn ml-2">
                                        <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                            <i class="icon-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <p><button type="submit" class="btn btn-primary py-3 px-5" style="color: white !important">Add to Cart</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @include('components.related_product')

  <script>
		const quantityInput = document.getElementById('quantity');
        const decreaseButton = document.querySelector('.quantity-left-minus');
        const increaseButton = document.querySelector('.quantity-right-plus');

        // Add event listeners to the buttons
        decreaseButton.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
        });

        increaseButton.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue < 100) {
            quantityInput.value = currentValue + 1;
        }
        });
	</script>

@endsection
