<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/setting.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      	<table class="form" id="setgate">
      		<tr>
            <td><span class="required">*</span> <?php echo $entry_gateway; ?></td>
            <td><select name="gateway">
            		<option value=""><?php echo $text_none; ?></option>
            		
            		<?php if ($gateway=="amd") { ?>
            			<option value="amd" selected="selected">AMD Telecom - www.amdtelecom.net</option>
            		<?php }else{ ?>
            			<option value="amd">AMD Telecom - www.amdtelecom.net</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="smsglobal") { ?>
            			<option value="smsglobal" selected="selected">Bulk SMS Global - www.bulksmsglobal.in</option>
            		<?php }else{ ?>
            			<option value="smsglobal">Bulk SMS Global - www.bulksmsglobal.in</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="clickatell") { ?>
            			<option value="clickatell" selected="selected">Clickatell - www.clickatell.com</option>
            		<?php }else{ ?>
            			<option value="clickatell">Clickatell - www.clickatell.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="liveall") { ?>
            			<option value="liveall" selected="selected">LiveAll - www.liveall.eu</option>
            		<?php }else{ ?>
            			<option value="liveall">LiveAll - www.liveall.eu</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="malath") { ?>
            			<option value="malath" selected="selected">Malath SMS - sms.malath.net.sa</option>
            		<?php }else{ ?>
            			<option value="malath">Malath SMS - sms.malath.net.sa</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="mobily") { ?>
            			<option value="mobily" selected="selected">mobily.ws - www.mobily.ws</option>
            		<?php }else{ ?>
            			<option value="mobily">mobily.ws - www.mobily.ws</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="msegat") { ?>
            			<option value="msegat" selected="selected">Msegat.com - www.msegat.com</option>
            		<?php }else{ ?>
            			<option value="msegat">Msegat.com - www.msegat.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="msg91") { ?>
            			<option value="msg91" selected="selected">MSG91 - www.msg91.com</option>
            		<?php }else{ ?>
            			<option value="msg91">MSG91 - www.msg91.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="mvaayoo") { ?>
            			<option value="mvaayoo" selected="selected">mVaayoo - www.mvaayoo.com</option>
            		<?php }else{ ?>
            			<option value="mvaayoo">mVaayoo - www.mvaayoo.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="mysms") { ?>
            			<option value="mysms" selected="selected">MySms.com.gr - www.mysms.com.gr</option>
            		<?php }else{ ?>
            			<option value="mysms">MySms.com.gr - www.mysms.com.gr</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="nexmo") { ?>
            			<option value="nexmo" selected="selected">Nexmo - www.nexmo.com</option>
            		<?php }else{ ?>
            			<option value="nexmo">Nexmo - www.nexmo.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="netgsm") { ?>
            			<option value="netgsm" selected="selected">Netgsm.com.tr - www.netgsm.com.tr</option>
            		<?php }else{ ?>
            			<option value="netgsm">Netgsm.com.tr - www.netgsm.com.tr</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="oneway") { ?>
            			<option value="oneway" selected="selected">One Way SMS - www.onewaysms.com.my</option>
            		<?php }else{ ?>
            			<option value="oneway">One Way SMS - www.onewaysms.com.my</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="openhouse") { ?>
            			<option value="openhouse" selected="selected">Openhouse IMI Mobile - www.openhouse.imimobile.com</option>
            		<?php }else{ ?>
            			<option value="openhouse">Openhouse IMI Mobile - www.openhouse.imimobile.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="redsms") { ?>
            			<option value="redsms" selected="selected">Red SMS - www.redsms.in</option>
            		<?php }else{ ?>
            			<option value="redsms">Red SMS - www.redsms.in</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="routesms") { ?>
            			<option value="routesms" selected="selected">Routesms - www.routesms.com</option>
            		<?php }else{ ?>
            			<option value="routesms">Routesms - www.routesms.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="smsgatewayhub") { ?>
            			<option value="smsgatewayhub" selected="selected">SMS GATEWAYHUB - www.smsgatewayhub.com</option>
            		<?php }else{ ?>
            			<option value="smsgatewayhub">SMS GATEWAYHUB - www.smsgatewayhub.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="smslane") { ?>
            			<option value="smslane" selected="selected">SMS Lane - www.smslane.com</option>
            		<?php }else{ ?>
            			<option value="smslane">SMS Lane - www.smslane.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="smslaneg") { ?>
            			<option value="smslaneg" selected="selected">SMSLane Global SMS - www.world.smslane.com</option>
            		<?php }else{ ?>
            			<option value="smslaneg">SMSLane Global SMS - www.world.smslane.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="topsms") { ?>
            			<option value="topsms" selected="selected">TOP SMS - www.topsms.mobi</option>
            		<?php }else{ ?>
            			<option value="topsms">TOP SMS - www.topsms.mobi</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="velti") { ?>
            			<option value="velti" selected="selected">Velti - www.velti.com</option>
            		<?php }else{ ?>
            			<option value="velti">Velti - www.velti.com</option>
            		<?php } ?>
            		
            		<?php if ($gateway=="zenziva") { ?>
            			<option value="zenziva" selected="selected">Zenziva - www.zenziva.com</option>
            		<?php }else{ ?>
            			<option value="zenziva">Zenziva - www.zenziva.com</option>
            		<?php } ?>
            		
              </select>
              <?php if ($error_gateway) { ?>
              <span class="error"><?php echo $error_gateway; ?></span>
              <?php } ?></td>
          </tr>
          
          <tbody id="gateway-zenziva" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey; ?></td>
	            <td><input type="text" name="userkey" value="<?php echo $userkey; ?>">
	            <?php if ($error_userkey) { ?>
	              <span class="error"><?php echo $error_userkey; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey; ?></td>
	            <td><input type="password" name="passkey" value="<?php echo $passkey; ?>">
	            <?php if ($error_passkey) { ?>
	              <span class="error"><?php echo $error_passkey; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi; ?></td>
	            <td><input type="text" name="httpapi" value="<?php echo $httpapi; ?>" size="60px"><?php echo $httpapi_example; ?>
	            <?php if ($error_httpapi) { ?>
	              <span class="error"><?php echo $error_httpapi; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-clickatell" class="gateway">
	      		<tr>
	            <td><span class="required">*</span> <?php echo $entry_apiid_clickatell; ?></td>
	            <td><input type="text" name="apiid_clickatell" value="<?php echo $apiid_clickatell; ?>" maxlength="11">
	            <?php if ($error_apiid_clickatell) { ?>
	              <span class="error"><?php echo $error_apiid_clickatell; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_clickatell; ?></td>
	            <td><input type="text" name="userkey_clickatell" value="<?php echo $userkey_clickatell; ?>">
	            <?php if ($error_userkey_clickatell) { ?>
	              <span class="error"><?php echo $error_userkey_clickatell; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_clickatell; ?></td>
	            <td><input type="password" name="passkey_clickatell" value="<?php echo $passkey_clickatell; ?>">
	            <?php if ($error_passkey_clickatell) { ?>
	              <span class="error"><?php echo $error_passkey_clickatell; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_clickatell; ?></td>
	            <td><input type="text" name="httpapi_clickatell" value="<?php echo $httpapi_clickatell; ?>" size="60px"><?php echo $httpapi_example_clickatell; ?>
	            <?php if ($error_httpapi_clickatell) { ?>
	              <span class="error"><?php echo $error_httpapi_clickatell; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><?php echo $entry_senderid_clickatell; ?></td>
	            <td><input type="text" name="senderid_clickatell" value="<?php echo $senderid_clickatell; ?>"></td>
	          </tr>
	          <tr>
              <td><?php echo $entry_unicode_clickatell; ?></td>
              <td><?php if ($config_unicode_clickatell) { ?>
                <input type="radio" name="config_unicode_clickatell" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="config_unicode_clickatell" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="config_unicode_clickatell" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="config_unicode_clickatell" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-amd" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_amd; ?></td>
	            <td><input type="text" name="userkey_amd" value="<?php echo $userkey_amd; ?>">
	            <?php if ($error_userkey_amd) { ?>
	              <span class="error"><?php echo $error_userkey_amd; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_amd; ?></td>
	            <td><input type="password" name="passkey_amd" value="<?php echo $passkey_amd; ?>">
	            <?php if ($error_passkey_amd) { ?>
	              <span class="error"><?php echo $error_passkey_amd; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_amd; ?></td>
	            <td><input type="text" name="httpapi_amd" value="<?php echo $httpapi_amd; ?>" size="60px"><?php echo $httpapi_example_amd; ?>
	            <?php if ($error_httpapi_amd) { ?>
	              <span class="error"><?php echo $error_httpapi_amd; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_amd; ?></td>
	            <td><input type="text" name="senderid_amd" value="<?php echo $senderid_amd; ?>" maxlength="11">
	            <?php if ($error_senderid_amd) { ?>
	              <span class="error"><?php echo $error_senderid_amd; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-liveall" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_liveall; ?></td>
	            <td><input type="text" name="userkey_liveall" value="<?php echo $userkey_liveall; ?>" size="40px">
	            <?php if ($error_userkey_liveall) { ?>
	              <span class="error"><?php echo $error_userkey_liveall; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_liveall; ?></td>
	            <td><input type="password" name="passkey_liveall" value="<?php echo $passkey_liveall; ?>">
	            <?php if ($error_passkey_liveall) { ?>
	              <span class="error"><?php echo $error_passkey_liveall; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_liveall; ?></td>
	            <td><input type="text" name="httpapi_liveall" value="<?php echo $httpapi_liveall; ?>" size="60px"><?php echo $httpapi_example_liveall; ?>
	            <?php if ($error_httpapi_liveall) { ?>
	              <span class="error"><?php echo $error_httpapi_liveall; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_liveall; ?></td>
	            <td><input type="text" name="senderid_liveall" value="<?php echo $senderid_liveall; ?>" maxlength="11">
	            <?php if ($error_senderid_liveall) { ?>
	              <span class="error"><?php echo $error_senderid_liveall; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-smsglobal" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_smsglobal; ?></td>
	            <td><input type="text" name="userkey_smsglobal" value="<?php echo $userkey_smsglobal; ?>">
	            <?php if ($error_userkey_smsglobal) { ?>
	              <span class="error"><?php echo $error_userkey_smsglobal; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_smsglobal; ?></td>
	            <td><input type="password" name="passkey_smsglobal" value="<?php echo $passkey_smsglobal; ?>">
	            <?php if ($error_passkey_smsglobal) { ?>
	              <span class="error"><?php echo $error_passkey_smsglobal; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_smsglobal; ?></td>
	            <td><input type="text" name="httpapi_smsglobal" value="<?php echo $httpapi_smsglobal; ?>" size="60px"><?php echo $httpapi_example_smsglobal; ?>
	            <?php if ($error_httpapi_smsglobal) { ?>
	              <span class="error"><?php echo $error_httpapi_smsglobal; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_smsglobal; ?></td>
	            <td><input type="text" name="senderid_smsglobal" value="<?php echo $senderid_smsglobal; ?>" maxlength="11">
	            <?php if ($error_senderid_smsglobal) { ?>
	              <span class="error"><?php echo $error_senderid_smsglobal; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-malath" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_malath; ?></td>
	            <td><input type="text" name="userkey_malath" value="<?php echo $userkey_malath; ?>">
	            <?php if ($error_userkey_malath) { ?>
	              <span class="error"><?php echo $error_userkey_malath; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_malath; ?></td>
	            <td><input type="password" name="passkey_malath" value="<?php echo $passkey_malath; ?>">
	            <?php if ($error_passkey_malath) { ?>
	              <span class="error"><?php echo $error_passkey_malath; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_malath; ?></td>
	            <td><input type="text" name="httpapi_malath" value="<?php echo $httpapi_malath; ?>" size="60px"><?php echo $httpapi_example_malath; ?>
	            <?php if ($error_httpapi_malath) { ?>
	              <span class="error"><?php echo $error_httpapi_malath; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_malath; ?></td>
	            <td><input type="text" name="senderid_malath" value="<?php echo $senderid_malath; ?>" maxlength="11">
	            <?php if ($error_senderid_malath) { ?>
	              <span class="error"><?php echo $error_senderid_malath; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
              <td><?php echo $entry_unicode_malath; ?></td>
              <td><?php if ($config_unicode_malath) { ?>
                <input type="radio" name="config_unicode_malath" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="config_unicode_malath" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="config_unicode_malath" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="config_unicode_malath" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-mobily" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_mobily; ?></td>
	            <td><input type="text" name="userkey_mobily" value="<?php echo $userkey_mobily; ?>" size="40px">
	            <?php if ($error_userkey_mobily) { ?>
	              <span class="error"><?php echo $error_userkey_mobily; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_mobily; ?></td>
	            <td><input type="password" name="passkey_mobily" value="<?php echo $passkey_mobily; ?>">
	            <?php if ($error_passkey_mobily) { ?>
	              <span class="error"><?php echo $error_passkey_mobily; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_mobily; ?></td>
	            <td><input type="text" name="httpapi_mobily" value="<?php echo $httpapi_mobily; ?>" size="60px"><?php echo $httpapi_example_mobily; ?>
	            <?php if ($error_httpapi_mobily) { ?>
	              <span class="error"><?php echo $error_httpapi_mobily; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_mobily; ?></td>
	            <td><input type="text" name="senderid_mobily" value="<?php echo $senderid_mobily; ?>">
	            <?php if ($error_senderid_mobily) { ?>
	              <span class="error"><?php echo $error_senderid_mobily; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-msegat" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_msegat; ?></td>
	            <td><input type="text" name="userkey_msegat" value="<?php echo $userkey_msegat; ?>" size="40px">
	            <?php if ($error_userkey_msegat) { ?>
	              <span class="error"><?php echo $error_userkey_msegat; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_msegat; ?></td>
	            <td><input type="password" name="passkey_msegat" value="<?php echo $passkey_msegat; ?>">
	            <?php if ($error_passkey_msegat) { ?>
	              <span class="error"><?php echo $error_passkey_msegat; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_msegat; ?></td>
	            <td><input type="text" name="httpapi_msegat" value="<?php echo $httpapi_msegat; ?>" size="60px"><?php echo $httpapi_example_msegat; ?>
	            <?php if ($error_httpapi_msegat) { ?>
	              <span class="error"><?php echo $error_httpapi_msegat; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_msegat; ?></td>
	            <td><input type="text" name="senderid_msegat" value="<?php echo $senderid_msegat; ?>">
	            <?php if ($error_senderid_msegat) { ?>
	              <span class="error"><?php echo $error_senderid_msegat; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-msg91" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_msg91; ?></td>
	            <td><input type="text" name="userkey_msg91" value="<?php echo $userkey_msg91; ?>" size="40px">
	            <?php if ($error_userkey_msg91) { ?>
	              <span class="error"><?php echo $error_userkey_msg91; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_route_msg91; ?></td>
	            <td><input type="text" name="route_msg91" value="<?php echo $route_msg91; ?>">
	            <?php if ($error_route_msg91) { ?>
	              <span class="error"><?php echo $error_route_msg91; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_msg91; ?></td>
	            <td><input type="text" name="httpapi_msg91" value="<?php echo $httpapi_msg91; ?>" size="60px"><?php echo $httpapi_example_msg91; ?>
	            <?php if ($error_httpapi_msg91) { ?>
	              <span class="error"><?php echo $error_httpapi_msg91; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_msg91; ?></td>
	            <td><input type="text" name="senderid_msg91" value="<?php echo $senderid_msg91; ?>">
	            <?php if ($error_senderid_msg91) { ?>
	              <span class="error"><?php echo $error_senderid_msg91; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-mvaayoo" class="gateway">
	      		<tr>
	            <td><span class="required"></span> <?php echo $entry_term_mvaayoo; ?></td>
	            <td><span class="required"></span> <?php echo $text_term_mvaayoo; ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_mvaayoo; ?></td>
	            <td><input type="text" name="userkey_mvaayoo" value="<?php echo $userkey_mvaayoo; ?>" size="40px">
	            <?php if ($error_userkey_mvaayoo) { ?>
	              <span class="error"><?php echo $error_userkey_mvaayoo; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_mvaayoo; ?></td>
	            <td><input type="password" name="passkey_mvaayoo" value="<?php echo $passkey_mvaayoo; ?>">
	            <?php if ($error_passkey_mvaayoo) { ?>
	              <span class="error"><?php echo $error_passkey_mvaayoo; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_mvaayoo; ?></td>
	            <td><input type="text" name="httpapi_mvaayoo" value="<?php echo $httpapi_mvaayoo; ?>" size="60px"><?php echo $httpapi_example_mvaayoo; ?>
	            <?php if ($error_httpapi_mvaayoo) { ?>
	              <span class="error"><?php echo $error_httpapi_mvaayoo; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_mvaayoo; ?></td>
	            <td><input type="text" name="senderid_mvaayoo" value="<?php echo $senderid_mvaayoo; ?>" maxlength="11">
	            <?php if ($error_senderid_mvaayoo) { ?>
	              <span class="error"><?php echo $error_senderid_mvaayoo; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-mysms" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_mysms; ?></td>
	            <td><input type="text" name="userkey_mysms" value="<?php echo $userkey_mysms; ?>" size="40px">
	            <?php if ($error_userkey_mysms) { ?>
	              <span class="error"><?php echo $error_userkey_mysms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_mysms; ?></td>
	            <td><input type="password" name="passkey_mysms" value="<?php echo $passkey_mysms; ?>">
	            <?php if ($error_passkey_mysms) { ?>
	              <span class="error"><?php echo $error_passkey_mysms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_mysms; ?></td>
	            <td><input type="text" name="httpapi_mysms" value="<?php echo $httpapi_mysms; ?>" size="60px"><?php echo $httpapi_example_mysms; ?>
	            <?php if ($error_httpapi_mysms) { ?>
	              <span class="error"><?php echo $error_httpapi_mysms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_mysms; ?></td>
	            <td><input type="text" name="senderid_mysms" value="<?php echo $senderid_mysms; ?>" maxlength="11">
	            <?php if ($error_senderid_mysms) { ?>
	              <span class="error"><?php echo $error_senderid_mysms; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-nexmo" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_nexmo; ?></td>
	            <td><input type="text" name="userkey_nexmo" value="<?php echo $userkey_nexmo; ?>">
	            <?php if ($error_userkey_nexmo) { ?>
	              <span class="error"><?php echo $error_userkey_nexmo; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_nexmo; ?></td>
	            <td><input type="password" name="passkey_nexmo" value="<?php echo $passkey_nexmo; ?>">
	            <?php if ($error_passkey_nexmo) { ?>
	              <span class="error"><?php echo $error_passkey_nexmo; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_nexmo; ?></td>
	            <td><input type="text" name="httpapi_nexmo" value="<?php echo $httpapi_nexmo; ?>" size="60px"><?php echo $httpapi_example_nexmo; ?>
	            <?php if ($error_httpapi_nexmo) { ?>
	              <span class="error"><?php echo $error_httpapi_nexmo; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_nexmo; ?></td>
	            <td><input type="text" name="senderid_nexmo" value="<?php echo $senderid_nexmo; ?>" maxlength="11">
	            <?php if ($error_senderid_nexmo) { ?>
	              <span class="error"><?php echo $error_senderid_nexmo; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
              <td><?php echo $entry_unicode_nexmo; ?></td>
              <td><?php if ($config_unicode_nexmo) { ?>
                <input type="radio" name="config_unicode_nexmo" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="config_unicode_nexmo" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="config_unicode_nexmo" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="config_unicode_nexmo" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-netgsm" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_netgsm; ?></td>
	            <td><input type="text" name="userkey_netgsm" value="<?php echo $userkey_netgsm; ?>" size="40px">
	            <?php if ($error_userkey_netgsm) { ?>
	              <span class="error"><?php echo $error_userkey_netgsm; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_netgsm; ?></td>
	            <td><input type="password" name="passkey_netgsm" value="<?php echo $passkey_netgsm; ?>">
	            <?php if ($error_passkey_netgsm) { ?>
	              <span class="error"><?php echo $error_passkey_netgsm; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_netgsm; ?></td>
	            <td><input type="text" name="httpapi_netgsm" value="<?php echo $httpapi_netgsm; ?>" size="60px"><?php echo $httpapi_example_netgsm; ?>
	            <?php if ($error_httpapi_netgsm) { ?>
	              <span class="error"><?php echo $error_httpapi_netgsm; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_netgsm; ?></td>
	            <td><input type="text" name="senderid_netgsm" value="<?php echo $senderid_netgsm; ?>" maxlength="11">
	            <?php if ($error_senderid_netgsm) { ?>
	              <span class="error"><?php echo $error_senderid_netgsm; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-oneway" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_oneway; ?></td>
	            <td><input type="text" name="userkey_oneway" value="<?php echo $userkey_oneway; ?>">
	            <?php if ($error_userkey_oneway) { ?>
	              <span class="error"><?php echo $error_userkey_oneway; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_oneway; ?></td>
	            <td><input type="password" name="passkey_oneway" value="<?php echo $passkey_oneway; ?>">
	            <?php if ($error_passkey_oneway) { ?>
	              <span class="error"><?php echo $error_passkey_oneway; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_oneway; ?></td>
	            <td><input type="text" name="httpapi_oneway" value="<?php echo $httpapi_oneway; ?>" size="60px"><?php echo $httpapi_example_oneway; ?>
	            <?php if ($error_httpapi_oneway) { ?>
	              <span class="error"><?php echo $error_httpapi_oneway; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_oneway; ?></td>
	            <td><input type="text" name="senderid_oneway" value="<?php echo $senderid_oneway; ?>" maxlength="11">
	            <?php if ($error_senderid_oneway) { ?>
	              <span class="error"><?php echo $error_senderid_oneway; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-openhouse" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_openhouse; ?></td>
	            <td><input type="text" name="userkey_openhouse" value="<?php echo $userkey_openhouse; ?>" size="60px">
	            <?php if ($error_userkey_openhouse) { ?>
	              <span class="error"><?php echo $error_userkey_openhouse; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_openhouse; ?></td>
	            <td><input type="text" name="passkey_openhouse" value="<?php echo $passkey_openhouse; ?>">
	            <?php if ($error_passkey_openhouse) { ?>
	              <span class="error"><?php echo $error_passkey_openhouse; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_openhouse; ?></td>
	            <td><input type="text" name="senderid_openhouse" value="<?php echo $senderid_openhouse; ?>" >
	            <?php if ($error_senderid_openhouse) { ?>
	              <span class="error"><?php echo $error_senderid_openhouse; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-redsms" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_redsms; ?></td>
	            <td><input type="text" name="userkey_redsms" value="<?php echo $userkey_redsms; ?>">
	            <?php if ($error_userkey_redsms) { ?>
	              <span class="error"><?php echo $error_userkey_redsms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_redsms; ?></td>
	            <td><input type="password" name="passkey_redsms" value="<?php echo $passkey_redsms; ?>">
	            <?php if ($error_passkey_redsms) { ?>
	              <span class="error"><?php echo $error_passkey_redsms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_redsms; ?></td>
	            <td><input type="text" name="httpapi_redsms" value="<?php echo $httpapi_redsms; ?>" size="60px"><?php echo $httpapi_example_redsms; ?>
	            <?php if ($error_httpapi_redsms) { ?>
	              <span class="error"><?php echo $error_httpapi_redsms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_redsms; ?></td>
	            <td><input type="text" name="senderid_redsms" value="<?php echo $senderid_redsms; ?>" maxlength="20">
	            <?php if ($error_senderid_redsms) { ?>
	              <span class="error"><?php echo $error_senderid_redsms; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-routesms" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_routesms; ?></td>
	            <td><input type="text" name="userkey_routesms" value="<?php echo $userkey_routesms; ?>">
	            <?php if ($error_userkey_routesms) { ?>
	              <span class="error"><?php echo $error_userkey_routesms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_routesms; ?></td>
	            <td><input type="password" name="passkey_routesms" value="<?php echo $passkey_routesms; ?>">
	            <?php if ($error_passkey_routesms) { ?>
	              <span class="error"><?php echo $error_passkey_routesms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_routesms; ?></td>
	            <td><input type="text" name="httpapi_routesms" value="<?php echo $httpapi_routesms; ?>" size="60px"><?php echo $httpapi_example_routesms; ?>
	            <?php if ($error_httpapi_routesms) { ?>
	              <span class="error"><?php echo $error_httpapi_routesms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_routesms; ?></td>
	            <td><input type="text" name="senderid_routesms" value="<?php echo $senderid_routesms; ?>" maxlength="18">
	            <?php if ($error_senderid_routesms) { ?>
	              <span class="error"><?php echo $error_senderid_routesms; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-smsgatewayhub" class="gateway">
	      		<tr>
	            <td><span class="required"></span> <?php echo $entry_term_smsgatewayhub; ?></td>
	            <td><span class="required"></span> <?php echo $text_term_smsgatewayhub; ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_smsgatewayhub; ?></td>
	            <td><input type="text" name="userkey_smsgatewayhub" value="<?php echo $userkey_smsgatewayhub; ?>" size="40px">
	            <?php if ($error_userkey_smsgatewayhub) { ?>
	              <span class="error"><?php echo $error_userkey_smsgatewayhub; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_smsgatewayhub; ?></td>
	            <td><input type="password" name="passkey_smsgatewayhub" value="<?php echo $passkey_smsgatewayhub; ?>">
	            <?php if ($error_passkey_smsgatewayhub) { ?>
	              <span class="error"><?php echo $error_passkey_smsgatewayhub; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_smsgatewayhub; ?></td>
	            <td><input type="text" name="httpapi_smsgatewayhub" value="<?php echo $httpapi_smsgatewayhub; ?>" size="60px"><?php echo $httpapi_example_smsgatewayhub; ?>
	            <?php if ($error_httpapi_smsgatewayhub) { ?>
	              <span class="error"><?php echo $error_httpapi_smsgatewayhub; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_smsgatewayhub; ?></td>
	            <td><input type="text" name="senderid_smsgatewayhub" value="<?php echo $senderid_smsgatewayhub; ?>" maxlength="11">
	            <?php if ($error_senderid_smsgatewayhub) { ?>
	              <span class="error"><?php echo $error_senderid_smsgatewayhub; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-smslane" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_smslane; ?></td>
	            <td><input type="text" name="userkey_smslane" value="<?php echo $userkey_smslane; ?>">
	            <?php if ($error_userkey_smslane) { ?>
	              <span class="error"><?php echo $error_userkey_smslane; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_smslane; ?></td>
	            <td><input type="password" name="passkey_smslane" value="<?php echo $passkey_smslane; ?>">
	            <?php if ($error_passkey_smslane) { ?>
	              <span class="error"><?php echo $error_passkey_smslane; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_smslane; ?></td>
	            <td><input type="text" name="httpapi_smslane" value="<?php echo $httpapi_smslane; ?>" size="60px"><?php echo $httpapi_example_smslane; ?>
	            <?php if ($error_httpapi_smslane) { ?>
	              <span class="error"><?php echo $error_httpapi_smslane; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_smslane; ?></td>
	            <td><input type="text" name="senderid_smslane" value="<?php echo $senderid_smslane; ?>" maxlength="16">
	            <?php if ($error_senderid_smslane) { ?>
	              <span class="error"><?php echo $error_senderid_smslane; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
              <td><?php echo $entry_unicode_smslane; ?></td>
              <td><?php if ($config_unicode_smslane) { ?>
                <input type="radio" name="config_unicode_smslane" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="config_unicode_smslane" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="config_unicode_smslane" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="config_unicode_smslane" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-smslaneg" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_smslaneg; ?></td>
	            <td><input type="text" name="userkey_smslaneg" value="<?php echo $userkey_smslaneg; ?>">
	            <?php if ($error_userkey_smslaneg) { ?>
	              <span class="error"><?php echo $error_userkey_smslaneg; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_smslaneg; ?></td>
	            <td><input type="password" name="passkey_smslaneg" value="<?php echo $passkey_smslaneg; ?>">
	            <?php if ($error_passkey_smslaneg) { ?>
	              <span class="error"><?php echo $error_passkey_smslaneg; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_smslaneg; ?></td>
	            <td><input type="text" name="httpapi_smslaneg" value="<?php echo $httpapi_smslaneg; ?>" size="60px"><?php echo $httpapi_example_smslaneg; ?>
	            <?php if ($error_httpapi_smslaneg) { ?>
	              <span class="error"><?php echo $error_httpapi_smslaneg; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_smslaneg; ?></td>
	            <td><input type="text" name="senderid_smslaneg" value="<?php echo $senderid_smslaneg; ?>" maxlength="11">
	            <?php if ($error_senderid_smslaneg) { ?>
	              <span class="error"><?php echo $error_senderid_smslaneg; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
              <td><?php echo $entry_unicode_smslaneg; ?></td>
              <td><?php if ($config_unicode_smslaneg) { ?>
                <input type="radio" name="config_unicode_smslaneg" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="config_unicode_smslaneg" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="config_unicode_smslaneg" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="config_unicode_smslaneg" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-topsms" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_topsms; ?></td>
	            <td><input type="text" name="userkey_topsms" value="<?php echo $userkey_topsms; ?>">
	            <?php if ($error_userkey_topsms) { ?>
	              <span class="error"><?php echo $error_userkey_topsms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_topsms; ?></td>
	            <td><input type="password" name="passkey_topsms" value="<?php echo $passkey_topsms; ?>">
	            <?php if ($error_passkey_topsms) { ?>
	              <span class="error"><?php echo $error_passkey_topsms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_topsms; ?></td>
	            <td><input type="text" name="httpapi_topsms" value="<?php echo $httpapi_topsms; ?>" size="60px"><?php echo $httpapi_example_topsms; ?>
	            <?php if ($error_httpapi_topsms) { ?>
	              <span class="error"><?php echo $error_httpapi_topsms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_senderid_topsms; ?></td>
	            <td><input type="text" name="senderid_topsms" value="<?php echo $senderid_topsms; ?>" maxlength="11">
	            <?php if ($error_senderid_topsms) { ?>
	              <span class="error"><?php echo $error_senderid_topsms; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
              <td><?php echo $entry_lang_topsms; ?></td>
              <td><?php if ($config_lang_topsms) { ?>
                <input type="radio" name="config_lang_topsms" value="1" checked="checked" />
                <?php echo $text_ar; ?>
                <input type="radio" name="config_lang_topsms" value="0" />
                <?php echo $text_en; ?>
                <?php } else { ?>
                <input type="radio" name="config_lang_topsms" value="1" />
                <?php echo $text_ar; ?>
                <input type="radio" name="config_lang_topsms" value="0" checked="checked" />
                <?php echo $text_en; ?>
                <?php } ?></td>
            </tr>
	      	</tbody>
	      	
	      	<tbody id="gateway-velti" class="gateway">
	          <tr>
	            <td><span class="required">*</span> <?php echo $entry_userkey_velti; ?></td>
	            <td><input type="text" name="userkey_velti" value="<?php echo $userkey_velti; ?>">
	            <?php if ($error_userkey_velti) { ?>
	              <span class="error"><?php echo $error_userkey_velti; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_passkey_velti; ?></td>
	            <td><input type="password" name="passkey_velti" value="<?php echo $passkey_velti; ?>">
	            <?php if ($error_passkey_velti) { ?>
	              <span class="error"><?php echo $error_passkey_velti; ?></span>
	              <?php } ?></td>
	          </tr>
	          <tr>
	          	<td><span class="required">*</span> <?php echo $entry_httpapi_velti; ?></td>
	            <td><input type="text" name="httpapi_velti" value="<?php echo $httpapi_velti; ?>" size="60px"><?php echo $httpapi_example_velti; ?>
	            <?php if ($error_httpapi_velti) { ?>
	              <span class="error"><?php echo $error_httpapi_velti; ?></span>
	              <?php } ?></td>
	          </tr>
	      	</tbody>
	      	
	      	<tr>
	          <td><?php echo $entry_smslimit; ?></td>
	          <td><input type="text" name="smslimit" value="<?php echo $smslimit; ?>" size="3"> <?php echo $text_limit; ?></td>
	        </tr>
	        <tr>
          	<td><?php echo $entry_alert_reg; ?></td>
          	<td><textarea name="message_reg" cols="47" rows="5" ><?php echo $message_reg; ?></textarea><?php echo $entry_alert_blank; ?>
            </td>
          </tr>
          <tr>
          	<td><?php echo $entry_alert_order; ?></td>
          	<td><textarea name="message_order" cols="47" rows="5" ><?php echo $message_order; ?></textarea><?php echo $entry_alert_blank; ?><?php echo $entry_parsing; ?>
            </td>
          </tr>
          
          <tr>
            <td><?php echo $entry_status_order_alert; ?></td>
            <td><select name="status">
            		<option value=""><?php echo $text_status_none; ?></option>
            		
            		<?php foreach ($order_statuses as $order_status) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                
              </select>
            </td>
          </tr>
          
          <?php foreach ($order_statuses as $order_status) { ?>
	          <tbody id="status-<?php echo $order_status['order_status_id'] ?>" class="status">
	             <tr>
				         <td><?php echo '<span class="required">'.$order_status['name'].'</span> '.$entry_alert_changestate; ?></td>
				         <td><textarea name="message_changestate_<?php echo $order_status['order_status_id'] ?>" cols="47" rows="5" ><?php echo ${"message_changestate_" . $order_status['order_status_id']}; ?></textarea><?php echo $entry_alert_blank; ?>
				         </td>
			         </tr>
			      </tbody>
          <?php } ?>
          <tr>
              <td><?php echo $entry_alert_sms; ?></td>
              <td><textarea name="config_alert_sms" cols="47" rows="5" ><?php echo $config_alert_sms; ?></textarea><?php echo $entry_alert_blank; ?><?php echo $entry_parsing; ?></td>
          </tr>
          
          <tr>
              <td><?php echo $entry_account_sms; ?></td>
              <td><textarea name="config_account_sms" cols="47" rows="5" ><?php echo $config_account_sms; ?></textarea><?php echo $entry_alert_blank; ?></td>
            </tr>
            
          <tr>
          	<td><?php echo $entry_additional_alert; ?></td>
          	<td><textarea name="message_alert" cols="47" rows="5" ><?php echo $message_alert; ?></textarea><?php echo $entry_alert_blank; ?>
            </td>
          </tr>
          
          <tr>
            <td><?php echo $text_enable_verify; ?></td>
            <td><select name="verify">
            		
            		<?php if ($verify==0) { ?>
            			<option value="0" selected="selected"><?php echo $text_no; ?></option>
            		<?php }else{ ?>
            			<option value="0"><?php echo $text_no; ?></option>
            		<?php } ?>
            		
            		<?php if ($verify==1) { ?>
            			<option value="1" selected="selected"><?php echo $text_yes; ?></option>
            		<?php }else{ ?>
            			<option value="1"><?php echo $text_yes; ?></option>
            		<?php } ?>
                
              </select>
            </td>
          </tr>
          <tbody id="verify-1" class="verify">
          		<tr>
		            <td><?php echo $text_verify_checkout; ?></td>
		            <td><select name="order_verify">
		            		
		            		<?php if ($order_verify==0) { ?>
		            			<option value="0" selected="selected"><?php echo $text_no; ?></option>
		            		<?php }else{ ?>
		            			<option value="0"><?php echo $text_no; ?></option>
		            		<?php } ?>
		            		
		            		<?php if ($order_verify==1) { ?>
		            			<option value="1" selected="selected"><?php echo $text_yes; ?></option>
		            		<?php }else{ ?>
		            			<option value="1"><?php echo $text_yes; ?></option>
		            		<?php } ?>
		                
		              </select>
		            </td>
		          </tr>
		          
		          <tr id="order_verify-1" class="order_verify">
		              <td><span class="required">*</span> <?php echo $entry_skip_payment_method; ?></td>
		              <td>
		              	<select name="skip_payment_method[]" multiple="multiple" size="5">
		              		<option id="null" onClick="$('.nulls').removeAttr('selected')" value="none" <?php if (@in_array('none', $skip_payment_method)) echo "selected";?>>None</option>
		                  <?php foreach ($payment_methods as $payment_method) { ?>
		                  <option class="nulls" onClick="$('#null').removeAttr('selected')" value="<?php echo $payment_method['code']; ?>" <?php if (@in_array($payment_method['code'],$skip_payment_method)) echo "selected";?>><?php echo $payment_method['title']; ?>
		                  <?php } ?>
		                </select><?php echo $entry_skip_payment_method_help; ?>
		              </td>
		           </tr>
		           
		           <tr id="order_verify-1" class="order_verify">
		              <td><span class="required">*</span> <?php echo $entry_skip_group; ?></td>
		              <td>
		              	<select name="skip_group_id[]" multiple="multiple" size="5">
		              		<option id="none" onClick="$('.nones').removeAttr('selected')" value=0 <?if (@in_array(0,$skip_group_id)) echo "selected";?>>None</option>
		                  <?php foreach ($customer_groups as $customer_group) { ?>
		                  <!--<option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>-->
		                  <option class="nones" onClick="$('#none').removeAttr('selected')" value="<?php echo $customer_group['customer_group_id']; ?>" <?php if (@in_array($customer_group['customer_group_id'],$skip_group_id)) echo "selected";?>><?php echo $customer_group['name']; ?>
		                  <?php } ?>
		                </select><?php echo $entry_skip_group_help; ?>
		              </td>
		           </tr>
		           
		           <tr>
		            <td><?php echo $text_verify_register; ?></td>
		            <td><select name="register_verify">
		            		
		            		<?php if ($register_verify==0) { ?>
		            			<option value="0" selected="selected"><?php echo $text_no; ?></option>
		            		<?php }else{ ?>
		            			<option value="0"><?php echo $text_no; ?></option>
		            		<?php } ?>
		            		
		            		<?php if ($register_verify==1) { ?>
		            			<option value="1" selected="selected"><?php echo $text_yes; ?></option>
		            		<?php }else{ ?>
		            			<option value="1"><?php echo $text_yes; ?></option>
		            		<?php } ?>
		                
		              </select>
		            </td>
		          </tr>
		          
		          <tr>
		            <td><?php echo $text_verify_forgotten; ?></td>
		            <td><select name="forgotten_verify">
		            		
		            		<?php if ($forgotten_verify==0) { ?>
		            			<option value="0" selected="selected"><?php echo $text_no; ?></option>
		            		<?php }else{ ?>
		            			<option value="0"><?php echo $text_no; ?></option>
		            		<?php } ?>
		            		
		            		<?php if ($forgotten_verify==1) { ?>
		            			<option value="1" selected="selected"><?php echo $text_yes; ?></option>
		            		<?php }else{ ?>
		            			<option value="1"><?php echo $text_yes; ?></option>
		            		<?php } ?>
		                
		              </select>
		            </td>
		          </tr>
		          
          		<tr>
		            <td><span class="required">*</span> <?php echo $entry_code_digit; ?></td>
		            <td>
		            	<input type="text" name="code_digit" value="<?php echo $code_digit; ?>" onkeyup="this.value = this.value.replace (/\D+/, '')" />
		            	<?php if ($error_code_digit) { ?>
		              <span class="error"><?php echo $error_code_digit; ?></span>
		              <?php } ?>
		            </td>
		          </tr>
		          
		          <tr>
		            <td><?php echo $entry_max_retry; ?></td>
		            <td>
		            	<input type="text" name="max_retry" value="<?php echo $max_retry; ?>" onkeyup="this.value = this.value.replace (/\D+/, '')" />
		            	<?php echo $entry_limit_blank; ?>
		            </td>
		          </tr>
	          
	            <tr>
				        <td><span class="required">*</span> <?php echo $entry_verify_code ?></td>
				        <td>
				        <textarea name="message_code_verification" cols="47" rows="5" ><?php echo $message_code_verification; ?></textarea>
				        <?php if ($error_message_code_verification) { ?>
		            <span class="error"><?php echo $error_message_code_verification; ?></span>
		            <?php } ?>
				        </td>
			        </tr>
			         
			      </tbody>
          
        </table>
        
        <table id="module" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $entry_layout; ?></td>
              <td class="left"><?php echo $entry_position; ?></td>
              <td class="left"><?php echo $entry_status; ?></td>
              <td class="right"><?php echo $entry_sort_order; ?></td>
              <td></td>
            </tr>
          </thead>
          <?php $module_row = 0; ?>
          <?php foreach ($modules as $module) { ?>
          <tbody id="module-row<?php echo $module_row; ?>">
            <tr>
              <td class="left"><select name="jossms_module[<?php echo $module_row; ?>][layout_id]">
                  <?php foreach ($layouts as $layout) { ?>
                  <?php if ($layout['layout_id'] == $module['layout_id']) { ?>
                  <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
              <td class="left"><select name="jossms_module[<?php echo $module_row; ?>][position]">
                  <?php if ($module['position'] == 'content_top') { ?>
                  <option value="content_top" selected="selected"><?php echo $text_content_top; ?></option>
                  <?php } else { ?>
                  <option value="content_top"><?php echo $text_content_top; ?></option>
                  <?php } ?>
                  <?php if ($module['position'] == 'content_bottom') { ?>
                  <option value="content_bottom" selected="selected"><?php echo $text_content_bottom; ?></option>
                  <?php } else { ?>
                  <option value="content_bottom"><?php echo $text_content_bottom; ?></option>
                  <?php } ?>
                  <?php if ($module['position'] == 'column_left') { ?>
                  <option value="column_left" selected="selected"><?php echo $text_column_left; ?></option>
                  <?php } else { ?>
                  <option value="column_left"><?php echo $text_column_left; ?></option>
                  <?php } ?>
                  <?php if ($module['position'] == 'column_right') { ?>
                  <option value="column_right" selected="selected"><?php echo $text_column_right; ?></option>
                  <?php } else { ?>
                  <option value="column_right"><?php echo $text_column_right; ?></option>
                  <?php } ?>
                </select></td>
              <td class="left"><select name="jossms_module[<?php echo $module_row; ?>][status]">
                  <?php if ($module['status']) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
              <td class="right"><input type="text" name="jossms_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
              <td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
            </tr>
          </tbody>
          <?php $module_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="4"></td>
              <td class="left"><a onclick="addModule();" class="button"><?php echo $button_add_module; ?></a></td>
            </tr>
          </tfoot>
        </table>
      </form>
    </div>
  </div>
  
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" /> <?php echo $intruction_title; ?></h1>
    </div>
    <div class="content" height="20%">
      <?php echo $text_instruction; ?>
    </div>
  </div>
  
</div>

<script type="text/javascript"><!--	
$('select[name=\'gateway\']').bind('change', function() {
	$('#setgate .gateway').hide();
	
	$('#setgate #gateway-' + $(this).attr('value').replace('_', '-')).show();
});

$('select[name=\'gateway\']').trigger('change');


$('select[name=\'status\']').bind('change', function() {
	$('#setgate .status').hide();
	
	$('#setgate #status-' + $(this).attr('value').replace('_', '-')).show();
});

$('select[name=\'status\']').trigger('change');


$('select[name=\'verify\']').bind('change', function() {
	$('#setgate .verify').hide();
	
	$('#setgate #verify-' + $(this).attr('value').replace('_', '-')).show();
});

$('select[name=\'verify\']').trigger('change');

$('select[name=\'order_verify\']').bind('change', function() {
	$('#setgate .order_verify').hide();
	
	$('#setgate #order_verify-' + $(this).attr('value').replace('_', '-')).show();
});

$('select[name=\'order_verify\']').trigger('change');

//--></script>


<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;

function addModule() {	
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>';
	html += '    <td class="left"><select name="jossms_module[' + module_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
	<?php } ?>
	html += '    </select></td>';
	html += '    <td class="left"><select name="jossms_module[' + module_row + '][position]">';
	html += '      <option value="content_top"><?php echo $text_content_top; ?></option>';
	html += '      <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
	html += '      <option value="column_left"><?php echo $text_column_left; ?></option>';
	html += '      <option value="column_right"><?php echo $text_column_right; ?></option>';
	html += '    </select></td>';
	html += '    <td class="left"><select name="jossms_module[' + module_row + '][status]">';
    html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '      <option value="0"><?php echo $text_disabled; ?></option>';
    html += '    </select></td>';
	html += '    <td class="right"><input type="text" name="jossms_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
	html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}
//--></script> 
<?php echo $footer; ?>