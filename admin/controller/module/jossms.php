<?php
class ControllerModuleJosSMS extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->language->load('module/jossms');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$prefix = array(
					'AD' => 376,'AE' => 971,'AF' => 93,'AG' => 1268,'AI' => 1264,'AL' => 355,'AM' => 374,'AN' => 599,'AO' => 244,
					'AQ' => 672,'AR' => 54,'AS' => 1684,'AT' => 43,'AU' => 61,'AW' => 297,'AX' => '','AZ' => 994,'BA' => 387,
					'BB' => 1246,'BD' => 880,'BE' => 32,'BF' => 226,'BG' => 359,'BH' => 973,'BI' => 257,'BJ' => 229,'BL' => 590,'BM' => 1441,
					'BN' => 673,'BO' => 591,'BR' => 55,'BS' => 1242,'BT' => 975,'BV' => '','BW' => 267,'BY' => 375,'BZ' => 501,
					'CA' => 1,'CC' => 61,'CD' => 242,'CF' => 236,'CG' => 243,'CH' => 41,'CI' => 225,'CK' => 682,'CL' => 56,'CM' => 237,
					'CN' => 86,'CO' => 57,'CR' => 506,'CU' => 53,'CV' => 238,'CX' => 61,'CY' => 357,'CZ' => 420,'DE' => 49,'DJ' => 253,
					'DK' => 45,'DM' => 1767,'DO' => 1809,'DZ' => 213,'EC' => 593,'EE' => 372,'EG' => 20,'EH' => '','ER' => 291,'ES' => 34,
					'ET' => 251,'FI' => 358,'FJ' => 679,'FK' => 500,'FM' => 691,'FO' => 298,'FR' => 33,'GA' => 241,'GB' => 44,'GD' => 1473,
					'GE' => 995,'GF' => 594,'GG' => 44,'GH' => 233,'GI' => 350,'GL' => 299,'GM' => 220,'GN' => 224,'GP' => 590,'GQ' => 240,
					'GR' => 30,'GS' => '','GT' => 502,'GU' => 1671,'GW' => 245,'GY' => 592,'HK' => 852,'HM' => '','HN' => 504,'HR' => 385,
					'HT' => 509,'HU' => 36,'ID' => 62,'IE' => 353,'IL' => 972,'IM' => 44,'IN' => 91,'IO' => 1284,'IQ' => 964,'IR' => 98,
					'IS' => 354,'IT' => 39,'JE' => 44,'JM' => 1876,'JO' => 962,'JP' => 81,'KE' => 254,'KG' => 996,'KH' => 855,'KI' => 686,
					'KM' => 269,'KN' => 1869,'KP' => 850,'KR' => 82,'KW' => 965,'KY' => 1345,'KZ' => 7,'LA' => 856,'LB' => 961,'LC' => 1758,
					'LI' => 423,'LK' => 94,'LR' => 231,'LS' => 266,'LT' => 370,'LU' => 352,'LV' => 371,'LY' => 218,'MA' => 212,'MC' => 377,
					'MD' => 373,'ME' => 382,'MF' => 1599,'MG' => 261,'MH' => 692,'MK' => 389,'ML' => 223,'MM' => 95,'MN' => 976,'MO' => 853,
					'MP' => 1670,'MQ' => 596,'MR' => 222,'MS' => 1664,'MT' => 356,'MU' => 230,'MV' => 960,'MW' => 265,'MX' => 52,'MY' => 60,
					'MZ' => 258,'NA' => 264,'NC' => 687,'NE' => 227,'NF' => 672,'NG' => 234,'NI' => 505,'NL' => 31,'NO' => 47,'NP' => 977,
					'NR' => 674,'NU' => 683,'NZ' => 64,'OM' => 968,'PA' => 507,'PE' => 51,'PF' => 689,'PG' => 675,'PH' => 63,'PK' => 92,
					'PL' => 48,'PM' => 508,'PN' => 870,'PR' => 1,'PS' => '','PT' => 351,'PW' => 680,'PY' => 595,'QA' => 974,'RE' => 262,
					'RO' => 40,'RS' => 381,'RU' => 7,'RW' => 250,'SA' => 966,'SB' => 677,'SC' => 248,'SD' => 249,'SE' => 46,'SG' => 65,
					'SI' => 386,'SJ' => '','SK' => 421,'SL' => 232,'SM' => 378,'SN' => 221,'SO' => 252,'SR' => 597,'ST' => 239,'SV' => 503,
					'SY' => 963,'SZ' => 268,'TC' => 1649,'TD' => 235,'TF' => '','TG' => 228,'TH' => 66,'TJ' => 992,'TK' => 690,'TL' => 670,
					'TM' => 993,'TN' => 216,'TO' => 676,'TR' => 90,'TT' => 1868,'TV' => 688,'TW' => 886,'TZ' => 255,'UA' => 380,'UG' => 256,
					'US' => 1,'UY' => 598,'UZ' => 998,'VA' => 379,'VC' => 1784,'VE' => 58,'VG' => 1284,'VI' => 1340,'VN' => 84,'VU' => 678,
					'WF' => 681,'WS' => 685,'YE' => 967,'YT' => 262,'ZA' => 27,'ZM' => 260,'ZW' => 263
			);
			$this->model_setting_setting->editSetting('jossms', array_merge($this->request->post,$prefix));
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect($this->url->link('module/jossms', 'token=' . $this->session->data['token'], 'SSL'));
		}
		/* print_r($this); */		
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['intruction_title'] = $this->language->get('intruction_title');
		
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
		$this->data['text_instruction'] = $this->language->get('text_instruction');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_limit'] = $this->language->get('text_limit');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_status_none'] = $this->language->get('text_status_none');
		$this->data['text_enable_verify'] = $this->language->get('text_enable_verify');
		$this->data['text_verify_checkout'] = $this->language->get('text_verify_checkout');
		$this->data['text_verify_register'] = $this->language->get('text_verify_register');
		$this->data['text_verify_forgotten'] = $this->language->get('text_verify_forgotten');
		
		$this->data['entry_gateway'] = $this->language->get('entry_gateway');
		$this->data['entry_userkey'] = $this->language->get('entry_userkey');
		$this->data['entry_passkey'] = $this->language->get('entry_passkey');
		$this->data['entry_httpapi'] = $this->language->get('entry_httpapi');
		$this->data['httpapi_example'] = $this->language->get('httpapi_example');
		
		$this->data['entry_userkey_amd'] = $this->language->get('entry_userkey_amd');
		$this->data['entry_passkey_amd'] = $this->language->get('entry_passkey_amd');
		$this->data['entry_httpapi_amd'] = $this->language->get('entry_httpapi_amd');
		$this->data['entry_senderid_amd'] = $this->language->get('entry_senderid_amd');
		$this->data['httpapi_example_amd'] = $this->language->get('httpapi_example_amd');
		
		$this->data['entry_userkey_smsglobal'] = $this->language->get('entry_userkey_smsglobal');
		$this->data['entry_passkey_smsglobal'] = $this->language->get('entry_passkey_smsglobal');
		$this->data['entry_httpapi_smsglobal'] = $this->language->get('entry_httpapi_smsglobal');
		$this->data['entry_senderid_smsglobal'] = $this->language->get('entry_senderid_smsglobal');
		$this->data['httpapi_example_smsglobal'] = $this->language->get('httpapi_example_smsglobal');
		
		$this->data['entry_userkey_clickatell'] = $this->language->get('entry_userkey_clickatell');
		$this->data['entry_passkey_clickatell'] = $this->language->get('entry_passkey_clickatell');
		$this->data['entry_httpapi_clickatell'] = $this->language->get('entry_httpapi_clickatell');
		$this->data['entry_apiid_clickatell'] = $this->language->get('entry_apiid_clickatell');
		$this->data['entry_senderid_clickatell'] = $this->language->get('entry_senderid_clickatell');
		$this->data['httpapi_example_clickatell'] = $this->language->get('httpapi_example_clickatell');
		$this->data['entry_unicode_clickatell'] = $this->language->get('entry_unicode_clickatell');
		
		$this->data['entry_userkey_liveall'] = $this->language->get('entry_userkey_liveall');
		$this->data['entry_passkey_liveall'] = $this->language->get('entry_passkey_liveall');
		$this->data['entry_httpapi_liveall'] = $this->language->get('entry_httpapi_liveall');
		$this->data['entry_senderid_liveall'] = $this->language->get('entry_senderid_liveall');
		$this->data['httpapi_example_liveall'] = $this->language->get('httpapi_example_liveall');
		
		$this->data['entry_userkey_malath'] = $this->language->get('entry_userkey_malath');
		$this->data['entry_passkey_malath'] = $this->language->get('entry_passkey_malath');
		$this->data['entry_httpapi_malath'] = $this->language->get('entry_httpapi_malath');
		$this->data['entry_senderid_malath'] = $this->language->get('entry_senderid_malath');
		$this->data['httpapi_example_malath'] = $this->language->get('httpapi_example_malath');
		$this->data['entry_unicode_malath'] = $this->language->get('entry_unicode_malath');
		
		$this->data['entry_userkey_mobily'] = $this->language->get('entry_userkey_mobily');
		$this->data['entry_passkey_mobily'] = $this->language->get('entry_passkey_mobily');
		$this->data['entry_httpapi_mobily'] = $this->language->get('entry_httpapi_mobily');
		$this->data['entry_senderid_mobily'] = $this->language->get('entry_senderid_mobily');
		$this->data['httpapi_example_mobily'] = $this->language->get('httpapi_example_mobily');
		
		$this->data['entry_userkey_mvaayoo'] = $this->language->get('entry_userkey_mvaayoo');
		$this->data['entry_passkey_mvaayoo'] = $this->language->get('entry_passkey_mvaayoo');
		$this->data['entry_httpapi_mvaayoo'] = $this->language->get('entry_httpapi_mvaayoo');
		$this->data['entry_senderid_mvaayoo'] = $this->language->get('entry_senderid_mvaayoo');
		$this->data['httpapi_example_mvaayoo'] = $this->language->get('httpapi_example_mvaayoo');
		$this->data['entry_term_mvaayoo'] = $this->language->get('entry_term_mvaayoo');
		$this->data['text_term_mvaayoo'] = $this->language->get('text_term_mvaayoo');
		
		$this->data['entry_userkey_msegat'] = $this->language->get('entry_userkey_msegat');
		$this->data['entry_passkey_msegat'] = $this->language->get('entry_passkey_msegat');
		$this->data['entry_httpapi_msegat'] = $this->language->get('entry_httpapi_msegat');
		$this->data['entry_senderid_msegat'] = $this->language->get('entry_senderid_msegat');
		$this->data['httpapi_example_msegat'] = $this->language->get('httpapi_example_msegat');
		
		$this->data['entry_userkey_msg91'] = $this->language->get('entry_userkey_msg91');
		$this->data['entry_route_msg91'] = $this->language->get('entry_route_msg91');
		$this->data['entry_httpapi_msg91'] = $this->language->get('entry_httpapi_msg91');
		$this->data['entry_senderid_msg91'] = $this->language->get('entry_senderid_msg91');
		$this->data['httpapi_example_msg91'] = $this->language->get('httpapi_example_msg91');
		
		$this->data['entry_userkey_mysms'] = $this->language->get('entry_userkey_mysms');
		$this->data['entry_passkey_mysms'] = $this->language->get('entry_passkey_mysms');
		$this->data['entry_httpapi_mysms'] = $this->language->get('entry_httpapi_mysms');
		$this->data['entry_senderid_mysms'] = $this->language->get('entry_senderid_mysms');
		$this->data['httpapi_example_mysms'] = $this->language->get('httpapi_example_mysms');
		
		$this->data['entry_userkey_nexmo'] = $this->language->get('entry_userkey_nexmo');
		$this->data['entry_passkey_nexmo'] = $this->language->get('entry_passkey_nexmo');
		$this->data['entry_httpapi_nexmo'] = $this->language->get('entry_httpapi_nexmo');
		$this->data['entry_senderid_nexmo'] = $this->language->get('entry_senderid_nexmo');
		$this->data['httpapi_example_nexmo'] = $this->language->get('httpapi_example_nexmo');
		$this->data['entry_unicode_nexmo'] = $this->language->get('entry_unicode_nexmo');
		
		$this->data['entry_userkey_netgsm'] = $this->language->get('entry_userkey_netgsm');
		$this->data['entry_passkey_netgsm'] = $this->language->get('entry_passkey_netgsm');
		$this->data['entry_httpapi_netgsm'] = $this->language->get('entry_httpapi_netgsm');
		$this->data['entry_senderid_netgsm'] = $this->language->get('entry_senderid_netgsm');
		$this->data['httpapi_example_netgsm'] = $this->language->get('httpapi_example_netgsm');
		
		$this->data['entry_userkey_oneway'] = $this->language->get('entry_userkey_oneway');
		$this->data['entry_passkey_oneway'] = $this->language->get('entry_passkey_oneway');
		$this->data['entry_httpapi_oneway'] = $this->language->get('entry_httpapi_oneway');
		$this->data['entry_senderid_oneway'] = $this->language->get('entry_senderid_oneway');
		$this->data['httpapi_example_oneway'] = $this->language->get('httpapi_example_oneway');
		
		$this->data['entry_userkey_openhouse'] = $this->language->get('entry_userkey_openhouse');
		$this->data['entry_passkey_openhouse'] = $this->language->get('entry_passkey_openhouse');
		$this->data['entry_senderid_openhouse'] = $this->language->get('entry_senderid_openhouse');
		
		$this->data['entry_userkey_redsms'] = $this->language->get('entry_userkey_redsms');
		$this->data['entry_passkey_redsms'] = $this->language->get('entry_passkey_redsms');
		$this->data['entry_httpapi_redsms'] = $this->language->get('entry_httpapi_redsms');
		$this->data['entry_senderid_redsms'] = $this->language->get('entry_senderid_redsms');
		$this->data['httpapi_example_redsms'] = $this->language->get('httpapi_example_redsms');
		
		$this->data['entry_userkey_routesms'] = $this->language->get('entry_userkey_routesms');
		$this->data['entry_passkey_routesms'] = $this->language->get('entry_passkey_routesms');
		$this->data['entry_httpapi_routesms'] = $this->language->get('entry_httpapi_routesms');
		$this->data['entry_senderid_routesms'] = $this->language->get('entry_senderid_routesms');
		$this->data['httpapi_example_routesms'] = $this->language->get('httpapi_example_routesms');
		
		$this->data['entry_userkey_smsgatewayhub'] = $this->language->get('entry_userkey_smsgatewayhub');
		$this->data['entry_passkey_smsgatewayhub'] = $this->language->get('entry_passkey_smsgatewayhub');
		$this->data['entry_httpapi_smsgatewayhub'] = $this->language->get('entry_httpapi_smsgatewayhub');
		$this->data['entry_senderid_smsgatewayhub'] = $this->language->get('entry_senderid_smsgatewayhub');
		$this->data['httpapi_example_smsgatewayhub'] = $this->language->get('httpapi_example_smsgatewayhub');
		$this->data['entry_term_smsgatewayhub'] = $this->language->get('entry_term_smsgatewayhub');
		$this->data['text_term_smsgatewayhub'] = $this->language->get('text_term_smsgatewayhub');
		
		$this->data['entry_userkey_smslane'] = $this->language->get('entry_userkey_smslane');
		$this->data['entry_passkey_smslane'] = $this->language->get('entry_passkey_smslane');
		$this->data['entry_httpapi_smslane'] = $this->language->get('entry_httpapi_smslane');
		$this->data['entry_senderid_smslane'] = $this->language->get('entry_senderid_smslane');
		$this->data['httpapi_example_smslane'] = $this->language->get('httpapi_example_smslane');
		$this->data['entry_unicode_smslane'] = $this->language->get('entry_unicode_smslane');
		
		$this->data['entry_userkey_smslaneg'] = $this->language->get('entry_userkey_smslaneg');
		$this->data['entry_passkey_smslaneg'] = $this->language->get('entry_passkey_smslaneg');
		$this->data['entry_httpapi_smslaneg'] = $this->language->get('entry_httpapi_smslaneg');
		$this->data['entry_senderid_smslaneg'] = $this->language->get('entry_senderid_smslaneg');
		$this->data['httpapi_example_smslaneg'] = $this->language->get('httpapi_example_smslaneg');
		$this->data['entry_unicode_smslaneg'] = $this->language->get('entry_unicode_smslaneg');
		
		$this->data['entry_userkey_topsms'] = $this->language->get('entry_userkey_topsms');
		$this->data['entry_passkey_topsms'] = $this->language->get('entry_passkey_topsms');
		$this->data['entry_httpapi_topsms'] = $this->language->get('entry_httpapi_topsms');
		$this->data['entry_senderid_topsms'] = $this->language->get('entry_senderid_topsms');
		$this->data['httpapi_example_topsms'] = $this->language->get('httpapi_example_topsms');
		$this->data['entry_lang_topsms'] = $this->language->get('entry_lang_topsms');
		$this->data['text_en'] = $this->language->get('text_en');
		$this->data['text_ar'] = $this->language->get('text_ar');
		
		$this->data['entry_userkey_velti'] = $this->language->get('entry_userkey_velti');
		$this->data['entry_passkey_velti'] = $this->language->get('entry_passkey_velti');
		$this->data['entry_httpapi_velti'] = $this->language->get('entry_httpapi_velti');
		$this->data['httpapi_example_velti'] = $this->language->get('httpapi_example_velti');
		
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_smslimit'] = $this->language->get('entry_smslimit');
		$this->data['entry_alert_reg'] = $this->language->get('entry_alert_reg');
		$this->data['entry_alert_blank'] = $this->language->get('entry_alert_blank');
		$this->data['entry_alert_order'] = $this->language->get('entry_alert_order');
		$this->data['entry_alert_changestate'] = $this->language->get('entry_alert_changestate');
		$this->data['entry_additional_alert'] = $this->language->get('entry_additional_alert');
		$this->data['entry_alert_sms'] = $this->language->get('entry_alert_sms');
		$this->data['entry_account_sms'] = $this->language->get('entry_account_sms');
		$this->data['entry_status_order_alert'] = $this->language->get('entry_status_order_alert');
		$this->data['entry_verify_code'] = $this->language->get('entry_verify_code');
		$this->data['entry_skip_group'] = $this->language->get('entry_skip_group');
		$this->data['entry_skip_group_help'] = $this->language->get('entry_skip_group_help');
		$this->data['entry_code_digit'] = $this->language->get('entry_code_digit');
		$this->data['entry_max_retry'] = $this->language->get('entry_max_retry');
		$this->data['entry_limit_blank'] = $this->language->get('entry_limit_blank');
		$this->data['entry_parsing'] = $this->language->get('entry_parsing');
		$this->data['entry_skip_payment_method'] = $this->language->get('entry_skip_payment_method');
		$this->data['entry_skip_payment_method_help'] = $this->language->get('entry_skip_payment_method_help');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
		
		$this->load->model('localisation/order_status');
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();	
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
			
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if (isset($this->error['code_digit'])) {
			$this->data['error_code_digit'] = $this->error['code_digit'];
		} else {
			$this->data['error_code_digit'] = '';
		}
		
		if (isset($this->error['message_code_verification'])) {
			$this->data['error_message_code_verification'] = $this->error['message_code_verification'];
		} else {
			$this->data['error_message_code_verification'] = '';
		}		
		
		if (isset($this->error['gateway'])) {
			$this->data['error_gateway'] = $this->error['gateway'];
		} else {
			$this->data['error_gateway'] = '';
		}
		
		// Zenziva
		if (isset($this->error['userkey'])) {
			$this->data['error_userkey'] = $this->error['userkey'];
		} else {
			$this->data['error_userkey'] = '';
		}
		
		if (isset($this->error['passkey'])) {
			$this->data['error_passkey'] = $this->error['passkey'];
		} else {
			$this->data['error_passkey'] = '';
		}
		
		if (isset($this->error['httpapi'])) {
			$this->data['error_httpapi'] = $this->error['httpapi'];
		} else {
			$this->data['error_httpapi'] = '';
		}
		
		// AMD Telecom
		if (isset($this->error['userkey_amd'])) {
			$this->data['error_userkey_amd'] = $this->error['userkey_amd'];
		} else {
			$this->data['error_userkey_amd'] = '';
		}
		
		if (isset($this->error['passkey_amd'])) {
			$this->data['error_passkey_amd'] = $this->error['passkey_amd'];
		} else {
			$this->data['error_passkey_amd'] = '';
		}
		
		if (isset($this->error['httpapi_amd'])) {
			$this->data['error_httpapi_amd'] = $this->error['httpapi_amd'];
		} else {
			$this->data['error_httpapi_amd'] = '';
		}
		
		if (isset($this->error['senderid_amd'])) {
			$this->data['error_senderid_amd'] = $this->error['senderid_amd'];
		} else {
			$this->data['error_senderid_amd'] = '';
		}
		// ---
		
		// Bulk SMS Global
		if (isset($this->error['userkey_smsglobal'])) {
			$this->data['error_userkey_smsglobal'] = $this->error['userkey_smsglobal'];
		} else {
			$this->data['error_userkey_smsglobal'] = '';
		}
		
		if (isset($this->error['passkey_smsglobal'])) {
			$this->data['error_passkey_smsglobal'] = $this->error['passkey_smsglobal'];
		} else {
			$this->data['error_passkey_smsglobal'] = '';
		}
		
		if (isset($this->error['httpapi_smsglobal'])) {
			$this->data['error_httpapi_smsglobal'] = $this->error['httpapi_smsglobal'];
		} else {
			$this->data['error_httpapi_smsglobal'] = '';
		}
		
		if (isset($this->error['senderid_smsglobal'])) {
			$this->data['error_senderid_smsglobal'] = $this->error['senderid_smsglobal'];
		} else {
			$this->data['error_senderid_smsglobal'] = '';
		}
		// ---
		
		// Clickatell
		if (isset($this->error['userkey_clickatell'])) {
			$this->data['error_userkey_clickatell'] = $this->error['userkey_clickatell'];
		} else {
			$this->data['error_userkey_clickatell'] = '';
		}
		
		if (isset($this->error['passkey_clickatell'])) {
			$this->data['error_passkey_clickatell'] = $this->error['passkey_clickatell'];
		} else {
			$this->data['error_passkey_clickatell'] = '';
		}
		
		if (isset($this->error['httpapi_clickatell'])) {
			$this->data['error_httpapi_clickatell'] = $this->error['httpapi_clickatell'];
		} else {
			$this->data['error_httpapi_clickatell'] = '';
		}
		
		if (isset($this->error['apiid_clickatell'])) {
			$this->data['error_apiid_clickatell'] = $this->error['senderid_clickatell'];
		} else {
			$this->data['error_apiid_clickatell'] = '';
		}
		// ---
		
		// LiveAll
		if (isset($this->error['userkey_liveall'])) {
				$this->data['error_userkey_liveall'] = $this->error['userkey_liveall'];
			} else {
				$this->data['error_userkey_liveall'] = '';
			}			
			if (isset($this->error['passkey_liveall'])) {
				$this->data['error_passkey_liveall'] = $this->error['passkey_liveall'];
			} else {
				$this->data['error_passkey_liveall'] = '';
			}			
			if (isset($this->error['httpapi_liveall'])) {
				$this->data['error_httpapi_liveall'] = $this->error['httpapi_liveall'];
			} else {
				$this->data['error_httpapi_liveall'] = '';
			}			
			if (isset($this->error['senderid_liveall'])) {
				$this->data['error_senderid_liveall'] = $this->error['senderid_liveall'];
			} else {
				$this->data['error_senderid_liveall'] = '';
			}
			// ---
		
		// Malath
		if (isset($this->error['userkey_malath'])) {
			$this->data['error_userkey_malath'] = $this->error['userkey_malath'];
		} else {
			$this->data['error_userkey_malath'] = '';
		}
		
		if (isset($this->error['passkey_malath'])) {
			$this->data['error_passkey_malath'] = $this->error['passkey_malath'];
		} else {
			$this->data['error_passkey_malath'] = '';
		}
		
		if (isset($this->error['httpapi_malath'])) {
			$this->data['error_httpapi_malath'] = $this->error['httpapi_malath'];
		} else {
			$this->data['error_httpapi_malath'] = '';
		}
		
		if (isset($this->error['senderid_malath'])) {
			$this->data['error_senderid_malath'] = $this->error['senderid_malath'];
		} else {
			$this->data['error_senderid_malath'] = '';
		}
		// ---
		
		// mobily
		if (isset($this->error['userkey_mobily'])) {
			$this->data['error_userkey_mobily'] = $this->error['userkey_mobily'];
		} else {
			$this->data['error_userkey_mobily'] = '';
		}
		
		if (isset($this->error['passkey_mobily'])) {
			$this->data['error_passkey_mobily'] = $this->error['passkey_mobily'];
		} else {
			$this->data['error_passkey_mobily'] = '';
		}
		
		if (isset($this->error['httpapi_mobily'])) {
			$this->data['error_httpapi_mobily'] = $this->error['httpapi_mobily'];
		} else {
			$this->data['error_httpapi_mobily'] = '';
		}
		
		if (isset($this->error['senderid_mobily'])) {
			$this->data['error_senderid_mobily'] = $this->error['senderid_mobily'];
		} else {
			$this->data['error_senderid_mobily'] = '';
		}
		// ---
		
		// msegat
		if (isset($this->error['userkey_msegat'])) {
			$this->data['error_userkey_msegat'] = $this->error['userkey_msegat'];
		} else {
			$this->data['error_userkey_msegat'] = '';
		}
		
		if (isset($this->error['passkey_msegat'])) {
			$this->data['error_passkey_msegat'] = $this->error['passkey_msegat'];
		} else {
			$this->data['error_passkey_msegat'] = '';
		}
		
		if (isset($this->error['httpapi_msegat'])) {
			$this->data['error_httpapi_msegat'] = $this->error['httpapi_msegat'];
		} else {
			$this->data['error_httpapi_msegat'] = '';
		}
		
		if (isset($this->error['senderid_msegat'])) {
			$this->data['error_senderid_msegat'] = $this->error['senderid_msegat'];
		} else {
			$this->data['error_senderid_msegat'] = '';
		}
		// ---
		
		// msg91
		if (isset($this->error['userkey_msg91'])) {
			$this->data['error_userkey_msg91'] = $this->error['userkey_msg91'];
		} else {
			$this->data['error_userkey_msg91'] = '';
		}
		
		if (isset($this->error['route_msg91'])) {
			$this->data['error_route_msg91'] = $this->error['route_msg91'];
		} else {
			$this->data['error_route_msg91'] = '';
		}
		
		if (isset($this->error['httpapi_msg91'])) {
			$this->data['error_httpapi_msg91'] = $this->error['httpapi_msg91'];
		} else {
			$this->data['error_httpapi_msg91'] = '';
		}
		
		if (isset($this->error['senderid_msg91'])) {
			$this->data['error_senderid_msg91'] = $this->error['senderid_msg91'];
		} else {
			$this->data['error_senderid_msg91'] = '';
		}
		// ---
		
		// mVaayoo
		if (isset($this->error['userkey_mvaayoo'])) {
			$this->data['error_userkey_mvaayoo'] = $this->error['userkey_mvaayoo'];
		} else {
			$this->data['error_userkey_mvaayoo'] = '';
		}
		
		if (isset($this->error['passkey_mvaayoo'])) {
			$this->data['error_passkey_mvaayoo'] = $this->error['passkey_mvaayoo'];
		} else {
			$this->data['error_passkey_mvaayoo'] = '';
		}
		
		if (isset($this->error['httpapi_mvaayoo'])) {
			$this->data['error_httpapi_mvaayoo'] = $this->error['httpapi_mvaayoo'];
		} else {
			$this->data['error_httpapi_mvaayoo'] = '';
		}
		
		if (isset($this->error['senderid_mvaayoo'])) {
			$this->data['error_senderid_mvaayoo'] = $this->error['senderid_mvaayoo'];
		} else {
			$this->data['error_senderid_mvaayoo'] = '';
		}
		// ---
		
		// mysms
		if (isset($this->error['userkey_mysms'])) {
			$this->data['error_userkey_mysms'] = $this->error['userkey_mysms'];
		} else {
			$this->data['error_userkey_mysms'] = '';
		}
		
		if (isset($this->error['passkey_mysms'])) {
			$this->data['error_passkey_mysms'] = $this->error['passkey_mysms'];
		} else {
			$this->data['error_passkey_mysms'] = '';
		}
		
		if (isset($this->error['httpapi_mysms'])) {
			$this->data['error_httpapi_mysms'] = $this->error['httpapi_mysms'];
		} else {
			$this->data['error_httpapi_mysms'] = '';
		}
		
		if (isset($this->error['senderid_mysms'])) {
			$this->data['error_senderid_mysms'] = $this->error['senderid_mysms'];
		} else {
			$this->data['error_senderid_mysms'] = '';
		}
		// ---
		
		// Nexmo
		if (isset($this->error['userkey_nexmo'])) {
			$this->data['error_userkey_nexmo'] = $this->error['userkey_nexmo'];
		} else {
			$this->data['error_userkey_nexmo'] = '';
		}
		
		if (isset($this->error['passkey_nexmo'])) {
			$this->data['error_passkey_nexmo'] = $this->error['passkey_nexmo'];
		} else {
			$this->data['error_passkey_nexmo'] = '';
		}
		
		if (isset($this->error['httpapi_nexmo'])) {
			$this->data['error_httpapi_nexmo'] = $this->error['httpapi_nexmo'];
		} else {
			$this->data['error_httpapi_nexmo'] = '';
		}
		
		if (isset($this->error['senderid_nexmo'])) {
			$this->data['error_senderid_nexmo'] = $this->error['senderid_nexmo'];
		} else {
			$this->data['error_senderid_nexmo'] = '';
		}
		// ---
		
		// Netgsm
		if (isset($this->error['userkey_netgsm'])) {
			$this->data['error_userkey_netgsm'] = $this->error['userkey_netgsm'];
		} else {
			$this->data['error_userkey_netgsm'] = '';
		}
		
		if (isset($this->error['passkey_netgsm'])) {
			$this->data['error_passkey_netgsm'] = $this->error['passkey_netgsm'];
		} else {
			$this->data['error_passkey_netgsm'] = '';
		}
		
		if (isset($this->error['httpapi_netgsm'])) {
			$this->data['error_httpapi_netgsm'] = $this->error['httpapi_netgsm'];
		} else {
			$this->data['error_httpapi_netgsm'] = '';
		}
		
		if (isset($this->error['senderid_netgsm'])) {
			$this->data['error_senderid_netgsm'] = $this->error['senderid_netgsm'];
		} else {
			$this->data['error_senderid_netgsm'] = '';
		}
		// ---
		
		// One Way SMS
		if (isset($this->error['userkey_oneway'])) {
			$this->data['error_userkey_oneway'] = $this->error['userkey_oneway'];
		} else {
			$this->data['error_userkey_oneway'] = '';
		}
		
		if (isset($this->error['passkey_oneway'])) {
			$this->data['error_passkey_oneway'] = $this->error['passkey_oneway'];
		} else {
			$this->data['error_passkey_oneway'] = '';
		}
		
		if (isset($this->error['httpapi_oneway'])) {
			$this->data['error_httpapi_oneway'] = $this->error['httpapi_oneway'];
		} else {
			$this->data['error_httpapi_oneway'] = '';
		}
		
		if (isset($this->error['senderid_oneway'])) {
			$this->data['error_senderid_oneway'] = $this->error['senderid_oneway'];
		} else {
			$this->data['error_senderid_oneway'] = '';
		}
		// ---
		
		// Openhouse
		if (isset($this->error['userkey_openhouse'])) {
			$this->data['error_userkey_openhouse'] = $this->error['userkey_openhouse'];
		} else {
			$this->data['error_userkey_openhouse'] = '';
		}
		
		if (isset($this->error['passkey_openhouse'])) {
			$this->data['error_passkey_openhouse'] = $this->error['passkey_openhouse'];
		} else {
			$this->data['error_passkey_openhouse'] = '';
		}
		
		if (isset($this->error['senderid_openhouse'])) {
			$this->data['error_senderid_openhouse'] = $this->error['senderid_openhouse'];
		} else {
			$this->data['error_senderid_openhouse'] = '';
		}
		// ---
		
		// Redsms
		if (isset($this->error['userkey_redsms'])) {
			$this->data['error_userkey_redsms'] = $this->error['userkey_redsms'];
		} else {
			$this->data['error_userkey_redsms'] = '';
		}
		
		if (isset($this->error['passkey_redsms'])) {
			$this->data['error_passkey_redsms'] = $this->error['passkey_redsms'];
		} else {
			$this->data['error_passkey_redsms'] = '';
		}
		
		if (isset($this->error['httpapi_redsms'])) {
			$this->data['error_httpapi_redsms'] = $this->error['httpapi_redsms'];
		} else {
			$this->data['error_httpapi_redsms'] = '';
		}
		
		if (isset($this->error['senderid_redsms'])) {
			$this->data['error_senderid_redsms'] = $this->error['senderid_redsms'];
		} else {
			$this->data['error_senderid_redsms'] = '';
		}
		// ---
		
		// Routesms
		if (isset($this->error['userkey_routesms'])) {
			$this->data['error_userkey_routesms'] = $this->error['userkey_routesms'];
		} else {
			$this->data['error_userkey_routesms'] = '';
		}
		
		if (isset($this->error['passkey_routesms'])) {
			$this->data['error_passkey_routesms'] = $this->error['passkey_routesms'];
		} else {
			$this->data['error_passkey_routesms'] = '';
		}
		
		if (isset($this->error['httpapi_routesms'])) {
			$this->data['error_httpapi_routesms'] = $this->error['httpapi_routesms'];
		} else {
			$this->data['error_httpapi_routesms'] = '';
		}
		
		if (isset($this->error['senderid_routesms'])) {
			$this->data['error_senderid_routesms'] = $this->error['senderid_routesms'];
		} else {
			$this->data['error_senderid_routesms'] = '';
		}
		// ---
		
		// SMS GATEWAYHUB
		if (isset($this->error['userkey_smsgatewayhub'])) {
			$this->data['error_userkey_smsgatewayhub'] = $this->error['userkey_smsgatewayhub'];
		} else {
			$this->data['error_userkey_smsgatewayhub'] = '';
		}
		
		if (isset($this->error['passkey_smsgatewayhub'])) {
			$this->data['error_passkey_smsgatewayhub'] = $this->error['passkey_smsgatewayhub'];
		} else {
			$this->data['error_passkey_smsgatewayhub'] = '';
		}
		
		if (isset($this->error['httpapi_smsgatewayhub'])) {
			$this->data['error_httpapi_smsgatewayhub'] = $this->error['httpapi_smsgatewayhub'];
		} else {
			$this->data['error_httpapi_smsgatewayhub'] = '';
		}
		
		if (isset($this->error['senderid_smsgatewayhub'])) {
			$this->data['error_senderid_smsgatewayhub'] = $this->error['senderid_smsgatewayhub'];
		} else {
			$this->data['error_senderid_smsgatewayhub'] = '';
		}
		// ---
		
		// SMS Lane
		if (isset($this->error['userkey_smslane'])) {
			$this->data['error_userkey_smslane'] = $this->error['userkey_smslane'];
		} else {
			$this->data['error_userkey_smslane'] = '';
		}
		
		if (isset($this->error['passkey_smslane'])) {
			$this->data['error_passkey_smslane'] = $this->error['passkey_smslane'];
		} else {
			$this->data['error_passkey_smslane'] = '';
		}
		
		if (isset($this->error['httpapi_smslane'])) {
			$this->data['error_httpapi_smslane'] = $this->error['httpapi_smslane'];
		} else {
			$this->data['error_httpapi_smslane'] = '';
		}
		
		if (isset($this->error['senderid_smslane'])) {
			$this->data['error_senderid_smslane'] = $this->error['senderid_smslane'];
		} else {
			$this->data['error_senderid_smslane'] = '';
		}
		// ---
		
		// SMS Lane Global
		if (isset($this->error['userkey_smslaneg'])) {
			$this->data['error_userkey_smslaneg'] = $this->error['userkey_smslaneg'];
		} else {
			$this->data['error_userkey_smslaneg'] = '';
		}
		
		if (isset($this->error['passkey_smslaneg'])) {
			$this->data['error_passkey_smslaneg'] = $this->error['passkey_smslaneg'];
		} else {
			$this->data['error_passkey_smslaneg'] = '';
		}
		
		if (isset($this->error['httpapi_smslaneg'])) {
			$this->data['error_httpapi_smslaneg'] = $this->error['httpapi_smslaneg'];
		} else {
			$this->data['error_httpapi_smslaneg'] = '';
		}
		
		if (isset($this->error['senderid_smslaneg'])) {
			$this->data['error_senderid_smslaneg'] = $this->error['senderid_smslaneg'];
		} else {
			$this->data['error_senderid_smslaneg'] = '';
		}
		// ---
		
		// topsms
		if (isset($this->error['userkey_topsms'])) {
			$this->data['error_userkey_topsms'] = $this->error['userkey_topsms'];
		} else {
			$this->data['error_userkey_topsms'] = '';
		}
		
		if (isset($this->error['passkey_topsms'])) {
			$this->data['error_passkey_topsms'] = $this->error['passkey_topsms'];
		} else {
			$this->data['error_passkey_topsms'] = '';
		}
		
		if (isset($this->error['httpapi_topsms'])) {
			$this->data['error_httpapi_topsms'] = $this->error['httpapi_topsms'];
		} else {
			$this->data['error_httpapi_topsms'] = '';
		}
		
		if (isset($this->error['senderid_topsms'])) {
			$this->data['error_senderid_topsms'] = $this->error['senderid_topsms'];
		} else {
			$this->data['error_senderid_topsms'] = '';
		}
		// ---
		
		// Velti
		if (isset($this->error['userkey_velti'])) {
			$this->data['error_userkey_velti'] = $this->error['userkey_velti'];
		} else {
			$this->data['error_userkey_velti'] = '';
		}
		
		if (isset($this->error['passkey_velti'])) {
			$this->data['error_passkey_velti'] = $this->error['passkey_velti'];
		} else {
			$this->data['error_passkey_velti'] = '';
		}
		
		if (isset($this->error['httpapi_velti'])) {
			$this->data['error_httpapi_velti'] = $this->error['httpapi_velti'];
		} else {
			$this->data['error_httpapi_velti'] = '';
		}
		// ---
		
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/jossms', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/jossms', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		if (isset($this->request->post['gateway'])) {
			$this->data['gateway'] = $this->request->post['gateway'];
		} else {
			$this->data['gateway'] = $this->config->get('gateway');
		}
		
		if (isset($this->request->post['smslimit'])) {
			$this->data['smslimit'] = $this->request->post['smslimit'];
		} else {
			$this->data['smslimit'] = $this->config->get('smslimit');
		}
		
		if (isset($this->request->post['message_order'])) {
			$this->data['message_order'] = $this->request->post['message_order'];
		} else {
			$this->data['message_order'] = $this->config->get('message_order');
		}
		
		if (isset($this->request->post['message_reg'])) {
			$this->data['message_reg'] = $this->request->post['message_reg'];
		} else {
			$this->data['message_reg'] = $this->config->get('message_reg');
		}
		
		if (isset($this->request->post['message_alert'])) {
			$this->data['message_alert'] = $this->request->post['message_alert'];
		} else {
			$this->data['message_alert'] = $this->config->get('message_alert');
		}
		
		foreach ($this->data['order_statuses'] as $order_status) {
			if (isset($this->request->post['message_changestate'.$order_status['order_status_id']])) {
				$this->data['message_changestate_'.$order_status['order_status_id']] = $this->request->post['message_changestate_'.$order_status['order_status_id']];
			} else {
				$this->data['message_changestate_'.$order_status['order_status_id']] = $this->config->get('message_changestate_'.$order_status['order_status_id']);
			}
		}
		
		if (isset($this->request->post['config_alert_sms'])) {
			$this->data['config_alert_sms'] = $this->request->post['config_alert_sms'];
		} else {
			$this->data['config_alert_sms'] = $this->config->get('config_alert_sms');
		}
		
		if (isset($this->request->post['config_account_sms'])) {
			$this->data['config_account_sms'] = $this->request->post['config_account_sms'];
		} else {
			$this->data['config_account_sms'] = $this->config->get('config_account_sms');
		}
		
		if (isset($this->request->post['verify'])) {
			$this->data['verify'] = $this->request->post['verify'];
		} else {
			$this->data['verify'] = $this->config->get('verify');
		}
		
		if (isset($this->request->post['order_verify'])) {
			$this->data['order_verify'] = $this->request->post['order_verify'];
		} else {
			$this->data['order_verify'] = $this->config->get('order_verify');
		}
		
		if (isset($this->request->post['register_verify'])) {
			$this->data['register_verify'] = $this->request->post['register_verify'];
		} else {
			$this->data['register_verify'] = $this->config->get('register_verify');
		}
		
		if (isset($this->request->post['forgotten_verify'])) {
			$this->data['forgotten_verify'] = $this->request->post['forgotten_verify'];
		} else {
			$this->data['forgotten_verify'] = $this->config->get('forgotten_verify');
		}
		
		if (isset($this->request->post['code_digit'])) {
			$this->data['code_digit'] = $this->request->post['code_digit'];
		} else {
			$this->data['code_digit'] = $this->config->get('code_digit');
		}
		
		if (isset($this->request->post['max_retry'])) {
			$this->data['max_retry'] = $this->request->post['max_retry'];
		} else {
			$this->data['max_retry'] = $this->config->get('max_retry');
		}
		
		if (isset($this->request->post['message_code_verification'])) {
			$this->data['message_code_verification'] = $this->request->post['message_code_verification'];
		} else {
			$this->data['message_code_verification'] = $this->config->get('message_code_verification');
		}
		
		$this->fillin('skip_group_id',array(0));
		$this->fillin('skip_payment_method',array('none'));
		
		$this->load->model('sale/customer_group');
		$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups(0);
		$this->load->model('setting/extension');
		$payments = $this->model_setting_extension->getInstalled('payment');
		$payments_files = glob(DIR_APPLICATION . 'controller/payment/*.php');
		
		if ($payments_files) {
			foreach ($payments_files as $file) {
				$payment = basename($file, '.php');
				$this->load->language('payment/' . $payment);
				if (in_array($payment, $payments)) {
					$this->data['payment_methods'][] = array(
						'title' => $this->language->get('heading_title'),
						'code' => $payment
					);
				}
			}
		}
		
		// Zenziva
		if (isset($this->request->post['userkey'])) {
			$this->data['userkey'] = $this->request->post['userkey'];
		} else {
			$this->data['userkey'] = $this->config->get('userkey');
		}
		
		if (isset($this->request->post['passkey'])) {
			$this->data['passkey'] = $this->request->post['passkey'];
		} else {
			$this->data['passkey'] = $this->config->get('passkey');
		}
		
		if (isset($this->request->post['httpapi'])) {
			$this->data['httpapi'] = $this->request->post['httpapi'];
		} else {
			$this->data['httpapi'] = $this->config->get('httpapi');
		}
		
		// AMD Telecom
		if (isset($this->request->post['userkey_amd'])) {
			$this->data['userkey_amd'] = $this->request->post['userkey_amd'];
		} else {
			$this->data['userkey_amd'] = $this->config->get('userkey_amd');
		}
		
		if (isset($this->request->post['passkey_amd'])) {
			$this->data['passkey_amd'] = $this->request->post['passkey_amd'];
		} else {
			$this->data['passkey_amd'] = $this->config->get('passkey_amd');
		}
		
		if (isset($this->request->post['httpapi_amd'])) {
			$this->data['httpapi_amd'] = $this->request->post['httpapi_amd'];
		} else {
			$this->data['httpapi_amd'] = $this->config->get('httpapi_amd');
		}
		
		if (isset($this->request->post['senderid_amd'])) {
			$this->data['senderid_amd'] = $this->request->post['senderid_amd'];
		} else {
			$this->data['senderid_amd'] = $this->config->get('senderid_amd');
		}
		// ---
		
		// Bulk SMS Global
		if (isset($this->request->post['userkey_smsglobal'])) {
			$this->data['userkey_smsglobal'] = $this->request->post['userkey_smsglobal'];
		} else {
			$this->data['userkey_smsglobal'] = $this->config->get('userkey_smsglobal');
		}
		
		if (isset($this->request->post['passkey_smsglobal'])) {
			$this->data['passkey_smsglobal'] = $this->request->post['passkey_smsglobal'];
		} else {
			$this->data['passkey_smsglobal'] = $this->config->get('passkey_smsglobal');
		}
		
		if (isset($this->request->post['httpapi_smsglobal'])) {
			$this->data['httpapi_smsglobal'] = $this->request->post['httpapi_smsglobal'];
		} else {
			$this->data['httpapi_smsglobal'] = $this->config->get('httpapi_smsglobal');
		}
		
		if (isset($this->request->post['senderid_smsglobal'])) {
			$this->data['senderid_smsglobal'] = $this->request->post['senderid_smsglobal'];
		} else {
			$this->data['senderid_smsglobal'] = $this->config->get('senderid_smsglobal');
		}
		// ---
		
		// Cilckatell
		if (isset($this->request->post['userkey_clickatell'])) {
			$this->data['userkey_clickatell'] = $this->request->post['userkey_clickatell'];
		} else {
			$this->data['userkey_clickatell'] = $this->config->get('userkey_clickatell');
		}
		
		if (isset($this->request->post['passkey_clickatell'])) {
			$this->data['passkey_clickatell'] = $this->request->post['passkey_clickatell'];
		} else {
			$this->data['passkey_clickatell'] = $this->config->get('passkey_clickatell');
		}
		
		if (isset($this->request->post['httpapi_clickatell'])) {
			$this->data['httpapi_clickatell'] = $this->request->post['httpapi_clickatell'];
		} else {
			$this->data['httpapi_clickatell'] = $this->config->get('httpapi_clickatell');
		}
		
		if (isset($this->request->post['apiid_clickatell'])) {
			$this->data['apiid_clickatell'] = $this->request->post['apiid_clickatell'];
		} else {
			$this->data['apiid_clickatell'] = $this->config->get('apiid_clickatell');
		}
		
		if (isset($this->request->post['senderid_clickatell'])) {
			$this->data['senderid_clickatell'] = $this->request->post['senderid_clickatell'];
		} else {
			$this->data['senderid_clickatell'] = $this->config->get('senderid_clickatell');
		}
		
		if (isset($this->request->post['config_unicode_clickatell'])) {
			$this->data['config_unicode_clickatell'] = $this->request->post['config_unicode_clickatell'];
		} else {
			$this->data['config_unicode_clickatell'] = $this->config->get('config_unicode_clickatell');
		}
		// ---
		
		// LiveAll
		if (isset($this->request->post['userkey_liveall'])) {     
			$this->data['userkey_liveall'] = $this->request->post['userkey_liveall'];    
		} else {     
			$this->data['userkey_liveall'] = $this->config->get('userkey_liveall');    
		}        
		if (isset($this->request->post['passkey_liveall'])) {     
			$this->data['passkey_liveall'] = $this->request->post['passkey_liveall'];    
		} else {     
			$this->data['passkey_liveall'] = $this->config->get('passkey_liveall');    
		}        
		if (isset($this->request->post['httpapi_liveall'])) {     
			$this->data['httpapi_liveall'] = $this->request->post['httpapi_liveall'];    
		} else {     
			$this->data['httpapi_liveall'] = $this->config->get('httpapi_liveall');    
		}        
		if (isset($this->request->post['senderid_liveall'])) {     
			$this->data['senderid_liveall'] = $this->request->post['senderid_liveall'];    
		} else {     
			$this->data['senderid_liveall'] = $this->config->get('senderid_liveall');    
		}
		// ---
		
		// Malath
		if (isset($this->request->post['userkey_malath'])) {
			$this->data['userkey_malath'] = $this->request->post['userkey_malath'];
		} else {
			$this->data['userkey_malath'] = $this->config->get('userkey_malath');
		}
		
		if (isset($this->request->post['passkey_malath'])) {
			$this->data['passkey_malath'] = $this->request->post['passkey_malath'];
		} else {
			$this->data['passkey_malath'] = $this->config->get('passkey_malath');
		}
		
		if (isset($this->request->post['httpapi_malath'])) {
			$this->data['httpapi_malath'] = $this->request->post['httpapi_malath'];
		} else {
			$this->data['httpapi_malath'] = $this->config->get('httpapi_malath');
		}
		
		if (isset($this->request->post['senderid_malath'])) {
			$this->data['senderid_malath'] = $this->request->post['senderid_malath'];
		} else {
			$this->data['senderid_malath'] = $this->config->get('senderid_malath');
		}
		
		if (isset($this->request->post['config_unicode_malath'])) {
			$this->data['config_unicode_malath'] = $this->request->post['config_unicode_malath'];
		} else {
			$this->data['config_unicode_malath'] = $this->config->get('config_unicode_malath');
		}
		// ---
		
		// mobily
		if (isset($this->request->post['userkey_mobily'])) {
			$this->data['userkey_mobily'] = $this->request->post['userkey_mobily'];
		} else {
			$this->data['userkey_mobily'] = $this->config->get('userkey_mobily');
		}
		
		if (isset($this->request->post['passkey_mobily'])) {
			$this->data['passkey_mobily'] = $this->request->post['passkey_mobily'];
		} else {
			$this->data['passkey_mobily'] = $this->config->get('passkey_mobily');
		}
		
		if (isset($this->request->post['httpapi_mobily'])) {
			$this->data['httpapi_mobily'] = $this->request->post['httpapi_mobily'];
		} else {
			$this->data['httpapi_mobily'] = $this->config->get('httpapi_mobily');
		}
		
		if (isset($this->request->post['senderid_mobily'])) {
			$this->data['senderid_mobily'] = $this->request->post['senderid_mobily'];
		} else {
			$this->data['senderid_mobily'] = $this->config->get('senderid_mobily');
		}
		// ---
		
		// msegat
		if (isset($this->request->post['userkey_msegat'])) {
			$this->data['userkey_msegat'] = $this->request->post['userkey_msegat'];
		} else {
			$this->data['userkey_msegat'] = $this->config->get('userkey_msegat');
		}
		
		if (isset($this->request->post['passkey_msegat'])) {
			$this->data['passkey_msegat'] = $this->request->post['passkey_msegat'];
		} else {
			$this->data['passkey_msegat'] = $this->config->get('passkey_msegat');
		}
		
		if (isset($this->request->post['httpapi_msegat'])) {
			$this->data['httpapi_msegat'] = $this->request->post['httpapi_msegat'];
		} else {
			$this->data['httpapi_msegat'] = $this->config->get('httpapi_msegat');
		}
		
		if (isset($this->request->post['senderid_msegat'])) {
			$this->data['senderid_msegat'] = $this->request->post['senderid_msegat'];
		} else {
			$this->data['senderid_msegat'] = $this->config->get('senderid_msegat');
		}
		// ---
		
		// msg91
		if (isset($this->request->post['userkey_msg91'])) {
			$this->data['userkey_msg91'] = $this->request->post['userkey_msg91'];
		} else {
			$this->data['userkey_msg91'] = $this->config->get('userkey_msg91');
		}
		
		if (isset($this->request->post['route_msg91'])) {
			$this->data['route_msg91'] = $this->request->post['route_msg91'];
		} else {
			$this->data['route_msg91'] = $this->config->get('route_msg91');
		}
		
		if (isset($this->request->post['httpapi_msg91'])) {
			$this->data['httpapi_msg91'] = $this->request->post['httpapi_msg91'];
		} else {
			$this->data['httpapi_msg91'] = $this->config->get('httpapi_msg91');
		}
		
		if (isset($this->request->post['senderid_msg91'])) {
			$this->data['senderid_msg91'] = $this->request->post['senderid_msg91'];
		} else {
			$this->data['senderid_msg91'] = $this->config->get('senderid_msg91');
		}
		// ---
		
		// mVaayoo
		if (isset($this->request->post['userkey_mvaayoo'])) {
			$this->data['userkey_mvaayoo'] = $this->request->post['userkey_mvaayoo'];
		} else {
			$this->data['userkey_mvaayoo'] = $this->config->get('userkey_mvaayoo');
		}
		
		if (isset($this->request->post['passkey_mvaayoo'])) {
			$this->data['passkey_mvaayoo'] = $this->request->post['passkey_mvaayoo'];
		} else {
			$this->data['passkey_mvaayoo'] = $this->config->get('passkey_mvaayoo');
		}
		
		if (isset($this->request->post['httpapi_mvaayoo'])) {
			$this->data['httpapi_mvaayoo'] = $this->request->post['httpapi_mvaayoo'];
		} else {
			$this->data['httpapi_mvaayoo'] = $this->config->get('httpapi_mvaayoo');
		}
		
		if (isset($this->request->post['senderid_mvaayoo'])) {
			$this->data['senderid_mvaayoo'] = $this->request->post['senderid_mvaayoo'];
		} else {
			$this->data['senderid_mvaayoo'] = $this->config->get('senderid_mvaayoo');
		}
		// ---
		
		// mysms
		if (isset($this->request->post['userkey_mysms'])) {
			$this->data['userkey_mysms'] = $this->request->post['userkey_mysms'];
		} else {
			$this->data['userkey_mysms'] = $this->config->get('userkey_mysms');
		}
		
		if (isset($this->request->post['passkey_mysms'])) {
			$this->data['passkey_mysms'] = $this->request->post['passkey_mysms'];
		} else {
			$this->data['passkey_mysms'] = $this->config->get('passkey_mysms');
		}
		
		if (isset($this->request->post['httpapi_mysms'])) {
			$this->data['httpapi_mysms'] = $this->request->post['httpapi_mysms'];
		} else {
			$this->data['httpapi_mysms'] = $this->config->get('httpapi_mysms');
		}
		
		if (isset($this->request->post['senderid_mysms'])) {
			$this->data['senderid_mysms'] = $this->request->post['senderid_mysms'];
		} else {
			$this->data['senderid_mysms'] = $this->config->get('senderid_mysms');
		}
		// ---
		
		// Nexmo
		if (isset($this->request->post['userkey_nexmo'])) {
			$this->data['userkey_nexmo'] = $this->request->post['userkey_nexmo'];
		} else {
			$this->data['userkey_nexmo'] = $this->config->get('userkey_nexmo');
		}
		
		if (isset($this->request->post['passkey_nexmo'])) {
			$this->data['passkey_nexmo'] = $this->request->post['passkey_nexmo'];
		} else {
			$this->data['passkey_nexmo'] = $this->config->get('passkey_nexmo');
		}
		
		if (isset($this->request->post['httpapi_nexmo'])) {
			$this->data['httpapi_nexmo'] = $this->request->post['httpapi_nexmo'];
		} else {
			$this->data['httpapi_nexmo'] = $this->config->get('httpapi_nexmo');
		}
		
		if (isset($this->request->post['senderid_nexmo'])) {
			$this->data['senderid_nexmo'] = $this->request->post['senderid_nexmo'];
		} else {
			$this->data['senderid_nexmo'] = $this->config->get('senderid_nexmo');
		}
		
		if (isset($this->request->post['config_unicode_nexmo'])) {
			$this->data['config_unicode_nexmo'] = $this->request->post['config_unicode_nexmo'];
		} else {
			$this->data['config_unicode_nexmo'] = $this->config->get('config_unicode_nexmo');
		}
		// ---
		
		// netgsm
		if (isset($this->request->post['userkey_netgsm'])) {
			$this->data['userkey_netgsm'] = $this->request->post['userkey_netgsm'];
		} else {
			$this->data['userkey_netgsm'] = $this->config->get('userkey_netgsm');
		}
		
		if (isset($this->request->post['passkey_netgsm'])) {
			$this->data['passkey_netgsm'] = $this->request->post['passkey_netgsm'];
		} else {
			$this->data['passkey_netgsm'] = $this->config->get('passkey_netgsm');
		}
		
		if (isset($this->request->post['httpapi_netgsm'])) {
			$this->data['httpapi_netgsm'] = $this->request->post['httpapi_netgsm'];
		} else {
			$this->data['httpapi_netgsm'] = $this->config->get('httpapi_netgsm');
		}
		
		if (isset($this->request->post['senderid_netgsm'])) {
			$this->data['senderid_netgsm'] = $this->request->post['senderid_netgsm'];
		} else {
			$this->data['senderid_netgsm'] = $this->config->get('senderid_netgsm');
		}
		// ---
		
		// One Way SMS
		if (isset($this->request->post['userkey_oneway'])) {
			$this->data['userkey_oneway'] = $this->request->post['userkey_oneway'];
		} else {
			$this->data['userkey_oneway'] = $this->config->get('userkey_oneway');
		}
		
		if (isset($this->request->post['passkey_oneway'])) {
			$this->data['passkey_oneway'] = $this->request->post['passkey_oneway'];
		} else {
			$this->data['passkey_oneway'] = $this->config->get('passkey_oneway');
		}
		
		if (isset($this->request->post['httpapi_oneway'])) {
			$this->data['httpapi_oneway'] = $this->request->post['httpapi_oneway'];
		} else {
			$this->data['httpapi_oneway'] = $this->config->get('httpapi_oneway');
		}
		
		if (isset($this->request->post['senderid_oneway'])) {
			$this->data['senderid_oneway'] = $this->request->post['senderid_oneway'];
		} else {
			$this->data['senderid_oneway'] = $this->config->get('senderid_oneway');
		}
		// ---
		
		// Openhouse
		if (isset($this->request->post['userkey_openhouse'])) {
			$this->data['userkey_openhouse'] = $this->request->post['userkey_openhouse'];
		} else {
			$this->data['userkey_openhouse'] = $this->config->get('userkey_openhouse');
		}
		
		if (isset($this->request->post['passkey_openhouse'])) {
			$this->data['passkey_openhouse'] = $this->request->post['passkey_openhouse'];
		} else {
			$this->data['passkey_openhouse'] = $this->config->get('passkey_openhouse');
		}
		
		if (isset($this->request->post['senderid_openhouse'])) {
			$this->data['senderid_openhouse'] = $this->request->post['senderid_openhouse'];
		} else {
			$this->data['senderid_openhouse'] = $this->config->get('senderid_openhouse');
		}
		// ---
		
		// Redsms
		if (isset($this->request->post['userkey_redsms'])) {
			$this->data['userkey_redsms'] = $this->request->post['userkey_redsms'];
		} else {
			$this->data['userkey_redsms'] = $this->config->get('userkey_redsms');
		}
		
		if (isset($this->request->post['passkey_redsms'])) {
			$this->data['passkey_redsms'] = $this->request->post['passkey_redsms'];
		} else {
			$this->data['passkey_redsms'] = $this->config->get('passkey_redsms');
		}
		
		if (isset($this->request->post['httpapi_redsms'])) {
			$this->data['httpapi_redsms'] = $this->request->post['httpapi_redsms'];
		} else {
			$this->data['httpapi_redsms'] = $this->config->get('httpapi_redsms');
		}
		
		if (isset($this->request->post['senderid_redsms'])) {
			$this->data['senderid_redsms'] = $this->request->post['senderid_redsms'];
		} else {
			$this->data['senderid_redsms'] = $this->config->get('senderid_redsms');
		}
		// ---
		
		// Routesms
		if (isset($this->request->post['userkey_routesms'])) {
			$this->data['userkey_routesms'] = $this->request->post['userkey_routesms'];
		} else {
			$this->data['userkey_routesms'] = $this->config->get('userkey_routesms');
		}
		
		if (isset($this->request->post['passkey_routesms'])) {
			$this->data['passkey_routesms'] = $this->request->post['passkey_routesms'];
		} else {
			$this->data['passkey_routesms'] = $this->config->get('passkey_routesms');
		}
		
		if (isset($this->request->post['httpapi_routesms'])) {
			$this->data['httpapi_routesms'] = $this->request->post['httpapi_routesms'];
		} else {
			$this->data['httpapi_routesms'] = $this->config->get('httpapi_routesms');
		}
		
		if (isset($this->request->post['senderid_routesms'])) {
			$this->data['senderid_routesms'] = $this->request->post['senderid_routesms'];
		} else {
			$this->data['senderid_routesms'] = $this->config->get('senderid_routesms');
		}
		// ---
		
		// SMS GATEWAYHUB
		if (isset($this->request->post['userkey_smsgatewayhub'])) {
			$this->data['userkey_smsgatewayhub'] = $this->request->post['userkey_smsgatewayhub'];
		} else {
			$this->data['userkey_smsgatewayhub'] = $this->config->get('userkey_smsgatewayhub');
		}
		
		if (isset($this->request->post['passkey_smsgatewayhub'])) {
			$this->data['passkey_smsgatewayhub'] = $this->request->post['passkey_smsgatewayhub'];
		} else {
			$this->data['passkey_smsgatewayhub'] = $this->config->get('passkey_smsgatewayhub');
		}
		
		if (isset($this->request->post['httpapi_smsgatewayhub'])) {
			$this->data['httpapi_smsgatewayhub'] = $this->request->post['httpapi_smsgatewayhub'];
		} else {
			$this->data['httpapi_smsgatewayhub'] = $this->config->get('httpapi_smsgatewayhub');
		}
		
		if (isset($this->request->post['senderid_smsgatewayhub'])) {
			$this->data['senderid_smsgatewayhub'] = $this->request->post['senderid_smsgatewayhub'];
		} else {
			$this->data['senderid_smsgatewayhub'] = $this->config->get('senderid_smsgatewayhub');
		}
		// ---
		
		// SMS Lane
		if (isset($this->request->post['userkey_smslane'])) {
			$this->data['userkey_smslane'] = $this->request->post['userkey_smslane'];
		} else {
			$this->data['userkey_smslane'] = $this->config->get('userkey_smslane');
		}
		
		if (isset($this->request->post['passkey_smslane'])) {
			$this->data['passkey_smslane'] = $this->request->post['passkey_smslane'];
		} else {
			$this->data['passkey_smslane'] = $this->config->get('passkey_smslane');
		}
		
		if (isset($this->request->post['httpapi_smslane'])) {
			$this->data['httpapi_smslane'] = $this->request->post['httpapi_smslane'];
		} else {
			$this->data['httpapi_smslane'] = $this->config->get('httpapi_smslane');
		}
		
		if (isset($this->request->post['senderid_smslane'])) {
			$this->data['senderid_smslane'] = $this->request->post['senderid_smslane'];
		} else {
			$this->data['senderid_smslane'] = $this->config->get('senderid_smslane');
		}
		
		if (isset($this->request->post['config_unicode_smslane'])) {
			$this->data['config_unicode_smslane'] = $this->request->post['config_unicode_smslane'];
		} else {
			$this->data['config_unicode_smslane'] = $this->config->get('config_unicode_smslane');
		}
		// ---
		
		// SMS Lane Global
		if (isset($this->request->post['userkey_smslaneg'])) {
			$this->data['userkey_smslaneg'] = $this->request->post['userkey_smslaneg'];
		} else {
			$this->data['userkey_smslaneg'] = $this->config->get('userkey_smslaneg');
		}
		
		if (isset($this->request->post['passkey_smslaneg'])) {
			$this->data['passkey_smslaneg'] = $this->request->post['passkey_smslaneg'];
		} else {
			$this->data['passkey_smslaneg'] = $this->config->get('passkey_smslaneg');
		}
		
		if (isset($this->request->post['httpapi_smslaneg'])) {
			$this->data['httpapi_smslaneg'] = $this->request->post['httpapi_smslaneg'];
		} else {
			$this->data['httpapi_smslaneg'] = $this->config->get('httpapi_smslaneg');
		}
		
		if (isset($this->request->post['senderid_smslaneg'])) {
			$this->data['senderid_smslaneg'] = $this->request->post['senderid_smslaneg'];
		} else {
			$this->data['senderid_smslaneg'] = $this->config->get('senderid_smslaneg');
		}
		
		if (isset($this->request->post['config_unicode_smslaneg'])) {
			$this->data['config_unicode_smslaneg'] = $this->request->post['config_unicode_smslaneg'];
		} else {
			$this->data['config_unicode_smslaneg'] = $this->config->get('config_unicode_smslaneg');
		}
		// ---
		
		// topsms
		if (isset($this->request->post['userkey_topsms'])) {
			$this->data['userkey_topsms'] = $this->request->post['userkey_topsms'];
		} else {
			$this->data['userkey_topsms'] = $this->config->get('userkey_topsms');
		}
		
		if (isset($this->request->post['passkey_topsms'])) {
			$this->data['passkey_topsms'] = $this->request->post['passkey_topsms'];
		} else {
			$this->data['passkey_topsms'] = $this->config->get('passkey_topsms');
		}
		
		if (isset($this->request->post['httpapi_topsms'])) {
			$this->data['httpapi_topsms'] = $this->request->post['httpapi_topsms'];
		} else {
			$this->data['httpapi_topsms'] = $this->config->get('httpapi_topsms');
		}
		
		if (isset($this->request->post['senderid_topsms'])) {
			$this->data['senderid_topsms'] = $this->request->post['senderid_topsms'];
		} else {
			$this->data['senderid_topsms'] = $this->config->get('senderid_topsms');
		}
		
		if (isset($this->request->post['config_lang_topsms'])) {
			$this->data['config_lang_topsms'] = $this->request->post['config_lang_topsms'];
		} else {
			$this->data['config_lang_topsms'] = $this->config->get('config_lang_topsms');
		}
		// ---
		
		// Velti
		if (isset($this->request->post['userkey_velti'])) {
			$this->data['userkey_velti'] = $this->request->post['userkey_velti'];
		} else {
			$this->data['userkey_velti'] = $this->config->get('userkey_velti');
		}
		
		if (isset($this->request->post['passkey_velti'])) {
			$this->data['passkey_velti'] = $this->request->post['passkey_velti'];
		} else {
			$this->data['passkey_velti'] = $this->config->get('passkey_velti');
		}
		
		if (isset($this->request->post['httpapi_velti'])) {
			$this->data['httpapi_velti'] = $this->request->post['httpapi_velti'];
		} else {
			$this->data['httpapi_velti'] = $this->config->get('httpapi_velti');
		}
		// ---

		$this->data['modules'] = array();
		
		if (isset($this->request->post['jossms_module'])) {
			$this->data['modules'] = $this->request->post['jossms_module'];
		} elseif ($this->config->get('jossms_module')) { 
			$this->data['modules'] = $this->config->get('jossms_module');
		}	
		
		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
						
		$this->template = 'module/jossms.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	private function fillin($var,$default=0) {
		if (isset($this->request->post[$var])) {
			$this->data[$var] = $this->request->post[$var];
		} else {
			$this->data[$var] = $this->config->get($var);
			if ($default)
			if (!$this->data[$var]) $this->data[$var] = $default;
		}	
	
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/jossms')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if ($this->request->post['verify'] == 1) {
			if (!$this->request->post['code_digit']) {
				$this->error['code_digit'] = $this->language->get('error_userkey');
			}
			
			if (!$this->request->post['message_code_verification']) {
				$this->error['message_code_verification'] = $this->language->get('error_userkey');
			}
		}
		
		if (!$this->request->post['gateway']) {
			$this->error['gateway'] = $this->language->get('error_gateway');
		} else {
			
			if($this->request->post['gateway'] == "zenziva"){
				// Zenziva
				if (!$this->request->post['userkey']) {
					$this->error['userkey'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey']) {
					$this->error['passkey'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi']) {
					$this->error['httpapi'] = $this->language->get('error_httpapi');
				}
			}

			if($this->request->post['gateway'] == "amd"){	
				// AMD Telecom
				if (!$this->request->post['userkey_amd']) {
					$this->error['userkey_amd'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_amd']) {
					$this->error['passkey_amd'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_amd']) {
					$this->error['httpapi_amd'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_amd']) {
					$this->error['senderid_amd'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "smsglobal"){	
				// Bulk SMS Global
				if (!$this->request->post['userkey_smsglobal']) {
					$this->error['userkey_smsglobal'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_smsglobal']) {
					$this->error['passkey_smsglobal'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_smsglobal']) {
					$this->error['httpapi_smsglobal'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_smsglobal']) {
					$this->error['senderid_smsglobal'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "clickatell"){	
				// Clickatell
				if (!$this->request->post['userkey_clickatell']) {
					$this->error['userkey_clickatell'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_clickatell']) {
					$this->error['passkey_clickatell'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_clickatell']) {
					$this->error['httpapi_clickatell'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['apiid_clickatell']) {
					$this->error['apiid_clickatell'] = $this->language->get('error_apiid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "liveall"){
				// LiveAll
				if (!$this->request->post['userkey_liveall']) {
					$this->error['userkey_liveall'] = $this->language->get('error_userkey');
				}
				if (!$this->request->post['passkey_liveall']) {
					$this->error['passkey_liveall'] = $this->language->get('error_passkey');
				}
				if (!$this->request->post['httpapi_liveall']) {
					$this->error['httpapi_liveall'] = $this->language->get('error_httpapi');
				}
				if (!$this->request->post['senderid_liveall']) {
					$this->error['senderid_liveall'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "malath"){	
				// Malath
				if (!$this->request->post['userkey_malath']) {
					$this->error['userkey_malath'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_malath']) {
					$this->error['passkey_malath'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_malath']) {
					$this->error['httpapi_malath'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_malath']) {
					$this->error['senderid_malath'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "mobily"){	
				// mobily
				if (!$this->request->post['userkey_mobily']) {
					$this->error['userkey_mobily'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_mobily']) {
					$this->error['passkey_mobily'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_mobily']) {
					$this->error['httpapi_mobily'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_mobily']) {
					$this->error['senderid_mobily'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "msegat"){	
				// msegat
				if (!$this->request->post['userkey_msegat']) {
					$this->error['userkey_msegat'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_msegat']) {
					$this->error['passkey_msegat'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_msegat']) {
					$this->error['httpapi_msegat'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_msegat']) {
					$this->error['senderid_msegat'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "msg91"){	
				// msg91
				if (!$this->request->post['userkey_msg91']) {
					$this->error['userkey_msg91'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['route_msg91']) {
					$this->error['route_msg91'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_msg91']) {
					$this->error['httpapi_msg91'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_msg91']) {
					$this->error['senderid_msg91'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "mvaayoo"){	
				// mVaayoo
				if (!$this->request->post['userkey_mvaayoo']) {
					$this->error['userkey_mvaayoo'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_mvaayoo']) {
					$this->error['passkey_mvaayoo'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_mvaayoo']) {
					$this->error['httpapi_mvaayoo'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_mvaayoo']) {
					$this->error['senderid_mvaayoo'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "mysms"){	
				// mysms
				if (!$this->request->post['userkey_mysms']) {
					$this->error['userkey_mysms'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_mysms']) {
					$this->error['passkey_mysms'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_mysms']) {
					$this->error['httpapi_mysms'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_mysms']) {
					$this->error['senderid_mysms'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "nexmo"){	
				// Nexmo
				if (!$this->request->post['userkey_nexmo']) {
					$this->error['userkey_nexmo'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_nexmo']) {
					$this->error['passkey_nexmo'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_nexmo']) {
					$this->error['httpapi_nexmo'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_nexmo']) {
					$this->error['senderid_nexmo'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "netgsm"){	
				// netgsm
				if (!$this->request->post['userkey_netgsm']) {
					$this->error['userkey_netgsm'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_netgsm']) {
					$this->error['passkey_netgsm'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_netgsm']) {
					$this->error['httpapi_netgsm'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_netgsm']) {
					$this->error['senderid_netgsm'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "oneway"){	
				// One Way SMS
				if (!$this->request->post['userkey_oneway']) {
					$this->error['userkey_oneway'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_oneway']) {
					$this->error['passkey_oneway'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_oneway']) {
					$this->error['httpapi_oneway'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_oneway']) {
					$this->error['senderid_oneway'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "openhouse"){	
				// Openhouse
				if (!$this->request->post['userkey_openhouse']) {
					$this->error['userkey_openhouse'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_openhouse']) {
					$this->error['passkey_openhouse'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['senderid_openhouse']) {
					$this->error['senderid_openhouse'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "redsms"){	
				// Redsms
				if (!$this->request->post['userkey_redsms']) {
					$this->error['userkey_redsms'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_redsms']) {
					$this->error['passkey_redsms'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_redsms']) {
					$this->error['httpapi_redsms'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_redsms']) {
					$this->error['senderid_redsms'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "routesms"){	
				// Routesms
				if (!$this->request->post['userkey_routesms']) {
					$this->error['userkey_routesms'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_routesms']) {
					$this->error['passkey_routesms'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_routesms']) {
					$this->error['httpapi_routesms'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_routesms']) {
					$this->error['senderid_routesms'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "smsgatewayhub"){	
				// SMS GATEWAYHUB
				if (!$this->request->post['userkey_smsgatewayhub']) {
					$this->error['userkey_smsgatewayhub'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_smsgatewayhub']) {
					$this->error['passkey_smsgatewayhub'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_smsgatewayhub']) {
					$this->error['httpapi_smsgatewayhub'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_smsgatewayhub']) {
					$this->error['senderid_smsgatewayhub'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "smslane"){	
				// SMSLane
				if (!$this->request->post['userkey_smslane']) {
					$this->error['userkey_smslane'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_smslane']) {
					$this->error['passkey_smslane'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_smslane']) {
					$this->error['httpapi_smslane'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_smslane']) {
					$this->error['senderid_smslane'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "smslaneg"){	
				// SMSLane Global
				if (!$this->request->post['userkey_smslaneg']) {
					$this->error['userkey_smslaneg'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_smslaneg']) {
					$this->error['passkey_smslaneg'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_smslaneg']) {
					$this->error['httpapi_smslaneg'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_smslaneg']) {
					$this->error['senderid_smslaneg'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "topsms"){	
				// topsms
				if (!$this->request->post['userkey_topsms']) {
					$this->error['userkey_topsms'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_topsms']) {
					$this->error['passkey_topsms'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_topsms']) {
					$this->error['httpapi_topsms'] = $this->language->get('error_httpapi');
				}
				
				if (!$this->request->post['senderid_topsms']) {
					$this->error['senderid_topsms'] = $this->language->get('error_senderid');
				}
				// ---
			}
			
			if($this->request->post['gateway'] == "velti"){	
				// Velti
				if (!$this->request->post['userkey_velti']) {
					$this->error['userkey_velti'] = $this->language->get('error_userkey');
				}
				
				if (!$this->request->post['passkey_velti']) {
					$this->error['passkey_velti'] = $this->language->get('error_passkey');
				}
				
				if (!$this->request->post['httpapi_velti']) {
					$this->error['httpapi_velti'] = $this->language->get('error_httpapi');
				}
				// ---
			}
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>