@extends('frontend.layouts.master')
@section('content')
<section class="secBanner" style="background-image: url('{{ asset('frontend_assets/images/bg_banner.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="info">
                    <h1 class="vc_banner">Your Roadside Rescue<br> Team</h1>
                    <p class="ft-18">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed<br> diam nonumy eirm tempor Invidunt.</p>
                </div>
                <div class="bn_form">
                    <form action="{{route('requested-services')}}" class="form" method="GET">
                        <div class="field loct">
                            <input id="location_map" class="form-control" name="location" type="text" placeholder="Enter your address" required>
                        </div>
                        <div class="field srv">
                            <select class="form-control" name="serv" required>
                                <option value="null" disabled selected>Choose a service</option>
                                @foreach($data_category as $key => $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <p><input class="btn_bn" type="submit" value="Search"></p>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="bn_img">
                    <img src="{{ asset('frontend_assets/images/vector.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="secAbout">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <div class="img">
                    <img src="{{ asset('frontend_assets/images/abt_img.png')}}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="txt">
                    <h2>About us</h2>
                    <p class="ft-18">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum</p>
                    <a href="javascript:;" class="btn-custom">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="secService" style="background-image: url('{{ asset('frontend_assets/images/bg_serv.jpg') }}');">
    <div class="container">
        <div class="txt text-center">
            <h2>Our services</h2>
        </div>
        <div class="row srvGrids">
            <div class="col-12 col-md-4">
                <div class="svBox">
                    <div class="thumb">
                        <img decoding="async" src="{{ asset('frontend_assets/images/sv_1.png') }}" alt="">
                    </div>
                    <div class="ctn">
                        <h3>Towing</h3>
                        <p>Lorem ipsum dolor sit amet, conset sadipscing elitr, sed diam nonumy eirmod tempor</p>
                        <a href="javascript:;" class="read_more">Read More <span class="icon"><i class="fa-solid fa-chevron-right"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="svBox">
                    <div class="thumb">
                        <img decoding="async" src="{{ asset('frontend_assets/images/sv_2.png') }}" alt="">
                    </div>
                    <div class="ctn">
                        <h3>Battery</h3>
                        <p>Lorem ipsum dolor sit amet, conset sadipscing elitr, sed diam nonumy eirmod tempor</p>
                        <a href="javascript:;" class="read_more">Read More <span class="icon"><i class="fa-solid fa-chevron-right"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="svBox">
                    <div class="thumb">
                        <img decoding="async" src="{{ asset('frontend_assets/images/sv_3.png') }}" alt="">
                    </div>
                    <div class="ctn">
                        <h3>Flat Tire</h3>
                        <p>Lorem ipsum dolor sit amet, conset sadipscing elitr, sed diam nonumy eirmod tempor</p>
                        <a href="javascript:;" class="read_more">Read More <span class="icon"><i class="fa-solid fa-chevron-right"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="svBox">
                    <div class="thumb">
                        <img decoding="async" src="{{ asset('frontend_assets/images/sv_4.png')}}" alt="">
                    </div>
                    <div class="ctn">
                        <h3>Fuel on the spot</h3>
                        <p>Lorem ipsum dolor sit amet, conset sadipscing elitr, sed diam nonumy eirmod tempor</p>
                        <a href="javascript:;" class="read_more">Read More <span class="icon"><i class="fa-solid fa-chevron-right"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="svBox">
                    <div class="thumb">
                        <img decoding="async" src="{{ asset('frontend_assets/images/sv_5.png')}}" alt="">
                    </div>
                    <div class="ctn">
                        <h3>Car Unlock</h3>
                        <p>Lorem ipsum dolor sit amet, conset sadipscing elitr, sed diam nonumy eirmod tempor</p>
                        <a href="javascript:;" class="read_more">Read More <span class="icon"><i class="fa-solid fa-chevron-right"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="svBox">
                    <div class="thumb">
                        <img decoding="async" src="{{ asset('frontend_assets/images/sv_6.png')}}" alt="">
                    </div>
                    <div class="ctn">
                        <h3>On-Site repairs</h3>
                        <p>Lorem ipsum dolor sit amet, conset sadipscing elitr, sed diam nonumy eirmod tempor</p>
                        <a href="javascript:;" class="read_more">Read More <span class="icon"><i class="fa-solid fa-chevron-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="javascript:;" class="btn-custom">View All Services</a>
        </div>
    </div>
</section>

<section class="secStore">
    <div class="container">
        <div class="row" style="background-image: url('{{ asset('frontend_assets/images/storeBg.png') }}');">
            <div class="col-12 col-md-8">
                <div class="txt">
                    <h2>Get the our app for free from online store</h2>
                    <p class="ft-18 ">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                    <div class="btn_download">
                        <a href="javascript:;" class="btn-custom g_play">
                            <span class="icon"><i class="fa-brands fa-google-play"></i></span>
                            <span class="text">Download From</span>
                            Google Play
                        </a>
                        <a href="javascript:;" class="btn-custom apple">
                            <span class="icon"><i class="fa-brands fa-apple"></i></span>
                            <span class="text">Download From</span>
                            App Store
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4"></div>
        </div>
    </div>
</section>

<section class="secLoct" style="background-image: url('{{ asset('frontend_assets/images/map.jpg') }}');"></section>

<script>

    async function AutoFill() {
        const fromInput = document.getElementById('location_map');
        const fromAutocomplete = new google.maps.places.Autocomplete(fromInput);
    }

    window.onload = AutoFill;

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF9q3rW1aL52AJ_Yy2KIYVKQyjNn7PLIs&libraries=places&callback=initMap" async defer loading="async"></script>
@endsection
