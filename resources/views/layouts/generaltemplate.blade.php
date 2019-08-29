<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        @include('includes.generalstyle')
    </head>

    <body>
        <div style="margin-top: 70px;">
            @yield('content')
        </div>

        @include('includes.generalscript')
        @include('includes.footer')
    </body>
</html>

