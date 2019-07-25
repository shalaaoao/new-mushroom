@extends('main')

@section('head_css')
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('plugins/mark/css/index.css')}}">
    <link rel="stylesheet" href="{{$css_src}}all.min.css">
@stop

@section('body_before')@stop

@section('content')

    <div class="flowtime">
        <div class="ft-section section-1" data-id="section-1">
            <div id="/section-1/page-1" class="ft-page page-1" data-id="page-1" style="background: #fff url({{$img_src}}bg_julyaoao.jpg) bottom right no-repeat;
">
                <p class="text1">陈总❤小金</p>
                <p class="text2">按键盘 "↓" 开始倾听我的表白</p>
            </div>
            <div id="/section-1/page-2" class="ft-page page-2" data-id="page-2">
                <p class="top-text">故事的开端在一个Black and tall wind的夜晚</p>
                <img src='{{$img_src}}bg_moon.png'>
            </div>
            <div id="/section-1/page-3" class="ft-page page-3 center-img" data-id="page-3" >
                <h2 class="text">有一只chunchun的小猪仔...</h2>
                <img src='{{$img_src}}bg_pig.jpg' style="margin-top:200px;"/>
            </div>
            <div id="/section-1/page-4" class="ft-page page-4 left-img" data-id="page-4">
                <h2 class="text">被一只手捧永生花的大头猪<br/><br/>给...拱了...</h2>
                <img src='{{$img_src}}bg_beast.jpg' />
            </div>
        </div>
        <div class="ft-section section-2" data-id="section-2">
            <div id="/section-2/page-1" class="ft-page page-5 right-img" data-id="page-1">
                <h2 class="left-text">于是...<br/><br/>小猪仔和大猪头...<br/><br/>分别打开了各自的...<br/><br/>人生新篇章~</h2>
                <img src='{{$img_src}}bg_pig_bo.png' />
            </div>
            <div id="/section-2/page-2" class="ft-page page-6 " data-id="page-2">
                <h2 class="top-text">但是...好景不长<br/>小猪仔...青涩的大学校园恋情<br/>才过了3天就草草的结束啦~~</h2>
                <img src='{{$img_src}}bg_biye.jpg'/>
            </div>
            <div id="/section-2/page-3" class="ft-page page-7 left-img" data-id="page-3">
                <h3 class="right-text">我家的大宝宝即将脱离大学<br/><br/>进入小学<br/><br/>乖乖地做我的小宝宝~</h3>
                <img src='{{$img_src}}bg_beishou.jpg'>
            </div>
            <div id="/section-2/page-4" class="ft-page page-8 left-img" data-id="page-4">
                <h3 class="right-text">但生活总有不如意<br/>所幸的是<br/>宝宝一直都在我身边<br/>陪着我</h3>
                <img src='{{$img_src}}bg_peizheni.png' />
            </div>
            <div id="/section-2/page-5" class="ft-page page-9" data-id="page-5">
                <h3>不过...宝宝也有自己的小性子<br/>比如不喜欢坐我的三轮车~</h3>
                <img src='{{$img_src}}bg_sanlun.jpg' />
            </div>
            <div id="/section-2/page-6" class="ft-page page-10" data-id="page-6">
                <h3>不过宝宝呢，也并不介意，我去接她下班~</h3>
                <img src='{{$img_src}}bg_after_school.jpeg' />
            </div>
        </div>
        <div class="ft-section section-3" data-id="section-3">
            <div id="/section-3/page-1" class="ft-page page-11" data-id="page-1">
                <h3>做手工的姑娘最美了对嘛~</h3>
                <img src='{{$img_src}}bg_shougong.jpg' />
            </div>
            <div id="/section-3/page-2" class="ft-page page-12" data-id="page-2">
                <br>陈总说，我的小猪仔呀~<br/>我想拉着你的手<br/>一直一直...</br>到永远~<br/></h3>
                <img src='{{$img_src}}bg_lashou.jpg' />
            </div>
            <div id="/section-3/page-3" class="ft-page page-13 right-img" data-id="page-3">
                <img src='{{$img_src}}bg_xiedai.jpg' />
                <h3 class="left-text">陈总说，我的小猪仔呀~<br/>我要一辈子<br/>一直一直..<br/>帮你系鞋带~</h3>
            </div>
            <div id="/section-3/page-4" class="ft-page page-14 left-img" data-id="page-4">
                <h3>介于陈总对宝宝这么好<br/><br/>宝宝总是会给奖励的嘛~</h3>
                <img src='{{$img_src}}bg_geibaobao.jpg' />
            </div>
            <div id="/section-3/page-5" class="ft-page page-15 left-img" data-id="page-5">
                <h3 class="right-text">再贴点日常<br/>和宝宝一起去看crocodile~</h3>
                <img src='{{$img_src}}bg_eyu.jpg' />
            </div>
            <div id="/section-3/page-6" class="ft-page page-16 left-img" data-id="page-6">
                <h3>和宝宝去吃了蓄谋已久的<br />Lamoda~</h3>
                <img src='{{$img_src}}bg_lamoda.jpg' />
            </div>
            <div id="/section-3/page-7" class="ft-page page-17 top-text" data-id="page-7">
                <h3>和宝宝第一次去音乐会~</h3>
                <img src='{{$img_src}}bg_music.png' />
            </div>
        </div>
        <div class="ft-section section-4" data-id="section-4">
            <div id="/section-4/page-1" class="ft-page page-18 " data-id="page-1">
                <p class="text">千千万万的礼物中，使用的最多的应该就是宝宝御用了吧~</p>
                <img src='{{$img_src}}bg_shanzi.jpg' />
            </div>
            <div id="/section-4/page-2" class="ft-page page-19" data-id="page-2" style="background-image: url({{$img_src}}iali75_bg.jpg)">
                <h3>借着恐怖气氛的东风，我和宝宝在密室里发生了什么呢~</h3>
                <img src="{{$img_src}}bg_mishi.jpg" />
            </div>
            <div id="/section-4/page-3" class="ft-page page-20" data-id="page-3">
                <h3>于是，陈总也如愿以偿的收获了一个大件的礼物~</h3>
                <img src='{{$img_src}}bg_lion.jpg' />
            </div>
            <div id="/section-4/page-4" class="ft-page page-21" data-id="page-4" style="background: #fbf2a3 url({{$img_src}}iali59_bg.jpg)">
                <h3>第一次被我静静地欣赏~</h3>
                <img src='{{$img_src}}bg_sleep.jpg' />
            </div>
            <div id="/section-4/page-5" class="ft-page page-22 left-img" data-id="page-5">
                <h3>不甘示弱的小猪仔奋起反击~</h3>
                <img src='{{$img_src}}bg_draw.jpg' />
            </div>
            <div id="/section-4/page-6" class="ft-page page-23 left-img" data-id="page-6">
                <h3>我老婆最美了~</h3>
                <img src='{{$img_src}}bg_shadow.jpg' />
            </div>
            <div id="/section-4/page-7" class="ft-page page-24 full-img" data-id="page-7">
                <h3>直到有一天~宝宝家里多了新的成员</h3>
                <img src='{{$img_src}}bg_dog.jpg' />
            </div>
        </div>
        <div class="ft-section section-5" data-id="section-5">
            <div id="/section-5/page-1" class="ft-page page-25 left-img" data-id="page-1">
                <h3>不开心<br/><br/>宝宝会不会有了新嗷子<br/><br/>就不要小嗷子了呢？</h3>
                <img src='{{$img_src}}bg_baogou.jpg' />
            </div>
            <div id="/section-5/page-2" class="ft-page page-26 top-text" data-id="page-2">
                <h3>我也会憧憬，有那么一天，我踩着七彩祥云来接你~<br/>嘴里念叨着，我精心写下的诗句</h3>
                <img src='{{$img_src}}bg_qiuhun.jpg' />
            </div>
            <div id="/section-5/page-3" class="ft-page page-27" data-id="page-3">
                <h3>老婆，你真美~</h3>
                <img src='{{$img_src}}bg_zipai.jpg' />
            </div>
            <div id="/section-5/page-4" class="ft-page page-28" data-id="page-4" style="background: #b7e7f3 url({{$img_src}}iali40_bg.jpg) bottom repeat-x;padding: 0">
                <h3>老婆，你真美 * 2</h3>
                <img src='{{$img_src}}bg_wopai.jpg' />
            </div>
            <div id="/section-5/page-5" class="ft-page page-29" data-id="page-5">
                <h3>老婆，你真美 * 3</h3>
                <img src='{{$img_src}}bg_sing.jpg' />
            </div>
            <div id="/section-5/page-6" class="ft-page page-30" data-id="page-6" style="background: #fff url({{$img_src}}iali76_bg.png) center bottom repeat-x;">
                <h3>老婆，你真美 * 4</h3>
                <img src='{{$img_src}}bg_mei1.jpg' />
            </div>
            <div id="/section-5/page-7" class="ft-page page-31" data-id="page-7">
                <h3>霸道的陈总每天都想要亲亲呢~</h3>
                <img src='{{$img_src}}bg_mei2.jpg' />
            </div>
        </div>
        <div class="ft-section section-6" data-id="section-6">
            <div id="/section-6/page-1" class="ft-page page-32" data-id="page-1">
                <h3>老婆，你真美 * 5</h3>
                <img src='{{$img_src}}bg_mei3.jpg' />
            </div>
            <div id="/section-6/page-2" class="ft-page page-33 top-text" data-id="page-2">
                <h3>静静的守候你，也是一种幸福~</h3>
                <img src='{{$img_src}}bg_kan.jpg' />
            </div>
            <div id="/section-6/page-3" class="ft-page page-34 left-img" data-id="page-3">
                <h3>如果可以的话，我想每天都来接你</h3>
                <img src='{{$img_src}}bg_beibao.jpg' />
            </div>
            <div id="/section-6/page-4" class="ft-page page-35" data-id="page-4" style="background: #fff url({{$img_src}}iali8_bg.png) left bottom repeat-x;">
                <h3>陈总感觉自己好幸福。<br />因为有一个人<br />需要他去等</h3>
                <img src='{{$img_src}}bg_ticket.jpg' />
            </div>
            <div id="/section-6/page-5" class="ft-page page-36" data-id="page-5">
                <h3>晒一下我老婆的大长腿~</h3>
                <img src='{{$img_src}}bg_leg.jpg' />
            </div>
            <div id="/section-6/page-6" class="ft-page page-37 left-img" data-id="page-6">
                <h3>生活中处处都有惊喜</h3>
                <img src='{{$img_src}}bg_pig_toy.jpg' />
            </div>
            <div id="/section-6/page-7" class="ft-page page-38 bottom-text" data-id="page-7">
                <img src='{{$img_src}}bg_glass.jpg' />
                <h3>可能一不小心，自己的一bei子就送出去了呢</h3>
            </div>
        </div>
        <div class="ft-section section-7" data-id="section-7">
            <div id="/section-7/page-1" class="ft-page page-39 left-img" data-id="page-1" style="background: #e8ccc1 url({{$img_src}}iali2_bg.jpg) repeat">
                <h3>也可能一不小心，自己的梦想就被宝宝实现了呢~</h3>
                <img src='{{$img_src}}bg_911.jpg' />
            </div>
            <div id="/section-7/page-2" class="ft-page page-40" data-id="page-2">
                <h3>梦想实现 * 2</h3>
                <img src='{{$img_src}}bg_86.jpg'/>
            </div>
            <div id="/section-7/page-3" class="ft-page page-41 left-img" data-id="page-3">
                <img src='{{$img_src}}bg_benz.jpg' class="right-text"/>
                <h3>我的意中人是一个绝世美女<br/>有一天<br/>她会踩着梅赛德斯奔驰<br/>来娶我回家</h3>
            </div>
            <div id="/section-7/page-4" class="ft-page page-42 left-img" data-id="page-4">
                <h3 class="right-text">老婆，你真美 * 6</h3>
                <img src='{{$img_src}}bg_mei4.jpg' />
            </div>
            <div id="/section-7/page-5" class="ft-page page-43" data-id="page-5">
                <img src='{{$img_src}}bg_sleep2.jpg' />
                <h3>老婆睡着了也很美 * 2</h3>
            </div>
            <div id="/section-7/page-6" class="ft-page page-44 left-img" data-id="page-6">
                <h3>好想好想~<br />每天和宝宝一起在车里看星星~</h3>
                <img src='{{$img_src}}bg_sky.jpg' />
            </div>
            <div id="/section-7/page-7" class="ft-page page-45 left-img" data-id="page-7">
                <h3>然后...<br />再做一点流氓的事情~</h3>
                <img src='{{$img_src}}bg_motui.jpg' />
            </div>
        </div>
        <div class="ft-section section-8" data-id="section-8">
            <div id="/section-8/page-1" class="ft-page page-46" data-id="page-1">
                <img src='{{$img_src}}bg_rili.png' />
                <h3>
                    <span>自从小猪仔出现了以后</span>
                    <span>陈总慢慢地</span>
                    <span>养成了用小本子记下来的习惯</span>
                    <span>记录我们每天发生的点点滴滴</span>
                    <span>记录小金的</span>
                    <span>小幸福</span>
                </h3>
            </div>
            <div id="/section-8/page-2" class="ft-page page-47 top-text" data-id="page-2">
                <img src='{{$img_src}}bg_rice.jpg' />
                <h3>
                    <span>想想后面的日子</span>
                    <span>真期待</span>
                    <span>每天都能吃到宝宝做的蛋炒饭</span>
                    <span>：）开心</span>
                </h3>
            </div>
            <div id="/section-8/page-3" class="ft-page page-48 left-img" data-id="page-3">
                <p>陈总也会继续努力<br />慢慢地学做饭，慢慢地把蛋炒饭做得更好：）</p>
                <img src='{{$img_src}}bg_kj.jpg' />
            </div>
            <div id="/section-8/page-4" class="ft-page page-49 left-img" data-id="page-4">
                <p class='text'>陈总是一个有理想的人<br/><br/>陈总每天都非常的自律~</p>
                <img src='{{$img_src}}bg_list.jpg' />
            </div>
            <div id="/section-8/page-5" class="ft-page page-50" data-id="page-5">
                <p class='text'>看见喜欢的人，第一反应是什么呢？<br/><br/>笑~</p>
                <img src='{{$img_src}}bg_f_smile.jpg' class='img1' />
            </div>
            <div id="/section-8/page-6" class="ft-page page-51" data-id="page-6">
                <p>
                    小金：永远有多远？<br />
                    陈总：比时间多一秒就是永远，我会永远爱你<br />
                    小金：世界有多大？<br />
                    陈总：你走到哪里，世界就有多大
                </p>
                <img src='{{$img_src}}bg_qianzou.jpg' />
            </div>
        </div>
        <div class="ft-section section-9" data-id="section-9">
            <div id="/section-9/page-1" class="ft-page page-52 full-img" data-id="page-1">
                <h3>斯人若彩虹，遇上方知有</h3>
                <img src='{{$img_src}}bg_rainbow.jpg' />
            </div>
            <div id="/section-9/page-2" class="ft-page page-53" data-id="page-2">
                <img src='{{$img_src}}bg_bridge.jpg' style="width:60%;height:60%;"/>
                <h3>祝愿我家的小宝贝17岁生日快乐<br/><br/>永远开心~</h3>
            </div>
            <div id="/section-9/page-3" class="ft-page page-54 center-img" data-id="page-3" style="background: #d3d2d0 url({{$img_src}}319280_bg.jpg) repeat">
                <div class="center-img" style="background-image: url({{$img_src}}319280.jpg);">I love you</div>
            </div>
            <div id="/section-9/page-4" class="ft-page page-55 left-img" data-id="page-4">
                <img src='{{$img_src}}bg_baobao.jpg' />
                <p class="text" style="color:#ffffff;left:0;right:0;text-align:left;margin-left:100px;">
                    你以为今天惊喜到此为止了吗?<br />
                    往后的日子<br />
                    慢慢地会告诉你<br />
                    <br/>
                    ...
                    <br/>
                    <br/>
                    遇上对的人...<br/>
                    每天都是情人节~<br />
                    <br/>

                    『<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;你愿意<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;永远的做我的小宝宝吗？~<br />
                    &nbsp;&nbsp;』<br/>
                    <br/>

                    Please tell me your answer~<br/>
                    <br/>
                    <span> -- 按“Esc"键有惊喜</span>
                </p>
            </div>
        </div>
    </div>

    <audio src="{{$music_src}}thisislove.mp3" autoplay preload="auto"
           style="width:200px;height:40px;position:absolute;top:1px" controls="controls"></audio>

    <script src="{{$js_src}}jquery.3.4.1.js"></script>
    <script src="{{$js_src}}all.min.js"></script>
    <script src="{{$js_src}}love.min.js"></script>
@stop
