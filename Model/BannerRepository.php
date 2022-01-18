<?php
namespace Dev\Banner\Model;

use Dev\Banner\Api\Data\BannerInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Dev\Banner\Model\BannerFactory;
use Dev\Banner\Model\ResourceModel\Banner;
use Magento\Backend\Model\View\Layout\Reader\Block;
use Dev\Banner\Api\BannerRepositoryInterface;

class BannerRepository implements BannerRepositoryInterface
{
    protected $bannerFactory;
    protected $bannerResource;

    public function __construct(
        BannerFactory $bannerFactory,
        \Dev\Banner\Model\ResourceModel\Banner $bannerResource
    ) {
        $this->bannerFactory = $bannerFactory;
        $this->bannerResource = $bannerResource;
    }

    public function getById($id){
        $bannerModel = $this->bannerFactory->create();
        $this->bannerResource->load($bannerModel,$id);
        if (!$bannerModel->getBannerId()) {
            //echo "Không tồn tại bản ghi chứa banner_id = ".$id;
           throw new NoSuchEntityException(__('Unable to find custom data with ID "%1"', $id));
        }
        return $bannerModel;
    }
    
    public function save(\Dev\Banner\Api\Data\BannerInterface $banner){
        $this->bannerResource->save($banner);
        return $banner;
    }

    // public function delete(BannerInterface $banner){
    //     $this->bannerResource->delete($banner);
    //     return $banner;
    // }
}
    
    
