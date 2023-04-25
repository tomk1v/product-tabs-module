<?php
/**
 * Product Tabs
 *
 * @category  Internship
 * @package   Internship\ProductTabs
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2023 tomk1v
 */

namespace Internship\ProductTabs\Observer;

use Internship\ProductTabs\Model\ProductTabs\ProductTabsConfig;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class GenerateProductTabs implements ObserverInterface
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
     * Add custom product tab after block layout generate
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
       /** @var \Magento\Framework\View\Layout $layout */
        $layout = $observer->getLayout();
        $blocks = $layout->getAllBlocks();
        $productTabs = $this->productTabsConfig->getProductTabs();

        foreach ($blocks as $block) {
            if ($block->getNameInLayout() == "product.info.details") {
                $this->addProductTabs($block, $productTabs);
            }
        }
    }

    /**
     * Add child block with product tab data
     *
     * @param $block
     * @param $productTabs
     * @return void
     */
    private function addProductTabs($block, $productTabs)
    {
        foreach ($productTabs as $productTab) {
            if ($productTab->getStatus()) {
                $block->addChild(
                    trim(strtolower($productTab->getName())),
                    \Magento\Catalog\Block\Product\View::class,
                    [
                        "template" => "Internship_ProductTabs::product_tabs_render.phtml",
                        "title" => $productTab->getName(),
                        "description" => $productTab->getDescription(),
                        "status" => $productTab->getStatus()
                    ]
                );
            }
        }
    }
}
