@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Leagues</div>
                    <div class="card-body">
                        <form action="{{ route('leagues.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="type"
                                       class="col-md-4 col-form-label text-md-right">Type</label>
                                <div class="col-md-6">
                                    <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                                        <option>Choose type</option>
                                        @foreach($sportTypes as $sport)
                                            <option value="{{ $sport }}">{{ $sport }}</option>
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
                                    <input type="file" name="image"
                                           accept="image/*"
                                           class="form-control-file" id="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="background_image"
                                       class="col-md-4 col-form-label text-md-right">Background Image</label>

                                <div class="col-md-6">
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
@endsection



