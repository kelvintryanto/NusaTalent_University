<div class="nav2 navbar-fixed-top" style="margin-top: 59px; background-color: #bdd7ec;">
    <a href="/event" class="nav-menu4 text2 {{ request()->is('event') ? 'content-active2' : 'content-nonactive' }}">
        <div>Event Dashboard</div>
    </a>
    <a href="/event/company" class="nav-menu4 text2 {{ request()->is('event/company','event/company/*') ? 'content-active2' : 'content-nonactive' }}">
        <div>Company</div>
    </a>
    <a href="/event/job" class="nav-menu4 text2 {{ request()->is('event/job','event/job/*') ? 'content-active2' : 'content-nonactive' }}">
        <div>Job</div>
    </a>
    <a href="/event/visitor" class="nav-menu4 text2 {{ request()->is('event/visitor','event/visitor/*') ? 'content-active2' : 'content-nonactive' }}">
        <div>Visitor</div>
    </a>
</div>
