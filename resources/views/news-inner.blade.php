@extends('layouts.app')
@section('meta-tag')
    <meta property="og:title" content="{{$data['title']}}">
    <meta property="og:site_name" content="betstat.ge">
    <meta property="og:image" content="{{asset('uploads/news') . '/' . $data['picture']}}">
    <link rel="canonical" href="{{ route('newsInner', ['id' => $data['id']]) }}">
    <meta name="twitter:image:src" content="{{asset('uploads/news') . '/' . $data['picture']}}">
    <meta name="twitter:site" content="THIS IS CONTENT">
    <meta name="twitter:card" content="photo" />
    <meta name="twitter:title" content="TWITTER CONTENT">
@endsection

@section('content')
    <body class="promotions-inner news-inner news">
    <main>
        <section class="promotions-inner-page">
            <div class="promotions-inner-page-content">
                <div class="news-header-img" style="background: url('{{asset('uploads/news') . '/' . $data['picture']}}') no-repeat center;background-size: cover"></div>
                <h1>{{$data['title']}}</h1>
                <div class="promotions-inner-page-content-headline d-flex-spaceBetween">
                    <div class="leftSide d-flex-spaceCenter">
                        <div class="slot d-flex-spaceCenter">{{$data['category']}}</div>
                        <div class="date">თარიღი: <span>{{date('d.m.y', strtotime($data['created_at']))}}</span></div>
                    </div>
                    <div class="rightSide d-flex-spaceCenter">
                        <div class="share">SHARE:</div>
                        <a class="fb share-btn" href="https://www.facebook.com/sharer/sharer.php?app_id=408214494299789&sdk=joey&u={{ route('newsInner', ['id' => $data['id']]) }}&display=popup&ref=plugin&src=share_button"
                           onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')"></a>
{{--                        <a class="twitter" target="_blank" href="https://twitter.com/share?hashtags=Football,News&text={{$data['title']}}&via=Betstat.ge&url={{ route('newsInner', ['id' => $data['id']]) }}"></a>--}}
                        <a class="twitter" target="_blank" href="https://twitter.com/share?text={{$data['title']}}&url={{ route('newsInner', ['id' => $data['id']]) }}"></a>
                    </div>
                </div>
                <div class="promotions-inner-page-content-description">
                    {!! $data['text'] !!}
                </div>
            </div>
        </section>
    </main>
    </body>
@endsection
