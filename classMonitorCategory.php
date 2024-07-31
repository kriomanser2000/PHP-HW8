<?php
class MonitorCategory extends Category
{
    public function __construct($name)
    {
        parent::__construct($name, ['Diagonal', 'Frequency']);
    }
}