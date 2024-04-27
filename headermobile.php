

<div class="wd-close-side wd-fill"></div>
	<a href="aboutus.php#" class="scrollToTop" aria-label="Scroll to top button"></a>
	<div class="mobile-nav wd-side-hidden wd-left">
		<div class="wd-search-form">


			<form role="search" method="get" class="searchform  wd-cat-style-bordered woodmart-ajax-search"
				action="index.php" data-thumbnail="1" data-price="1" data-post_type="product" data-count="20"
				data-sku="0" data-symbols_count="3">
				<input type="text" class="s" placeholder="Search for products" value="" name="s" aria-label="Search"
					title="Search for products" required />
				<input type="hidden" name="post_type" value="product">
				<button type="submit" class="searchsubmit">
					<span>
						Search </span>
				</button>
			</form>



			<div class="search-results-wrapper">
				<div class="wd-dropdown-results wd-scroll wd-dropdown">
					<div class="wd-scroll-content"></div>
				</div>
			</div>


		</div>
		<ul id="menu-main-menu-1" class="mobile-pages-menu wd-nav wd-nav-mobile wd-active">
			<li
				class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1380 item-level-0">
				<a href="index.php" class="woodmart-nav-link"><span class="nav-link-text">Home</span></a></li>
			<li
				class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-237 current_page_item menu-item-1388 item-level-0">
				<a href="aboutus.php" class="woodmart-nav-link"><span class="nav-link-text">About Us</span></a>
			</li>
			<li
				class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1381 item-level-0">
				<a href="products.php" class="woodmart-nav-link"><span class="nav-link-text">Products</span></a>

			</li>
			
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1389 item-level-0"><a
					href="contactus.php" class="woodmart-nav-link"><span class="nav-link-text">Contact
						Us</span></a></li>


         <?php   if(!isset($_SESSION['user']) && empty($_SESSION['user'])){ ?>
			<li class="menu-item  menu-item-account wd-with-icon"><a href="login.php">Login / Register</a></li>
          <?php  }else{?>
            <li class="menu-item  menu-item-account wd-with-icon"><a href="trackOrder.php">Track Order</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1389 item-level-0"><a href="logout.php">Logout</a></li>
            <?php } ?>
		</ul>
	</div>
  
  
	<link rel="stylesheet" id="wd-bottom-toolbar-css"
		href="wp-content/themes/woodmart/css/parts/opt-bottom-toolbar.min.css?ver=7.1.4" type="text/css" media="all" />
	<div class="wd-toolbar wd-toolbar-label-show">
		<div class="wd-toolbar-shop wd-toolbar-item wd-tools-element">
			<a href="products.php">
				<span class="wd-tools-icon"></span>
				<span class="wd-toolbar-label">
					Shop </span>
			</a>
		</div>
		<div class="wd-header-cart wd-tools-element wd-design-5" >
			<a href="cart.php">
				<span class="wd-tools-icon wd-icon-alt">
					<span class="wd-cart-number wd-tools-count"><?=$cart_value?>  <span>items</span></span>
				</span>
				<span class="wd-toolbar-label">
					Cart </span>
			</a>
		</div>
		<div class="wd-header-my-account wd-tools-element wd-style-icon ">
			<a href="trackOrder.php">
				<span class="wd-tools-icon"></span>
				<span class="wd-toolbar-label">
					My account </span>
			</a>
		</div>
		<div class="wd-toolbar-link wd-tools-element wd-toolbar-item wd-tools-custom-icon">
			<a href="">
				<span class="wd-toolbar-icon wd-tools-icon wd-icon wd-custom-icon">
					<img width="150" height="150" src="wp-content/uploads/2023/06/whatsapp-1-150x150.webp"
						class="attachment-thumbnail size-thumbnail" alt="" decoding="async"
						srcset="wp-content/uploads/2023/06/whatsapp-1-150x150.webp 150w, wp-content/uploads/2023/06/whatsapp-1-300x300.webp 300w, wp-content/uploads/2023/06/whatsapp-1-32x32.webp 32w, wp-content/uploads/2023/06/whatsapp-1.webp 512w"
						sizes="(max-width: 150px) 100vw, 150px" /> </span>

				<span class="wd-toolbar-label">
					Enquire </span>
			</a>
		</div>
	</div>