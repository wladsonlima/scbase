<?php

use Crediok\Scbase\Services\TreeService;

require 'vendor\autoload.php';

$_ENV["SCBASE_URL"] = "";
$_ENV["SCBASE_USERNAME"] = "";
$_ENV["SCBASE_PASSWORD"] = "";

$Tree = new TreeService();
$res = $Tree->getTreeResultData("", '');

