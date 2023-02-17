<form action="test_ok.php" method="post">
<input name="fruit[]" type="checkbox" class="fruitValue" value="사과" />사과</span>
<input name="fruit[]" type="checkbox" class="fruitValue" value="배" />배</span>
<input name="fruit[]" type="checkbox" class="fruitValue" value="바나나" />바나나</span>
<button type="submint" onclick="red();">1</button>
</form>
<script type="text/javascript">
    function red(){
check_value = $('.fruit_values').attr('data-value');
// DB내용을 data-value 속성에 임시저장한 태그

fruit_values2 = fruit_values.split(',');
// 콤마로 구분된 텍스트 값을 배열로 변환시킴

    for (j=0 ; j < fruit_values2.length; j++) {
    for (i=0 ; i < $('li .fruitValue').length ; i++) {
    if($('li.fruitValue')[i].value == fruit_values2[j]) {
    $('li.fruitValue')[i].setAttribute('checked', 'checked');
    // 만약 동일한 값을 찾게될 경우 해당 체크박스(checkbox)를 체크되도록 바꿈
         }
        }
    }
}
</script>