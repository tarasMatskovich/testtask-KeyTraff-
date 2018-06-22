<?php
require_once 'components/Db.php';

$db = Db::getConnection();


$result = $db->query("SELECT r.id,price,count,of.name,op.fio FROM requests r LEFT JOIN offers of ON r.offer_id = of.id LEFT JOIN operators op ON r.operator_id = op.id WHERE r.count > 2 AND (op.id = 10 OR op.id = 12)");

$result_array = array();

while($row = $result->fetch()) {
	$result_array[] = $row;
}




require_once 'public/index.html';

?>