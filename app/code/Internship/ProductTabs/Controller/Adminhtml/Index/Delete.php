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

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Internship\ProductTabs\Api\ProductTabsRepositoryInterface;

class Delete extends Action
{
    /**
     * @var ProductTabsRepositoryInterface
     */
    private ProductTabsRepositoryInterface $productTabsRepository;

    /**
     * @param Context $context
     * @param ProductTabsRepositoryInterface $productTabsRepository
     */
    public function __construct(
        Context $context,
        ProductTabsRepositoryInterface $productTabsRepository
    ) {
        parent::__construct($context);
        $this->productTabsRepository = $productTabsRepository;
    }

    /**
     * Execution of delete action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $entityId = $this->getRequest()->getParam('entity_id');
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($entityId) {
            try {
                $this->productTabsRepository->deleteById($entityId);
                $this->messageManager->addSuccessMessage(__('The record has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $entityId]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a record to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
