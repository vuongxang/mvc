<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include ('layouts.style')
</head>

<body>
    <div class="container">
        @include ('layouts.nav')
        <main>
            @yield('content')
        </main>
        <footer class="text-center bg-secondary">
            Fpt polytechnic
        </footer>
    </div>
    @include ('layouts.script')
    @yield('js')
</body>
</html>