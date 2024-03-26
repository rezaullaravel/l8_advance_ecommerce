<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('/') }}admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/') }}admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Rezaul Karim</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ (request()->is('admin/dashboard*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/dashboard*')) ? 'display:block;' : 'display:none;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (request()->is('admin/category*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/category*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-object-group"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/category*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin/category/add') }}"  class=" nav-link {{ (request()->is('admin/category/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.manage') }}" class="nav-link {{ (request()->is('admin/category/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (request()->is('admin/subcategory*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/subcategory*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-layer-group"></i>
              <p>
                SubCategory
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/subcategory*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.subcategory.add') }}"  class=" nav-link {{ (request()->is('admin/subcategory/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subcategory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.subcategory.manage') }}" class="nav-link {{ (request()->is('admin/subcategory/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Subcategory</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (request()->is('admin/childcategory*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/childcategory*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-plane-slash"></i>
              <p>
                ChildCategory
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/childcategory*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.childcategory.add') }}"  class=" nav-link {{ (request()->is('admin/childcategory/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add childcategory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.childcategory.manage') }}" class="nav-link {{ (request()->is('admin/childcategory/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage childcategory</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (request()->is('admin/brand*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/brand*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-copyright"></i>
              <p>
                Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/brand*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.brand.add') }}"  class=" nav-link {{ (request()->is('admin/brand/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.brand.manage') }}" class="nav-link {{ (request()->is('admin/brand/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage brand</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (request()->is('admin/warehouse*')) ? 'menu-open' : '' }}">
            <a href="{{ route('admin.warehouse') }}" class="nav-link {{ (request()->is('admin/warehouse*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-solid fa-warehouse"></i>
              <p>
                Warehouse
              </p>
            </a>
          </li>


          <li class="nav-item {{ (request()->is('admin/coupon*')) ? 'menu-open' : '' }}">
            <a href="{{ url('admin/coupon') }}" class="nav-link {{ (request()->is('admin/coupon*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-regular fa-hand-point-right"></i>
              <p>
                Coupon
              </p>
            </a>
          </li>

          <li class="nav-item {{ (request()->is('admin/pickup/point*')) ? 'menu-open' : '' }}">
            <a href="{{ url('admin/pickup/point') }}" class="nav-link {{ (request()->is('admin/pickup/point*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-map"></i>
              <p>
                Pickup point
              </p>
            </a>
          </li>


          <li class="nav-item {{ (request()->is('admin/product*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/product*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-poo"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/product*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ url('admin/product/add') }}"  class=" nav-link {{ (request()->is('admin/product/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/product/manage') }}" class="nav-link {{ (request()->is('admin/product/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage product</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- slider start --}}
          <li class="nav-item {{ (request()->is('admin/slider*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/slider*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-copyright"></i>
              <p>
                Slider
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/slider*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.slider.add') }}"  class=" nav-link {{ (request()->is('admin/slider/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.slider.manage') }}" class="nav-link {{ (request()->is('admin/slider/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Slider</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- slider end --}}

          {{-- order start --}}
          <li class="nav-item {{ (request()->is('admin/order*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/order*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-solid fa-copyright"></i>
              <p>
                Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/order*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a  href="{{ route('admin.order.all') }}"  class=" nav-link {{ (request()->is('admin/order/all')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Order</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- order end --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
