@extends('layouts.app')

@section('content')
    <body class="userPage userPageForgotPassword">
    <main>
        <div class="user-test d-flex-spaceCenter">
            გვერდი სატესტო რეჟიმშია
        </div>
        <div class="user-content">
            <div class="user-content-left">
                <form method="POST" action="{{route("recoveryChangePassword")}}"
                      enctype="multipart/form-data">
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
                    <div class="profile">
                        <div class="profile-block">
                            <input type="text" value="{{$_GET['x']}}" name="recovery" style="display: none">
                            <div class="profile-block1"><label for="passwordNew2">ახალი პაროლი</label></div>
                            <div class="profile-block2"><input name="password1" type="password" id="passwordNew2"></div>
                        </div>
                        <div class="profile-block">
                            <div class="profile-block1"><label for="passwordNew3">გაიმეორე პაროლი</label></div>
                            <div class="profile-block2"><input name="password2" type="password" id="passwordNew3"></div>
                        </div>

                        <button id="changePasswordBtn">შეცვლა</button>
                    </div>
                </form>
            </div>
            <div class="user-content-right">
                <div class="betStat-userNameInfo">

                </div>
            </div>
        </div>
    </main>
    </body>
@endsection
