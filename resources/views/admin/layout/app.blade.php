<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <title>PrevClass - Admin | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('prevclass.ico') }}" >
    
    {{ Html::style('css/bootstrap.css')}}
    {{ Html::style('css/font-awesome/css/font-awesome.min.css')}}
    {{ Html::style('css/Ionicons/css/ionicons.min.css')}}
    {{ Html::style('css/custom/custom.css')}}
    {{ Html::style('css/adminlte/dist/css/AdminLTE.min.css')}}
    {{ Html::style('css/adminlte/dist/css/skins/skin-yellow.min.css')}}
    {{ Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}} 
    @include('layouts.shim')
</head>
<body class="hold-transition skin-yellow sidebar-mini ">
    <div class="wrapper">
        @include('admin.partials.navbar')        
        @include('admin.partials.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                @yield('content_header')
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
    </div>
    {{ Html::script('js/jquery/dist/jquery.min.js') }}
    {{ Html::script('js/bootstrap.min.js') }}
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/adminlte.min.js') }}
    {{ Html::script('js/jquery/dist/jquery.mask.js')}}
    <script>
        $("#phone").mask("(99) 9999-9999");
        $("#cpf").mask("999.999.999-99");
    </script>
</body>
</html>

