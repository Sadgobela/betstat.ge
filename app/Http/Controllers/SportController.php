<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\StoresportRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\UpdateSportRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Imports\MultiSheetImport;
use App\Imports\SportImport;
use App\Imports\TeamImport;
use App\Models\Banner;
use App\Models\Game;
use App\Models\H2h;
use App\Models\League;
use App\Models\News;
use App\Models\Poll;
use App\Models\PollQuestion;
use App\Models\Promo;
use App\Models\Slider;
use App\Models\Sport;
use App\Models\Statistic;
use App\Models\Team;
use App\Models\User;
use App\Notifications\TenantInviteNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\Array_;

class SportController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sportData = Game::orderBy('id', 'desc')->paginate(10);
        return view('admin.sport.index', compact('sportData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $casinos = [
            'adjarasport',
            'crystalsport',
            'crocosport',
            'europesport',
            'livesport',
            'leadersport'
        ];

        $leagues = League::query()
            ->orderBy('order')
            ->get()
            ->groupBy('type');

        $teams = Team::query()->get();

        return view('admin/sport.create', compact('casinos', 'leagues', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {
        $gameId = Game::create([
            'home_team' => $request->input('homeTeam'),
            'away_team' => $request->input('awayTeam'),
            'type' => $request->input('type'),
            'cat' => $request->input('cat'),
            'link' => $request->input('link'),
            'date' => $request->input('date'),
            'end_date' => $request->input('end_date'),
        ])->id;
        foreach ($request['1'] as $key => $value) {
            $sport = Sport::create([
                'game_id' => $gameId,
                'casino' => $request->input('casino')[$key],
                '1_c' => $request->input('1')[$key],
                'x' => $request->input('x') ? $request->input('x')[$key] : null,
                '2_c' => $request->input('2')[$key],
                '1x' => $request->input('1x') ? $request->input('1x')[$key] : null,
                '12_c' => $request->input('12') ? $request->input('12')[$key] : null,
                'x2' => $request->input('x2') ? $request->input('x2')[$key] : null,
                'less' => $request->input('less')[$key],
                'total' => $request->input('total')[$key],
                'more' => $request->input('more')[$key],
                'yes' => $request->input('yes') ? $request->input('yes')[$key] : null,
                'no' => $request->input('no') ? $request->input('no')[$key] : null,
                'fora_1' => $request->input('fora_1') ? $request->input('fora_1')[$key] : null,
                'fora_2' => $request->input('fora_2') ? $request->input('fora_2')[$key] : null,
                'fora' => $request->input('fora') ? $request->input('fora')[$key] : null,
            ]);
        }
        if ($request->input('type') == 'football') {
            $h2h = H2h::create([
                'game_id' => $gameId,
                'goals_1' => $request->input('h2h')['goals_1'],
                'goals_2' => $request->input('h2h')['goals_2'],
                'corners_1' => $request->input('h2h')['corners_1'],
                'corners_2' => $request->input('h2h')['corners_2'],
                'offsides_1' => $request->input('h2h')['offsides_1'],
                'offsides_2' => $request->input('h2h')['offsides_2'],
                'fouls_1' => $request->input('h2h')['fouls_1'],
                'fouls_2' => $request->input('h2h')['fouls_2'],
                'cards_1' => $request->input('h2h')['cards_1'],
                'cards_2' => $request->input('h2h')['cards_2'],
                'throw_1' => $request->input('h2h')['throw_1'],
                'throw_2' => $request->input('h2h')['throw_2'],
            ]);
            foreach ($request['stat_5'] as $key => $value) {
                $static_5 = Statistic::create([
                    'game_id' => $gameId,
                    'last' => '5',
                    'court' => $key,
                    'shots_goal_1' => $request->input('stat_5')[$key]['shots_goal_1'],
                    'shots_goal_2' => $request->input('stat_5')[$key]['shots_goal_2'],
                    'goal_attempts_1' => $request->input('stat_5')[$key]['goal_attempts_1'],
                    'goal_attempts_2' => $request->input('stat_5')[$key]['goal_attempts_2'],
                    'corners_1' => $request->input('stat_5')[$key]['corners_1'],
                    'corners_2' => $request->input('stat_5')[$key]['corners_2'],
                    'offsides_1' => $request->input('stat_5')[$key]['offsides_1'],
                    'offsides_2' => $request->input('stat_5')[$key]['offsides_2'],
                    'fouls_1' => $request->input('stat_5')[$key]['fouls_1'],
                    'fouls_2' => $request->input('stat_5')[$key]['fouls_2'],
                    'cards_1' => $request->input('stat_5')[$key]['cards_1'],
                    'cards_2' => $request->input('stat_5')[$key]['cards_2'],
                    'throw_1' => $request->input('stat_5')[$key]['throw_1'],
                    'throw_2' => $request->input('stat_5')[$key]['throw_2'],
                ]);
            }

            foreach ($request['stat_season'] as $key => $value) {
                $static_season = Statistic::create([
                    'game_id' => $gameId,
                    'last' => 'season',
                    'court' => $key,
                    'shots_goal_1' => $request->input('stat_season')[$key]['shots_goal_1'],
                    'shots_goal_2' => $request->input('stat_season')[$key]['shots_goal_2'],
                    'goal_attempts_1' => $request->input('stat_season')[$key]['goal_attempts_1'],
                    'goal_attempts_2' => $request->input('stat_season')[$key]['goal_attempts_2'],
                    'corners_1' => $request->input('stat_season')[$key]['corners_1'],
                    'corners_2' => $request->input('stat_season')[$key]['corners_2'],
                    'offsides_1' => $request->input('stat_season')[$key]['offsides_1'],
                    'offsides_2' => $request->input('stat_season')[$key]['offsides_2'],
                    'fouls_1' => $request->input('stat_season')[$key]['fouls_1'],
                    'fouls_2' => $request->input('stat_season')[$key]['fouls_2'],
                    'cards_1' => $request->input('stat_season')[$key]['cards_1'],
                    'cards_2' => $request->input('stat_season')[$key]['cards_2'],
                    'throw_1' => $request->input('stat_season')[$key]['throw_1'],
                    'throw_2' => $request->input('stat_season')[$key]['throw_2'],
                ]);
            }
        }
        return redirect()->route('sport.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sport = [];
        $sport['game'] = Game::where('id', '=', $id)->first();
        $sport['h2h'] = H2h::where('game_id', '=', $id)->first();
        $sport['sport'] = Sport::where('game_id', '=', $id)->get();
        $sport['statistic'] = Statistic::where('game_id', '=', $id)->get();
        $leagues = League::query()
            ->orderBy('order')
            ->get()
            ->groupBy('type');
        $teams = Team::query()->get();


        return view('admin/sport.edit', compact('sport', 'leagues', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesportRequest $request, $id)
    {
        Game::where('id', $id)->update([
            'home_team' => $request->input('homeTeam'),
            'away_team' => $request->input('awayTeam'),
            'cat' => $request->input('cat'),
            'link' => $request->input('link'),
            'date' => $request->input('date'),
            'end_date' => $request->input('end_date'),
        ]);
//        dd($request->input('x'));
        foreach ($request['sportIds'] as $key => $value) {
            Sport::where('id', $request->input('sportIds')[$key])->update([
                '1_c' => $request->input('1')[$key],
                'x' => $request->input('x') ? $request->input('x')[$key] : null,
                '2_c' => $request->input('2')[$key],
                '1x' => $request->input('1x') ? $request->input('1x')[$key] : null,
                '12_c' => $request->input('12') ? $request->input('12')[$key] : null,
                'x2' => $request->input('x2') ? $request->input('x2')[$key] : null,
                'casino' => $request->input('casino')[$key],
                'less' => $request->input('less')[$key],
                'total' => $request->input('total')[$key],
                'more' => $request->input('more')[$key],
                'yes' => $request->input('yes') ? $request->input('yes')[$key] : null,
                'no' => $request->input('no') ? $request->input('no')[$key] : null,
                'fora_1' => $request->input('fora_1') ? $request->input('fora_1')[$key] : null,
                'fora_2' => $request->input('fora_2') ? $request->input('fora_2')[$key] : null,
                'fora' => $request->input('fora') ? $request->input('fora')[$key] : null,
            ]);
        }
//        dd($request->all());
        if ($request->input('type') == 'football') {
            H2h::where('game_id', $id)->update($request->input('h2h'));
            Statistic::where('game_id', $id)
                ->where('last', '5')
                ->where('court', 'home')->update($request->input('stat_5')['home']);
            Statistic::where('game_id', $id)
                ->where('last', '5')
                ->where('court', 'away')->update($request->input('stat_5')['away']);
            Statistic::where('game_id', $id)
                ->where('last', 'season')
                ->where('court', 'home')->update($request->input('stat_season')['home']);
            Statistic::where('game_id', $id)
                ->where('last', 'season')
                ->where('court', 'away')->update($request->input('stat_season')['away']);
        }
        return redirect()->route('sport.index');
    }

    public function web()
    {
        $data = [];
        $games = collect(Game::orderBy('id', 'asc')->active()->get())->groupBy('type');

        foreach ($games as $key => $game) {
            if ($key == 'football') {
                foreach ($games[$key] as $football) {
                    $football['h2h'] = H2h::where('game_id', $football->id)->first();
                    $football['statistic'] = collect(Statistic::where('game_id', $football->id)->get());

                }
            }
            foreach ($games[$key] as $anyGame) {
                $anyGame['sport'] = collect(Sport::where('game_id', $anyGame->id)->get());
                $anyGame['max'] = [
                    '1_c' => $anyGame['sport']->max('1_c'),
                    'x' => $anyGame['sport']->max('x'),
                    '2_c' => $anyGame['sport']->max('2_c'),
                    '1x' => $anyGame['sport']->max('1x'),
                    '12_c' => $anyGame['sport']->max('12_c'),
                    'x2' => $anyGame['sport']->max('x2'),
                    'less' => $anyGame['sport']->max('less'),
                    'total' => $anyGame['sport']->max('total'),
                    'more' => $anyGame['sport']->max('more'),
                    'yes' => $anyGame['sport']->max('yes'),
                    'no' => $anyGame['sport']->max('no'),
                    'fora_1' => $anyGame['sport']->max('fora_1'),
                    'fora' => $anyGame['sport']->max('fora'),
                    'fora_2' => $anyGame['sport']->max('fora_2')
                ];

            }

        }

        $data['pollQuestions'] = PollQuestion::query()
            ->with('pollAnswers')
            ->whereActive(true)
            ->get();

        $data['pollVotedByUser'] = auth()->user() ? auth()->user()->pollActiveQuestions()->pluck('poll_question_id') : collect([]);

//        $pollData = collect(Poll::get());
//        $sliderData = collect(Slider::get());

        $data['slider'] = Collect(Slider::orderBy('id', 'desc')->take(3)->get()->toArray());
        $data['banners'] = Collect(Banner::orderBy('id', 'desc')->get()->toArray());
//        dd($data['slider']);
//        dd($data['pollData'][1]);
        $data['promos'] = Collect(Promo::orderBy('rating', 'desc')->take(3)->get()->toArray());
        $data['news'] = Collect(News::orderBy('id', 'asc')->where('slider', 1)->take(3)->get()->toArray());
        $data['coefficients'] = $games;
        $data['leagues_football'] = League::query()
            ->orderBy('order')
            ->whereType('football')
            ->whereActive(true)
            ->get();
        $data['leagues_basketball'] = League::query()
            ->orderBy('order')
            ->whereType('basketball')
            ->whereActive(true)
            ->get();
        $data['leagues_tennis'] = League::query()
            ->orderBy('order')
            ->whereType('tennis')
            ->whereActive(true)
            ->get();
        return view('home', compact('data'));
    }


    public function adminLogin(Request $request)
    {
//        dd($this->validateLogin($request));
        $this->validateLogin($request);
//        dd($this->validateLogin($request));
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.


        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    function importSport(StoreNewsRequest $request)
    {
       $file = $request->file('file');
       Excel::import(new MultiSheetImport, $file);
       return back()->withStatus('uploaded');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $game = Game::find($id);

        $game->forceDelete();

        return redirect()->route('sport.index');
    }

}
