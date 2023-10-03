<!doctype html>
<html lang="de" class="h-full">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{config('seo.title')}}</title>
<meta property="og:title" content="{{config('seo.title')}}">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:site_name" content="{{config('seo.title')}}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
@vite('resources/js/app.js')
@vite('resources/css/app.css')
</head>
<body>
<main role="main" class="flex h-full justify-center items-center">
  <div 
    class="text-white font-bold text-md md:text-lg lg:text-xl leading-none w-[310px] md:w-[450px] lg:w-[900px] is-hidden text-left"
    data-counter-wrapper>
    <span>BF&thinsp;/&thinsp;45:</span>
    <span class="font-semibold" data-counter></span>
  </div>
</main>
</body>
<!-- made with ❤ by wbg.ch & marceli.to -->
</html>