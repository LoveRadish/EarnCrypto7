@extends('layouts.front')
@section('content')
    <section class="funnels">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    @foreach($funnels as $funnel)
                        <div class="funnel_card">
                            
                            @if(Session::get('language') == 12 )
                                <img src="{{ asset('assets/images/funnels/2.jpg') }}" alt="" style="width:100%;">
                            @elseif(Session::get('language') == 13 )
                                <img src="{{ asset('assets/images/funnels/3.jpg') }}" alt="" style="width:100%;">
                            @else
                                <img src="{{ asset('assets/images/funnels/1.jpg') }}" alt="" style="width:100%;">
                            @endif

                            <h3>{{$langg->lang1599}}</h3>
                            <div class="custom_container">
                                @php
                                    $user_id = Auth::user()->id;
                                    $user = "cp".$user_id;
                                    $lang = "en";
                                    if(Session::get('language') == 12 )
                                        $lang = "es";
                                    if(Session::get('language') == 13 )
                                        $lang = "pt";
                                @endphp
                                <div class="card" style="border:none; margin:0px;">
                                    <a class="card-button" href="{{ route('front.funnel',[$lang, $user,$funnel->url]) }}" target="blank">{{$langg->lang1556}}</a>
                                </div>
                                <input class="address_url" text="input" value="{{ route('front.funnel',[$lang, $user, $funnel->url]) }}" />
                                <div class="custom_row">
                                    <div class="column">
                                        {{$langg->lang1557}}
                                    </div>
                                    <div class="column">
                                        {{$langg->lang1533}}
                                    </div>
                                    <div class="column">
                                        {{$langg->lang1534}}
                                    </div>
                                </div>
                                <div class="custom_row">
                                    <div class="column_no_border">
                                        {{$funnel->hits}}
                                    </div>
                                    <div class="column_no_border">
                                        {{$leads}}
                                    </div>
                                    <div class="column_no_border">
                                        {{$members_count}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-8 col-12 vertical_center" style="align-items:center; margin: 30px 0px;">
                    
                    @if(Session::get('language') == 12 )
                        <iframe src="https://player.vimeo.com/video/578871849" width="80%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    @elseif(Session::get('language') == 13 )
                        <iframe src="https://player.vimeo.com/video/578871883" width="80%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    @else
                        <iframe src="https://player.vimeo.com/video/578871814" width="80%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    @endif
                    
                </div>
            </div>
        </div>
    </section>
@endsection