@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Poker Tounament</div>

                    <div class="card-body">
                        <form action="{{ route('poker.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="casino"
                                       class="col-md-4 col-form-label text-md-right">Casino Name</label>

                                <div class="col-md-6">
                                    <input id="casino" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="casino"
                                           value="{{ old('domain') }}" autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date"
                                       class="col-md-4 col-form-label text-md-right">Starting Date</label>

                                <div class="col-md-6">
                                    <input id="date" type="datetime-local"
                                           class="form-control @error('domain') is-invalid @enderror" name="date"
                                           value="{{ old('domain') }}" autocomplete="date">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="tournament"
                                       class="col-md-4 col-form-label text-md-right">Tournament Name</label>

                                <div class="col-md-6">
                                    <input id="tournament" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="tournament"
                                           value="{{ old('tournament') }}" autocomplete="video">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount"
                                       class="col-md-4 col-form-label text-md-right">Buy-in Amount</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="amount"
                                           value="{{ old('amount') }}" autocomplete="video">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prize"
                                       class="col-md-4 col-form-label text-md-right">Prize Pool</label>

                                <div class="col-md-6">
                                    <input id="prize" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="prize"
                                           value="{{ old('prize') }}" autocomplete="prize">
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



