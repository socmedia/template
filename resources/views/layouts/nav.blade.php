<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/app/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="mm-active">
            <a href="javascript:;">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">UI Elements</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">eCommerce</div>
            </a>
            <ul>
                <li> <a href="{{ url('template/ecommerce-products') }}"><i
                            class="bx bx-right-arrow-alt"></i>Products</a>
                </li>
                <li> <a href="{{ url('template/ecommerce-products-details') }}"><i
                            class="bx bx-right-arrow-alt"></i>Product
                        Details</a>
                </li>
                <li> <a href="{{ url('template/ecommerce-add-new-products') }}"><i class="bx bx-right-arrow-alt"></i>Add
                        New
                        Products</a>
                </li>
                <li> <a href="{{ url('template/ecommerce-orders') }}"><i class="bx bx-right-arrow-alt"></i>Orders</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Tables</div>
            </a>
            <ul>
                <li> <a href="{{ url('template/table-basic-table') }}"><i class="bx bx-right-arrow-alt"></i>Basic
                        Table</a>
                </li>
                <li> <a href="{{ url('template/table-datatable') }}"><i class="bx bx-right-arrow-alt"></i>Data Table</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
