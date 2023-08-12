# PHP Fivem Server Status / Library
 - [Information](#information)
 - [Setup](#setup)
 - [Usage](#usage)

## Information
Version 4
[C# Version](https://github.com/ErenKrt/FivemServerStatus)
## Setup

Include 'FivemServerStatus.php' your file.

## Usage
```php
require('./FivemServerStatus.php');

use EpEren\FivemServerStatus\FivemServerStatus;

$fivemServerStatus= new FivemServerStatus();

print_r($fivemServerStatus->Get("my533d"));
print_r($fivemServerStatus->IsOnline("my533d"));
```


Developer: &copy; [ErenKrt](https://www.instagram.com/ep.eren/)
