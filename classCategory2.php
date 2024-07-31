<?php
class Category
{
    public $name;
    public $filters = [];
    public $listProducts = [];
    public function __construct($name, $filters)
    {
        $this->name = $name;
        $this->filters = $filters;
        $this->filters[] = 'Price';
    }
    public function addProduct($product)
    {
        $this->listProducts[] = $product;
    }
}