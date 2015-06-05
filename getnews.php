<?php 
  Header("Content-Type: text/html;charset=UTF-8");
  require_once('oracle/database_connect.php');
  require_once('auth/ad_functions.php');
    
  $id_num = 580;
  $sql = "select id,name_news,date_news,text_news,text_news2,text_news3,text_news4,prev_img_news from news where id>".$id_num." order by DATE_NEWS DESC";
  
  $s = OCIParse($c,$sql);
  OCIExecute($s, OCI_DEFAULT);
  ocifetchstatement($s, $data_news_arr);
  
 //print_r(utf8_json_encode($data_news_arr));
  print_r(str_replace('\/','/',normJsonStr(json_encode($data_news_arr))));

?>