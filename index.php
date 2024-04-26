
<?php
require_once('header.php');
$slider = $QueryFire->getAllData('sliders',' 1');
$products=$QueryFire->getAllData('products',' is_show=1 and is_deleted=0 limit 5');
$productsAll=$QueryFire->getAllData('','','SELECT * FROM `products` as p JOIN `inventry` as i ON p.id=i.product_id where p.is_show=1 and p.is_deleted=0 limit 8;');
$about_us = $QueryFire->getAllData('pageandcontents','id=1')[0];




?>

<style>
   .popup {
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(
                    0,
                    0,
                    0,
                    0.4
                );
                display: none;
            }
            .popup-content {
                background-color: white;
                margin: 10% auto;
				        margin-top:40%;
                padding: 20px;
                border: 1px solid #888888;
                width: 50%;
                font-weight: bolder;
            }
            .popup-content button {
                display: block;
                margin: 0 auto;
            }
            .show {
                display: block;
            }

  </style>

      <div class="main-page-wrapper">
        <!-- MAIN CONTENT AREA -->
        <div class="container">
          <div class="row content-layout-wrapper align-items-start">
            <div class="site-content col-lg-12 col-12 col-md-12" role="main">
              <article
                id="post-229"
                class="post-229 page type-page status-publish hentry"
              >
                <div class="entry-content">
                  <div
                    data-elementor-type="wp-page"
                    data-elementor-id="229"
                    class="elementor elementor-229"
                    data-elementor-post-type="page"
                  >





          

                    <section
                      data-particle_enable="false"
                      data-particle-mobile-disabled="false"
                      class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-601e8d49 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
                      data-id="601e8d49"
                      data-element_type="section"
                    >
                      <div
                        class="elementor-container elementor-column-gap-default"
                      >

                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <?php foreach($slider as $slide){
                        ?>
                        <div class="carousel-item active">
                          <img src="images/sliders/<?php echo $slide['image_name']?>" class="d-block w-100" alt="...">
                        </div>
                        <?php } ?>
                      </div>
                    </div>


    </div>
                    </section>






                    
                    <section
                      data-particle_enable="false"
                      data-particle-mobile-disabled="false"
                      class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-534dc6 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
                      data-id="534dc6"
                      data-element_type="section"
                    >
                      <div
                        class="elementor-container elementor-column-gap-default"
                      >
                        <div
                          class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-59c38572"
                          data-id="59c38572"
                          data-element_type="column"
                        >
                          <div
                            class="elementor-widget-wrap elementor-element-populated"
                          >
                            <div
                              class="elementor-element elementor-element-75d39ed elementor-widget elementor-widget-wd_title"
                              data-id="75d39ed"
                              data-element_type="widget"
                              data-widget_type="wd_title.default"
                            >
                              <div class="elementor-widget-container">
                                <div
                                  class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-bordered wd-title-size-default text-center"
                                >
                                  <div class="liner-continer">
                                    <h4
                                      class="woodmart-title-container title wd-fontsize-l"
                                    >
                                      Discover Our Mouthwatering Menu!
                                    </h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="elementor-element elementor-element-1ffb0009 elementor-widget elementor-widget-wd_product_categories"
                              data-id="1ffb0009"
                              data-element_type="widget"
                              data-widget_type="wd_product_categories.default"
                            >
                              <div class="elementor-widget-container">
                                <div
                                  class="products woocommerce columns4 categories-style-carousel wd-carousel-spacing-30 categories-style-carousel"
                                  id="carousel-661ac6a320cd3"
                                  data-owl-carousel
                                  data-speed=""
                                  data-slides_per_view_tablet='{"size":""}'
                                  data-slides_per_view_mobile='{"size":""}'
                                  data-wrap="no"
                                  data-hide_pagination_control="no"
                                  data-hide_prev_next_buttons="no"
                                  data-desktop="3"
                                  data-tablet_landscape="3"
                                  data-tablet="2"
                                  data-mobile="2"
                                >
                                  <div
                                    class="owl-carousel carousel-items owl-items-lg-3 owl-items-md-3 owl-items-sm-2 owl-items-xs-2"
                                  >








                            <?php foreach($products as $prod){?>                                  
                                    <div
                                      class="category-grid-item cat-design-alt categories-with-shadow product-category product first"
                                      data-loop="1"
                                    >
                                      <div class="wrapp-category">
                                        <div class="category-image-wrapp">
                                          <a
                                            href="products.php"
                                            class="category-image"
                                          >
                                            <img
                                              fetchpriority="high"
                                              decoding="async"
                                              width="1024"
                                              height="1024"
                                              src="wp-content/uploads/2023/11/roasted-1-min-1024x1024.webp"
                                              class="attachment-large size-large wp-image-10725"
                                              alt="pragssalty roasted category"
                                              
                                              sizes="(max-width: 1024px) 100vw, 1024px"
                                            />
                                          </a>
                                        </div>
                                        <div class="hover-mask">
                                          <h3 class="wd-entities-title">
                                          <?= $prod["name"] ?>
                                            <mark class="count">(11)</mark>
                                          </h3>

                                          <div class="more-products">
                                            <a
                                              href="products.php"
                                              >11 products</a
                                            >
                                          </div>
                                        </div>

                                        <a
                                          href="products.php"
                                          class="category-link wd-fill"
                                          aria-label="<?= $prod["name"] ?>"
                                        ></a>
                                      </div>
                                    </div>

                              <?php } ?>


                                  

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>









                    <section  id="products"
                      data-particle_enable="false"
                      data-particle-mobile-disabled="false"
                      class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-5b5fb7e8 wd-section-stretch elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                      data-id="5b5fb7e8"
                      data-element_type="section"
                    >
                      <div
                        class="elementor-container elementor-column-gap-default"
                      >
                        <div
                          class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5aa98601"
                          data-id="5aa98601"
                          data-element_type="column"
                        >
                          <div
                            class="elementor-widget-wrap elementor-element-populated"
                          >
                            <div
                              class="elementor-element elementor-element-a8c3bab elementor-widget elementor-widget-image"
                              data-id="a8c3bab"
                              data-element_type="widget"
                              data-widget_type="image.default"
                            >
                              <div class="elementor-widget-container">
                                <style>
                                  /*! elementor - v3.20.0 - 10-04-2024 */
                                  .elementor-widget-image {
                                    text-align: center;
                                  }
                                  .elementor-widget-image a {
                                    display: inline-block;
                                  }
                                  .elementor-widget-image a img[src$=".svg"] {
                                    width: 48px;
                                  }
                                  .elementor-widget-image img {
                                    vertical-align: middle;
                                    display: inline-block;
                                  }
                                </style>
                                <a href="products.php">
                                  <img
                                    loading="lazy"
                                    decoding="async"
                                    width="1024"
                                    height="412"
                                    src="wp-content/uploads/2023/06/Small-Banners-01-1024x412.webp"
                                    class="attachment-large size-large wp-image-1411"
                                    alt="pragssalty - snacks combos"
                                    srcset="
                                      wp-content/uploads/2023/06/Small-Banners-01-1024x412.webp 1024w,
                                      wp-content/uploads/2023/06/Small-Banners-01-150x60.webp    150w,
                                      wp-content/uploads/2023/06/Small-Banners-01-600x242.webp   600w,
                                      wp-content/uploads/2023/06/Small-Banners-01-300x121.webp   300w,
                                      wp-content/uploads/2023/06/Small-Banners-01-768x309.webp   768w,
                                      wp-content/uploads/2023/06/Small-Banners-01.webp          1366w
                                    "
                                    sizes="(max-width: 1024px) 100vw, 1024px"
                                  />
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>






                    <section
                   
                      data-particle_enable="false"
                      data-particle-mobile-disabled="false"
                      class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-2366be91 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
                      data-id="2366be91"
                      data-element_type="section"
                      id="combopacks"
                    >
                      <div
                        class="elementor-container elementor-column-gap-default"
                      >
                        <div
                          class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-336f016"
                          data-id="336f016"
                          data-element_type="column"
                        >
                          <div
                            class="elementor-widget-wrap elementor-element-populated"
                          >
                            <div
                              class="elementor-element elementor-element-57a7bfab elementor-widget elementor-widget-wd_title"
                              data-id="57a7bfab"
                              data-element_type="widget"
                              data-widget_type="wd_title.default"
                            >
                              <div class="elementor-widget-container">
                                <div
                                  class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-bordered wd-title-size-default text-center"
                                >
                                  <div class="liner-continer">
                                    <h4
                                      class="woodmart-title-container title wd-fontsize-l"
                                    >
                                      Combo Packs
                                    </h4>
                                  </div>

                                  <div
                                    class="title-after_title set-cont-mb-s reset-last-child wd-fontsize-xs"
                                  >
                                    <h5>
                                      <span style="font-weight: 400"
                                        >A burst of flavour in every bite . Try
                                        our newest fusion with our best combos
                                        and save BIG!</span
                                      >
                                    </h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="elementor-element elementor-element-413baeec elementor-widget elementor-widget-wd_products"
                              data-id="413baeec"
                             
                              data-element_type="widget"
                              data-widget_type="wd_products.default"
                            >

                              <div class="elementor-widget-container">
                                <div class="wd-products-element">
                                  <div
                                    class="products elements-grid row wd-products-holder pagination- wd-spacing-20 grid-columns-4 products-bordered-grid-ins wd-quantity-enabled title-line-two wd-stretch-cont-lg wd-stretch-cont-md wd-stretch-cont-sm align-items-start"
                                    data-paged="1"
                                    data-atts='{"element_title":"","title_alignment":"left","query_post_type":"product","post_type":"product","include":null,"taxonomies":["60"],"offset":"","orderby":"","query_type":"OR","order":null,"meta_key":null,"exclude":"","shop_tools":null,"hide_out_of_stock":"no","ajax_recently_viewed":null,"speed":null,"slides_per_view":null,"slides_per_view_tablet":{"size":""},"slides_per_view_mobile":{"size":""},"wrap":null,"autoplay":null,"center_mode":null,"hide_pagination_control":null,"hide_prev_next_buttons":null,"scroll_per_page":null,"layout":"grid","pagination":"","items_per_page":8,"spacing":"20","columns":{"unit":"px","size":4,"sizes":[]},"columns_tablet":{"size":""},"columns_mobile":{"size":""},"products_masonry":"","products_different_sizes":"","product_quantity":"","product_hover":"inherit","sale_countdown":"","stretch_product":null,"stretch_product_tablet":0,"stretch_product_mobile":0,"stock_progress_bar":"","highlighted_products":"","products_bordered_grid":"1","products_bordered_grid_style":"inside","products_with_background":"0","products_shadow":"0","products_color_scheme":"default","img_size":"full","img_size_custom":null,"grid_gallery":"","grid_gallery_control":null,"grid_gallery_enable_arrows":null,"ajax_page":"","force_not_ajax":"no","lazy_loading":"no","scroll_carousel_init":null,"custom_sizes":false,"elementor":true}'
                                    data-source="shortcode"
                                    data-columns="4"
                                    data-grid-gallery=""
                                  >



<?php foreach($productsAll as $row){ ?>

                                    <div
                                      class="product-grid-item wd-with-labels product wd-hover-fw-button wd-hover-with-fade wd-quantity-overlap col-lg-3 col-md-3 col-6 first type-product post-2407 status-publish instock product_cat-combos has-post-thumbnail sale taxable shipping-taxable purchasable product-type-simple"
                                      data-loop="1"
                                      data-id="2407"
                                    >
                                    <form method="post" action="">
                                    <input type="hidden" name="product_id" value="<?=$row["id"]?>">
                                      <div class="product-wrapper">
                                        <div
                                          class="content-product-imagin"
                                        ></div>
                                        <div
                                          class="product-element-top wd-quick-shop"
                                        >
                                          <a
                                            href="productDetails.php?id=<?=$row["id"]?>"
                                            class="product-image-link"
                                          >
                                            <div
                                              class="product-labels labels-rounded"
                                            >
                                              <span class="onsale product-label"
                                                >-<?= $row["discount"]?>%</span
                                              >
                                            </div>
                                            <img
                                              loading="lazy"
                                              decoding="async"
                                              width="1080"
                                              height="1080"
                                              src="wp-content/uploads/2023/07/combo-6-2.webp"
                                              class="attachment-full size-full wp-image-11232"
                                              alt="<?= $row["name"]?>"
                                              
                                              sizes="(max-width: 1080px) 100vw, 1080px"
                                            />
                                          </a>

                                          <div
                                            class="wd-buttons wd-pos-r-t"
                                          ></div>
                                        </div>

                                        <div class="product-element-bottom">
                                          <h3 class="wd-entities-title">
                                            <a  href="productDetails.php?id=<?=$row["id"]?>"
                                              ><?= $row["name"]?></a
                                            >
                                          </h3>

                                          <div class="wrap-price">
                                            <span class="price"
                                              ><del aria-hidden="true"
                                                ><span
                                                  class="woocommerce-Price-amount amount"
                                                  ><bdi
                                                    ><span
                                                      class="woocommerce-Price-currencySymbol"
                                                      >&#8377;</span
                                                    ><?= $row["purchase_rate"]?></bdi
                                                  ></span
                                                ></del
                                              >
                                              <ins
                                                ><span
                                                  class="woocommerce-Price-amount amount"
                                                  ><bdi
                                                    ><span
                                                      class="woocommerce-Price-currencySymbol"
                                                      >&#8377;</span
                                                    ><?= $row["price"]?></bdi
                                                  ></span
                                                ></ins
                                              >
                                              <small
                                                class="woocommerce-price-suffix"
                                                >inc. taxes</small
                                              ></span
                                            >
                                          </div>



                                          
                                          <div
                                            class="wd-add-btn wd-add-btn-replace"
                                          >
                                            <div class="quantity">
                                              <input
                                                type="button"
                                                value="-"
                                                class="minus"
                                              />

                                              <label
                                                class="screen-reader-text"
                                                for="<?=$row["id"]?>"
                                                ><?= $row["name"]?></label
                                              >
                                              <input
                                                type="number"
                                                id="<?=$row["id"]?>"
                                                class="input-text qty text"
                                                value="1"
                                                title="Qty"
                                                min="1"
                                                max=""
                                                name="quantity"
                                                step="1"
                                                placeholder=""
                                                inputmode="numeric"
                                                autocomplete="off"
                                              />

                                              <input
                                                type="button"
                                                value="+"
                                                class="plus"
                                              />
                                            </div>

                                            <a
                                              name="add_to_cart"
                                              data-quantity="1"
                                              class="button product_type_simple "
                                              data-product_id="2407"
                                              data-product_sku=""
                                              aria-label="Add to cart: &ldquo;<?= $row["name"]?>&rdquo;"
                                              aria-describedby=""
                                              rel="nofollow"
                                              ><span> <input type="submit" style="background-color:#355E3B;color:white" name="add_to_cart" value="Add"></span></a
                                            >
                                          </div>

                                          <div
                                            class="fade-in-block wd-scroll"
                                          ></div>
                                        </div>
                                      </div>
                                    </div>
</form>
<?php } ?>



                                  </div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="elementor-element elementor-element-18b625a elementor-align-center elementor-widget elementor-widget-button"
                              data-id="18b625a"
                              data-element_type="widget"
                              data-widget_type="button.default"
                            >
                              <div class="elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                  <a
                                    class="elementor-button elementor-button-link elementor-size-sm"
                                    href="products.php"
                                  >
                                    <span
                                      class="elementor-button-content-wrapper"
                                    >
                                      <span class="elementor-button-text"
                                        >View All</span
                                      >
                                    </span>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section
                      data-particle_enable="false"
                      data-particle-mobile-disabled="false"
                      class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-422854e5 wd-section-stretch elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                      data-id="422854e5"
                      data-element_type="section"
                      data-settings='{"background_background":"classic"}'
                    >
                      <div
                        class="elementor-container elementor-column-gap-default"
                      >
                        <div
                          class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2be1627d"
                          data-id="2be1627d"
                          data-element_type="column"
                        >
                          <div class="elementor-widget-wrap"></div>
                        </div>
                        <div
                          class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-5f65e753"
                          data-id="5f65e753"
                          data-element_type="column"
                        >
                          <div
                            class="elementor-widget-wrap elementor-element-populated"
                          >
                            <div
                              class="elementor-element elementor-element-2be5eb5e elementor-widget elementor-widget-wd_title"
                              data-id="2be5eb5e"
                              data-element_type="widget"
                              data-widget_type="wd_title.default"
                            >
                              <div class="elementor-widget-container">
                                <div
                                  class="title-wrapper set-mb-s reset-last-child wd-title-color-primary wd-title-style-default wd-title-size-default text-left"
                                >
                                  <div class="liner-continer">
                                    <h1
                                      class="woodmart-title-container title wd-fontsize-l"
                                    >
                                      About Us
                                    </h1>
                                  </div>

                                  <div
                                    class="title-after_title set-cont-mb-s reset-last-child wd-fontsize-xs"
                                  >
                                    <p>
                                    <?= html_entity_decode($about_us['text'])?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="elementor-element elementor-element-39b6e25a elementor-widget elementor-widget-button"
                              data-id="39b6e25a"
                              data-element_type="widget"
                              data-widget_type="button.default"
                            >
                              <div class="elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                  <a
                                    class="elementor-button elementor-button-link elementor-size-sm"
                                    href="aboutus.php"
                                  >
                                    <span
                                      class="elementor-button-content-wrapper"
                                    >
                                      <span class="elementor-button-text"
                                        >Read More About Us</span
                                      >
                                    </span>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section
                      data-particle_enable="false"
                      data-particle-mobile-disabled="false"
                      class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-55a44ca6 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
                      data-id="55a44ca6"
                      data-element_type="section"
                    >
                      <div
                        class="elementor-container elementor-column-gap-default"
                      >
                        <div
                          class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5872f70c"
                          data-id="5872f70c"
                          data-element_type="column"
                        >
                          <div
                            class="elementor-widget-wrap elementor-element-populated"
                          >
                            <div
                              class="elementor-element elementor-element-1a71e69e elementor-widget elementor-widget-wd_title"
                              data-id="1a71e69e"
                              data-element_type="widget"
                              data-widget_type="wd_title.default"
                            >
                              <div class="elementor-widget-container">
                                <div
                                  class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-bordered wd-title-size-default text-center"
                                >
                                  <div class="liner-continer">
                                    <h4
                                      class="woodmart-title-container title wd-fontsize-l"
                                    >
                                      Our Testimonials
                                    </h4>
                                  </div>

                                  <div
                                    class="title-after_title set-cont-mb-s reset-last-child wd-fontsize-xs"
                                  >
                                    <p>
                                      See what our customers have to say about
                                      us!
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="elementor-element elementor-element-24adb0f3 elementor-widget elementor-widget-shortcode"
                              data-id="24adb0f3"
                              data-element_type="widget"
                              data-widget_type="shortcode.default"
                            >
                              <div class="elementor-widget-container">
                                <div class="elementor-shortcode">
                                  <pre
                                    class="ti-widget"
                                  ><div class="ti-widget ti-goog" data-no-translation="true" data-layout-id="5" data-set-id="drop-shadow" data-pid="" data-pager-autoplay-timeout="6" data-review-target-width="275" data-language="en" > <div class="ti-widget-container ti-col-4"> <div class="ti-footer source-Google"> <div class="ti-rating-text"> <strong class="ti-rating ti-rating-large"> Excellent </strong> </div> <span class="ti-stars star-lg"> <span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span> </span> <div class="ti-rating-text"> <span class="nowrap">Based on <strong>43 reviews</strong></span> </div> <div class="ti-large-logo"> <div class="ti-v-center"> <img loading="lazy" decoding="async" class="ti-logo-fb" src="https://cdn.trustindex.io/assets/platform/Google/logo.svg" width="150" height="25" alt="Google" /> </div> </div> </div> <div class="ti-reviews-container"> <div class="ti-controls"> <div class="ti-next"></div> <div class="ti-prev"></div> </div> <div class="ti-reviews-container-wrapper">  <div data-empty="0" class="ti-review-item source-Google" > <div class="ti-inner"> <div class="ti-review-header"> <div class="ti-profile-img"> <img decoding="async" src="https://lh3.googleusercontent.com/a-/AD_cMMRKG-5AwCt0_MLOKX-GwitWMpeBpMge6kQWYsoo=s120-c-c-rp-w64-h64-mo-br100" alt="Sunny Ramawat" /> </div> <div class="ti-profile-details"> <div class="ti-name"> Sunny Ramawat </div> <div class="ti-date">2023-06-14</div> </div> </div> <span class="ti-stars"><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span></span> <div class="ti-review-text-container ti-review-content"><!-- R-CONTENT -->I would like to congratulate SBJNamkeens on such an enjoyable snacking experience. Each namkeen is made precisely, and the variety is mind-boggling. A trip to flavor town begins with crispy boondi and ends with spicy puffed rice. Trust me, you won't resist their irresistible namkeen!🥰😍😍😍<!-- R-CONTENT --></div> <span class="ti-read-more" data-container=".ti-review-content" data-collapse-text="Hide" data-open-text="Read more" ></span> </div> </div>  <div data-empty="0" class="ti-review-item source-Google" > <div class="ti-inner"> <div class="ti-review-header"> <div class="ti-profile-img"> <img decoding="async" src="https://lh3.googleusercontent.com/a-/AD_cMMRmL6bd9p9unmgFSjSjYuGaYQY1keVO5zqq3wQZKg=s120-c-c-rp-w64-h64-mo-br100" alt="Rawal Singh Devraj" /> </div> <div class="ti-profile-details"> <div class="ti-name"> Rawal Singh Devraj </div> <div class="ti-date">2023-06-14</div> </div> </div> <span class="ti-stars"><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span></span> <div class="ti-review-text-container ti-review-content"><!-- R-CONTENT -->Testy<!-- R-CONTENT --></div> <span class="ti-read-more" data-container=".ti-review-content" data-collapse-text="Hide" data-open-text="Read more" ></span> </div> </div>  <div data-empty="0" class="ti-review-item source-Google" > <div class="ti-inner"> <div class="ti-review-header"> <div class="ti-profile-img"> <img decoding="async" src="https://lh3.googleusercontent.com/a-/AD_cMMRaI64yZXlxVxypXT2YfD4eHRaR8YBD41U8Y5EHZg=s120-c-c-rp-w64-h64-mo-br100" alt="Abin Abraham" /> </div> <div class="ti-profile-details"> <div class="ti-name"> Abin Abraham </div> <div class="ti-date">2023-06-14</div> </div> </div> <span class="ti-stars"><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span></span> <div class="ti-review-text-container ti-review-content"><!-- R-CONTENT -->I'm Satisfied!<!-- R-CONTENT --></div> <span class="ti-read-more" data-container=".ti-review-content" data-collapse-text="Hide" data-open-text="Read more" ></span> </div> </div>  <div data-empty="0" class="ti-review-item source-Google" > <div class="ti-inner"> <div class="ti-review-header"> <div class="ti-profile-img"> <img decoding="async" src="https://lh3.googleusercontent.com/a-/AD_cMMTv5TyH0RE_13d0Q9rhEY5F-gQaySg-qVSwWS0HOg=s120-c-c-rp-w64-h64-mo-br100" alt="Pradeep mathur" /> </div> <div class="ti-profile-details"> <div class="ti-name"> Pradeep mathur </div> <div class="ti-date">2023-06-14</div> </div> </div> <span class="ti-stars"><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span></span> <div class="ti-review-text-container ti-review-content"><!-- R-CONTENT -->Delicious, I love it<!-- R-CONTENT --></div> <span class="ti-read-more" data-container=".ti-review-content" data-collapse-text="Hide" data-open-text="Read more" ></span> </div> </div>  <div data-empty="0" class="ti-review-item source-Google" > <div class="ti-inner"> <div class="ti-review-header"> <div class="ti-profile-img"> <img decoding="async" src="https://lh3.googleusercontent.com/a/AAcHTtdU3UtZIIuU8XRnbXXM4NI57pQV5SPeOYdXNbQL=s120-c-c-rp-w64-h64-mo-br100" alt="Krishna Gehlot" /> </div> <div class="ti-profile-details"> <div class="ti-name"> Krishna Gehlot </div> <div class="ti-date">2023-06-14</div> </div> </div> <span class="ti-stars"><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span></span> <div class="ti-review-text-container ti-review-content"><!-- R-CONTENT -->I like SBJNamkeens, all type of namkeen fresh and tasty namkeen available, the good thing is that profitable namkeen are also included. I suggest you try this. 😋😋<!-- R-CONTENT --></div> <span class="ti-read-more" data-container=".ti-review-content" data-collapse-text="Hide" data-open-text="Read more" ></span> </div> </div>  <div data-empty="0" class="ti-review-item source-Google" > <div class="ti-inner"> <div class="ti-review-header"> <div class="ti-profile-img"> <img decoding="async" src="https://lh3.googleusercontent.com/a/AAcHTtd02ZFZyjimj7qNu4YWK7ikkN8RQg_1drOWPYBl=s120-c-c-rp-w64-h64-mo-br100" alt="Reetu Choudhary" /> </div> <div class="ti-profile-details"> <div class="ti-name"> Reetu Choudhary </div> <div class="ti-date">2023-06-12</div> </div> </div> <span class="ti-stars"><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span></span> <div class="ti-review-text-container ti-review-content"><!-- R-CONTENT -->AMAZING!! Just loved it🫶🏻<!-- R-CONTENT --></div> <span class="ti-read-more" data-container=".ti-review-content" data-collapse-text="Hide" data-open-text="Read more" ></span> </div> </div>  <div data-empty="0" class="ti-review-item source-Google" > <div class="ti-inner"> <div class="ti-review-header"> <div class="ti-profile-img"> <img decoding="async" src="https://lh3.googleusercontent.com/a-/AD_cMMR3UwwOQmXy4dLTVp1U7fzqfXzAdcZytOVj_QQrMQ=s120-c-c-rp-w64-h64-mo-br100" alt="Sapna Jain" /> </div> <div class="ti-profile-details"> <div class="ti-name"> Sapna Jain </div> <div class="ti-date">2023-06-12</div> </div> </div> <span class="ti-stars"><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span></span> <div class="ti-review-text-container ti-review-content"><!-- R-CONTENT -->Amazing & delicious namkim you have.. every one should try this ..love the all flavours..good job 👍<!-- R-CONTENT --></div> <span class="ti-read-more" data-container=".ti-review-content" data-collapse-text="Hide" data-open-text="Read more" ></span> </div> </div>  <div data-empty="0" class="ti-review-item source-Google" > <div class="ti-inner"> <div class="ti-review-header"> <div class="ti-profile-img"> <img decoding="async" src="https://lh3.googleusercontent.com/a/AAcHTte28ZBRIrg6VjvBwRZ-2Q_kdIYfuCHKQcIzK4kcnQ=s120-c-c-rp-w64-h64-mo-br100" alt="ravi khatri" /> </div> <div class="ti-profile-details"> <div class="ti-name"> ravi khatri </div> <div class="ti-date">2023-06-12</div> </div> </div> <span class="ti-stars"><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span></span> <div class="ti-review-text-container ti-review-content"><!-- R-CONTENT -->Fresh and tasty must buy it<!-- R-CONTENT --></div> <span class="ti-read-more" data-container=".ti-review-content" data-collapse-text="Hide" data-open-text="Read more" ></span> </div> </div>  <div data-empty="0" class="ti-review-item source-Google" > <div class="ti-inner"> <div class="ti-review-header"> <div class="ti-profile-img"> <img decoding="async" src="https://lh3.googleusercontent.com/a/AAcHTtcMQwaVaonz3W9BieOqvzoQzCkmef_aeivi-thk=s120-c-c-rp-w64-h64-mo-br100" alt="Ashu Singla" /> </div> <div class="ti-profile-details"> <div class="ti-name"> Ashu Singla </div> <div class="ti-date">2023-06-12</div> </div> </div> <span class="ti-stars"><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span></span> <div class="ti-review-text-container ti-review-content"><!-- R-CONTENT -->Keep growing<!-- R-CONTENT --></div> <span class="ti-read-more" data-container=".ti-review-content" data-collapse-text="Hide" data-open-text="Read more" ></span> </div> </div>  </div> <div class="ti-controls-line"> <div class="dot"></div> </div>  </div> </div> </div> </pre>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>

                  </div>
                </div>
              </article>
              <!-- #post -->
            </div>
            <!-- .site-content -->
          </div>
          <!-- .main-page-wrapper -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->


      <?php require_once('footer.php');?>