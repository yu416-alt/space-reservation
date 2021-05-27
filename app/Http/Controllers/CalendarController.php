<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CalendarController extends Controller
{
    public function index()
    {
        session_start();
        return view('calendar.index');
    }

    

    public function schedule(Request $request)
    {
        session_start();
        
        $room = $request->room;
        if($room == 'roomA')
        {
            $roomName = '会議室A';
            $pricePH = 5000;
        }elseif($room == 'roomB'){
            $roomName = '会議室B';
            $pricePH = 5000;
        }else{
            $roomName = '会議室C';
            $pricePH = 7000;
        }

        $param = ['roomName' => $roomName];
        $reservations = DB::select('select * from reservations where roomName = :roomName',$param);

        $param = [
            'roomName'=>$roomName,
            'pricePH'=>$pricePH,
            'reservations'=>$reservations,
        ];
        return view('calendar.schedule',$param);
    }

    public function form(Request $request)
    {
        $ymj = $request->ymj;//日付の取得
        $roomName = $request->roomName;//部屋タイプ取得
        $pricePH = $request->pricePH;//時間単価
        $usageTime_start = $request->usageTime_start;//使用開始時刻
        $usageTime_end = $request->usageTime_end;//終了時刻
        $usageTime = (strtotime($usageTime_end)-strtotime($usageTime_start))/3600;//使用時間

        $price = $pricePH*$usageTime;//使用料金

        $error = '';
        if($ymj==''){
            $error .= '・ご利用日を選択してください。';
        }
        if($usageTime<3){
            $error .= '・会議室は3時間以上からご使用頂けます。';
        }

        
        
        $param = [
            'ymj'=>$ymj,
            'roomName'=>$roomName,
            'price'=>$price,
            'usageTime_start'=>$usageTime_start,
            'usageTime_end'=>$usageTime_end,
            'usageTime'=>$usageTime,
            'error'=>$error
        ];
        return view('calendar.form',$param);
        
    }


    public function reserve_check(Request $request)
    {
        $ymj = $request->ymj;//日付の取得
        $roomName = $request->roomName;//部屋タイプ取得
        $price = $request->price;//使用料金
        $usageTime_start = $request->usageTime_start;//使用開始時刻
        $usageTime_end = $request->usageTime_end;//終了時刻
        $usageTime = $request->usageTime;//使用時間
        $name = $request->name;
        $email = $request->email;
        $tel = $request->tel;
        //以下会員登録情報
        $entry = $request->entry;
        $pass1 = $request->pass1;
        $pass2 = $request->pass2;
        $sex = $request->sex;
        $age = $request->age;

        $error = '';
        if($name==''){
            $error .= '・名前を入力してください。';
        }
        if(preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',$email)==0){
            $error .= '・メールアドレスを正しく入力してください。';
        }
        if($tel==''){
            $error .= '・電話番号を入力して下さい。';
        }
        if($entry=='member')
        {
            if($pass1=='')
            {
                $error .= '・パスワードが入力されていません。';
            }
            if($pass1!=$pass2)
            {
                $error .= 'パスワードが一致しません。';
            }
        }

        
        $param = [
            'ymj'=>$ymj,
            'roomName'=>$roomName,
            'price'=>$price,
            'usageTime_start'=>$usageTime_start,
            'usageTime_end'=>$usageTime_end,
            'usageTime'=>$usageTime,
            'name'=>$name,
            'email'=>$email,
            'tel'=>$tel,
            'entry'=>$entry,
            'pass1'=>$pass1,
            'sex'=>$sex,
            'age'=>$age,
            'error'=>$error
        ];
        return view('calendar.reserve_check',$param);   
    }

    
    
    public function reserve_done(Request $request)
    {
        $ymj = $request->ymj;//日付の取得
        $roomName = $request->roomName;//部屋タイプ取得
        $price = $request->price;//使用料金
        $usageTime_start = $request->usageTime_start;//使用開始時刻
        $usageTime_end = $request->usageTime_end;//終了時刻
        $usageTime = $request->usageTime;//使用時間
        $name = $request->name;
        $email = $request->email;
        $tel = $request->tel;
        //以下会員登録情報
        $entry = $request->entry;
        $pass1 = $request->pass1;
        $sex = $request->sex;
        $age = $request->age;
        
        $param = [
            'ymj'=>$ymj,
            'roomName'=>$roomName,
            'price'=>$price,
            'usageTime_start'=>$usageTime_start,
            'usageTime_end'=>$usageTime_end,
            'usageTime'=>$usageTime,
            'name'=>$name,
            'email'=>$email,
            'tel'=>$tel,
        ];

        $memberParam = [
            'name'=>$name,
            'email'=>$email,
            'tel'=>$tel,
            'pass1'=>$pass1,
            'sex'=>$sex,
            'age'=>$age
        ];

        $text = '';
        $text .= '以下の内容で予約承りました。\n\n';
        $text .= '部屋タイプ:'.$roomName.'\n';
        $text .= '使用日：'.$ymj.'\n';
        $text .= ''.$usageTime_start.'~'.$usageTime_end.'('.$usageTime.'時間)\n\n';
        $text .= 'お客様情報';
        $text .= 'お名前：'.$name.'\n';
        $text .= 'メールアドレス：'.$email.'\n';
        $text .= '電話番号：'.$tel.'\n\n';
        $text .= 'ご使用料金のお支払いは当日フロントにてお願いいたします。';

        if($entry=='member')
        {
            $text .= '会員登録頂きありがとうございます。\n次回からメールアドレスとパスワードでログインしてください。\n';
            $text .= 'ログインID：'.$email.'\n';
            $text .= 'パスワード:'.$pass1.'\n';
            $text .= '性別:'.$sex.'\n';
            $text .= '年齢:'.$age.'\n';
        }

        $title = 'ご予約承りました。';
        $header = 'From:info@tanpopo-yuuka@softbank.ne.jp';
        $text = html_entity_decode($text,ENT_QUOTES,'UTF-8');
        //mb_language('Japanese');
        //mb_internal_encoding('UTF-8');
        //mb_send_mail($email,$title,$text,$header);


        DB::insert('insert into reservations (name,email,tell,roomName,usageTime_start,usageTime_end,usageTime,ymj,price) values(:name,:email,:tel,:roomName,:usageTime_start,:usageTime_end,:usageTime,:ymj,:price)',$param);
        if($entry=='member')
        {
        DB::insert('insert into members (name,email,tel,pass,sex,age) values(:name,:email,:tel,:pass1,:sex,:age)',$memberParam);
        }
        return view('calendar.reserve_done',$param);
        
    }
    
    public function memberform(Request $request)
    {
        session_start();
        $ymj = $request->ymj;//日付の取得
        $roomName = $request->roomName;//部屋タイプ取得
        $pricePH = $request->pricePH;//時間単価
        $usageTime_start = $request->usageTime_start;//使用開始時刻
        $usageTime_end = $request->usageTime_end;//終了時刻
        $usageTime = (strtotime($usageTime_end)-strtotime($usageTime_start))/3600;//使用時間

        $price = $pricePH*$usageTime;//使用料金

        $error = '';
        if($ymj==''){
            $error .= '・ご利用日を選択してください。\n';
        }
        if($usageTime<3){
            $error .= '・会議室は3時間以上からご使用頂けます。\n';
        }
        
        $param = [
            'ymj'=>$ymj,
            'roomName'=>$roomName,
            'price'=>$price,
            'usageTime_start'=>$usageTime_start,
            'usageTime_end'=>$usageTime_end,
            'usageTime'=>$usageTime,
            'error'=>$error
        ];
        return view('calendar.memberform',$param);
        
    }

}
