<?php
namespace Dev\Banner\Api;

use Dev\Banner\Api\Data\BannerInterface;
use Dev\Banner\Model\ResourceModel\Banner;

interface BannerRepositoryInterface
{
    public function getById($id);
    public function save(BannerInterface $banner);
    // public function delete(BannerInterface $banner);
    //public function deleteById($id);
    //public function getList(SearchCriteriaInterface $searchCriteria);

    //public function updateId($id);
}

