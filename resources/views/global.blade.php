<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Samsoule PonyTab</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <!-- Styles -->
        <style>
        </style>
        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!}
        </script>
    </head>
    <body>
        <div id="app" class="content">
            <slideshow />
        </div>
        <script src="//widget.time.is/fr.js"></script>
        <script type="application/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
