<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetNewsRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\News;
use App\Models\User;
use App\Notifications\TenantInviteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsData = News::orderBy('id', 'desc')->paginate(10);
        return view('admin.news.index', compact('newsData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
//        dd($request->all());
        $pictureName = null;
        if($request->file('picture')) {
        $pictureName = $request->file('picture')->getClientOriginalName() .
            '-' . time() . '.' .
            $request->picture->extension();
        $request->picture->move(public_path('uploads/news'), $pictureName);
        }
        $news = News::create([
            'category' => $request->input('category'),
            'title' => $request->input('title'),
            'video' => $request->input('video'),
            'text' => $request->input('text'),
            'picture' => $pictureName,
        ]);

        return redirect()->route('news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin/news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {

        $oldPic = News::find($news->id)->picture;
        if ($request->file('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/news'), $pictureName);

            File::delete(public_path('uploads/news/' . $oldPic));
        } else  {
            $pictureName = $oldPic;
        }
        $news->update([
            'category' => $request->input('category'),
            'title' => $request->input('title'),
            'video' => $request->input('video'),
            'text' => $request->input('text'),
            'picture' => $pictureName,
        ]);
        return redirect()->route('news.index');
    }

    public function removePicture(UpdateNewsRequest $request)
    {
        News::where('id', $request->id)->update(array('picture' => ''));

        File::delete(public_path('uploads/news/' . $request->picture));
    }

    public function makeSlider(UpdateNewsRequest $request)
    {
        News::where('id', $request->id)->update(array('slider' => $request->value));
    }

    public function makeMain(UpdateNewsRequest $request)
    {
        News::where('id', $request->id)->update(array('main' => $request->value));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
//        dd($news);
        $news->delete();

        return redirect()->route('news.index');
    }


    public function web() {

        $data['newsData1'] = News::orderBy('id', 'desc')->where('main', 1)->take(1)->get();
        $data['newsData2'] = News::orderBy('id', 'desc')->where('main', 1)->skip(1)->take(4)->get();
//        $data['newsData3'] = News::orderBy('id', 'desc')->orWhereNull('main')->take(9)->get();
        if ($_GET && $_GET['cat']) {
//            dd($_GET['cat']);
            $data['newsData3'] = News::where('category', $_GET['cat'])->whereNull('main')->orderBy('id', 'desc')->take(9)->get();
//            dd($data['newsData3']);
        } else {
            $data['newsData3'] = News::orderBy('id', 'desc')->orWhereNull('main')->take(9)->get();
        }
        $data['count'] = News::orderBy('id', 'desc')->orWhereNull('main')->count();
        return view('news', compact('data'));
    }

    public function getNewsData(GetNewsRequest $request) {
        if (isset($_GET['cat'])) {
        return News::where('category', $_GET['cat'])->orderBy('id', 'desc')->orderBy('id', 'desc')->orWhereNull('main')->skip($request->count)->take(3)->get();
        }
        return News::orderBy('id', 'desc')->orWhereNull('main')->skip($request->count)->take(3)->get();
    }

    public function newsInner() {
//        dd('1');
        if(!$_GET || !$_GET['id']){
            abort(404);
        }
        $data = News::where('id', $_GET['id'])->first();

//        dd($data);
//        $data['promoData'] = Promo::orderBy('id', 'desc')->take(9)->get();
//        $data['count'] = Promo::count();
        return view('news-inner', compact('data'));
    }

}
