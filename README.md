# PHP Fivem Server Status / Library 
 - [Information](#information)
 - [Setup](#setup)
 - [Usage](#usage)

## Information
Version 2 | Min Php Version: 5.6 \
[C# Version](https://github.com/ErenKrt/Fivem-Server-Status)
## Setup

Include 'ServerStatus.php' your file.

## Usage
### Directly Server
```php
include 'ServerStatus.php';

use EpEren\Fivem\ServerStatus;

$Server= ServerStatus::ServerBased("server.tycoon.community","30122");

// print_r($Server->Get()); // Get directly 

if($Server->IsOnline()){
  $Data=$Server->GetCached();
  // print_r($Data); // Explore all props
}
```

### With Fivem API
```php
include 'ServerStatus.php';

use EpEren\Fivem\ServerStatus;

$Server= ServerStatus::FivemBased("75k87b"); 
// Key from https://servers.fivem.net/servers | Select your server in list and your key will be in url after "detail/" block.

// print_r($Server->Get()); // Get directly 

if($Server->IsOnline()){
  $Data=$Server->GetCached();
  // print_r($Data); // Explore all props
} 
```

Developer: &copy; [ErenKrt](https://www.instagram.com/ep.eren/)
