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

use Magento\Framework\Api\SearchCriteriaInterface;

interface ProductTabsRepositoryInterface
{
    /**
     * @param int $entityId
     * @return \Internship\ProductTabs\Api\Data\ProductTabsInterface
     */
    public function getById(int $entityId);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Internship\ProductTabs\Api\Data\ProductTabsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param \Internship\ProductTabs\Api\Data\ProductTabsInterface $productTabs
     * @return \Internship\ProductTabs\Api\Data\ProductTabsInterface
     */
    public function save(\Internship\ProductTabs\Api\Data\ProductTabsInterface $productTabs);

    /**
     * @param \Internship\ProductTabs\Api\Data\ProductTabsInterface $productTabs
     * @return bool
     */
    public function delete(\Internship\ProductTabs\Api\Data\ProductTabsInterface $productTabs);

    /**
     * @param int $entityId
     * @return bool
     */
    public function deleteById(int $entityId);
}
