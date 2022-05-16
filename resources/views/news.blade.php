@extends('layouts.app')

@section('content')
    <body class="news">
        <section class="betStat-header-news">
            <div class="betStat-header-news-inner container">
                @if(isset($data['newsData1']))
                @foreach($data['newsData1'] as $news)
                <a href="{{ route('newsInner', ['id' => $news['id']]) }}" class="betStat-header-news-leftSide" style="background: url('{{asset('uploads/news') . '/' . $news['picture']}}') no-repeat center">
                    <div class="betStat-header-news-leftSide-img">
                        <div class="news-top d-flex-spaceBetween">
                            <div class="news-caption d-flex-spaceCenter">{{$news['category']}}</div>
                            <div class="news-caption-dateText">{{date('d.m.y', strtotime($news['created_at']))}}</div>
                        </div>
                        <div class="news-bottom d-flex-spaceCenter">
                            {{$news['title']}}
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
                <div class="betStat-header-news-rightSide  desktop-large-version">
                    @if(isset($data['newsData2']))
                    @foreach($data['newsData2'] as $news)
                        <a href="{{ route('newsInner', ['id' => $news['id']]) }}" class="box" style="background: url('{{asset('uploads/news') . '/' . $news['picture']}}') no-repeat center">
                            <div class="betStat-header-news-rightSide-img">
                                <div class="news-top d-flex-spaceBetween">
                                    <div class="news-caption d-flex-spaceCenter">{{$news['category']}}</div>
                                    <div class="news-caption-dateText">{{date('d.m.y', strtotime($news['created_at']))}}</div>
                                </div>
                                <div class="news-bottom">
                                    {{$news['title']}}
                                </div>
                            </div>
                        </a>
                    @endforeach
                        @endif
                </div>
                <div class="betStat-header-news-rightSide desktop-laptop-version">
                    @if(isset($data['newsData4']))
                        @foreach($data['newsData4'] as $news)
                            <a href="{{ route('newsInner', ['id' => $news['id']]) }}" class="box" style="background: url('{{asset('uploads/news') . '/' . $news['picture']}}') no-repeat center">
                                <div class="betStat-header-news-rightSide-img">
                                    <div class="news-top d-flex-spaceBetween">
                                        <div class="news-caption d-flex-spaceCenter">{{$news['category']}}</div>
                                        <div class="news-caption-dateText">{{date('d.m.y', strtotime($news['created_at']))}}</div>
                                    </div>
                                    <div class="news-bottom">
                                        {{$news['title']}}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <main class="">
            <section class="container main-news-top d-flex-end">
                <div class="main-news-top-right">
                    <label for="category">კატეგორია :</label>
                    <select name="category" id="category">
                        <option value=""  @if(isset($_GET['cat']) &&  $_GET['cat'] == '') selected @endif>ყველა</option>
                        <option value="ფეხბურთი" @if(isset($_GET['cat']) &&  $_GET['cat'] == 'ფეხბურთი') selected @endif>ფეხბურთი</option>
                        <option value="კალათბურთი"  @if(isset($_GET['cat']) &&  $_GET['cat'] == 'კალათბურთი') selected @endif>კალათბურთი</option>
                        <option value="ჩოგბურთი"  @if(isset($_GET['cat']) &&  $_GET['cat'] == 'ჩოგბურთი') selected @endif>ჩოგბურთი</option>
                        <option value="ზოგადი"  @if(isset($_GET['cat']) &&  $_GET['cat'] == 'ზოგადი') selected @endif>ზოგადი</option>
                    </select>
                </div>
            </section>
            <section class="news-categories-boxes d-flex-spaceBetween">
                @if(isset($data['newsData3']))
                @foreach($data['newsData3'] as $news)
                    <a href="{{ route('newsInner', ['id' => $news['id']]) }}" class="box" style="background: url('{{asset('uploads/news') . '/' . $news['picture']}}') no-repeat center">
                        <div class="box-img">
                            <div class="news-top d-flex-spaceBetween">
                                <div class="news-caption d-flex-spaceCenter">{{$news['category']}}</div>
                                <div class="news-caption-dateText">{{date('d.m.y', strtotime($news['created_at']))}}</div>
                            </div>
                            <div class="news-bottom d-flex-spaceCenter">
                                {{$news['title']}}
                            </div>
                        </div>
                    </a>
                @endforeach
                    @endif
            </section>
            <a href="#" class="news-btn d-flex-spaceCenter">
                მეტი
            </a>
        </main>
    </body>
    <script>
        $(document).ready(function () {
            $('select').each(function () {

                // Cache the number of options
                var $this = $(this),
                    numberOfOptions = $(this).children('option').length;

                // Hides the select element
                $this.addClass('s-hidden');

                // Wrap the select element in a div
                $this.wrap('<div class="select"></div>');

                // Insert a styled div to sit over the top of the hidden select element
                $this.after('<div class="styledSelect"></div>');

                // Cache the styled div
                var $styledSelect = $this.next('div.styledSelect');

                let selectedValue = new URLSearchParams(window.location.search).get('cat')

                console.log(selectedValue,'minichebamde')
                if(selectedValue === ''){
                    selectedValue = 'ყველა';
                }
                console.log(selectedValue,'minichebis mere')
                $styledSelect.text(selectedValue)[0].innerHTML;
                // $styledSelect.text($this.children('option').eq(0).text());
                // Insert an unordered list after the styled div and also cache the list
                var $list = $('<ul />', {
                    'class': 'options'
                }).insertAfter($styledSelect);

                // Insert a list item into the unordered list for each select option
                for (var i = 0; i < numberOfOptions; i++) {
                    $('<li />', {
                        text: $this.children('option').eq(i).text(),
                        rel: $this.children('option').eq(i).val()
                    }).appendTo($list);
                }

                // Cache the list items
                var $listItems = $list.children('li');
                // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
                $styledSelect.click(function (e) {
                    e.stopPropagation();
                    $(this).toggleClass('active').next('ul.options').toggleClass('active');
                    // $('div.styledSelect.active').each(function () {
                    //     $(this).removeClass('active').next('ul.options').removeClass('active');
                    // });
                });

                // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
                // Updates the select element to have the value of the equivalent option
                $listItems.click(function (e) {
                    e.stopPropagation();
                    $styledSelect.text($(this).text()).removeClass('active');
                    $this.val($(this).attr('rel'));
                    $list.removeClass('active');
                    $styledSelect.removeClass('active');
                    /* alert($this.val()); Uncomment this for demonstration! */
                });

                // Hides the unordered list when clicking outside of it
                $(document).click(function () {
                    $styledSelect.removeClass('active');
                    $list.removeClass('active');
                });

            });
            let boxLength;
            let newsButton = $('.news-btn')
            let newsBox = $('.news-categories-boxes')

            function countBlocks() {
                boxLength = newsBox.children().length;
                console.log(boxLength);
                console.log({{$data['count']}});
                if(boxLength >= {{$data['count']}}){
                    newsButton.hide();
                }
            }
            countBlocks();
            newsButton.on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('getNewsData')}}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {count: boxLength},
                    success: function (data) {
                        data.forEach(x => {
                            newsBox.append(
                                '<a href="/news/news-inner?id=' + x['id'] + '"' + 'class="box" style="background: url(\'{{asset('uploads/news')}}' + '/' + x['picture'] + '\') no-repeat center">' +
                                    '<div class="box-img">' +
                                        '<div class="news-top d-flex-spaceBetween">' +
                                '<div class="news-caption d-flex-spaceCenter">' + x['category'] + '</div>' +
                                '<div class="news-caption-dateText">@if(isset($news)){{date('d.m.y', strtotime($news['created_at']))}}@endif</div>' +
                                '</div>' +
                                '<div class="news-bottom d-flex-spaceCenter">' +
                                  x['title'] +
                            '</div>' +
                                '</div>' +
                                '</a>'
                            );
                        });
                        countBlocks();
                    }
                });
            });
            $('.options li').on('click', function (){
                window.location.replace('news?cat=' + $(this).attr('rel'));
            });


        });
    </script>
@endsection
