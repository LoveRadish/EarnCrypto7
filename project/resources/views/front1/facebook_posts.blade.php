@extends('layouts.front')
@section('content')

    <style>
        .facebook .img {
            width: 40%;
        }
        @media only screen and (max-width: 991px) {
            .facebook .img {
                width: 70%;
            }
        }
    </style>

    <section class="facebook">
        <div class="container">
            <div style="margin:50px 0px; text-align:center;">
                @if(Session::get('language') == 12 )
                    <img src="{{ asset('assets/images/resources/SP_Horizontal_1.jpg') }}" alt="" class="img">
                @elseif(Session::get('language') == 13 )
                    <img src="{{ asset('assets/images/resources/PT_Horizontal_1.jpg') }}" alt="" class="img">
                @else
                    <img src="{{ asset('assets/images/resources/EN_Horizontal_1.jpg') }}" alt="" class="img">
                @endif
                <!-- <div style="margin-top:50px;">
                    <input class="facebook_inputs" type="text" value="https://bitcoinincomesystem.com/images/resources/fb-post-1.jpg"/>
                </div> -->
                <div style="margin-top:50px;">
                    @if(Session::get('language') == 12 )
                        <textarea class="facebook_inputs" id="w3review" name="w3review" rows="5">Hola chicos ... Acabo de encontrar un sistema gratuito que les muestra cómo empezar a ganar criptomonedas todos los días. No estoy seguro de cuánto tiempo estará disponible este sistema de forma gratuita. Pero si está interesado en obtener acceso, simplemente comente a continuación o envíe un mensaje privado y le enviaré el enlace de acceso.</textarea>
                    @elseif(Session::get('language') == 13 )
                        <textarea class="facebook_inputs" id="w3review" name="w3review" rows="5">Oi, pessoal… Acabei de encontrar um sistema gratuito que mostra como começar a ganhar criptomoedas todos os dias. Não tenho certeza de quanto tempo este sistema estará disponível gratuitamente. Mas se você tem interesse em obter acesso é só comentar abaixo ou mandar uma mensagem privada que eu vou te enviar o link de acesso..</textarea>
                    @else
                        <textarea class="facebook_inputs" id="w3review" name="w3review" rows="5">Hi guys…&#13;&#10;I just found a free system that walks you through on how to start earning crypto everyday. I am not sure how long this system will be available for free. But if you are interested in getting access just comment below or send me a private message and I will share it with you.</textarea>                        
                    @endif
                    </textarea>
                </div>
            </div>
        </div>
    </section>
@endsection