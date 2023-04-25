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

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResults;
use Magento\Framework\Api\SearchResultsFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Internship\ProductTabs\Api\ProductTabsRepositoryInterface;
use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Internship\ProductTabs\Model\ResourceModel\ProductTabs as ProductTabsResource;
use Internship\ProductTabs\Model\ResourceModel\ProductTabs\CollectionFactory as ProductTabsCollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductTabsRepository implements ProductTabsRepositoryInterface
{
    /**
     * @var ProductTabsFactory
     */
    private $productTabsFactory;

    /**
     * @var ProductTabsResource
     */
    private $productTabsResource;

    /**
     * @var ProductTabsCollectionFactory
     */
    private $productTabsCollectionFactory;

    /**
     * @var SearchResultsFactory
     */
    private $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param ProductTabsFactory $productTabsFactory
     * @param ProductTabsResource $productTabsResource
     * @param ProductTabsCollectionFactory $productTabsCollectionFactory
     * @param SearchResultsFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ProductTabsFactory              $productTabsFactory,
        ProductTabsResource                      $productTabsResource,
        ProductTabsCollectionFactory             $productTabsCollectionFactory,
        SearchResultsFactory                  $searchResultsFactory,
        CollectionProcessorInterface          $collectionProcessor
    )
    {
        $this->productTabsFactory = $productTabsFactory;
        $this->productTabsResource = $productTabsResource;
        $this->productTabsCollectionFactory = $productTabsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Get entity by id
     *
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
     * Get list of items by search criteria
     *
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
     * Save entity
     *
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
     * Delete entity
     *
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
     * Delete entity by id
     *
     * @inheritDoc
     */
    public function deleteById($entityId)
    {
        $productTabs = $this->getById($entityId);
        return $this->delete($productTabs);
    }
}
