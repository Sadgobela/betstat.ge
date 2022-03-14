<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCasinoRequest;
use App\Http\Requests\StoreCasinoRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateCasinoRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Banner;
use App\Models\Casino;
use App\Models\News;
use App\Models\User;
use App\Notifications\TenantInviteNotification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannersData = Banner::orderBy('id', 'desc')->paginate(10);
        return view('admin.banners.index', compact('bannersData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCasinoRequest $request)
    {
        return redirect()->route('banners.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin/banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCasinoRequest $request, Banner $banner)
    {

        $oldPic = Banner::find($banner->id)->picture;
        if ($request->file('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/banners'), $pictureName);

            File::delete(public_path('uploads/banners/' . $oldPic));
        } else  {
            $pictureName = $oldPic;
        }
        $banner->update([
            'url' => $request->input('url'),
            'picture' => $pictureName,
        ]);
        return redirect()->route('banners.index');
    }

    public function removePicture(UpdateCasinoRequest $request)
    {
//        dd('123');
        Banner::where('id', $request->id)->update(array('picture' => ''));
        File::delete(public_path('uploads/banners/' . $request->picture));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banners.index');
    }


    public function web() {
        $data = Banner::orderBy('id', 'desc')->get();
        return view('banners', compact('data'));
    }
}
