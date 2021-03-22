  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?php echo e(asset('images/logo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo e(config('app.name')); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(auth()->user()->getAvatar()); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo e(auth()->user()->getname()); ?></a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a> -->
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('products.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('cart.index')); ?>" class="nav-link">
              <i class="fas fa-cart-plus"></i>
              <p>
                 POS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('orders.index')); ?>" class="nav-link">
              <i class="fal fa-border-all"></i>
              <p>
                 Order
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('settings.index')); ?>" class="nav-link">
              <i class="fas fa-cog"></i>
              <p>
                change password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
             <i class="nav-icon fas fa-sign-out-alt"></i>
             <p>
               Logout  
             </p>
             <form action="<?php echo e(route('logout')); ?>" method="POST" id="logout-form">
               <?php echo csrf_field(); ?>
             </form> 
            </a>
           </li>    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php /**PATH C:\xampp\htdocs\CK nurse\resources\views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>