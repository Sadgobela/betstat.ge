@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Casino</div>

                    <div class="card-body">
                        <form action="{{ route('casino.update', $casino->id) }}" method="POST"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf


                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="title"
                                           value="{{$casino->title}}"  autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rtp"
                                       class="col-md-4 col-form-label text-md-right">RTP</label>

                                <div class="col-md-6">
                                    <input id="rtp" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="rtp"
                                           value="{{$casino->rtp}}"  autocomplete="rtp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('name') is-invalid @enderror"
                                            id="category" name="category">
                                        <option value="slot"
                                                @if ($casino->category === 'slot')
                                                selected="selected"
                                            @endif>Slot</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text"
                                       class="col-md-4 col-form-label text-md-right">Text</label>

                                <div class="col-md-6">

                                    <textarea class="form-control" name="text">{{$casino->text}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture"
                                       class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    @if ($casino->picture)
                                    <img src="{{asset('uploads/casino') . '/' . $casino->picture}}" class="if-image" width="200px">
                                   <span class="btn-submit if-image" >წაშლა</span>
                                    @endif
                                        <input type="file" name="picture"
                                           accept="image/*"
                                           class="form-control-file" id="picture">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="url"
                                       class="col-md-4 col-form-label text-md-right">PLAY at Casino URLS
                                </label>

                                <div class="col-md-6">
                                    <input id="url" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="url"
                                           value="{{$casino->url}}"  autocomplete="url">
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
                    url: "{{route('casinoRemovePicture')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {id: {{$casino->id}}, picture: '{{$casino->picture}}'},
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
