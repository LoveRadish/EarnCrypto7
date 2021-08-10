@extends('layouts.front')
@section('content')
    <section class="training">
        <div class="container">
            <?php
                if(Session::get('language') == 12 )                   
                    $url_array = array('576191222','576191185','576191142','576191094','576191046','576198734');
                elseif(Session::get('language') == 13 )
                    $url_array = array('576191689','576191660','576191626','576191593','576191565','576191530');
                else
                    $url_array = array('573631958','573632184','573632203','573632212','573632246','573632276');                
            ?>
            @for( $i=0; $i < 6; $i++)
                <div class="row row_background">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="margin-top:20px;">
                        <span class="lesson_badge">{{ $langg->lang1587 }} {{$i+1}}</span>
                        <h3>{{ $langg->lang1588 }}</h3>
                        <p>{{ $langg->lang1589 }}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="text-align: right; padding: 50px;">
                        <a class="unlock_button" href="{{route('front.trainning_video',$url_array[$i])}}">{{ $langg->lang1588 }}</a>
                    </div>
                </div>
            @endfor
        </div>
    </section>



@endsection