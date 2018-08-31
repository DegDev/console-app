<?php

namespace App;

use App\Shop;

class ImportCsv
{
    /**
     * CSV filename with full path
     *
     * @var string
     */
    private $filename;

    public function __construct($filename = null)
    {
        $this->filename = $filename;
    }
    /**
     * Open, read and save to Database CSV file.     
     *
     *  @return string File Name
     */
    public function toDB()
    {

        // If filename not passed as construct param, open ./storage/shops.csv
        // by default.
        if (empty($this->filename)) {

            $this->filename = storage_path('shops.csv');
        }

        $handle = fopen($this->filename, "r");

        // Skip first row with column names
        fgetcsv($handle, 1000, ",");

        // Fetching rows from csv file into data array, then load properties
        // to Shop object, validing them and saving
        while ($data = fgetcsv($handle, 1000, ',')) {

            $shop = new Shop();

            $shop->region_id = $data[0];

            $shop->setTitle($data[1]);

            $shop->city = $data[2];

            $shop->address = $data[3];

            $shop->user_id = $data[4];


            if ($shop->validate()) {

                $shop->save();
            }
        }
        return $this->filename;
    }
}