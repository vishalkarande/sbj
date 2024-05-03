<?php 
$social = $QueryFire->getAllData('coupons',' 1');
$socialArray = array();
foreach($social as $soc){
	$socialArray[$soc['code']]=$soc['discount'];
}
$data_discount = $QueryFire->getAllData('pageandcontents','id=3')[0];
if(isset($_POST['login'])) {
    $data = $QueryFire->getAllData('users',' email="'.trim(strip_tags($_POST['username'])).'" and password ="'.md5(trim(strip_tags($_POST['password']))).'"');
    if(!empty($data[0])) {
		$data = $data[0];
		if($data["is_verified"]==1){
			echo "<script> alert('Please Verify your enmail. Link is sent to your Mail.');window.location.href='login.php';</script>";
			exit();
		}else{
		
		$_SESSION['user'] = $data;
		echo "<script>window.location.href = 'index.php';</script>";
		}
}else{
	echo "<script>window.location.href = 'login.php?pop=1&mes=4';</script>";

		exit();
}}

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
    $cart_value=count($_SESSION['cart']);
}else{
    $cart_value=0;
}

if(isset($_POST['logout'])) {
    echo "<script>window.location.href = 'logout.php';</script>";
}

if(isset($_POST['trackOrder'])) {
    echo "<script>window.location.href = 'trackOrder.php';</script>";
}

?>


<header class="whb-header whb-default_header whb-sticky-shadow whb-scroll-stick whb-sticky-real">
	<div class="whb-main-header">

		<div
			class="whb-row whb-top-bar whb-not-sticky-row whb-with-bg whb-without-border whb-color-dark whb-flex-flex-middle">
			<div class="container">
				<div class="whb-flex-row whb-top-bar-inner">
					<div class="whb-column whb-col-left whb-visible-lg whb-empty-column">
					</div>
					<div class="whb-column whb-col-center whb-visible-lg">

						<div class="wd-header-text set-cont-mb-s reset-last-child ">
							<h5 style="text-align: center;"><span style="color: #ffffff;"><?= html_entity_decode($data_discount['text'])?></span></h5>
						</div>
					</div>
					<div class="whb-column whb-col-right whb-visible-lg whb-empty-column">
					</div>
					<div class="whb-column whb-col-mobile whb-hidden-lg">

						<div class="wd-header-text set-cont-mb-s reset-last-child ">
							<h5 style="text-align: center;"><span style="color: #ffffff;"><?= html_entity_decode($data_discount['text'])?></span></h5>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div
			class="whb-row whb-general-header whb-sticky-row whb-with-bg whb-border-fullwidth whb-color-dark whb-flex-flex-middle">
			<div class="container">
				<div class="whb-flex-row whb-general-header-inner">
					<div class="whb-column whb-col-left whb-visible-lg">
						<div class="site-logo">
							<a href="index.php" class="wd-logo wd-main-logo" rel="home">
								<img src="wp-content/uploads/2024/01/slazzer-edit-image-1.png" alt="Saptdhanya"
									style="max-width: 250px;" /> </a>
						</div>
					</div>
					<div class="whb-column whb-col-center whb-visible-lg">
						<div class="wd-header-nav wd-header-main-nav text-left wd-design-1" role="navigation"
							aria-label="Main navigation">
							<ul id="menu-main-menu" class="menu wd-nav wd-nav-main wd-style-default wd-gap-s">
								<li id="menu-item-1380"
									class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item menu-item-home menu-item-1380 item-level-0 menu-simple-dropdown wd-event-hover">
									<a href="index.php" class="woodmart-nav-link"><span
											class="nav-link-text">Home</span></a>
								</li>
								<li id="menu-item-1388"
									class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-237 current_page_item menu-item-1388 item-level-0 menu-simple-dropdown wd-event-hover">
									<a href="aboutus.php" class="woodmart-nav-link"><span class="nav-link-text">About
											Us</span></a>
								</li>
								<li id="menu-item-1381"
									class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1381 item-level-0 menu-simple-dropdown wd-event-hover">
									<a href="products.php" class="woodmart-nav-link"><span
											class="nav-link-text">Products</span></a>

								</li>
								
								<li id="menu-item-1389"
									class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1389 item-level-0 menu-simple-dropdown wd-event-hover">
									<a href="contactus.php" class="woodmart-nav-link"><span
											class="nav-link-text">Contact
											Us</span></a>
								</li>
                                
							</ul>
						</div><!--END MAIN-NAV-->
						<div class="wd-search-form wd-header-search-form wd-display-form whb-duljtjrl87kj7pmuut6b">


							<form role="search" method="get"
								class="searchform  wd-style-default wd-cat-style-bordered woodmart-ajax-search"
								action="index.php" data-thumbnail="1" data-price="1" data-post_type="product"
								data-count="20" data-sku="0" data-symbols_count="3">
								<input type="text" class="s" placeholder="Search for products" value="" name="s"
									aria-label="Search" title="Search for products" required />
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
						<div class="whb-space-element " style="width:30px;"></div>
					</div>


					<div class="whb-column whb-col-right whb-visible-lg">
						<?php if (isset($loginPage)==1) { 
	$v=1;
}else{?>
						<div
							class="wd-header-my-account wd-tools-element wd-event-hover wd-design-1 wd-account-style-icon whb-2b8mjqhbtvxz16jtxdrd">
							<a href="login.php" title="My account">

								<span class="wd-tools-icon">
								</span>
								<span class="wd-tools-text">
									Login / Register </span>

							</a>

                            

                            <?php if(!isset($_SESSION['user']) && empty($_SESSION['user'])){ ?>
							<div class="wd-dropdown wd-dropdown-register">
								<div class="login-dropdown-inner">
									<span class="wd-heading"><span class="title">Sign in</span><a
											class="create-account-link" href="login.php">Create an Account</a></span>
									<form method="post" class="login woocommerce-form woocommerce-form-login
						" action="">



										<p
											class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
											<label for="username">Email address&nbsp;<span
													class="required">*</span></label>
											<input type="text"
												class="woocommerce-Input woocommerce-Input--text input-text"
												name="username" id="username" value="" />
										</p>
										<p
											class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-password">
											<label for="password">Password&nbsp;<span class="required">*</span></label>
											<input class="woocommerce-Input woocommerce-Input--text input-text"
												type="password" name="password" id="password"
												autocomplete="current-password" />
										</p>

										<div class="g-recaptcha-wrap" style="padding:10px 0 10px 0">
											<div id="woo_recaptcha_1" class="g-recaptcha"
												data-sitekey="6LcQbn0pAAAAAK6GbM71LXlWQOqPJBrv8raQ6NdA"></div>
										</div>
										<p class="form-row">
											<input type="hidden" id="woocommerce-login-nonce"
												name="woocommerce-login-nonce" value="4eba8c7d2a" /><input type="hidden"
												name="_wp_http_referer" value="/about-us/" />
											<button type="submit"
												class="button woocommerce-button woocommerce-form-login__submit"
												name="login" value="Log in">Log in</button>
										</p>

										<p class="login-form-footer">
											<a href="forgetpassword.php"
												class="woocommerce-LostPassword lost_password">Lost your password?</a>
											<label
												class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
												<input class="woocommerce-form__input woocommerce-form__input-checkbox"
													name="rememberme" type="checkbox" value="forever"
													title="Remember me" aria-label="Remember me" />
												<span>Remember me</span>
											</label>
										</p>


									</form>


								</div>
							</div>

                            <?php }else{ 
								if (!isset($loginPage)) {
								?>




                                <div class="wd-dropdown wd-dropdown-register">
								<div class="login-dropdown-inner">
									<span class="wd-heading"><span class="title"><?=$_SESSION['user']['email']?></span><a
											class="create-account-link" href="login.php"></a></span>
									<form method="post" class="login woocommerce-form woocommerce-form-login
						" action="">



										
										<div class="g-recaptcha-wrap" style="padding:10px 0 10px 0">
											<div id="woo_recaptcha_1" class=""
												data-sitekey="6LcQbn0pAAAAAK6GbM71LXlWQOqPJBrv8raQ6NdA"></div>
										</div>
										<p class="form-row">
											
											<button type="submit"
												class="button woocommerce-button woocommerce-form-login__submit"
												name="trackOrder" value="Log in">Track Order</button>
										</p>
                                        <p class="form-row">
											<input type="hidden" id="woocommerce-login-nonce"
												name="woocommerce-login-nonce" value="4eba8c7d2a" /><input type="hidden"
												name="_wp_http_referer" value="/about-us/" />
											<button type="submit"
												class="button woocommerce-button woocommerce-form-login__submit"
												name="logout" value="Log in">Log Out</button>
										</p>

									


									</form>


								</div>
							</div>



                                <?php } }?>
						</div>
						<?php } ?>
						<div
							class="wd-header-cart wd-tools-element wd-design-5  whb-5u866sftq6yga790jxf3">
							<a href="cart.php"
								title="Shopping cart">

								<span class="wd-tools-icon wd-icon-alt">
									<span class="wd-cart-number wd-tools-count"><?=$cart_value?> <span>items</span></span>
								</span>
								<span class="wd-tools-text">

									<span class="wd-cart-subtotal"><span
											class="woocommerce-Price-amount amount"><bdi><span
													class="woocommerce-Price-currencySymbol">&#8377;</span>0.00</bdi></span></span>
								</span>

							</a>
						</div>
					</div>
					<div class="whb-column whb-mobile-left whb-hidden-lg">
						<div
							class="wd-tools-element wd-header-mobile-nav wd-style-icon wd-design-1 whb-wn5z894j1g5n0yp3eeuz">
							<a href="aboutus.php" rel="nofollow" aria-label="Open mobile menu">

								<span class="wd-tools-icon">
								</span>

								<span class="wd-tools-text">Menu</span>

							</a>
						</div><!--END wd-header-mobile-nav-->
					</div>
					<div class="whb-column whb-mobile-center whb-hidden-lg">
						<div class="site-logo">
							<a href="index.php" class="wd-logo wd-main-logo" rel="home">
								<img src="wp-content/uploads/2024/01/slazzer-edit-image-1.png" alt="Saptdhanya"
									style="max-width: 149px;" /> </a>
						</div>
					</div>
					<div class="whb-column whb-mobile-right whb-hidden-lg">

						<div
							class="wd-header-search wd-tools-element wd-header-search-mobile wd-display-icon whb-6o3ywcqlos79wmtp8ui8 wd-style-icon wd-design-1">
							<a href="aboutus.php#" rel="nofollow noopener" aria-label="Search">

								<span class="wd-tools-icon">
								</span>

								<span class="wd-tools-text">
									Search </span>

							</a>
						</div>

						<div
							class="wd-header-cart wd-tools-element wd-design-5  whb-u6cx6mzhiof1qeysah9h">
							<a href="cart.php"
								title="Shopping cart">

								<span class="wd-tools-icon wd-icon-alt">
									<span class="wd-cart-number wd-tools-count"><?=$cart_value?> <span>items</span></span>
								</span>
								<span class="wd-tools-text">

									<span class="wd-cart-subtotal"><span
											class="woocommerce-Price-amount amount"><bdi><span
													class="woocommerce-Price-currencySymbol">&#8377;</span>0.00</bdi></span></span>
								</span>

							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>