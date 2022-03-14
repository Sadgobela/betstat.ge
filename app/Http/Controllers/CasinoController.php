<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCasinoRequest;
use App\Http\Requests\StoreCasinoRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateCasinoRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Casino;
use App\Models\News;
use App\Models\User;
use App\Notifications\TenantInviteNotification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class CasinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casinoData = Casino::orderBy('id', 'desc')->paginate(10);
        return view('admin.casino.index', compact('casinoData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/casino.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCasinoRequest $request)
    {
        $pictureName = null;
        if($request->file('picture')){
        $pictureName = $request->file('picture')->getClientOriginalName() .
            '-' . time() . '.' .
            $request->picture->extension();
        $request->picture->move(public_path('uploads/casino'), $pictureName);
        }
        $csino = Casino::create([
            'category' => $request->input('category'),
            'title' => $request->input('title'),
            'rtp' => $request->input('rtp'),
            'url' => $request->input('url'),
            'text' => $request->input('text'),
            'picture' => $pictureName,
        ]);

        return redirect()->route('casino.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Casino $casino)
    {
        return view('admin/casino.edit', compact('casino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCasinoRequest $request, Casino $casino)
    {

        $oldPic = Casino::find($casino->id)->picture;
        if ($request->file('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/casino'), $pictureName);

            File::delete(public_path('uploads/casino/' . $oldPic));
        } else  {
            $pictureName = $oldPic;
        }
        $casino->update([
            'category' => $request->input('category'),
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'rtp' => $request->input('rtp'),
            'text' => $request->input('text'),
            'picture' => $pictureName,
        ]);
        return redirect()->route('casino.index');
    }

    public function removePicture(UpdateCasinoRequest $request)
    {
        Casino::where('id', $request->id)->update(array('picture' => ''));
        File::delete(public_path('uploads/casino/' . $request->picture));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Casino $casino)
    {
        $casino->delete();
        return redirect()->route('casino.index');
    }


    public function web() {
        $data['casinoData'] = Casino::orderBy('id', 'desc')->take(5)->get();
        $data['count'] = Casino::count();
        return view('casino', compact('data'));
    }

    public function getCasinoData(GetCasinoRequest $request) {
        return Casino::orderBy('id', 'desc')->skip($request->count)->take(5)->get();
    }
}
