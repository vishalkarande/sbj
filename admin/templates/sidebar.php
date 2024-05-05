<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard" class="brand-link">
    Marwadimart <span class="brand-text font-weight-light"></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="dashboard" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'dashboard' ) ? 'active': ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sliders" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'sliders' ) ? 'active': ''; ?>">
            <i class="fas fa-images nav-icon"></i>
            <p>
              Sliders
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="ad-sliders" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'ad sliders' ) ? 'active': ''; ?>">
            <i class="far fa-images nav-icon"></i>
            <p>
              Ad Sliders
            </p>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a href="uploaded-lists" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'uploaded lists' ) ? 'active': ''; ?>">
            <i class="fas fa-cloud-upload-alt nav-icon"></i>
            <p>
              Uploaded Lists
            </p>
          </a>
        </li> -->
        <li class="nav-item has-treeview <?php echo (isset($active_tab) && trim($active_tab) == 'orders' ) ? 'menu-open': ''; ?>">
          <a href="#" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'orders' ) ? 'active': ''; ?>">
            <i class="nav-icon fas fa-shopping-basket"></i>
            <p>
              Order Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="new-orders" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'new orders' ) ? 'active': ''; ?>">
                <i class="fas fa-cart-plus nav-icon"></i>
                <p>New Orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pending-orders" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'pending orders' ) ? 'active': ''; ?>">
                <i class="fas fa-cart-arrow-down nav-icon"></i>
                <p>Pending Orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="delivered-orders" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'delivered orders' ) ? 'active': ''; ?>">
                <i class="fas fa-luggage-cart nav-icon"></i>
                <p>Delivered Orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="orders" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'orders' ) ? 'active': ''; ?>">
                <i class="fas fa-shopping-cart nav-icon"></i>
                <p>All Orders</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="export-orders" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'export orders' ) ? 'active': ''; ?>">
                <i class="fas fa-file-export nav-icon"></i>
                <p>Export Orders</p>
              </a>
            </li> -->
          </ul>
        </li>
        <li class="nav-item has-treeview <?php echo (isset($active_tab) && trim($active_tab) == 'products' ) ? 'menu-open': ''; ?>">
          <a href="#" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'products' ) ? 'active': ''; ?>">
            <i class="fab fa-product-hunt nav-icon"></i>
            <p>
              Product Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="inventry" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'inventry' ) ? 'active': ''; ?>">
                <i class="fas fa-truck-loading nav-icon"></i>
                <p>Inventry</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="params" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'params' ) ? 'active': ''; ?>">
                <i class="fas fa-info-circle nav-icon"></i>
                <p>Product Params</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="param-values" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'param values' ) ? 'active': ''; ?>">
                <i class="fas fa-sitemap nav-icon"></i>
                <p>Param Values</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="categories" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'categories' ) ? 'active': ''; ?>">
                <i class="fas fa-th-list nav-icon"></i>
                <p>Categories</p>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a href="sub-categories" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'sub categories' ) ? 'active': ''; ?>">
                <i class="far fa-list-alt nav-icon"></i>
                <p>Sub Categories</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="products" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'products' ) ? 'active': ''; ?>">
                <i class="fas fa-shopping-cart nav-icon"></i>
                <p>Products</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="reviews" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'reviews' ) ? 'active': ''; ?>">
                <i class="fas fa-comments nav-icon"></i>
                <p>Reviews</p>
              </a>
            </li> -->
          </ul>
        </li>
        <!-- <li class="nav-item has-treeview <?php echo (isset($active_tab) && trim($active_tab) == 'faqs' ) ? 'menu-open': ''; ?>">
          <a href="#" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'faqs' ) ? 'active': ''; ?>">
            <i class="fas fa-question nav-icon"></i>
            <p>
              FAQs Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="faqs-category" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'faqs category' ) ? 'active': ''; ?>">
                <i class="fas fa-user-tag nav-icon"></i>
                <p>FAQ's Category</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="user-faqs" class="nav-link <?php echo (isset($active_sub_tab) && trim($active_sub_tab) == 'faqs' ) ? 'active': ''; ?>">
                <i class="fas fa-user-tag nav-icon"></i>
                <p>FAQ's</p>
              </a>
            </li>
            </ul>
        </li> -->
        <!-- <li class="nav-item">
          <a href="brands" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'brands' ) ? 'active': ''; ?>">
            <i class="far fa-flag nav-icon"></i>
            <p>
              Brands
            </p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="social" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'social' ) ? 'active': ''; ?>">
            <i class="fas fa-percent nav-icon"></i>
            <p>
            social
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="pincodes" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'pincodes' ) ? 'active': ''; ?>">
            <i class="fas fa-truck-loading nav-icon"></i>
            <p>
              Pincodes
            </p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="testimonials" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'testimonials' ) ? 'active': ''; ?>">
            <i class="far fa-images nav-icon"></i>
            <p>
              Testimonials
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="users" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'users' ) ? 'active': ''; ?>">
            <i class="fas fa-users nav-icon"></i>
            <p>
              Users
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="clients" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'clients' ) ? 'active': ''; ?>">
            <i class="fas fa-user-friends nav-icon"></i>
            <p>
              Clients
            </p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="about-us" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'about us' ) ? 'active': ''; ?>">
            <i class="far fa-address-card nav-icon"></i>
            <p>
              About Us
            </p>
          </a>
        </li>
     <!-- <li class="nav-item">
          <a href="why-marwadimart" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'why marwadimart') ? 'active': ''; ?>">
            <i class="far fa-address-card nav-icon"></i>
            <p>
            Why Marwadi Mart
            </p>
          </a>
        </li> -->
         <!-- <li class="nav-item">
          <a href="mission" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'mission' ) ? 'active': ''; ?>">
            <i class="far fa-address-card nav-icon"></i>
            <p>
              Mission
            </p>
          </a>
        </li> -->
         <!-- <li class="nav-item">
          <a href="vision" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'vision' ) ? 'active': ''; ?>">
            <i class="far fa-address-card nav-icon"></i>
            <p>
             Vision
            </p>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a href="privacy-policy" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'privacy policy' ) ? 'active': ''; ?>">
            <i class="fas fa-user-lock nav-icon"></i>
            <p>
              Privacy Policy
            </p>
          </a>
        </li> -->
        <!--<li class="nav-item">
          <a href="return-policy" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'return policy' ) ? 'active': ''; ?>">
            <i class="fas fa-undo nav-icon"></i>
            <p>
              Return Policy
            </p>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a href="terms-and-conditions" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'terms and conditions' ) ? 'active': ''; ?>">
            <i class="fas fa-gavel nav-icon"></i>
            <p>
              Terms & Condition
            </p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="offer-and-discounts" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'special offers' ) ? 'active': ''; ?>">
            <i class="fas fa-percent nav-icon"></i>
            <p>
              Offers & Discounts
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="contact-request" class="nav-link <?php echo (isset($active_tab) && trim($active_tab) == 'contact request' ) ? 'active': ''; ?>">
            <i class="fas fa-phone-volume nav-icon"></i>
            <p>
              Contact Request
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper">