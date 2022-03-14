@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Promo</div>

                    <div class="card-body">
                        <form action="{{ route('promo.update', $promo->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf


                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="title"
                                           value="{{$promo->title}}" autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category1" class="col-md-4 col-form-label text-md-right">Bet company</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('name') is-invalid @enderror"
                                            id="category1" name="category1">
                                        <option value="adjarasport"
                                                @if ($promo->category1 == 'adjarasport') selected="selected" @endif>
                                            adjarasport
                                        </option>
                                        <option value="crystalsport"
                                                @if ($promo->category1 == 'crystalsport') selected="selected" @endif>
                                            crystalsport
                                        </option>
                                        <option value="crocosport"
                                                @if ($promo->category1 == 'crocosport') selected="selected" @endif>
                                            crocosport
                                        </option>
                                        <option value="leadersport"
                                                @if ($promo->category1 == 'leadersport') selected="selected" @endif>
                                            leadersport
                                        </option>
                                        <option value="europesport"
                                                @if ($promo->category1 == 'europesport') selected="selected" @endif>
                                            europesport
                                        </option>
                                        <option value="livesport"
                                                @if ($promo->category1 == 'livesport') selected="selected" @endif>
                                            livesport
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category2" class="col-md-4 col-form-label text-md-right">Categoy</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('name') is-invalid @enderror"
                                            id="category2" name="category2">
                                        <option value="სპორტი"
                                                @if ($promo->category2 == 'სპორტი') selected="selected" @endif>სპორტი
                                        </option>
                                        <option value="სლოტები"
                                                @if ($promo->category2 == 'სლოტები') selected="selected" @endif>სლოტები
                                        </option>
                                        <option value="კაზინო"
                                                @if ($promo->category2 == 'კაზინო') selected="selected" @endif>კაზინო
                                        </option>
                                        <option value="სამაგიდო თამაშები" @if ($promo->category1 == 'სამაგიდო თამაშები') selected="selected" @endif>
                                            სამაგიდო თამაშები
                                        </option>
                                        <option value="პოკერი"
                                                @if ($promo->category2 == 'პოკერი') selected="selected" @endif>პოკერი
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="casinoName"
                                       class="col-md-4 col-form-label text-md-right">Casino Name</label>

                                <div class="col-md-6">
                                    <input id="casinoName" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="casinoName"
                                           value="{{$promo->casinoName}}"  autocomplete="casinoName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rating"
                                       class="col-md-4 col-form-label text-md-right">Rating</label>

                                <div class="col-md-6">
                                    <input id="rating" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="rating"
                                           value="{{$promo->rating}}"  autocomplete="rating">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text"
                                       class="col-md-4 col-form-label text-md-right">Text</label>

                                <div class="col-md-12">

                                    <textarea class="ckeditor form-control" name="text">{{$promo->text}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logo"
                                       class="col-md-4 col-form-label text-md-right">Logo</label>

                                <div class="col-md-6">
                                    @if ($promo->logo)
                                        <img src="{{asset('uploads/promo/logos') . '/' . $promo->logo}}"
                                             class="if-image" height="50px">
                                        <span class="btn-submit if-image delete-logo">წაშლა</span>
                                    @endif
                                    <input type="file" name="logo"
                                           accept="image/*"
                                           class="form-control-file" id="logo">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    @if ($promo->image)
                                        <img src="{{asset('uploads/promo/images') . '/' . $promo->image}}"
                                             class="if-image" width="200px">
                                        <span class="btn-submit if-image delete-image">წაშლა</span>
                                    @endif
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
                                           value="{{$promo->video}}"  autocomplete="video">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="button"
                                       class="col-md-4 col-form-label text-md-right">Button URL</label>

                                <div class="col-md-6">
                                    <input id="button" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="button"
                                           value="{{$promo->button}}"  autocomplete="button">
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
        $(document).ready(function () {
            $(".delete-logo").click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('promoRemoveLogo')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {id: {{$promo->id}}, logo: '{{$promo->logo}}'},
                    success: function (data) {
                        $('.delete-logo').hide();
                    }
                });
            });
            $(".delete-image").click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('promoRemoveImage')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {id: {{$promo->id}}, image: '{{$promo->image}}'},
                    success: function (data) {
                        $('.delete-image').hide();
                    }
                });
            });
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        });
    </script>
@endsection
