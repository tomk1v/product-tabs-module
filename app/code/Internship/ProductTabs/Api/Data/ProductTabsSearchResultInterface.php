<?php
/**
 * Product Tabs
 *
 * @category  Internship
 * @package   Internship\ProductTabs
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2023 tomk1v
 */

namespace Internship\ProductTabs\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ProductTabsSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return ProductTabsInterface[]
     */
    public function getItems();

    /**
     * @param ProductTabsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
