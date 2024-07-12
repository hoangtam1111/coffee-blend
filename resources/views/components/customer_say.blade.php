
<section class="ftco-section img" id="ftco-testimony" style="background-image: url({{ asset('images/layouts/bg_1.jpg') }});"  data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Testimony</span>
          <h2 class="mb-4">Customers Says</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
    </div>
    <div class="container-wrap">
      <div class="row d-flex no-gutters">
        @foreach ($evalutes as $evalute)
            <div class="col-lg align-self-sm-end ">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;{{ $evalute->message }}&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="{{ asset('images/avatars/'.$evalute->user->avatar) }}" alt="">
                        </div>
                        <div class="name align-self-center">{{ $evalute->user->name }} <span class="position">{{ $evalute->subject }}</span></div>
                    </div>
                </div>
            </div>
        @endforeach
      </div>
    </div>
</section>
