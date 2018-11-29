<?php
$sql = "UPDATE type SET type_count = (SELECT COUNT(*) FROM product WHERE product.type_id = type.type_id AND product.prod_status = 0)";
$result = $conn->query($sql);
?>