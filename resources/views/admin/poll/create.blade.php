@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Poll</div>
                    <div class="card-body">
                        <form action="{{ route('poll-questions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="question"
                                       class="col-md-4 col-form-label text-md-right">Question</label>

                                <div class="col-md-6">
                                        <input id="question" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="question"
                                               value="{{ old('question') }}" required autocomplete="question">

                                        @error('question')
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



