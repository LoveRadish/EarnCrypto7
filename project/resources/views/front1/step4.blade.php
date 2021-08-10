@extends('layouts.front')

@section('content')
<section class="hero-area">
    <div class="container">
        <div class="row" style="margin-bottom:25px;">
            <h3 style="color:red;font-weight:bold;">{{$langg->lang1558}}</h3>
        </div>
        <div class="row" style="margin-bottom:25px;">
            <div class="col-lg-7 decrease-padding">
                
                @if(Session::get('language') == 12 )                   
                    <iframe src="https://player.vimeo.com/video/576191267" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                @elseif(Session::get('language') == 13 )
                    <iframe src="https://player.vimeo.com/video/576191723" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                @else
                    <iframe src="https://player.vimeo.com/video/573632448" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                @endif
                
            </div>
            <div class="col-lg-5 decrease-padding vertical_center">
                <div class="card">
                    <a class="card-button" href='{{ route("user-profile") }}' >{{ $langg->lang1583}}</a>
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