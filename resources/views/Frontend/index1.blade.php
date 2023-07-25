<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Errol Outdoor11</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
    @include('frontend.navbar')
    @include('frontend.header')
    @include('frontend.main')
    
    @include('frontend.footer')

    <script src="{{asset('js/propper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

  </body>
</html>