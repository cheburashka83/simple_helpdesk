<?php
function getsnmpstatus($sw_addr, $sw_community, $sw_port)   //функ. отображ. состояния порта
{
    $timeout = 50000;
    $session = new SNMP(SNMP::VERSION_2c, $sw_addr, $sw_community, $timeout);
    $str_oid_port_status = "iso.3.6.1.2.1.2.2.1.8." . $sw_port;
    $get_oid_port_status = $session->get($str_oid_port_status);
    list ($format, $get_oid_port_status)  = explode (': ', $get_oid_port_status);
    return $get_oid_port_status;
}
function getsnmpspeed($sw_addr, $sw_community, $sw_port)  //функ. отображ. скорости порта
{
    $timeout = 50000;
    $session = new SNMP(SNMP::VERSION_2c, $sw_addr, $sw_community, $timeout);
    $str_oid_port_speed = "iso.3.6.1.2.1.2.2.1.5." . $sw_port;
    $get_oid_port_speed = $session->get($str_oid_port_speed);
    list ($format, $get_oid_port_speed) = explode (': ' , $get_oid_port_speed );
    $get_oid_port_speed = $get_oid_port_speed/1000000;
    $get_oid_port_speed = $get_oid_port_speed . "Мбит/с";
    return $get_oid_port_speed;
}
function getsnmpdescr($sw_addr, $sw_community)      //функ. отображ. инф. о коммутат
{
    $timeout = 50000;
    $session = new SNMP(SNMP::VERSION_2c, $sw_addr, $sw_community, $timeout);
    $str_oid_system_descr = "iso.3.6.1.2.1.1.1.0";
    $get_oid_system_descr = $session->get($str_oid_system_descr);
    list ($oid_format_descr , $oid_value_descr) = explode (': ' , $get_oid_system_descr, 2);
    return $oid_value_descr;
}
function tagsToLinks($text) {                   //добавить ссылку в комментарий
    return preg_replace('/ASW(\S+)/u', '<a href="/switch/swinfo.php?id=ASW$1">$0</a>', $text);
}
function checkPing($host) {                 //функц. проверки ping
    $output = shell_exec("fping -c1 -t200 $host");
    if (strpos($output, ' 0% loss') !== false) {
        return true; // Сервер доступен
    } else {
        return false; // Сервер недоступен
    }
}


?>