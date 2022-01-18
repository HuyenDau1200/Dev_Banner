<?php
namespace Dev\Banner\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;
use Magento\TestFramework\CodingStandard\Tool\ExtensionInterface;

//Class contains contains the method get and set up the column in the table of them.
interface BannerInterface
{

    public function getBannerId();

    public  function getName();
    
    public function getImage();

    public function getStatus();

    public function getShortDescription();

    public function setBannerId($bannerId);

    public function setStatus($status);
}
