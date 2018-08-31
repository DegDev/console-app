<?php

namespace App;

use Validator;
use Encode;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /**
     * disable timespamps 
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     *  Validation rules for every column, also include sanitize
     *
     *  @return array
     */
    private function rules()
    {

        $this->sanitize();

        return [
            'region_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'title' => 'required',
            'city' => 'required',
            'address' => 'required',
        ];
    }

    /**
     *  Validate all attribues with rules
     *
     *  @return bool True if passes 
     */
    public function validate()
    {
        $validator = Validator::make(
                $this->attributes, $this->rules()
        );

        return $validator->passes();
    }

    /**
     * Removing all unacceptable symbols, tags etc. and make string safe to store
     *
     *  @return void
     */
    private function sanitize()
    {

        $this->title = filter_var(trim($this->title), FILTER_SANITIZE_STRING);

        $this->address = filter_var(trim($this->address), FILTER_SANITIZE_STRING);

        $this->city = filter_var(trim($this->city), FILTER_SANITIZE_STRING);
    }

    /**
     *  Set id
     *
     *  @return void
     */
    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     *  Set user_id
     *
     *  @return void
     */
    public function setUserId($value)
    {
        $this->user_id = $value;
    }

    /**
     *  Set region_id
     *
     *  @return void
     */
    public function setRegionId($value)
    {
        $this->region_id = $value;
    }

    /**
     *  Set title 
     *
     *  @return void
     */
    public function setTitle($value)
    {
        $this->title = $value;
    }

    /**
     *  Set address
     *
     *  @return void
     */
    public function setAddress($value)
    {
        $this->address = $value;
    }

    /**
     *  Set city
     *
     *  @return void
     */
    public function setCity($value)
    {
        $this->city = $value;
    }

    /**
     *  Get id    
     *
     *  @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *  Get user_id
     *
     *  @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     *  Get region_id
     *
     *  @return integer
     */
    public function getRegionId()
    {
        return $this->region_id;
    }

    /**
     *  Get title with value,
     *  convert special HTML entities back to characters
     *
     *  @return string
     */
    public function getTitle()
    {
        return htmlspecialchars_decode($this->title);
    }

    /**
     *  Get address,
     *  convert special HTML entities back to characters
     *
     *  @return string
     */
    public function getAddress()
    {
        return htmlspecialchars_decode($this->address);
    }

    /**
     *  Get city,
     *  convert special HTML entities back to characters
     *
     *  @return string
     */
    public function getCity()
    {
        return htmlspecialchars_decode($this->city);
    }
}