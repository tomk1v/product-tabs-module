<?php
/**
 * Product Tabs
 *
 * @category  Internship
 * @package   Internship\ProductTabs
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2023 tomk1v
 */

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
     * Get entity id
     *
     * @return array|int|mixed|null
     */
    public function getEntityId()
    {
        return $this->getData(ProductTabsInterface::ENTITY_ID);
    }

    /**
     * Set entity id
     *
     * @param $entityId
     * @return $this|ProductTabs
     */
    public function setEntityId($entityId)
    {
        $this->setData(ProductTabsInterface::ENTITY_ID, $entityId);
        return $this;
    }

    /**
     * Get status
     *
     * @return array|int|mixed|null
     */
    public function getStatus()
    {
        return $this->getData(ProductTabsInterface::STATUS);
    }

    /**
     * Set status
     *
     * @param $status
     * @return $this|ProductTabs
     */
    public function setStatus($status)
    {
       $this->setData(ProductTabsInterface::STATUS, $status);
       return $this;
    }

    /**
     * Get name
     *
     * @return array|mixed|string|null
     */
    public function getName()
    {
        return $this->getData(ProductTabsInterface::NAME);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return $this|ProductTabs
     */
    public function setName(string $name)
    {
        $this->setData(ProductTabsInterface::NAME, $name);
        return $this;
    }

    /**
     * Get description
     *
     * @return array|mixed|string|null
     */
    public function getDescription()
    {
        return $this->getData(ProductTabsInterface::DESCRIPTION);
    }

    /**
     * Set description
     *
     * @param string $description
     * @return $this|ProductTabs
     */
    public function setDescription(string $description)
    {
        $this->setData(ProductTabsInterface::DESCRIPTION, $description);
        return $this;
    }

    /**
     * Get created at
     *
     * @return array|mixed|string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(ProductTabsInterface::CREATED_AT);
    }

    /**
     * Set created at
     *
     * @param string $createdAt
     * @return $this|ProductTabs
     */
    public function setCreatedAt(string $createdAt)
    {
        $this->setData(ProductTabsInterface::CREATED_AT, $createdAt);
        return $this;
    }

    /**
     * Get updated at
     *
     * @return array|mixed|string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(ProductTabsInterface::UPDATED_AT);
    }

    /**
     * Set updated at
     *
     * @param string $updatedAt
     * @return $this|ProductTabs
     */
    public function setUpdatedAt(string $updatedAt)
    {
        $this->setData(ProductTabsInterface::UPDATED_AT, $updatedAt);
        return $this;
    }
}
