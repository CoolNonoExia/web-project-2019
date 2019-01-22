<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div>

    <header class="container-fluid">
        @include('includes.header')
    </header>

    <div id="main" class="container-fluid">

        @yield('content')

    </div>

    <footer class="container-fluid">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>
