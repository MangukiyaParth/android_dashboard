<?php

function manage_app_user()
{
	global $outputjson, $gh, $db;
	$outputjson['success'] = 0;
	$action = $gh->read("action");
	if($action == "get_data")
	{ 
		$package = $gh->read("package");
		$as = $gh->read("as");
		$asname = $gh->read("asname");
		$callingCode = $gh->read("callingCode");
		$city = $gh->read("city");
		$continent = $gh->read("continent");
		$continentCode = $gh->read("continentCode");
		$country = $gh->read("country");
		$countryCode = $gh->read("countryCode");
		$countryCode3 = $gh->read("countryCode3");
		$currency = $gh->read("currency");
		$currentTime = $gh->read("currentTime");
		$district = $gh->read("district");
		$hosting = $gh->read("hosting");
		$isp = $gh->read("isp");
		$lat = $gh->read("lat");
		$lon = $gh->read("lon");
		$mobile = $gh->read("mobile");
		$offset = $gh->read("offset");
		$org = $gh->read("org");
		$proxy = $gh->read("proxy");
		$query = $gh->read("query");
		$region = $gh->read("region");
		$regionName = $gh->read("regionName");
		$reverse = $gh->read("reverse");
		$status = $gh->read("status");
		$timezone = $gh->read("timezone");
		$zip = $gh->read("zip");
		$device_id = $gh->read("device_id");
		$retention = $gh->read("retention");
		$installerinfo = $gh->read("installerinfo");
		$installerurl = $gh->read("installerurl");
		
		if($as != ""){
			$id=$gh->generateuuid();

			$data = array(
				"id" => $id,
				"package" => $package,
				"as" => $as,
				"asname" => $asname,
				"callingCode" => $callingCode,
				"city" => $city,
				"continent" => $continent,
				"continentCode" => $continentCode,
				"country" => $country,
				"countryCode" => $countryCode,
				"countryCode3" => $countryCode3,
				"currency" => $currency,
				"currentTime" => $currentTime,
				"district" => $district,
				"hosting" => $hosting,
				"isp" => $isp,
				"lat" => $lat,
				"lon" => $lon,
				"mobile" => $mobile,
				"offset" => $offset,
				"org" => $org,
				"proxy" => $proxy,
				"query" => $query,
				"region" => $region,
				"regionName" => $regionName,
				"reverse" => $reverse,
				"status" => $status,
				"timezone" => $timezone,
				"zip" => $zip,
				"device_id" => $device_id,
				"retention" => $retention,
				"installerinfo" => $installerinfo,
				"installerurl" => $installerurl,
				"entry_date" => date('Y-m-d H:i:s')
			);
			$db->insert("tbl_app_users", $data);
		}
		$type = (str_contains($installerurl, 'gclid')) ? 2 : 1;
		
		$qry_setting = "SELECT s.* FROM tbl_apps_settings s 
		INNER JOIN tbl_apps a ON a.id = s.app_id 
		 WHERE a.package_name = '$package' AND s.`type` = $type";
		$rows_setting = $db->execute($qry_setting);
		$app_setting = [];
		if ($rows_setting != null && is_array($rows_setting) && count($rows_setting) > 0) {
			$app_setting = $rows_setting[0];
		}

		// $qry_bifurcate = "SELECT s.* FROM tbl_app_ad_settings s 
		// INNER JOIN tbl_apps a ON a.id = s.app_id 
		// WHERE a.package_name = '$package' AND s.`type` = $type AND s.is_bifurcate = 1
		// AND (
		// 	'$as' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$asname' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$callingCode' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$city' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$continent' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$continentCode' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$country' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$countryCode' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$countryCode3' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$currency' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$currentTime' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$district' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$hosting' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$isp' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$lat' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$lon' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$mobile' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$offset' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$org' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$proxy' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$query' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$region' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$regionName' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$reverse' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$status' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$timezone' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$zip' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$device_id' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$retention' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$installerinfo' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"') OR
		// 	'$installerurl' IN CONCAT('\"',REPLACE(`bifurcate_location`, ',', '\",\"'),'\"')
		// 	)";
		$qry_bifurcate = "SELECT s.* FROM tbl_app_ad_settings s 
		INNER JOIN tbl_apps a ON a.id = s.app_id 
		WHERE a.package_name = '$package' AND s.`type` = $type AND s.is_bifurcate = 1
		AND (
			FIND_IN_SET('$as', s.`bifurcate_location`) OR
			FIND_IN_SET('$asname', s.`bifurcate_location`) OR
			FIND_IN_SET('$callingCode', s.`bifurcate_location`) OR
			FIND_IN_SET('$city', s.`bifurcate_location`) OR
			FIND_IN_SET('$continent', s.`bifurcate_location`) OR
			FIND_IN_SET('$continentCode', s.`bifurcate_location`) OR
			FIND_IN_SET('$country', s.`bifurcate_location`) OR
			FIND_IN_SET('$countryCode', s.`bifurcate_location`) OR
			FIND_IN_SET('$countryCode3', s.`bifurcate_location`) OR
			FIND_IN_SET('$currency', s.`bifurcate_location`) OR
			FIND_IN_SET('$currentTime', s.`bifurcate_location`) OR
			FIND_IN_SET('$district', s.`bifurcate_location`) OR
			FIND_IN_SET('$hosting', s.`bifurcate_location`) OR
			FIND_IN_SET('$isp', s.`bifurcate_location`) OR
			FIND_IN_SET('$lat', s.`bifurcate_location`) OR
			FIND_IN_SET('$lon', s.`bifurcate_location`) OR
			FIND_IN_SET('$mobile', s.`bifurcate_location`) OR
			FIND_IN_SET('$offset', s.`bifurcate_location`) OR
			FIND_IN_SET('$org', s.`bifurcate_location`) OR
			FIND_IN_SET('$proxy', s.`bifurcate_location`) OR
			FIND_IN_SET('$query', s.`bifurcate_location`) OR
			FIND_IN_SET('$region', s.`bifurcate_location`) OR
			FIND_IN_SET('$regionName', s.`bifurcate_location`) OR
			FIND_IN_SET('$reverse', s.`bifurcate_location`) OR
			FIND_IN_SET('$status', s.`bifurcate_location`) OR
			FIND_IN_SET('$timezone', s.`bifurcate_location`) OR
			FIND_IN_SET('$zip', s.`bifurcate_location`) OR
			FIND_IN_SET('$device_id', s.`bifurcate_location`) OR
			FIND_IN_SET('$retention', s.`bifurcate_location`) OR
			FIND_IN_SET('$installerinfo', s.`bifurcate_location`) OR
			FIND_IN_SET('$installerurl', s.`bifurcate_location`)
			)";
		$rows_bifurcate = $db->execute($qry_bifurcate);
		$ad_setting = [];
		if ($rows_bifurcate != null && is_array($rows_bifurcate) && count($rows_bifurcate) > 0) {
			$ad_setting = $rows_bifurcate[0]; 
		}
		else {
			$qry_ad = "SELECT s.* FROM tbl_app_ad_settings s 
				INNER JOIN tbl_apps a ON a.id = s.app_id 
				WHERE a.package_name = '$package' AND s.`type` = $type AND s.is_bifurcate = 0";
			$rows_ad = $db->execute($qry_ad);
			if ($rows_bifurcate != null && is_array($rows_bifurcate) && count($rows_bifurcate) > 0) {
				$ad_setting = $rows_ad[0]; 
			}
		}

		$res_data = [];
		$google = null;
		$app_remove = null;
		$other_settings = null;
		$vpn_settings = null;
		$ads_settings = null;
		
		if($app_setting){
			$google = [];
			$app_remove = [];
			$other_settings = [];
			$vpn_settings = [];

			/**************** Google Ads ****************/
			$google['google1'] = null;
			$google['google2'] = null;
			$google['google3'] = null;
			if($app_setting['g1_percentage'] != "" || 
				$app_setting['g1_account_name'] != "" || 
				$app_setting['g1_banner'] != "" || 
				$app_setting['g1_inter'] != "" || 
				$app_setting['g1_native'] != "" || 
				$app_setting['g1_native2'] != "" || 
				$app_setting['g1_appopen'] != "" ||
				$app_setting['g1_appid'] != ""){
				$google['google1'] = array(
					'percentageOne' => $app_setting['g1_percentage'],
					'google_account_name' => $app_setting['g1_account_name'],
					'google_banner' => $app_setting['g1_banner'],
					'google_inter' => $app_setting['g1_inter'],
					'google_native' => $app_setting['g1_native'],
					'google_native2' => $app_setting['g1_native2'],
					'google_appOpen' => $app_setting['g1_appopen'],
					'google_appId' => $app_setting['g1_appid'],
				);
			}
			if($app_setting['g2_percentage'] != "" || 
				$app_setting['g2_account_name'] != "" || 
				$app_setting['g2_banner'] != "" || 
				$app_setting['g2_inter'] != "" || 
				$app_setting['g2_native'] != "" || 
				$app_setting['g2_native2'] != "" || 
				$app_setting['g2_appopen'] != "" ||
				$app_setting['g2_appid'] != ""){
				$google['google2'] = array(
					'percentageTwo' => $app_setting['g2_percentage'],
					'google_account_name' => $app_setting['g2_account_name'],
					'google_banner' => $app_setting['g2_banner'],
					'google_inter' => $app_setting['g2_inter'],
					'google_native' => $app_setting['g2_native'],
					'google_native2' => $app_setting['g2_native2'],
					'google_appOpen' => $app_setting['g2_appopen'],
					'google_appId' => $app_setting['g2_appid'],
				);
			}
			if($app_setting['g3_account_name'] != "" || 
				$app_setting['g3_banner'] != "" || 
				$app_setting['g3_inter'] != "" || 
				$app_setting['g3_native'] != "" || 
				$app_setting['g3_native2'] != "" || 
				$app_setting['g3_appopen'] != "" ||
				$app_setting['g3_appid'] != ""){
				$google['google3'] = array(
					'google_account_name' => $app_setting['g3_account_name'],
					'google_banner' => $app_setting['g3_banner'],
					'google_inter' => $app_setting['g3_inter'],
					'google_native' => $app_setting['g3_native'],
					'google_native2' => $app_setting['g3_native2'],
					'google_appOpen' => $app_setting['g3_appopen'],
					'google_appId' => $app_setting['g3_appid'],
				);
			}
			$res_data['google'] = $google;

			/************ App Remove Flag ************/
			if($app_setting['app_remove_flag'] != "" || 
				$app_setting['app_version'] != "" || 
				$app_setting['app_remove_title'] != "" || 
				$app_setting['app_remove_description'] != "" || 
				$app_setting['app_remove_url'] != "" || 
				$app_setting['app_remove_button_name'] != "" ||
				$app_setting['app_remove_skip_button_name'] != ""){
				$app_remove = array(
					'app_remove_flag' => $app_setting['app_remove_flag'],
					'version' => $app_setting['app_version'],
					'title' => $app_setting['app_remove_title'],
					'description' => $app_setting['app_remove_description'],
					'url' => $app_setting['app_remove_url'],
					'button_name' => $app_setting['app_remove_button_name'],
					'skip_button_name' => $app_setting['app_remove_skip_button_name'],
				);
			}
			
			/************ Other Settings ************/
			if($app_setting['all_ads'] != "" || 
				$app_setting['fullscreen'] != "" || 
				$app_setting['adblock_version'] != "" || 
				$app_setting['continue_screen'] != "" || 
				$app_setting['lets_start_screen'] != "" || 
				$app_setting['age_screen'] != "" || 
				$app_setting['next_screen'] != "" ||
				$app_setting['next_inner_screen'] != "" ||
				$app_setting['contact_screen'] != "" ||
				$app_setting['start_screen'] != "" ||
				$app_setting['real_casting_flow'] != "" ||
				$app_setting['app_stop'] != "" ||
				$app_setting['additional_fields'] != ""){
				$other_settings = array(
					'allAds' => $app_setting['all_ads'],
					'screenNavigationFull' => $app_setting['fullscreen'],
					'versionCodeforAdblock' => $app_setting['adblock_version'],
					'continueScreen' => $app_setting['continue_screen'],
					'letStartScreen' => $app_setting['lets_start_screen'],
					'genderScreen' => $app_setting['age_screen'],
					'nextScreen' => $app_setting['next_screen'],
					'nextInnerScreen' => $app_setting['next_inner_screen'],
					'connectScreen' => $app_setting['contact_screen'],
					'startScreen' => $app_setting['start_screen'],
					'castingFlow' => $app_setting['real_casting_flow'],
					'dialogApp' => $app_setting['app_stop'],
					'additionalFields' => json_decode($app_setting['additional_fields'])
				);
			}
			
			/************ VPN Settings ************/
			if($app_setting['vpn'] != "" || 
				$app_setting['vpn_dialog'] != "" || 
				$app_setting['vpn_dialog_open'] != "" || 
				$app_setting['vpn_country'] != "" || 
				$app_setting['vpn_url'] != "" || 
				$app_setting['vpn_carrier_id'] != ""){
				$vpn_settings = array(
					'vpn' => $app_setting['vpn'],
					'vpn_dialog' => $app_setting['vpn_dialog'],
					'vpn_dialog_open' => $app_setting['vpn_dialog_open'],
					'vpn_country' => json_decode($app_setting['vpn_country'], true),
					'vpn_url' => $app_setting['vpn_url'],
					'vpn_carrier_id' => $app_setting['vpn_carrier_id']
				);
			}
		}
		$res_data['google'] = $google;
		$res_data['app_remove'] = $app_remove;
		$res_data['other_settings'] = $other_settings;
		$res_data['vpn_settings'] = $vpn_settings;

		/******************************* Ad Setting *******************************/
		if($ad_setting){
			$ads_settings = [];
			$ads_settings['app_color'] = null;
			if($ad_setting['app_color'] != "" || 
				$ad_setting['app_background_color'] != ""){

				$ads_settings['app_color'] = array(
					'app_color_for_admin' => $ad_setting['app_color'],
					'background_color' => $ad_setting['app_background_color']
				);
			}

			$ads_settings['native'] = null;
			if($ad_setting['native_loading'] != "" || 
				$ad_setting['bottom_banner'] != "" ||
				$ad_setting['all_screen_native'] != "" ||
				$ad_setting['list_native'] != "" ||
				$ad_setting['list_native_cnt'] != "" ||
				$ad_setting['exit_dialoge_native'] != "" ||
				$ad_setting['native_btn'] != ""){

				$ads_settings['native'] = array(
					'native_loading' => $ad_setting['native_loading'],
					'bottom_banner' => $ad_setting['bottom_banner'],
					'all_screen_native' => $ad_setting['all_screen_native'],
					'list_native' => $ad_setting['list_native'],
					'static_native_count' => $ad_setting['list_native_cnt'],
					'exit_dialog_native' => $ad_setting['exit_dialoge_native'],
					'native_button_text' => $ad_setting['native_btn'],
					'native_color' => null
				);

				if($ad_setting['native_background_color'] != "" || 
					$ad_setting['native_text_color'] != "" ||
					$ad_setting['native_button_background_color'] != "" ||
					$ad_setting['native_button_text_color'] != ""){

					$ads_settings['native']['native_color'] = array(
						'background' => $ad_setting['native_background_color'],
						'text' => $ad_setting['native_text_color'],
						'button_background' => $ad_setting['native_button_background_color'],
						'button_text' => $ad_setting['native_button_text_color']
					);
				}
			}

			$ads_settings['inter'] = null;
			if($ad_setting['inter_interval'] != "" || 
				$ad_setting['back_click_inter'] != "" ||
				$ad_setting['inter_loading'] != "" ||
				$ad_setting['alternate_with_appopen'] != ""){

				$ads_settings['inter'] = array(
					'inter_interval' => $ad_setting['inter_interval'],
					'back_click_inter' => $ad_setting['back_click_inter'],
					'inter_loading' => $ad_setting['inter_loading'],
					'alternate_app' => $ad_setting['alternate_with_appopen']
				);
			}
			
			$ads_settings['app_open'] = null;
			if($ad_setting['splash_ads'] != "" || 
				$ad_setting['app_open'] != "" ||
				$ad_setting['app_open_loading'] != ""){

				$ads_settings['app_open'] = array(
					'splash_ads' => $ad_setting['splash_ads'],
					'app_open' => $ad_setting['app_open'],
					'app_open_loading' => $ad_setting['app_open_loading']
				);
			}
		}
		$res_data['ads_settings'] = $ads_settings;

		$outputjson['success'] = 1;
		$outputjson['status'] = 1;
		$outputjson['message'] = 'success.';
		$outputjson["data"] = $res_data;
	}else {
		$outputjson["data"] = [];
		$outputjson['message'] = "Error!";
	}
		
}
