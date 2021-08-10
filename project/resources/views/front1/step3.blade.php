@extends('layouts.front')

@section('content')
<section class="hero-area">
    <div class="container">
        <div class="row" style="margin-bottom:25px;">
            <h3 style="color:red;font-weight:bold;">{{$langg->lang1558}}</h3>
        </div>

        <?php

            $video_array = [573632440, 580179680, 580180214, 580179764, 580179851];
            if( Session::get('language') == 12 )
                $video_array = [576191306, 580299227, 580299323, 580299389, 580299446, 580299514];
            if( Session::get('language') == 13 )
                $video_array = [576191755, 579127875, 579127938, 579127923, 579127894, 579127969, 579127833, 579127980, 579127958, 579127991];

        ?>

        <div class="row" style="margin-bottom:25px;">
            <div class="col-lg-7 decrease-padding">             
                @for($i = 0; $i < count($video_array); $i++)
                    @if( $video_array[$i] != 576191755 && Session::get('language') == 13 )
                        <div class="margin_bottom_30" style="border:6px solid grey;">
                            <iframe src="https://player.vimeo.com/video/{{$video_array[$i]}}" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                        </div>
                    @else
                        <div class="margin_bottom_30">
                            <iframe src="https://player.vimeo.com/video/{{$video_array[$i]}}" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                        </div>
                    @endif
                @endfor
            </div>
            <div class="col-lg-5 decrease-padding">
                <div class="card">
                    <span class='card-title'>{{ $langg->lang1580}}</span>
                    @if(!Auth::user()->company_link)
                        <a class="card-button" href="{{$sponsor->company_link}}" target="blank">{{ $langg->lang1581}}</a>
                    @else
                        <a class="card-button" href="{{Auth::user()->company_link}}" target="blank">{{ $langg->lang1581}}</a>
                    @endif
                </div>
                <div class="card">
                    <a class="card-button" href='{{ route("front.step4") }}' >{{ $langg->lang1582}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
	<script>
        $(window).on('load',function() {

            setTimeout(function(){

                $('#extraData').load('{{route('front.extraIndex')}}');

            }, 500);
        });

	</script>
@endsection