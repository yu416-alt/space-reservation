@extends('layouts.testapp')

@section('content')
    <div class="side-color">
    <h2>入力内容確認画面</h2>
    <br>
    <br>
    <br>
    <h3>◎ご予約内容</h3>
    <table class="table table-striped">
    <tr>
    <th>部屋タイプ</th><td>{{$roomName}}</td>
    </tr>
    <tr>
    <th>使用日</th><td>{{$ymj}}</td>
    </tr>
    <tr>
    <th>使用時間</th><td>{{$usageTime_start}}~{{$usageTime_end}}({{$usageTime}}時間)</td>
    </tr>
    <tr>
    <th>料金</th><td>{{$price}}円</td>
    </tr>
    </table>
    <br>
    <br>
    <h3>◎お客様情報</h3>
    <table class="table table-striped">
        <tr>
        <th>お名前</th><td>{{$name}}</td>
        </tr>
        <tr>
        <th>メールアドレス</th><td>{{$email}}</td>
        </tr>
        <tr>
        <th>電話番号</th><td>{{$tel}}</td>
        </tr>
        @if($entry=='member')
        <tr>
        <th>パスワード</th><td>{{$pass1}}</td>
        </tr>
        <tr>
        <th>性別</th><td>{{$sex}}</td>
        </tr>
        <tr>
        <th>年齢</th><td>{{$age}}</td>
        @endif
        </tr>
    </table>
    <br><br>

        <p class="error">{{$error}}</p>

        @if($error == '')
        <form method="post" action="reserve_done">
        @csrf
        <input type="hidden" name="roomName" value="{{$roomName}}">
        <input type="hidden" name="ymj" value="{{$ymj}}">
        <input type="hidden" name="price" value="{{$price}}">
        <input type="hidden" name="usageTime_start" value="{{$usageTime_start}}">
        <input type="hidden" name="usageTime_end" value="{{$usageTime_end}}">
        <input type="hidden" name="usageTime" value="{{$usageTime}}">
        <input type="hidden" name="name" value="{{$name}}">
        <input type="hidden" name="email" value="{{$email}}">
        <input type="hidden" name="tel" value="{{$tel}}">
        @if($entry=='member')
        <input type="hidden" name="entry" value="{{$entry}}">
        <input type="hidden" name="pass1" value="{{$pass1}}">
        <input type="hidden" name="sex" value="{{$sex}}">
        <input type="hidden" name="age" value="{{$age}}">
        @endif
        <input type="submit" value="予約を確定する" class="submit-btn">
        </form>
        <br>
        <br>
        @endif

        <input type="button" onclick="history.back()" value="入力画面へ戻る" class="submit-btn back">
        
        </div>
        
    
@endsection

@section('footer')
practice php 
@endsection