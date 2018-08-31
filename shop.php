#! /usr/bin/env php

<?php

use App\Console\Commands\ImportCommand;
use App\Console\Commands\ShowCommand;
use Symfony\Component\Console\Application;


 require __DIR__.'/bootstrap/app.php';

$consoleApp = new Application("Shops CSV Importer","1.0");

$consoleApp->add(new ImportCommand);
$consoleApp->add(new ShowCommand);

$consoleApp->run();