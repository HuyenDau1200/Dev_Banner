<?php
namespace Dev\Banner\Block;

use Dev\Banner\Model\BannerFactory;

class View extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    protected $bannerFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        BannerFactory $bannerFactory,
        array $data = []
    ) {
        $this->bannerFactory=$bannerFactory;
        parent::__construct($context, $data);
    }

    public function sayHello(){
        return __("Hello View");
    }

    public function getBannerCollection(){
        $bannerCollection=$this->bannerFactory->create();
        return $bannerCollection->getCollection();
    }
}
