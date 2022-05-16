@extends('layouts.app')

@section('content')
    <body class="userPage changePasswordPage">
    <main>
        <div class="user-test d-flex-spaceCenter">
            გვერდი სატესტო რეჟიმშია
        </div>
        <div class="user-content">
            <div class="user-content-left">
                <h1 class="profile">
                    <form method="POST" action="{{route("userPageChangePassword")}}"  method="POST"  enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <h1 class="errorMsg">{{$error}}</h1>
                            @endforeach
                        @endif


                        @if(session('success'))
                            <h1>{{session('success')}}</h1>
                        @endif

                        <input type="text" name="email" value="{{Auth::getUser()->email}}" style="display: none">
                        <input type="text" name="id" value="{{Auth::getUser()->id}}" style="display: none">
                        <div class="profile-block">
                            <div class="profile-block1"><label for="passwordOld">ძველი პაროლი</label></div>
                            <div class="profile-block2"><input name="password" type="password" id="passwordOld"></div>
                        </div>
                        <div class="profile-block">
                            <div class="profile-block1"><label for="passwordNew">ახალი პაროლი</label></div>
                            <div class="profile-block2"><input name="passwordNew" type="password" id="passwordNew"></div>
                        </div>
                        <div class="profile-block">
                            <div class="profile-block1"><label for="passwordNew1">გაიმეორე პაროლი</label></div>
                            <div class="profile-block2"><input name="passwordNew1" type="password" id="passwordNew1"></div>
                        </div>

                        <button id="changePasswordBtn">შეცვლა</button>
                    </form>
                </div>
            </div>
            <div class="user-content-right">
                <div class="betStat-userNameInfo">
{{--                     @auth--}}
{{--                     @if(Auth::user()->fb_id && Auth::user()->avatar)--}}
{{--                     style="background: url('{{Auth::user()->avatar}}');background-size: 100%;"--}}
{{--                     @elseif(!Auth::user()->fb_id && Auth::user()->avatar)--}}
{{--                     style="background: url('uploads/users/{{Auth::user()->avatar}}');background-size: 100%;"--}}
{{--                    @endif--}}
{{--                    @endauth>--}}

                </div>
{{--                <p>{{'@' . Auth::getUser()->name}}</p>--}}
{{--                <span>#{{Auth::getUser()->id}}</span>--}}
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
