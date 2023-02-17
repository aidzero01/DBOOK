<?php
$fruit = $_REQUEST['fruit'];
// 넘겨 받은 값이 배열로 저장됨

$fruit2 = implode(',', $fruit);
// 배열로 받은 값을 텍스트로 변환하며 콤마(,)로 구분함

echo "$fruit2";
?>