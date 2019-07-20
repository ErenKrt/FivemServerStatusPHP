<?php

namespace EpEren\Fivem\ServerStatuS;

class Fivem {
  private $_ipport;

  function __construct($ipport) {
    $this->_ipport=$ipport;
  }

  function GetInfo(){
    $get= json_decode(file_get_contents("https://servers-live.fivem.net/api/servers/single/".$this->_ipport),true);

    $veriler= $get["Data"];

    $clients= array("OnlineClients"=>$veriler["clients"],"MaxClients"=>$veriler["sv_maxclients"]);
    $server= array("Name"=>$veriler["hostname"],"Type"=>$veriler["gametype"],"Map" => $veriler["mapname"], "More"=>array("GameName"=>$veriler["gamename"],"Server"=>$veriler["server"]));
    $players= $veriler["players"];
    $resources= $veriler["resources"];
    $vars= $veriler["vars"];

    return array("Server"=>$server,"Clients"=>$clients,"Players"=>$players,"Vars"=>$vars,"Resources"=>$resources);

  }
}
