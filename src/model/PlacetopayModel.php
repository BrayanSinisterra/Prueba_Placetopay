<?php 

namespace Placetopay\model;


class PlacetopayModel {
   
    private $name;
    private $surname;
    private $email;
    private $documentType;
    private $document;
    private $street;
    private $city;
    private $country;
    private $reference;
    private $description;
    private $currency;
    private $total;
    
    function __construct($name,$surname,$email,$documentType,
                         $document,$street,$city,$country,
                         $reference,$description,$currency,$total)
    {
      
        $this->name  =  $name;
        $this->surname =  $surname;
        $this->email = $email;
        $this->documentType = $documentType;
        $this->document = $document;
        $this->street  = $street;
        $this->city   =  $city;
        $this->country = $country;
        $this->reference = $reference;
        $this->description = $description;
        $this->currency = $currency;
        $this->total = $total;
        
    }


    public function Name()
    {
        
        return $this->name;
    }


    public function Surname()
    {
        return $this->surname;
    }


    public function Email()
    {
        return $this->email;
    }



    public function DocumentType()
    {
        return $this->documentType;
    }



    public function Document()
    {
        return $this->document;
    }

  

    public function Street()
    {
        return $this->street;
    }


    public function City()
    {
        return $this->city;
    }



    public function Country()
    {
        return $this->country;
    }



    public function Reference()
    {
        return $this->reference;
    }


    public function Description()
    {
        return $this->description;
    }

  

    public function Currency()
    {
        return $this->currency;
    }


    public function Total()
    {
        return $this->total;
    }


}
        
     
