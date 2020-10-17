<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('includes.header')
    </header>

    <main id="main" class="pt-4">
        <div class="row">
            <div class="col">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>
