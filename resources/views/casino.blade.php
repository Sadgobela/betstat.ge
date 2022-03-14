@extends('layouts.app')

@section('content')
    <body class="casino">
    @error('email')
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
        <main>
        <section class="casino-top d-flex-spaceBetween">
            <div class="casino-top-left">
                <h1>უმაღლესი RTP სლოტები</h1>
            </div>
            <div class="casino-top-right">

            </div>
        </section>
        <section class="casino-main">
            <div class="casino-boxes">
                @if($data['casinoData'])
                @foreach ($data['casinoData'] as $item)
                    <div class="box container">
                        <div class="box-image" style="background: url('{{asset('uploads/casino') . '/' . $item->picture}}') no-repeat;background-size: cover;"></div>
                        <div class="box-description">
                            <div class="box-description-top d-flex-spaceBetween">
                                <h3>{{$item['title']}}</h3>
                                <h4>RTP: {{$item['rtp']}}</h4>
                            </div>
                            <div class="box-description-caption d-flex-spaceCenter">
                                {{$item['category']}}
                            </div>
                            <div class="box-description-txt">
                                {{$item['text']}}
                            </div>
                            <div class="box-description-bottom d-flex-start">
                                <p class="title">თამაში შესაძლებელია:</p>
                                <a target="_blank" href="https://www.adjarabet.com/">adjarabet.com</a>
                                <a target="_blank" href="https://www.crocobet.com/">crocobet.com</a>
                                <a target="_blank" href="https://www.europebet.com/">europebet.com</a>
                                <a target="_blank" href="https://www.crystalbet.com/">crystalbet.com</a>
                                <a target="_blank" href="https://www.betlive.com/">betlive.com</a>
                                <a target="_blank" href="https://www.lider-bet.com/">leader-bet.com</a>
                            </div>

                        </div>

                    </div>
                @endforeach
                @endif
            </div>
            <a href="" class="casino-button d-flex-spaceCenter">
                მეტი
            </a>
        </section>
    </main>
    </body>
    <script>
        $(document).ready(function () {
            let boxLength;
            let casinoButton = $('.casino-button')
            let casinoBox = $('.casino-boxes')
            // let boxLength = casinoBox.children().length;


            function countBlocks() {
               boxLength = casinoBox.children().length;
               console.log(boxLength);
                if(boxLength >= {{$data['count']}}){
                    casinoButton.hide();
                }
            }
            countBlocks();
            casinoButton.on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('getCasinoData')}}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {count: boxLength},
                    success: function (data) {
                        data.forEach(x => {
                            $(".casino-boxes").append(
                                '<div class="box container">' +
                                '<div class="box-image" style="background: url(\'{{asset('uploads/casino')}}' + '/' + x['picture'] + '\') no-repeat;background-size: cover;">' +
                                '</div><div class="box-description"><div class="box-description-top d-flex-spaceBetween">' +
                                '<h3>' + x['title'] + '</h3>' +
                                '<h4>RTP: '+ x['rtp'] + '</h4></div>' +
                                '<div class="box-description-caption d-flex-spaceCenter">'+ x['category'] + '</div>' +
                                '<div class="box-description-txt">'+ x['text'] + '</div><div class="box-description-bottom d-flex-start">' +
                                '<p class="title">თამაში შესაძლებელია:</p><a target="_blank" href="https://www.adjarabet.com/">adjarabet.com</a>' +
                                '<a target="_blank" href="https://www.crocobet.com/">crocobet.com</a>' +
                            '<a target="_blank" href="https://www.europebet.com/">europebet.com</a>' +
                            '<a target="_blank" href="https://www.crystalbet.com/">crystalbet.com</a>' +
                            '<a target="_blank" href="https://www.betlive.com/">betlive.com</a>' +
                                '<a target="_blank" href="https://www.lider-bet.com/">leader-bet.com</a>' +
                                '</div></div></div>');

                        });
                        countBlocks();
                    }
                });
            });

        });
    </script>
@endsection
