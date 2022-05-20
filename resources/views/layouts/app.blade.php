<head>
    <meta charset="UTF-8">
    <title>Betstat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta-tag')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/media-queries.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/owl.carousel.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
</head>

<header>


    <section class="betStat-header d-flex-spaceBetween container">
        <div class="betStat-leftMenu d-flex-spaceBetween">
            <div class="betStat-logo">
                <a href="/"><img src="{{ asset('images/betstatLogo-ukraine.png') }}" alt=""></a>
            </div>
            <div class="betStat-navBar">
                <ul>
                    <li><a href="{{ route('main') }}">სპორტი</a></li>
                    <li><a href="{{ route('promotions', ['cat'=>'']) }}">აქციები</a></li>
{{--                    <li><a href="{{ route('table-games')  }}">სამაგიდო თამაშები</a></li>--}}
{{--                    <li><a href="{{ route('casino') }}">კაზინო</a></li>--}}
                    <li><a href="{{ route('news', ['cat'=>'']) }}">NEWS</a></li>
                </ul>
            </div>
        </div>
        @auth
            <div class="betStat-rightMenu d-flex-start logged-in">
                @endauth
                @guest
                    <div class="betStat-rightMenu d-flex-start logged-out">
                        @endguest
                        <span class="menuToggleIcon"></span>
                        <div class="betStat-userLogo"
                             @auth
                             @if(Auth::user()->fb_id && Auth::user()->avatar)
                             style="background: url('{{Auth::user()->avatar}}');background-size: 100%;"
                             @elseif(!Auth::user()->fb_id && Auth::user()->avatar)
                             style="background: url('uploads/users/{{Auth::user()->avatar}}');background-size: 100%;"
                            @endif
                            @endauth
                        >

                        </div>
                        @auth
                            <div class="betStat-userNameInfo">
                                <p>{{Auth::user()->name}}</p>
                                <span>#{{Auth::user()->id}}</span>
                            </div>
                        @endauth
                        <div class="betStat-logInRegister">
                            <a class="logIn" href="#">ავტორიზაცია</a>
                            <a class="register" href="#">რეგისტრაცია</a>
                            <div class="client-popup-container light">
                                <div class="client-popup-overlay"></div>
                                <div class="client-popup light">
                                    <div class="cp-header">
                                        <div data-tab="login-tab" class="tab cp-login d-flex-spaceCenter current">
                                            ავტორიზაცია
                                        </div>
                                        <div data-tab="register-tab" class="tab cp-register d-flex-spaceCenter">
                                            რეგისტრაცია
                                        </div>
                                    </div>
                                    <div id="login-tab" class="cp-body current">
                                        <form class="loginPopup" method="POST" action="login">
                                            @csrf
                                            <a class="cp-close" href="#"></a>
                                            <div class="client-popup-row">
                                                <label for="mail">ელ-ფოსტა ან ლოგინი</label>
                                                <input name="name" type="text" id="mail">
                                            </div>

                                            <div class="client-popup-row">
                                                <label for="password">პაროლი</label>
                                                <input name="password" type="password" minlength="8" oninvalid="setCustomValidity('პაროლი უნდა შეიცავდეს მინიმუმ 8 სიმბოლოს')" id="password">
                                            </div>
                                            <div class="client-popup-row rememberUpdate d-flex-spaceBetween">
                                                <input type="checkbox" id="remember">
                                                <label for="remember">დაიმახსოვრე</label>

                                                <a class="forgotPassLink" href="#">დაგავიწყდა პაროლი?</a>
                                            </div>
                                            <div class="client-popup-row">
                                                <input type="submit" class="client-popup-button d-flex-spaceCenter"
                                                       value="ავტორიზაცია">
                                            </div>
                                            <p class="orLogin">ან გაიარე ავტორიზაცია</p>
                                            <a href="{{ url('auth/facebook') }}"
                                               class="authorise-fb d-flex-spaceCenter">ავტორიზაცია FACEBOOK ით</a>
                                            <a href="{{ route('login.google') }}"
                                               class="authorise-google d-flex-spaceCenter">ავტორიზაცია GOOGLE ით</a>
                                        </form>
                                        <form class="forgotPasswordPopup">
                                            @csrf
                                            <a class="cp-close" href="#"></a>
                                            <div class="client-popup-row">
                                                <label for="send-mail">შეიყვანეთ ელ-ფოსტა</label>
                                                <input name="email" type="email" id="send-mail">
                                            </div>
                                            <div class="client-popup-row">
                                                <input type="submit" class="client-popup-button d-flex-spaceCenter send-mail" value="გაგზავნა">
                                            </div>
                                            <p class="orLogin">ან გაიარე ავტორიზაცია</p>
                                            <a href="{{ url('auth/facebook') }}" class="authorise-fb d-flex-spaceCenter">ავტორიზაცია FACEBOOK ით</a>
                                            <a href="{{ route('login.google') }}" class="authorise-google d-flex-spaceCenter">ავტორიზაცია GOOGLE ით</a>
                                        </form>
                                        <div class="successPopupMsg">
                                            <a class="cp-close" href="#"></a>
                                            <div class="successPopupMsgTxt">წარმატებით გაიგზავნა</div>
                                        </div>
                                    </div>
                                    <div id="register-tab" class="cp-body">
                                        <form method="POST"  id="registerForm"  action="{{ route('register') }}">
                                            @csrf
                                            <a class="cp-close" href="#"></a>
                                            <div class="client-popup-row">
                                                <label for="mail1">ელ-ფოსტა</label>
                                                <input name="email" type="text" required oninvalid="setCustomValidity('შეავსე სწორი ფორმატით')"  id="mail1">
                                            </div>
                                            <div class="client-popup-row">
                                                <label for="login">ლოგინი</label>
                                                <input name="name" type="text" required id="login">
                                            </div>
                                            <div class="client-popup-row">
                                                <label for="password1">პაროლი</label>
                                                <input name="password" type="password" id="password1">
                                            </div>
                                            <div class="client-popup-row">
                                                <label for="password2">გაიმეორე პაროლი</label>
                                                <input name="password_confirmation" type="password" id="password2">
                                            </div>
                                            <div class="client-popup-row">
                                                <button type="submit" class="client-popup-button d-flex-spaceCenter">
                                                    რეგისტრაცია
                                                </button>
                                            </div>
                                            <p class="orRegister">ან გაიარე რეგისტრაცია</p>
                                            <a href="{{ url('auth/facebook') }}" class="authorise-fb d-flex-start">რეგისტრაცია</a>
                                            <a href="{{ route('login.google') }}" class="authorise-google d-flex-start">რეგისტრაცია</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="betStat-userParameters">
                            <a href="{{route('userPage')}}" class="profile">პროფილი</a>
                            <a href="{{route('userPageChangePassword')}}" class="parameters">პარამეტრები</a>
                            <a href="#" class="logOut"
                               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">გასვლა</a>
                            <form id="logout-form" action="logout" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
            </div>
    </section>
</header>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="badCredentials">{{$error}}</div>
    @endforeach
@endif

@yield('content')
<div id="fb-root"></div>

<footer>
    <div class="footer-inner">
        <div class="footer-inner-content container d-flex-spaceBetween">
            <div class="footer-inner-leftSide">
                <a href="/"></a>
            </div>
            <div class="footer-inner-rightSide d-flex-spaceBetween">
                <a target="_blank" href="https://www.facebook.com/Betstat.ge/" class="fb"></a>
                <a target="_blank" href="https://www.youtube.com/channel/UCVAqWsaQA2f0ZkkMqMAKGNg" class="youtube"></a>
            </div>
        </div>
    </div>
    <div class="footer-desc">
        <div class="footer-desc-content container">
            <div class="info">
                <p>კონტაქტი</p>
                <div class="info-desc">
                    <p>info@betstat.ge</p>
                    <p>მისამართი: </p>
                    <p>ტელ:  </p>
                </div>
            </div>
            <div class="info category">
                <p>ჩვენი კატეგორიები</p>
                <div class="info-desc">
                    <a href="{{ route('main') }}">სპორტი</a>
                    <a href="{{ route('promotions') }}">აქციები</a>
{{--                    <a href="{{ route('table-games')  }}">სამაგიდო თამაშები</a>--}}
{{--                    <a href="{{ route('casino') }}">კაზინო</a>--}}
                    <a href="{{ route('news') }}">NEWS</a>
                </div>
            </div>
            <div class="info league">
                <p>ლიგები</p>
                <div class="info-desc">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <div class="allRights">
            <p>ყველა უფლება დაცულია © 2021</p>
            <span>betstat.ge</span>
        </div>
        <!-- TOP.GE ASYNC COUNTER CODE -->
        <div id="top-ge-counter-container" data-site-id="115563"></div>
        <script async src="//counter.top.ge/counter.js"></script>
        <!-- / END OF TOP.GE COUNTER CODE -->
    </div>
</footer>

<script>
    $(document).ready(function () {
        let mailButton = $('.send-mail')
        mailButton.on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{route('recoveryPassword')}}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {email: $('#send-mail').val()},
                success: function (data) {
                }
            });
        });
    });

    <!-- Load Facebook SDK for JavaScript -->
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

        // <![CDATA[
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];
            if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
            js.async=true;
            js.src="//platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js,fjs);
        }}(document,"script","twitter-wjs");
        // ]]>
</script>
<script>
    var password1 = document.getElementById('password1');
    var password2 = document.getElementById('password2');

    var checkPasswordValidity = function() {
        console.log(password1.value.length)
        if(password1.value.length < 8) {
            password1.setCustomValidity('პაროლი უნდა შეიცავდეს მინიმუმ 8 სიმბოლოს');
        } else {
        if (password1.value != password2.value) {
            password1.setCustomValidity('პაროლები არ ემთხვევა ერთმანეთს');
        } else {
            password1.setCustomValidity('');
        }
        }
    };

    password1.addEventListener('change', checkPasswordValidity, false);
    password2.addEventListener('change', checkPasswordValidity, false);

    var form = document.getElementById('registerForm');
    form.addEventListener('submit', function() {
        var mail1 = document.getElementById('mail1');
        var login = document.getElementById('login');
        event.preventDefault();
        checkPasswordValidity();

        $.ajax({
            url: "{{route('checkUserExist')}}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {email: mail1.value, userName: login.value},
            success: function (data) {
                console.log(data.exist);
                if(data.exist) {
                    if(data.type === 'email') {
                        alert('ეს მეილი უკვე დარეგისტრირებულია')
                    } else {
                        alert('ეს იუზერი უკვე დარეგისტრირებულია')
                    }
                } else {
                    form.submit();
                }
            }
        });


    }, false);
</script>
