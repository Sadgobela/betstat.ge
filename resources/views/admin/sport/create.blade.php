@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Sport</div>

                    <div class="card-body">
                        <form action="{{ route('sport.store') }}" method="POST">
                            @csrf
                            <input type="text" value="{{$_GET['type']}}" name="type" style="display: none">
                            <div class="form-group row">
                                <div class="col-md-4">
{{--                                    <input id="homeTeam" type="text"--}}
{{--                                           class="form-control" name="homeTeam"--}}
{{--                                           placeholder="Home Team"--}}
{{--                                           autocomplete="homeTeam">--}}
                                    <select class="form-control"  id="select_leagues_home_team" name="homeTeam">
                                        @foreach($teams as $team)
                                            <option  value="{{ $team->name }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
{{--                                    <input id="awayTeam" type="text"--}}
{{--                                           class="form-control" name="awayTeam"--}}
{{--                                           placeholder="Away Team"--}}
{{--                                           autocomplete="awayTeam">--}}
                                    <select class="form-control"  id="select_leagues_away_team" name="awayTeam">
                                        @foreach($teams as $team)
                                            <option  value="{{ $team->name }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input id="date" type="datetime-local"
                                           class="form-control" name="date"
                                           autocomplete="date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    @if($_GET['type'] == 'football')

                                    <select class="form-control"  id="select_leagues" name="cat">
                                        @foreach($leagues as $league)
                                            <option  value="{{ $league->name }}">{{ $league->name }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                    @if($_GET['type'] == 'basketball')
                                    <select class="form-control" id="car" name="cat">
                                        <option value="NBA" selected>NBA</option>
                                        <option value="Euroleague">Euroleague</option>
                                    </select>
                                    @endif
                                    @if($_GET['type'] == 'tennis')
                                    <select class="form-control" id="car" name="cat">
                                        <option value="Wimbledon" selected>Wimbledon</option>
                                        <option value="Australian Open">Australian Open</option>
                                        <option value="French Open">French Open</option>
                                        <option value="US Open">US Open</option>
                                    </select>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <input id="link" type="text"
                                           placeholder="link"
                                           class="form-control" name="link"
                                           autocomplete="date">
                                </div>

                                <div class="col-md-4">
                                    <input id="end_date" type="datetime-local"
                                           class="form-control" name="end_date"
                                           autocomplete="end_date">
                                </div>
                            </div>
{{--                                {{$casino}}--}}
{{--                            @endforeach--}}
                            <table class="sport">
                                <tr>
                                    <th style="width: 130px">Casino</th>
                                    <th>1</th>
                                    @if($_GET['type'] == 'football')
                                    <th>X</th>
                                    @endif
                                    <th>2</th>
                                    @if($_GET['type'] != 'football')
                                    <th>1</th>
                                    <th>ფორა</th>
                                    <th>2</th>
                                    @endif
                                    @if($_GET['type'] == 'football')
                                    <th>1X</th>
                                    <th>12</th>
                                    <th>X2</th>
                                    @endif
                                    <th><</th>
                                    <th>ტოტ</th>
                                    <th>></th>
                                    @if($_GET['type'] == 'football')
                                    <th>კი</th>
                                    <th>არა</th>
                                    @endif
                                </tr>
                                @foreach ($casinos as $casino)
                                <tr >
                                    <td><input id="casino" type="text" class="form-control" name="casino[]"
                                               value="{{$casino}}" readonly="true"></td>
                                    <td><input id="1" type="text" class="form-control" name="1[]"></td>
                                    @if($_GET['type'] == 'football')
                                    <td><input id="x" type="text" class="form-control" name="x[]"></td>
                                    @endif
                                    <td><input id="2" type="text" class="form-control" name="2[]"></td>

                                    @if($_GET['type'] != 'football')
                                    <td><input id="2" type="text" class="form-control" name="fora_1[]"></td>
                                    <td><input id="2" type="text" class="form-control" name="fora[]"></td>
                                    <td><input id="2" type="text" class="form-control" name="fora_2[]"></td>
                                    @endif

                                    @if($_GET['type'] == 'football')
                                    <td><input id="1x" type="text" class="form-control" name="1x[]"></td>
                                    <td><input id="12" type="text" class="form-control" name="12[]"></td>
                                    <td><input id="x2" type="text" class="form-control" name="x2[]"></td>
                                    @endif
                                    <td><input id="less" type="text" class="form-control" name="less[]"></td>
                                    <td><input id="tot" type="text" class="form-control" name="total[]"></td>
                                    <td><input id="more" type="text" class="form-control" name="more[]"></td>
                                    @if($_GET['type'] == 'football')
                                    <td><input id="yes" type="text" class="form-control" name="yes[]"></td>
                                    <td><input id="no" type="text" class="form-control" name="no[]"></td>
                                    @endif
                                </tr>
                                @endforeach
                            </table>
                           @if($_GET['type'] == 'football')
                            <div class="form-group row" >
                                <div class="col-md-3">
                                   <table style="margin-top: 10px">
                                       <tr>
                                           <td colspan="3" style="background-color: #e9ecef; text-align: center">H2H</td>
                                       </tr>
                                       <tr>
                                           <td><input type="text" class="form-control" name="h2h[goals_1]"></td>
                                           <td style="width: 45%; text-align: center">გოლი</td>
                                           <td><input type="text" class="form-control" name="h2h[goals_2]"></td>
                                       </tr>
                                       <tr>
                                           <td><input type="text" class="form-control" name="h2h[corners_1]"></td>
                                           <td style="width: 45%; text-align: center">კუთხური</td>
                                           <td><input type="text" class="form-control" name="h2h[corners_2]"></td>
                                       </tr>
                                       <tr>
                                           <td><input type="text" class="form-control" name="h2h[offsides_1]"></td>
                                           <td style="width: 45%; text-align: center">ოფსაიდი</td>
                                           <td><input type="text" class="form-control" name="h2h[offsides_2]"></td>
                                       </tr>
                                       <tr>
                                           <td><input type="text" class="form-control" name="h2h[cards_1]"></td>
                                           <td style="width: 45%; text-align: center">ბარათი</td>
                                           <td><input type="text" class="form-control" name="h2h[cards_2]"></td>
                                       </tr>
                                       <tr>
                                           <td><input type="text" class="form-control" name="h2h[fouls_1]"></td>
                                           <td style="width: 45%; text-align: center">ჯარიმა</td>
                                           <td><input type="text" class="form-control" name="h2h[fouls_2]"></td>
                                       </tr>
                                       <tr>
                                           <td><input type="text" class="form-control" name="h2h[throw_1]"></td>
                                           <td style="width: 45%; text-align: center">აუტი</td>
                                           <td><input type="text" class="form-control" name="h2h[throw_2]"></td>
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
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][goal_attempts_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][goal_attempts_2]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][shots_goal_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][shots_goal_2]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][corners_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][corners_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][offsides_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][offsides_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][throw_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][throw_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][fouls_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][fouls_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][cards_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[home][cards_2]"></td>

                                        </tr>
                                        <tr>
                                            <td style="background-color: #e9ecef">გასვლა</td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][goal_attempts_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][goal_attempts_2]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][shots_goal_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][shots_goal_2]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][corners_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][corners_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][offsides_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][offsides_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][throw_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][throw_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][fouls_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][fouls_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][cards_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_5[away][cards_2]"></td>
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
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][goal_attempts_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][goal_attempts_2]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][shots_goal_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][shots_goal_2]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][corners_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][corners_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][offsides_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][offsides_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][throw_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][throw_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][fouls_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][fouls_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][cards_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[home][cards_2]"></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #e9ecef">გასვლა</td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][goal_attempts_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][goal_attempts_2]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][shots_goal_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][shots_goal_2]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][corners_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][corners_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][offsides_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][offsides_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][throw_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][throw_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][fouls_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][fouls_2]"></td>
                                            <td>
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][cards_1]">
                                                <input type="text" class="form-control dn-sport-input" name="stat_season[away][cards_2]"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                @endif
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

@section('js')

      <script>
        $(document).ready(function() {
            $('#select_leagues').select2({
                theme:"classic"
            });
            $('#select_leagues_away_team').select2({
                theme:"classic"
            });
            $('#select_leagues_home_team').select2({
                theme:"classic"
            });

        });

    </script>
@endsection





