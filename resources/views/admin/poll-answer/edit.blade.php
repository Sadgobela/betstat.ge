@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Poll Answer</div>

                    <div class="card-body">
                        <form action="{{ route('poll-answers.update', $pollAnswer->id) }}" method="POST"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="poll_question_id"
                                       class="col-md-4 col-form-label text-md-right">Question</label>
                                <div class="col-md-6">
                                    <select id="poll_question_id" name="poll_question_id" class="form-control @error('poll_question_id') is-invalid @enderror">
                                        <option>Choose Question</option>
                                        @foreach($questions as $question)
                                            <option {{ ($question->id == $pollAnswer->poll_question_id) ? 'selected' : '' }} value="{{ $question->id }}">{{ $question->question }}</option>
                                        @endforeach
                                    </select>
                                    @error('poll_question_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="answer"
                                       class="col-md-4 col-form-label text-md-right">Answer</label>

                                <div class="col-md-6">
                                    <input id="answer" type="text"
                                           class="form-control @error('answer') is-invalid @enderror" name="answer"
                                           value="{{$pollAnswer->answer}}" required autocomplete="answer">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-submit").click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('removePicture')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {id: {{$pollAnswer->id}}, picture: '{{$pollAnswer->image}}'},
                    success: function (data) {
                       $('.if-image').hide();
                    }
                });
            });
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        });
    </script>
@endsection
