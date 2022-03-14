@extends('layouts.app')

@section('content')
    <body class="userPage">
    <main>
        <div class="user-test d-flex-spaceCenter">
            გვერდი სატესტო რეჟიმშია
        </div>
        <div class="user-content">
            <div class="user-content-left">
                <div class="profile">
                    <form method="POST" action="{{route("uploadAvatar")}}"  method="POST"  enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="profile-block">
                            <div class="profile-block1"><label for="profileMail">ელ-ფოსტა:</label></div>
                            <div class="profile-block2"><input name="email" value="{{Auth::getUser()->email}}" type="text" id="profileMail"></div>
                        </div>
                        <div class="profile-block">
                            <div class="profile-block1"><label for="profileAvatar">ავატარი:</label></div>
                            <div class="profile-block2"><input type="file" id="profileAvatar" name="picture" multiple></div>
                        </div>

                        <button id="upload-avatar">ატვირთვა</button>
                    </form>
                </div>
            </div>
            <div class="user-content-right">
                <div class="betStat-userNameInfo"
                     @auth
                     @if(Auth::user()->fb_id && Auth::user()->avatar)
                     style="background: url('{{Auth::user()->avatar}}');background-size: 100%;"
                     @elseif(!Auth::user()->fb_id && Auth::user()->avatar)
                     style="background: url('uploads/users/{{Auth::user()->avatar}}');background-size: 100%;"
                    @endif
                    @endauth>

                </div>
                <p>{{'@' . Auth::getUser()->name}}</p>
                <span>#{{Auth::getUser()->id}}</span>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            // $(".upload-avatar").click(function (e) {
            //     e.preventDefault();
            //     console.log($(".profileAvatar"));
                {{--$.ajax({--}}
                {{--    url: "{{route('removePicture')}}",--}}
                {{--    type: 'POST',--}}
                {{--    headers: {--}}
                {{--        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--    },--}}
                {{--    data: {id: {{$news->id}}, picture: '{{$news->picture}}'},--}}
                {{--    success: function (data) {--}}
                {{--        $('.if-image').hide();--}}
                {{--    }--}}
                {{--});--}}
            // });
        });
    </script>
    </body>
@endsection
