<?php

namespace Internship\ProductTabs\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResults;
use Magento\Framework\Api\SearchResultsFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Internship\ProductTabs\Api\ProductTabsRepositoryInterface;
use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Internship\ProductTabs\Model\ProductTabsFactory;
use Internship\ProductTabs\Model\ResourceModel\ProductTabs as ProductTabsResource;
use Internship\ProductTabs\Model\ResourceModel\ProductTabs\CollectionFactory as ProductTabsCollectionFactory;
use Internship\ProductTabs\Model\ResourceModel\ProductTabs\Collection;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductTabsRepository implements ProductTabsRepositoryInterface
{
    private $productTabsFactory;
    private $productTabsResource;
    private $productTabsCollectionFactory;
    private $searchResultsFactory;
    private $collectionProcessor;

    public function __construct(
        ProductTabsFactory              $productTabsFactory,
        ProductTabsResource                      $productTabsResource,
        ProductTabsCollectionFactory             $productTabsCollectionFactory,
        SearchResultsFactory                  $searchResultsFactory,
        CollectionProcessorInterface          $collectionProcessor,
        Collection                            $productTabsCollection
    )
    {
        $this->productTabsFactory = $productTabsFactory;
        $this->productTabsResource = $productTabsResource;
        $this->productTabsCollectionFactory = $productTabsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->productTabsCollection = $productTabsCollection;
    }

    /**
     * @param $entityId
     * @return ProductTabsInterface
     * @throws NoSuchEntityException
     */
    public function getById($entityId)
    {
        $productTabs = $this->productTabsFactory->create();
        $this->productTabsResource->load($productTabs, $entityId);
        if (!$productTabs->getEntityId()) {
            throw new NoSuchEntityException(__('Requested tab doesn\'t exist'));
        }
        return $productTabs;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResults
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->productTabsCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * @inheritDoc
     * @throws CouldNotSaveException
     */
    public function save(ProductTabsInterface $productTabs)
    {
        try {
            $this->productTabsResource->save($productTabs);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $productTabs;
    }

    /**
     * @inheritDoc
     * @throws CouldNotDeleteException
     */
    public function delete(ProductTabsInterface $productTabs)
    {
        try {
            $this->productTabsResource->delete($productTabs);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($entity_id)
    {
        $productTabs = $this->getById($entity_id);
        return $this->delete($productTabs);
    }
}
