@extends('layouts.testapp')
    
    @section('login-button')
        @if(isset($_SESSION['login'])== 1)
        <div>
            <p class="login"><?php echo $_SESSION['member_data']->name; ?>様<br>ログイン中</p>
        </div>
        @endif
    @endsection

@section('content')
    <div class="side-color">
    <h2>予約確認画面</h2>
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
    <p>{{$error}}</p>
    <br>
    
    @if($error == '')
    <h3>◎お客様情報</h3>
    <table class="table table-striped">
        <tr>
        <th>お名前</th><td><?php echo $_SESSION['member_data']->name; ?> 様</td>
        </tr>
        <tr>
        <th>メールアドレス</th><td><?php echo $_SESSION['member_data']->email; ?></td>
        </tr>
        <tr>
        <th>電話番号</th><td><?php echo $_SESSION['member_data']->tel; ?></td>
        </tr>
    </table>
    <br>
    <br>
    <p>上記内容にお間違いなければ、ご予約させて頂きます。</p><br><br>
    <br>
    <form method="post" action="reserve_done">
    @csrf
    <input type="hidden" name="roomName" value="{{$roomName}}">
    <input type="hidden" name="ymj" value="{{$ymj}}">
    <input type="hidden" name="price" value="{{$price}}">
    <input type="hidden" name="usageTime_start" value="{{$usageTime_start}}">
    <input type="hidden" name="usageTime_end" value="{{$usageTime_end}}">
    <input type="hidden" name="usageTime" value="{{$usageTime}}">
    <input type="hidden" name="name" value="<?php echo $_SESSION['member_data']->name; ?>">
    <input type="hidden" name="email" value="<?php echo $_SESSION['member_data']->email; ?>">
    <input type="hidden" name="tel" value="<?php echo $_SESSION['member_data']->tel; ?>">
    <input type="submit" value="予約を確定する" class="submit-btn">
    </form>
    <br>
    <br>
 
    @endif

    <input type="button" onclick="history.back()" value="日程選択画面へ戻る" class="submit-btn back">
    </div>
@endsection