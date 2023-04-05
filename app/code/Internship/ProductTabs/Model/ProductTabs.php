<?php
namespace Internship\ProductTabs\Model;

use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Post
 * @package Internship\ProductTabs\Model
 */
class ProductTabs extends AbstractModel implements ProductTabsInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ProductTabsInterface::class);
    }


    public function getStatus()
    {
        return $this->getData(ProductTabsInterface::STATUS);
    }

    public function setStatus($status)
    {
       $this->setData(ProductTabsInterface::STATUS, $status);
       return $this;
    }

    public function getName()
    {
        return $this->getData(ProductTabsInterface::NAME);
    }

    public function setName(string $name)
    {
        $this->setData(ProductTabsInterface::NAME, $name);
        return $this;
    }

    public function getDescription()
    {
        return $this->getData(ProductTabsInterface::DESCRIPTION);
    }

    public function setDescription(string $description)
    {
        $this->setData(ProductTabsInterface::DESCRIPTION, $description);
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->getData(ProductTabsInterface::CREATED_AT);
    }

    public function setCreatedAt(string $createdAt)
    {
        $this->setData(ProductTabsInterface::CREATED_AT, $createdAt);
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->getData(ProductTabsInterface::UPDATED_AT);
    }

    public function setUpdatedAt(string $updatedAt)
    {
        $this->setData(ProductTabsInterface::UPDATED_AT, $updatedAt);
        return $this;
    }
}
