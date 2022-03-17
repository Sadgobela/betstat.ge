<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Poll\StoreRequest;
use App\Http\Requests\Admin\Poll\UpdateRequest;
use App\Models\PollQuestion;
use App\Services\Media\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public $directory = 'uploads/poll';

    public function index()
    {
        $poll = PollQuestion::latest('created_at')->paginate(10);
        return view('admin.poll.index', compact('poll'));
    }

    public function create()
    {
        return view('admin/poll.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $attributes = $request->all();

        $attributes['image'] = (new Media($request, 'image', $this->directory))->make();

        PollQuestion::create($attributes);

        return redirect()->route('poll-questions.index');
    }

    public function edit(PollQuestion $pollQuestion)
    {
        return view('admin/poll.edit', compact('pollQuestion'));
    }

    public function update(UpdateRequest $request, PollQuestion $pollQuestion): RedirectResponse
    {
        $attributes = $request->all();

        $attributes['image'] = (new Media($request, 'image', $this->directory, $pollQuestion))->make();

        $pollQuestion->update($attributes);

        return back();
    }

    public function destroy(PollQuestion $pollQuestion): RedirectResponse
    {
        $pollQuestion->delete();

        return redirect()->route('poll-questions.index');
    }

    public function toggleActive(Request $request)
    {
        PollQuestion::whereId($request->id)->update(['active' => $request->value]);
    }
}
