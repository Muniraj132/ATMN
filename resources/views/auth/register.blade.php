@php 
use App\Models\district;
$district_name = district::all();
@endphp
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ATMN RECRUITMENT- REGISTER</title>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	    <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" /> -->
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
        ion-icon {
         pointer-events: none;
        }
        .form-check-input:checked[type=checkbox] {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
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
        <div class="md:flex" >
            <div class="hidden lg:flex items-center justify-center bg-indigo-100 flex-1 ">
                <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
                    <a href="{!! URL::to('/') !!}">
                        <img src="{{asset('assets/img/alliance-logo.png')}}">
                        <img src="{{asset('assets/img/ATMNRecuritment.png')}}">
                    </a>
                </div>
            </div>
            <div class="lg:w-1/2 xl:max-w-screen-sm" >
                <div class="mt-5 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-8 xl:px-24 xl:max-w-2xl">
                    <h2 class="text-center text-4xl font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold text-color">{{ __('Register') }}</h2>
                    <div class="mt-12">
                        <form method="POST" action="{{ route('register') }}">
                             @csrf
                            <div class="mt-3">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Username <span data-tooltip-target="tooltip-default1"><ion-icon name="information-circle"></ion-icon></span>
                                    <div id="tooltip-default1" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                        At least 8 characters, no spaces.
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>

                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 @error('username') is-invalid @enderror" id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert" style="font-size: 14px;">
                                        <strong style="color:Red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                                <input id="email" type="email" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="font-size: 14px;">
                                        <strong style="color:Red">{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mt-3">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        {{ __('Password') }}
                                    </div>
                                </div>
                                <input id="password" type="password" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="font-size: 14px;">
                                        <strong style="color:Red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        {{ __('Confirm Password') }}
                                    </div>
                                </div>
                                <input id="password-confirm" type="password" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" name="password_confirmation" required autocomplete="new-password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="font-size: 14px;">
                                        <strong style="color:Red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="mt-2 text-sm font-display font-semibold text-gray-700">
                               <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-red-800 checked:border-gray-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="Y" id="flexCheckChecked" name="requestforstaff"> <span>Request a District Staff or National Staff Account  </span>
                               <span data-tooltip-target="tooltip-default2"><ion-icon name="information-circle"></ion-icon></span>

                                <div id="tooltip-default2" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                    Allow two business days for approval.
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            
                            <div class="mt-3 dist-select" style="display:none">
                                <br>
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        District
                                    </div>
                                </div>
                                <select id="district" name="requeststaffdistrict" class="w-full text-sm py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500">
                                    <option value ="">Choose a District</option>
                                    @foreach($district_name as $value)
                                    <option value="{{$value->d_id}}">{{$value->district}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mt-4">
                                <button class="signin-button text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline
                                shadow-lg" type="submit">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </form>
                        <div class="mt-4 text-sm font-display font-semibold text-gray-700 text-center">
                            Do you have an account ? <a class="text-color" href="{{ route('login') }}">Sign In</a>
                        </div>
                        <br>
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
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#flexCheckChecked').on('change',function() {
        if(this.checked) {
            $('div.dist-select').removeAttr('style','display:none');
        }else{
            $('.dist-select').attr('style','display:none');
        }
    });
  </script>

