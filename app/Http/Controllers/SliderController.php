<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetNewsRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\News;
use App\Models\Slider;
use App\Models\User;
use App\Notifications\TenantInviteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderData = Slider::orderBy('id', 'desc')->paginate(10);
        return view('admin.slider.index', compact('sliderData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/slider.create');
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
        $imageName = null;
        if($request->file('image')) {
            $imageName = $request->file('image')->getClientOriginalName() .
                '-' . time() . '.' .
                $request->image->extension();
            $request->image->move(public_path('uploads/slider'), $imageName);
        }
        $slider = Slider::create([
            'title' => $request->input('title'),
            'input1' => $request->input('input1'),
            'input2' => $request->input('input2'),
            'input3' => $request->input('input3'),
            'input4' => $request->input('input4'),
            'image' => $imageName,
        ]);

        return redirect()->route('slider.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin/slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, Slider $slider)
    {
      $oldPic = Slider::find($slider->id)->image;
        if ($request->file('image')) {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/slider'), $imageName);

            File::delete(public_path('uploads/slider/' . $oldPic));
        } else  {
            $imageName = $oldPic;
        }
        $slider->update([
            'title' => $request->input('title'),
            'input1' => $request->input('input1'),
            'input2' => $request->input('input2'),
            'input3' => $request->input('input3'),
            'input4' => $request->input('input4'),
            'image' => $imageName,
        ]);
        return redirect()->route('slider.index');
    }

    public function sliderRemovePicture(UpdateNewsRequest $request)
    {
        Slider::where('id', $request->id)->update(array('image' => ''));

        File::delete(public_path('uploads/slider/' . $request->image));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('slider.index');
    }


    public function web() {
        $data = Slider::orderBy('id', 'desc')->get();
        return view('slider', compact('data'));
    }


}
