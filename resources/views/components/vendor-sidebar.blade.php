<div class="sidebar ">
    <div class="widget">
        <h3 class="widget-title">Admin Panel</h3>
        <ul class="nav service-menu">
            <li class="{{ \Request::route()->getName() == 'vendorDashboard' ? 'active' : ''  }}"><a href="/vendor/dashboard">Dashboard</a></li>
            <li class="{{ \Request::route()->getName() == 'vendorServices' ? 'active' : ''  }}">
                <a href="/vendor/services">Services</a>
            </li>
            <li><a href="#">Settings</a></li>
            <li>
                <form id="logout-form" action="/logout" method="post">
                    @csrf
                    <a onClick="logout()">Log Out</a>
                </form>
            </li>
        </ul>
    </div><!-- Widget end -->
</div><!-- Sidebar end -->
