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
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\Controller\ResultFactory;
use Internship\ProductTabs\Api\Data\ProductTabsInterface;
use Internship\ProductTabs\Api\ProductTabsRepositoryInterface;
use Internship\ProductTabs\Model\ResourceModel\ProductTabs\CollectionFactory;

class MassDelete extends Action
{
    /**
     * @var ProductTabsRepositoryInterface
     */
    private $productTabsRepository;

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param ProductTabsRepositoryInterface $productTabsRepository
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        ProductTabsRepositoryInterface $productTabsRepository,
        CollectionFactory $collectionFactory
    ) {
        parent::__construct($context);
        $this->filter = $filter;
        $this->productTabsRepository = $productTabsRepository;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Executing mass delete action
     *
     * @return Redirect
     * @throws LocalizedException|Exception
     */
    public function execute()
    {
        /** @var AbstractCollection $collection */
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
        if ($collectionSize > 0) {
            /** @var ProductTabsInterface $item */
            foreach ($collection as $item) {
                $this->productTabsRepository->delete($item);
            }
        }
        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
