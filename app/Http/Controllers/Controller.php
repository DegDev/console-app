<?php

namespace App\Http\Controllers;

use App\Shop;
use App\ImportCsv;

use App\ShopImporter;
use Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;

class Controller extends BaseController
{

    public function index(){

        return 'Console application currently running only under console.<br>Try <b>./shop.php Show</b>';
    }
   
   
}