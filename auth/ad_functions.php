<?php 
  
  function serviceping($host, $port, $timeout) //Пингуем сервер
     {   
	    $op = @fsockopen($host, $port, $errno, $errstr, $timeout);
        if (!$op){
			return 0; 
		} //DC is N/A
          else {
            fclose($op); //explicitly close open socket connection
            return 1; //DC is up & running, we can safely connect with ldap_connect
           }
}
  
  function auth($login, $password, $ad){ // функция авторизации на ldap сервере (логин нужно передавать полный)
	        
			global $data_user;
							
			if(($ldap = ldap_connect($ad['server'], $ad['port'])) && serviceping($ad['server'],$ad['port'],1)){
			ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3); //Включаем LDAP протокол версии 3
				$bind = @ldap_bind($ldap, $login, $password);
				if ($bind){
					$ls = ldap_search($ldap,$ad['search'],"(userPrincipalName=".$login.")", array("cn"));
					$zn = ldap_get_entries($ldap, $ls);
					if(isset($zn[0]['cn'][0])){
						$data_user['FIO'] = $zn[0]['cn'][0];
					}
					return 1;
				}
				else
					return 0;
			}
			else {
	        	$data_user['serverRequest'] = 'LDAP сервер временно недоступен.';
				return 0;
			}					
	  }
	  
  function normJsonStr($str){
    $str = preg_replace_callback('/\\\u([a-f0-9]{4})/i', create_function('$m', 'return chr(hexdec($m[1])-1072+224);'), $str);
    //return($str);
	return iconv('cp1251', 'utf-8', $str);
}	  
	  
		
  function utf8_json_encode($arr){
			return($result = preg_replace_callback(
	'/\\\u([0-9a-fA-F]{4})/', create_function('$_m', 'return mb_convert_encoding("&#" . intval($_m[1], 16) . ";", "UTF-8", "HTML-ENTITIES");'),
	json_encode($arr)));
		}	
   
   

?>