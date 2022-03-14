@extends('admin/layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit P2P</div>

                    <div class="card-body">
                        <form action="{{ route('p2p.update', $p2p->id) }}" method="POST"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input id="cat" type="text"
                                   class="form-control @error('domain') is-invalid @enderror" name="cat"
                                   value="{{$p2p->cat}}" autocomplete="title">


                            <div class="form-group row">
                                <label for="casino"
                                       class="col-md-4 col-form-label text-md-right">Casino Name</label>

                                <div class="col-md-6">
                                    <input id="casino" type="text"
                                           disabled="disabled"
                                           class="form-control @error('domain') is-invalid @enderror" name="casino"
                                           value="{{$p2p->casino}}" autocomplete="title">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right">User Name</label>

                                <div class="col-md-6">
                                    <input id="userName" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="userName"
                                           value="{{$p2p->userName}}" autocomplete="userName">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount"
                                       class="col-md-4 col-form-label text-md-right">Winning amount</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="amount"
                                           value="{{$p2p->amount}}" autocomplete="video">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="coefficient"
                                       class="col-md-4 col-form-label text-md-right">Winning Coefficient</label>

                                <div class="col-md-6">
                                    <input id="coefficient" type="text"
                                           class="form-control @error('domain') is-invalid @enderror" name="coefficient"
                                           value="{{$p2p->coefficient}}" autocomplete="coefficient">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date"
                                       class="col-md-4 col-form-label text-md-right">Starting Date</label>

                                <div class="col-md-6">
                                    <input id="date" type="datetime-local"
                                           class="form-control @error('domain') is-invalid @enderror" name="date"
                                           value="{{date('Y-m-d\TH:i:s', strtotime($p2p->date))}}" autocomplete="date">
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

<script>
    // $(function(){
    //     var dtToday = new Date();
    //
    //     var month = dtToday.getMonth() + 1;
    //     var day = dtToday.getDate();
    //     var year = dtToday.getFullYear();
    //
    //     if(month < 10)
    //         month = '0' + month.toString();
    //     if(day < 10)
    //         day = '0' + day.toString();
    //
    //     var maxDate = year + '-' + month + '-' + day;
    //     $('#date').attr('max', maxDate);
    // });
</script>
