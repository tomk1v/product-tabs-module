<?php
/**
 * Store Locator
 * Data Provider for displaying data in grid and form
 *
 * @category  Internship
 * @package   Internship\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Internship\ProductTabs\Model\ProductTabs;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Internship\ProductTabs\Model\ResourceModel\ProductTabs\Collection;
use Internship\ProductTabs\Model\ResourceModel\ProductTabs\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param StoreManagerInterface $storeManager
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        /** @var ProductTabsInterface $location */
        foreach ($items as $location) {
            $this->loadedData[$location->getId()] = $location->getData();
        }

        return $this->loadedData;
    }
}
