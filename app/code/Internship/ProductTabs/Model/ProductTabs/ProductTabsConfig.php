<?php

namespace Internship\ProductTabs\Model\ProductTabs;

class ProductTabsConfig
{
    private $tabs = [
    "test1" => [
        "title" => "Test tab number 1",
        "description" => "Lorem dfegfwgwgwrgwrgwrgwrg",
        "sort_order" => 50
    ],
    "test2" => [
        "title" => "Test tab number 2",
        "description" => "Lorem dfegfwgwgwrgwrgw ebeb etb ebe be be be b b enpee,otno ,e  353rgwrg",
        "sort_order" => 50
    ]];

    public function getTabs()
    {
        return $this->tabs;
    }
}
