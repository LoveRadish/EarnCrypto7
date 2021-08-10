@extends('layouts.front')
@section('content')

    <style>
        .resources {
            margin: 50px 0px;
        }
        .resources .row div {
            margin-top: 20px;
        }
    </style>

    <section class="resources">
        <div class="container">
            @if(Session::get('language') == 12 )
                <div class="row" style="text-align:center;">
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/SP_Horizontal_1.jpg') }}" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/SP_Horizontal_2.jpg') }}" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/SP_Horizontal_3.jpg') }}" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/SP_Horizontal_4.jpg') }}" alt="" width="75%">
                    </div>
                </div>
            @elseif(Session::get('language') == 13 )
                <div class="row" style="text-align:center;">
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/PT_Horizontal_1.jpg') }}" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/PT_Horizontal_2.jpg') }}" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/PT_Horizontal_3.jpg') }}" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/PT_Horizontal_4.jpg') }}" alt="" width="75%">
                    </div>
                </div>
            @else
                <div class="row" style="text-align:center;">
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/EN_Horizontal_1.jpg') }}" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/EN_Horizontal_2.jpg') }}" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/EN_Horizontal_3.jpg') }}" alt="" width="75%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="{{ asset('assets/images/resources/EN_Horizontal_4.jpg') }}" alt="" width="75%">
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection