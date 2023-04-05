<?php
namespace Internship\ProductTabs\Api;

use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface PostRepositoryInterface
 * @package ProductTabs\Api
 * @api
 */
interface ProductTabsRepositoryInterface
{
    /**
     * @param int $entity_id
     * @return \Internship\ProductTabs\Api\Data\ProductTabsInterface
     */
    public function getById(int $entity_id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Internship\ProductTabs\Api\Data\ProductTabsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param \Internship\ProductTabs\Api\Data\ProductTabsInterface $productTabs
     * @return \Internship\ProductTabs\Api\Data\ProductTabsInterface
     */
    public function save(ProductTabsInterface $productTabs);

    /**
     * @param \Internship\ProductTabs\Api\Data\ProductTabsInterface $productTabs
     * @return bool
     */
    public function delete(ProductTabsInterface $productTabs);

    /**
     * @param int $entity_id
     * @return bool
     */
    public function deleteById(int $entity_id);
}
