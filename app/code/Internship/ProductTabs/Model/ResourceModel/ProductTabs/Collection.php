<?php
namespace Internship\ProductTabs\Model\ResourceModel\ProductTabs;

use Internship\ProductTabs\Model\ProductTabs;
use Internship\ProductTabs\Model\ResourceModel\ProductTabs as ProductTabsResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Internship\ProductTabs\Model\ResourceModel\Post
 */
class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ProductTabs::class, ProductTabsResource::class);
    }
}
