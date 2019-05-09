<?php

namespace app\models;

use yii\db\ActiveRecord;


class Products extends ActiveRecord
{
    private $id;
    private $name;
    private $land_size;
    private $product_type;
    private $product_image;
    private $product_address;
    private $product_city;
    private $product_state;
    private $product_country;
    private $estimatedPrice;
    private $quotedPrice;
    private $product_status;
    private $product_summary;
    private $sellerUserId;

    /**
     * @return string
     */
    public static function tablename()
    {
        return "products";
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, phone and message are required
            [['name', 'land_size','product_type', 'product_image','product_address','product_city','product_state',
                'product_country','estimatedPrice','quotedPrice','product_status','product_summary','sellerUserId'], 'required'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => "Name",
            'land_size' => "Land Size",
            'product_type' => "Property Type",
            'product_status' => "Property Status",
            'product_image' => "Propety Image",
            'product_address' => "Property Address",
            'product_city' => "Property City",
            'product_state' => "Property State",
            'product_country' => "Property Country",
            'estimatedPrice' => "Property estimatedPrice",
            'quotedPrice' => "Property quotedPrice",
            'product_status' => "Property Status",
            'product_summary' => "Property Summary"


        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Products
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Products
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLandSize()
    {
        return $this->land_size;
    }

    /**
     * @param mixed $land_size
     * @return Products
     */
    public function setLandSize($land_size)
    {
        $this->land_size = $land_size;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductType()
    {
        return $this->product_type;
    }

    /**
     * @param mixed $product_type
     * @return Products
     */
    public function setProductType($product_type)
    {
        $this->product_type = $product_type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductImage()
    {
        return $this->product_image;
    }

    /**
     * @param mixed $product_image
     * @return Products
     */
    public function setProductImage($product_image)
    {
        $this->product_image = $product_image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductAddress()
    {
        return $this->product_address;
    }

    /**
     * @param mixed $product_address
     * @return Products
     */
    public function setProductAddress($product_address)
    {
        $this->product_address = $product_address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductCity()
    {
        return $this->product_city;
    }

    /**
     * @param mixed $product_city
     * @return Products
     */
    public function setProductCity($product_city)
    {
        $this->product_city = $product_city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductState()
    {
        return $this->product_state;
    }

    /**
     * @param mixed $product_state
     * @return Products
     */
    public function setProductState($product_state)
    {
        $this->product_state = $product_state;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductCountry()
    {
        return $this->product_country;
    }

    /**
     * @param mixed $product_country
     * @return Products
     */
    public function setProductCountry($product_country)
    {
        $this->product_country = $product_country;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstimatedPrice()
    {
        return $this->estimatedPrice;
    }

    /**
     * @param mixed $estimatedPrice
     * @return Products
     */
    public function setEstimatedPrice($estimatedPrice)
    {
        $this->estimatedPrice = $estimatedPrice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuotedPrice()
    {
        return $this->quotedPrice;
    }

    /**
     * @param mixed $quotedPrice
     * @return Products
     */
    public function setQuotedPrice($quotedPrice)
    {
        $this->quotedPrice = $quotedPrice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductStatus()
    {
        return $this->product_status;
    }

    /**
     * @param mixed $product_status
     * @return Products
     */
    public function setProductStatus($product_status)
    {
        $this->product_status = $product_status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductSummary()
    {
        return $this->product_summary;
    }

    /**
     * @param mixed $product_summary
     * @return Products
     */
    public function setProductSummary($product_summary)
    {
        $this->product_summary = $product_summary;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSellerUserId()
    {
        return $this->sellerUserId;
    }

    /**
     * @param mixed $sellerUserId
     * @return Products
     */
    public function setSellerUserId($sellerUserId)
    {
        $this->sellerUserId = $sellerUserId;
        return $this;
    }


}