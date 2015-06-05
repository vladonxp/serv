<?php 
  Header("Content-Type: text/html;charset=UTF-8");
  require_once('oracle/database_connect.php');
  require_once('auth/ad_functions.php');

  $sql = "select TEAC_FIO, TEAC_CAF, DISCIPLINE, SUBGRUP, DATEZAN, DAYWEEK, PAIR, VID, AUD, KORP, START_PAIR, FINISH_PAIR from V_TIMETABLE 
                  where GR_NUM = '1521б'";
  
  $s = OCIParse($c,$sql);
  OCIExecute($s, OCI_DEFAULT);
  ocifetchstatement($s, $data_news_arr);
  
  print_r(str_replace('\/','/',json_encode_cyr($data_news_arr)));
  

?>