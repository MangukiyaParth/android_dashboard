<?php

function manage_apps()
{
	global $outputjson, $gh, $db;
	$outputjson['success'] = 0;
	$action = $gh->read("action");
	if($action == "get_data"){ 
		$start = $gh->read("start");
		$length = $gh->read("length");
		$searcharr = $gh->read("search");
		$search = $searcharr['value'];
		$orderarr = $gh->read("order");
		$orderindex = $orderarr[0]['column'];
		$orderdir = $orderarr[0]['dir'];
		$columnsarr = $gh->read("columns");
		$status = $gh->read("extra_option");
		$ordercolumn = $columnsarr[$orderindex]['name'];
		
		$whereData = " a.is_deleted=0 AND ";
		$todayCnt = "";
		$yestardayCnt = "";
		$prevYestardayCnt = "";
		$weekdayCnt = "";
		$prevWeekdayCnt = "";
		$monthdayCnt = "";
		$prevMonthdayCnt = "";
		if($status != ""){
			$whereData .= " a.status = $status AND ";
			if($status == 3){
				$qry_cnt = "SELECT
				(SELECT COUNT(u.id) FROM `tbl_app_users` u INNER JOIN tbl_apps a ON a.`package_name` = u.`package` WHERE a.status = 3 AND DATE_FORMAT(u.entry_date, '%Y-%m-%d') = '".date('Y-m-d')."') AS today_cnt,
				(SELECT COUNT(u.id) FROM `tbl_app_users` u INNER JOIN tbl_apps a ON a.`package_name` = u.`package` WHERE a.status = 3 AND DATE_FORMAT(u.entry_date, '%Y-%m-%d') = '".date("Y-m-d", strtotime("-1 day"))."') AS yestarday_cnt,
				(SELECT COUNT(u.id) FROM `tbl_app_users` u INNER JOIN tbl_apps a ON a.`package_name` = u.`package` WHERE a.status = 3 AND DATE_FORMAT(u.entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('".date("Y-m-d", strtotime("-2 day"))."','%Y-%m-%d') AND STR_TO_DATE('".date('Y-m-d', strtotime("-1 day"))."','%Y-%m-%d') ) AS prev_yestarday_cnt,
				(SELECT COUNT(u.id) FROM `tbl_app_users` u INNER JOIN tbl_apps a ON a.`package_name` = u.`package` WHERE a.status = 3 AND DATE_FORMAT(u.entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('".date("Y-m-d", strtotime("-6 day"))."','%Y-%m-%d') AND STR_TO_DATE('".date('Y-m-d')."','%Y-%m-%d') ) AS weekday_cnt,
				(SELECT COUNT(u.id) FROM `tbl_app_users` u INNER JOIN tbl_apps a ON a.`package_name` = u.`package` WHERE a.status = 3 AND DATE_FORMAT(u.entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('".date("Y-m-d", strtotime("-13 day"))."','%Y-%m-%d') AND STR_TO_DATE('".date('Y-m-d', strtotime("-7 day"))."','%Y-%m-%d') ) AS prev_weekday_cnt,
				(SELECT COUNT(u.id) FROM `tbl_app_users` u INNER JOIN tbl_apps a ON a.`package_name` = u.`package` WHERE a.status = 3 AND DATE_FORMAT(u.entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('".date("Y-m-d", strtotime("-29 day"))."','%Y-%m-%d') AND STR_TO_DATE('".date('Y-m-d')."','%Y-%m-%d') ) AS monthday_cnt,
				(SELECT COUNT(u.id) FROM `tbl_app_users` u INNER JOIN tbl_apps a ON a.`package_name` = u.`package` WHERE a.status = 3 AND DATE_FORMAT(u.entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('".date("Y-m-d", strtotime("-59 day"))."','%Y-%m-%d') AND STR_TO_DATE('".date('Y-m-d', strtotime("-30 day"))."','%Y-%m-%d') ) AS prev_monthday_cnt";
				$rows_cnt = $db->execute($qry_cnt);
				$counts = $rows_cnt[0];
				$todayCnt = $counts['today_cnt'];
				$yestardayCnt = $counts['yestarday_cnt'];
				$prevYestardayCnt = $counts['prev_yestarday_cnt'];
				$weekdayCnt = $counts['weekday_cnt'];
				$prevWeekdayCnt = $counts['prev_weekday_cnt'];
				$monthdayCnt = $counts['monthday_cnt'];
				$prevMonthdayCnt = $counts['prev_monthday_cnt'];
			}
		}
		$whereData .= "(a.playstore LIKE '%" . $search . "%' OR 
					a.adx LIKE '%" . $search . "%' OR 
					a.app_code LIKE '%" . $search . "%' OR 
					a.app_name LIKE '%" . $search . "%' OR 
					a.package_name LIKE '%" . $search . "%' OR 
					a.web_url LIKE '%" . $search . "%' OR 
					a.notes LIKE '%" . $search . "%')";

		$total_count = $db->get_row_count('tbl_apps', "is_deleted=0");
		$filtered_count = 0;
		$count_query = "SELECT count(DISTINCT a.id) as cnt 
			FROM tbl_apps as a 
			LEFT JOIN tbl_play_store as p ON p.id = a.playstore
			LEFT JOIN tbl_adx as adx ON adx.id = a.adx
			WHERE " . $whereData;
		$filtered_count = $db->execute_scalar($count_query);

		$orderby = "ORDER BY a.entry_date DESC";
		if ($orderindex >0) {
			$orderby = " ORDER BY ".$ordercolumn . " " . $orderdir;
		}
		$query_port_rates = "SELECT DISTINCT a.*,p.name AS playstore_name, adx.name AS adx_name,
			CASE WHEN DATEDIFF(CURDATE(),STR_TO_DATE(a.entry_date, '%Y-%m-%d')) = 0 THEN 'Today' ELSE CONCAT(DATEDIFF(CURDATE(),STR_TO_DATE(a.entry_date, '%Y-%m-%d')),' Days') END AS `days`,
			IFNULL((SELECT count(DISTINCT u.id) FROM tbl_app_users as u WHERE u.package = a.package_name),0) AS total_cnt, 
			IFNULL((SELECT count(DISTINCT u.id) FROM tbl_app_users as u WHERE u.package = a.package_name AND DATE_FORMAT(u.entry_date, '%Y-%m-%d') = '".date('Y-m-d')."' ),0) AS today_cnt, 
			IFNULL((SELECT count(DISTINCT u.id) FROM tbl_app_users as u WHERE u.package = a.package_name AND DATE_FORMAT(u.entry_date, '%Y-%m-%d') = '".date("Y-m-d", strtotime("-1 day"))."' ),0) AS yestarday_cnt
			FROM tbl_apps as a 
			LEFT JOIN tbl_play_store as p ON p.id = a.playstore
			LEFT JOIN tbl_adx as adx ON adx.id = a.adx
			WHERE " . $whereData . " " . $orderby . " LIMIT " . $start . "," . $length . "";
		$rows = $db->execute($query_port_rates);

		if ($rows != null && is_array($rows) && count($rows) > 0) {
			
			$outputjson['recordsTotal'] = $total_count;
			$outputjson['recordsFiltered'] = $filtered_count;
			$outputjson['todayCnt'] = $todayCnt;
			$outputjson['yestardayCnt'] = $yestardayCnt;
			$outputjson['prevYestardayCnt'] = $prevYestardayCnt;
			$outputjson['weekdayCnt'] = $weekdayCnt;
			$outputjson['prevWeekdayCnt'] = $prevWeekdayCnt;
			$outputjson['monthdayCnt'] = $monthdayCnt;
			$outputjson['prevMonthdayCnt'] = $prevMonthdayCnt;
			$outputjson['success'] = 1;
			$outputjson['status'] = 1;
			$outputjson['message'] = 'success.';
			$outputjson["data"] = $rows;
		} else {
			$outputjson["data"] = [];
			$outputjson['recordsTotal'] = $total_count;
			$outputjson['todayCnt'] = $todayCnt;
			$outputjson['yestardayCnt'] = $yestardayCnt;
			$outputjson['prevYestardayCnt'] = $prevYestardayCnt;
			$outputjson['weekdayCnt'] = $weekdayCnt;
			$outputjson['prevWeekdayCnt'] = $prevWeekdayCnt;
			$outputjson['monthdayCnt'] = $monthdayCnt;
			$outputjson['prevMonthdayCnt'] = $prevMonthdayCnt;
			$outputjson['recordsFiltered'] = 0;
			$outputjson['message'] = "No Products found!";
		}
	}else if($action == "add_data"){
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
				if(isset($_POST["file"]))
				{
					if(str_contains($_POST["file"], 'tmp/')){
						$newData = uploadDropzoneFiles($_POST["file"],$id);
						$data['file'] = $newData['file_url'][0];
						$data['file_data'] = $newData['file_data'];
						if ($existing_data != null && $existing_data != []) {
							unlink($existing_data['file']);
						}
					}
				}
				else {
					// $data['file'] = "";
					$data['file_data'] = "";
					if ($existing_data != null && $existing_data != []) {
						// unlink($existing_data['file']);
					}
				}
				$rows = $db->update('tbl_apps', $data, array("id" => $id));

				$outputjson['success'] = 1;
				$outputjson['message'] = 'Data updated successfully.';
				$outputjson["data"] = $rows;
			} 
		} 
	}else if($action == "update_status"){
		$id = $gh->read("id");
		$status = $gh->read("status");

		$data = array(
			"status" => $status
		);
		$rows = $db->update('tbl_apps', $data, array("id" => $id));

		$outputjson['success'] = 1;
		$outputjson['message'] = 'Data updated successfully.';
		$outputjson["data"] = $rows;

	}else if($action == "get_user_counts"){
		$package_name = $gh->read("package_name");
		$time_type = $gh->read("time_type");

		$extra_qry = "";
		if($time_type == 2){
			// Yestarday
			$extra_qry = " AND DATE_FORMAT(entry_date, '%Y-%m-%d') = '".date("Y-m-d", strtotime("-1 day"))."' ";
		}
		else if($time_type == 1){
			$extra_qry = " AND DATE_FORMAT(entry_date, '%Y-%m-%d') = '".date('Y-m-d')."' ";
		}

		$qry = "SELECT
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '00:00:00' AND '00:59:59') AS monehr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '01:00:00' AND '01:59:59') AS mtwohr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '02:00:00' AND '02:59:59') AS mthreehr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '03:00:00' AND '03:59:59') AS mfourhr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '04:00:00' AND '04:59:59') AS mfivehr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '05:00:00' AND '05:59:59') AS msixhr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '06:00:00' AND '06:59:59') AS msevenhr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '07:00:00' AND '07:59:59') AS meighthr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '08:00:00' AND '08:59:59') AS mninehr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '09:00:00' AND '09:59:59') AS mtenhr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '10:00:00' AND '10:59:59') AS melevenhr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '11:00:00' AND '11:59:59') AS mtwelvehr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '12:00:00' AND '12:59:59') AS aonehr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '13:00:00' AND '13:59:59') AS atwohr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '14:00:00' AND '14:59:59') AS athreehr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '15:00:00' AND '15:59:59') AS afourhr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '16:00:00' AND '16:59:59') AS afivehr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '17:00:00' AND '17:59:59') AS asixhr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '18:00:00' AND '18:59:59') AS asevenhr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '19:00:00' AND '19:59:59') AS aeighthr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '20:00:00' AND '20:59:59') AS aninehr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '21:00:00' AND '21:59:59') AS atenhr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '22:00:00' AND '22:59:59') AS aelevenhr,
				(SELECT COUNT(id) FROM `tbl_app_users` WHERE package = '$package_name' $extra_qry AND DATE_FORMAT(entry_date, '%H:%i:%s') BETWEEN '23:00:00' AND '23:59:59') AS atwelvehr";
		$rows = $db->execute($qry);

		$outputjson['qry'] = $qry;
		$outputjson['success'] = 1;
		$outputjson['message'] = 'Data updated successfully.';
		$outputjson["data"] = $rows[0];

	}else if($action == "export_csv"){
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
