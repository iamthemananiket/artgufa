<?php if (Kuler::getInstance()->getRootSkin() == 'skin1'){ ?>
	<?php include(DIR_TEMPLATE . Kuler::getInstance()->getTheme() . '/template/module/_kbm_recent_article_skin1.tpl'); ?>
<?php } else { ?>
<div id="kbm-recent-article-<?php echo $module; ?>" class="kbm-recent-article">
    <div class="box kuler-module">
	    <?php if ($show_title) { ?>
        <div class="box-heading"><span><?php echo $title; ?></span></div>
	    <?php } ?>
        <div class="box-content">
          <ul class="articles row">
	          <?php foreach ($articles as $article) { ?>
              <li class="col-sm-6 col-md-4 wow fadeInUp" data-wow-delay="0.1s" data-wow-offset="100">
	              <div>
                  <?php if ($product_featured_image) { ?>
                    <div class="image">
	                    <img src="<?php echo $article['featured_image_thumb']; ?>" class="avatar" alt="<?php echo $title; ?>" />
                    </div>
                    <?php } ?>
                  <a href="<?php echo $article['link']; ?>" class="article-title"><?php echo $article['name']; ?></a>
                  <span class="kbm-date">
                    <span><?php echo date('d', $article['date_published']); ?></span>
                    <?php echo date('M', $article['date_published']); ?>
                  </span>
		              <?php if ($article['display_author']) { ?>
			              <?php echo '<span class="author vcard">'; echo ('<a rel="author">'.'by '. $article['author_name'] .'</a></span>'); ?>
		              <?php } ?>
                  <?php if ($product_description) { ?>
                    <p><?php echo $article['description']; ?></p>
                  <?php } ?>
	                </div>
              </li>
	            <?php } ?>
          </ul>
        </div>
    </div>
</div>
<?php } ?>