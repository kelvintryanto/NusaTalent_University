<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        @include('includes.generalstyle')
        @include('includes.generalscript')
    </head>

    <body>
        @yield('content')
        
        @include('includes.footer')
    </body>
</html>

   