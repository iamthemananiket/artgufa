<?php $kuler = Kuler::getInstance();
$kuler->language->load('kuler/kuler');
?>
<?php
$category_array = $kuler->language->get('text_carousel_title');
$index = 1; ?>
<div class='box-heading'><span>Paintings</span></div>
<?php
while($index++ != 5){
foreach($category_array as $category)  { ?>
<div id="carousel<?php echo $module; ?>" class="carousel">
  <!--<div class="box-heading"><span><?php echo $category; ?></span></div>-->
  <h2>Variety <?php echo $index-1;?></h2>
  <button type="submit" class="button" style="float: right; margin: 5px;">View more</button>
  <ul class="jcarousel-skin-opencart">
    <?php foreach ($banners as $banner) { ?>
    <li><a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" title="<?php echo $banner['title']; ?>" /></a></li>
    <?php } ?>
  </ul>
  
</div>
<hr>
<?php } } ?>
<script type="text/javascript"><!--
$('#carousel<?php echo $module; ?> ul').jcarousel({
	vertical: false,
	visible: <?php echo $limit; ?>,
	scroll: <?php echo $scroll; ?>
});
//--></script>