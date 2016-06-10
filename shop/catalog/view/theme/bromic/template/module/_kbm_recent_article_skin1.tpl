<div id="kbm-recent-article-<?php echo $module; ?>" class="kbm-recent-article">
  <div class="box kuler-module">
	  <?php if ($show_title) { ?>
        <div class="box-heading"><span><?php echo $title; ?></span></div>
	    <?php } ?>
      <div class="box-content">
        <ul class="articles row">
	        <?php foreach ($articles as $article) { ?>
            <li class="col-sm-6 col-md-6 col-xs-12 wow fadeInUp" data-wow-delay="0.1s" data-wow-offset="100">
	            <div class="row">
                <?php if ($product_featured_image) { ?>
                <div class="image col-md-6">
	                <img src="<?php echo $article['featured_image_thumb']; ?>" class="avatar" alt="<?php echo $title; ?>" />
                </div>
                <?php } ?>
		            <div class="col-md-6 articles-description">
			            <a class="article-title" href="<?php echo $article['link']; ?>"><?php echo $article['name']; ?></a>
			            <?php if ($product_description) { ?>
				            <p><?php echo $article['description']; ?></p>
			            <?php } ?>
			            <a class="read-more" href="<?php echo $article['link']; ?>">Read more</a>
		            </div>
	            </div>
            </li>
	        <?php } ?>
        </ul>
      </div>
  </div>
</div>
