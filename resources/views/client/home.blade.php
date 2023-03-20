@extends('layouts.client')

@section('content')
        <!-- START banner -->
        <section class="site-hero overlay" style="background-image: url({{ asset('frontend/images/hero_4.jpg') }})" data-stellar-background-ratio="0.5">
            <div class="container">
              <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade-up">
                  <span class="custom-caption text-uppercase text-white d-block  mb-3">Welcome To 5 <span class="fa fa-star text-primary"></span>   Hotel</span>
                  <h1 class="heading">A Best Place To Stay</h1>
                </div>
              </div>
            </div>
      
            <a class="mouse smoothscroll" href="#next">
              <div class="mouse-icon">
                <span class="mouse-wheel"></span>
              </div>
            </a>
          </section>
          <!-- END banner -->
          <!--START Search  -->
          <section class="section bg-light pb-0"  >
            <div class="container">
             
              <div class="row check-availabilty" id="next">
                <div class="block-32" data-aos="fade-up" data-aos-offset="-200">
      
                  <form action="#">
                    <div class="row">
                      <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                        <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="icon-calendar"></span></div>
                          <input type="text" id="checkin_date" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                        <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="icon-calendar"></span></div>
                          <input type="text" id="checkout_date" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                        <div class="row">
                          <div class="col-md-6 mb-3 mb-md-0">
                            <label for="adults" class="font-weight-bold text-black">Adults</label>
                            <div class="field-icon-wrap">
                              <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                              <select name="" id="adults" class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4+</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-3 mb-md-0">
                            <label for="children" class="font-weight-bold text-black">Children</label>
                            <div class="field-icon-wrap">
                              <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                              <select name="" id="children" class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4+</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3 align-self-end">
                        <button class="btn btn-primary btn-block text-white">Check Availabilty</button>
                      </div>
                    </div>
                  </form>
                </div>
      
      
              </div>
      
            </div>
          </section>
          <!-- END Search  -->
      
          <!-- START Welcome  -->
          <section class="py-5 bg-light">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
                  <figure class="img-absolute">
                    <img src="{{ asset('frontend/images/food-1.jpg') }}" alt="Image" class="img-fluid">
                  </figure>
                  <img src="{{ asset('frontend/images/img_1.jpg') }}" alt="Image" class="img-fluid rounded">
                </div>
                <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
                  <h2 class="heading">Welcome!</h2>
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                  <p><a href="#" class="btn btn-primary text-white py-2 mr-3">Learn More</a> <span class="mr-3 font-family-serif"><em>or</em></span> <a href="https://youtu.be/FbaSW0Rdsp0"  data-fancybox class="text-uppercase letter-spacing-1">See video</a></p>
                </div>
                
              </div>
            </div>
          </section>
          <!-- END Welcome  -->
          
          <!-- START Rooms  -->
          <section class="section">
            <div class="container">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                  <h2 class="heading" data-aos="fade-up">Rooms &amp; Suites</h2>
                  <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
              </div>
              <div class="row">
                @foreach($categories as $category)
                  <div class="item col-md-6 col-lg-4" data-aos="fade-up">
                    <a href="#" class="room">
                      <figure class="img-wrap">
                        <img  src="{{ $category->images->count() > 0 ? asset('uploads/categories/' . $category->images->first()->url) : '' }}" alt="Free website template" class="img-fluid mb-3">
                      </figure>
                      <div class="p-3 text-center room-info">
                        <h2>{{ $category->name }}</h2>
                        <span class="text-uppercase letter-spacing-1">{{ $category->price }}/PER NIGHT</span>
                      </div>
                    </a>
                  </div>
                @endforeach
              </div>
            </div>
          </section>
          <!-- END Welcome  -->
          
          <!-- Start Photo  -->
          {{-- <section class="section slider-section bg-light">
            <div class="container">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                  <h2 class="heading" data-aos="fade-up">Photos</h2>
                  <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="slider-item">
                      <a href="{{ asset('frontend/images/slider-1.jpg') }}" data-fancybox="images" data-caption="Caption for this image"><img src="{{ asset('frontend/images/slider-1.jpg') }}" alt="Image placeholder" class="img-fluid"></a>
                    </div>
                    <div class="slider-item">
                      <a href="{{ asset('frontend/images/slider-2.jpg') }}" data-fancybox="images" data-caption="Caption for this image"><img src="{{ asset('frontend/images/slider-2.jpg') }}" alt="Image placeholder" class="img-fluid"></a>
                    </div>
                    <div class="slider-item">
                      <a href="{{ asset('frontend/images/slider-3.jpg') }}" data-fancybox="images" data-caption="Caption for this image"><img src="{{ asset('frontend/images/slider-3.jpg') }}" alt="Image placeholder" class="img-fluid"></a>
                    </div>
                    <div class="slider-item">
                      <a href="{{ asset('frontend/images/slider-4.jpg') }}" data-fancybox="images" data-caption="Caption for this image"><img src="{{ asset('frontend/images/slider-4.jpg') }}" alt="Image placeholder" class="img-fluid"></a>
                    </div>
                    <div class="slider-item">
                      <a href="{{ asset('frontend/images/slider-5.jpg') }}" data-fancybox="images" data-caption="Caption for this image"><img src="{{ asset('frontend/images/slider-5.jpg') }}" alt="Image placeholder" class="img-fluid"></a>
                    </div>
                    <div class="slider-item">
                      <a href="{{ asset('frontend/images/slider-6.jpg') }}" data-fancybox="images" data-caption="Caption for this image"><img src="{{ asset('frontend/images/slider-6.jpg') }}" alt="Image placeholder" class="img-fluid"></a>
                    </div>
                    <div class="slider-item">
                      <a href="{{ asset('frontend/images/slider-7.jpg') }}" data-fancybox="images" data-caption="Caption for this image"><img src="{{ asset('frontend/images/slider-7.jpg') }}" alt="Image placeholder" class="img-fluid"></a>
                    </div>
                  </div>
                  <!-- END slider -->
                </div>
              
              </div>
            </div>
          </section> --}}
          <!-- Start Photo  -->
@endsection