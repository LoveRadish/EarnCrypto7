@extends('layouts.front')
@section('content')
    <style>
        .vimeo_video {
            width: 60%;
        }
        .go_back {
            max-width: 120px;
            margin: 30px;
        }
        @media screen and (max-width: 900px) {

            .vimeo_video {
                width: 90%;
            }
        }
    </style>
    <section class="training">
        <div class="container">
            <div class="go_back">
                <button class="card-button" onclick="history.back()" >{{ $langg->lang1586 }}</button>
            </div>
            <div style="text-align:center;">
                <iframe class="vimeo_video" src="https://player.vimeo.com/video/{{$link}}" height="400px" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
        </div>
    </section>
@endsection