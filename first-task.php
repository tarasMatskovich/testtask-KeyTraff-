<?
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Если к нам идёт Ajax запрос, то ловим его
    require_once 'components/Db.php';

	$db = Db::getConnection();


	$result = $db->query("SELECT r.id,price,count,of.name,op.fio FROM requests r LEFT JOIN offers of ON r.offer_id = of.id LEFT JOIN operators op ON r.operator_id = op.id WHERE r.count > 2 AND (op.id = 10 OR op.id = 12)");

	$result_array = array();

	while($row = $result->fetch()) {
		$result_array[] = $row;
	}

	echo json_encode($result_array);
}





?>