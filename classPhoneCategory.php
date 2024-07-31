<?php
class PhoneCategory extends Category
{
    public function __construct($name)
    {
        parent::__construct($name, ['Ram', 'CountSim', 'Hdd', 'OS']);
    }
}