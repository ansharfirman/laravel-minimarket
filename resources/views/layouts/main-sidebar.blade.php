<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset(\Auth::User()->getImageProfile()) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ \Auth::User()->getFullname() }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href=""><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href=""><i class="fa fa-user-plus"></i> <span>Profile</span></a></li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-database"></i> <span>References</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Bank</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Customer</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Measure</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Stakeholder</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Supplier</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Unit</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cubes"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Brand</a></li>
                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Category</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Items</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Image</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Size</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Discount</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-money"></i> <span>Transactions</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Purchase</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Sales</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Fee</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-line-chart"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Purchase</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Sales</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Fee</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-gears"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Application</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> User</a></li>
                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Role & Permission</a></li>
            </ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->