<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    {{--Google Map API--}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2AMQmZkgxiKbrKbW0GPA-EiBhtWeTPkg&libraries=places"
            async defer></script>
    <link href="{{url('css/header.css')}}" rel="stylesheet">
    <link href="{{url('css/profile.css')}}" rel="stylesheet">
    <link href="{{url('css/home.css')}}" rel="stylesheet">
    <link href="{{url('css/footer.css')}}" rel="stylesheet">

    <title>ProfileBook</title>
</head>

<body>

@include('layouts.header')
@yield('content')
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>




<script src="{{url('js/post.js')}}"></script>
<script src="{{url('js/map.js')}}"></script>
</body>


</html>