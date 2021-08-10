@extends('layouts.front')
@section('content')

    <style>
        .leader_board span {
            font-size: 25px;
        }
    </style>

    <section class="leader_board">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-12">
                    <div class="leader_board_title_div">
                        <h3>{{$langg->lang1562}}</h3>
                    </div>
                    @foreach ($sponsor_ranking_30 as $key => $value) 
                        <span> {{$key+1}}. {{$value}}</span><br>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-12">
                    <div class="leader_board_title_div">
                        <h3>{{$langg->lang1563}}</h3>
                    </div>
                    @foreach ($sponsor_ranking_3 as $key => $value) 
                        <span> {{$key+1}}. {{$value}}</span><br>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-12">
                    <div class="leader_board_title_div">
                        <h3>{{$langg->lang1564}}</h3>
                    </div>
                    @foreach ($sponsor_ranking_6 as $key => $value) 
                        <span> {{$key+1}}. {{$value}}</span><br>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-12">
                    <div class="leader_board_title_div">
                        <h3>{{$langg->lang1565}}</h3>
                    </div>
                    @foreach ($sponsor_ranking_12 as $key => $value) 
                        <span> {{$key+1}}. {{$value}}</span><br>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection