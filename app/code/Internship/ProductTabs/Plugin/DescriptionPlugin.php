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
        $productTabs = $this->productTabsConfig->getProductTabs();
        if (!empty($productTabs)) {
            foreach ($productTabs as $productTab) {
                if ($productTab->getStatus()) {
                    $key = trim(strtolower($productTab->getName()));
                    $result = array_merge($result, ["product.info.details.$key"]);
                }
            }
        }
        return $result;
    }
}
