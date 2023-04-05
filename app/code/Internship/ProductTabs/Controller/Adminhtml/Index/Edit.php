<?php
//namespace Vendor\Module\Controller\Adminhtml\Custom;
//
//use Magento\Backend\App\Action\Context;
//use Magento\Framework\App\Request\DataPersistorInterface;
//use Magento\Framework\Exception\LocalizedException;
//use Magento\Framework\Registry;
//use Magento\Framework\View\Result\PageFactory;
//use Vendor\Module\Model\CustomRepository;
//
//class Edit extends \Magento\Backend\App\Action
//{
//    /**
//     * @var PageFactory
//     */
//    protected $resultPageFactory;
//
//    /**
//     * @var CustomRepository
//     */
//    protected $customRepository;
//
//    /**
//     * @var DataPersistorInterface
//     */
//    protected $dataPersistor;
//
//    /**
//     * @var Registry
//     */
//    protected $coreRegistry;
//
//    /**
//     * @param Context $context
//     * @param PageFactory $resultPageFactory
//     * @param CustomRepository $customRepository
//     * @param DataPersistorInterface $dataPersistor
//     * @param Registry $coreRegistry
//     */
//    public function __construct(
//        Context $context,
//        PageFactory $resultPageFactory,
//        CustomRepository $customRepository,
//        DataPersistorInterface $dataPersistor,
//        Registry $coreRegistry
//    ) {
//        $this->resultPageFactory = $resultPageFactory;
//        $this->customRepository = $customRepository;
//        $this->dataPersistor = $dataPersistor;
//        $this->coreRegistry = $coreRegistry;
//        parent::__construct($context);
//    }
//
//    /**
//     * Edit action
//     *
//     * @return \Magento\Framework\View\Result\Page|\Magento\Framework\Controller\Result\Redirect
//     * @throws LocalizedException
//     */
//    public function execute()
//    {
//        $id = $this->getRequest()->getParam('id');
//        $model = $this->customRepository->getById($id);
//
//        if (!$model->getId() && $id) {
//            $this->messageManager->addErrorMessage(__('This custom item no longer exists.'));
//            $resultRedirect = $this->resultRedirectFactory->create();
//            return $resultRedirect->setPath('*/*/');
//        }
//
//        $data = $this->dataPersistor->get('custom_data');
//        if (!empty($data)) {
//            $model->setData($data);
//        }
//
//        $this->coreRegistry->register('custom_item', $model);
//
//        $resultPage = $this->resultPageFactory->create();
//        $resultPage->setActiveMenu('Vendor_Module::custom_menu');
//        $resultPage->getConfig()->getTitle()->prepend(__('Edit Custom Item'));
//
//        return $resultPage;
//    }
//}
