<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCasinoRequest;
use App\Http\Requests\GetPromotionsRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\StorePokerRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\UpdateP2pRequest;
use App\Http\Requests\UpdatePokerRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\News;
use App\Models\P2p;
use App\Models\Poker;
use App\Models\User;
use App\Notifications\TenantInviteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class P2pController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd($_GET['cat']);
        $p2pData = P2p::where('cat', $_GET['cat'])->orderBy('id', 'desc')->paginate(20);
        return view('admin.p2p.index', compact('p2pData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/p2p.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePokerRequest $request)
    {

        $poker = Poker::create($request->all());

        return redirect()->route('p2p.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(P2p $p2p)
    {
        return view('admin/p2p.edit', compact('p2p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateP2pRequest $request, P2p $p2p)
    {

        $p2p->update($request->all());
//        dd($request->all());
        return redirect()->route('p2p.index',['cat'=> $p2p->cat]);
    }


    public function web() {

        $data['games'] = collect(P2p::get())->groupBy(['casino','cat']);
        $data['poker'] = Poker::orderBy('id', 'desc')->take(10)->get();
        $data['pageCount'] = ceil(Poker::get()->count()/10);
        $data['totalCount'] = Poker::get()->count();
//        dd($data['games']);

//        dd($page);

        return view('table-games', compact('data'));
    }

    public function getGamesData(GetCasinoRequest $request) {
//        dd($request->perPage);
       $data['items'] = Poker::orderBy('id', 'desc')
           ->where('casino', 'LIKE', "%{$request->search}%")->
           orWhere('tournament', 'LIKE', "%{$request->search}%")
           ->skip(($request->page - 1) * $request->perPage)->take($request->perPage)->get();
       $data['totalCount'] = Poker::where('casino', 'LIKE', "%{$request->search}%")
           ->orWhere('tournament', 'LIKE', "%{$request->search}%")->count();
           return $data;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poker $poker)
    {
//        dd($news);
        $poker->delete();

        return redirect()->route('p2p.index');
    }

}
