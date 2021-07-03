@extends('layouts.header')
@section('title')
    <title>个人主页{{env('WEB_TITLE')}}</title>
@endsection

@section('cssjs')
    <link href="/lib/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/my.css?t=1.11" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- 头部条 start -->
{{--<div class="fixed_bar_top">--}}
    {{--<header class="header_bar bgc_grey relative">--}}
        {{--<a href="javascript:history.go(-1);" class="btn_back"><i></i></a>--}}
        {{--<h1 class="cat">个人主页</h1>--}}
    {{--</header>--}}
{{--</div>--}}
<!-- 头部条 end -->

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
    <!-- 没有简介就隐藏按钮 -->
    @if(mb_strlen($user->introduction,'UTF8')>50)
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
        <a href="/user/center/1.html" class="d-in-black f26 color_gray999 fz">课程</a>
        <a href="/user/center/2.html" class="d-in-black f30 color_333 fz bold">图文</a>
        <!-- <a href="/user/center/3.html" class="d-in-black f26 color_gray999 fz">直播</a> -->
    </div>
    <!--列表 start-->
    @if($list->count())
    <div class="list-art bgcolor_fff plr30" id="list">
        <ul>
            @foreach($list as $article)
            <li class="pt30 pb30">
                <a href="/article/detail/{{$article->id}}.html">
                    <dl class="clearfix relative">
                        <dt class="border-radius-img"><img src="{{env('IMG_URL')}}{{$article->cover_url}}" alt="" />
                            @if($article->state == 2)
                                <span class="color_fff">待审核</span>
                            @endif
                        </dt>
                        <dd>
                            <h3 class="lt f30 color_333 text-overflow2 text-overflow">{{$article->title}}</h3>
                            <div class="weui-cells nobefore noafter padd$articleing0 art-list-title mt0">
                                <div class="weui-cell nobefore noafter padding0 mt10">
                                    <div class="weui-cell__hd">
                                        @if($article->author)
                                            @if(strpos($article->author->avatar,'http') !== false)
                                                <img src="{{$article->author->avatar}}" class=" border-radius50">
                                            @else
                                                <img src="{{env('IMG_URL')}}{{$article->author->avatar}}" class=" border-radius50">
                                            @endif
                                        @else
                                            <img src="" class=" border-radius50"/>
                                        @endif
                                    </div>
                                    <div class="weui-cell__bd f28 fz color_gray666 ">
                                        <p>{{$article->author?$article->author->name:''}}</p>
                                    </div>
                                </div>
                                <div class="weui-cell nobefore noafter padding0">
                                    <div class="weui-cell__bd">
                                        <p class="color_gray9b f22 fz">{{date('Y.m.d',strtotime($article->updated_at))}}</p>
                                    </div>
                                    <div class="weui-cell__ft fz f20 color_gray9b yudu-img">
                                        <span class=""><img src="/images/icon-xiao-xihuan.png" alt="">{{$article->likes}}</span>
                                        <span class="pl20"><img src="/images/icon-xiao-yuedu.png" alt="">{{$article->views}}</span>
                                    </div>
                                </div>
                            </div>
                        </dd>
                    </dl>
                </a>
            </li>
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
        <div class="weui-loadmore more text_center fz ptb30 remove_attr " id="study_more">
            <!-- <i class="weui-loading"></i> -->
            <span class="weui-loadmore__tips "  data-is_ture='1'>暂无文章</span>
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
        var data = {type:2,page:page};
        $.ajax({
            url:'/userCenter/addMore',
            data:data,
            type:'GET',
            dataType:'json',
            success:function(res){
                if(res.code == 0){
                    page = page+1;
                    $("#list ul").append(res.body);
                }else{
                    $('.seach_more_class').text(res.msg);
                }
            }
        });
    });
</script>
@endsection
