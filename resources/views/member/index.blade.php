@extends('layouts.testapp')
    
    @section('content')
    <div class="side-color">
    <h2>ログイン画面</h2>
    <h3>{{$msg}}</h3> 
    <form method="post" action="member">
    @csrf
        <table class="table borderless">
            <tr>
                <th>登録メールアドレス</th>
                <td><input type="text" name="email" ></td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td><input type="text" name="pass" ></td>
            </tr>
        </table>
        <br>
        <br>
        <input type="submit" value="ログイン" class="submit-btn">
    </form>
    </div>
    @endsection