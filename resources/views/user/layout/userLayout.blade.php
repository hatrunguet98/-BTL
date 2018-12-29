<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClassSurvey</title>
    <link rel="icon" href="{{ asset('user/images/unnamed.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <!-- CSS -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <!-- AJAX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <!-- Bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- js -->
    <script type="text/javascript" src="{{ asset('user/js/home.js') }}"></script>
    <!-- jquery-latest -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
    <!--header-->
    @include("user.layout.partial.header")
    <!--/.header-->
    <!-- sidebar -->
    @include("user.layout.partial.sidebar")
    <!-- /.sidebar -->
    <!--Main Layout-->
    @section('main')
    @show

    @section('js')
    <!--------------------------
    | Your Javascript Here |
    -------------------------->
    @show
    <!-- /.Main Layout -->
    <!-- Back to top -->
    <div class='lentop'>
        <div>
            <img src="{{ asset('user/images/swipe-up.png') }}">
        </div>
    </div>
    <!-- /.Back to top -->
    <script type="text/javascript">
        $(document).on('click', '#all-course', function(e){
        $.get(
            '{{ URL::to("courses") }}'
        ).done(function(data){
            $('#data').empty().html(data);
        }).fail(function(data){
            alert('something errors');
        });
    })
    </script>
</body>
<!-- background-header -->
<style>
    header{
        background: -webkit-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
    }
</style>
<!-- /.background-header -->
