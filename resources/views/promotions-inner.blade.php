@extends('layouts.app')
@section('meta-tag')
    <meta property="og:title" content="{{$data['title']}}">
    <meta property="og:site_name" content="betstat.ge">
    <meta property="og:image" content="{{asset('uploads/promo/images') . '/' . $data['image']}}">
{{--    <meta property="og:description" content="{{substr(strip_tags(str_replace("&nbsp;", " ", $data['text'])), 0, 200)}}">--}}
@endsection

@section('content')
    <body class="promotions-inner">
    <main>
        <section class="promotions-inner-page">
            <div class="container">
                <div class="promotions-inner-page-header-left"></div>
                <div class="promotions-inner-page-header" style="background: url('{{asset('uploads/promo/images') . '/' . $data['image']}}') no-repeat center;background-size: cover">
                    <div class="promotions-inner-page-header-logo" style="background: url('{{asset('uploads/promo/logos') . '/' . $data['logo']}}') no-repeat center;background-size: cover">

                    </div>
                    <div class="promotions-inner-page-header-rating">
                        {{$data['rating']}}
                    </div>
                </div>
                <div class="promotions-inner-page-header-right"></div>
            </div>
            <div class="promotions-inner-page-content">
                <h1>{{$data['title']}}</h1>
                <div class="promotions-inner-page-content-headline d-flex-spaceBetween">
                    <div class="leftSide d-flex-spaceCenter">
                        <div class="slot d-flex-spaceCenter">{{$data['category2']}}</div>
                        <div class="date">თარიღი: <span>{{date('d.m.Y', strtotime($data['created_at']))}}</span></div>
                        <div class="companyName">{{$data['category1']}}</div>
                    </div>
                    <div class="rightSide d-flex-spaceCenter">
                        <div class="share">SHARE:</div>
                        <a class="fb share-btn" href="https://www.facebook.com/sharer/sharer.php?app_id=408214494299789&sdk=joey&u={{ route('promoInner', ['id' => $data['id']]) }}&display=popup&ref=plugin&src=share_button"
                           onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')"></a>
                        <a class="twitter" target="_blank" href="https://twitter.com/share?text={{$data['title']}}&url={{ route('promoInner', ['id' => $data['id']]) }}"></a>
                    </div>
                </div>
                <div class="promotions-inner-page-content-description">
                    {!! $data['text'] !!}
                </div>
                <a href="{{$data['button']}}" target="_blank" class="promotions-inner-page-content-btn d-flex-spaceCenter">
                    გაიგე მეტი
                </a>
            </div>
        </section>
    </main>
    </body>
@endsection
