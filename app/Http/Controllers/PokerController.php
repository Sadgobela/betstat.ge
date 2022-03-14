<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\StorePokerRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\UpdatePokerRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\News;
use App\Models\Poker;
use App\Models\User;
use App\Notifications\TenantInviteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class PokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokerData = Poker::orderBy('id', 'desc')->paginate(10);
        return view('admin.poker.index', compact('pokerData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/poker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePokerRequest $request)
    {
        $pictureName = null;
        if($request->file('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/poker'), $pictureName);
        }
        $poker = Poker::create([
            'casino' => $request->input('casino'),
            'date' => $request->input('date'),
            'tournament' => $request->input('tournament'),
            'amount' => $request->input('amount'),
            'prize' => $request->input('prize'),
            'picture' => $pictureName,
        ]);

        return redirect()->route('poker.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Poker $poker)
    {
        return view('admin/poker.edit', compact('poker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePokerRequest $request, Poker $poker)
    {
        $oldPic = Poker::find($poker->id)->picture;
        if ($request->file('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/poker'), $pictureName);

            File::delete(public_path('uploads/poker/' . $oldPic));
        } else  {
            $pictureName = $oldPic;
        }

        $poker->update([
            'casino' => $request->input('casino'),
            'date' => $request->input('date'),
            'tournament' => $request->input('tournament'),
            'amount' => $request->input('amount'),
            'prize' => $request->input('prize'),
            'picture' => $pictureName,
        ]);
        return redirect()->route('poker.index');
    }

    public function removePokerPicture(UpdateNewsRequest $request)
    {
        Poker::where('id', $request->id)->update(array('picture' => ''));

        File::delete(public_path('uploads/poker/' . $request->picture));
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

        return redirect()->route('poker.index');
    }

}
