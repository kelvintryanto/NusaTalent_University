<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        @include('includes.postjobstyle')
        @include('includes.postjobscript')
    </head>

    <body>
        @include('includes.sidebarpostjob')
        
        @yield('content')


        <div style="position: fixed;">
            @include('includes.footer')
        </div>
    </body>
</html>