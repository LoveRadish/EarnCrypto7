@extends('layouts.front')
@section('content')
    <section class="traffic">
        <div class="container">
            <h3>{{ $langg->lang1584 }} </h3>
            <div class="udimi_box">
                <img src="{{ asset('assets/images/traffic/udimi.png') }}" alt="" width="100%">
                
                <h3 style="color: #ffa800; text-align:center; font-weight:bold;">{{ $langg->lang1588 }}</h3>
                
                <div style="margin-top:30px;">
                    <a class="card-button" style="padding:10px;" href="{{route('front.training')}}">{{ $langg->lang1588 }}</a>
                </div>
                
                
            </div>
        </div>
    </section>
@endsection