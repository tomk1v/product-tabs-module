<?php
namespace Internship\ProductTabs\Model;

use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Magento\Framework\Model\AbstractModel;

class ProductTabs extends AbstractModel implements ProductTabsInterface
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Internship\ProductTabs\Model\ResourceModel\ProductTabs::class);
    }

    /**
     * @return array|int|mixed|null
     */
    public function getEntityId()
    {
        return $this->getData(ProductTabsInterface::ENTITY_ID);
    }

    /**
     * @param $entityId
     * @return $this|ProductTabs
     */
    public function setEntityId($entityId)
    {
        $this->setData(ProductTabsInterface::ENTITY_ID, $entityId);
        return $this;
    }

    /**
     * @return array|int|mixed|null
     */
    public function getStatus()
    {
        return $this->getData(ProductTabsInterface::STATUS);
    }

    /**
     * @param $status
     * @return $this|ProductTabs
     */
    public function setStatus($status)
    {
       $this->setData(ProductTabsInterface::STATUS, $status);
       return $this;
    }

    /**
     * @return array|mixed|string|null
     */
    public function getName()
    {
        return $this->getData(ProductTabsInterface::NAME);
    }

    /**
     * @param string $name
     * @return $this|ProductTabs
     */
    public function setName(string $name)
    {
        $this->setData(ProductTabsInterface::NAME, $name);
        return $this;
    }

    /**
     * @return array|mixed|string|null
     */
    public function getDescription()
    {
        return $this->getData(ProductTabsInterface::DESCRIPTION);
    }

    /**
     * @param string $description
     * @return $this|ProductTabs
     */
    public function setDescription(string $description)
    {
        $this->setData(ProductTabsInterface::DESCRIPTION, $description);
        return $this;
    }

    /**
     * @return array|mixed|string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(ProductTabsInterface::CREATED_AT);
    }

    /**
     * @param string $createdAt
     * @return $this|ProductTabs
     */
    public function setCreatedAt(string $createdAt)
    {
        $this->setData(ProductTabsInterface::CREATED_AT, $createdAt);
        return $this;
    }

    /**
     * @return array|mixed|string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(ProductTabsInterface::UPDATED_AT);
    }

    /**
     * @param string $updatedAt
     * @return $this|ProductTabs
     */
    public function setUpdatedAt(string $updatedAt)
    {
        $this->setData(ProductTabsInterface::UPDATED_AT, $updatedAt);
        return $this;
    }
}
