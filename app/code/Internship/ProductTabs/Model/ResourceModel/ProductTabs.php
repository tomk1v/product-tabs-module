<?php
namespace Internship\ProductTabs\Model\ResourceModel;

use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Post
 * @package Internship\ProductTabs\Model\ResourceModel
 */
class ProductTabs extends AbstractDb
{
    /**
     * @var string
     */
    const TABLE_NAME = 'internship_product_tabs';

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, ProductTabsInterface::ENTITY_ID);
    }
}
