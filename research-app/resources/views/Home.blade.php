<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/Index.css')}}">
    <title>E-market</title>
</head>
<body>
   <x-header />
   <main>

   </main>

   <footer>
    <div class="address">
        <ul>
            <li>Jl.Jalur Sutera Bar. No.Kav</li>
            <li>21, RT.001/RW.004</li>
            <li>Kota Tangerang</li>
            <li>Banten 15143</li>
        </ul>

        <div class="copyright">
            <div class="copy-logo">
                <img src="{{asset('images/copyright.svg')}}">
            </div>
            {{date("Y")}}E-market
        </div>
    </div>

    <div class="footer-link">
        <ul>
            <li>Forum</li>
            <li>Marketplace</li>
        </ul>
    </div>

    <div class="contacts">
        <p>Contacts</p>
            <ul class="contact-list">
                <li><img src="{{asset('images/instagram.svg')}}"></li>
                <li><img src="{{asset('images/twitter.svg')}}"></li>
                <li><img src="{{asset('images/facebook.svg')}}"></li>
                <li><img src="{{asset('images/linkedIn.svg')}}"></li>
               
            </ul>
    </div>

   </footer>
    
</body>
</html>