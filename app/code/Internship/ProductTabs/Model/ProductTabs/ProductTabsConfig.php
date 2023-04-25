<?php
/**
 * Product Tabs
 *
 * @category  Internship
 * @package   Internship\ProductTabs
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2023 tomk1v
 */

namespace Internship\ProductTabs\Model\ProductTabs;

use Internship\ProductTabs\Api\ProductTabsRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class ProductTabsConfig
{
    /**
     * @var SearchCriteriaInterface
     */
    private $searchCriteria;

    /**
     * @var ProductTabsRepositoryInterface
     */
    private $productTabsRepository;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param ProductTabsRepositoryInterface $productTabsRepository
     */
    public function __construct(
        SearchCriteriaInterface $searchCriteria,
        ProductTabsRepositoryInterface $productTabsRepository
    ) {
        $this->searchCriteria = $searchCriteria;
        $this->productTabsRepository = $productTabsRepository;
    }

    /**
     * Get all product tabs for rendering
     *
     * @return mixed
     */
    public function getProductTabs()
    {
        $listProductTabs = $this->productTabsRepository->getList($this->searchCriteria);
        return $listProductTabs->getItems();
    }
}
