<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{setting('site.title')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="{{setting('site.description')}}"/>
    <link rel="shortcut icon" type="image/png"  href="{{ Voyager::image(setting('site.logo')) }}"/>
    <link href={{asset("assets/css/bootstrap.css")}} rel="stylesheet">
    <link href={{asset("assets/css/master.css")}} rel="stylesheet">
    <script src={{asset("assets/js/JQUERY.js")}}></script>
    <script src={{asset("assets/js/BOOTSTRAP.js")}}></script>
    <script src={{asset("assets/js/ajax.js")}}></script>
    @yield('style')
</head>
<body>

@include('header')

@yield('content')

@include('footer')

<script src={{asset("assets/js/master.js")}}></script>
<script src={{asset("assets/js/dropdown.js")}}></script>
@yield('script')

</body>
</html>


