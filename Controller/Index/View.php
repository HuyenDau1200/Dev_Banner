<?php

namespace Dev\Banner\Controller\Index;

use Dev\Banner\Model\BannerRepository;
use Dev\Banner\Model\Banner;

class View extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $bannerModel;
    protected $bannerRepository;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        BannerRepository $bannerRepository
    ) {
        $this->_pageFactory = $pageFactory;
        $this->bannerRepository = $bannerRepository;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {   
        #Thuc hanh ve controller
        // $id = $this->getRequest()->getParam('id');

        // $model = $this->bannerRepository->getById($id);

        // if (!empty($model)) {
        //      dd($model->getData());
        //     // echo "<pre>";
        //     // print_r($model->getData());
        //     // echo "</pre>";
        // } else {
        //     echo "Không tồn tại bản ghi chứa banner_id = " . $id;
        // }

       return $this->_pageFactory->create();  
    }   
}
