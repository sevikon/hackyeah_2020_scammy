<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @env('production')
    <link href="{{ mix('app.css') }}" rel="stylesheet"/>
    @endenv

    @env('local')
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>
    @endenv

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="bg-grey-lightest m-0 p-0 font-sans">
<div id="app">

</div>

@env('production')
<script charset="utf8" src="{{ mix('app.js') }}"></script>
<script charset="utf8" src="{{ mix('vendors~app.js') }}"></script>
@endenv

@env('local')
<script charset="utf8" src="{{ asset('/js/app.js') }}"></script>
<script charset="utf8" src="{{ asset('/js/vendors~app.js') }}"></script>
@endenv

<!--begin::Web font -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
        google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700", "Material Icons"]},
        active: function () {
            sessionStorage.fonts = true;
        }
    });
</script>

</body>
</html>
