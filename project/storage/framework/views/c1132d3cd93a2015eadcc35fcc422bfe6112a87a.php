<?php $__env->startSection('content'); ?>

    <style>
        .main_body {
            margin: 50px;
        }
        .resources .card_div {
            padding: 10px;
            background: #f8f8f8;
            border: 1px solid #383838;
            margin: 0px;
        }

        .resources .card_body {
            margin: 20px;
        }

        .resources .custom_button {
            background: none;
            border: none;
            outline: none;
            color: #383838;
            font-size: 24px;
            font-weight: 700;
            text-decoration: underline;
        }
        .resources .item {
            border: 1px solid #b1b1b1 !important;
        }
        .btn.focus, .btn:focus {
            box-shadow: none;
        }
    </style>

    <section class="resources">
        <div class="container">
            <div class="main_body">
                <div class="item">
                    <p class="card_div">
                        <button class="btn custom_button" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                            Swipe Email #1
                        </button>
                    </p>
                    <div class="collapse card_body" id="collapseExample1">
                        <div class="card card-body" style="text-align:left;">
                            <?php if(Session::get('language') == 12 ): ?>
                                Hola, acabo de encontrar un curso que te enseña cómo aprovechar la revolución de las criptomonedas y también te muestra cómo ganar criptomonedas los siete días de la semana.
                                Solía ​​ver personas publicando en línea sobre cómo ganaban dinero invirtiendo en monedas digitales, pero siempre lo encontré demasiado complejo y nunca pensé que podría hacerlo.
                                Este sitio hizo las cosas tan simples que cualquiera puede implementarlo.
                                El acceso es completamente gratuito. Simplemente vaya al enlace de abajo y cree una cuenta. Una vez dentro del sistema, simplemente mire los videos e implemente los pasos.
                                Acceda aquí ----> ENLACE A LA PÁGINA DEL EMBUDO
                            <?php elseif(Session::get('language') == 13 ): ?>
                                Olá, eu acabei de encontrar um curso que ensina como tirar proveito da revolução das criptomoedas e também te mostra como ganhar cripto sete dias por semana.
                                Eu costumava ver pessoas postando online sobre como eles estavam ganhando dinheiro investindo em moedas digitais, mas sempre achei muito complexo e nunca pensei que algum dia seria capaz de fazer isso.
                                Esse site tornou as coisas tão simples que qualquer pessoa pode implementar.
                                O acesso é totalmente gratuito. Basta acessar o link abaixo e criar uma conta. Uma vez dentro do sistema, basta assistir aos vídeos e implementar os passos.
                                Acesse aqui ----> LINK PARA A PÁGINA DO FUNIL
                            <?php else: ?>
                                Hi there, I just came across a course that teaches how to take advantage of the crypto revolution and it also shows you how to earn crypto seven days a week. <br>
                                I used to see people online posting about how they were making a killing investing in crypto, but I always thought it was complex that I didn’t think I was ever going to be able to do it.<br>
                                This makes things so easy that anyone can do it.<br>
                                It’s completely free to get access. All you have to do is access the link below and create an account. Once inside the system all you do is watch the videos and implement the steps.<br>
                                Access here ----> LINK TO FUNNEL PAGE<br>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <p class="card_div">
                        <button class="btn custom_button" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                            Swipe Email #2
                        </button>
                    </p>
                    <div class="collapse card_body" id="collapseExample2">
                        <div class="card card-body" style="text-align:left;">
                            <?php if(Session::get('language') == 12 ): ?>
                                Hola,
                                No sé si recibió mi correo electrónico ayer, pero esto es muy importante. Si siempre ha querido aprender a ganar con criptomonedas todos los días, esto será lo más fácil que pueda hacer.
                                Ejecute y acceda al enlace de abajo y comience a ver los videos ahora mismo. Ya sabes cómo es este mercado de criptomonedas, de la noche a la mañana podrías estar obteniendo grandes ganancias.
                                Acceda aquí ----> ENLACE A LA PÁGINA DEL EMBUDO
                            <?php elseif(Session::get('language') == 13 ): ?>
                                Olá,
                                Não sei se você recebeu meu e-mail ontem, mas isso é muito importante. Se você sempre quis aprender como ganhar com criptomoedas todos os dias, essa será a coisa mais fácil que você fará.
                                Corra e acesse o link abaixo e comece a assistir os vídeos agora mesmo. Você sabe como é esse mercado de criptomoedas, de um dia para o outro você pode estar fazendo grandes lucros.
                                Acesse aqui ----> LINK PARA A PÁGINA DO FUNIL
                            <?php else: ?>
                                Hi there,<br>
                                I am not sure you got my email yesterday, but this is very important. If you ever wanted to learn how to earn crypto everyday this will be the easiest thing you will do.<br>
                                Hurry up and access the link below and start watching the videos right away. You know how crypto is, from one day to the next you can be earning some major profits.<br>
                                Access here ----> LINK TO FUNNEL PAGE<br>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <p class="card_div">
                        <button class="btn custom_button" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                            Swipe Email #3
                        </button>
                    </p>
                    <div class="collapse card_body" id="collapseExample3">
                        <div class="card card-body" style="text-align:left;">
                            <?php if(Session::get('language') == 12 ): ?>
                                Hola,
                                Esto es muy importante... esta podría ser su última oportunidad de obtener acceso a un sistema completamente gratuito que lo guía paso a paso sobre cómo comenzar a ganar criptomonedas todos los días.
                                No sé cuánto tiempo estará disponible este sistema de forma gratuita, así que no pierda el tiempo para registrarse y comenzar a ver los videos en el backoffice.
                                Además, esté atento a las reuniones especiales que tendremos pronto. Estas reuniones están llenas de valor con la última y mejor información sobre cómo ganar más criptomonedas todos los días.
                                Acceda aquí ----> ENLACE A LA PÁGINA DEL EMBUDO
                            <?php elseif(Session::get('language') == 13 ): ?>
                                Olá,
                                Isso é muito importante... essa pode ser sua última chance de obter acesso a um sistema totalmente gratuito que te orienta passo a passo sobre como começar a ganhar criptomoedas todos os dias.
                                Não sei por quanto tempo esse sistema estará disponível gratuitamente, então não perca tempo para se cadastrar e começar a assistir os vídeos no backoffice.
                                Além disso, fique atento às reuniões especiais que teremos em breve. Essas reuniões são cheias de valor com as melhores e mais recentes informações sobre como ganhar mais criptomoedas todos os dias.
                                Acesse aqui ----> LINK PARA A PÁGINA DO FUNIL
                            <?php else: ?>
                                Hi there,<br>
                                This is really important… this might be your last chance to get access to a completely free system that walks you through step-by-step on how to start earning crypto everyday.<br>
                                I don’t know how long this system will be free, so don’t waste any time to register for a free account and start watching the videos in the backoffice.<br>
                                Also, stay tuned for special meetings that we will have coming up soon. These meetings are packed with full value of the latest and greatest information on how to earn more crypto everyday.<br>
                                Access here ----> LINK TO FUNNEL PAGE<br>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <p class="card_div">
                        <button class="btn custom_button" type="button" data-toggle="collapse" data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4">
                            Swipe Email #4
                        </button>
                    </p>
                    <div class="collapse card_body" id="collapseExample4">
                        <div class="card card-body" style="text-align:left;">
                            <?php if(Session::get('language') == 12 ): ?>
                                Hola,
                                ¿Has visto lo que publicamos en nuestro grupo privado de Telegram? Si no es así, debe entrar y leer lo que dice la gente.
                                Para acceder a nuestro grupo privado de Telegram, simplemente inicie sesión en el sistema EarnCrypto7 y haga clic en el botón PASO 1. Esto lo llevará directamente a la aplicación y puede iniciar sesión de inmediato.
                                ¡¡¡Te veo allá!!!
                                Acceda aquí ----> ENLACE A LA PÁGINA DEL EMBUDO
                            <?php elseif(Session::get('language') == 13 ): ?>
                                Olá,
                                Você já viu o que postamos em nosso Grupo Privado do Telegram? Se não, você precisa entrar e ler o que as pessoas estão dizendo.
                                Para acessar nosso grupo privado do Telegram, basta acessar o sistema EarnCrypto7 e clicar no botão do PASSO 1. Isso o levará direto para o aplicativo e você pode simplesmente entrar nele imediatamente.
                                Te vejo lá!!!
                                Acesse aqui ----> LINK PARA A PÁGINA DO FUNIL
                            <?php else: ?>
                                Hi there,<br>
                                Have you seen what we have posted in our private Telegram Group yet? If not you need to join and read what people are saying.<br>
                                In order to access our private Telegram group just access the EarnCrypto7 system and click on the button from the STEP 1. This will take you straight to the app and you can just join it right away.<br>
                                I will see you there!!!<br>
                                Access here ----> LINK TO FUNNEL PAGE<br>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        
        $(function(){
            $('.selectpicker').selectpicker();
        });

        $(document).ready(function() {  
            $('[data-toggle="collapse"]').click(function() 
            {
                $(this).toggleClass( "active" );
                if ($(this).hasClass("active")) 
                {
                    $(this).text("Hide");
                }
                else {
                    $(this).text("Show");
                }
            });
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>