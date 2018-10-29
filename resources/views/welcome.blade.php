<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.Laravel = { csrfToken: '{{ csrf_token() }}' }
        </script>
        <title>Laravel</title>
        <!-- Bulma CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" rel="stylesheet" type="text/css">

    </head>
    <style>
        @import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    </style>
    <body>
        <div id="app">
        </div>
        <script src="../js/app.js"></script>
        <script>
              let last_drop_open = undefined;
        document.addEventListener('click', function (el) {
            let target = el.target;
            // console.log(target.closest('input'));
            if (target.closest('input')){
                return;
            }
            if (target.closest('.dropdown-trigger')) {
                last_drop_open = target.closest('.dropdown');
                last_drop_open.classList.toggle('is-active');
            } else if (last_drop_open) {
                last_drop_open.classList.remove('is-active');
            }
        })
        </script>
    </body>
</html>
