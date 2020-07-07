<?php

use Crediok\Scbase\Services\TreeService;

require 'vendor\autoload.php';

$Tree = new TreeService();
$res = $Tree->getTreeResultData("04293066950", '2020-07-06 21:30:09');
$res;
