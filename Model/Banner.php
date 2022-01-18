<?php

namespace Dev\Banner\Model;

use Dev\Banner\Api\Data\BannerInterface;

class Banner extends \Magento\Framework\Model\AbstractModel implements BannerInterface
{ 
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    const BANNER_ID = 'banner_id';
    const NAME = 'name';
    const IMAGE = 'image';
    const STATUS = 'status';
    const SHORT_DESCRIPTION = 'short_description';
    /**
     * Undocumented function
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Dev\Banner\Model\ResourceModel\Banner');
    }

    public function getBannerId(){
        return $this->getData(self::BANNER_ID);
    }

    function getName(){
        return $this->getData(self::NAME);
    }

    function getImage(){
        return $this->getData(self::IMAGE);
    }

    function getStatus(){
        return $this->getData(self::STATUS);
    }

    function getShortDescription(){
        return $this->getData(self::SHORT_DESCRIPTION);
    }

    public function setBannerId($bannerId){
        $this->setData(self::BANNER_ID,$bannerId);
        return $this;
    }

    function setStatus($status)
    {
        $this->setData(self::STATUS,$status);
        return $this;
    }
}
