<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Leagues\StoreRequest;
use App\Http\Requests\Admin\Leagues\UpdateRequest;
use App\Models\League;
use App\Services\Media\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{
    public $directory = 'uploads/leagues';

    public function index()
    {
        $leagues = League::orderBy('order')->paginate(10);
        return view('admin.leagues.index', compact('leagues'));
    }

    public function create()
    {
        $sportTypes = ['football', 'basketball', 'tennis'];
        return view('admin/leagues.create', compact('sportTypes'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $attributes = $request->all();

        $attributes['order'] = League::getOrder($request);

        $attributes['image'] = (new Media($request, 'image', $this->directory))->make();

        $attributes['background_image'] = (new Media($request, 'background_image', $this->directory))->make();

        League::create($attributes);

        return redirect()->route('leagues.index');
    }

    public function edit(League $league)
    {
        $sportTypes = ['football', 'basketball', 'tennis'];
        return view('admin/leagues.edit', compact('league', 'sportTypes'));
    }

    public function update(UpdateRequest $request, League $league): RedirectResponse
    {
        $attributes = $request->all();

        $attributes['order'] = League::getOrder($request) ? League::getOrder($request) : $league->order;

        $attributes['image'] = (new Media($request, 'image', $this->directory, $league))->make();

        $attributes['background_image'] = (new Media($request, 'background_image', $this->directory, $league))->make();

        $league->update($attributes);

        return back();
    }

    public function destroy(League $league): RedirectResponse
    {
        $league->delete();
        return redirect()->route('leagues.index');
    }

    public function toggleActive(Request $request)
    {
        League::whereId($request->id)->update(['active' => $request->value]);
    }
}
