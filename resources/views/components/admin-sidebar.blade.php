<div class="sidebar shadow-lg">
    <div class="widget pt-2">
        <h3 class="widget-title">Admin Panel</h3>
        <ul class="nav service-menu">
            <li class="{{ \Request::route()->getName() == 'adminDashboard' ? 'active' : ''  }}"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="{{ \Request::route()->getName() == 'vendorServices' ? 'active' : ''  }}">
                 <a href="/admin/services">Services</a>
            </li>
            <li class="{{ \Request::route()->getName() == 'categories.index' ? 'active' : ''  }}"><a href="/admin/categories">Categories</a></li>
            <li class="{{ \Request::route()->getName() == ('stripe.index') ? 'active' : ''  }}"><a href="/admin/stripe">Stripe</a></li>
            <li><a href="#">Clients</a></li>
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
