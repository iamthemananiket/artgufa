<div class="warning" style="display:none" id="ovwarn"></div>
<div class="success" style="display:none" id="sendsuccess"></div>
<div id="step1">
<h1><?php echo $heading_title?>: </h1>
<div class="buttons" id="step1">
<?php $the_text = sprintf($text_explain1, $phone); echo "<h2>$the_text</h2>";?>
<?php echo $text_phone?>:
<input type="text" name="phone" id="phone" value="<?php echo $phone;?>"> <br>
<br />

<div>
<a id="button-startver" class="button"><span><?php echo $text_start?></span></a>
</div>
</div>
</div>
<div id="step2" style="display:none" class="buttons">
<?php echo "<h2>$text_explain_started</h2>";?>
<div id="type1" style="display:none"><h4><?echo $text_explain_phone_call2;?></h4></div>
<div id="type2" style="display:none"><h4><?echo $text_explain_sms2;?></h4></div>

<?php echo "$text_verification_code";?> <input type="text" name="pin" id="pin"><br />
<br />
  <div> <a id="button-confirm" class="button"><span><?php echo $text_verify;?></span></a> <a id="button-startver2" class="button"><span><?php echo $text_resend;?></span></a></div>
</div>


<script type="text/javascript"><!--
	var verified = '<?php echo $verified?>';
	if (verified != '1') {
		$("#continue").hide();
	}
	
var pinsent = '<?php echo $pinsent?>';
if (pinsent=='1') {
		
		$("#step1").hide();
		$("#step2").show();
		$("#type1").hide();
		$("#type2").hide();
}
$('#button-confirm').bind('click', function() {
	$.ajax({ 
		type: 'POST',
		data: 'pin=' + $('#pin').val()+ "&regphone=" + document.getElementsByName("telephone")[0].value,
		url: 'index.php?route=module/jossmsregisterverify/confirm',
		success: function(data) {
				if (data==1) {
					$("#ovwarn").hide();
					$("#sendsuccess").hide();
					//if ($('#button-payment').length>0) $('#button-payment').click();
					//else if ($('#button-shipping').length>0) $('#button-shipping').click();
					//else if ($('#button-payment-method').length>0) $('#button-payment-method').click();
					$("#step2").hide();
					$("#continue").show();
				}else if (data==3) {
				$("#sendsuccess").hide();
				$("#ovwarn").html("<?php echo $text_null_number?>");
				$("#ovwarn").show();
				}
				else {
				$("#sendsuccess").hide();
				$("#ovwarn").html("<?php echo $text_invalid_pin?>");
				$("#ovwarn").show();
				}
		}		
	});
});
$('#button-startver2').bind('click', function() {
	$("#ovwarn").hide();
	$("#sendsuccess").hide();
	$("#step2").hide();
	$("#step1").show();
});
var wait = 0;
$('#button-startver').bind('click', function() {

if (!wait) {
wait = 1;
	$.ajax({ 
		type: 'POST',
		data: 'phone='+$('#phone').val() + "&regphone=" + document.getElementsByName("telephone")[0].value + "&country_id=" + document.getElementsByName("country_id")[0].value,
		url: 'index.php?route=module/jossmsregisterverify/start',
		success: function(data) {
		wait = 0;
			switch (data) {
			case "1":
				$("#sendsuccess").hide();
				$("#ovwarn").html("<?php echo $text_different_number;?>");
				$("#ovwarn").show();
			break;
			case "5":
				$("#sendsuccess").hide();
				$("#ovwarn").html("<?php echo $text_provide_valid_mobile_number;?>");
				$("#ovwarn").show();
			break;
			case "2":
			case "Success":
					$("#sendsuccess").html("<?php echo $text_send_success?>");
					$("#sendsuccess").show();
					$("#ovwarn").hide();
					$("#step1").hide();
					$("#step2").show();	
					$("#type1").hide();
					$("#type2").hide();
					$("#type"+data).show();
			break;
			case "15":
				$("#sendsuccess").hide();
				$("#ovwarn").html("<?php echo $text_explain_same_number;?>");
				$("#ovwarn").show();
			break;
			case "14":
				$("#sendsuccess").hide();
				$("#ovwarn").html("<?php echo $text_please_wait_next;?>");
				$("#ovwarn").show();
			break;
			case "12":
				$("#sendsuccess").hide();
				$("#ovwarn").html("<?php echo $text_max_retries_exceeded;?>");
				$("#ovwarn").show();
			break;
			case "16":
				$("#sendsuccess").hide();
				$("#ovwarn").html("<?php echo $text_connection_problem;?>");
				$("#ovwarn").show();
			break;
			default:
				$("#sendsuccess").hide();
				$("#ovwarn").html("<?php echo $text_provide_valid_number;?>");
				$("#ovwarn").show();
				
			}
		}		
	});
	}
	else alert('<?php echo $text_please_wait;?>');
});
//--></script> 