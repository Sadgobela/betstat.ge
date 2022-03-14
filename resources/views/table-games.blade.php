@extends('layouts.app')

@section('content')
    <body class="table-games">
    <main>
        <div class="table-games-top">
            <div class="table-games-top-header">
                <div class="table-games-top-header-left"></div>
                <div class="table-games-top-header-right"></div>
                <h1> სპინ თამაშების <span>ტოპ 5</span> გათამაშება</h1>

                <div id="bura-content" class="table-games-boxes bura d-flex-spaceBetween current">
                    @if(isset($data['games']))
                    @foreach($data['games'] as $games)
                    <div class="box">
                        <div class="box-header"></div>
                        <div class="box-content">
                            @foreach($games['bura'] as $key => $bura)
                            <div class="item d-flex-spaceBetween">
                                <p class="place">{{$key + 1}}</p>
                                <p class="user">{{$bura['userName']}}</p>
                                <p class="prize">{{$bura['amount']}} <span class="prizeX">{{$bura['coefficient']}}</span></p>
                                <p class="date">{{date('d.m', strtotime($bura->date))}} <span>{{date('H:i', strtotime($bura->date))}}</span></p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div id="backgammon-content" class="table-games-boxes backgammon d-flex-spaceBetween">
                    @if(isset($data['games']))
                    @foreach($data['games'] as $games)
                    <div class="box">
                        <div class="box-header"></div>
                        <div class="box-content">
                            @foreach($games['backgammon'] as $key => $backgammon)
                                <div class="item d-flex-spaceBetween">
                                    <p class="place">{{$key + 1}}</p>
                                    <p class="user">{{$backgammon['userName']}}</p>
                                    <p class="prize">{{$backgammon['amount']}} <span class="prizeX">{{$backgammon['coefficient']}}</span></p>
                                    <p class="date">{{date('d.m', strtotime($backgammon->date))}} <span>{{date('H:i', strtotime($backgammon->date))}}</span></p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                        @endif
                </div>
                <div id="dominoes-content" class="table-games-boxes dominoes d-flex-spaceBetween">
                    @if(isset($data['games']))
                    @foreach($data['games'] as $games)
                    <div class="box">
                        <div class="box-header"></div>
                        <div class="box-content">
                            @foreach($games['domino'] as $key => $domino)
                                <div class="item d-flex-spaceBetween">
                                    <p class="place">{{$key + 1}}</p>
                                    <p class="user">{{$domino['userName']}}</p>
                                    <p class="prize">{{$domino['amount']}} <span class="prizeX">{{$domino['coefficient']}}</span></p>
                                    <p class="date">{{date('d.m', strtotime($domino->date))}} <span>{{date('H:i', strtotime($domino->date))}}</span></p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                        @endif
                </div>
                <div class="table-games-pagination">
                    <div data-tab="bura-content" class="table-games-pagination-btn d-flex-spaceCenter current">ბურა</div>
                    <div data-tab="backgammon-content" class="table-games-pagination-btn d-flex-spaceCenter">ნარდი</div>
                    <div data-tab="dominoes-content" class="table-games-pagination-btn d-flex-spaceCenter">დომინო</div>
                </div>
            </div>
        </div>
        <div class="table-games-bottom ">
            <div class="table-games-poker ">
                <div class="table-games-poker-header container">
                    <h1>პოკერის ტურნირები</h1>
                    <div class="">
                        <label for="category"></label>
                        <select name="category" id="category">
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                        </select>
                    </div>
                    <p class="pageTxt">გვერდი</p>
                    <label class="search-poker" for="search"></label>
                    <input placeholder="ძებნა" name="search" type="text" id="search">
                    <input type="hidden" name="hiddenSearchInput" id="searchValue" value="">
                </div>
                <div class="table-games-poker-header-titles container">
                    <div class="casino-title">კაზინო</div>
                    <div class="date-title">დაწყების დრო</div>
                    <div class="name-title">დასახელება</div>
                    <div class="buyIn-title">ბაი-ინი</div>
                    <div class="prize-title">პრიზი</div>
                </div>
                <div class="table-games-poker-body">
                    @if(isset($data['poker']))
                    @foreach($data['poker'] as $poker)
                    <div class="table-games-poker-content">
                        <div class="content-casino-title"><div class="content-casino-title-img" style="background: url('{{asset('uploads/poker') . '/' . $poker['picture']}}') no-repeat center;background-size: cover"></div>{{$poker['casino']}}</div>

{{--                        <div class="content-date-title">{{date('d.m H:i', strtotime($poker->date))}}</div>--}}
                        <div class="content-date-title">{{$poker['date']}}</div>
                        <div class="content-name-title">{{$poker['tournament']}} </div>
                        <div class="content-buyIn-title">{{$poker['amount']}}</div>
                        <div class="content-prize-title">{{$poker['prize']}}</div>
                    </div>
                    @endforeach
                        @endif
                </div>
                <div class="table-games-poker-bottom d-flex-end">
                        <div class="table-games-poker-left-arrow page-box d-flex-spaceCenter" @if($data['pageCount'] == 1) style="display: none;"@endif></div>
                    <div class="table-games-poker-count-pages-outer d-flex-end">
                    @for($t = 1;$t <= $data['pageCount'] ?? 10 ;$t++)
                        <div data-page="{{$t}}" class="table-games-poker-count-pages page-box d-flex-spaceCenter
                         @if($t == 1) current @endif"  @if($data['pageCount'] == 1) style="display: none;" @endif>{{$t}}</div>
                    @endfor
                    </div>
                        <div class="table-games-poker-right-arrow page-box d-flex-spaceCenter" @if($data['pageCount'] == 1 || $data['pageCount'] == 0) style="display: none;"@endif></div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
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

                // Show the first select option in the styled div
                $styledSelect.text($this.children('option').eq(0).text());
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
            function sendAjax(changePerPage = false, changeSearch = false) {
                let selectDiv = $('.styledSelect');
                let perPage = selectDiv.text();
                let page = $('.table-games-poker-count-pages.current').attr('data-page');
                if(changePerPage) {
                    page = 1;
                    $('.table-games-poker-count-pages').removeClass('current');
                    $('.table-games-poker-bottom').children('.table-games-poker-count-pages').first().addClass('current')
                }

                let search = document.getElementById('search').value;
                if(page > 1){
                    $('.table-games-poker-left-arrow').show();
                } else {
                    $('.table-games-poker-left-arrow').hide();

                }
                $.ajax({
                    url: "{{route('getGamesData')}}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {perPage: perPage, page: page, search: search},
                    success: function (data) {
                        let pageCount = Math.ceil(data.totalCount / perPage);
                        if(page !== 1 && page < pageCount){
                            $('.table-games-poker-right-arrow').show();
                        } else if(page === 1 && pageCount > 1){
                            $('.table-games-poker-right-arrow').show();
                        } else {
                            $('.table-games-poker-right-arrow').hide();
                        }
                        $('.table-games-poker-body').empty();
                        data.items.forEach(x => {
                            $('.table-games-poker-body').append(
                                '<div class="table-games-poker-content">' +
                                '<div class="content-casino-title"><div class="content-casino-title-img" style="background: url(\'{{asset('uploads/poker')}}' + '/' + x['picture'] + '\') no-repeat;background-size: cover;"></div>' + x['casino'] + '</div>' +
                                '<div class="content-date-title">' + x['date'] + '</div>' +
                                '<div class="content-name-title">' + x['tournament'] + '</div>' +
                                '<div class="content-buyIn-title">' + x['amount'] + '</div>' +
                                '<div class="content-prize-title">' + x['prize'] + '</div>' +
                                '</div>'
                            );
                        });

                        if(changeSearch === true || changePerPage === true){
                            // alert(pageCount);
                        data.items.forEach(x => {
                            let i;
                                $('.table-games-poker-count-pages-outer').empty();
                                for(i = 1;i <= pageCount ?? 10 ;i++){
                                    let currentClass = i === 1 ? 'current' : '';
                                    let pageCountStyle = pageCount === 1 ? 'display: none' : '';

                                    $('.table-games-poker-count-pages-outer').append(
                                        '<div data-page="'+ i +'" class="table-games-poker-count-pages page-box d-flex-spaceCenter' + ' ' + currentClass + '" style="'+ pageCountStyle +'">'+ i +'</div>');
                                }
                        });
                        }
                    }
                });
            }

            $('.table-games-poker-count-pages-outer').on('click', '.table-games-poker-count-pages', function (e) {
                console.log('gavchede')
                e.preventDefault();
                $('.table-games-poker-count-pages').removeClass('current');
                $(this).addClass('current');
                sendAjax();
            });
            $("#search").keyup(function() {
                sendAjax(false, true);
            });
            $('ul.options li').on('click', function (){
                sendAjax(true);
            })
            $('.table-games-poker-bottom').on('click', '.table-games-poker-right-arrow', function (e) {
                console.log('marjvena');
                let dataNext = $(this).parent().find('.table-games-poker-count-pages.current').data('page') + 1;
                e.preventDefault();
                $(this).parent().find('.table-games-poker-count-pages.current').removeClass('current');
                $( "*[data-page*=" +  dataNext + "]" ).addClass('current');
                sendAjax(false);
            });
            $('.table-games-poker-bottom').on('click', '.table-games-poker-left-arrow', function (e) {
                console.log('marcxena');
                let dataNext = $(this).parent().find('.table-games-poker-count-pages.current').data('page') - 1;
                e.preventDefault();
                $(this).parent().find('.table-games-poker-count-pages.current').removeClass('current');
                $( "*[data-page*=" +  dataNext + "]" ).addClass('current');
                sendAjax(false);
            });


        });
    </script>
    </body>
@endsection
