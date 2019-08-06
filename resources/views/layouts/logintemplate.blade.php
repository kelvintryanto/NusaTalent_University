<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        @include('includes.loginstyle')
        @include('includes.loginscript')
    </head>

    <body>
        @yield('content')
        
        <div style="position: fixed">
            @include('includes.footer')
        </div>
    </body>
</html>

   