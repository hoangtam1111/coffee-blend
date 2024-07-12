<section class="ftco-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-md-5">
                <div class="heading-section text-md-right ftco-animate">
              <span class="subheading">Discover</span>
            <h2 class="mb-4">Our Menu</h2>
            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
          </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    @if(count($products_in_menu)>0)
                        @foreach ($products_in_menu as $product)
                            <div class="col-md-6">
                                <div class="menu-entry">
                                    <a href="{{ route('product-single', $product->id) }}" class="img" style="background-image: url({{ asset('images/products/drinks/'.$product->image) }});"></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
