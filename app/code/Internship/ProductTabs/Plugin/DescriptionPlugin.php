<?php

namespace Internship\ProductTabs\Plugin;

use Magento\Catalog\Block\Product\View\Details;

class DescriptionPlugin
{
    private \Internship\ProductTabs\Model\ProductTabs\ProductTabsConfig $productTabsConfig;

    public function __construct(
      \Internship\ProductTabs\Model\ProductTabs\ProductTabsConfig $productTabsConfig
    ) {
        $this->productTabsConfig = $productTabsConfig;
    }

    public function afterGetGroupSortedChildNames(Details $subject, $result)
    {
        $sortOrder = 50;
        $productTabs = $this->productTabsConfig->getTabs();
        if (!empty($productTabs)) {
            foreach ($productTabs as $key => $tab) {
                $result = array_merge($result, [
                    $sortOrder => "product.info.details.$key"
                ]);
            }
        }

        return $result;
    }
}
