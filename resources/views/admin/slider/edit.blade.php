@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Slider</div>

                    <div class="card-body">
                        <form action="{{ route('slider.update', $slider->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control" name="title"
                                           value="{{$slider->title}}" required autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Input 1</label>

                                <div class="col-md-6">
                                   <textarea id="input1" type="text"
                                             class="form-control" name="input1">{{$slider->input1}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Input 2</label>

                                <div class="col-md-6">

                                   <textarea id="input2" type="text"
                                             class="form-control" name="input2">{{$slider->input2}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Input 3</label>

                                <div class="col-md-6">

                                   <textarea id="input3" type="text"
                                             class="form-control" name="input3">{{$slider->input3}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">Input 4</label>

                                <div class="col-md-6">

                                   <textarea id="input4" type="text"
                                             class="form-control" name="input4">{{$slider->input4}}</textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="picture"
                                       class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    @if ($slider->image)
                                        <img src="{{asset('uploads/slider') . '/' . $slider->image}}" class="if-image"
                                             width="200px">
                                        <span class="btn-submit if-image">წაშლა</span>
                                    @endif
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

    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn-submit").click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('sliderRemovePicture')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {id: {{$slider->id}}, image: '{{$slider->image}}'},
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
