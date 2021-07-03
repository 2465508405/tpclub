@extends('layouts.header')
@section('title')
    <title>个人主页{{env('WEB_TITLE')}}</title>
@endsection

@section('cssjs')
    <link href="/lib/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/my.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<!-- 用户登录头像信息 start -->
<div class="weui-cells photo_info bgc_white logged">
    <div class="weui-cell">
        <div class="weui-cell__bd">
            <a href="baseinfo.html" class="user_photo">
                @if($user->avatar)
                    @if(strpos($user->avatar,'http') !== false)
                        <img src="{{$user->avatar}}" alt="" />
                    @else
                        <img src="{{env('IMG_URL')}}{{$user->avatar}}" alt="" />
                    @endif
                @else
                    <img src="/images/my/nophoto.jpg" alt="" />
                @endif
            </a>
            <ul class="info">
                <li>{{$user->nickname ? $user->nickname : $user->name}} <img src="/images/my/ico_nan.png" alt="" /></li>
                <li class="fans">
                    <span>{{$follows}}关注</span>
                    <span>{{$fans}}粉丝</span>
                    <span>{{$powders}}互粉</span>
                </li>
            </ul>
        </div>

    </div>
</div>
<!-- 用户登录头像信息 end -->

<!-- 简介 start -->
<div class="bgc_white jianjieCon">
    <p class="h40">{{$user->introduction ? $user->introduction : '暂无简介'}}</p>
    <p class="h40">手机号：{{$user->mobile ? $user->mobile : "暂无"}}</p>
    <!-- 没有简介就隐藏按钮 -->
    @if(mb_strlen($user->introduction,'UTF8')>20)
        <i class="arrowBtn"></i>
    @endif
</div>
<!-- 简介 end -->

<!-- 编辑按钮 start -->
<div class="weui-cells bgc_white nobefore noafter">
    <div class="weui-cell">
        <a href="/user/edit" class="weui-btn bgc_yellow grey editBtn"><img src="/images/my/ico_bianji.png" />编辑个人资料</a>
    </div>
</div>
<!-- 编辑按钮 end -->

<!-- 课程 start -->
<div class="mt10">
    <div class="tab_class pt40 pb30 text_center mb10 bgcolor_fff plr20">
        <a href="/user/center/1.html" class="d-in-black color_333 f30 fz bold">课程</a>
        <a href="/user/center/2.html" class="d-in-black f26 color_gray999 fz">图文</a>
        <!-- <a href="/user/center/3.html" class="d-in-black f26 color_gray999 fz">直播</a> -->
    </div>
    <!--列表 start-->
    @if($list->count())
    <div class="list plr30 bgcolor_fff" id="list">
        <ul>
            @foreach($list as $course)
            <a href="/course/detail/{{$course->id}}.html">
                <li class="ptb30">
                <dl class="clearfix">
                    <dt class="border-radius-img"><img src="{{env('IMG_URL')}}{{$course->cover_url}}" alt="{{$course->title}}" /><span class="bgcolor_orange text_center fz color_333">{{$course->level}}</span></dt>
                    <dd>
                        <h3 class="lt f30 text-overflow">{{$course->title}}</h3>
                        <p class="fz color_gray666 f24">{{$course->sum_course}} 节课·{{$course->sum_study}} 人正在提高中</p>
                        <!--<p class="fz color_gray999">Jane King 导师</p>-->
                        <div class="weui-cells fz color_gray666 noafter mt0 nobefore">
                            <div class="weui-cell">
                                <div class="weui-cell__bd">
                                    <p class="f22">{{$course->name}} 导师</p>
                                </div>
                                @if($course->is_free)
                                    @if($course->sum_course || $course->preview == 0)
                                    <div class="weui-cell__ft color_orange bold f28 color_red">￥{{$course->price}}</div>
                                    @else
                                        <div class="weui-cell__ft color_orange bold f28 color_red">可试看</div>
                                    @endif
                                @else
                                    <div class="weui-cell__ft color_orange bold f28">免费</div>
                                @endif
                            </div>
                        </div>

                        <div class="text_center fz">
                            <!-- Swiper -->
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php
                                        echo  htmlspecialchars_decode($course->tags)
                                    ?>
                                </div>
                            </div>
                        </div>
                    </dd>
                </dl>
            </li>
            </a>
            @endforeach
        </ul>
    </div>
    <!--列表 end-->

    <!--加载更多-->
    <div class="weui-loadmore more text_center fz ptb30 remove_attr " id="study_more">
            <!-- <i class="weui-loading"></i> -->
            <span class="weui-loadmore__tips seach_more_class" id ="add_more"  data-is_ture='1'>加载更多</span>
    </div>
    @else
        <div class="weui-loadmore more text_center fz ptb30">
            <!-- <i class="weui-loading"></i> -->
            <span class="weui-loadmore__tips">暂无课程信息</span>
        </div>
    @endif
    {{--<div class="bgcolor_fff ptb30">--}}
        {{--<div class="weui-loadmore more text_center fz">--}}
            {{--<i class="weui-loading"></i>--}}
            {{--<span class="weui-loadmore__tips">正在加载</span>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
<!-- 课程 end -->
<script src="/lib/jqweui/js/jquery-2.1.4.js"></script>
<script src="/lib/jqweui/js/fastclick.js"></script>
<script>
    $(function() {
        FastClick.attach(document.body);
    });
</script>
<script src="/lib/jqweui/js/jquery-weui.min.js"></script>
<script src="/lib/layer/layer.js"></script>
<script src="/lib/swiper/swiper.min.js"></script>
<script src="/js/js.js"></script>
<script>
    $('.jianjieCon').click(function (){
        $(this).find('p').toggleClass("h40");
        $(this).find('.arrowBtn').toggleClass("up");
    })
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        leftedSlides: true,
        spaceBetween: 10,
        grabCursor: true
        // freeMode: true
    });
    var page = 2;
    $('#add_more').click(function(){
        var data = {type:1,page:page};
        $.ajax({
            url:'/userCenter/addMore',
            data:data,
            type:'GET',
            dataType:'json',
            success:function(res){
                if(res.code == 0){
                    page = page+1;
                    if(res.body ==''){
                        $('.seach_more_class').text('暂无课程信息');
                    }else{
                        $("#list ul").append(res.body);
                    }
                }else{
                    $('.seach_more_class').text(res.msg);
                }
            }
        });
    });
</script>
<script>

</script>
@endsection