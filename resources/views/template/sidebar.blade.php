<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-fixed" style="background-color: white;">
    <div class="sidebar-content">
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">

                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="{{ request()->is('Dashboard') ? 'active' : '' }}">
                        <a href="/Dashboard">
                            <i class="icon-copy" style="color: black;"></i>
                            <span style="color: #04518D;"> Dashboard </span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-stack2" style="color: black;"></i>
                            <span style="color: #04518D;"> Job </span>
                        </a>
                        <ul>
                            <li class="{{ request()->is('JobPost/post-job') ? 'active' : '' }}">
                                <a href="/JobPost/post-job">
                                    <span style="color: #04518D;"> Post a Job </span>
                                </a>
                            </li>
                            <li class="{{ request()->is('JobPost/Edit/*') || request()->is('JobPost/list-job-post') ? 'active' : '' }}">
                                <a href="/JobPost/list-job-post">
                                    <span style="color: #04518D;"> List Job Post </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ request()->is('Student') ? 'active' : '' }}">
                        <a href="/Student">
                            <i class="icon-user" style="color: black;"></i>
                            <span style="color: #04518D;"> Student </span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-copy" style="color: black;"></i>
                            <span style="color: #04518D;"> Company </span>
                        </a>
                        <ul>
                            <li class="{{ request()->is('Company/add-company-page') ? 'active' : '' }}">
                                <a href="/Company/add-company-page">
                                    <span style="color: #04518D;"> Add Company </span>
                                </a>
                            </li>
                            <li class="{{ request()->is('Company/list-company') || request()->is('Company/edit-profile/*') ? 'active' : '' }}">
                                <a href="/Company/list-company">
                                    <span style="color: #04518D;"> List Company </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('Event/denah') ? 'active' : '' }}">
                        <a href="/Event/denah"><i class="icon-store" style="color: black;"></i> <span style="color: #04518D;">  Denah </span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /main sidebar -->
