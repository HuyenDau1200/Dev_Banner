<?php

namespace Dev\Banner\Model\ResourceModel;

use Magento\Framework\DataObject;
use Magento\Framework\Model\AbstractModel;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    // public function __construct(
    //     \Magento\Framework\Model\ResourceModel\Db\Context $context
    // )
    // {
    //     parent::__construct($context);
    // }

    protected function _construct()
    {
        $this->_init('banner', 'banner_id');
    }

    public function _afterSave(AbstractModel $object)
    {
        $image=$object->getData('image');
        if($image != null){
            //class ảo kế thừa từ class ImageUpload trong module magento_catalog
            $imageUploader=\Magento\Framework\App\ObjectManager::getInstance()->get('Dev\Banner\BannerImageUpload');
            $imageUploader->moveFileFromTmp($image);
        }
        return $this;
    }
}
