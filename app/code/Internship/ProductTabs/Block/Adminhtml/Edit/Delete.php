<?php
/**
 * Product Tabs
 *
 * @category  Internship
 * @package   Internship\ProductTabs
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2023 tomk1v
 */

namespace Internship\ProductTabs\Block\Adminhtml\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Customer\Block\Adminhtml\Edit\GenericButton;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete extends GenericButton implements ButtonProviderInterface
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @param Context $context
     * @param Registry $registry
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        Registry $registry
    ) {
        $this->context = $context;
        parent::__construct($context, $registry);
    }

    /**
     * Get button delete data
     *
     * @return array
     */
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

    /**
     * Get delete url
     *
     * @param $entityId
     * @return string
     */
    public function getDeleteUrl($entityId)
    {
        return $this->getUrl('*/*/delete', ['entity_id' => $entityId]);
    }
}
