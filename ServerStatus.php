<?php

namespace EpEren\Fivem;

class ServerStatus{
  private bool $IsFivemBased=false;
  private string $ServerIdentifier;
  private $StreamContext;

  public static function ServerBased($ip,$port){
    return new ServerBased($ip,$port);
  }

  public static function FivemBased($code){
    return new FivemBased($code);
  }
 
  protected function MakeRequest($Url){
    $GetData=json_decode(@file_get_contents($Url,false,$this->StreamContext),true);
    return $GetData;
  }

  protected function SetStreamContext($Context){
    $this->StreamContext=$Context;
  }

}

class FivemBased extends ServerStatus{
  private string $ServerCode;
  private array $CachedData;

  function __construct($code){

    $context= stream_context_create(array(
      'http'=>array(
        'method'=>"GET",
        'header'=>"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36 OPR/82.0.4227.58\r\n"
      )
    ));

    parent::SetStreamContext($context);

    $this->ServerCode=$code;
  }

  private function GetData(){
    try {
      $Data= parent::MakeRequest("https://servers-frontend.fivem.net/api/servers/single/".$this->ServerCode);
      if($Data["Data"]){
        $this->CachedData=$Data["Data"];
        return $Data["Data"];
      }else{
        return null;
      }

    } catch (\Throwable $th) {
      return null;
    }
  }

  public function IsOnline(){
    $Data= $this->GetData();
    if($Data!=null){
      return true;
    }else{
      return false;
    }
  }

  public function GetCached(){
    return $this->CachedData;
  }

  public function Get(){
    return $this->GetData();
  }
}

class ServerBased extends ServerStatus{
  private string $Url;
  private array $CachedData=array();

  function __construct($ip,$port){
    $this->Url="http://".$ip.":".$port."/";
  }

  private function GetData(){
    try {
      $Data= parent::MakeRequest($this->Url."info.json");
      if($Data){
        $Data["players"]= parent::MakeRequest($this->Url."players.json");
        $this->CachedData= $Data;
        return $Data;
      }else{
        return null;
      }

    } catch (\Throwable $th) {
      return null;
    }
  }

  public function IsOnline(){
    $Data= $this->GetData();
    if($Data!=null){
      return true;
    }else{
      return false;
    }
  }

  public function GetCached(){
    return $this->CachedData;
  }

  public function Get(){
    return $this->GetData();
  }
}