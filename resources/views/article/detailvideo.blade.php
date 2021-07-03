@extends('layouts.header')
@section('title')
    <title>{{$article->title}}{{env('WEB_TITLE')}}</title>
    <meta name="description" content="{{$article->description}}" />
@endsection

@section('cssjs')
    <link rel="stylesheet" href="/css/article.css">
    <style>
    	#page {padding-bottom:3rem;}
    	video::-internal-media-controls-download-button {
    display: none;
}
    </style>
    <!-- 熊掌号搜索出图20181114海洋 -->

    <script type="application/ld+json">
        {
            "@context": "https://ziyuan.baidu.com/contexts/cambrian.jsonld",
            "@id": "http://m.saipubbs.com/article/detail/{{$article->id}}.html",
            "appid": "1615100668980398",
            "title": "{{$article->title}}",
            "images": [
                "{{env('IMG_URL')}}{{$article->cover_url}}"
            ], //请在此处添加希望在搜索结果中展示图片的url，可以添加1个或3个url
            "pubDate": "{{substr($article->created_at,0, 10)}}T{{substr($article->created_at,-8)}}" // 需按照yyyy-mm-ddThh:mm:ss格式编写时间，字母T不能省去
        }
    </script>

@endsection
@section('content')	
<div id="page"><!--导航大盒子id=page 开始  【结束在最底部】-->


	<div class="plr30"><!--边距30 开始-->

		<!--大图 start-->
		<!-- <div class="max-img border-radius-img relative">
			<img src="" alt="" />
			<img class="icon-new-hot" src="/images/icon-new.png" alt="">
			<img class="icon-bofang" src="/images/bofang.png" alt="">
		</div> -->
		{{--<video src="{{$article->video_url}}" controls="controls" controlsList="nodownload"  style="width:100%;height:200px;" controls="" x5-playsinline="" playsinline="" webkit-playsinline="" poster="" preload="auto" autoplay="autoplay" x5-video-player-type="h5" x5-video-player-fullscreen="true" x5-playsinline="playsinline" playsinline="playsinline">--}}
				{{--您的浏览器不支持 video 标签。--}}
		{{--</video>--}}
		<div class="prism-player" id="player-con" style="width:100%;height:200px;"></div>
		{{--<div id="video" style="width:100%;height:200px;"></div>--}}
		<div class="art-detail pt30">
			<!--头部文章标题-->
			<h1 class="f44 lt">{{$article->title}}</h1>
			<div class="weui-cells noafter nobefore mt0 art-list-title pb30">
				<div class="weui-cell padding0">
					<div class="weui-cell__bd fz f20 color_gray999 yudu-img">
						<span class="f24 d-in-black mr20">{{$article->created_at}}</span>
						<span class="d-in-black pl20 "><img src="/images/icon-xiao-xihuan.png" alt="">{{$article->likes}}</span>
						<span class="pl20"><img src="/images/icon-xiao-yuedu.png" alt="">{{$article->views}}</span>
					</div>
				</div>
			</div>

		</div>



		<!--文章本章没错了 start-->
		<div class="art-detail-detail-wrap">
			<div class="art-detail-detail-cont text-jus text-indent2 f30 color_333 fz">
				<?php
                  echo  htmlspecialchars_decode($article->content)
                ?>
			</div>
		</div>
		<!--文章本章没错了 end-->



		<!--文章下标签没错了 start-->
		<div class="art-detali-tag fz solidtop1px pt30 pb20 mt30">
			@foreach($tags as $tag)
			<a class="bgcolor_gray border-radius-img f24 color_gray666" href="/article/tag/{{$tag}}.html">{{getTagTitle($tag)}}</a>
			@endforeach
		</div>
		<!--文章下标签没错了 end-->

		<div class="weui-cells noafter nobefore mt0 art-det-con1 pb30">
			<a class="weui-cell weui-cell_access padding0 mtb15" href="javascript:;">
				<div class="weui-cell__hd border-radius50" onclick="window.location.href='/user/teacher/{{$article->author->id}}/1.html'">
					@if($article->author->avatar)
						@if(strpos($article->author->avatar,'http') !== false)
							<img src="{{$article->author->avatar}}" class="border-radius50" />
						@else
							<img src="{{env('IMG_URL')}}{{$article->author->avatar}}" alt="头像" class="border-radius50" />
						@endif
					@else
					<img class="border-radius50" src="/images/my/nophoto.jpg" alt="头像" class="border-radius50" />
					@endif
				</div>
				<div class="weui-cell__bd f32 color_000 lt">
					<p>{{$article->author->name}}</p>
				</div>
				@if($article->is_follow)
				<div class="art-det-but bgcolor_orange f28 color_333 border-radius-img" data-user_id="{{$article->user_id}}" data-fans_id='{{$user_id}}' onclick="article_follow(this)" data-is_follow='1' id="article{{$article->id}}" >已关注</div>
				@else
				<div class="art-det-but bgcolor_orange f28 color_333 border-radius-img" data-user_id="{{$article->user_id}}" data-fans_id='{{$user_id}}' onclick="article_follow(this)" data-is_follow='0' id="article{{$article->id}}" >关注</div>
				@endif
			</a>
		</div>

	</div><!--边距30 结束-->

	<!--我是灰色的线-->
	<div class="solidtop20"></div>


	<!--小图list-->
	<div class="plr30"><!--边距30开始-->

		<div class="weui-cells nobefore noafter">
			<div class="weui-cell left0 padding0">
				<div class="weui-cell__bd">
					<h2 class="f30 bold pb30">相关内容</h2>
				</div>
			</div>
		</div>

		<div class="list-art">
			<ul>
				@if($abouts->count())
				@foreach($abouts as $about)
				<li class="pt30 pb30">
					<a href="/article/detail/{{$about->id}}.html">
						<dl class="clearfix relative">
							<dt class="border-radius-img">
								<img src="{{env('IMG_URL')}}{{$about->cover_url}}" />
								@if($about->is_selected)
									<img class="icon-new-hot" src="/images/icon-hot.png" />
								@else
									@if(article_isnew($article->created_at))
										<img class="icon-new-hot" src="/images/icon-new.png" />
									@endif
								@endif
								@if($about->is_video)
									<img class="icon-bofang" src="/images/bofang.png" />
								@endif
							</dt>
							<dd>
								<h3 class="lt f30 color_333 text-overflow2">{{$about->title}}</h3>
								<div class="weui-cells nobefore noafter padding0 art-list-title mt0">
									<div class="weui-cell nobefore noafter padding0 mt20">
										<div class="weui-cell__hd border-radius50">
											@if($about->author)
												@if(strpos($about->author->avatar,'http') !== false)
													<img src="{{$about->author->avatar}}" class="border-radius50" />
												@else
													<img src="{{env('IMG_URL')}}{{$about->author->avatar}}" alt="头像" class="border-radius50" />
												@endif
											@else
											<img src="/images/my/nophoto.jpg" alt="头像" class="border-radius50" />
											@endif
										</div>
										<div class="weui-cell__bd f28 fz color_gray666 ">
											@if($about->author)
											<p>{{$about->author->name}}</p>
											@else
											<p>暂无</p>
											@endif
										</div>
									</div>

									<div class="weui-cell nobefore noafter padding0">
										<div class="weui-cell__bd mt10">
											<p class="color_gray9b f22 fz">{{substr($about->created_at,0, 10)}}</p>
										</div>
										<div class="weui-cell__ft fz f20 color_gray9b yudu-img">
											<span class=""><img src="/images/icon-xiao-xihuan.png">{{$about->likes}}</span>
											<span class="pl20"><img src="/images/icon-xiao-yuedu.png">{{$about->views}}</span>
										</div>
									</div>
								</div>
							</dd>
						</dl>
					</a>
				</li>
				@endforeach
				@endif
			</ul>
		</div>
	</div><!--边距30结束-->
	<!--小图 end-->

	<!--我是灰色的线-->
	<div class="solidtop20"></div>

	<div class="plr30"><!--边距30 开始-->

		<!-- 课程评价 start -->
		<!-- 文章评价列表 start -->
		<div class="page_evaluate bgc_white">
			<!-- 文章评价列表 start -->
			<div class="weui-cells nobefore  ">

				<div class="weui-cell left0 padding0 " id="head" >
					<div class="weui-cell__bd">
						<h2 class="f30 bold">评价</h2>
					</div>
				</div>
				@if($comments->count())
					@foreach($comments as $comment)
					<div class="weui-cells pt30 pb30">
						<div class="weui-cell evaluate padding0" data-id="1">
							<div class="weui-cell__bd">
								<a href="javascript:;" class="user_photo">
									<!-- <img src="/images/xy.png" alt="" class="img100"> -->
									@if(strpos($comment->author->avatar,'http') !== false)
		                            <img class="border-radius50" src="{{$comment->author->avatar}}">
		                            @else
		                            <img class="border-radius50" src="{{env('IMG_URL')}}{{$comment->author->avatar}}">
		                            @endif
								</a>
								<dl>
									<dt>{{$comment->user_name}}</dt>
									<dd class="fz">{{App\Constant\CommentDate::getDate($comment->created_at)}}</dd>
								</dl>
								<p class="fz text-jus">{{$comment->content}}</p>
							</div>
						</div>
					</div>
					@endforeach
				@endif
			</div>
			<!-- 文章评价列表 end -->
		</div>


		@if($comments->count())
		<div class="text_center art-quanbu fz f26 color_gray666 mt30"><a href="/article/comment/{{$article->id}}.html">查看全部评价</a></div>
		@endif

		<!--未评价=============================================================================-->
		<!--课程未评价 start-->
		@if(!$comments->count())
		<div class="start_weipingjia text_center">
			<div class="color_c9c7c7 fz f24 mt30 pt40">
				<img src="/images/shafa.png" alt="">
				<p class="mb40 pt10 pb30">沙发还没有人坐，请发言</p>
			</div>
		</div>
		@endif
		<!--课程未评价 end-->
	</div><!--边距30 结束-->




<!--悬浮评价底部-->
<div class="art-footer">
	<ul class="clearfix text_center">
		<li class="bgcolor_orange fz f34 color_333">
			@if($mobile==0)
			<a href="javascript:;" class="open-popup" onclick="userlogin()">谈谈你的看法</a>
			@else
			<a href="javascript:;" class="open-popup" data-target="#full">谈谈你的看法</a>
			@endif
		</li>

		@if($mobile==0)
			<li class="fz f20" onclick="userlogin()"></li>
			<li class="fz f20" onclick="userlogin()"></li>
		@else
			@if(article_is_like($article->id, $user_id))
			<li class="fz f20 check2" style="background:url(/images/art-like.png)no-repeat top center;background-size:50%;background-color:#f9f9f9" article_like="1"></li>
			@else
			<li class="fz f20 check2" article_like="0"></li>
			@endif

			@if(article_is_collect($article->id, $user_id))
			<li class="fz f20 check" style="background:url(/images/art-sc.png)no-repeat top center;background-size:50%;background-color:#f9f9f9" article_collect="1"></li>
			@else
			<li class="fz f20 check" article_collect="0"></li>
			@endif
		@endif	

	</ul>
</div>

</div><!--导航大盒子id=page 结束-->


<div id="full" class='weui-popup__container bgc_white page_evaluate_form zindex6ge9'>
	<div class="weui-popup__overlay"></div>
	<div class="weui-popup__modal bgc_white">
		<!-- 头部条 start -->
		<header class="header_bar max640 bgc_white relative">
			<a href="javascript:;" class="btn_back close-popup fz bold">取消</a>
			<h2 class="cat1 lt">文章评论</h2>
			<a href="javascript:void(0)" class="btn_link btn_submit fz bold">提交</a>
		</header>
		<!-- 头部条 end -->
		<div class="textareaBox">
			<textarea class="fz text-jus" placeholder="请发表您的评论..." id="content"></textarea>
		</div>
	</div>
</div>

<br><br>


<script src="/lib/jqweui/js/fastclick.js"></script>
<!-- <script src="/js/jweixin-1.4.0.js"></script> -->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
	var token1   = '{{csrf_token()}}';
	wx.config({
		debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
		appId: "{{$WechatShare['appId']}}", // 必填，公众号的唯一标识
		timestamp: "{{$WechatShare['timestamp']}}", // 必填，生成签名的时间戳
		nonceStr: "{{$WechatShare['noncestr']}}", // 必填，生成签名的随机串
		signature: "{{$WechatShare['signature']}}",// 必填，签名
		jsApiList: [
			'checkJsApi',
			'onMenuShareTimeline',
			'onMenuShareAppMessage',
		] // 必填，需要使用的JS接口列表
	});
	<?php
		$content = explode(PHP_EOL,$article->seo_description);
		$art = '';
		foreach($content as $cont){
			$art .= trim($cont);
		}
	?>
	wx.ready(function () {   //需在用户可能点击分享按钮前就先调用
		wx.onMenuShareAppMessage({ 
			title: '{{$article->title}}', // 分享标题
			desc: '{{$art}}', // 分享描述
			link: "http://m.saipubbs.com/article/detail/{{$article->id}}.html?fission_id={{$user_id}}", // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
			imgUrl: "{{env('IMG_URL')}}{{$article->cover_url}}", // 分享图标
			success: function(){
				
				/*----分享获得赛普币start----*/
				$.ajax({
					type:"POST",
					url:"/article/spbArticle",
					data:{userid:"{{$user_id}}",article_id:"{{$article->id}}", _token:token1},
					dataType:"json",
					success:function(result){
						//alert(result);
					}
				});
				/*----分享获得赛普币end----*/
			}
		}, function(res) { 
			//这里是回调函数
			
		}); 
	});
	wx.ready(function () {      //需在用户可能点击分享按钮前就先调用
		wx.onMenuShareTimeline({ 
			title: '{{$article->title}}', // 分享标题
			link: "http://m.saipubbs.com/article/detail/{{$article->id}}.html?fission_id={{$user_id}}", // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
			imgUrl: "{{env('IMG_URL')}}{{$article->cover_url}}", // 分享图标
			success: function(){
				
				/*----分享获得赛普币start----*/
				$.ajax({
					type:"POST",
					url:"/article/spbArticle",
					data:{userid:"{{$user_id}}",article_id:"{{$article->id}}", _token:token1},
					dataType:"json",
					success:function(result){
						//alert(result);
					}
				});
				/*----分享获得赛普币end----*/
			}
		}, function(res) { 
		//这里是回调函数
			
		}); 
	});
</script>
<script>
	//将裂变者id写入本地  用于存储上下级关系
	var fission_id = "{{$fission_id}}";
    if(fission_id>0){
        localStorage.setItem("fission_id", fission_id);
    }
	console.log(localStorage.getItem('fission_id')+"是否是裂变者");
	console.log("article{{$article->id}}"+"channel");
	//将注册来源页面写入存储
    localStorage.setItem("channel", "article{{$article->id}}");
	
</script>
<script>
	var user_id = "{{$user_id}}";
	var article_id = "{{$article_id}}";
	//跳转登陆函数
	var userlogin = function(){
		var url = "/article/detail/"+article_id+".html";
		layer.msg('请先注册');
		localStorage.setItem("redirect", url);
		setTimeout(function(){
			window.location.href = "/register";
		}, 500)
	}
	//关注取消关注
	function article_follow(e){
		var fans_id = e.getAttribute("data-fans_id");
		var user_id = e.getAttribute("data-user_id");  
		var articleid  = e.getAttribute("id"); 
		var is_follow = e.getAttribute("data-is_follow");
		var token   = '{{csrf_token()}}';
		var mobile = "{{$mobile}}";
		if(mobile<1){
			userlogin();  //跳转登陆
			return;
		}
		if(is_follow==0){
			$.ajax({
				type:"POST",
				url:"/user/followadd",
				data:{fans_id:fans_id, user_id:user_id, _token:token},
				dataType:"json",
				success:function(result){
					if(result.code==1){
						layer.msg('关注成功');
						document.getElementById(articleid).setAttribute('data-is_follow', 1);
						document.getElementById(articleid).innerHTML='已关注';
					}else{
						layer.msg(result.msg);
					}
	            }
			});
		}else{
			$.ajax({
				type:"POST",
				url:"/user/followcancel",
				data:{fans_id:fans_id, user_id:user_id, _token:token},
				dataType:"json",
				success:function(result){
					if(result.code==1){
						layer.msg('取消关注');
						document.getElementById(articleid).setAttribute('data-is_follow', 0);
						document.getElementById(articleid).innerHTML='关注';
					}else{
						layer.msg(result.msg);
					}
	            }
			});
		}
	}
	//给body加一个类
	$('body').addClass('page_evaluate_wrap');

	//提交评论内容
	//提交评论内容
	$('.btn_submit').click(function (){
		var con        =$('#content').val();
		var token      = '{{csrf_token()}}';
		var article_id = "{{$article->id}}";
		var user_id    = "{{$user_id}}";
		var avatar     = "{{$avatar}}";
		var user_name  = "{{$user_name}}";
		if(con.length==""){
			layer.msg('评论不能为空~');
			return;
		}

		var html='<div class="weui-cells pt30  noafter " data-id="1">' +
				'<div class="weui-cell evaluate padding0">'+
				'<div class="weui-cell__bd">'+
				'	<a href="#" class="user_photo"><img src="'+avatar+'" alt="" class="img100"></a>'+
				'	<dl>'+
				'		<dt>'+user_name+'</dt>'+
				'		<dd class="fz">1分钟前</dd>'+
				'	</dl>'+
				'	<p  class="fz text-jus">'+con+'</p>'+
				'</div>'+
				'</div>'+
				'</div>	';
		$('#head').after(html);

		var data = {user_id:user_id, _token:token, article_id:article_id, content:con};
        $.ajax({
            url:'/article/commentinsert',
            type:'POST',
            data:data,
            dataType:'json',
            success:function(res){
                if(res.code){
                	layer.msg(res.msg);
                	$.closePopup();
                
                }else{
                	layer.msg(res.msg);
                }
            }
        });
        return;
		//$.closePopup();//关闭弹出框
		//location.reload()

	})

	$(document).ready(function(){
		//收藏/取消收藏文章
		$(".check").click(function(){
			var article_collect = $(this).attr("article_collect");
			var token   = '{{csrf_token()}}';
			var article_id = "{{$article->id}}";
			var user_id    = "{{$user_id}}";
			//alert(article_collect);
			$.ajax({
				type:"POST",
				url:"/article/collect",
				data:{article_id:article_id, user_id:user_id, article_collect:article_collect, _token:token},
				dataType:"json",
				success:function(result){
					if(result.code==1){
						layer.msg(result.msg);
						if(article_collect == 0){
							$(".check").css({"background":"url(/images/art-sc.png)no-repeat top center","background-size":"50%","background-color":"#f9f9f9"});
							$(".check").attr("article_collect", 1);
						}else{
							$(".check").css({"background":"url(/images/art-no-sc.png)no-repeat top center","background-size":"50%","background-color":"#f9f9f9"});
							$(".check").attr("article_collect", 0);
						}
					}else{
						layer.msg(result.msg);
					}
	            }
			});
		})

		//喜欢/不喜欢课程
		$(".check2").click(function(){
			var article_like = $(this).attr("article_like");
			var token   = '{{csrf_token()}}';
			var article_id = "{{$article->id}}";
			var user_id    = "{{$user_id}}";
			$.ajax({
				type:"POST",
				url:"/article/like",
				data:{article_id:article_id, user_id:user_id, article_like:article_like, _token:token},
				dataType:"json",
				success:function(result){
					if(result.code==1){
						layer.msg(result.msg);
						if(article_like == 0){
							$(".check2").css({"background":"url(/images/art-like.png)no-repeat top center","background-size":"50%","background-color":"#f9f9f9"});
							$(".check2").attr("article_like",1);
						}else{
							$(".check2").css({"background":"url(/images/art-no-like.png)no-repeat top center","background-size":"50%","background-color":"#f9f9f9"});
							$(".check2").attr("article_like", 0);
						}
					}else{
						layer.msg(result.msg);
					}
	            }
			});
		})

	});

	/**/
  $(function() {
    FastClick.attach(document.body);
  });
</script>

<script type="text/javascript">
	window.onload = function(){
		menuFixed('nav_keleyi_com');
	}
</script>
<script src="/js/ckplayer/ckplayer.js"></script>
<script>
	var videoObject = {
		container: '#player-con',//“#”代表容器的ID，“.”或“”代表容器的class
		variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
		flashplayer:false,//如果强制使用flashplayer则设置成true
		//loaded:"loadHandler",
		autoplay:true,
		loop:true,
		poster:"{{env('IMG_URL')}}{{$article->cover_url}}",
		video:"{{$article->video_url}}"//视频地址
	};
	var player = new ckplayer(videoObject);	
</script>
@endsection