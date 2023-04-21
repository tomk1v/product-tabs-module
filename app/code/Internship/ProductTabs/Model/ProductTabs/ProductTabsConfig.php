<?php

namespace Internship\ProductTabs\Model\ProductTabs;

class ProductTabsConfig
{
    public function __construct(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria,
        \Internship\ProductTabs\Api\ProductTabsRepositoryInterface $productTabsRepository
    ) {
        $this->searchCriteria = $searchCriteria;
        $this->productTabsRepository = $productTabsRepository;
    }

    public function getProductTabs()
    {
        $listProductTabs = $this->productTabsRepository->getList($this->searchCriteria);
        return $listProductTabs->getItems();
    }
}
