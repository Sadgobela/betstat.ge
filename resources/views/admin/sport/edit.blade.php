@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Sport</div>
                    <div class="card-body">
                        <form action="{{ route('sport.update', $sport['game']->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="text" value="{{$sport['game']->type}}" name="type" style="display: none">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input id="homeTeam" type="text"
                                           class="form-control" name="homeTeam"
                                           value="{{$sport['game']->home_team}}"
                                           placeholder="Home Team"
                                           autocomplete="homeTeam">
                                </div>
                                <div class="col-md-4">
                                    <input id="awayTeam" type="text"
                                           class="form-control" name="awayTeam"
                                           value="{{$sport['game']->away_team}}"
                                           placeholder="Away Team"
                                           autocomplete="awayTeam">
                                </div>
                                <div class="col-md-4">
                                    <input id="date" type="datetime-local"
                                           value="{{date('Y-m-d\TH:i:s', strtotime($sport['game']->date))}}"
                                           class="form-control" name="date"
                                           autocomplete="date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    @if($sport['game']->type == 'football')
                                        <select class="form-control" id="car" name="cat">
                                            <option value="პრემიერ ლიგა"  @if ($sport['game']->cat === 'პრემიერ ლიგა') selected="selected"
                                                @endif>პრემიერ ლიგა</option>
                                            <option value="ლა ლიგა" @if ($sport['game']->cat === 'ლა ლიგა') selected="selected"
                                                @endif>ლა ლიგა</option>
                                            <option value="ბუნდეს ლიგა" @if ($sport['game']->cat === 'ბუნდეს ლიგა') selected="selected"
                                                @endif>ბუნდეს ლიგა</option>
                                            <option value="სერია ა" @if ($sport['game']->cat === 'სერია ა') selected="selected"
                                                @endif>სერია ა</option>
                                            <option value="ჩემპიონთა ლიგა" @if ($sport['game']->cat === 'ჩემპიონთა ლიგა') selected="selected"
                                                @endif>ჩემპიონთა ლიგა</option>
                                            <option value="ევროპის ლიგა" @if ($sport['game']->cat === 'ევროპის ლიგა') selected="selected"
                                                @endif>ევროპის ლიგა</option>
                                            <option value="საფრანგეთის ლიგა 1" @if ($sport['game']->cat === 'საფრანგეთის ლიგა 1') selected="selected"
                                                @endif>საფრანგეთის ლიგა 1</option>
                                        </select>
                                    @endif
                                    @if($sport['game']->type == 'basketball')
                                        <select class="form-control" id="car" name="cat">
                                            <option value="NBA" @if ($sport['game']->cat === 'NBA') selected="selected"
                                            @endif>NBA</option>
                                            <option value="Euroleague" @if ($sport['game']->cat === 'Euroleague') selected="selected"
                                                @endif>Euroleague</option>
                                        </select>
                                    @endif
                                    @if($sport['game']->type == 'tennis')
                                        <select class="form-control" id="car" name="cat">
                                            <option value="Wimbledon"  @if ($sport['game']->cat === 'Wimbledon') selected="selected"
                                                @endif>Wimbledon</option>
                                            <option value="Australian Open" @if ($sport['game']->cat === 'Australian Open') selected="selected"
                                                @endif>Australian Open</option>
                                            <option value="French Open" @if ($sport['game']->cat === 'French Open') selected="selected"
                                                @endif>French Open</option>
                                            <option value="US Open" @if ($sport['game']->cat === 'US Open') selected="selected"
                                                @endif>US Open</option>
                                        </select>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <input id="link" type="text"
                                           placeholder="link"
                                           value="{{$sport['game']->link}}"
                                           class="form-control" name="link"
                                           autocomplete="date">
                                </div>
                            </div>

                            {{--                                {{$casino}}--}}
                            {{--                            @endforeach--}}
                            <table class="sport">
                                <tr>
                                    <th style="width: 130px">Casino</th>
                                    <th>1</th>
                                    @if($sport['game']->type == 'football')
                                        <th>X</th>
                                    @endif
                                    <th>2</th>
                                    @if($sport['game']->type != 'football')
                                    <th>1</th>
                                    <th>ფორა</th>
                                    <th>2</th>
                                    @endif
                                    @if($sport['game']->type == 'football')
                                        <th>1X</th>
                                        <th>12</th>
                                        <th>X2</th>
                                    @endif
                                    <th><</th>
                                    <th>ტოტ</th>
                                    <th>></th>
                                    @if($sport['game']->type == 'football')
                                        <th>კი</th>
                                        <th>არა</th>
                                    @endif
                                </tr>
                                @foreach ($sport['sport'] as $coefficients)
                                    <tr>
                                        <td>
                                            <input id="casino" type="text" class="form-control" name="casino[]"
                                                   value="{{$coefficients->casino}}" readonly="true">
                                            <input type="text" style="display: none" name="sportIds[]"
                                                   value="{{$coefficients->id}}" readonly="true">
                                        </td>
                                        <td><input id="1" type="text" class="form-control"
                                                   value="{{$coefficients['1_c']}}" name="1[]"></td>
                                        @if($sport['game']->type == 'football')
                                            <td><input id="x" type="text" class="form-control"
                                                       value="{{$coefficients['x']}}" name="x[]"></td>
                                        @endif
                                        <td><input id="2" type="text" class="form-control"
                                                   value="{{$coefficients['2_c']}}" name="2[]"></td>
                                        @if($sport['game']->type != 'football')
                                        <td><input id="fora_1" type="text" class="form-control"
                                                   value="{{$coefficients['fora_1']}}" name="fora_1[]"></td>
                                        <td><input id="fora" type="text" class="form-control"
                                                   value="{{$coefficients['fora']}}" name="fora[]"></td>
                                        <td><input id="fora_2" type="text" class="form-control"
                                                   value="{{$coefficients['fora_2']}}" name="fora_2[]"></td>
                                        @endif
                                        @if($sport['game']->type == 'football')
                                            <td><input id="1x" type="text" class="form-control"
                                                       value="{{$coefficients['1x']}}" name="1x[]"></td>
                                            <td><input id="12" type="text" class="form-control"
                                                       value="{{$coefficients['12_c']}}" name="12[]"></td>
                                            <td><input id="x2" type="text" class="form-control"
                                                       value="{{$coefficients['x2']}}" name="x2[]"></td>
                                        @endif
                                        <td><input id="less" type="text" class="form-control"
                                                   value="{{$coefficients['less']}}" name="less[]"></td>
                                        <td><input id="tot" type="text" class="form-control"
                                                   value="{{$coefficients['total']}}" name="total[]"></td>
                                        <td><input id="more" type="text" class="form-control"
                                                   value="{{$coefficients['more']}}" name="more[]"></td>
                                        @if($sport['game']->type == 'football')
                                            <td><input id="yes" type="text" class="form-control"
                                                       value="{{$coefficients['yes']}}" name="yes[]"></td>
                                            <td><input id="no" type="text" class="form-control"
                                                       value="{{$coefficients['no']}}" name="no[]"></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                            @if($sport['game']->type == 'football')
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <table style="margin-top: 10px">
                                            <tr>
                                                <td colspan="3" style="background-color: #e9ecef; text-align: center">
                                                    H2H
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->goals_1}}" name="h2h[goals_1]"></td>
                                                <td style="width: 45%; text-align: center">გოლი</td>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->goals_2}}" name="h2h[goals_2]"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->corners_1}}" name="h2h[corners_1]">
                                                </td>
                                                <td style="width: 45%; text-align: center">კუთხური</td>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->corners_2}}" name="h2h[corners_2]">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->offsides_1}}" name="h2h[offsides_1]">
                                                </td>
                                                <td style="width: 45%; text-align: center">ოფსაიდი</td>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->offsides_2}}" name="h2h[offsides_2]">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->cards_1}}" name="h2h[cards_1]"></td>
                                                <td style="width: 45%; text-align: center">ბარათი</td>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->cards_2}}" name="h2h[cards_2]"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->fouls_1}}" name="h2h[fouls_1]"></td>
                                                <td style="width: 45%; text-align: center">ჯარიმა</td>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->fouls_2}}" name="h2h[fouls_2]"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->throw_1}}" name="h2h[throw_1]"></td>
                                                <td style="width: 45%; text-align: center">აუტი</td>
                                                <td><input type="text" class="form-control"
                                                           value="{{$sport['h2h']->throw_2}}" name="h2h[throw_2]"></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-md-9">
                                        <table style="width:100%; margin-top: 10px" class="statistic">
                                            <tr style="background-color: #e9ecef">
                                                <td>ბოლო 5</td>
                                                <td>დარტყმა</td>
                                                <td> კარში დარტყმა</td>
                                                <td>კუთხური</td>
                                                <td>თამაშგარე</td>
                                                <td>აუტი</td>
                                                <td>ჯარიმა</td>
                                                <td>ბარათი</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #e9ecef">სახლი</td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['goal_attempts_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][goal_attempts_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['goal_attempts_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][goal_attempts_2]">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['shots_goal_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][shots_goal_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['shots_goal_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][shots_goal_2]">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['corners_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][corners_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['corners_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][corners_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['offsides_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][offsides_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['offsides_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][offsides_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['throw_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][throw_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['throw_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][throw_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['fouls_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][fouls_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['fouls_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][fouls_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['cards_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][cards_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][0]['cards_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[home][cards_2]"></td>

                                            </tr>
                                            <tr>
                                                <td style="background-color: #e9ecef">გასვლა</td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['goal_attempts_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][goal_attempts_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['goal_attempts_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][goal_attempts_2]">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['shots_goal_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][shots_goal_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['shots_goal_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][shots_goal_2]">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['corners_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][corners_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['corners_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][corners_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['offsides_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][offsides_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['offsides_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][offsides_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['throw_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][throw_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['throw_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][throw_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['fouls_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][fouls_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['fouls_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][fouls_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['cards_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][cards_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][1]['cards_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_5[away][cards_2]"></td>
                                            </tr>
                                        </table>

                                        <table style="width:100%; margin-top: 10px" class="statistic">
                                            <tr style="background-color: #e9ecef">
                                                <td>სეზონი</td>
                                                <td>დარტყმა</td>
                                                <td> კარში დარტყმა</td>
                                                <td>კუთხური</td>
                                                <td>თამაშგარე</td>
                                                <td>აუტი</td>
                                                <td>ჯარიმა</td>
                                                <td>ბარათი</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #e9ecef">სახლი</td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['goal_attempts_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][goal_attempts_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['goal_attempts_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][goal_attempts_2]">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['shots_goal_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][shots_goal_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['shots_goal_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][shots_goal_2]">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['corners_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][corners_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['corners_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][corners_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['offsides_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][offsides_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['offsides_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][offsides_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['throw_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][throw_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['throw_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][throw_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['fouls_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][fouls_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['fouls_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][fouls_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['cards_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][cards_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][2]['cards_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[home][cards_2]"></td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #e9ecef">გასვლა</td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['goal_attempts_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][goal_attempts_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['goal_attempts_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][goal_attempts_2]">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['shots_goal_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][shots_goal_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['shots_goal_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][shots_goal_2]">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['corners_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][corners_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['corners_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][corners_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['offsides_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][offsides_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['offsides_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][offsides_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['throw_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][throw_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['throw_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][throw_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['fouls_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][fouls_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['fouls_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][fouls_2]"></td>
                                                <td>
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['cards_1']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][cards_1]">
                                                    <input type="text"
                                                           value="{{$sport['statistic'][3]['cards_2']}}"
                                                           class="form-control dn-sport-input"
                                                           name="stat_season[away][cards_2]"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection