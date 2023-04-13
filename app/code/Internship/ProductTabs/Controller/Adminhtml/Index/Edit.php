<?php
namespace Internship\ProductTabs\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Result\PageFactory;
use Internship\ProductTabs\Api\ProductTabsRepositoryInterface;
use Magento\Backend\Model\View\Result\Page;
use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\Model\View\Result\Redirect;
class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var ProductTabsRepositoryInterface
     */
    protected $productTabsRepositoryInterface;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ProductTabsRepositoryInterface $productTabsRepositoryInterface
     * @param DataPersistorInterface $dataPersistor
     * @param Registry $coreRegistry
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ProductTabsRepositoryInterface $productTabsRepositoryInterface,
        DataPersistorInterface $dataPersistor,
        \Internship\ProductTabs\Model\ProductTabsFactory $productTabsFactory,
        \Internship\ProductTabs\Api\Data\ProductTabsInterface $productTabsInterface,
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->productTabsRepositoryInterface = $productTabsRepositoryInterface;
        $this->dataPersistor = $dataPersistor;
        $this->productTabsFactory = $productTabsFactory;
        $this->productTabsInterface = $productTabsInterface;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }


    /**
     * @return \Magento\Framework\View\Result\Page|\Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $entityId = $this->getRequest()->getParam('entity_id');

        if ($entityId) {
            $productTabs = $this->productTabsRepositoryInterface->getById($entityId);
            if (!$productTabs->getEntityId()) {
                $this->messageManager->addErrorMessage(__('This product tabs no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        } else {
            $productTabs = $this->productTabsFactory->create();
        }

        $formData = $this->getRequest()->getParam('form_key');
        if (!empty($formData)) {
            $productTabs->setStatus($this->getRequest()->getParam('status'));
            $productTabs->setName($this->getRequest()->getParam('tab_name'));
            $productTabs->setDescription($this->getRequest()->getParam('description'));
            $this->productTabsRepositoryInterface->save($productTabs);

            $this->messageManager->addSuccessMessage('Product tab created successfully');

            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/');
        }
//TODO: empty field on view page
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Internship_ProductTabs::home');
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Custom Item'));
        $resultPage->getConfig()->getTitle()->prepend($productTabs->getEntityId() ? $productTabs->getName() : __('New Product Tab'));

        return $resultPage;
    }
}
