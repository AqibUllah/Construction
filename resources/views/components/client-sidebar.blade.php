<div class="sidebar ">
    <div class="widget">
        <h3 class="widget-title">Admin Panel</h3>
        <ul class="nav service-menu">
            <li class="{{ \Request::route()->getName() == 'clientDashboard' ? 'active' : ''  }}"><a href="/client/dashboard">Dashboard</a></li>
            <li class="{{ \Request::route()->getName() == ('clientProfile') ? 'active' : ''  }}"><a href="/client/settings">Settings</a></li>
            <li>
                <form id="logout-form" action="/logout" method="post">
                    @csrf
                    <a onClick="logout()">Log Out</a>
                </form>
            </li>
        </ul>
    </div><!-- Widget end -->
</div><!-- Sidebar end -->
