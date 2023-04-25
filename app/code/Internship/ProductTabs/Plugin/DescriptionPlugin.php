<?php
/**
 * Product Tabs
 *
 * @category  Internship
 * @package   Internship\ProductTabs
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2023 tomk1v
 */

namespace Internship\ProductTabs\Plugin;

use Internship\ProductTabs\Model\ProductTabs\ProductTabsConfig;
use Magento\Catalog\Block\Product\View\Details;

class DescriptionPlugin
{
    /**
     * @var ProductTabsConfig
     */
    private $productTabsConfig;

    /**
     * @param ProductTabsConfig $productTabsConfig
     */
    public function __construct(
      ProductTabsConfig $productTabsConfig
    ) {
        $this->productTabsConfig = $productTabsConfig;
    }

    /**
     * Get sorted product tabs child block names
     *
     * @param Details $subject
     * @param $result
     * @return array|mixed
     */
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
