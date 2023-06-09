<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>E-market</title>
</head>
<body class="bg-mainBg h-[100%] min-h-[100vh] flex flex-col">
    <nav class="flex flex-row justify-between py-[2vw] px-[5.6vw] text-mainTextColor">
        <div class="font-semibold text-[24px] cursor-default">E-market</div>
        <div class="link-container">
            <ul class="flex gap-[5vw] font-semibold text-[18px] cursor-pointer">
                <li><a class="nav-link" href="{{route('Home')}}">Home</a></li>
                <li><a href="{{route('Marketplace')}}" class="nav-link">Marketplace</a></li>
                @guest
                <li><a class="nav-link" href="{{route('SignIn')}}">Sign In</a></li>
                <li><a class="nav-link" href="{{route('SignUp')}}">Sign Up</a></li>
                @else
                    <li><a class="nav-link" href="{{route('SellProduct')}}">Sell your product</a></li>
                    <li><a href="{{route('cart.index')}}"><img src="{{ asset('images/cart.svg') }}"></a></li>
                    <li><a href="{{route('Profile')}}"><img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/placeholder.png') }}" class="h-[39px] w-[39px] object-cover rounded-full">
                    </a></li>
                @endguest
            </ul>
        </div>
    </nav>

<div class="flex-1">
    {{$slot}}
</div> 

<footer class="relative left-0 bottom-0 w-[100%] h-[12vw] bg-footerColor text-formColor py-[2vw] px-[5.6vw] flex flex-row justify-between">
    <div class="address">
        <ul class="font-medium">
            <li>Jl.Jalur Sutera Bar. No.Kav</li>
            <li>21, RT.001/RW.004</li>
            <li>Kota Tangerang</li>
            <li>Banten 15143</li>
        </ul>

        <div class="flex font-medium">
            <div class="copy-logo">
                <img class="h-[0.8vw]" src="{{asset('images/copyright.svg')}}">
            </div>
            {{date("Y")}}E-market
        </div>
    </div>

    <div>
        <ul class="font-semibold">
            <li>Forum</li>
            <li>Marketplace</li>
        </ul>
    </div>

    <div class="flex flex-col font-semibold">
        <p>Contacts</p>
            <ul class="flex flex-row gap-5">
                <li><img src="{{asset('images/instagram.svg')}}"></li>
                <li><img src="{{asset('images/twitter.svg')}}"></li>
                <li><img src="{{asset('images/facebook.svg')}}"></li>
                <li><img src="{{asset('images/linkedIn.svg')}}"></li>
               
            </ul>
    </div>

   </footer>
    
</body>
</html>