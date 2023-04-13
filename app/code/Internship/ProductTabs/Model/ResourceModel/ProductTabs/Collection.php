<?php
namespace Internship\ProductTabs\Model\ResourceModel\ProductTabs;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Internship\ProductTabs\Model\ResourceModel\ProductTabs
 */
class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(\Internship\ProductTabs\Model\ProductTabs::class, \Internship\ProductTabs\Model\ResourceModel\ProductTabs::class);
    }
}
