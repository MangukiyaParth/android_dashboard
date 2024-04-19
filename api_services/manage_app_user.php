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

		$data = array(
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
		);
		$res = $db->insert("tbl_app_users", $data);
		$type = (str_contains($installerurl, 'gclid')) ? 2 : 1;
		
		$qry_setting = "SELECT s.* FROM tbl_apps_settings s 
		INNER JOIN tbl_apps a ON a.id = s.app_id 
		 WHERE a.package_name = '$package' AND `type` = $type";
		$rows_setting = $db->execute($qry_setting);

		$outputjson['success'] = 1;
		$outputjson['status'] = 1;
		$outputjson['message'] = 'success.';
		$outputjson["data"] = $res_data;
	}else {
		$outputjson["data"] = [];
		$outputjson['message'] = "Error!";
	}
		
}

function outputCsv( $assocDataArray ) {
	if ( !empty( $assocDataArray ) ){
		$fp = fopen( 'php://output', 'w' );
		fputcsv( $fp, array_keys( reset($assocDataArray) ) );
		foreach ( $assocDataArray AS $values ){
			fputcsv( $fp, $values );
		}
		fclose( $fp );
	}
	exit();
}
