<?php
/**
 * Product Tabs
 *
 * @category  Internship
 * @package   Internship\ProductTabs
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2023 tomk1v
 */

namespace Internship\ProductTabs\Controller\Adminhtml\Index;

use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Internship\ProductTabs\Model\ProductTabsFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Internship\ProductTabs\Api\ProductTabsRepositoryInterface;

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
     * @var ProductTabsFactory
     */
    protected $productTabsFactory;

    /**
     * @var ProductTabsInterface
     */
    protected $productTabsInterface;

    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ProductTabsRepositoryInterface $productTabsRepositoryInterface
     * @param DataPersistorInterface $dataPersistor
     * @param ProductTabsFactory $productTabsFactory
     * @param ProductTabsInterface $productTabsInterface
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        Context                                     $context,
        PageFactory                                 $resultPageFactory,
        ProductTabsRepositoryInterface              $productTabsRepositoryInterface,
        DataPersistorInterface                      $dataPersistor,
        ProductTabsFactory                          $productTabsFactory,
        ProductTabsInterface                        $productTabsInterface,
        ManagerInterface                            $messageManager
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
     * Execution of edit & save action
     *
     * @return Page|Redirect
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

        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Internship_ProductTabs::home');
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Custom Item'));
        $resultPage->getConfig()->getTitle()->prepend($productTabs->getEntityId() ? $productTabs->getName() : __('New Product Tab'));

        return $resultPage;
    }
}
