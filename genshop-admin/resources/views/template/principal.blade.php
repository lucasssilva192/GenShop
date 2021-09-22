<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('css/mdb/mdb.min.css') }}" />
    @yield('css')
     <!-- import the MDB javascript file https://mdbootstrap.com/ -->
    <script type="text/javascript" src="{{ asset('js/mdb/mdb.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    @yield('js')
    <title>GenShop</title>
</head>
<body>
        @yield('content')
</body>

</html>
