@extends('layouts.testapp')
    
    @section('login-button')
        @if(isset($_SESSION['login'])== 1)
        <div>
            <p class="login"><?php echo $_SESSION['member_data']->name; ?>様<br>ログイン中</p>
        </div>
        @endif
    @endsection

    @section('content')
    
    <div class="side-color padding-bottom">
        <h2>日付選択ページ</h2>
        <h3>{{$roomName}}({{$pricePH}}円/1時間)</h3>

        @if(isset($_SESSION['login'])== 1)
        <form method="post" action="memberform/">
        @else
        <form method="post" action="form/">
        @endif
        @csrf
        <input type="hidden" name="roomName" value="{{$roomName}}">
        <input type="hidden" name="pricePH" value="{{$pricePH}}">
        <p>・使用日時を選択してください。</p>
        <input type="text" id="datepicker" name="ymj" value="{{old('ymj')}}" readonly="readonly">
        <i class="far fa-calendar-alt" ></i>
        <br>
        <br>
        <p>・使用時間を選択してください<br>※使用可能時刻は8：00∼23：00まで。最低使用時間は3時間となっております。</p>
        <?php
        echo "<select name=\"usageTime_start\">";
        $timeop = "";
        for ($i = 0; $i < 25; $i++) {
            $time = date("H:i", strtotime("+". $i * 30 ." minute",(-3600*16)));
            $timeop .= "<option value =\"{$time}\">".$time."</option>\n";
        }
        echo $timeop;
        echo "</select> ～ ";

        echo "<select name=\"usageTime_end\">";
        $timeop = "";
        for ($i = 0; $i < 25; $i++) {
            $time = date("H:i", strtotime("+". $i * 30 ." minute",(-3600*13)));
            $timeop .= "<option value =\"{$time}\">".$time."</option>\n";
        }
        echo $timeop;
        echo "</select>";
        ?>
        <br>
        <br>
        <br>
        <input type="submit" value="予約画面へ進む" class="submit-btn">
    </form>
    <br>
    <input type="button" onclick="history.back()" value="トップページへ戻る" class="submit-btn back">
    </div>
    @endsection


    @section('script')
    <style>
    .ui-datepicker {
        font-size: 200%;
    }
    </style>
    <script>
    $(function(){
    var dateFormat = 'yy/mm/dd';
    var reserved = [
        <?php 
        foreach($reservations as $ymj){
        echo '"'.$ymj->ymj.'"'.',';
        }
    ?>
    ];
    var option = {
        beforeShowDay : function(date) {
                            var current = $.datepicker.formatDate(dateFormat, date);
                            return [( reserved.indexOf(current) == -1 ), "", ""];
                        },
        minDate: 1
        }

        $('#datepicker').datepicker(option);
    });
    </script>
    @endsection