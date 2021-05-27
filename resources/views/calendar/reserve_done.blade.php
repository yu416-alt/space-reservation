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
    <h2>予約完了画面</h2>
    <p>以下の内容で予約承りました。</p>
    <br>
    <p>入力されたメールアドレス宛に確認メールを送信いたしましたので、ご確認くださいませ。</p>

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
    <th>料金</th><td>{{$price}}</td>
    </tr>
    </table>
    <br>
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
    </table>
    <br>
    <a href="/calendar" class="submit-btn  back">トップページへ</a>
    </div>

        
    
@endsection

@section('footer')
practice php 
@endsection