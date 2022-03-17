<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\PollAnswer\StoreRequest;
use App\Http\Requests\Admin\PollAnswer\UpdateRequest;
use App\Models\PollAnswer;
use App\Models\PollQuestion;
use App\Services\Media\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PollAnswerController extends Controller
{

    public function index()
    {
        $poll = PollAnswer::with('pollQuestion')->latest('created_at')->paginate(10);
        return view('admin.poll-answer.index', compact('poll'));
    }

    public function create()
    {
        $questions = PollQuestion::whereActive(true)->latest('created_at')->get();

        return view('admin/poll-answer.create', compact('questions'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $attributes = $request->all();

        PollAnswer::create($attributes);

        return redirect()->route('poll-answers.index');
    }

    public function edit(PollAnswer $pollAnswer)
    {
        $questions = PollQuestion::whereActive(true)->latest('created_at')->get();

        return view('admin/poll-answer.edit', compact('pollAnswer', 'questions'));
    }

    public function update(UpdateRequest $request, PollAnswer $pollAnswer): RedirectResponse
    {
        $attributes = $request->all();

        $pollAnswer->update($attributes);

        return back();
    }

    public function destroy(PollAnswer $pollAnswer): RedirectResponse
    {
        $pollAnswer->delete();

        return redirect()->route('poll-answers.index');
    }
}
