@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit News</div>

                    <div class="card-body">
                        <form action="{{ route('news.update', $news->id) }}" method="POST"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('name') is-invalid @enderror"
                                            id="category" name="category">
                                        <option value="ფეხბურთი"
                                                @if ($news->category === 'ფეხბურთი')
                                                selected="selected"
                                            @endif>ფეხბურთი</option>
                                        <option value="კალათბურთი"
                                                @if ($news->category === 'კალათბურთი')
                                                selected="selected"
                                            @endif>კალათბურთი</option>
                                        <option value="ჩოგბურთი"
                                                @if ($news->category === 'ჩოგბურთი')
                                                selected="selected"
                                            @endif>ჩოგბურთი</option>
                                        <option value="ზოგადი"
                                                @if ($news->category === 'ზოგადი')
                                                selected="selected"
                                            @endif>ზოგადი</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="title"
                                           value="{{$news->title}}" required autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="video"
                                       class="col-md-4 col-form-label text-md-right">Video URL</label>

                                <div class="col-md-6">
                                    <input id="video" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="video"
                                           value="{{$news->video}}" autocomplete="video">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture"
                                       class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    @if ($news->picture)
                                    <img src="{{asset('uploads/news') . '/' . $news->picture}}" class="if-image" width="200px">
                                   <span class="btn-submit if-image" >წაშლა</span>
                                    @endif
                                        <input type="file" name="picture"
                                           accept="image/*"
                                           class="form-control-file" id="picture">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea class="ckeditor form-control"
                                              required name="text">
                                        {{$news->text}}
                                    </textarea>
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
                    data: {id: {{$news->id}}, picture: '{{$news->picture}}'},
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
