
 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ATMN RECRUITMENT- SIGN IN</title>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">



    </head>
    <style type="text/css">
        .login-page-title{
            font-family:"Avenir Next Georgian W03 Heavy";
            src:url("./fonts/6125010/5190e196-e58e-40ef-86db-2128109549d7.woff2") format("woff2"),url("./fonts/6125010/b0849c74-ea4d-49c2-9c55-b82427f87838.woff") format("woff");
            color: #939598;
            font-size:50px;
            margin: -20px;
        }
        .login-page-title-large{
            font-weight: bold;
        }
        .signin-button{
            background-color: #801214!important;
        }
        .signin-button: hover{
            border-color: none;
            background-color: #801214;
        }
        .text-color{
            color: #801214;
        }
        .text-color: hover{
            color: #801214!important;
        }
        .footer{
           background-color: #801214;
           color: #fff;
           font-size: 12px;
        }
        a: hover{
            color: #fff;
        }
        a.footer-hover:hover {
            color: #fff;
            text-decoration: none;
        }
    </style>
    <body>
        <nav class="bg-[#d8d9e1] border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-800">
          <div class="container flex flex-wrap justify-between items-center mx-auto">
              <a href="{!! URL::to('/') !!}" class="flex">
                <img src="{{ asset('assets/img/cmalliance/logo.png')}}" alt="" width="250">
              </a>
          </div>
        </nav>
        <div class="md:flex" style="height: 556px;">
            <div class="hidden lg:flex items-center justify-center bg-indigo-100 flex-1">
                <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
                    <a href="{!! URL::to('/') !!}"><img src="{{asset('assets/img/alliance-logo.png')}}">
                    <img src="{{asset('assets/img/ATMNRecuritment.png')}}"></a>
                </div>
            </div>
            <div class="lg:w-1/2 xl:max-w-screen-sm" style="padding-top: 30px;">
<!--                 <div class="py-4 bg-indigo-100 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                    <div class="cursor-pointer flex items-center">
                        <div class="text-2xl text-indigo-800 tracking-wide ml-2 font-semibold"><img src="{{ asset('assets/img/cmalliance/logo.png')}}"></div>
                    </div>
                </div> -->
                <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-8 xl:px-24 xl:max-w-2xl">
                    <h2 class="text-center text-4xl font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold text-color">Log in</h2>
                    <div class="mt-8">
                        <form  method="POST" action="{{ route('login') }}">
                             @csrf
                            <div class="mt-8">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Username</div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 @error('username') is-invalid @enderror" type="text" value="{{ old('username') }}" name="username"  required autocomplete="username" >
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:Red">{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mt-8">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        Password
                                    </div>
                                    <div>
                                        @if (Route::has('password.request'))
                                        <a class="text-xs font-display font-semibold text-color" href="{{ route('password.request') }}">
                                            Forgot Password?
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 @error('password') is-invalid @enderror" type="password"  id="password" type="password"  name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:Red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-8">
                                <button class="signin-button text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline
                                shadow-lg" type="submit">
                                    Log In
                                </button>
                            </div>
                        </form>
                        <div class="mt-8 text-sm font-display font-semibold text-gray-700 text-center">
                            Don't have an account ? <a class="text-color" href="{{ route('register') }}">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <footer>
            <div class="p-3 footer">
            © 2022
            <a class="footer-hover" href="https://cmalliance.org/">The Christian and Missionary Alliance</span></strong>. All Rights Reserved</a>
            <a class="footer-hover" href="#" style="Float: right;">Some material used by permission.</a>
           </div>

        </footer>
    </body>
</html>
<script src="https://cdn.tailwindcss.com"></script>
