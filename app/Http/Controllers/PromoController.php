<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetPromotionsRequest;
use App\Http\Requests\StoreCasinoRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\StorePromoRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateCasinoRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\UpdatePromoRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Casino;
use App\Models\News;
use App\Models\Promo;
use App\Models\User;
use App\Notifications\TenantInviteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promoData = Promo::orderBy('id', 'desc')->paginate(10);
        return view('admin.promo.index', compact('promoData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/promo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromoRequest $request)
    {
        $logoName = null;
        $imageName = null;
        if($request->file('logo')) {
        $logoName = $request->file('logo')->getClientOriginalName() .
            '-' . time() . '.' .
            $request->logo->extension();
        $request->logo->move(public_path('uploads/promo/logos'), $logoName);
        }
        if($request->file('image')) {
            $imageName = $request->file('image')->getClientOriginalName() .
                '-' . time() . '.' .
                $request->image->extension();
            $request->image->move(public_path('uploads/promo/images'), $imageName);
        }
        $promo = Promo::create([
            'title' => $request->input('title'),
            'category1' => $request->input('category1'),
            'category2' => $request->input('category2'),
            'casinoName' => $request->input('casinoName'),
            'rating' => $request->input('rating'),
            'text' => $request->input('text'),
            'logo' => $logoName,
            'image' => $imageName,
            'video' => $request->input('video'),
            'button' => $request->input('button'),
        ]);

        return redirect()->route('promo.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('admin/promo.edit', compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromoRequest $request, Promo $promo)
    {

        $oldImage = Promo::find($promo->id)->image;
        $imageName = $oldImage;
        if ($request->file('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/promo/images'), $imageName);
            File::delete(public_path('uploads/promo/images/' . $oldImage));
        }

        $oldLogo = Promo::find($promo->id)->logo;
        $logoName = $oldLogo;
        if ($request->file('logo')) {
            $logoName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/promo/logos'), $logoName);
            File::delete(public_path('uploads/promo/logos/' . $oldLogo));
        }

        $promo->update([
            'title' => $request->input('title'),
            'category1' => $request->input('category1'),
            'category2' => $request->input('category2'),
            'casinoName' => $request->input('casinoName'),
            'rating' => $request->input('rating'),
            'text' => $request->input('text'),
            'image' => $imageName,
            'logo' => $logoName,
            'video' => $request->input('video'),
            'button' => $request->input('button'),
        ]);
        return redirect()->route('promo.index');
    }

    public function promoRemoveLogo(UpdatePromoRequest $request)
    {
        Promo::where('id', $request->id)->update(array('logo' => ''));
        File::delete(public_path('uploads/promo/logos/' . $request->logo));
    }

    public function promoRemoveImage(UpdatePromoRequest $request)
    {
        Promo::where('id', $request->id)->update(array('image' => ''));
        File::delete(public_path('uploads/promo/images/' . $request->image));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('promo.index');
    }

    public function web() {
        if ($_GET && $_GET['cat']) {
            $data['promoData'] = Promo::where('category2', $_GET['cat'])->orderBy('rating', 'desc')->take(9)->get();
        } else {
            $data['promoData'] = Promo::orderBy('rating', 'desc')->take(9)->get();
        }
        $data['count'] = Promo::count();
//        dd($data);
        return view('promotions', compact('data'));
    }

    public function getPromotionsData(GetPromotionsRequest $request) {
        if (isset($_GET['cat'])) {
            return Promo::where('category2', $_GET['cat'])->orderBy('rating', 'desc')->skip($request->count)->take(3)->get();
        }
        return Promo::orderBy('rating', 'desc')->skip($request->count)->take(3)->get();
    }

    public function promoInner() {
//        dd('1');
        if(!$_GET || !$_GET['id']){
            abort(404);
        }
        $data = Promo::where('id', $_GET['id'])->first();

//        dd($data);
//        $data['promoData'] = Promo::orderBy('id', 'desc')->take(9)->get();
//        $data['count'] = Promo::count();
        return view('promotions-inner', compact('data'));
    }


}
