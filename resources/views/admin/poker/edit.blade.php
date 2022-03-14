@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Poker Tournament</div>

                    <div class="card-body">
                        <form action="{{ route('poker.update', $poker->id) }}" method="POST"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf


                            <div class="form-group row">
                                <label for="casino"
                                       class="col-md-4 col-form-label text-md-right">Casino Name</label>

                                <div class="col-md-6">
                                    <input id="casino" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="casino"
                                           value="{{$poker->casino}}" autocomplete="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture"
                                       class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    @if ($poker->picture)
                                        <img src="{{asset('uploads/poker') . '/' . $poker->picture}}" class="if-image" width="200px">
                                        <span class="btn-submit if-image" >წაშლა</span>
                                    @endif
                                    <input type="file" name="picture"
                                           accept="image/*"
                                           class="form-control-file" id="picture">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date"
                                       class="col-md-4 col-form-label text-md-right">Starting Date</label>

                                <div class="col-md-6">
                                    <input id="date" type="datetime-local"
                                           class="form-control @error('domain') is-invalid @enderror" name="date"
                                           value="{{date('Y-m-d\TH:i:s', strtotime($poker->date))}}" autocomplete="date">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="tournament"
                                       class="col-md-4 col-form-label text-md-right">Tournament Name</label>

                                <div class="col-md-6">
                                    <input id="tournament" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="tournament"
                                           value="{{$poker->tournament}}" autocomplete="video">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount"
                                       class="col-md-4 col-form-label text-md-right">Buy-in Amount</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="amount"
                                           value="{{$poker->amount}}" autocomplete="video">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prize"
                                       class="col-md-4 col-form-label text-md-right">Prize Pool</label>

                                <div class="col-md-6">
                                    <input id="prize" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="prize"
                                           value="{{$poker->prize}}" autocomplete="prize">
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
                    url: "{{route('removePokerPicture')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {id: {{$poker->id}}, picture: '{{$poker->picture}}'},
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
