<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Poll;
use App\Models\User;
use App\Notifications\TenantInviteNotification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::orderBy('role_id', 'desc')->paginate(10);
        $data['poll'] = [
            1 => 'crystalsport',
            2 => 'crocosport',
            3 => 'adjarasport',
            4 => 'leadersport',
            5 => 'europesport',
            6 => 'europesport'
        ];
        return view('admin.user.index', compact('data'));
    }

    public function pollVote(StoreNewsRequest $request)
    {
        $user = User::where('id', $request->input('user_id'))->first();
        if (!$user->poll) {
            User::where('id', $request->input('user_id'))->update(array('poll' => $request->input('answer')));
            Poll::where('answer', $request->input('answer'))->increment('count');
        }
    }

    public function checkUserExist(Request $request) {
        $existEmail = User::where('email', $request->input('email'))->first();
        $existUsername = User::where('name', $request->input('userName'))->first();
        if ($existEmail) {
            return ['exist' => true, 'type' => 'email'];
        } elseif($existUsername) {
            return ['exist' => true, 'type' => 'login'];
        } else {
            return ['exist' => false];
        }
    }

    public function userPage()
    {

        return view('userPage');
    }

    public function uploadAvatar(StoreNewsRequest $request)
    {

        $pictureName = null;
        if ($request->file('picture')) {
            $pictureName = Auth::getUser()->id . '.' .
                $request->picture->extension();
            $request->picture->move(public_path('uploads/users'), $pictureName);
        }

        $user = User::where('id', Auth::getUser()->id)->update([
            'avatar' => $pictureName,
        ]);
        return redirect()->back();
    }

    public function userPageChangePassword(StoreNewsRequest $request)
    {
        if (($request->input('passwordNew') !== $request->input('passwordNew1'))) {
            return Redirect::back()->withErrors('პაროლები არ ემთვევა ერთმანეთს');
        }
        $credentials = ($request->only('email', 'password'));
        if (Auth::validate($credentials)) {
            User::find($request->input('id'))->update([
                'password' => Hash::make($request->input('passwordNew'))
            ]);
//            dd('1');
            return Redirect::back()->withSuccess('წარმატებით შეიცვალა');
        }
        return Redirect::back()->withErrors('ძველი პაროლი არასწორია');

    }

    public function recoveryPassword(StoreNewsRequest $request)
    {
        $recovery = hash::make($request->input('email'));
//        dd(User::where('email', $request->input('email'))->first());
        User::where('email', $request->input('email'))->update([
            'recovery' => $recovery
        ]);
        try {
            $header = "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html; charset: utf8\r\n";
            $message = '<BODY BGCOLOR="White">
        <head>
     </head>
        <body>

        </br>
        <div style=" height="40" align="left">

        <div class="info" Style="align:left;">

        <p>პაროლის აღსადგენად გადადით მოცემულ ლინკზე</p>

         <p><a href="https://betstat.ge/public/forgot-password?x=' . $recovery . '">https://betstat.ge/public/forgot-password</a></p>

                        </div>
        </br>
        </br>
        <p>( This is an automated message, please do not reply to this message, if you have any queries please contact betstat@info.ge )</p>
        </font>
        </div>
        </body>
    ' . "\n\n";
            $sent = mail($request->email, 'recovery password', $message, $header); // finally sending the email

        } catch (Exception $exception) {
            dd($exception);
        }


    }

    public function forgotPassword() {
        return view('userPageForgotPassword');
    }

    public function recoveryChangePassword(StoreNewsRequest $request) {
        if (($request->input('password1') !== $request->input('password2'))) {
            return Redirect::back()->withErrors('პაროლები არ ემთვევა ერთმანეთს');
        }
        if ($request->input('recovery')) {
            User::where('recovery', $request->input('recovery'))->update([
                'password' => Hash::make($request->input('password2'))
            ]);
            return Redirect::back()->withSuccess('პაროლი განახლებულია');
        }
    }

    public function invitation(User $user)
    {
        if (!request()->hasValidSignature() || $user->password != 'secret') {
            abort(401);
        }

        auth()->login($user);

        return redirect()->route('home');
    }
}
