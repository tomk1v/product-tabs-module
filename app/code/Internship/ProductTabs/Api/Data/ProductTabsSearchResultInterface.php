<?php
namespace Internship\ProductTabs\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface PostSearchResultInterface
 * @package AlexPoletaev\Blog\Api\Data
 */
interface ProductTabsSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Internship\ProductTabs\Api\Data\ProductTabsInterface[]
     */
    public function getItems();

    /**
     * @param \Internship\ProductTabs\Api\Data\ProductTabsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
