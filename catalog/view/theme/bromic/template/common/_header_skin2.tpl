<div id="container">
  <?php
  $modules = Kuler::getInstance()->getModules('header_top');
  if ($modules) {
    echo implode('', $modules);
  }
  ?>
	<div id="banner" style="position:fixed; display:none; height:10%; width: 100%; bottom:0%; z-index:999; background:grey;">
	<center>
	
		<h3 style="display: inline;">For best shopping experience, download our Android app - </h3>

		<a target="_blank" href="http://play.google.com"><img src="http://www.freeiconspng.com/uploads/google-play-store-icon-26.png"  style="width:5%; height:5%;" /></a>
	</center>
	</div>
	<div id="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-6 col-xs-12 extra">
					<?php echo $currency; ?>
					<?php echo $language; ?>
				</div><!--/.extra-->
				
				<div class="col-md-10 col-sm-6 col-xs-12 links">
					<a href="./index.php?route=information/contact" style="color: white;">Contact Us</a>
					<a href="http://kartpro.unystore.com/index.php?route=information/information&information_id=9" style="color: white;">FAQ</a>
					<a href="<?php echo $wishlist; ?>" id="wishlist-total" style="color: white;"><?php echo $text_wishlist; ?></a>
					<a href="<?php echo $checkout; ?>" style="color: white;"><?php echo $text_checkout; ?></a>
					<a href="index.php?route=information/upload" style="color: white;">Upload Art</a>
					
					
					
									
				<div id="cssmenu" style="float: right; display: inline;">
							<a id="welcome-msg" class="has-sub">
								<span>Welcome, 
									<?php if(!$logged) { ?>
										<?php echo "Sign in!"
									."</span>"
								."<div style='position: absolute; width: 140px; height: 5px;'><div id='inner-arrow'>"
								."</div>"
								."</div>"
							."</a>"
							."<ul id='sign-in-box' style='display: none; position: absolute;'>"; ?>
								<?php echo $text_welcome; ?>
							<?php echo "</ul>"
				."</div>"
				
				."</div><!--/.links-->"; ?>
				<?php } else { ?>
					<?php echo $text_logged
					."</span></a></div></div>";
			 		?>
				<?php } ?>	 
				
				
			<?php if ($kuler->getSkinOption('live_search_status')) { ?>
					<?php include('_live_search.tpl'); ?>
				<?php } else { ?>
					<div id="search" class="live-search-container">
						<div id="search-inner">
							<div class="button-search"></div>
							<input class="no-category kf_search ui-autocomplete-input" type="text" name="search" placeholder="Live Search Products ..."
								autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
							<ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem"></ul>
						</div>
					</div>
				<?php } ?>	
			</div>
			<script>
						$("#cssmenu").mouseover(
							function() {
								$("#sign-in-box").css("display", "block")
								$("#inner-arrow").css("display", "block")
							}
						);
						$("#cssmenu").mouseout(
							function() {
								$("#sign-in-box").css("display", "none")
								$("#inner-arrow").css("display", "none")
							}
						);
						$(".kf_search").click(
							function() {
								$(".kf_search").css("width","500px")
							}
						);
						$(".kf_search").blur(
							function() {
								$(".kf_search").css("width","260px")
							}
						);

						window.mobilecheck = function() {
  						var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
							if(window.mobilecheck())
                banner.style.display = "block";

</script>
					</script>

		</div>
	</div>
  <div id="header">
    <div class="container-fluid" style="margin-right: 10px;">
      <div class="row">
	      <div class="toppanel row">
		      <?php if ($logo) { ?>
			      <div id="logo" class="col-md-2 wow fadeIn" data-wow-delay="0.1s">
				      <a href="<?php echo $home; ?>">
					      <img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" />
				      </a>
			      </div>
		      <?php } ?>
		      <div class="col-md-8">
			      <div class="navigation">
				      <div class="container">
				      <span id="btn-mobile-toggle">
					      <?php echo $kuler->translate($kuler->getSkinOption('mobile_menu_title')); ?>
					    </span>
					      <?php
					      $modules = Kuler::getInstance()->getModules('menu');
					      if ($modules) {
						      echo implode('', $modules);
					      }else{
						      ?>
						      <?php if ($kuler->getSkinOption('multi_level_default_menu')) { $categories = $kuler->getRecursiveCategories(); } ?>
						      <div id="menu" class="container">
							      <div class="row">
								      <ul class="mainmenu">
									      <li style="display: none;"><a><?php echo $kuler->translate($kuler->getSkinOption('mobile_menu_title')); ?></a></li>
									      <li class="item"><a href="<?php echo $base; ?>" <?php if ($kuler->getSkinOption('home_icon_type') == 'icon') { ?> class="home-icon" <?php } ?>><?php echo $kuler->language->get('text_home') ?></a></li>
									      <?php foreach ($categories as $category) { ?>
										      <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
											      <?php if ($category['children']) { ?>
												      <div>
													      <?php for ($i = 0; $i < count($category['children']);) { ?>
														      <ul>
															      <?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
															      <?php for (; $i < $j; $i++) { ?>
																      <?php if (isset($category['children'][$i])) { ?>
																	      <li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a>
																		      <?php if (!empty($category['children'][$i]['children'])) { ?>
																			      <?php echo renderSubMenuRecursive($category['children'][$i]['children']); ?>
																		      <?php } ?>
																	      </li>
																      <?php } ?>
															      <?php } ?>
														      </ul>
													      <?php } ?>
												      </div>
											      <?php } ?>
										      </li>
									      <?php } ?>
								      </ul>
							      </div><!--/.container-->
						      </div><!--/#menu-->
					      <?php } ?>
				      </div>
			      </div>
		      </div>
		      <div class="col-md-2">
			      <?php echo $cart; ?>
		      </div><!--/.cart-->
	      </div>
      </div>
    </div><!--/.container-->
  </div><!--/#header-->
  <?php
  function renderSubMenuRecursive($categories) {
    $html = '<ul class="sublevel">';

    foreach ($categories as $category)
    {
      $parent = !empty($category['children']) ? ' parent' : '';
      $active = !empty($category['active']) ? ' active' : '';
      $html .= sprintf("<li class=\"item$parent $active\"><a href=\"%s\">%s</a>", $category['href'], $category['name']);

      if (!empty($category['children']))
      {
        $html .= '<span class="btn-expand-menu"></span>';
        $html .= renderSubMenuRecursive($category['children']);
      }

      $html .= '</li>';
    }

    $html .= '</ul>';

    return $html;
  }
  ?>
  <?php
  $modules = Kuler::getInstance()->getModules('slideshow');
  if ($modules) {
    echo '<div class="slideshow">' . implode('', $modules) . '</div>';
  }
  ?>
<?php
$modules = Kuler::getInstance()->getModules('promotion');
if ($modules) {
  echo '<div class="promotion">' . implode('', $modules) . '</div>';
}
?>
