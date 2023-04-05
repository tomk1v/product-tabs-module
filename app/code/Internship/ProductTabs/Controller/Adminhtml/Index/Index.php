<?php

namespace Internship\ProductTabs\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action
{

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Internship_ProductTabs::home');
        $resultPage->getConfig()->getTitle()->prepend((__('Product Tabs')));

        return $resultPage;
    }


}
