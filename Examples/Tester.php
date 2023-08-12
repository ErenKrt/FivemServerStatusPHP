<?php
require('./FivemServerStatus.php');

use EpEren\FivemServerStatus\FivemServerStatus;

$fivemServerStatus= new FivemServerStatus();

print_r($fivemServerStatus->Get("my533d"));