@extends('layouts.app')

@section('content')
    <body class="main">
    <section class="betStat-header-carousel">
        <div class="betStat-header-carousel-inner d-flex-spaceBetween container">
            <div class="betStat-header-carousel-inner-first">
                <div class="owl-carousel">
                    @foreach($data['promos'] as $key => $promo)
                    <div class="owl-carousel-inner">
                        <a href="{{ route('promoInner', ['id' => $promo['id']]) }}" class="owl-carousel-poster"
                           style="background: url('{{asset('uploads/promo/images') . '/' . $promo['image']}}') center no-repeat;"></a>
                        <a href="{{ route('promoInner', ['id' => $promo['id']]) }}" class="owl-carousel-description">
                            <div class="owl-carousel-description-img"
                                 style="background: url('{{asset('uploads/promo/logos') . '/' . $promo['logo']}}') center no-repeat;
                                     background-size: 100%;">
                            </div>
                            <div class="owl-carousel-description-text">
                                <p>{{$promo['title']}}</p>
                                <span>{{$promo['category1']}}</span>
                                <div class="owl-carousel-rating">
                                    <div class="head d-flex-spaceCenter">{{$promo['rating']}}</div>
                                    <div class="bottom d-flex-spaceCenter">{{$key +1}}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="betStat-header-carousel-inner-second">
                <div class="owl-carousel">
                    @foreach($data['news'] as $news)
                    <div class="owl-carousel-inner">
                        <a href="{{ route('newsInner', ['id' => $news['id']]) }}" class="owl-carousel-poster"
                           style="background: url('{{asset('uploads/news') . '/' . $news['picture']}}') center no-repeat;"></a>
                        <a href="{{ route('newsInner', ['id' => $news['id']]) }}" class="owl-carousel-description">
                            <div class="owl-carousel-description-text">
                                <p>{{$news['title']}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="betStat-header-carousel-inner-third">
                <div class="owl-carousel">
                    @foreach($data['pollQuestions'] as $question)
                        <div class="owl-carousel-inner">
                        <div class="owl-carousel-poster">
                            <img src="{{ asset('uploads/poll/' . $question->image) }}">
                        </div>
                        <div class="owl-carousel-description">
                            <div class="owl-carousel-description-text">
                                <p>{{ $question->question }}</p>
                                @php
                                   $totalCount = $question->pollAnswersCountSum($question->pollAnswers);
                                @endphp
                            </div>
                            @foreach($question->pollAnswers as $key => $answer)
                            <div class="owl-carousel-description-vote @auth @if($data['pollVotedByUser']->contains($question->id)) voted @else not-voted @endif @elseguest  voted @endauth">
                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">
                                    <p class="owl-carousel-description-vote-name">{{ $answer->answer }}</p>
                                    <button type="button"  class="owl-carousel-description-vote-button" data-question="{{$question->id}}"  data-id="{{$answer->id}}">ხმის მიცემა</button>
                                    <p class="owl-carousel-description-vote-button-text">{{ $answer->calcAnswerCount($totalCount) }} %</p>
                                </div>
                                <div class="owl-carousel-description-vote-progress @auth @if($data['pollVotedByUser']->contains($question->id)) voted @else not-voted @endif @elseguest  voted @endauth">
                                    <span style="width: {{ $answer->calcAnswerCount($totalCount) }}%"></span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
{{--                    <div class="owl-carousel-inner">--}}
{{--                        <div class="owl-carousel-poster"></div>--}}
{{--                        <div class="owl-carousel-description">--}}
{{--                            <div class="owl-carousel-description-text">--}}
{{--                                <p>რომელ საიტზე თამაშობთ სპორტს ?</p>--}}
{{--                            </div>--}}
{{--                            @foreach($data['pollData'] as $key => $pollSlider)--}}
{{--                            <div class="owl-carousel-description-vote @auth @if(Auth::user()->poll) voted @else not-voted @endif @elseguest  voted @endauth">--}}
{{--                                <div class="owl-carousel-description-vote-inner d-flex-spaceBetween">--}}
{{--                                    <p class="owl-carousel-description-vote-name">{{$pollSlider['name']}}</p>--}}
{{--                                    <button type="button"  class="owl-carousel-description-vote-button" data-id="{{$key}}">ხმის მიცემა</button>--}}
{{--                                    <p class="owl-carousel-description-vote-button-text">{{$pollSlider['count']}} %</p>--}}
{{--                                </div>--}}
{{--                                <div class="owl-carousel-description-vote-progress @auth @if(Auth::user()->poll) voted @else not-voted @endif @elseguest  voted @endauth">--}}
{{--                                    <span style="width: {{$pollSlider['count']}}%"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    @foreach($data['slider'] as $info)
                        <div class="owl-carousel-inner info-slider">
                            <div class="owl-carousel-poster"
                                 style="background: url('{{asset('uploads/slider') . '/' . $info['image']}}') center no-repeat;"></div>
                            <div class="owl-carousel-description">
                                <div class="owl-carousel-description-text">
                                    <p>{{$info['title']}}</p>
                                </div>
                                <div class="owl-carousel-description-text-content">
                                    <p>{{$info['input1']}}</p>
                                </div>
                                <div class="owl-carousel-description-text-content">
                                    <p>{{$info['input2']}}</p>
                                </div>
                                <div class="owl-carousel-description-text-content">
                                    <p>{{$info['input3']}}</p>
                                </div>
                                <div class="owl-carousel-description-text-content">
                                    <p>{{$info['input4']}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                    @foreach($data['leagues_football'] as $league)
                        <div class="league-row-inner">
                            <input class="leagueToggle" type="checkbox" id="{{$league->id}}">
                            <label for="{{ $league->id }}">{{ $league->name }}</label>
                        </div>
                    @endforeach
                </div>
                    @foreach($data['leagues_football'] as $league)
                    <div class="league-content league-content-football {{ $league->id }} current">
                        <div data-tab="league-content-{{ $league->id }}"  class="league-content-inner">
                        <div class="league-content-leftSide">
                            <img class="league-background" alt="background" src="{{ asset('uploads/leagues/' . $league->background_image) }}">
                            <img class="league-logo" alt="logo" src="{{ asset('uploads/leagues/' . $league->image) }}">
                            <h1>{{ $league->name }}</h1>
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
                    <div id="league-content-{{ $league->id }}" class="game-tab current">
                    @if(isset($data['coefficients']['football']))
                        @foreach($data['coefficients']['football'] as $game)
                        @if($game['cat'] == $league->name)
                                    <div class="game-tab-matches">
                                        <div data-value="{{ $league->id }}-summary-{{ $game->id }}" data-tab="{{ $league->id }}-summary-{{$game->id}}" class="match">
                                            <div class="game-date">
                                                <p>{{date('H:i', strtotime($game->date))}}</p>
                                                <span>{{date('d.m.Y', strtotime($game->date))}}</span>
                                            </div>
                                            <div class="game-title">
                                                <div class="teams_name">{{$game->home_team}} vs {{$game->away_team}}</div>
                                            </div>
                                            <div class="game-icons">

                                            </div>
                                            <div class="game-coefficients">
                                                <div class="game-coefficient d-flex-spaceCenter">
                                                    {{$game->sport[0]['1_c']}}
                                                </div>
                                                <div class="game-coefficient d-flex-spaceCenter">
                                                    {{$game->sport[0]['x']}}
                                                </div>
                                                <div class="game-coefficient d-flex-spaceCenter">
                                                    {{$game->sport[0]['2_c']}}
                                                </div>
                                                <div class="game-coefficient  d-flex-spaceCenter">
                                                    {{$game->sport[0]['1x']}}
                                                </div>
                                                <div class="game-coefficient d-flex-spaceCenter">
                                                    {{$game->sport[0]['12_c']}}
                                                </div>
                                                <div class="game-coefficient  d-flex-spaceCenter">
                                                    {{$game->sport[0]['x2']}}
                                                </div>
                                                <div class="game-coefficient d-flex-spaceCenter lessThan">
                                                    {{$game->sport[0]['less']}}
                                                </div>
                                                <div class="arrow-left"></div>
                                                <div class="game-coefficient d-flex-spaceCenter total">
                                                    {{$game->sport[0]['total']}}
                                                </div>
                                                <div class="arrow-right"></div>
                                                <div class="game-coefficient d-flex-spaceCenter higherThan">
                                                    {{$game->sport[0]['more']}}
                                                </div>
                                                <div class="game-coefficient d-flex-spaceCenter">
                                                    {{$game->sport[0]['yes']}}
                                                </div>
                                                <div class="game-coefficient d-flex-spaceCenter">
                                                    {{$game->sport[0]['no']}}
                                                </div>
                                            </div>
                                    </div>
                                    <div id="{{ $league->id }}-summary-{{$game->id}}" class="summary">
                                        <div class="summary-headsUp">
                                            <div class="summary-headsUp-leftSide">
                                                H2H
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
                                        <div class="summary-inner" >
                                            <div class="summary-leftSide">
                                                <div class="summary-leftSide-H2H">
                                                    <div class="h2h-goal d-flex-spaceBetween">
                                                        <div class="statisticsSum d-flex-spaceCenter leftSide">{{$game->h2h['goals_1']}}</div>
                                                        <div class="d-flex-spaceCenter statistics">გოლი</div>
                                                        <div class="statisticsSum d-flex-spaceCenter rightSide">{{($game->h2h['goals_2'])}}</div>
                                                    </div>
                                                    <div class="h2h-corner d-flex-spaceBetween">
                                                        <div class="statisticsSum d-flex-spaceCenter leftSide">{{($game->h2h['corners_1'])}}</div>
                                                        <div class="d-flex-spaceCenter statistics">კუთხური</div>
                                                        <div class="statisticsSum d-flex-spaceCenter rightSide">{{($game->h2h['corners_2'])}}</div>
                                                    </div>
                                                    <div class="h2h-offside d-flex-spaceBetween">
                                                        <div class="statisticsSum d-flex-spaceCenter leftSide">{{($game->h2h['offsides_1'])}}</div>
                                                        <div class="d-flex-spaceCenter statistics">ოფსაიდი</div>
                                                        <div class="statisticsSum d-flex-spaceCenter rightSide">{{($game->h2h['offsides_2'])}}</div>
                                                    </div>
                                                    <div class="h2h-card d-flex-spaceBetween">
                                                        <div class="statisticsSum d-flex-spaceCenter leftSide">{{($game->h2h['cards_1'])}}</div>
                                                        <div class="d-flex-spaceCenter statistics">ბარათი</div>
                                                        <div class="statisticsSum d-flex-spaceCenter rightSide">{{($game->h2h['cards_2'])}}</div>
                                                    </div>
                                                    <div class="h2h-foul d-flex-spaceBetween">
                                                        <div class="statisticsSum d-flex-spaceCenter leftSide">{{($game->h2h['fouls_1'])}}</div>
                                                        <div class="d-flex-spaceCenter statistics">ჯარიმა</div>
                                                        <div class="statisticsSum d-flex-spaceCenter rightSide">{{($game->h2h['fouls_2'])}}</div>
                                                    </div>
                                                    <div class="h2h-throwIn d-flex-spaceBetween">
                                                        <div class="statisticsSum d-flex-spaceCenter leftSide">{{($game->h2h['throw_1'])}}</div>
                                                        <div class="d-flex-spaceCenter statistics">აუტი</div>
                                                        <div class="statisticsSum d-flex-spaceCenter rightSide">{{($game->h2h['throw_2'])}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                $c1MaxFound = false;
                                                $xMaxFound = false;
                                                $c2MaxFound = false;
                                                $x1MaxFound = false;
                                                $c12MaxFound = false;
                                                $x2MaxFound = false;
                                                $lessMaxFound = false;
                                                $moreMaxFound = false;
                                                $yesMaxFound = false;
                                                $noMaxFound = false;
                                            ?>
                                            @foreach($game->sport as $sport)
                                                <div class="summary-rightSide game-coefficients">
                                                    <div class="provider-company">
                                                        <div class="provider-company-name">{{$sport->casino}}</div>

                                                        @switch($sport->casino)

                                                            @case('adjarasport')
                                                            <div class="provider-company-logo adjarabet"></div>
                                                            @break
                                                            @case('crystalsport')
                                                            <div class="provider-company-logo crystalbet"></div>
                                                            @break
                                                            @case('crocosport')
                                                            <div class="provider-company-logo crocobet"></div>
                                                            @break
                                                            @case('europesport')
                                                            <div class="provider-company-logo europebet"></div>
                                                            @break
                                                            @case('livesport')
                                                            <div class="provider-company-logo betlive"></div>
                                                            @break
                                                            @case('leadersport')
                                                            <div class="provider-company-logo leaderbet"></div>
                                                            @break
                                                        @endswitch

                                                    </div>
                                                    <div class="game-coefficient <?php if(!$c1MaxFound && $sport['1_c'] >= $game->max['1_c']){
                                                        echo 'highlighted';
                                                        $c1MaxFound = true;
                                                    }  ?>  first d-flex-spaceCenter">
                                                        {{$sport['1_c']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$xMaxFound && $sport['x'] >= $game->max['x']){
                                                        echo 'highlighted';
                                                        $xMaxFound = true;
                                                    }  ?>    draw d-flex-spaceCenter">
                                                        {{$sport['x']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$c2MaxFound && $sport['2_c'] >= $game->max['2_c']){
                                                        echo 'highlighted';
                                                        $c2MaxFound = true;
                                                    }  ?>    second d-flex-spaceCenter">
                                                        {{$sport['2_c']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$x1MaxFound && $sport['1x'] >= $game->max['1x']){
                                                        echo 'highlighted';
                                                        $x1MaxFound = true;
                                                    }  ?>   firstDraw d-flex-spaceCenter">
                                                        {{$sport['1x']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$c12MaxFound && $sport['12_c'] >= $game->max['12_c']){
                                                        echo 'highlighted';
                                                        $c12MaxFound = true;
                                                    }  ?>   firstSecond d-flex-spaceCenter">
                                                        {{$sport['12_c']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$x2MaxFound && $sport['x2'] >= $game->max['x2']){
                                                        echo 'highlighted';
                                                        $x2MaxFound = true;
                                                    }  ?>   secondX d-flex-spaceCenter">
                                                        {{$sport['x2']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$lessMaxFound && $sport['less'] >= $game->max['less']){
                                                        echo 'highlighted';
                                                        $lessMaxFound = true;
                                                    }  ?>   d-flex-spaceCenter lessThan">
                                                        {{$sport['less']}}
                                                    </div>
                                                    <div class="arrow-left"></div>
                                                    <div class="game-coefficient d-flex-spaceCenter total">
                                                        {{$sport['total']}}
                                                    </div>
                                                    <div class="arrow-right"></div>
                                                    <div class="game-coefficient <?php if(!$moreMaxFound && $sport['more'] >= $game->max['more']){
                                                        echo 'highlighted';
                                                        $moreMaxFound = true;
                                                    }  ?>   d-flex-spaceCenter higherThan">
                                                        {{$sport['more']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$yesMaxFound && $sport['yes'] >= $game->max['yes']){
                                                        echo 'highlighted';
                                                        $yesMaxFound = true;
                                                    }  ?>   yes d-flex-spaceCenter">
                                                        {{$sport['yes']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$noMaxFound && $sport['no'] >= $game->max['no']){
                                                        echo 'highlighted';
                                                        $noMaxFound = true;
                                                    }  ?>   no d-flex-spaceCenter">
                                                        {{$sport['no']}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="summary-statistics">
                                            <div class="summary-statistics-head d-flex-end">
                                                <div class="summary-statistics-head-first">სტატისტიკა</div>
                                                <div data-tab="summaryOfLastFiveSeason-{{$game->id}}" class="summary-statistics-head-second SeasonBtn fiveSeason d-flex-spaceCenter current">ბოლო 5</div>
                                                <div data-tab="summaryOfCurrentSeason-{{$game->id}}" class="summary-statistics-head-third SeasonBtn currentSeason d-flex-spaceCenter">მიმდინარე სეზონი</div>
                                            </div>
                                            <div class="summary-statistics-bottom">
                                                <div class="summary-statistics-bottom-first d-flex-spaceBetween">
                                                    <div class="statistics-block d-flex-spaceCenter watch"><a href="">უყურე</a></div>
                                                    <div class="statistics-block d-flex-spaceCenter">დარტყმა</div>
                                                    <div class="statistics-block d-flex-spaceCenter">კარში დარტყმა</div>
                                                    <div class="statistics-block d-flex-spaceCenter">კუთხური</div>
                                                    <div class="statistics-block d-flex-spaceCenter">თამაშგარე</div>
                                                    <div class="statistics-block d-flex-spaceCenter">აუტი</div>
                                                    <div class="statistics-block d-flex-spaceCenter">ჯარიმა</div>
                                                    <div class="statistics-block d-flex-spaceCenter">ბარათი</div>
                                                </div>
                                                <div id="summaryOfLastFiveSeason-{{$game->id}}" class="summary-statistics-bottom-second fiveSeason current">
                                                    <div class="summary-statistics-home summary-statistics-all d-flex-spaceBetween">
                                                        <div class="home d-flex-spaceCenter">სახლი</div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[0]['goal_attempts_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[0]['goal_attempts_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[0]['shots_goal_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[0]['shots_goal_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[0]['corners_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[0]['corners_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[0]['offsides_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[0]['offsides_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[0]['throw_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[0]['throw_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[0]['fouls_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[0]['fouls_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[0]['cards_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[0]['cards_2']}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="summary-statistics-away summary-statistics-all d-flex-spaceBetween">
                                                        <div class="home d-flex-spaceCenter">გასვლა</div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[1]['goal_attempts_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[1]['goal_attempts_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[1]['shots_goal_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[1]['shots_goal_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[1]['corners_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[1]['corners_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[1]['offsides_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[1]['offsides_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[1]['throw_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[1]['throw_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[1]['fouls_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[1]['fouls_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[1]['cards_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[1]['cards_2']}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="summaryOfCurrentSeason-{{$game->id}}" class="summary-statistics-bottom-second currentSeason">
                                                    <div class="summary-statistics-home summary-statistics-all d-flex-spaceBetween">
                                                        <div class="home d-flex-spaceCenter">სახლი</div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[2]['goal_attempts_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[2]['goal_attempts_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[2]['shots_goal_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[2]['shots_goal_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[2]['corners_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[2]['corners_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[2]['offsides_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[2]['offsides_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[2]['throw_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[2]['throw_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[2]['fouls_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[2]['fouls_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[2]['cards_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[2]['cards_2']}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="summary-statistics-away summary-statistics-all d-flex-spaceBetween">
                                                        <div class="home d-flex-spaceCenter">გასვლა</div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[3]['goal_attempts_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[3]['goal_attempts_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[3]['shots_goal_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[3]['shots_goal_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[3]['corners_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[3]['corners_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[3]['offsides_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[3]['offsides_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[3]['throw_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[3]['throw_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[3]['fouls_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[3]['fouls_2']}}</div>
                                                        </div>
                                                        <div class="home-block d-flex-spaceCenter">
                                                            <div class="home-block-inner d-flex-spaceCenter current">{{$game->statistic[3]['cards_1']}}</div>
                                                            <div class="home-block-inner d-flex-spaceCenter">{{$game->statistic[3]['cards_2']}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            @endif
                    </div>
                </div>
                    @endforeach
            </div>
            <div id="basketball-content" class="content">
                <div class="league-row d-flex-spaceBetween">
                    @foreach($data['leagues_basketball'] as $league)
                    <div class="league-row-inner">
                        <input class="leagueToggle1" type="checkbox" id="{{$league->id}}">
                        <label for="{{ $league->id }}">{{ $league->name }}</label>
                    </div>
                    @endforeach
                </div>
                @foreach($data['leagues_basketball'] as $league)
                <div class="league-content league-content-basketball {{ $league->id }} current">
                    <div data-tab="league-content-{{ $league->id }}"  class="league-content-inner">
                        <div class="league-content-leftSide">
                            <img alt="" class="league-background" src="{{ asset('uploads/leagues/' . $league->background_image) }}">
                            <img alt="" class="league-logo" src="{{ asset('uploads/leagues/' . $league->image) }}">
                            <h1>{{ $league->name }}</h1>
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
                    <div id="league-content-{{ $league->id }}" class="game-tab current">
                        @if(isset($data['coefficients']['basketball']))
                    @foreach($data['coefficients']['basketball'] as $game)
                        @if($game['cat'] == $league->name)
                                <div class="game-tab-matches">
                                    <div data-tab="nba-summary-{{$game->id}}" class="match">
                                        <div class="game-date">
                                            <p>{{date('H:i', strtotime($game->date))}}</p>
                                            <span>{{date('d.m.Y', strtotime($game->date))}}</span>
                                        </div>
                                        <div class="game-title">
                                            <div class="teams_name">{{$game->home_team}} vs {{$game->away_team}}</div>
                                        </div>
                                        <div class="game-icons">

                                        </div>
                                        <div class="game-coefficients">
                                            <div class="game-coefficient d-flex-spaceCenter">
                                                {{$game->sport[0]['1_c']}}
                                            </div>
                                            <div class="game-coefficient d-flex-spaceCenter">
                                                {{$game->sport[0]['2_c']}}
                                            </div>
                                            <div class="game-coefficient d-flex-spaceCenter">
                                                {{$game->sport[0]['fora_1']}}
                                            </div>
                                            <div class="arrow-left"></div>
                                            <div class="game-coefficient d-flex-spaceCenter handicap">
                                                {{$game->sport[0]['fora']}}
                                            </div>
                                            <div class="arrow-right"></div>
                                            <div class="game-coefficient d-flex-spaceCenter">
                                                {{$game->sport[0]['fora_2']}}
                                            </div>
                                            <div class="game-coefficient d-flex-spaceCenter lessThan">
                                                {{$game->sport[0]['less']}}
                                            </div>
                                            <div class="arrow-left"></div>
                                            <div class="game-coefficient d-flex-spaceCenter total">
                                                {{$game->sport[0]['total']}}
                                            </div>
                                            <div class="arrow-right"></div>
                                            <div class="game-coefficient d-flex-spaceCenter higherThan">
                                                {{$game->sport[0]['more']}}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="nba-summary-{{$game->id}}" class="summary">
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
                                        <div class="summary-inner" >
                                            <div class="summary-leftSide">

                                            </div>
                                            <?php
                                            $c1MaxFound = false;
                                            $c2MaxFound = false;
                                            $fora1MaxFound = false;
                                            $fora2MaxFound = false;
                                            $lessMaxFound = false;
                                            $moreMaxFound = false;
                                            ?>
                                            @foreach($game->sport as $sport)
                                                <div class="summary-rightSide game-coefficients">
                                                    <div class="provider-company">
                                                        <div class="provider-company-name">{{$sport->casino}}</div>

                                                        @switch($sport->casino)
                                                            @case('adjarasport')
                                                            <div class="provider-company-logo adjarabet"></div>
                                                            @break
                                                            @case('crystalsport')
                                                            <div class="provider-company-logo crystalbet"></div>
                                                            @break
                                                            @case('crocosport')
                                                            <div class="provider-company-logo crocobet"></div>
                                                            @break
                                                            @case('europesport')
                                                            <div class="provider-company-logo europebet"></div>
                                                            @break
                                                            @case('livesport')
                                                            <div class="provider-company-logo betlive"></div>
                                                            @break
                                                            @case('leadersport')
                                                            <div class="provider-company-logo leaderbet"></div>
                                                            @break
                                                        @endswitch
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$c1MaxFound && $sport['1_c'] >= $game->max['1_c']){
                                                        echo 'highlighted';
                                                        $c1MaxFound = true;
                                                    }  ?> d-flex-spaceCenter">
                                                        {{$sport['1_c']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$c2MaxFound && $sport['2_c'] >= $game->max['2_c']){
                                                        echo 'highlighted';
                                                        $c2MaxFound = true;
                                                    }  ?> d-flex-spaceCenter">
                                                        {{$sport['2_c']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$fora1MaxFound && $sport['fora_1'] >= $game->max['fora_1']){
                                                        echo 'highlighted';
                                                        $fora1MaxFound = true;
                                                    }  ?> d-flex-spaceCenter">
                                                        {{$sport['fora_1']}}
                                                    </div>
                                                    <div class="arrow-left"></div>
                                                    <div class="game-coefficient d-flex-spaceCenter handicap">
                                                        {{$sport['fora']}}
                                                    </div>
                                                    <div class="arrow-right"></div>
                                                    <div class="game-coefficient <?php if(!$fora2MaxFound && $sport['fora_2'] >= $game->max['fora_2']){
                                                        echo 'highlighted';
                                                        $fora2MaxFound = true;
                                                    }  ?> d-flex-spaceCenter">
                                                        {{$sport['fora_2']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$lessMaxFound && $sport['less'] >= $game->max['less']){
                                                        echo 'highlighted';
                                                        $lessMaxFound = true;
                                                    }  ?> d-flex-spaceCenter lessThan">
                                                        {{$sport['less']}}
                                                    </div>
                                                    <div class="arrow-left"></div>
                                                    <div class="game-coefficient d-flex-spaceCenter total">
                                                        {{$sport['total']}}
                                                    </div>
                                                    <div class="arrow-right"></div>
                                                    <div class="game-coefficient <?php if(!$moreMaxFound && $sport['more'] >= $game->max['more']){
                                                        echo 'highlighted';
                                                        $moreMaxFound = true;
                                                    }  ?> d-flex-spaceCenter higherThan">
                                                        {{$sport['more']}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                        @endif
                    @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div id="tennis-content" class="content">
                <div class="league-row d-flex-spaceBetween">
                    @foreach($data['leagues_tennis'] as $league)
                    <div class="league-row-inner">
                        <input class="leagueToggle2" type="checkbox" id="{{$league->id}}">
                        <label for="{{$league->id}}">{{ $league->name }}</label>
                    </div>
                    @endforeach
                </div>
                @foreach($data['leagues_tennis'] as $league)
                <div class="league-content league-content-tennis {{ $league->id }} current">
                    <div data-tab="league-content-{{ $league->id }}"  class="league-content-inner">
                        <div class="league-content-leftSide">
                            <img alt="" class="league-background" src="{{ asset('uploads/leagues/' . $league->background_image) }}">
                            <img alt="" class="league-logo" src="{{ asset('uploads/leagues/' . $league->image) }}">
                            <h1>{{ $league->name }}</h1>
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
                    <div id="league-content-{{ $league->id }}" class="game-tab current">
                        @if(isset($data['coefficients']['tennis']))
                    @foreach($data['coefficients']['tennis'] as $game)
                        @if($game['cat'] == $league->name)
                                <div class="game-tab-matches">
                                    <div data-tab="wimbledon-summary-{{$game->id}}" class="match">
                                        <div class="game-date">
                                            <p>{{date('H:i', strtotime($game->date))}}</p>
                                            <span>{{date('d.m.Y', strtotime($game->date))}}</span>
                                        </div>
                                        <div class="game-title">
                                            <div class="teams_name">{{$game->home_team}} vs {{$game->away_team}}</div>
                                        </div>
                                        <div class="game-icons">

                                        </div>
                                        <div class="game-coefficients">
                                            <div class="game-coefficient d-flex-spaceCenter">
                                                {{$game->sport[0]['1_c']}}
                                            </div>
                                            <div class="game-coefficient d-flex-spaceCenter">
                                                {{$game->sport[0]['2_c']}}
                                            </div>
                                            <div class="game-coefficient d-flex-spaceCenter">
                                                {{$game->sport[0]['fora_1']}}
                                            </div>
                                            <div class="arrow-left"></div>
                                            <div class="game-coefficient d-flex-spaceCenter handicap">
                                                {{$game->sport[0]['fora']}}
                                            </div>
                                            <div class="arrow-right"></div>
                                            <div class="game-coefficient d-flex-spaceCenter">
                                                {{$game->sport[0]['fora_2']}}
                                            </div>
                                            <div class="game-coefficient d-flex-spaceCenter lessThan">
                                                {{$game->sport[0]['less']}}
                                            </div>
                                            <div class="arrow-left"></div>
                                            <div class="game-coefficient d-flex-spaceCenter total">
                                                {{$game->sport[0]['total']}}
                                            </div>
                                            <div class="arrow-right"></div>
                                            <div class="game-coefficient d-flex-spaceCenter higherThan">
                                                {{$game->sport[0]['more']}}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wimbledon-summary-{{$game->id}}" class="summary">
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
                                        <div class="summary-inner" >
                                            <div class="summary-leftSide">

                                            </div>
                                            <?php
                                            $c1MaxFound = false;
                                            $c2MaxFound = false;
                                            $fora1MaxFound = false;
                                            $fora2MaxFound = false;
                                            $lessMaxFound = false;
                                            $moreMaxFound = false;
                                            ?>
                                            @foreach($game->sport as $sport)
                                                <div class="summary-rightSide game-coefficients">
                                                    <div class="provider-company">
                                                        <div class="provider-company-name">{{$sport->casino}}</div>

                                                        @switch($sport->casino)
                                                            @case('adjarasport')
                                                            <div class="provider-company-logo adjarabet"></div>
                                                            @break
                                                            @case('crystalsport')
                                                            <div class="provider-company-logo crystalbet"></div>
                                                            @break
                                                            @case('crocosport')
                                                            <div class="provider-company-logo crocobet"></div>
                                                            @break
                                                            @case('europesport')
                                                            <div class="provider-company-logo europebet"></div>
                                                            @break
                                                            @case('livesport')
                                                            <div class="provider-company-logo betlive"></div>
                                                            @break
                                                            @case('leadersport')
                                                            <div class="provider-company-logo leaderbet"></div>
                                                            @break
                                                        @endswitch
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$c1MaxFound && $sport['1_c'] >= $game->max['1_c']){
                                                        echo 'highlighted';
                                                        $c1MaxFound = true;
                                                    }  ?> d-flex-spaceCenter">
                                                        {{$sport['1_c']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$c2MaxFound && $sport['2_c'] >= $game->max['2_c']){
                                                        echo 'highlighted';
                                                        $c2MaxFound = true;
                                                    }  ?> d-flex-spaceCenter">
                                                        {{$sport['2_c']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$fora1MaxFound && $sport['fora_1'] >= $game->max['fora_1']){
                                                        echo 'highlighted';
                                                        $fora1MaxFound = true;
                                                    }  ?> d-flex-spaceCenter">
                                                        {{$sport['fora_1']}}
                                                    </div>
                                                    <div class="arrow-left"></div>
                                                    <div class="game-coefficient d-flex-spaceCenter handicap">
                                                        {{$sport['fora']}}
                                                    </div>
                                                    <div class="arrow-right"></div>
                                                    <div class="game-coefficient <?php if(!$fora2MaxFound && $sport['fora_2'] >= $game->max['fora_2']){
                                                        echo 'highlighted';
                                                        $fora2MaxFound = true;
                                                    }  ?> d-flex-spaceCenter">
                                                        {{$sport['fora_2']}}
                                                    </div>
                                                    <div class="game-coefficient <?php if(!$lessMaxFound && $sport['less'] >= $game->max['less']){
                                                        echo 'highlighted';
                                                        $lessMaxFound = true;
                                                    }  ?> d-flex-spaceCenter lessThan">
                                                        {{$sport['less']}}
                                                    </div>
                                                    <div class="arrow-left"></div>
                                                    <div class="game-coefficient d-flex-spaceCenter total">
                                                        {{$sport['total']}}
                                                    </div>
                                                    <div class="arrow-right"></div>
                                                    <div class="game-coefficient <?php if(!$moreMaxFound && $sport['more'] >= $game->max['more']){
                                                        echo 'highlighted';
                                                        $moreMaxFound = true;
                                                    }  ?> d-flex-spaceCenter higherThan">
                                                        {{$sport['more']}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                        @endif
                    @endforeach
                            @endif
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <section class="banner-table rightSide">
            @foreach($data['banners'] as $banner)
                <a target="_blank" href="{{$banner['url']}}" class="banner-table-first"
                   style="background: url('{{asset('uploads/banners/') . '/' . $banner['picture']}}') center no-repeat;
                    background-size: cover;"></a>
            @endforeach
        </section>
    </main>
    <script>
        $(document).ready(function() {
            @auth
            $('.owl-carousel-description-vote-button').on('click', function (e) {
                $(this).parent().parent().addClass('voted');
                $('.owl-carousel-description-vote').removeClass('not-voted');
                $('.owl-carousel-description-vote-progress span').css('display','block');
                $('.owl-carousel-description-vote-button').hide();
                $.ajax({
                    url: "{{route('pollVote')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {user_id: {{Auth::user()->id ?? ''}}, answer:  $(this).data("id"), question:  $(this).data("question") },
                    success: function (data) {

                    }
                });
            });
            @endauth
        });
    </script>
@endsection
