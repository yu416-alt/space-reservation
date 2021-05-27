@extends('layouts.testapp')
    
    @section('content')
    <div  class="side-color">
    <h2>ログイン画面</h2>
    <h3>{{$msg}}</h3>
    <form method="post" action="../calendar">
    @csrf
        <table class="table borderless">
        <th>登録メールアドレス</th>
        <td><input type="text" name="email" ></td>
        <th>パスワード</th>
        <td><input type="text" name="pass" ></td>
        </table>
        <br>
        <br>
        <input type="submit" value="ログイン" class="submit-btn">
    </form>
    </div>
    @endsection