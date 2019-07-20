# PHP Fivem Server Status / Library 
 - [Bilgilendirme](#bilgilendirme)
 - [Kurulum](#kurulum)

## Bilgilendirme
Version 1 | Min Php Version: 5.6
[C# Version](https://github.com/ErenKrt/Fivem-Server-Status)
## Kurulum

Include 'class.php' your file.

## Kullanım

```php

include 'class.php';

use EpEren\Fivem\ServerStatus\Fivem;

$fivem= new Fivem("91.134.243.4:30120");
$info= $fivem->GetInfo();

$Players = $info["Players"];
$Server = $info["Server"];
$Client = $info["Clients"];
$Vars = $info["Vars"];

// Basic use for Players list

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
  for ($i=0; $i <count($Players) ; $i++) {
  ?>
  <tr>
    <th><?php echo $Players[$i]["name"]; ?></th>
    <th><?php echo $Players[$i]["ping"]; ?></th>
  </tr>
  <?php
  }

  ?>
</table>

```

Geliştirci: &copy; [ErenKrt](https://www.instagram.com/ep.eren/)
