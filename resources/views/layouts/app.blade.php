<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Новостной сайт')</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: #f9f9f9; 
        }
        .container { 
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 20px; 
            background: white; 
            min-height: 80vh; 
        }
        
       
    </style>
</head>
<body>

    @include('partials.header')

    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')

</body>
</html>