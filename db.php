 <?php
  session_start();
  
  $db = mysqli_connect("localhost","root","","sign");
  $db->set_charset("utf8");

  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  ?>