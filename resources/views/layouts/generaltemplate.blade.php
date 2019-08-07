<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        @include('includes.generalstyle')

    </head>

    <body>
        @yield('content')

        @include('includes.footer')
        @include('includes.generalscript')
    </body>
</html>

