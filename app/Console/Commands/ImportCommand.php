<?php

namespace App\Console\Commands;

use App\ImportCsv;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ImportCommand extends Command
{

    /**
     * Configuration for ImportCommand.
     *
     */
    public function configure()
    {
        $this->setName('Import')
            ->setDescription('Import Shops database from CSV file to MySQL.')
            ->addArgument('filepath', InputArgument::OPTIONAL,
                'Path to CSV file, if not set will be used ./storage/shops.csv file.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filepath = $input->getArgument('filepath');

        $importShops = new ImportCsv($filepath);

        $fileCSV = $importShops->toDB();

        $this->showShops($input, $output);

        $output->writeln("<info>Success: \"{$fileCSV}\" imported to Database!</info>");
    }
}