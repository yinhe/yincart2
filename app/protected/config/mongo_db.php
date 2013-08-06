<?php
unset($config);
$config['mongo_enable'] = false;  
$config['default']['mongo_hostbase'] = 'localhost:27017';
$config['default']['mongo_database'] = 'mongotest22';
$config['default']['mongo_username'] = '';
$config['default']['mongo_password'] = '';
$config['default']['mongo_persist']  = TRUE;
$config['default']['mongo_persist_key']	 = 'yii2_persist';
$config['default']['mongo_replica_set']  = FALSE;
$config['default']['mongo_query_safety'] = 'safe';
$config['default']['mongo_suppress_connect_error'] = TRUE;
$config['default']['mongo_host_db_flag']   = FALSE;

return $config;