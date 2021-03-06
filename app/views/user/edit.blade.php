<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>编辑用户</title>
    {{HTML::script('js/jquery.js')}}
     {{HTML::script('js/navbar.js')}}
    {{HTML::style("css/index.css")}}
    <script>
         $(function(){
                       //点击提示框消失
                           $(".success").click(function(){
                               $(this).fadeOut(2000);
                           });

                            $(".error").click(function(){
                                                  $(this).fadeOut(2000);
                                              });

                   })
    </script>
</head>
<body>
    <div class="main">
       <div class="top_nav">
                       <div class="top_nav_l"> <b class="index"></b>网站后台 <span>/</span><a href="/articles">首页</a><span>/</span>用户主页</div>
                       <div class="top_nav_r">{{Auth::user()->username}}  {{link_to_route('logout','退出')}}</div>
                       <div style="clear:both"></div>
       </div>

         @if(Session::has('error'))
               <div class="error">
                   {{Session::get('error')}}
               </div>
               @endif
          @if(Session::has('message'))
                        <div class="success">
                            {{Session::get('message')}}
                        </div>
                        @endif

        @include('navbar')
        <div class="content">
                 <div class="form home">
                  <h3>用户信息：</h3>

                     {{Form::open(array('url'=>'user/postEdit','method'=>'post'))}}
                             <p class="input_txt"> <span>{{Form::label('昵称：')}}</span> {{Form::text('nickname',$info->nickname)}}</p>
                              <p class="input_txt say"> <span>{{Form::label('desc','描述：')}}</span> {{Form::textarea('say',$info->say)}}</p>
                             <div>
                                 {{Form::submit('编辑',array('class'=>'btn'))}}
                             </div>
                              <div class="clear"></div>
                         {{Form::close()}}


                 </div>
        </div>

    </div>
</body>
</html>