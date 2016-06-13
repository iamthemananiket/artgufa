<div id="container">
  <?php
  $modules = Kuler::getInstance()->getModules('header_top');
  if ($modules) {
    echo implode('', $modules);
  }
  ?>
	<div id="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-6 col-xs-12 extra">
					<?php echo $currency; ?>
					<?php echo $language; ?>
				</div><!--/.extra-->
				<div class="col-md-10 col-sm-6 col-xs-12 links">
					<a href="http://kartpro.unystore.com/index.php?route=information/information&information_id=8" style="color: white;">Contact Us</a>
					<a href="http://kartpro.unystore.com/index.php?route=information/information&information_id=9" style="color: white;">FAQ</a>
					<a href="<?php echo $wishlist; ?>" id="wishlist-total" style="color: white;"><?php echo $text_wishlist; ?></a>
					<a href="<?php echo $checkout; ?>" style="color: white;"><?php echo $text_checkout; ?></a>
					<a href="http://kartpro.unystore.com/index.php?route=information/information&information_id=7" style="color: white;">Upload Art</a>
					
					
					
									
				<div id="cssmenu" style="float: right; display: inline;">
							<a id="welcome-msg" class="has-sub"><span>Welcome, Sign in!</span></a>
							<ul id="sign-in-box" style="display: none; position: absolute;">
								<li><a href="index.php?route=account/login">Sign in</a></li>
								<li><a id="create-account" href="index.php?route=account/register"><span>Create an account</span></a></li>
							</ul>
				</div>
				
				</div><!--/.links-->
				
				
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
							}
						);
						$("#cssmenu").mouseout(
							function() {
								$("#sign-in-box").css("display", "none")
							}
						);
						$("#search").click(
							function() {
								$(".kf_search").css("width","500px")
							}
						);
						$(".kf_search").blur(
							function() {
								$(".kf_search").css("width","260px")
							}
						);
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