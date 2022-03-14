@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Banner</div>

                    <div class="card-body">
                        <form action="{{ route('banners.update', $banner->id) }}" method="POST"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="url"
                                       class="col-md-4 col-form-label text-md-right">URL
                                </label>

                                <div class="col-md-6">
                                    <input id="url" type="text"
                                           class="form-control" name="url"
                                           value="{{$banner->url}}"  autocomplete="url">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="picture"
                                       class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    @if ($banner->picture)
                                    <img src="{{asset('uploads/banners') . '/' . $banner->picture}}" class="if-image" width="200px">
                                   <span class="btn-submit if-image" >წაშლა</span>
                                    @endif
                                        <input type="file" name="picture"
                                           accept="image/*"
                                           class="form-control-file" id="picture">
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
                    url: "{{route('bannersRemovePicture')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {id: {{$banner->id}}, picture: '{{$banner->picture}}'},
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
