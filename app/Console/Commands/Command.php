<?php

namespace App\Console\Commands;

use App\Shop;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Command extends SymfonyCommand
{

    /**
     * Create a new Command instance.
     *     
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show a table of all shops.
     *
     * @param OutputInterface $output
     * @param InputInterface  $input
     * @return mixed
     */
    protected function showShops(InputInterface $input, OutputInterface $output)
    {
        $shops = Shop::all();

        if (!$shops) {
            return $output->writeln('<info>No shops at the moment!</info>');
        }

        $this->writeShops($input, $output, $shops);
    }

    /**
     * Show n latest shops records
     *
     * @param OutputInterface $output
     * @param InputInterface  $input
     * @param integer $number 
     * @return mixed
     */
    protected function showLatestShops(InputInterface $input,
                                       OutputInterface $output, $number)
    {

        $shops = Shop::orderBy('id', 'desc')->take($number)->get();

        if ($number > 20) {
            return $output->writeln('<error>Number of records must be from 1 to 20. Incorrect number given.</error>');
        }

        if (!$shops) {
            return $output->writeln('<info>No shops at the moment!</info>');
        }

        $this->writeShops($input, $output, $shops);
    }

    /**
     * Put formated list of shops into console
     *
     * @param OutputInterface $output
     * @param InputInterface  $input
     * @param Shop $shops
     * @return mixed
     */
    private function writeShops(InputInterface $input, OutputInterface $output,
                                $shops)
    {

        foreach ($shops as $shop) {

            $io = new SymfonyStyle($input, $output);

            $io->section($shop->getTitle());

            $io->listing([
                '<info>id: </info>'       .$shop->getId(),
                '<info>region_id: </info>'.$shop->getRegionId(),
                '<info>user_id: </info>'  .$shop->getUserId(),
                '<info>address: </info>'  .$shop->getAddress(),
                '<info>city: </info>'     .$shop->getCity()
            ]);
        }
    }
}