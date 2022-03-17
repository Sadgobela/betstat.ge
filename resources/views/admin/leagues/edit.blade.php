@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit League</div>

                    <div class="card-body">
                        <form action="{{ route('leagues.update', $league->id) }}" method="POST"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{$league->name}}" required autocomplete="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type"
                                       class="col-md-4 col-form-label text-md-right">Types</label>
                                <div class="col-md-6">
                                    <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                                        <option>Choose Types</option>
                                        @foreach($sportTypes as $sport)
                                            <option {{ ($sport == $league->type) ? 'selected' : '' }} value="{{ $sport }}">{{ $sport }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    @if ($league->image)
                                        <img src="{{asset('uploads/leagues') . '/' . $league->image}}" class="if-image" width="200px">
                                    @endif
                                    <input type="file" name="image"
                                       accept="image/*"
                                       class="form-control-file" id="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="background_image"
                                       class="col-md-4 col-form-label text-md-right">Background Image</label>

                                <div class="col-md-6">
                                    @if ($league->background_image)
                                        <img src="{{asset('uploads/leagues') . '/' . $league->background_image}}" class="if-image" width="200px">
                                    @endif
                                    <input type="file" name="background_image"
                                       accept="image/*"
                                       class="form-control-file" id="background_image">
                                </div>
                            </div>

                            @include('admin.ordering')

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
                    data: {id: {{$league->id}}, picture: '{{$league->image}}'},
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
