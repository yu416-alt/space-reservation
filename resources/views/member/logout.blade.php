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
    <h2>ログアウト画面</h2>
    <br>
    
    @if(isset($_SESSION['login'])== 1)
        <p><?php echo $_SESSION['member_data']->name; ?>様がログインされています。</p>
        <br>
        <form method="post" action="logout">
        @csrf
            <input type="submit" value="ログアウトする" class="submit-btn">
        </form>
        @else
        <p>ログインされていません。</p>
        @endif
        <br>
        <a href="../../calendar" class="submit-btn back">トップへ戻る</a>
    </div>
    @endsection