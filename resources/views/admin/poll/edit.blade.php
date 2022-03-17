@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Poll Question</div>

                    <div class="card-body">
                        <form action="{{ route('poll-questions.update', $pollQuestion->id) }}" method="POST"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="question"
                                       class="col-md-4 col-form-label text-md-right">Question</label>

                                <div class="col-md-6">
                                    <input id="question" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="question"
                                           value="{{$pollQuestion->question}}" required autocomplete="question">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    @if ($pollQuestion->image)
                                        <img src="{{asset('uploads/poll') . '/' . $pollQuestion->image}}" class="if-image" width="200px">
                                    @endif
                                    <input type="file" name="image"
                                       accept="image/*"
                                       class="form-control-file" id="image">
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
                    data: {id: {{$pollQuestion->id}}, picture: '{{$pollQuestion->image}}'},
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
