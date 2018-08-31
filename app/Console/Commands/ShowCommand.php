<?php

namespace App\Console\Commands;

use App\ImportCsv;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ShowCommand extends Command
{

    /**
     * Configuration for ShowCommand.
     *
     */
    public function configure()
    {
        $this->setName('Show')
            ->setDescription('Show list of shops from database')
            ->addArgument('number', InputArgument::OPTIONAL,
                'How much of lastest records to show.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $number = $input->getArgument('number');

        if (!empty($number)) {

            $this->showLatestShops($input, $output, $number);

            return true;
        }

        $this->showShops($input, $output);
    }
}