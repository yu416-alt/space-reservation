@extends('layouts.testapp')

    @section('content')
    <div class="side-color">
        <h2>お客様情報入力画面</h2>
        <table class="table table-striped">
            <tr>
                <th>部屋タイプ</th>
                <td>{{$roomName}}</td>
            </tr>
            <tr>
                <th>使用日</th>
                <td>{{$ymj}}</td>
            </tr>
            <tr>
                <th>使用時間</th>
                <td>{{$usageTime_start}}~{{$usageTime_end}}({{$usageTime}}時間)</td>
            </tr>
            <tr>
                <th>料金</th>
                <td>{{$price}}円</td>
            </tr>
        </table>
        <br>
        
        <p class="error">{{$error}}</p>
        
        <!-- 以下if内 入力エラーが無かった場合、顧客情報入力フォームを表示 -->
        @if($error == '')
        <p>上記内容にお間違いなければ、以下の項目を入力してください。</p><br><br>
        <form method="post" action="reserve_check">
        @csrf
            <table class="table">
                <tr>
                <th>お名前</th>
                <td><input type="text" name="name" value=""></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input type="text" name="email" value=""></td>
                </tr>
                <tr>  
                    <th>電話番号</th>
                    <td><input type="text" name="tel" value=""></td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="entry" value="guest" checked>  ゲストとして予約
                    </td>
                    <td>
                    <input type="radio" name="entry" value="member">  会員登録して予約
                    </td>
                </tr>
            </table>
            <br>
            <div class="background-color">
                <p>
                    以下の項目を入力し会員登録して頂くと、次回から入力の手間が省けるほか、予約情報の参照を行えます。
                </p>
                <br>
                <table class="table table-borderless">
                    <tr>
                        <th>パスワード</th>
                        <td><input type="text" name="pass1"></td>
                    </tr>
                    <tr>
                        <th>パスワード確認用</th>
                        <td><input type="text" name="pass2"></td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>
                            <input type="radio" name="sex" value="男性" checked>男性　　　
                            <input type="radio" name="sex" value="女性">女性
                        </td>
                        <br>
                    </tr>
                    <tr>
                        <th>年齢</th>
                        <td>
                            <select name="age">
                                <option value="10代">10代</option>
                                <option value="20代" selected>20代</option>
                                <option value="30代">30代</option>
                                <option value="40代">40代</option>
                                <option value="50代以上">50代以上</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <input type="submit" value="入力確認画面へ" class="submit-btn">
            <input type="hidden" name="roomName" value="{{$roomName}}">
            <input type="hidden" name="ymj" value="{{$ymj}}">
            <input type="hidden" name="price" value="{{$price}}">
            <input type="hidden" name="usageTime_start" value="{{$usageTime_start}}">
            <input type="hidden" name="usageTime_end" value="{{$usageTime_end}}">
            <input type="hidden" name="usageTime" value="{{$usageTime}}">
        </form>
        <br>
        @endif

    <input type="button" onclick="history.back()" value="日程選択画面へ戻る" class="submit-btn back">
    </div>
@endsection