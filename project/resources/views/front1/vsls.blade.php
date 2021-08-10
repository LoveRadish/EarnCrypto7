@extends('layouts.front')
@section('content')
    <section class="funnels">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    @foreach($vsls as $vsl)
                        <div class="funnel_card">
                            @if(Session::get('language') == 12 )
                                <img src="{{ asset('assets/images/vsls/2.png') }}" alt="" style="width:100%;">
                            @elseif(Session::get('language') == 13 )
                                <img src="{{ asset('assets/images/vsls/3.png') }}" alt="" style="width:100%;">
                            @else
                                <img src="{{ asset('assets/images/vsls/1.png') }}" alt="" style="width:100%;">
                            @endif
                            <h3>{{$langg->lang1547}} #1</h3>
                            <div class="custom_container">
                                <div class="card" style="border:none; margin:0px;">
                                    <a class="card-button" href='{{ route("front.vsl", $vsl->id )}}' target="blank">{{ $langg->lang1556 }}</a>
                                </div>
                                <input class="address_url" text="input" value='{{ route("front.vsl", $vsl->id )}}' />
                                <div class="custom_row">
                                    <div class="column">
                                        {{ $langg->lang1557 }}
                                    </div>
                                    <div class="column">
                                        Leads
                                    </div>
                                    <div class="column">
                                        {{ $langg->lang1534 }}
                                    </div>
                                </div>
                                <div class="custom_row">
                                    <div class="column_no_border">
                                        {{$vsl->hits}}
                                    </div>
                                    <div class="column_no_border">
                                        {{$vsl->leads}}
                                    </div>
                                    <div class="column_no_border">
                                        {{$members_count}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection