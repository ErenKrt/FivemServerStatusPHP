<?php
include 'ServerStatus.php';

use EpEren\Fivem\ServerStatus;

$Server= ServerStatus::ServerBased("server.tycoon.community","30122");


// print_r($Server->Get()); // Get directly 

if($Server->IsOnline()){
  $Data=$Server->GetCached();
  // print_r($Data); // Explore all props
?>

<table style="width:40%">
  <tr>
    <th style="color:red;">Name</th>
    <th style="color:red;">Ping</th>
  </tr>
  <tr>
    <th>-</th>
    <th>-</th>
  </tr>
  <?php
  for ($i=0; $i <count($Data["players"]) ; $i++) {
  ?>
  <tr>
    <th><?php echo $Data["players"][$i]["name"]; ?></th>
    <th><?php echo $Data["players"][$i]["ping"]; ?></th>
  </tr>
  <?php
  }

  ?>
</table>

<?php
}else{
  echo "Offline";
}
?>