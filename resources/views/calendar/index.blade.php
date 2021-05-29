@extends('layouts.testapp')

    @section('login-button')

        @if(isset($_SESSION['login'])== 1)
        <div>
            <p class="login">
                <?php echo $_SESSION['member_data']->name; ?>様<br>ログイン中
            </p>
            <a href="member/logout" class="login-btn logout display-none">
                <i class="fas fa-sign-out-alt"></i>ログアウト
            </a>
            <a href="member/logout" class="logout-icon">
                <i class="fas fa-sign-out-alt"></i>
            </a>   
        </div>
        @else
        <div>
            <a href="member" class="login-btn">
                会員ログイン
            </a>
        </div>
        @endif

    @endsection

    <div class="fast-view">
        <div class="background-image"></div>
        <div class="band">
            <p class="fs-30px">
                ○○駅徒歩<span>5</span>分
            </p>
            <p class="fs-24px">
                レンタルオフィス
            </p>
            <img src="{{asset('/assets/img/Space-2.png')}}">
        </div>
    </div>
   
    <div id="room-select">
        <section>
            <h2>会議室A</h2>
            <img src="{{asset('/assets/img/roomA.png')}}">
            <div>
                <table class="table table-borderless ">
                    <tr>
                        <th>利用人数</th>
                        <td>１２名用</td>
                    </tr>
                    <br>
                    <tr>
                        <th>利用料金</th>
                        <td>５０００円/１時間</td>
                    </tr>
                    <br>
                    <tr>
                        <th>設備</th>
                        <td>ディスプレイ、ホワイトボード、FreeWifi</td>
                    </tr>
                </table>
                <br>
                <a href="calendar/schedule?room=roomA" class="button">
                    空室状況確認・予約
                </a>
            </div>
        </section>
        <section>
            <h2>会議室B</h2>
            <img src="{{asset('/assets/img/roomB.png')}}">
            <div>
                <table class="table table-borderless ">
                    <tr>
                        <th>利用人数</th>
                        <td>８名用</td>
                    </tr>
                    <br>
                    <tr>
                        <th>利用料金</th>
                        <td>３０００円/１時間</td>
                    </tr>
                    <br>
                    <tr>
                        <th>設備</th>
                        <td>ディスプレイ、プロジェクター、ホワイトボード、FreeWifi</td>
                    </tr>
                    </table>
                    <br>
                    <a href="calendar/schedule?room=roomB">空室状況確認・予約</a>
            </div>
        </section>
        <section>
            <h2>会議室C</h2>
            <img src="{{asset('/assets/img/roomC.png')}}">
            <div>
                <table class="table table-borderless ">
                    <tr>
                        <th>利用人数</th>
                        <td>１6名用</td>
                    </tr>
                    <br>
                    <tr>
                        <th>利用料金</th>
                        <td>7０００円/１時間</td>
                    </tr>
                    <br>
                    <tr>
                        <th>設備</th>
                        <td>ディスプレイ、プロジェクター、ホワイトボード、FreeWifi</td>
                    </tr>
                </table>
                <br>
                <a href="calendar/schedule?room=roomC">
                    空室状況確認・予約
                </a>
            </div>
        </section>
    </div>
    
   
    @section('content')
    <div class="background-white padding">
        <h2>その他サービス</h2>
        <p>
            フロントにてコピー機を有料でご利用いただけます。<br>
            マイクや追加ホワイトボードのレンタルは無料で行っております。当日フロントにてお申し付けくださいませ。
        </p>
        <br>
        <br>
        
        <h2>ご利用について</h2>
        <p class="fs-15px">
            営業時間　　<span class="orange">８：００～２３：００</span>
        </p>
        <br> 
        <p>
            ・<span class="orange">最低３時間以上</span>のご予約でご利用いただけます。<br>
            ・初回予約時に会員登録して頂きますと、次回以降の利用時に簡単予約が可能になります。
        </p>
    </div>
    
    <div class="padding">
        <h2>アクセス</h2>
        <div class="flex">
            <p class="fs-15px">
                ○○駅 北改札口より徒歩５分<br><br>
                〒000-0000<br>
                大阪府大阪市○○町1-2-3<br><br>
                TEL<br><span class="fs-15px">012-3456-7890</span>
            </p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8368.69518017177!2d135.4945645150437!3d34.70318209059344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e68d95e3a70b%3A0x1baec822e859c84a!2z5aSn6Ziq6aeF!5e0!3m2!1sja!2sjp!4v1621753987828!5m2!1sja!2sjp"  allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    @endsection