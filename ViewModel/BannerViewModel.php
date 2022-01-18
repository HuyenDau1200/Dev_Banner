<?php
namespace Dev\Banner\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Dev\Banner\Model\BannerFactory;
use Dev\Banner\Model;
use Dev\Banner\Model\ResourceModel\Banner;

class BannerViewModel implements ArgumentInterface
{
    protected $bannerFactory;

    public function __construct(
        BannerFactory $bannerFactory
    )
    {
        $this->bannerFactory=$bannerFactory;
    }

    public function getBannerById($id){
        $bannerObj=$this->bannerFactory->create()->load($id);
        return $bannerObj;
    }

    public function getSomething(){
        return "Display text";
    } 

    public function getListBanner(){
        $bannerCollection=$this->bannerFactory->create();
        return $bannerCollection->getCollection();
    }

    public function getCrumbs(){
        $everCrumbs=array();
        $everCrumbs[]=array(
            'label' => 'Home',
            'title' => 'Go to Home Page',
            'link' => '/'
        );
        $listBanner=$this->getListBanner()->getData();
        foreach($listBanner as $banner){
            $everCrumbs[]=array(
                'label' => $banner['name'],
                'title' => $banner['name'],
                'link' => '/banner/index/detail'
            );
        };
        return $everCrumbs;
    }
}
