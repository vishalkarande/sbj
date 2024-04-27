<?php 
session_start();
require_once('admin/query.php');
if (!isset($_SESSION['user'])) {
	echo "<script>window.location.href='login.php';</script>";
}else{
	$orders=$QueryFire->getAllData('orders',' user_id='.$_SESSION['user']['id'].' ORDER BY id desc');

}
	

?>

<!DOCTYPE html>
<html lang="en-US" prefix="og: https://ogp.me/ns#">

<head>
	<meta charset="UTF-8" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="pingback" href="xmlrpc.php" />
	<!-- Optimized with WP Meteor v3.4.0 - https://wordpress.org/plugins/wp-meteor/ -->

	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
      window.MSInputMethodContext && document.documentMode && document.write('<script src="wp-content/themes/woodmart/js/libs/ie11CustomProperties.min.js"><\/script>');
    </script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
      window._wca = window._wca || [];
    </script>

	<!-- Search Engine Optimization by Rank Math - https://rankmath.com/ -->
	<title>Track your order </title>
	<meta name="description" content="Order Tracking" />
	<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
	<link rel="canonical" href="track-order/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Track your order " />
	<meta property="og:description" content="Order Tracking" />
	<meta property="og:url" content="track-order/" />
	<meta property="og:site_name" content="" />
	<meta property="article:author" content="https://www.facebook.com/" />
	<meta property="og:updated_time" content="2023-08-17T10:27:45+05:30" />
	<meta property="article:published_time" content="2023-06-15T03:21:20+05:30" />
	<meta property="article:modified_time" content="2023-08-17T10:27:45+05:30" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="Track your order " />
	<meta name="twitter:description" content="Order Tracking" />
	<meta name="twitter:label1" content="Time to read" />
	<meta name="twitter:data1" content="Less than a minute" />
	<script type="application/ld+json" class="rank-math-schema">
      {
        "@context": "https://schema.org",
        "@graph": [
          {
            "@type": "Organization",
            "@id": "#organization",
            "name": ""
          },
          {
            "@type": "WebSite",
            "@id": "#website",
            "url": "",
            "name": "",
            "publisher": { "@id": "#organization" },
            "inLanguage": "en-US"
          },
          {
            "@type": "WebPage",
            "@id": "track-order/#webpage",
            "url": "track-order/",
            "name": "Track your order ",
            "datePublished": "2023-06-15T03:21:20+05:30",
            "dateModified": "2023-08-17T10:27:45+05:30",
            "isPartOf": { "@id": "#website" },
            "inLanguage": "en-US"
          },
          {
            "@type": "Person",
            "@id": "author//",
            "name": "",
            "url": "author//",
            "image": {
              "@type": "ImageObject",
              "@id": "https://secure.gravatar.com/avatar/80cb3f87f953c593db5fb3f4e3b16c7b?s=96&amp;d=mm&amp;r=g",
              "url": "https://secure.gravatar.com/avatar/80cb3f87f953c593db5fb3f4e3b16c7b?s=96&amp;d=mm&amp;r=g",
              "caption": "",
              "inLanguage": "en-US"
            },
            "sameAs": [
              "",
              "https://www.facebook.com/"
            ],
            "worksFor": { "@id": "#organization" }
          },
          {
            "@type": "Article",
            "headline": "Track your order ",
            "datePublished": "2023-06-15T03:21:20+05:30",
            "dateModified": "2023-08-17T10:27:45+05:30",
            "author": {
              "@id": "author//",
              "name": ""
            },
            "publisher": { "@id": "#organization" },
            "description": "Order Tracking",
            "name": "Track your order ",
            "@id": "track-order/#richSnippet",
            "isPartOf": {
              "@id": "track-order/#webpage"
            },
            "inLanguage": "en-US",
            "mainEntityOfPage": {
              "@id": "track-order/#webpage"
            }
          }
        ]
      }
    </script>
	<!-- /Rank Math WordPress SEO plugin -->

	<link rel="dns-prefetch" href="//stats.wp.com" />
	<link rel="dns-prefetch" href="//www.googletagmanager.com" />
	<link rel="dns-prefetch" href="//fonts.googleapis.com" />
	<link rel="alternate" type="application/rss+xml" title=" &raquo; Feed" href="feed/" />
	<link rel="alternate" type="application/rss+xml" title=" &raquo; Comments Feed" href="comments/feed/" />
	<style id="jetpack-sharing-buttons-style-inline-css" type="text/css">
		.jetpack-sharing-buttons__services-list {
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			gap: 0;
			list-style-type: none;
			margin: 5px;
			padding: 0;
		}

		.jetpack-sharing-buttons__services-list.has-small-icon-size {
			font-size: 12px;
		}

		.jetpack-sharing-buttons__services-list.has-normal-icon-size {
			font-size: 16px;
		}

		.jetpack-sharing-buttons__services-list.has-large-icon-size {
			font-size: 24px;
		}

		.jetpack-sharing-buttons__services-list.has-huge-icon-size {
			font-size: 36px;
		}

		@media print {
			.jetpack-sharing-buttons__services-list {
				display: none !important;
			}
		}

		.editor-styles-wrapper .wp-block-jetpack-sharing-buttons {
			gap: 0;
			padding-inline-start: 0;
		}

		ul.jetpack-sharing-buttons__services-list.has-background {
			padding: 1.25em 2.375em;
		}
	</style>
	<style id="rank-math-toc-block-style-inline-css" type="text/css">
		.wp-block-rank-math-toc-block nav ol {
			counter-reset: item;
		}

		.wp-block-rank-math-toc-block nav ol li {
			display: block;
		}

		.wp-block-rank-math-toc-block nav ol li:before {
			content: counters(item, ".") ". ";
			counter-increment: item;
		}
	</style>
	<style id="classic-theme-styles-inline-css" type="text/css">
		/*! This file is auto-generated */
		.wp-block-button__link {
			color: #fff;
			background-color: #32373c;
			border-radius: 9999px;
			box-shadow: none;
			text-decoration: none;
			padding: calc(0.667em + 2px) calc(1.333em + 2px);
			font-size: 1.125em;
		}

		.wp-block-file__button {
			background: #32373c;
			color: #fff;
			text-decoration: none;
		}
	</style>
	<style id="global-styles-inline-css" type="text/css">
		body {
			--wp--preset--color--black: #000000;
			--wp--preset--color--cyan-bluish-gray: #abb8c3;
			--wp--preset--color--white: #ffffff;
			--wp--preset--color--pale-pink: #f78da7;
			--wp--preset--color--vivid-red: #cf2e2e;
			--wp--preset--color--luminous-vivid-orange: #ff6900;
			--wp--preset--color--luminous-vivid-amber: #fcb900;
			--wp--preset--color--light-green-cyan: #7bdcb5;
			--wp--preset--color--vivid-green-cyan: #00d084;
			--wp--preset--color--pale-cyan-blue: #8ed1fc;
			--wp--preset--color--vivid-cyan-blue: #0693e3;
			--wp--preset--color--vivid-purple: #9b51e0;
			--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,
					rgba(6, 147, 227, 1) 0%,
					rgb(155, 81, 224) 100%);
			--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,
					rgb(122, 220, 180) 0%,
					rgb(0, 208, 130) 100%);
			--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,
					rgba(252, 185, 0, 1) 0%,
					rgba(255, 105, 0, 1) 100%);
			--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,
					rgba(255, 105, 0, 1) 0%,
					rgb(207, 46, 46) 100%);
			--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,
					rgb(238, 238, 238) 0%,
					rgb(169, 184, 195) 100%);
			--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,
					rgb(74, 234, 220) 0%,
					rgb(151, 120, 209) 20%,
					rgb(207, 42, 186) 40%,
					rgb(238, 44, 130) 60%,
					rgb(251, 105, 98) 80%,
					rgb(254, 248, 76) 100%);
			--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,
					rgb(255, 206, 236) 0%,
					rgb(152, 150, 240) 100%);
			--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,
					rgb(254, 205, 165) 0%,
					rgb(254, 45, 45) 50%,
					rgb(107, 0, 62) 100%);
			--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,
					rgb(255, 203, 112) 0%,
					rgb(199, 81, 192) 50%,
					rgb(65, 88, 208) 100%);
			--wp--preset--gradient--pale-ocean: linear-gradient(135deg,
					rgb(255, 245, 203) 0%,
					rgb(182, 227, 212) 50%,
					rgb(51, 167, 181) 100%);
			--wp--preset--gradient--electric-grass: linear-gradient(135deg,
					rgb(202, 248, 128) 0%,
					rgb(113, 206, 126) 100%);
			--wp--preset--gradient--midnight: linear-gradient(135deg,
					rgb(2, 3, 129) 0%,
					rgb(40, 116, 252) 100%);
			--wp--preset--font-size--small: 13px;
			--wp--preset--font-size--medium: 20px;
			--wp--preset--font-size--large: 36px;
			--wp--preset--font-size--x-large: 42px;
			--wp--preset--spacing--20: 0.44rem;
			--wp--preset--spacing--30: 0.67rem;
			--wp--preset--spacing--40: 1rem;
			--wp--preset--spacing--50: 1.5rem;
			--wp--preset--spacing--60: 2.25rem;
			--wp--preset--spacing--70: 3.38rem;
			--wp--preset--spacing--80: 5.06rem;
			--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
			--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1),
				6px 6px rgba(0, 0, 0, 1);
			--wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
		}

		:where(.is-layout-flex) {
			gap: 0.5em;
		}

		:where(.is-layout-grid) {
			gap: 0.5em;
		}

		body .is-layout-flow>.alignleft {
			float: left;
			margin-inline-start: 0;
			margin-inline-end: 2em;
		}

		body .is-layout-flow>.alignright {
			float: right;
			margin-inline-start: 2em;
			margin-inline-end: 0;
		}

		body .is-layout-flow>.aligncenter {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-constrained>.alignleft {
			float: left;
			margin-inline-start: 0;
			margin-inline-end: 2em;
		}

		body .is-layout-constrained>.alignright {
			float: right;
			margin-inline-start: 2em;
			margin-inline-end: 0;
		}

		body .is-layout-constrained>.aligncenter {
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
			max-width: var(--wp--style--global--content-size);
			margin-left: auto !important;
			margin-right: auto !important;
		}

		body .is-layout-constrained>.alignwide {
			max-width: var(--wp--style--global--wide-size);
		}

		body .is-layout-flex {
			display: flex;
		}

		body .is-layout-flex {
			flex-wrap: wrap;
			align-items: center;
		}

		body .is-layout-flex>* {
			margin: 0;
		}

		body .is-layout-grid {
			display: grid;
		}

		body .is-layout-grid>* {
			margin: 0;
		}

		:where(.wp-block-columns.is-layout-flex) {
			gap: 2em;
		}

		:where(.wp-block-columns.is-layout-grid) {
			gap: 2em;
		}

		:where(.wp-block-post-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-grid) {
			gap: 1.25em;
		}

		.has-black-color {
			color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-color {
			color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-color {
			color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-color {
			color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-color {
			color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-color {
			color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-color {
			color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-color {
			color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-color {
			color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-color {
			color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-color {
			color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-color {
			color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-background-color {
			background-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-background-color {
			background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-background-color {
			background-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-background-color {
			background-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-background-color {
			background-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-background-color {
			background-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-background-color {
			background-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-background-color {
			background-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-background-color {
			background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-background-color {
			background-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-border-color {
			border-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-border-color {
			border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-border-color {
			border-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-border-color {
			border-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-border-color {
			border-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-border-color {
			border-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-border-color {
			border-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-border-color {
			border-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-border-color {
			border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-border-color {
			border-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-vivid-cyan-blue-to-vivid-purple-gradient-background {
			background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
		}

		.has-light-green-cyan-to-vivid-green-cyan-gradient-background {
			background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
		}

		.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-orange-to-vivid-red-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
		}

		.has-very-light-gray-to-cyan-bluish-gray-gradient-background {
			background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
		}

		.has-cool-to-warm-spectrum-gradient-background {
			background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
		}

		.has-blush-light-purple-gradient-background {
			background: var(--wp--preset--gradient--blush-light-purple) !important;
		}

		.has-blush-bordeaux-gradient-background {
			background: var(--wp--preset--gradient--blush-bordeaux) !important;
		}

		.has-luminous-dusk-gradient-background {
			background: var(--wp--preset--gradient--luminous-dusk) !important;
		}

		.has-pale-ocean-gradient-background {
			background: var(--wp--preset--gradient--pale-ocean) !important;
		}

		.has-electric-grass-gradient-background {
			background: var(--wp--preset--gradient--electric-grass) !important;
		}

		.has-midnight-gradient-background {
			background: var(--wp--preset--gradient--midnight) !important;
		}

		.has-small-font-size {
			font-size: var(--wp--preset--font-size--small) !important;
		}

		.has-medium-font-size {
			font-size: var(--wp--preset--font-size--medium) !important;
		}

		.has-large-font-size {
			font-size: var(--wp--preset--font-size--large) !important;
		}

		.has-x-large-font-size {
			font-size: var(--wp--preset--font-size--x-large) !important;
		}

		.wp-block-navigation a:where(:not(.wp-element-button)) {
			color: inherit;
		}

		:where(.wp-block-post-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-grid) {
			gap: 1.25em;
		}

		:where(.wp-block-columns.is-layout-flex) {
			gap: 2em;
		}

		:where(.wp-block-columns.is-layout-grid) {
			gap: 2em;
		}

		.wp-block-pullquote {
			font-size: 1.5em;
			line-height: 1.6;
		}
	</style>
	<style id="woocommerce-inline-inline-css" type="text/css">
		.woocommerce form .form-row .required {
			visibility: visible;
		}
	</style>
	<link rel="stylesheet" id="wpo_min-header-0-css"
		href="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-09fede6a.min.css" type="text/css"
		media="all" />
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-wp-polyfill-inert3.1.2.min.js"
		id="wpo_min-header-0-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-regenerator-runtime0.14.0.min.js"
		id="wpo_min-header-1-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-wp-polyfill-inertregenerator-runtimewp-polyfill3.1.20.14.03.15.0.min.js"
		id="wpo_min-header-2-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-wp-polyfillwp-hooks3.15.02810c76e705dd1a53b18.min.js"
		id="wpo_min-header-3-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" data-wpmeteor-src="https://stats.wp.com/w.js"
		id="woo-tracks-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jquery-core3.7.1.min.js"
		id="wpo_min-header-5-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jquery-migrate3.4.1.min.js"
		id="wpo_min-header-6-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-blockui3.7.12.7.0-wc.8.7.0.min.js"
		id="wpo_min-header-7-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-header-8-js-extra">
      /* <![CDATA[ */
      var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=2197","i18n_view_cart":"View cart","cart_url":"https:\/\/\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
      /* ]]> */
    </script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-blockuiwc-add-to-cart3.7.12.7.0-wc.8.7.08.7.0.min.js"
		id="wpo_min-header-8-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-js-cookie2.1.4-wc.8.7.0.min.js"
		id="wpo_min-header-9-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-header-10-js-extra">
      /* <![CDATA[ */
      var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=2197"};
      /* ]]> */
    </script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-blockuijs-cookiewoocommerce3.7.12.7.0-wc.8.7.02.1.4-wc.8.7.08.7.0.min.js"
		id="wpo_min-header-10-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="" id="woocommerce-analytics-js" defer="defer"
		data-wp-strategy="defer"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-header-12-js-extra">
      /* <![CDATA[ */
      var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=2197","cart_hash_key":"wc_cart_hash_922703ab473fa9b909b138c94b1e78ba","fragment_name":"wc_fragments_922703ab473fa9b909b138c94b1e78ba","request_timeout":"5000"};
      /* ]]> */
    </script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjs-cookiewc-cart-fragments3.7.12.1.4-wc.8.7.08.7.0.min.js"
		id="wpo_min-header-12-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjquery-bind-first3.7.1.min.js"
		id="wpo_min-header-13-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-js-cookie-pys2.1.3.min.js"
		id="wpo_min-header-14-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-header-15-js-extra">
      /* <![CDATA[ */
      var pysOptions = {"staticEvents":[],"dynamicEvents":[],"triggerEvents":[],"triggerEventTypes":[],"debug":"","siteUrl":"https:\/\/","ajaxUrl":"https:\/\/\/wp-admin\/admin-ajax.php","ajax_event":"ef3f681bba","enable_remove_download_url_param":"1","cookie_duration":"7","last_visit_duration":"60","enable_success_send_form":"","ajaxForServerEvent":"1","send_external_id":"1","external_id_expire":"180","google_consent_mode":"1","gdpr":{"ajax_enabled":false,"all_disabled_by_api":false,"facebook_disabled_by_api":false,"analytics_disabled_by_api":false,"google_ads_disabled_by_api":false,"pinterest_disabled_by_api":false,"bing_disabled_by_api":false,"externalID_disabled_by_api":false,"facebook_prior_consent_enabled":true,"analytics_prior_consent_enabled":true,"google_ads_prior_consent_enabled":null,"pinterest_prior_consent_enabled":true,"bing_prior_consent_enabled":true,"cookiebot_integration_enabled":false,"cookiebot_facebook_consent_category":"marketing","cookiebot_analytics_consent_category":"statistics","cookiebot_tiktok_consent_category":"marketing","cookiebot_google_ads_consent_category":null,"cookiebot_pinterest_consent_category":"marketing","cookiebot_bing_consent_category":"marketing","consent_magic_integration_enabled":false,"real_cookie_banner_integration_enabled":false,"cookie_notice_integration_enabled":false,"cookie_law_info_integration_enabled":false,"analytics_storage":{"enabled":true,"value":"granted","filter":false},"ad_storage":{"enabled":true,"value":"granted","filter":false},"ad_user_data":{"enabled":true,"value":"granted","filter":false},"ad_personalization":{"enabled":true,"value":"granted","filter":false}},"cookie":{"disabled_all_cookie":false,"disabled_start_session_cookie":false,"disabled_advanced_form_data_cookie":false,"disabled_landing_page_cookie":false,"disabled_first_visit_cookie":false,"disabled_trafficsource_cookie":false,"disabled_utmTerms_cookie":false,"disabled_utmId_cookie":false},"tracking_analytics":{"TrafficSource":"direct","TrafficLanding":"undefined","TrafficUtms":[],"TrafficUtmsId":[]},"woo":{"enabled":true,"enabled_save_data_to_orders":true,"addToCartOnButtonEnabled":true,"addToCartOnButtonValueEnabled":true,"addToCartOnButtonValueOption":"price","singleProductId":null,"removeFromCartSelector":"form.woocommerce-cart-form .remove","addToCartCatchMethod":"add_cart_hook","is_order_received_page":false,"containOrderId":false},"edd":{"enabled":false}};
      /* ]]> */
    </script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jqueryjs-cookie-pysjquery-bind-firstpys3.7.12.1.39.5.5.min.js"
		id="wpo_min-header-15-js"></script>

	<!-- Google tag (gtag.js) snippet added by Site Kit -->

	<!-- Google Analytics snippet added by Site Kit -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="https://www.googletagmanager.com/gtag/js?id=GT-PJNB9QPL" id="google_gtagjs-js"
		async></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="google_gtagjs-js-after">
      /* <![CDATA[ */
      window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}
      gtag("set","linker",{"domains":[""]});
      gtag("js", new Date());
      gtag("set", "developer_id.dZTNiMT", true);
      gtag("config", "GT-PJNB9QPL");
      /* ]]> */
    </script>

	<!-- End Google tag (gtag.js) snippet added by Site Kit -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-header-jquerywd-device-library3.7.17.1.4.min.js"
		id="wpo_min-header-17-js"></script>
	<link rel="https://api.w.org/" href="wp-json/" />
	<link rel="alternate" type="application/json" href="wp-json/wp/v2/pages/2197" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc.php?rsd" />
	<meta name="generator" content="WordPress 6.5.2" />
	<link rel="shortlink" href="?p=2197" />
	<link rel="alternate" type="application/json+oembed"
		href="wp-json/oembed/1.0/embed?url=https%3A%2F%2F%2Ftrack-order%2F" />
	<link rel="alternate" type="text/xml+oembed"
		href="wp-json/oembed/1.0/embed?url=https%3A%2F%2F%2Ftrack-order%2F&#038;format=xml" />
	<meta name="generator" content="Site Kit by Google 1.124.0" />
	<!-- Google tag (gtag.js) -->
	<!-- <script  type="javascript/blocked" data-wpmeteor-type="text/javascript"  async data-wpmeteor-src="https://www.googletagmanager.com/gtag/js?id=UA-269068220-1"></script>
<script  type="javascript/blocked" data-wpmeteor-type="text/javascript" >
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-269068220-1');
</script>
 -->
	<!-- Google Tag Manager -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-K2CZWRP');
    </script>
	<!-- End Google Tag Manager -->
	<meta name="facebook-domain-verification" content="kx1eppvmtjv31auyzv53zejkvu70b5" />
	<style>
		img#wpstats {
			display: none;
		}
	</style>
	<meta name="theme-color" content="rgb(53,94,59)" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<noscript>
		<style>
			.woocommerce-product-gallery {
				opacity: 1 !important;
			}
		</style>
	</noscript>
	<meta name="generator"
		content="Elementor 3.20.4; features: e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints, block_editor_assets_optimize, e_image_loading_optimization; settings: css_print_method-external, google_font-enabled, font_display-swap" />
	<!-- Facebook Pixel Code -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
      !function (f, b, e, v, n, t, s) {
      	if (f.fbq) return;
      	n = f.fbq = function () {
      		n.callMethod ?
      			n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      	};
      	if (!f._fbq) f._fbq = n;
      	n.push = n;
      	n.loaded = !0;
      	n.version = '2.0';
      	n.queue = [];
      	t = b.createElement(e);
      	t.async = !0;
      	t.src = v;
      	s = b.getElementsByTagName(e)[0];
      	s.parentNode.insertBefore(t, s)
      }(window, document, 'script',
      	'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1962479990797312');
      		fbq( 'track', 'PageView' );
    </script>

	<!-- Google Tag Manager snippet added by Site Kit -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
      /* <![CDATA[ */

      			( function( w, d, s, l, i ) {
      				w[l] = w[l] || [];
      				w[l].push( {'gtm.start': new Date().getTime(), event: 'gtm.js'} );
      				var f = d.getElementsByTagName( s )[0],
      					j = d.createElement( s ), dl = l != 'dataLayer' ? '&l=' + l : '';
      				j.async = true;
      				j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      				f.parentNode.insertBefore( j, f );
      			} )( window, document, 'script', 'dataLayer', 'GTM-K8G9NDDJ' );

      /* ]]> */
    </script>

	<!-- End Google Tag Manager snippet added by Site Kit -->
	<link rel="icon" href="wp-content/uploads/2024/01/slazzer-edit-image-1-32x32.png" sizes="32x32" />
	<link rel="icon" href="wp-content/uploads/2024/01/slazzer-edit-image-1-300x300.png" sizes="192x192" />
	<link rel="apple-touch-icon" href="wp-content/uploads/2024/01/slazzer-edit-image-1-300x300.png" />
	<meta name="msapplication-TileImage" content="wp-content/uploads/2024/01/slazzer-edit-image-1-300x300.png" />
	<style type="text/css" id="wp-custom-css">
		.sku_wrapper {
			display: none !important;
		}

		.product-tabs-wrapper {
			background-color: rgb(245, 245, 245) !important
		}

		.wc-cancel-order::after {
			content: "Order"
		}

		.wc-cancel-order::after {
			content: none;
		}

		.wd-entities-title {
			font-weight: 600 !important;
			font-size: 16px !important;
			white-space: nowrap !important;
			overflow: hidden !important;
			text-overflow: ellipsis !important;
			width: 100%;
		}

		.wd-entities-title>a {
			white-space: nowrap !important;
			overflow: hidden !important;
			text-overflow: ellipsis !important;
			width: 100%;
			display: inline-block;
		}

		.wd-empty-page:before {
			color: #355e3b !important;
		}

		.wd-empty-mini-cart:before {
			color: #355e3b !important;
		}

		/* .required{
      	display:none;
      } */



		.cart-actions .button[name="update_cart"] {
			display: none;
		}


		/* Style the empty cart button */
		.button.empty-cart {
			background-color: #963232;
			color: #fff;
			padding: 10px 20px;
			border-radius: 5px;

		}

		.button.empty-cart:hover {
			background-color: #963232;
		}

		.quick-shop-wrapper [class*="wd-reset-bottom"].variation-swatch-selected {
			--wd-var-table-mb: 5px !important;
		}
	</style>
	<style></style>
	<style>
		:root {
			--qlwapp-scheme-font-family: inherit;
			--qlwapp-scheme-font-size: 18px;
			--qlwapp-scheme-icon-size: 60px;
			--qlwapp-scheme-icon-font-size: 24px;
			--qlwapp-button-animation-name: none;
		}
	</style>
	<style id="wpforms-css-vars-root">
		:root {
			--wpforms-field-border-radius: 3px;
			--wpforms-field-background-color: #ffffff;
			--wpforms-field-border-color: rgba(0, 0, 0, 0.25);
			--wpforms-field-text-color: rgba(0, 0, 0, 0.7);
			--wpforms-label-color: rgba(0, 0, 0, 0.85);
			--wpforms-label-sublabel-color: rgba(0, 0, 0, 0.55);
			--wpforms-label-error-color: #d63637;
			--wpforms-button-border-radius: 3px;
			--wpforms-button-background-color: #066aab;
			--wpforms-button-text-color: #ffffff;
			--wpforms-page-break-color: #066aab;
			--wpforms-field-size-input-height: 43px;
			--wpforms-field-size-input-spacing: 15px;
			--wpforms-field-size-font-size: 16px;
			--wpforms-field-size-line-height: 19px;
			--wpforms-field-size-padding-h: 14px;
			--wpforms-field-size-checkbox-size: 16px;
			--wpforms-field-size-sublabel-spacing: 5px;
			--wpforms-field-size-icon-size: 1;
			--wpforms-label-size-font-size: 16px;
			--wpforms-label-size-line-height: 19px;
			--wpforms-label-size-sublabel-font-size: 14px;
			--wpforms-label-size-sublabel-line-height: 17px;
			--wpforms-button-size-font-size: 17px;
			--wpforms-button-size-height: 41px;
			--wpforms-button-size-padding-h: 15px;
			--wpforms-button-size-margin-top: 10px;
		}
	</style>
</head>

<body
	class="page-template-default page page-id-2197 theme-woodmart woocommerce-no-js wrapper-full-width woodmart-ajax-shop-on offcanvas-sidebar-mobile offcanvas-sidebar-tablet sticky-toolbar-on elementor-default elementor-kit-227 elementor-page elementor-page-2197">
	<!-- Google Tag Manager (noscript) snippet added by Site Kit -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8G9NDDJ" height="0" width="0"
			style="display: none; visibility: hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) snippet added by Site Kit -->
	<!-- Google Tag Manager (noscript) -->
	<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2CZWRP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
	<!-- End Google Tag Manager (noscript) -->
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wd-flicker-fix">

    </script>

	<div class="website-wrapper">



		<header class="whb-header whb-default_header whb-sticky-shadow whb-scroll-stick whb-sticky-real">
			<link rel="stylesheet" id="wd-header-base-css"
				href="wp-content/themes/woodmart/css/parts/header-base.min.css?ver=7.1.4" type="text/css" media="all" />
			<link rel="stylesheet" id="wd-mod-tools-css"
				href="wp-content/themes/woodmart/css/parts/mod-tools.min.css?ver=7.1.4" type="text/css" media="all" />
			<div class="whb-main-header">
				<div
					class="whb-row whb-top-bar whb-not-sticky-row whb-with-bg whb-without-border whb-color-dark whb-flex-flex-middle">
					<div class="container">
						<div class="whb-flex-row whb-top-bar-inner">
							<div class="whb-column whb-col-left whb-visible-lg whb-empty-column"></div>
							<div class="whb-column whb-col-center whb-visible-lg">
								<link rel="stylesheet" id="wd-header-elements-base-css"
									href="wp-content/themes/woodmart/css/parts/header-el-base.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<div class="wd-header-text set-cont-mb-s reset-last-child">
									<h5 style="text-align: center">
										<span style="color: #ffffff">Navratri Sale Live! Flat 10% off on orders above
											₹499.
											Code: "NAVRATRI"</span>
									</h5>
								</div>
							</div>
							<div class="whb-column whb-col-right whb-visible-lg whb-empty-column"></div>
							<div class="whb-column whb-col-mobile whb-hidden-lg">
								<div class="wd-header-text set-cont-mb-s reset-last-child">
									<h5 style="text-align: center">
										<span style="color: #ffffff">Navratri Sale Live! Flat 10% off on orders above
											₹499.
											Code: "NAVRATRI</span>
									</h5>
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
										<img src="wp-content/uploads/2024/01/slazzer-edit-image-1.png" alt=""
											style="max-width: 250px" />
									</a>
								</div>
							</div>
							<div class="whb-column whb-col-center whb-visible-lg">
								<div class="wd-header-nav wd-header-main-nav text-left wd-design-1" role="navigation"
									aria-label="Main navigation">
									<ul id="menu-main-menu" class="menu wd-nav wd-nav-main wd-style-default wd-gap-s">
										<li id="menu-item-1380"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1380 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="index.php" class="woodmart-nav-link"><span
													class="nav-link-text">Home</span></a>
										</li>
										<li id="menu-item-1388"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1388 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="aboutus.php" class="woodmart-nav-link"><span
													class="nav-link-text">About Us</span></a>
										</li>
										<li id="menu-item-1381"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1381 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="products.php" class="woodmart-nav-link"><span
													class="nav-link-text">Products</span></a>

										</li>
										<li id="menu-item-1389"
											class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1389 item-level-0 menu-simple-dropdown wd-event-hover">
											<a href="contact-us/" class="woodmart-nav-link"><span
													class="nav-link-text">Contact Us</span></a>
										</li>
									</ul>
								</div>
								<!--END MAIN-NAV-->
								<link rel="stylesheet" id="wd-header-search-css"
									href="wp-content/themes/woodmart/css/parts/header-el-search.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-header-search-form-css"
									href="wp-content/themes/woodmart/css/parts/header-el-search-form.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-wd-search-results-css"
									href="wp-content/themes/woodmart/css/parts/wd-search-results.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-wd-search-form-css"
									href="wp-content/themes/woodmart/css/parts/wd-search-form.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<div
									class="wd-search-form wd-header-search-form wd-display-form whb-duljtjrl87kj7pmuut6b">
									<form role="search" method="get"
										class="searchform wd-style-default wd-cat-style-bordered woodmart-ajax-search"
										action="" data-thumbnail="1" data-price="1" data-post_type="product"
										data-count="20" data-sku="0" data-symbols_count="3">
										<input type="text" class="s" placeholder="Search for products" value="" name="s"
											aria-label="Search" title="Search for products" required />
										<input type="hidden" name="post_type" value="product" />
										<button type="submit" class="searchsubmit">
											<span> Search </span>
										</button>
									</form>

									<div class="search-results-wrapper">
										<div class="wd-dropdown-results wd-scroll wd-dropdown">
											<div class="wd-scroll-content"></div>
										</div>
									</div>
								</div>
								<div class="whb-space-element" style="width: 30px"></div>
							</div>
							<div class="whb-column whb-col-right whb-visible-lg">
								<link rel="stylesheet" id="wd-header-my-account-dropdown-css"
									href="wp-content/themes/woodmart/css/parts/header-el-my-account-dropdown.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-woo-mod-login-form-css"
									href="wp-content/themes/woodmart/css/parts/woo-mod-login-form.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-header-my-account-css"
									href="wp-content/themes/woodmart/css/parts/header-el-my-account.min.css?ver=7.1.4"
									type="text/css" media="all" />
								
                
                  




								<link rel="stylesheet" id="wd-header-cart-side-css"
									href="wp-content/themes/woodmart/css/parts/header-el-cart-side.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-woo-mod-quantity-css"
									href="wp-content/themes/woodmart/css/parts/woo-mod-quantity.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-header-cart-css"
									href="wp-content/themes/woodmart/css/parts/header-el-cart.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-widget-shopping-cart-css"
									href="wp-content/themes/woodmart/css/parts/woo-widget-shopping-cart.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<link rel="stylesheet" id="wd-widget-product-list-css"
									href="wp-content/themes/woodmart/css/parts/woo-widget-product-list.min.css?ver=7.1.4"
									type="text/css" media="all" />
								<div
									class="wd-header-cart wd-tools-element wd-design-5 cart-widget-opener whb-5u866sftq6yga790jxf3">
									<a href="cart/" title="Shopping cart">
										<span class="wd-tools-icon wd-icon-alt">
											<span class="wd-cart-number wd-tools-count">8 <span>items</span></span>
										</span>
										<span class="wd-tools-text">
											<span class="wd-cart-subtotal"><span
													class="woocommerce-Price-amount amount"><bdi><span
															class="woocommerce-Price-currencySymbol">&#8377;</span>4,903.00</bdi></span></span>
										</span>
									</a>
								</div>
							</div>
							<div class="whb-column whb-mobile-left whb-hidden-lg">
								<div
									class="wd-tools-element wd-header-mobile-nav wd-style-icon wd-design-1 whb-wn5z894j1g5n0yp3eeuz">
									<a href="index.php" rel="nofollow" aria-label="Open mobile menu">
										<span class="wd-tools-icon"> </span>

										<span class="wd-tools-text">Menu</span>
									</a>
								</div>
								<!--END wd-header-mobile-nav-->
							</div>
							<div class="whb-column whb-mobile-center whb-hidden-lg">
								<div class="site-logo">
									<a href="index.php" class="wd-logo wd-main-logo" rel="home">
										<img src="wp-content/uploads/2024/01/slazzer-edit-image-1.png" alt=""
											style="max-width: 149px" />
									</a>
								</div>
							</div>
							<div class="whb-column whb-mobile-right whb-hidden-lg">
								<div
									class="wd-header-search wd-tools-element wd-header-search-mobile wd-display-icon whb-6o3ywcqlos79wmtp8ui8 wd-style-icon wd-design-1">
									<a href="index.php" rel="nofollow noopener" aria-label="Search">
										<span class="wd-tools-icon"> </span>

										<span class="wd-tools-text"> Search </span>
									</a>
								</div>

								<div
									class="wd-header-cart wd-tools-element wd-design-5 cart-widget-opener whb-u6cx6mzhiof1qeysah9h">
									<a href="cart.php" title="Shopping cart">
										<span class="wd-tools-icon wd-icon-alt">
											<span class="wd-cart-number wd-tools-count">8 <span>items</span></span>
										</span>
										<span class="wd-tools-text">
											<span class="wd-cart-subtotal"><span
													class="woocommerce-Price-amount amount"><bdi><span
															class="woocommerce-Price-currencySymbol">&#8377;</span>4,903.00</bdi></span></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="main-page-wrapper">

			<link rel="stylesheet" id="wd-page-title-css"
				href="wp-content/themes/woodmart/css/parts/page-title.min.css?ver=7.1.4" type="text/css" media="all" />
			<div class="page-title  page-title-default title-size-small title-design-centered color-scheme-light"
				style="">
				<div class="container">
					<h1 class="entry-title title">
						Track your order </h1>


				</div>
			</div>

			<!-- MAIN CONTENT AREA -->
			<div class="container">
				<div class="row content-layout-wrapper align-items-start">

					<div class="site-content col-lg-12 col-12 col-md-12" role="main">

						<article id="post-2197" class="post-2197 page type-page status-publish hentry">

							<div class="entry-content">
								<div data-elementor-type="wp-page" data-elementor-id="2197"
									class="elementor elementor-2197" data-elementor-post-type="page">
									<section data-particle_enable="false" data-particle-mobile-disabled="false"
										class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-64467d09 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
										data-id="64467d09" data-element_type="section">
										<div class="elementor-container elementor-column-gap-default">
											<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6e2ee7c"
												data-id="6e2ee7c" data-element_type="column">
												<div class="elementor-widget-wrap elementor-element-populated">
													<div class="elementor-element elementor-element-11a38ef9 elementor-widget elementor-widget-wd_title"
														data-id="11a38ef9" data-element_type="widget"
														data-widget_type="wd_title.default">
														<div class="elementor-widget-container">
															<link rel="stylesheet" id="wd-section-title-css"
																href="wp-content/themes/woodmart/css/parts/el-section-title.min.css?ver=7.1.4"
																type="text/css" media="all" />
															<div
																class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-center">


																<div class="liner-continer">
																	<h4
																		class="woodmart-title-container title wd-fontsize-l">
																		Order Tracking</h4>
																</div>

															</div>
														</div>
													</div>
													<div class="elementor-element elementor-element-6bead01b elementor-widget elementor-widget-wc-elements"
														data-id="6bead01b" data-element_type="widget"
														data-widget_type="wc-elements.default">


														<div class="container" style=" overflow-x: scroll;">


															<table id="table" data-toggle="table" data-search="true"
																data-filter-control="true" data-show-export="true"
																data-click-to-select="true" data-toolbar="#toolbar"
																class="table-responsive">
																<thead>
																	<tr>
																		<th data-field="state" data-checkbox="true">
																		</th>
																		<th data-field="prenom"
																			data-filter-control="input"
																			data-sortable="true">Name</th>
																		<th data-field="date"
																			data-filter-control="select"
																			data-sortable="true">Address</th>
																		<th data-field="examen"
																			data-filter-control="select"
																			data-sortable="true">Total Amount</th>
																		<th data-field="note" data-sortable="true">Order
																			Date</th>
																	</tr>
																</thead>
																<tbody>

																	<?php foreach($orders as $row){
		?>
																	<tr>
																		<td class="bs-checkbox "><a
																				href="orderDetail.php?id=<?=$row["id"]
																				?>"><button name="track">Show
																					Detail</button></a></td>
																		<td>
																			<?=$row["user_name"] ?>
																		</td>
																		<td>
																			<?=$row["address"] ?>
																		</td>
																		<td>
																			<?=$row["grand_total"] ?>
																		</td>
																		<td>
																			<?=$row["date"] ?>
																		</td>

																	</tr>

																	<?php } ?>

																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
									</section>
								</div>
							</div>


						</article><!-- #post -->



					</div><!-- .site-content -->



					<link rel="stylesheet" id="wd-widget-collapse-css"
						href="wp-content/themes/woodmart/css/parts/opt-widget-collapse.min.css?ver=7.1.4"
						type="text/css" media="all" />
				</div><!-- .main-page-wrapper -->
			</div> <!-- end row -->
		</div> <!-- end container -->

		<script>
		</script>
		<footer class="footer-container color-scheme-light">
			<link rel="stylesheet" id="wd-footer-base-css"
				href="wp-content/themes/woodmart/css/parts/footer-base.min.css?ver=7.1.4" type="text/css" media="all" />
			<div class="container main-footer">
				<link rel="stylesheet" id="elementor-post-2129-css"
					href="wp-content/uploads/elementor/css/post-2129.css?ver=1712761393" type="text/css" media="all">
				<div data-elementor-type="wp-post" data-elementor-id="2129" class="elementor elementor-2129"
					data-elementor-post-type="cms_block">
					<section data-particle_enable="false" data-particle-mobile-disabled="false"
						class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-93e20ab wd-section-stretch elementor-section-boxed elementor-section-height-default elementor-section-height-default"
						data-id="93e20ab" data-element_type="section"
						data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-23181e4"
								data-id="23181e4" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-e28036a elementor-position-top elementor-widget elementor-widget-image-box"
										data-id="e28036a" data-element_type="widget"
										data-widget_type="image-box.default">
										<div class="elementor-widget-container">
											<style>
												/*! elementor - v3.20.0 - 10-04-2024 */
												.elementor-widget-image-box .elementor-image-box-content {
													width: 100%
												}

												@media (min-width:768px) {

													.elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper,
													.elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
														display: flex
													}

													.elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
														text-align: right;
														flex-direction: row-reverse
													}

													.elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper {
														text-align: left;
														flex-direction: row
													}

													.elementor-widget-image-box.elementor-position-top .elementor-image-box-img {
														margin: auto
													}

													.elementor-widget-image-box.elementor-vertical-align-top .elementor-image-box-wrapper {
														align-items: flex-start
													}

													.elementor-widget-image-box.elementor-vertical-align-middle .elementor-image-box-wrapper {
														align-items: center
													}

													.elementor-widget-image-box.elementor-vertical-align-bottom .elementor-image-box-wrapper {
														align-items: flex-end
													}
												}

												@media (max-width:767px) {
													.elementor-widget-image-box .elementor-image-box-img {
														margin-left: auto !important;
														margin-right: auto !important;
														margin-bottom: 15px
													}
												}

												.elementor-widget-image-box .elementor-image-box-img {
													display: inline-block
												}

												.elementor-widget-image-box .elementor-image-box-title a {
													color: inherit
												}

												.elementor-widget-image-box .elementor-image-box-wrapper {
													text-align: center
												}

												.elementor-widget-image-box .elementor-image-box-description {
													margin: 0
												}
											</style>
											<div class="elementor-image-box-wrapper">
												<figure class="elementor-image-box-img"><img width="512" height="512"
														src="wp-content/uploads/2023/06/premium.png"
														class="attachment-full size-full wp-image-2121" alt="" />
												</figure>
												<div class="elementor-image-box-content">
													<h3 class="elementor-image-box-title">Premium Products</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-1283b3a"
								data-id="1283b3a" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-74934b0 elementor-position-top elementor-widget elementor-widget-image-box"
										data-id="74934b0" data-element_type="widget"
										data-widget_type="image-box.default">
										<div class="elementor-widget-container">
											<div class="elementor-image-box-wrapper">
												<figure class="elementor-image-box-img"><img width="512" height="512"
														src="wp-content/uploads/2023/06/healthy-heart.png"
														class="attachment-full size-full wp-image-10916" alt="" />
												</figure>
												<div class="elementor-image-box-content">
													<h3 class="elementor-image-box-title">Healthy Snacks</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-9b1581f"
								data-id="9b1581f" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-8a0cf4c elementor-position-top elementor-widget elementor-widget-image-box"
										data-id="8a0cf4c" data-element_type="widget"
										data-widget_type="image-box.default">
										<div class="elementor-widget-container">
											<div class="elementor-image-box-wrapper">
												<figure class="elementor-image-box-img"><img width="512" height="512"
														src="wp-content/uploads/2023/06/delivery-car.png"
														class="attachment-full size-full wp-image-2123" alt="" />
												</figure>
												<div class="elementor-image-box-content">
													<h3 class="elementor-image-box-title">Fast Delivery</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-b8bb875"
								data-id="b8bb875" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-00d9126 elementor-position-top elementor-widget elementor-widget-image-box"
										data-id="00d9126" data-element_type="widget"
										data-widget_type="image-box.default">
										<div class="elementor-widget-container">
											<div class="elementor-image-box-wrapper">
												<figure class="elementor-image-box-img"><img width="512" height="512"
														src="wp-content/uploads/2023/06/padlock-1.png"
														class="attachment-full size-full wp-image-2124" alt="" />
												</figure>
												<div class="elementor-image-box-content">
													<h3 class="elementor-image-box-title">Safe & Secure</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section data-particle_enable="false" data-particle-mobile-disabled="false"
						class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-3962f7b wd-section-stretch elementor-section-boxed elementor-section-height-default elementor-section-height-default"
						data-id="3962f7b" data-element_type="section"
						data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-00a14fb"
								data-id="00a14fb" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-0bdfb46 elementor-widget elementor-widget-wd_title"
										data-id="0bdfb46" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">Contact us
													</h4>
												</div>

											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-7bc57ee elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
										data-id="7bc57ee" data-element_type="widget"
										data-widget_type="icon-list.default">
										<div class="elementor-widget-container">
											<link rel="stylesheet"
												href="wp-content/plugins/elementor/assets/css/widget-icon-list.min.css">
											<ul class="elementor-icon-list-items">
												<li class="elementor-icon-list-item">
													<span class="elementor-icon-list-icon">
														<i aria-hidden="true" class="fas fa-map-marker-alt"></i> </span>
													<span class="elementor-icon-list-text">Near Mahila Ashram School,
														Sharda Colony,Bhilwara (Rajasthan) 311001</span>
												</li>
											</ul>
										</div>
									</div>
									<div class="elementor-element elementor-element-0c3b68f elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
										data-id="0c3b68f" data-element_type="widget"
										data-widget_type="icon-list.default">
										<div class="elementor-widget-container">
											<ul class="elementor-icon-list-items">
												<li class="elementor-icon-list-item">
													<a href="tel:9929321144">

														<span class="elementor-icon-list-icon">
															<i aria-hidden="true" class="fas fa-phone-alt"></i> </span>
														<span class="elementor-icon-list-text">(+91) 9929321144</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="elementor-element elementor-element-db07235 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
										data-id="db07235" data-element_type="widget"
										data-widget_type="icon-list.default">
										<div class="elementor-widget-container">
											<ul class="elementor-icon-list-items">
												<li class="elementor-icon-list-item">
													<a href="mailto:contact@">

														<span class="elementor-icon-list-icon">
															<i aria-hidden="true" class="fas fa-envelope"></i> </span>
														<span class="elementor-icon-list-text">contact@</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="elementor-element elementor-element-a322d2e elementor-shape-circle e-grid-align-mobile-left e-grid-align-left elementor-grid-0 elementor-widget elementor-widget-social-icons"
										data-id="a322d2e" data-element_type="widget"
										data-widget_type="social-icons.default">
										<div class="elementor-widget-container">
											<style>
												/*! elementor - v3.20.0 - 10-04-2024 */
												.elementor-widget-social-icons.elementor-grid-0 .elementor-widget-container,
												.elementor-widget-social-icons.elementor-grid-mobile-0 .elementor-widget-container,
												.elementor-widget-social-icons.elementor-grid-tablet-0 .elementor-widget-container {
													line-height: 1;
													font-size: 0
												}

												.elementor-widget-social-icons:not(.elementor-grid-0):not(.elementor-grid-tablet-0):not(.elementor-grid-mobile-0) .elementor-grid {
													display: inline-grid
												}

												.elementor-widget-social-icons .elementor-grid {
													grid-column-gap: var(--grid-column-gap, 5px);
													grid-row-gap: var(--grid-row-gap, 5px);
													grid-template-columns: var(--grid-template-columns);
													justify-content: var(--justify-content, center);
													justify-items: var(--justify-content, center)
												}

												.elementor-icon.elementor-social-icon {
													font-size: var(--icon-size, 25px);
													line-height: var(--icon-size, 25px);
													width: calc(var(--icon-size, 25px) + 2 * var(--icon-padding, .5em));
													height: calc(var(--icon-size, 25px) + 2 * var(--icon-padding, .5em))
												}

												.elementor-social-icon {
													--e-social-icon-icon-color: #fff;
													display: inline-flex;
													background-color: #69727d;
													align-items: center;
													justify-content: center;
													text-align: center;
													cursor: pointer
												}

												.elementor-social-icon i {
													color: var(--e-social-icon-icon-color)
												}

												.elementor-social-icon svg {
													fill: var(--e-social-icon-icon-color)
												}

												.elementor-social-icon:last-child {
													margin: 0
												}

												.elementor-social-icon:hover {
													opacity: .9;
													color: #fff
												}

												.elementor-social-icon-android {
													background-color: #a4c639
												}

												.elementor-social-icon-apple {
													background-color: #999
												}

												.elementor-social-icon-behance {
													background-color: #1769ff
												}

												.elementor-social-icon-bitbucket {
													background-color: #205081
												}

												.elementor-social-icon-codepen {
													background-color: #000
												}

												.elementor-social-icon-delicious {
													background-color: #39f
												}

												.elementor-social-icon-deviantart {
													background-color: #05cc47
												}

												.elementor-social-icon-digg {
													background-color: #005be2
												}

												.elementor-social-icon-dribbble {
													background-color: #ea4c89
												}

												.elementor-social-icon-elementor {
													background-color: #d30c5c
												}

												.elementor-social-icon-envelope {
													background-color: #ea4335
												}

												.elementor-social-icon-facebook,
												.elementor-social-icon-facebook-f {
													background-color: #3b5998
												}

												.elementor-social-icon-flickr {
													background-color: #0063dc
												}

												.elementor-social-icon-foursquare {
													background-color: #2d5be3
												}

												.elementor-social-icon-free-code-camp,
												.elementor-social-icon-freecodecamp {
													background-color: #006400
												}

												.elementor-social-icon-github {
													background-color: #333
												}

												.elementor-social-icon-gitlab {
													background-color: #e24329
												}

												.elementor-social-icon-globe {
													background-color: #69727d
												}

												.elementor-social-icon-google-plus,
												.elementor-social-icon-google-plus-g {
													background-color: #dd4b39
												}

												.elementor-social-icon-houzz {
													background-color: #7ac142
												}

												.elementor-social-icon-instagram {
													background-color: #262626
												}

												.elementor-social-icon-jsfiddle {
													background-color: #487aa2
												}

												.elementor-social-icon-link {
													background-color: #818a91
												}

												.elementor-social-icon-linkedin,
												.elementor-social-icon-linkedin-in {
													background-color: #0077b5
												}

												.elementor-social-icon-medium {
													background-color: #00ab6b
												}

												.elementor-social-icon-meetup {
													background-color: #ec1c40
												}

												.elementor-social-icon-mixcloud {
													background-color: #273a4b
												}

												.elementor-social-icon-odnoklassniki {
													background-color: #f4731c
												}

												.elementor-social-icon-pinterest {
													background-color: #bd081c
												}

												.elementor-social-icon-product-hunt {
													background-color: #da552f
												}

												.elementor-social-icon-reddit {
													background-color: #ff4500
												}

												.elementor-social-icon-rss {
													background-color: #f26522
												}

												.elementor-social-icon-shopping-cart {
													background-color: #4caf50
												}

												.elementor-social-icon-skype {
													background-color: #00aff0
												}

												.elementor-social-icon-slideshare {
													background-color: #0077b5
												}

												.elementor-social-icon-snapchat {
													background-color: #fffc00
												}

												.elementor-social-icon-soundcloud {
													background-color: #f80
												}

												.elementor-social-icon-spotify {
													background-color: #2ebd59
												}

												.elementor-social-icon-stack-overflow {
													background-color: #fe7a15
												}

												.elementor-social-icon-steam {
													background-color: #00adee
												}

												.elementor-social-icon-stumbleupon {
													background-color: #eb4924
												}

												.elementor-social-icon-telegram {
													background-color: #2ca5e0
												}

												.elementor-social-icon-threads {
													background-color: #000
												}

												.elementor-social-icon-thumb-tack {
													background-color: #1aa1d8
												}

												.elementor-social-icon-tripadvisor {
													background-color: #589442
												}

												.elementor-social-icon-tumblr {
													background-color: #35465c
												}

												.elementor-social-icon-twitch {
													background-color: #6441a5
												}

												.elementor-social-icon-twitter {
													background-color: #1da1f2
												}

												.elementor-social-icon-viber {
													background-color: #665cac
												}

												.elementor-social-icon-vimeo {
													background-color: #1ab7ea
												}

												.elementor-social-icon-vk {
													background-color: #45668e
												}

												.elementor-social-icon-weibo {
													background-color: #dd2430
												}

												.elementor-social-icon-weixin {
													background-color: #31a918
												}

												.elementor-social-icon-whatsapp {
													background-color: #25d366
												}

												.elementor-social-icon-wordpress {
													background-color: #21759b
												}

												.elementor-social-icon-x-twitter {
													background-color: #000
												}

												.elementor-social-icon-xing {
													background-color: #026466
												}

												.elementor-social-icon-yelp {
													background-color: #af0606
												}

												.elementor-social-icon-youtube {
													background-color: #cd201f
												}

												.elementor-social-icon-500px {
													background-color: #0099e5
												}

												.elementor-shape-rounded .elementor-icon.elementor-social-icon {
													border-radius: 10%
												}

												.elementor-shape-circle .elementor-icon.elementor-social-icon {
													border-radius: 50%
												}
											</style>
											<div class="elementor-social-icons-wrapper elementor-grid">
												<span class="elementor-grid-item">
													<a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-ba7e7c7"
														href="https://www.facebook.com/"
														target="_blank">
														<span class="elementor-screen-only">Facebook</span>
														<i class="fab fa-facebook"></i> </a>
												</span>
												<span class="elementor-grid-item">
													<a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-62f5036"
														href="https://www.instagram.com/prags_salty/" target="_blank">
														<span class="elementor-screen-only">Instagram</span>
														<i class="fab fa-instagram"></i> </a>
												</span>
												<span class="elementor-grid-item">
													<a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-repeater-item-f00cb28"
														href="https://youtube.com/@" target="_blank">
														<span class="elementor-screen-only">Youtube</span>
														<i class="fab fa-youtube"></i> </a>
												</span>
												<span class="elementor-grid-item">
													<a class="elementor-icon elementor-social-icon elementor-social-icon-pinterest elementor-repeater-item-2745444"
														href="https://in.pinterest.com/prags_salty/" target="_blank">
														<span class="elementor-screen-only">Pinterest</span>
														<i class="fab fa-pinterest"></i> </a>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-c1a6497"
								data-id="c1a6497" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-ad2b6f9 elementor-widget elementor-widget-wd_title"
										data-id="ad2b6f9" data-element_type="widget"
										data-widget_type="wd_title.default">

									</div>
									<div class="elementor-element elementor-element-21a95c9 elementor-widget elementor-widget-wd_list"
										data-id="21a95c9" data-element_type="widget" data-widget_type="wd_list.default">
										<div class="elementor-widget-container">
											<link rel="stylesheet" id="wd-list-css"
												href="wp-content/themes/woodmart/css/parts/el-list.min.css?ver=7.1.4"
												type="text/css" media="all" />


										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-dd3cc4a"
								data-id="dd3cc4a" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-ffafd20 elementor-widget elementor-widget-wd_title"
										data-id="ffafd20" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">our company
													</h4>
												</div>

											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-51858ce elementor-widget elementor-widget-wd_list"
										data-id="51858ce" data-element_type="widget" data-widget_type="wd_list.default">
										<div class="elementor-widget-container">
											<ul
												class="wd-list color-scheme-custom wd-fontsize-xs wd-list-type-icon wd-list-style-default wd-justify-left">
												<li class="elementor-repeater-item-1540aa8">

													<span class="list-content">
														About Us </span>


													<a href="about-us/" class="wd-fill" aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-c77fc22">

													<span class="list-content">
														Contact Us </span>


													<a href="contact-us/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-f93516b">

													<span class="list-content">
														Products </span>


													<a href="products.php" class="wd-fill" aria-label="List item link"></a>
												</li>
											</ul>

										</div>
									</div>
									<div class="elementor-element elementor-element-ee4ed93 elementor-widget elementor-widget-image"
										data-id="ee4ed93" data-element_type="widget" data-widget_type="image.default">
										<div class="elementor-widget-container">
											<style>
												/*! elementor - v3.20.0 - 10-04-2024 */
												.elementor-widget-image {
													text-align: center
												}

												.elementor-widget-image a {
													display: inline-block
												}

												.elementor-widget-image a img[src$=".svg"] {
													width: 48px
												}

												.elementor-widget-image img {
													vertical-align: middle;
													display: inline-block
												}
											</style> <img
												src="wp-content/uploads/elementor/thumbs/FSSAI_logo-qhknfg5w7q5sou0mwj9etsyho23217v1nl6qnl44cg.png"
												title="FSSAI_logo" alt=" - fssai" loading="lazy" />
										</div>
									</div>
									<div class="elementor-element elementor-element-0c93ff4 elementor-widget elementor-widget-wd_title"
										data-id="0c93ff4" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">FSSAI:
														12224999000078<br />
														<br>GST: 08ABDFP3093N1ZQ<br />
													</h4>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-9ef8958"
								data-id="9ef8958" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-36033b4 elementor-widget elementor-widget-wd_title"
										data-id="36033b4" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">Useful
														Links</h4>
												</div>

											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-b7a4a23 elementor-widget elementor-widget-wd_list"
										data-id="b7a4a23" data-element_type="widget" data-widget_type="wd_list.default">
										<div class="elementor-widget-container">
											<ul
												class="wd-list color-scheme-custom wd-fontsize-xs wd-list-type-icon wd-list-style-default wd-justify-left">
												<li class="elementor-repeater-item-1402af2">

													<span class="list-content">
														FAQ’s </span>


													<a href="faqs/" class="wd-fill" aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-c77fc22">

													<span class="list-content">
														Track Your Order </span>


													<a href="track-order/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-c373d8d">

													<span class="list-content">
														Privacy Policy </span>


													<a href="privacy-policy/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-1540aa8">

													<span class="list-content">
														Return Policy </span>


													<a href="refund-and-returns-policy/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-02e96b0">

													<span class="list-content">
														Shipping Policy </span>


													<a href="shipping/" class="wd-fill" aria-label="List item link"></a>
												</li>
												<li class="elementor-repeater-item-f93516b">

													<span class="list-content">
														Terms & Conditions </span>


													<a href="terms-conditions/" class="wd-fill"
														aria-label="List item link"></a>
												</li>
											</ul>

										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section data-particle_enable="false" data-particle-mobile-disabled="false"
						class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-a974a75 wd-section-stretch elementor-section-boxed elementor-section-height-default elementor-section-height-default"
						data-id="a974a75" data-element_type="section"
						data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
							<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2d2ba05"
								data-id="2d2ba05" data-element_type="column">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-eea18e5 elementor-widget elementor-widget-wd_title"
										data-id="eea18e5" data-element_type="widget"
										data-widget_type="wd_title.default">
										<div class="elementor-widget-container">
											<div
												class="title-wrapper set-mb-s reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-center">


												<div class="liner-continer">
													<h4 class="woodmart-title-container title wd-fontsize-l">© 2024
														™. All Rights Reserved<br />
													</h4>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</footer>
	</div> <!-- end wrapper -->


	<!--END MOBILE-NAV-->
	<div class="cart-widget-side wd-side-hidden wd-right">
		<div class="wd-heading">
			<span class="title">Shopping cart</span>
			<div class="close-side-widget wd-action-btn wd-style-text wd-cross-icon">
				<a href="index.php" rel="nofollow">Close</a>
			</div>
		</div>
		<div class="widget woocommerce widget_shopping_cart">
			<div class="widget_shopping_cart_content"></div>
		</div>
	</div>
	<link rel="stylesheet" id="wd-cookies-popup-css"
		href="wp-content/themes/woodmart/css/parts/opt-cookies.min.css?ver=7.1.4" type="text/css" media="all" />

	<link rel="stylesheet" id="wd-bottom-toolbar-css"
		href="wp-content/themes/woodmart/css/parts/opt-bottom-toolbar.min.css?ver=7.1.4" type="text/css" media="all" />
	<div class="wd-toolbar wd-toolbar-label-show">
		<div class="wd-toolbar-shop wd-toolbar-item wd-tools-element">
			<a href="products/">
				<span class="wd-tools-icon"></span>
				<span class="wd-toolbar-label">
					Shop </span>
			</a>
		</div>
		<div class="wd-header-cart wd-tools-element wd-design-5 cart-widget-opener" title="My cart">
			<a href="cart/">
				<span class="wd-tools-icon wd-icon-alt">
					<span class="wd-cart-number wd-tools-count">8 <span>items</span></span>
				</span>
				<span class="wd-toolbar-label">
					Cart </span>
			</a>
		</div>
		<div class="wd-header-my-account wd-tools-element wd-style-icon ">
			<a href="my-account/">
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
	<div class="wcjfw-total-placeholder wcjfw-hidden">
		<input type="hidden" id="wcjfw-cart-total" value="4903">
	</div>
	<div id="qlwapp" class="qlwapp qlwapp-free qlwapp-bubble qlwapp-bottom-left qlwapp-desktop qlwapp-rounded">
		<div class="qlwapp-container">

			<a class="qlwapp-toggle" data-action="open" data-phone="9929321144" data-message="Hello!" role="button"
				tabindex="0" target="_blank">
				<i class="qlwapp-icon qlwapp-whatsapp-icon"></i>
				<i class="qlwapp-close" data-action="close">&times;</i>
			</a>
		</div>
	</div>

	<div class="cr-pswp pswp" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="pswp__bg"></div>
		<div class="pswp__scroll-wrap">
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>
			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<div class="pswp__counter"></div>
					<button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
					<button class="pswp__button pswp__button--share" aria-label="Share"></button>
					<button class="pswp__button pswp__button--fs" aria-label="Toggle fullscreen"></button>
					<button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>
				<button class="pswp__button pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
				<button class="pswp__button pswp__button--arrow--right" aria-label="Next (arrow right)"></button>
				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
		(function () {
			var c = document.body.className;
			c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
			document.body.className = c;
		})();
	</script>
	<script type="text/template" id="tmpl-variation-template">
	<div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
	<div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
	<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
</script>
	<script type="text/template" id="tmpl-unavailable-variation-template">
	<p>Sorry, this product is unavailable. Please choose a different combination.</p>
</script>
	<link rel='stylesheet' id='0-css'
		href='https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,0,4000,7000,500&#038;family=Roboto:ital,wght@0,0,1001,1000,2001,2000,3001,3000,4001,4000,5001,5000,6001,6000,7001,7000,8001,8000,9001,900&#038;family=Roboto+Slab:ital,wght@0,0,1001,1000,2001,2000,3001,3000,4001,4000,5001,5000,6001,6000,7001,7000,8001,8000,9001,900&#038;family=Mulish:ital,wght@0,0,1001,1000,2001,2000,3001,3000,4001,4000,5001,5000,6001,6000,7001,7000,8001,8000,9001,900&#038;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&#038;display=swap'
		type='text/css' media='all' />
	<link rel='stylesheet' id='wpo_min-footer-0-css'
		href='wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-dce42836.min.css' type='text/css'
		media='all' />
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-0-js-extra">
/* <![CDATA[ */
var wd_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_922703ab473fa9b909b138c94b1e78ba","fragment_name":"wc_fragments_922703ab473fa9b909b138c94b1e78ba","request_timeout":"5000"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-update-cart-fragments-fix7.1.4.min.js"
		id="wpo_min-footer-0-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-1-js-extra">
/* <![CDATA[ */
var cr_ajax_object = {"ajax_url":"https:\/\/\/wp-admin\/admin-ajax.php"};
var cr_ajax_object = {"ajax_url":"https:\/\/\/wp-admin\/admin-ajax.php","disable_lightbox":"0"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-cr-frontend-js5.47.0.min.js"
		id="wpo_min-footer-1-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-cr-colcade5.47.0.min.js"
		id="wpo_min-footer-2-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wbvp.min.js"
		id="wpo_min-footer-3-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-sourcebuster-js8.7.0.min.js"
		id="wpo_min-footer-4-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-5-js-extra">
/* <![CDATA[ */
var wc_order_attribution = {"params":{"lifetime":1.0e-5,"session":30,"ajaxurl":"https:\/\/\/wp-admin\/admin-ajax.php","prefix":"wc_order_attribution_","allowTracking":true},"fields":{"source_type":"current.typ","referrer":"current_add.rf","utm_campaign":"current.cmp","utm_source":"current.src","utm_medium":"current.mdm","utm_content":"current.cnt","utm_id":"current.id","utm_term":"current.trm","session_entry":"current_add.ep","session_start_time":"current_add.fd","session_pages":"session.pgs","session_count":"udata.vst","user_agent":"udata.uag"}};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wc-order-attribution8.7.0.min.js"
		id="wpo_min-footer-5-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-underscore1.13.4.min.js"
		id="wpo_min-footer-6-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-7-js-extra">
/* <![CDATA[ */
var _wpUtilSettings = {"ajax":{"url":"\/wp-admin\/admin-ajax.php"}};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wp-util.min.js"
		id="wpo_min-footer-7-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-woo-feed-facebook-pixel,1.0.0.min.js"
		id="wpo_min-footer-8-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-qlwappe91de9a147a4b721ec5b.min.js"
		id="wpo_min-footer-9-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-10-js-extra">
/* <![CDATA[ */
var wc_timeline = {"url":"https:\/\/\/wp-admin\/admin-ajax.php","open_on_add":"0","cart_url":"https:\/\/\/cart\/","is_cart_page":"","goals_count":"0","has_carousel":"1"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wc_j_upsellator_js3.4.7.min.js"
		id="wpo_min-footer-10-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-pro-webpack-runtime3.20.0.min.js"
		id="wpo_min-footer-11-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-webpack-runtime3.20.4.min.js"
		id="wpo_min-footer-12-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-frontend-modules3.20.4.min.js"
		id="wpo_min-footer-13-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wp-i18n5e580eb46a90c2b997e6.min.js"
		id="wpo_min-footer-14-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-pro-frontend3.20.0.min.js"
		id="wpo_min-footer-15-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-waypoints4.0.2.min.js"
		id="wpo_min-footer-16-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-jquery-ui-core1.13.2.min.js"
		id="wpo_min-footer-17-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-elementor-frontend3.20.4.min.js"
		id="wpo_min-footer-18-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-pro-elements-handlers3.20.0.min.js"
		id="wpo_min-footer-19-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-20-js-extra">
/* <![CDATA[ */
var wpformsElementorVars = {"captcha_provider":"recaptcha","recaptcha_type":"v2"};
var wpformsElementorVars = {"captcha_provider":"recaptcha","recaptcha_type":"v2"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wpforms-elementor1.8.7.min.js"
		id="wpo_min-footer-20-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-21-js-extra">

</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-woodmart-theme7.1.4.min.js"
		id="wpo_min-footer-21-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-woocommerce-notices7.1.4.min.js"
		id="wpo_min-footer-22-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-scrollbar7.1.4.min.js"
		id="wpo_min-footer-23-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-24-js-extra">
/* <![CDATA[ */
var localize = {"ajaxurl":"https:\/\/\/wp-admin\/admin-ajax.php","nonce":"18f5fb8f9e","i18n":{"added":"Added ","compare":"Compare","loading":"Loading..."},"eael_translate_text":{"required_text":"is a required field","invalid_text":"Invalid","billing_text":"Billing","shipping_text":"Shipping","fg_mfp_counter_text":"of"},"page_permalink":"https:\/\/\/track-order\/","cart_redirectition":"no","cart_page_url":"https:\/\/\/cart\/","el_breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}},"ParticleThemesData":{"default":"{\"particles\":{\"number\":{\"value\":160,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#ffffff\"},\"shape\":{\"type\":\"circle\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"img\/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.5,\"random\":false,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":3,\"random\":true,\"anim\":{\"enable\":false,\"speed\":40,\"size_min\":0.1,\"sync\":false}},\"line_linked\":{\"enable\":true,\"distance\":150,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":1},\"move\":{\"enable\":true,\"speed\":6,\"direction\":\"none\",\"random\":false,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":true,\"mode\":\"repulse\"},\"onclick\":{\"enable\":true,\"mode\":\"push\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":400,\"size\":40,\"duration\":2,\"opacity\":8,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}","nasa":"{\"particles\":{\"number\":{\"value\":250,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#ffffff\"},\"shape\":{\"type\":\"circle\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"img\/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":1,\"random\":true,\"anim\":{\"enable\":true,\"speed\":1,\"opacity_min\":0,\"sync\":false}},\"size\":{\"value\":3,\"random\":true,\"anim\":{\"enable\":false,\"speed\":4,\"size_min\":0.3,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":150,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":1},\"move\":{\"enable\":true,\"speed\":1,\"direction\":\"none\",\"random\":true,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":600}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":true,\"mode\":\"bubble\"},\"onclick\":{\"enable\":true,\"mode\":\"repulse\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":250,\"size\":0,\"duration\":2,\"opacity\":0,\"speed\":3},\"repulse\":{\"distance\":400,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}","bubble":"{\"particles\":{\"number\":{\"value\":15,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#1b1e34\"},\"shape\":{\"type\":\"polygon\",\"stroke\":{\"width\":0,\"color\":\"#000\"},\"polygon\":{\"nb_sides\":6},\"image\":{\"src\":\"img\/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.3,\"random\":true,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":50,\"random\":false,\"anim\":{\"enable\":true,\"speed\":10,\"size_min\":40,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":200,\"color\":\"#ffffff\",\"opacity\":1,\"width\":2},\"move\":{\"enable\":true,\"speed\":8,\"direction\":\"none\",\"random\":false,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":false,\"mode\":\"grab\"},\"onclick\":{\"enable\":false,\"mode\":\"push\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":400,\"size\":40,\"duration\":2,\"opacity\":8,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}","snow":"{\"particles\":{\"number\":{\"value\":450,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#fff\"},\"shape\":{\"type\":\"circle\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"img\/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.5,\"random\":true,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":5,\"random\":true,\"anim\":{\"enable\":false,\"speed\":40,\"size_min\":0.1,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":500,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":2},\"move\":{\"enable\":true,\"speed\":6,\"direction\":\"bottom\",\"random\":false,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":true,\"mode\":\"bubble\"},\"onclick\":{\"enable\":true,\"mode\":\"repulse\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":0.5}},\"bubble\":{\"distance\":400,\"size\":4,\"duration\":0.3,\"opacity\":1,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}","nyan_cat":"{\"particles\":{\"number\":{\"value\":150,\"density\":{\"enable\":false,\"value_area\":800}},\"color\":{\"value\":\"#ffffff\"},\"shape\":{\"type\":\"star\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"http:\/\/wiki.lexisnexis.com\/academic\/images\/f\/fb\/Itunes_podcast_icon_300.jpg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.5,\"random\":false,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":4,\"random\":true,\"anim\":{\"enable\":false,\"speed\":40,\"size_min\":0.1,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":150,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":1},\"move\":{\"enable\":true,\"speed\":14,\"direction\":\"left\",\"random\":false,\"straight\":true,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":false,\"mode\":\"grab\"},\"onclick\":{\"enable\":true,\"mode\":\"repulse\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":200,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":400,\"size\":40,\"duration\":2,\"opacity\":8,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}"},"eael_login_nonce":"a72fac3df5","eael_register_nonce":"a57e28adaf","eael_lostpassword_nonce":"05043b5222","eael_resetpassword_nonce":"4a5372780f"};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-eael-general5.9.15.min.js"
		id="wpo_min-footer-24-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="https://stats.wp.com/e-202415.js" id="jetpack-stats-js" data-wp-strategy="defer"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="jetpack-stats-js-after">
/* <![CDATA[ */
_stq = window._stq || [];
_stq.push([ "view", JSON.parse("{\"v\":\"ext\",\"blog\":\"217092730\",\"post\":\"2197\",\"tz\":\"5.5\",\"srv\":\"\",\"j\":\"1:13.3.1\"}") ]);
_stq.push([ "clickTrackerInit", "217092730", "2197" ]);
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-header-builder7.1.4.min.js"
		id="wpo_min-footer-26-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-menu-offsets7.1.4.min.js"
		id="wpo_min-footer-27-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-menu-setup7.1.4.min.js"
		id="wpo_min-footer-28-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-autocomplete-library7.1.4.min.js"
		id="wpo_min-footer-29-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-ajax-search7.1.4.min.js"
		id="wpo_min-footer-30-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-login-dropdown7.1.4.min.js"
		id="wpo_min-footer-31-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-mini-cart-quantity7.1.4.min.js"
		id="wpo_min-footer-32-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-woocommerce-quantity7.1.4.min.js"
		id="wpo_min-footer-33-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-on-remove-from-cart7.1.4.min.js"
		id="wpo_min-footer-34-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-mobile-search7.1.4.min.js"
		id="wpo_min-footer-35-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-widget-collapse7.1.4.min.js"
		id="wpo_min-footer-36-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-scroll-top7.1.4.min.js"
		id="wpo_min-footer-37-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-mobile-navigation7.1.4.min.js"
		id="wpo_min-footer-38-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-cart-widget7.1.4.min.js"
		id="wpo_min-footer-39-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wd-cookies-popup7.1.4.min.js"
		id="wpo_min-footer-40-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-zoom1.7.21-wc.8.7.0.min.js"
		id="wpo_min-footer-41-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-42-js-extra">
/* <![CDATA[ */
var wc_add_to_cart_variation_params = {"wc_ajax_url":"\/?wc-ajax=%%endpoint%%&jcart_page_id=2197","i18n_no_matching_variations_text":"Sorry, no products matched your selection. Please choose a different combination.","i18n_make_a_selection_text":"Please select some product options before adding this product to your cart.","i18n_unavailable_text":"Sorry, this product is unavailable. Please choose a different combination."};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wc-add-to-cart-variation8.7.0.min.js"
		id="wpo_min-footer-42-js"></script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript" id="wpo_min-footer-43-js-extra">
/* <![CDATA[ */
var wc_single_product_params = {"i18n_required_rating_text":"Please select a rating","review_rating_required":"yes","flexslider":{"rtl":false,"animation":"slide","smoothHeight":true,"directionNav":false,"controlNav":"thumbnails","slideshow":false,"animationSpeed":500,"animationLoop":false,"allowOneSlide":false},"zoom_enabled":"","zoom_options":[],"photoswipe_enabled":"","photoswipe_options":{"shareEl":false,"closeOnScroll":false,"history":false,"hideAnimationDuration":0,"showAnimationDuration":0},"flexslider_enabled":""};
/* ]]> */
</script>
	<script type="javascript/blocked" data-wpmeteor-type="text/javascript"
		data-wpmeteor-src="wp-content/cache/wpo-minify/1713030549/assets/wpo-minify-footer-wc-single-product8.7.0.min.js"
		id="wpo_min-footer-43-js"></script>

	<script type="javascript/blocked" data-wpmeteor-type="text/javascript">
jQuery(document).ready(function($) {
$('.checkout_coupon').show();
});
</script>
</body>

</html>