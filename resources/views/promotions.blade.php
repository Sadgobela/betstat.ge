@extends('layouts.app')

@section('content')
    <body class="promotions">
    <main>
        <section class="promotions-top d-flex-end">
            <div class="promotions-top-right">
                <label for="category">კატეგორია :</label>
                <select name="category" id="category">
                    <option value=""  @if(isset($_GET['cat']) &&  $_GET['cat'] == '') selected @endif>ყველა</option>
                    <option value="სპორტი" @if(isset($_GET['cat']) &&  $_GET['cat'] == 'სპორტი') selected @endif>სპორტი</option>
                    <option value="სლოტები"  @if(isset($_GET['cat']) &&  $_GET['cat'] == 'სლოტები') selected @endif>სლოტები</option>
                    <option value="კაზინო"  @if(isset($_GET['cat']) &&  $_GET['cat'] == 'კაზინო') selected @endif>კაზინო</option>
                    <option value="სამაგიდო თამაშები"  @if(isset($_GET['cat']) &&  $_GET['cat'] == 'სამაგიდო თამაშები') selected @endif>სამაგიდო თამაშები</option>
                    <option value="პოკერი"  @if(isset($_GET['cat']) &&  $_GET['cat'] == 'პოკერი') selected @endif>პოკერი</option>
                </select>
            </div>
        </section>
        <section class="promotions-main container">
            <div class="promotions-boxes ">
            @foreach($data['promoData'] as $promo)
                <a href="{{ route('promoInner', ['id' => $promo['id']]) }}" class="box">
                    <div class="box-top d-flex-spaceBetween">
                        <div class="box-top-caption d-flex-spaceCenter">{{$promo['category2']}}</div>
                        <p class="box-top-text">{{$promo['category1']}}</p>
                    </div>
                    <div class="box-image" style="background: url('{{asset('uploads/promo/images') . '/' . $promo['image']}}')
                        no-repeat center;background-size: 100%;">

                    </div>
                    <div class="box-description">
                        <div class="box-description-img" style="background: url('{{asset('uploads/promo/logos') . '/' . $promo['logo']}}')
                            no-repeat center;background-size: 100%"></div>
                        <div class="box-description-text">{{$promo['title']}}</div>
                        <div class="box-description-rate">{{$promo['rating']}}</div>
                    </div>
                </a>
            @endforeach
            </div>
        </section>
        <a href="" class="promotions-button d-flex-spaceCenter">
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
            let casinoButton = $('.promotions-button')
            let casinoBox = $('.promotions-boxes')

            function countBlocks() {
                boxLength = casinoBox.children().length;
                if(boxLength >= {{$data['count']}}){
                    casinoButton.hide();
                }
            }
            countBlocks();
            casinoButton.on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('getPromotionsData')}}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {count: boxLength},
                    success: function (data) {
                        data.forEach(x => {
                            casinoBox.append(
                            '<a href="/promotions/promotions-inner?id=' + x['id'] + '"' + 'class="box">' +
                                '<div class="box-top d-flex-spaceBetween">' +
                                    '<div class="box-top-caption d-flex-spaceCenter">' + x['category2'] + '</div>' +
                                    '<p class="box-top-text">' + x['category1'] + '</p>' +
                                '</div>' +
                                '<div class="box-image" style="background: url(\'{{asset('uploads/promo/images')}}' + '/' + x['image'] + '\') no-repeat center;background-size: 100%;">' +
                                '</div>' +
                                '<div class="box-description">' +
                                    '<div class="box-description-img" style="background: url(\'{{asset('uploads/promo/logos')}}' + '/' + x['logo'] + '\') no-repeat center;background-size:100%;">' +
                                '</div>' +
                                    '<div class="box-description-text">' + x['title'] + '</div>' +
                                    '<div class="box-description-rate">' + x['rating'] + '</div>' +
                                '</div>'+
                            '</a>');
                        });
                        countBlocks();
                    }
                });
            });
            $('.options li').on('click', function (){
                window.location.replace('promotions?cat=' + $(this).attr('rel'));

            });

        });
    </script>
@endsection
