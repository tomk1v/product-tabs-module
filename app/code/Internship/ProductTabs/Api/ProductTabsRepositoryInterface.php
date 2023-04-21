<?php
/**
 * Product Tabs
 *
 * @category  Internship
 * @package   Internship\ProductTabs
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2023 tomk1v
 */

namespace Internship\ProductTabs\Api;

use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface ProductTabsRepositoryInterface
{
    /**
     * @param int $entityId
     * @return ProductTabsInterface
     */
    public function getById(int $entityId);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ProductTabsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param ProductTabsInterface $productTabs
     * @return ProductTabsInterface
     */
    public function save(ProductTabsInterface $productTabs);

    /**
     * @param ProductTabsInterface $productTabs
     * @return bool
     */
    public function delete(ProductTabsInterface $productTabs);

    /**
     * @param int $entity_id
     * @return bool
     */
    public function deleteById(int $entity_id);
}
