<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        @include('includes.generalstyle')
    </head>

    <body style="background:white;">
        <div style="margin-top: 55px;">
            @yield('content')
        </div>

        @include('includes.generalscript')
        @include('includes.footer')
    </body>
</html>

