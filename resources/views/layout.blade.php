<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wonde Technical Exercise</title>
    </head>
    <body>
        <div>
            @yield('content')
        </div>
        <script>
            window.Laravel = {
                csrfToken: '{{ csrf_token() }}'
            };
            @stack('scripts')
        </script>
    </body>
</html>
