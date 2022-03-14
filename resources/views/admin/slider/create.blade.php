@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Slider</div>

                    <div class="card-body">
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control" name="title"
                                           value="" required autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">input1</label>

                                <div class="col-md-6">

                                    <textarea id="input1" type="text"
                                              class="form-control" name="input1">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">input2</label>

                                <div class="col-md-6">
                                    <textarea id="input2" type="text"
                                              class="form-control" name="input2">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">input3</label>

                                <div class="col-md-6">

                                    <textarea id="input3" type="text"
                                              class="form-control" name="input3">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">input4</label>

                                <div class="col-md-6">

                                    <textarea id="input4" type="text"
                                              class="form-control" name="input4">
                                    </textarea>
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



