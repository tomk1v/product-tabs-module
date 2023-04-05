<?php
//
//namespace Internship\ProductTabs\Ui\Component\Listing\Grid\Column;
//
//use Magento\Framework\View\Element\UiComponent\ContextInterface;
//use Magento\Framework\View\Element\UiComponentFactory;
//use Magento\Ui\Component\Listing\Columns\Column;
//use Magento\Framework\UrlInterface;
//
//class Action extends Column
//{
//    /** Url path */
//    const ROW_EDIT_URL = 'product_tabs/index/edit';
//
//    /** @var UrlInterface */
//    protected $_urlBuilder;
//
//    /**
//     * @param ContextInterface   $context
//     * @param UiComponentFactory $uiComponentFactory
//     * @param UrlInterface       $urlBuilder
//     * @param array              $components
//     * @param array              $data
//     */
//    public function __construct(
//        ContextInterface $context,
//        UiComponentFactory $uiComponentFactory,
//        UrlInterface $urlBuilder,
//        array $components = [],
//        array $data = []
//    )
//    {
//        $this->_urlBuilder = $urlBuilder;
//        parent::__construct($context, $uiComponentFactory, $components, $data);
//    }
//
//    /**
//     * Prepare Data Source.
//     *
//     * @param array $dataSource
//     *
//     * @return array
//     */
//    public function prepareDataSource(array $dataSource)
//    {
//        if (isset($dataSource['data']['items'])) {
//            foreach ($dataSource['data']['items'] as &$item) {
//                $name = $this->getData('name');
//                if (isset($item['article_id'])) {
//                    $item[$name]['edit'] = [
//                        'href' => $this->_urlBuilder->getUrl(
//                            self::ROW_EDIT_URL,
//                            ['id' => $item['article_id']]
//                        ),
//                        'label' => __('Edit'),
//                    ];
//                }
//            }
//        }
//
//        return $dataSource;
//    }
//}
