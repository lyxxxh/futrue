    @extends('futrue.layouts.app')

    @section("content")
        <div class="content">

            <div class="container-fluid">
                <div class="row-fluid">

                    <div class="span12">

                        <div class="well login-register">

                            <h5>登录</h5>
                            <hr />

                            <!-- Login form -->
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}


                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                                <div class="futrue-form">
                                    <label class="futrue-input" for="name"></label>
                                    <div class="futrue-form">
                                        <input type="text" id="inputEmail" class="futrue-input" name="name" placeholder="邮箱/账号" value="{{ old('name') }}" required autofocus>

                                    </div>
                                </div>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif

                            <!-- Password -->
                                <div class="futrue-from">
                                    <label class="future-input" for="inputPassword"></label>
                                    <div class="futrue-from" class="futrue-input">
                                        <input type="password" id="inputPassword" name="password"  placeholder="密码"  name="password" class="futrue-input" >
                                    </div>
                                </div>

                                <div id="c1" name="lmx"></div>


                                <!-- Remember me checkbox and sign in button -->
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> 记住我
                                        </label>
                                        <br>
                                        <button type="submit" class="btn btn-inverse">登录</button>
                                    </div>

                                </div>
                                <input type="hidden" name="token" value="" id="tokenfutrue">
                            </form>
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                忘记密码?
                            </a>
                            <a href="{{route('register')}}" class="btn btn-link">还没有账号</a>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="clearfix"></div>
        <script src="https://cdn.dingxiang-inc.com/ctu-group/captcha-ui/index.js"></script>

        <script>
            var myCaptcha = _dx.Captcha(document.getElementById('c1'), {
                appId: '9eb369e65c776c2f3bfaef1d944b3e2a',   //appId,开通服务后可在控制台中“服务管理”模块获取
                success: function (token) {
                    console.log('token:', token);
                    document.getElementById("tokenfutrue").value=token;
                }
            })

        </script>

    @endsection
