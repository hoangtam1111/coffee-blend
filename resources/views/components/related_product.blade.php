<style>
    .name-product{
        height: 52px;
    }
    .name-product,.description{
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
          <span class="subheading">Discover</span>
        <h2 class="mb-4">Related products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>
    <div class="row">
        @if ($products)
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="{{ route('product-single',$product->id) }}" class="img" style="background-image: url({{ asset('images/products/drinks/'.$product->image) }});"></a>
                        <div class="text text-center pt-4">
                            <form action="{{ route('cart.add-cart') }}" method="POST">
                                @csrf
                                <h3><a href="{{ route('product-single',$product->id) }}" class="name-product">{{ $product->name }}</a></h3>
                                <p class="description">{{ $product->description }}</p>
                                <p class="price"><span>${{ $product->price }}</span></p>
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <p><button type="submit" class="btn btn-primary btn-outline-primary" style="color: white ">Add to Cart</button></p>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    </div>
</section>
