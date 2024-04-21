

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
					href="../index.html@p=236" class="woodmart-nav-link"><span class="nav-link-text">Contact
						Us</span></a></li>


         <?php   if(!isset($_SESSION['user']) && empty($_SESSION['user'])){ ?>
			<li class="menu-item  menu-item-account wd-with-icon"><a href="login.php">Login / Register</a></li>
          <?php  }else{?>
            <li class="menu-item  menu-item-account wd-with-icon"><a href="trackOrder.php">Track Order</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1389 item-level-0"><a href="logout.php">Logout</a></li>
            <?php } ?>
		</ul>
	</div>
  
  