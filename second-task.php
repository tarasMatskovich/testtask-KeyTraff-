<?

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	require_once 'components/Db.php';

	$db = Db::getConnection();

	$sql = "SELECT r.id,r.price,r.count,o.name FROM requests r LEFT JOIN offers o ON r.offer_id = o.id";

	$result = $db->query($sql);

	$result_array = array();

	while($row = $result->fetch()) {
		$result_array[] = $row;
	}

	$grouped_array = array();
	foreach($result_array as $item) {
		if(array_key_exists($item['name'], $grouped_array)) {
			$grouped_array[$item['name']][] = $item;
		} else {
			$grouped_array[$item['name']] = array();
			$grouped_array[$item['name']][] = $item;
		}
	}



	echo json_encode($grouped_array);
}



?>