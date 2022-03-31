<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <title>BetStats</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/fonts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/owl.carousel.min.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    </head>
    <body class="antialiased">
    <header>
        <section class="betStat-header d-flex-spaceBetween container">
            <div class="betStat-leftMenu d-flex-spaceBetween">
                <div class="betStat-logo">
                    <a href=""><img src="images/BetStats-logo.png" alt=""></a>
                </div>
                <div class="betStat-navBar">
                    <ul>
                        <li><a class="active" href="/Betstats/index.html">სპორტი</a></li>
                        <li><a href="/Betstats/promotions.html">აქციები</a></li>
                        <li><a href="/Betstats/table-games.html">სამაგიდო თამაშები</a></li>
                        <li><a href="/Betstats/casino.html">კაზინო</a></li>
                        <li><a href="/Betstats/news.html">NEWS</a></li>
                    </ul>
                </div>
            </div>
            <div class="betStat-rightMenu d-flex-start logged-out">
                <span class="menuToggleIcon"></span>
                <div class="betStat-userLogo">

                </div>
                <div class="betStat-userNameInfo">
                    <p>BetStat</p>
                    <span>#098908</span>
                </div>
                <div class="betStat-logInRegister">
                    <a class="logIn" href="#">ავტორიზაცია</a>
                    <a class="register" href="#">რეგისტრაცია</a>
                    <div class="client-popup-container light">
                        <div class="client-popup-overlay"></div>
                        <div class="client-popup light">
                            <div class="cp-header">
                                <div data-tab="login-tab" class="tab cp-login d-flex-spaceCenter current">ავტორიზაცია</div>
                                <div data-tab="register-tab" class="tab cp-register d-flex-spaceCenter">რეგისტრაცია</div>
                            </div>
                            <div id="login-tab" class="cp-body current">
                                <a class="cp-close" href="#"></a>
                                <div class="client-popup-row">
                                    <label for="mail">ელ-ფოსტა ან ლოგინი</label>
                                    <input name="mail" type="text" id="mail">
                                </div>
                                <div class="client-popup-row">
                                    <label for="password">პაროლი</label>
                                    <input name="password" type="password" id="password">
                                </div>
                                <div class="client-popup-row">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">დაიმახსოვრე</label>
                                </div>
                                <div class="client-popup-row">
                                    <a href="#" class="client-popup-button d-flex-spaceCenter">
                                        ავტორიზაცია
                                    </a>
                                </div>
                                <p class="orLogin">ან გაიარე ავტორიზაცია</p>
                                <a href="#" class="authorise-fb d-flex-spaceCenter">ავტორიზაცია FACEBOOK ით</a>
                                <a href="#" class="authorise-google d-flex-spaceCenter">ავტორიზაცია GOOGLE ით</a>
                            </div>
                            <div id="register-tab" class="cp-body">
                                <a class="cp-close" href="#"></a>
                                <div class="client-popup-row">
                                    <label for="mail1">ელ-ფოსტა</label>
                                    <input name="mail1" type="text" id="mail1">
                                </div>
                                <div class="client-popup-row">
                                    <label for="login">ლოგინი</label>
                                    <input name="login" type="text" id="login">
                                </div>
                                <div class="client-popup-row">
                                    <label for="password1">პაროლი</label>
                                    <input name="password1" type="password" id="password1">
                                </div>
                                <div class="client-popup-row">
                                    <label for="password2">გაიმეორე პაროლი</label>
                                    <input name="password2" type="password" id="password2">
                                </div>
                                <div class="client-popup-row">
                                    <a href="#" class="client-popup-button d-flex-spaceCenter">
                                        რეგისტრაცია
                                    </a>
                                </div>
                                <p class="orRegister">ან გაიარე რეგისტრაცია</p>
                                <a href="#" class="authorise-fb d-flex-start">რეგისტრაცია</a>
                                <a href="#" class="authorise-google d-flex-start">რეგისტრაცია</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="betStat-userParameters">
                    <a href="" class="profile">პროფილი</a>
                    <a href="" class="parameters">პარამეტრები</a>
                    <a href="#" class="logOut">გასვლა</a>
                </div>
            </div>
        </section>
    </header>
    <section class="betStat-header-carousel">
        <div class="betStat-header-carousel-inner d-flex-spaceBetween container">
            <div class="betStat-header-carousel-inner-first">
                <div class="owl-carousel">
                    <div class="owl-carousel-inner">
                        <a class="owl-carousel-poster" href=""></a>
                        <a href="" class="owl-carousel-description">
                            <div class="owl-carousel-description-img">

                            </div>
                            <div class="owl-carousel-description-text">
                                <p>პოკერის ტურნირი 40 000 ლარი</p>
                                <span>crocobet.ge</span>
                            </div>
                        </a>
                    </div>
                    <div class="owl-carousel-inner">
                        <a class="owl-carousel-poster" href=""></a>
                        <a href="" class="owl-carousel-description">
                            <div class="owl-carousel-description-img">

                            </div>
                            <div class="owl-carousel-description-text">
                                <p>პოკერის ტურნირი 40 000 ლარი</p>
                                <span>crocobet.ge</span>
                            </div>
                        </a>
                    </div>
                    <div class="owl-carousel-inner">
                        <a class="owl-carousel-poster" href=""></a>
                        <a href="" class="owl-carousel-description">
                            <div class="owl-carousel-description-img">

                            </div>
                            <div class="owl-carousel-description-text">
                                <p>პოკერის ტურნირი 40 000 ლარი</p>
                                <span>crocobet.ge</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="betStat-header-carousel-inner-second">
                <div class="owl-carousel">
                    <div class="owl-carousel-inner">
                        <a class="owl-carousel-poster" href=""></a>
                        <a href="" class="owl-carousel-description">
                            <div class="owl-carousel-description-text">
                                <p>პასიური და შეცვლილი კვარაცხელია - "რუბინი" მოსკოვში დაიჯაბნა</p>
                            </div>
                        </a>
                    </div>
                    <div class="owl-carousel-inner">
                        <a class="owl-carousel-poster" href=""></a>
                        <a href="" class="owl-carousel-description">
                            <div class="owl-carousel-description-text">
                                <p>პასიური და შეცვლილი კვარაცხელია - "რუბინი" მოსკოვში დაიჯაბნა</p>
                            </div>
                        </a>
                    </div>
                    <div class="owl-carousel-inner">
                        <a class="owl-carousel-poster" href=""></a>
                        <a href="" class="owl-carousel-description">
                            <div class="owl-carousel-description-text">
                                <p>პასიური და შეცვლილი კვარაცხელია - "რუბინი" მოსკოვში დაიჯაბნა</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="betStat-header-carousel-inner-third">
                <div class="owl-carousel">
                    <div class="owl-carousel-inner">
                        <div class="owl-carousel-poster"></div>
                        <div class="owl-carousel-description">
                            <div class="owl-carousel-description-text">
                                <p>რომელ საიტზე თამაშობთ სპორტს ?</p>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel-inner">
                        <div class="owl-carousel-poster"></div>
                        <div class="owl-carousel-description">
                            <div class="owl-carousel-description-text">
                                <p>რომელ საიტზე თამაშობთ სპორტს ?</p>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel-inner">
                        <div class="owl-carousel-poster"></div>
                        <div class="owl-carousel-description">
                            <div class="owl-carousel-description-text">
                                <p>რომელ საიტზე თამაშობთ სპორტს ?</p>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                            <div class="owl-carousel-description-vote not-voted">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">crystalbet.com</p>
                                    <button type="button" onclick="alert('ხმა მიცემულია')" class="owl-carousel-description-vote-button">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">40%</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main class="container">
        <section class="main-table leftSide">
            <div class="main-table-menu d-flex-spaceBetween">
                <div data-tab="football-content" id="football" class="football tab current">
                    <div class="football-inner match-text">ფეხბურთი</div>
                </div>
                <div data-tab="basketball-content" id="basketball" class="basketball tab">
                    <div class="basketball-inner match-text">კალათბურთი</div>
                </div>
                <div data-tab="tennis-content" id="tennis" class="tennis tab">
                    <div class="tennis-inner match-text">ჩოგბურთი</div>
                </div>
            </div>
            <div id="football-content" class="content current">
                <div class="league-row d-flex-spaceBetween">
                    <div class="league-row-inner">
                        <input type="checkbox" id="premierLeague">
                        <label for="premierLeague">პრემიერ ლიგა</label>
                    </div>
                    <div class="league-row-inner">
                        <input type="checkbox" id="laLeague">
                        <label for="laLeague">ლა ლიგა</label>
                    </div>
                    <div class="league-row-inner">
                        <input type="checkbox" id="bundesLeague">
                        <label for="bundesLeague">ბუნდეს ლიგა</label>
                    </div>
                    <div class="league-row-inner">
                        <input type="checkbox" id="SerieA">
                        <label for="SerieA">სერია ა</label>
                    </div>
                    <div class="league-row-inner">
                        <input type="checkbox" id="championsLeague">
                        <label for="championsLeague">ჩემპიონთა ლიგა</label>
                    </div>
                    <div class="league-row-inner">
                        <input type="checkbox" id="europeLeague">
                        <label for="europeLeague">ევროპის ლიგა</label>
                    </div>
                </div>
                <div class="league-content premierLeague">
                    <div data-tab="league-content-premierLeague"  class="league-content-inner">
                        <div class="league-content-leftSide">
                            <h1>პრემიერ ლიგა</h1>
                        </div>
                        <div class="league-content-rightSide">
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>1</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>X</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>2</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>1X</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>12</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>X2</p>
                            </div>
                            <div class="choose-coefficient lessThan d-flex-spaceCenter">
                                <p></p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter total">
                                <p>ტოტ.</p>
                            </div>
                            <div class="choose-coefficient higherThan d-flex-spaceCenter">
                                <p></p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>კი</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>არა</p>
                            </div>
                        </div>
                    </div>
                    <div id="league-content-premierLeague" class="game-tab current">
                        <div class="game-tab-matches">
                            <div data-tab="premierLeague-summary" class="match">
                                <div class="game-date">
                                    <p>23:00</p><span>13.09.2021</span>
                                </div>
                                <div class="game-title">
                                    <div class="teams_name">არსენალი vs მან. იუნაიტედი</div>
                                </div>
                                <div class="game-icons">

                                </div>
                                <div class="game-coefficients">
                                    <div class="game-coefficient highlighted d-flex-spaceCenter">
                                        1.75
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        3.65
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        5.20
                                    </div>
                                    <div class="game-coefficient highlighted d-flex-spaceCenter">
                                        1.17
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.29
                                    </div>
                                    <div class="game-coefficient highlighted d-flex-spaceCenter">
                                        2.14
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter lessThan">
                                        1.77
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter total">
                                        2.5
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter higherThan">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                </div>
                            </div>
                            <div id="premierLeague-summary" class="summary">
                                <div class="summary-headsUp">
                                    <div class="summary-headsUp-leftSide">
                                        H2H ბოლო 10
                                    </div>
                                    <div class="summary-headsUp-rightSide">
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>1</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>X</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>2</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>1X</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>12</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>X2</p>
                                        </div>
                                        <div class="choose-coefficient lessThan d-flex-spaceCenter">
                                            <p></p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter total">
                                            <p>ტოტ.</p>
                                        </div>
                                        <div class="choose-coefficient higherThan d-flex-spaceCenter">
                                            <p></p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>კი</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>არა</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-inner">
                                    <div class="summary-leftSide">
                                        <div class="summary-leftSide-H2H">
                                            <div class="h2h-goal d-flex-spaceBetween">
                                                <div class="statisticsSum d-flex-spaceCenter leftSide">3</div>
                                                <div class="d-flex-spaceCenter statistics">გოლი</div>
                                                <div class="statisticsSum d-flex-spaceCenter rightSide">5</div>
                                            </div>
                                            <div class="h2h-corner d-flex-spaceBetween">
                                                <div class="statisticsSum d-flex-spaceCenter leftSide">3</div>
                                                <div class="d-flex-spaceCenter statistics">კუთხური</div>
                                                <div class="statisticsSum d-flex-spaceCenter rightSide">5</div>
                                            </div>
                                            <div class="h2h-offside d-flex-spaceBetween">
                                                <div class="statisticsSum d-flex-spaceCenter leftSide">3</div>
                                                <div class="d-flex-spaceCenter statistics">ოფსაიდი</div>
                                                <div class="statisticsSum d-flex-spaceCenter rightSide">5</div>
                                            </div>
                                            <div class="h2h-card d-flex-spaceBetween">
                                                <div class="statisticsSum d-flex-spaceCenter leftSide">3</div>
                                                <div class="d-flex-spaceCenter statistics">ბარათი</div>
                                                <div class="statisticsSum d-flex-spaceCenter rightSide">5</div>
                                            </div>
                                            <div class="h2h-foul d-flex-spaceBetween">
                                                <div class="statisticsSum d-flex-spaceCenter leftSide">3</div>
                                                <div class="d-flex-spaceCenter statistics">ჯარიმა</div>
                                                <div class="statisticsSum d-flex-spaceCenter rightSide">5</div>
                                            </div>
                                            <div class="h2h-throwIn d-flex-spaceBetween">
                                                <div class="statisticsSum d-flex-spaceCenter leftSide">3</div>
                                                <div class="d-flex-spaceCenter statistics">აუტი</div>
                                                <div class="statisticsSum d-flex-spaceCenter rightSide">5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.29
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.14
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">adjarabet.com</div>
                                            <div class="provider-company-logo adjarabet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.29
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.14
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.29
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.14
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.29
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.14
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.29
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.14
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.29
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.14
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            2.10
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.75
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-statistics">

                                </div>
                            </div>
                            <div class="match">
                                <div class="game-date">
                                    <p>23:00</p><span>13.09.2021</span>
                                </div>
                                <div class="game-title">
                                    <div class="teams_name">არსენალი vs მან. იუნაიტედი</div>
                                </div>
                                <div class="game-icons">

                                </div>
                                <div class="game-coefficients">
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        3.65
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        5.20
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.17
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.29
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.14
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter lessThan">
                                        1.77
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter total">
                                        2.5
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter higherThan">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                </div>
                            </div>
                            <div class="match">
                                <div class="game-date">
                                    <p>23:00</p><span>13.09.2021</span>
                                </div>
                                <div class="game-title">
                                    <div class="teams_name">არსენალი vs მან. იუნაიტედი</div>
                                </div>
                                <div class="game-icons">

                                </div>
                                <div class="game-coefficients">
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        3.65
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        5.20
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.17
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.29
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.14
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter lessThan">
                                        1.77
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter total">
                                        2.5
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter higherThan">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                </div>
                            </div>
                            <div class="match">
                                <div class="game-date">
                                    <p>23:00</p><span>13.09.2021</span>
                                </div>
                                <div class="game-title">
                                    <div class="teams_name">არსენალი vs მან. იუნაიტედი</div>
                                </div>
                                <div class="game-icons">

                                </div>
                                <div class="game-coefficients">
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        3.65
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        5.20
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.17
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.29
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.14
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter lessThan">
                                        1.77
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter total">
                                        2.5
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter higherThan">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="league-content laLeague">
                    <div data-tab="league-content-laLeague"  class="league-content-inner">
                        <div class="league-content-leftSide">
                            <h1>ლა ლიგა</h1>
                        </div>
                        <div class="league-content-rightSide">
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>1</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>X</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>2</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>1X</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>12</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>X2</p>
                            </div>
                            <div class="choose-coefficient lessThan d-flex-spaceCenter">
                                <p></p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter total">
                                <p>ტოტ.</p>
                            </div>
                            <div class="choose-coefficient higherThan d-flex-spaceCenter">
                                <p></p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>კი</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>არა</p>
                            </div>
                        </div>
                    </div>
                    <div id="league-content-laLeague" class="game-tab">
                        <div class="game-tab-matches">
                            <div data-tab="laLeague-summary" class="match">
                                <div class="game-date">
                                    <p>23:00</p><span>13.09.2021</span>
                                </div>
                                <div class="game-title">
                                    <div class="teams_name">არსენალი vs მან. იუნაიტედი</div>
                                </div>
                                <div class="game-icons">

                                </div>
                                <div class="game-coefficients">
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        3.65
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        5.20
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.17
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.29
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.14
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter lessThan">
                                        1.77
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter total">
                                        2.5
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter higherThan">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                </div>
                            </div>
                            <div id="laLeague-summary" class="summary">Aleeee</div>
                            <div class="match">
                                <div class="game-date">
                                    <p>23:00</p><span>13.09.2021</span>
                                </div>
                                <div class="game-title">
                                    <div class="teams_name">არსენალი vs მან. იუნაიტედი</div>
                                </div>
                                <div class="game-icons">

                                </div>
                                <div class="game-coefficients">
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        3.65
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        5.20
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.17
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.29
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.14
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter lessThan">
                                        1.77
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter total">
                                        2.5
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter higherThan">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                </div>
                            </div>
                            <div class="match">
                                <div class="game-date">
                                    <p>23:00</p><span>13.09.2021</span>
                                </div>
                                <div class="game-title">
                                    <div class="teams_name">არსენალი vs მან. იუნაიტედი</div>
                                </div>
                                <div class="game-icons">

                                </div>
                                <div class="game-coefficients">
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        3.65
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        5.20
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.17
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.29
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.14
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter lessThan">
                                        1.77
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter total">
                                        2.5
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter higherThan">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                </div>
                            </div>
                            <div class="match">
                                <div class="game-date">
                                    <p>23:00</p><span>13.09.2021</span>
                                </div>
                                <div class="game-title">
                                    <div class="teams_name">არსენალი vs მან. იუნაიტედი</div>
                                </div>
                                <div class="game-icons">

                                </div>
                                <div class="game-coefficients">
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        3.65
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        5.20
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.17
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.29
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.14
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter lessThan">
                                        1.77
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter total">
                                        2.5
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter higherThan">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        2.10
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.75
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="basketball-content" class="content">
                <div class="league-row d-flex-spaceBetween">
                    <div class="league-row-inner">
                        <input type="checkbox" id="nba">
                        <label for="nba">NBA</label>
                    </div>
                    <div class="league-row-inner">
                        <input type="checkbox" id="euroLeague">
                        <label for="euroLeague">Euroleague</label>
                    </div>
                </div>
                <div class="league-content nba">
                    <div data-tab="league-content-nba"  class="league-content-inner">
                        <div class="league-content-leftSide">
                            <h1>NBA</h1>
                        </div>
                        <div class="league-content-rightSide">
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>1</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>2</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>1</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter handicap">
                                <p>ფორა</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>2</p>
                            </div>
                            <div class="choose-coefficient lessThan d-flex-spaceCenter">
                                <p></p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter total">
                                <p>ტოტ.</p>
                            </div>
                            <div class="choose-coefficient higherThan d-flex-spaceCenter">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div id="league-content-nba" class="game-tab">
                        <div class="game-tab-matches">
                            <div data-tab="nba-summary" class="match">
                                <div class="game-date">
                                    <p>23:00</p><span>13.09.2021</span>
                                </div>
                                <div class="game-title">
                                    <div class="teams_name">ლეიკერსი vs ბოსტონ სელტიქსი</div>
                                </div>
                                <div class="game-icons">

                                </div>
                                <div class="game-coefficients">
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        3.65
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        5.20
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.17
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter handicap">
                                        -5.6/+5.6
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.77
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter lessThan">
                                        1.77
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter total">
                                        2.5
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter higherThan">
                                        2.10
                                    </div>
                                </div>
                            </div>
                            <div id="nba-summary" class="summary">
                                <div class="summary-headsUp">
                                    <div class="summary-headsUp-leftSide">

                                    </div>
                                    <div class="summary-headsUp-rightSide">
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>1</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>2</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>1</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter handicap">
                                            <p>ფორა</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>2</p>
                                        </div>
                                        <div class="choose-coefficient lessThan d-flex-spaceCenter">
                                            <p></p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter total">
                                            <p>ტოტ.</p>
                                        </div>
                                        <div class="choose-coefficient higherThan d-flex-spaceCenter">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-inner">
                                    <div class="summary-leftSide">

                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-statistics">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tennis-content" class="content">
                <div class="league-row d-flex-spaceBetween">
                    <div class="league-row-inner">
                        <input type="checkbox" id="wimbledon">
                        <label for="wimbledon">Wimbledon</label>
                    </div>
                    <div class="league-row-inner">
                        <input type="checkbox" id="australianOpen">
                        <label for="australianOpen">Australian Open</label>
                    </div>
                    <div class="league-row-inner">
                        <input type="checkbox" id="frenchOpen">
                        <label for="frenchOpen">French Open</label>
                    </div>
                    <div class="league-row-inner">
                        <input type="checkbox" id="uSOpen">
                        <label for="uSOpen">US Open</label>
                    </div>
                </div>
                <div class="league-content wimbledon">
                    <div data-tab="league-content-wimbledon"  class="league-content-inner">
                        <div class="league-content-leftSide">
                            <h1>Wimbledon</h1>
                        </div>
                        <div class="league-content-rightSide">
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>1</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>2</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>1</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter handicap">
                                <p>ფორა</p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter">
                                <p>2</p>
                            </div>
                            <div class="choose-coefficient lessThan d-flex-spaceCenter">
                                <p></p>
                            </div>
                            <div class="choose-coefficient d-flex-spaceCenter total">
                                <p>ტოტ.</p>
                            </div>
                            <div class="choose-coefficient higherThan d-flex-spaceCenter">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div id="league-content-wimbledon" class="game-tab">
                        <div class="game-tab-matches">
                            <div data-tab="wimbledon-summary" class="match">
                                <div class="game-date">
                                    <p>23:00</p><span>13.09.2021</span>
                                </div>
                                <div class="game-title">
                                    <div class="teams_name">ლეიკერსი vs ბოსტონ სელტიქსი</div>
                                </div>
                                <div class="game-icons">

                                </div>
                                <div class="game-coefficients">
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        3.65
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        5.20
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.17
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter handicap">
                                        -5.6/+5.6
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter">
                                        1.77
                                    </div>
                                    <div class="game-coefficient d-flex-spaceCenter lessThan">
                                        1.77
                                    </div>
                                    <div class="arrow-left"></div>
                                    <div class="game-coefficient d-flex-spaceCenter total">
                                        2.5
                                    </div>
                                    <div class="arrow-right"></div>
                                    <div class="game-coefficient d-flex-spaceCenter higherThan">
                                        2.10
                                    </div>
                                </div>
                            </div>
                            <div id="wimbledon-summary" class="summary">
                                <div class="summary-headsUp">
                                    <div class="summary-headsUp-leftSide">

                                    </div>
                                    <div class="summary-headsUp-rightSide">
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>1</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>2</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>1</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter handicap">
                                            <p>ფორა</p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter">
                                            <p>2</p>
                                        </div>
                                        <div class="choose-coefficient lessThan d-flex-spaceCenter">
                                            <p></p>
                                        </div>
                                        <div class="choose-coefficient d-flex-spaceCenter total">
                                            <p>ტოტ.</p>
                                        </div>
                                        <div class="choose-coefficient higherThan d-flex-spaceCenter">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-inner">
                                    <div class="summary-leftSide">

                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                    <div class="summary-rightSide game-coefficients">
                                        <div class="provider-company">
                                            <div class="provider-company-name">Crocobet.com</div>
                                            <div class="provider-company-logo crocobet"></div>
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            3.65
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            5.20
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.17
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter handicap">
                                            -5.6/+5.6
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter">
                                            1.77
                                        </div>
                                        <div class="game-coefficient d-flex-spaceCenter lessThan">
                                            1.77
                                        </div>
                                        <div class="arrow-left"></div>
                                        <div class="game-coefficient d-flex-spaceCenter total">
                                            2.5
                                        </div>
                                        <div class="arrow-right"></div>
                                        <div class="game-coefficient d-flex-spaceCenter higherThan">
                                            2.10
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-statistics">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="banner-table rightSide">
            <a href="https://www.crystalbet.com" class="banner-table-first"></a>
            <a href="https://www.crystalbet.com" class="banner-table-second"></a>
        </section>
    </main>
    <footer>
        <div class="footer-inner">
            <div class="footer-inner-content container d-flex-spaceBetween">
                <div class="footer-inner-leftSide">

                </div>
                <div class="footer-inner-rightSide d-flex-spaceBetween">
                    <a href="https://www.facebook.com" class="fb"></a>
                    <a href="https://www.youtube.com" class="youtube"></a>
                </div>
            </div>
        </div>
        <div class="footer-desc">
            <div class="footer-desc-content container">
                <div class="info">
                    <p>ინფო</p>
                    <div class="info-desc">
                        <p>info@betstat.ge</p>
                        <p>მისამართი: ვაჟა ფშაველას N1</p>
                        <p>ტელ:  </p>
                    </div>
                </div>
                <div class="info contact">
                    <p>კონტაქტი</p>
                    <div class="info-desc">
                        <p>ჩვენს შესახებ</p>
                        <p>სიახლეები</p>
                        <p>აქციები</p>
                    </div>
                </div>
                <div class="info category">
                    <p>კატეგორიები</p>
                    <div class="info-desc">
                        <p>ფეხბურთი</p>
                        <p>კალათბურთი</p>
                        <p>ჩოგბურთი</p>
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
        </div>
    </footer>
    </body>
</html>
