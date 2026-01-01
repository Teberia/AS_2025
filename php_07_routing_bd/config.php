<?php
//konfiguracja
$conf->server_name = 'localhost';
$conf->server_url = 'http://'.$conf->server_name;
$conf->app_root = '/php_07_routing';
$conf->action_root = $conf->app_root.'/ctrl.php?action=';


$conf->action_url = $conf->server_url.$conf->action_root;
$conf->app_url = $conf->server_url.$conf->app_root;
$conf->root_path = dirname(__FILE__);

$conf->db_host = '127.0.0.1';
$conf->db_port = 3306;
$conf->db_name = 'kredyt';
$conf->db_user = 'root';
$conf->db_pass = '';