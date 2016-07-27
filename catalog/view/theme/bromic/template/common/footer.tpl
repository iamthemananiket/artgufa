<?php $kuler = Kuler::getInstance(); ?>
<?php
$modules = Kuler::getInstance()->getModules('footer_top');
if ($modules) {
  echo implode('', $modules);
}
?>
<div class="bottom">

  <div style="padding-left: 3%; padding-right: 3%">
    <div class="row">
      <div class="col-md-5 col-sm-5 col-xs-12 about wow bounceInRight" data-wow-offset="100">
        <?php if ($kuler->getSkinOption('show_information')) { ?>
          <?php if ($kuler->getSkinOption('show_information_title')) { ?>
            <h3><span><?php echo $kuler->translate($kuler->getSkinOption('information_title')); ?></span></h3>
          <?php } ?>
          <p>
            <?php echo $kuler->translate($kuler->getSkinOption('information_content')); ?>
          </p>
        <?php } ?>
	    <?php if ($kuler->getSkinOption('show_payment_icons') && $payment_icons = $kuler->getPaymentIcons()) { ?>
		  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 payment">
			<ul>
			<?php foreach ($payment_icons as $payment_icon) { ?>
		      <li><a href="<?php echo $payment_icon['link']; ?>"<?php if ($payment_icon['new_tab']) echo ' target="_blank"'; ?> title="<?php echo $kuler->translate($payment_icon['name']); ?>"><img src="<?php echo $payment_icon['thumb']; ?>" alt="<?php echo $kuler->translate($payment_icon['name']); ?>" /></a></li>
			<?php } ?>
			</ul>
		  </div>
	    <?php } ?>
      </div><!--/.about-->
      <div class="col-md-5 col-sm-5 col-xs-12 contact wow bounceInRight" data-wow-offset="200">
	      <?php
	      $modules = Kuler::getInstance()->getModules('footer_extra_info');
	      if ($modules) {
		      echo implode('', $modules);
	      }
	      ?>
        <!-- Contact -->
        <?php if ($kuler->getSkinOption('show_contact')) { ?>
          <?php if ($kuler->getSkinOption('show_contact_title')) { ?>
            <h3><span><?php echo $kuler->translate($kuler->getSkinOption('contact_title')); ?></span></h3>
          <?php } ?>
          <ul>
            <?php if (($skype1 = $kuler->getSkinOption('skype_1')) || ($skype2 = $kuler->getSkinOption('skype_2'))) { ?>
              <li class="skype">
                <?php if ($skype1) { ?>
                  <span><?php echo $skype1; ?></span>
                <?php } ?>
                <?php if ($skype2 = $kuler->getSkinOption('skype_2') && $skype2) { ?>
                  <span><?php echo $skype2; ?></span>
                <?php } ?>
              </li>
            <?php } ?>

            <?php if (($email1 = $kuler->getSkinOption('email_1')) || ($email2 = $kuler->getSkinOption('email_2'))) { ?>
              <li class="email">
                <?php if ($email1) { ?>
                  <span><?php echo $email1; ?></span>
                <?php } ?>
                <?php if ($email2 = $kuler->getSkinOption('email_2') && $email2) { ?>
                  <span><?php echo $email2; ?></span>
                <?php } ?>
              </li>
            <?php } ?>

            <?php if (($mobile1 = $kuler->getSkinOption('mobile_1')) || ($mobile2 = $kuler->getSkinOption('mobile_2'))) { ?>
              <li class="mobile">
                <?php if ($mobile1) { ?>
                  <span><?php echo $mobile1; ?></span>
                <?php } ?>
                <?php if ($mobile2 = $kuler->getSkinOption('mobile_2') && $mobile2) { ?>
                  <span><?php echo $mobile2; ?></span>
                <?php } ?>
              </li>
            <?php } ?>

            <?php if (($phone1 = $kuler->getSkinOption('phone_1')) || ($phone2 = $kuler->getSkinOption('phone_2'))) { ?>
              <li class="phone">
                <?php if ($phone1) { ?>
                  <span><?php echo $phone1; ?></span>
                <?php } ?>
                <?php if ($phone2 = $kuler->getSkinOption('phone_2') && $phone2) { ?>
                  <span><?php echo $phone2; ?></span>
                <?php } ?>
              </li>
            <?php } ?>

            <?php if (($fax1 = $kuler->getSkinOption('fax_1')) || ($fax2 = $kuler->getSkinOption('fax_2'))) { ?>
              <li class="fax">
                <?php if ($fax1) { ?>
                  <span><?php echo $fax1; ?></span>
                <?php } ?>
                <?php if ($fax2 = $kuler->getSkinOption('fax_2') && $fax2) { ?>
                  <span><?php echo $fax2; ?></span>
                <?php } ?>
              </li>
            <?php } ?>
          </ul>
        <?php } ?>
	      <?php if ($kuler->getSkinOption('show_social_icons') || $kuler->getSkinOption('show_newsletter')) { ?>
		      <div class="social-newsletter">
			      <div class="container">
				      <div class="row">
					      <?php if ($kuler->getSkinOption('show_social_icons')) { ?>
						      <?php if ($kuler->getSkinOption('show_social_icons') && $kuler->getSkinOption('show_newsletter')) { ?>
							      <?php $class = 'col-md-12'; ?>
						      <?php } else { ?>
							      <?php $class = 'col-md-12 non-newsletter'; ?>
						      <?php } ?>
						      <div class="<?php echo $class; ?> social">
							      <?php if ($kuler->getSkinOption('show_social_icons_title')) { ?>
								      <h3><span><?php echo $kuler->translate($kuler->getSkinOption('social_icon_title')); ?></span></h3>
							      <?php } ?>
							      <?php if ($social_icons = $kuler->getSocialIcons()) { ?>
								      <ul class="icon-style-<?php echo $kuler->getSkinOption('icon_style') ?> icon-size-<?php echo $kuler->getSkinOption('icon_size'); ?>">
									      <?php foreach ($social_icons as $social_icon) { ?>
										      <li><a href="<?php echo $social_icon['link']; ?>" target="_blank" class="<?php echo $social_icon['class']; ?>"></a></li>
									      <?php } ?>
								      </ul>
							      <?php } ?>
						      </div><!--/social icons-->
					      <?php } ?>
				      </div>
			      </div>
		      </div>
	      <?php } ?>
      </div>
	    <?php if ($kuler->getSkinOption('show_newsletter')) { ?>
		    <div class="col-md-2 col-sm-2 col-xs-12 newsletter wow bounceInRight" data-wow-offset="300">
			    <?php if ($kuler->getSkinOption('show_newsletter_title')) { ?>
				    <h3><span><?php echo $kuler->translate($kuler->getSkinOption('newsletter_title')); ?></span></h3>
			    <?php } ?>
			    <form id="newsletter-form">
				    <?php echo $kuler->translate($kuler->getSkinOption('newsletter_description_text')); ?>
				    <input type="email" id="newsletter-mail" placeholder="<?php echo $kuler->translate($kuler->getSkinOption('newsletter_input_text')); ?>"/>
				    <button id="newsletter-submit"><?php echo $kuler->translate($kuler->getSkinOption('newsletter_button_text')); ?></button>
			    </form>
			    <script>
				    Kuler.show_newsletter = <?php echo json_encode($kuler->getSkinOption('show_newsletter')); ?>;
				    Kuler.newsletter_subscribe_link = <?php echo json_encode($kuler->getNewsletterSubscribeLink()); ?>;
			    </script>
		    </div><!--/newsletter-->
	    <?php } ?>
    </div>
  </div>
</div>
<div id="powered">
	<div class="container">
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 copyright">
        <a href="#test-popup" class="open-popup-link">Terms and Conditions</a>
    </div>
    <script>
    $('.open-popup-link').magnificPopup({
  type:'inline',
  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
});
function closePopup() {
  $.magnificPopup.close();
}
</script>
      <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 copyright">
        <?php if ($kuler->getSkinOption('show_custom_copyright')) { ?>
          <?php echo $kuler->translate($kuler->getSkinOption('custom_copyright')); ?>
        <?php } else { ?>
          <?php echo $powered; ?>
        <?php } ?>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 copyright"></div>

    </div>
	</div>
</div>
<?php
$modules = Kuler::getInstance()->getModules('footer_bottom');
if ($modules) {
  echo implode('', $modules);
}
?>
</div>
<?php if ($kuler->getSkinOption('login_popup')) { ?>
<?php $kuler->loginPopupInit($data); ?>
<div style="display: none">
	<div id="login-popup">
		<div class="col-sm-6 left">
			<h2><?php echo _t('text_new_customer'); ?></h2>
			<div class="content">
				<p><b><?php echo _t('text_register'); ?></b></p>
				<p><?php echo _t('text_register_account'); ?></p>
				<a href="<?php echo $data['register_url']; ?>" class="button"><?php echo _t('button_continue'); ?></a></div>
		</div>
		<div class="col-sm-6 right">
			<h2><?php echo _t('text_returning_customer'); ?></h2>
			<form id="popup-login-form">
				<div class="content">
					<p><?php echo _t('text_i_am_returning_customer'); ?></p>
					<b><?php echo _t('entry_email'); ?></b><br />
					<input type="text" name="email" />
					<br />
					<br />
					<b><?php echo _t('entry_password'); ?></b><br />
					<input type="password" name="password" />
					<br />
					<a href="<?php echo $data['forgotten_url']; ?>"><?php echo _t('text_forgotten'); ?></a><br />
					<br />
					<input type="submit" value="<?php echo _t('button_login'); ?>" class="button" />
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
<div id="test-popup" class="white-popup mfp-hide">
  
	<div id="terms-popup">
		<div class="col-sm-12 left">
			<h2>Terms and Conditions</h2>
    <div class="content">
      <p>
        <ul>
          <div>1. We will add 20% on the artist's quoted price which will include our commission , service tax , referral discounts , buyer tie-up commissions , etc. </div>
          <div>2. Delivery charges and interstate taxes will be over and above this.</div>
          <div>3. We only sell original art works and no prints.</div>
          <div>4. We have a 3 day return policy for the buyer and hence , payment will be credited to the seller's account within 10 working days from the date of pickup.</div>
          <div>5. We do not encourage the return of framed paintings due to transportation issues.</div>
          <div>6. In case of return of unframed paintings , only the delivery charge will be deducted from the buyer.</div>
        <ol>
      </p>
  	</div>
				<a id="tc-close" onClick="closePopup()" class="button">Close</a>
		</div>
		
	</div>
  
</div>
<?php if ($kuler->getSkinOption('enable_scroll_up')) { ?>
<a class="scrollup"><?php echo $kuler->translate($kuler->getSkinOption('scroll_up_text')); ?></a>
<?php } ?>
<!-- {BODY_SCRIPTS} -->
<!-- Theme Version: <?php echo $kuler->getThemeVersion(); ?> | Kuler Version: <?php echo $kuler->getKulerVersion(); ?> | Skin: <?php echo $kuler->getRootSkin(); ?> -->
<?php if(!$kuler->mobile->isMobile()){ ?>
<script>
  new WOW().init();
  $(document).ready(function(){
	  $('.parallax-advanced').parallax("50%", 0.1);
  })
</script>
<?php } ?>
<!-- BS:SNIPPET-->
<script type='text/javascript'>//<![CDATA[
document.write("<script async src='//HOST:3000/browser-sync-client.1.3.7.js'><\/script>".replace(/HOST/g, location.hostname));
//]]>


<!-- BS:SNIPPET:END-->
</body>
</html>