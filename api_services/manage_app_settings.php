<?php

function manage_app_settings()
{
	global $outputjson, $gh, $db;
	$outputjson['success'] = 0;
	$action = $gh->read("action");
	if($action == "get_data")
	{ 
		$id = $gh->read("id");
		$query_apps = "SELECT DISTINCT a.*,p.name AS playstore_name, adx.name AS adx_name,
			CASE WHEN DATEDIFF(CURDATE(),STR_TO_DATE(a.entry_date, '%Y-%m-%d')) = 0 THEN 'Today' ELSE CONCAT(DATEDIFF(CURDATE(),STR_TO_DATE(a.entry_date, '%Y-%m-%d')),' Days') END AS `days`
			FROM tbl_apps as a 
			LEFT JOIN tbl_play_store as p ON p.id = a.playstore
			LEFT JOIN tbl_adx as adx ON adx.id = a.adx
			WHERE a.id = '$id'";
		$rows = $db->execute($query_apps);

		if ($rows != null && is_array($rows) && count($rows) > 0) {
			$outputjson['success'] = 1;
			$outputjson['status'] = 1;
			$outputjson['message'] = 'success.';
			$outputjson["data"] = $rows[0];
		} else {
			$outputjson["data"] = [];
			$outputjson['message'] = "No Products found!";
		}
	}else if($action == "add_data")
	{
		$id = $gh->read("id");
		$user_id = $gh->read("user_id", 0);
		$playstore = $gh->read("playstore");
		$adx = $gh->read("adx");
		$app_code = $gh->read("app_code");
		$app_name = $gh->read("app_name");
		$package_name = $gh->read("package_name");
		$web_url = $gh->read("web_url");
		$notes = $gh->read("notes");
		$status = $gh->read("status");
		$date = date('Y-m-d H:i:s');
		$formevent = $gh->read("formevent");

		if($formevent =='submit'){
			$file_url='';
			$file_data='';
			$id=$gh->generateuuid();
			if(isset($_POST["file"]))
			{
				$newData = uploadDropzoneFiles($_POST["file"],$id);
				$file_url= $newData['file_url'][0];
				$file_data= $newData['file_data'];
			}
			$data = array(
				"id" => $id,
				"playstore" => $playstore,
				"adx" => $adx,
				"app_code" => $app_code,
				"app_name" => $app_name,
				"package_name" => $package_name,
				"web_url" => $web_url,
				"notes" => $notes,
				"status" => $status,
				"file" => $file_url,
				"file_data" => $file_data,
				"entry_uid" => $user_id,
				"entry_date" => $date,
			);
			$res = $db->insert("tbl_apps", $data);

			$outputjson['result'] = $res;
			$outputjson['success'] = 1;
			$outputjson['message'] = "Data added successfully";
		}else{																						//update
			$existing_data = [];
			$query = "SELECT file FROM tbl_apps WHERE id = '" . $id ."'";
			$rows = $db->execute($query);
			if ($rows != null && is_array($rows) && count($rows) > 0) {
				$existing_data = $rows[0];
			}	
			if ($id != "") {
				$data = array(
					"playstore" => $playstore,
					"adx" => $adx,
					"app_code" => $app_code,
					"app_name" => $app_name,
					"package_name" => $package_name,
					"web_url" => $web_url,
					"notes" => $notes,
					"status" => $status,
					"update_uid" => $user_id,
					"update_date" => $date,
				);
				if(isset($_POST["file"]) && str_contains($_POST["file"], 'tmp/'))
				{
					$newData = uploadDropzoneFiles($_POST["file"],$id);
					$data['file'] = $newData['file_url'][0];
					$data['file_data'] = $newData['file_data'];
					if ($existing_data != null && $existing_data != []) {
						unlink($existing_data['file']);
					}
				}
				$rows = $db->update('tbl_apps', $data, array("id" => $id));

				$outputjson['success'] = 1;
				$outputjson['message'] = 'Data updated successfully.';
				$outputjson["data"] = $rows;
			} 
		} 
	}else if($action == "export_csv")
	{
		$filter = $gh->read("filter");
		$whereData = "";
		if($filter != ""){
			$whereData .= " a.status = $filter ";
		}
		$query_apps = "SELECT DISTINCT a.*,p.name AS playstore_name, adx.name AS adx_name,
			CASE WHEN DATEDIFF(CURDATE(),STR_TO_DATE(a.entry_date, '%Y-%m-%d')) = 0 THEN 'Today' ELSE CONCAT(DATEDIFF(CURDATE(),STR_TO_DATE(a.entry_date, '%Y-%m-%d')),' Days') END AS `days`
			FROM tbl_apps as a 
			LEFT JOIN tbl_play_store as p ON p.id = a.playstore
			LEFT JOIN tbl_adx as adx ON adx.id = a.adx
			WHERE " . $whereData;
		$rows = $db->execute($query_apps);

		if ($rows != null && is_array($rows) && count($rows) > 0) {
			$products= [];
			foreach ($rows as $key => $product){
				$products[$key]['app_name'] = $product['app_name'];
				$products[$key]['app_code'] = $product['app_code'];
				$products[$key]['package_name'] = $product['package_name'];
				$products[$key]['web_url'] = $product['web_url'];
				$products[$key]['playstore_name'] = $product['playstore_name'];
				$products[$key]['adx_name'] = $product['adx_name'];
				$products[$key]['notes'] = $product['notes'];
				$products[$key]['file'] = API_SERVICE_URL.$product['file'];
			}

			$outputjson["data"] = outputCsv($products);
			$outputjson["status"] = 1;
		}
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
