<?php

namespace Internship\ProductTabs\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class GenerateProductTabs implements ObserverInterface
{
    private \Internship\ProductTabs\Model\ProductTabs\ProductTabsConfig $productTabsConfig;

    public function __construct(
        \Internship\ProductTabs\Model\ProductTabs\ProductTabsConfig $productTabsConfig
    ) {
        $this->productTabsConfig = $productTabsConfig;
    }

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
