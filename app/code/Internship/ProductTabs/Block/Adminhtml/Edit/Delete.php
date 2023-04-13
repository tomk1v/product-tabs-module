<?php

namespace Internship\ProductTabs\Block\Adminhtml\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Customer\Block\Adminhtml\Edit\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete extends GenericButton implements ButtonProviderInterface
{
    protected $context;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry
    ) {
        $this->context = $context;
        parent::__construct($context, $registry);
    }

    public function getButtonData()
    {
        $data = [];
        $entityId = $this->context->getRequest()->getParam('entity_id');
        if ($entityId) {
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure you want to delete this?'
                    ) . '\', \'' . $this->getDeleteUrl($entityId) . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    public function getDeleteUrl($entityId)
    {
        return $this->getUrl('*/*/delete', ['entity_id' => $entityId]);
    }
}
