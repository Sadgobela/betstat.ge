@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add News</div>

                    <div class="card-body">
                        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('name') is-invalid @enderror"
                                            id="category" name="category">
                                        <option value="ფეხბურთი">ფეხბურთი</option>
                                        <option value="კალათბურთი">კალათბურთი</option>
                                        <option value="ჩოგბურთი">ჩოგბურთი</option>
                                        <option value="ზოგადი">ზოგადი</option>
                                    </select>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                        <input id="title" type="text"
                                               class="form-control @error('domain') is-invalid @enderror" name="title"
                                               value="{{ old('domain') }}" required autocomplete="title">

                                        @error('domain')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="video"
                                       class="col-md-4 col-form-label text-md-right">Video URL</label>

                                <div class="col-md-6">
                                        <input id="video" type="text"
                                               class="form-control @error('domain') is-invalid @enderror" name="video"
                                               value="{{ old('video') }}"  autocomplete="video">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture"
                                       class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    <input type="file" name="picture"
                                           accept="image/*"
                                           class="form-control-file" id="picture">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea class="ckeditor form-control"required name="text"></textarea>


                                    @error('domain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
@endsection



