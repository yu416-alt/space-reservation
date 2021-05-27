<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index',['msg'=>'']);
    }

    public function post(Request $request)
    {
        //$entry = 'login';
       
        $email = $request->email;
        $pass = $request->pass;
        
       
        
        $members_data = Member::where('email',$email)->first();
        //$data = array_shift($members_data);
        //$request->session()->put('data',$sesdata);

        if($members_data == null)
        {
            $msg = 'このメールアドレスは登録されていません。';
            return view('member.index',['msg'=>$msg]);
        }elseif($pass != $members_data->pass){
            $msg = 'パスワードが間違っています。';
            return view('member.index',['msg'=>$msg]);
        }else{
            session_start();
            $_SESSION['login']=1;
            $_SESSION['member_data']=$members_data;

            $msg = 'ようこそ'.$members_data->name.'さん。';
            return view('calendar.index', ['msg' => $msg]);
        }
    }

    public function logout_get()
    {
        session_start();
        return view('member.logout');
    }

    public function logout_post()
    {
        session_start();
        $_SESSION = array();
        if (isset($_COOKIE["PHPSESSID"])) {
            setcookie("PHPSESSID", '', time() - 1800, '/');
        }
        session_destroy();
        return view('member.logout');
    }


}
