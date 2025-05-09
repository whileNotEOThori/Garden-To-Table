<?php
class product
{
    public $pID;
    public $sID;
    public $cID;
    public $name;
    public $description;
    public $mass;
    public $price;
    public $quantity;
    public $image;

    public function __construct($productRow)
    {
        $this->pID = $productRow['pID'];
        $this->sID = $productRow['sID'];
        $this->cID = $productRow['cID'];
        $this->name = $productRow['name'];
        $this->description = $productRow['description'];
        $this->mass = $productRow['mass'];
        $this->price = $productRow['price'];
        $this->quantity = $productRow['quantity'];
        $this->image = base64_encode($productRow['image']);
    }
}
