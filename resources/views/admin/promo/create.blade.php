@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Promo</div>

                    <div class="card-body">
                        <form action="{{ route('promo.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="title"
                                           value="{{ old('domain') }}" required autocomplete="title">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="category1" class="col-md-4 col-form-label text-md-right">Bet company</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('name') is-invalid @enderror"
                                            id="category1" name="category1">
                                        <option value="adjarasport">adjarasport</option>
                                        <option value="crystalsport">crystalsport</option>
                                        <option value="crocosport">crocosport</option>
                                        <option value="leadersport">leadersport</option>
                                        <option value="europesport">europesport</option>
                                        <option value="livesport">livesport</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category2" class="col-md-4 col-form-label text-md-right">Categoy</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('name') is-invalid @enderror"
                                            id="category2" name="category2">
                                        <option value="სპორტი">სპორტი</option>
                                        <option value="სლოტები">სლოტები</option>
                                        <option value="კაზინო">კაზინო</option>
                                        <option value="სამაგიდო თამაშები">სამაგიდო თამაშები</option>
                                        <option value="პოკერი">პოკერი</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="casinoName"
                                       class="col-md-4 col-form-label text-md-right">Casino Name</label>

                                <div class="col-md-6">
                                    <input id="casinoName" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="casinoName"
                                           value="{{ old('domain') }}"  autocomplete="casinoName">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rating"
                                       class="col-md-4 col-form-label text-md-right">Rating</label>

                                <div class="col-md-6">
                                    <input id="rating" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="rating"
                                           value="{{ old('domain') }}"  autocomplete="rating">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="text"
                                       class="col-md-4 col-form-label text-md-right">Text</label>
                                <div class="col-md-12">
                                    <textarea id="text" class="ckeditor form-control" required name="text"></textarea>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="logo"
                                       class="col-md-4 col-form-label text-md-right">Logo</label>

                                <div class="col-md-6">
                                    <input type="file" name="logo"
                                           accept="image/*"
                                           class="form-control-file" id="logo">
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
                                <label for="video"
                                       class="col-md-4 col-form-label text-md-right">Video URL</label>

                                <div class="col-md-6">
                                    <input id="video" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="video"
                                           value="{{ old('url') }}"  autocomplete="video">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="button"
                                       class="col-md-4 col-form-label text-md-right">Button URL</label>

                                <div class="col-md-6">
                                    <input id="button" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="button"
                                           value="{{ old('url') }}"  autocomplete="button">
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



