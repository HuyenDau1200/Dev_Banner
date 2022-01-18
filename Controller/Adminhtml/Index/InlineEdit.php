<?php

namespace Dev\Banner\Controller\Adminhtml\Index;

use Dev\Banner\Model\Banner;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Dev\Banner\Api\BannerRepositoryInterface as BannerRepository;
use Dev\Banner\Model\BannerFactory;

class InlineEdit extends \Magento\Backend\App\Action
{

    protected $bannerRepository;
    protected $jsonFactory;
    protected $bannerFactory;

    public function __construct(
        Context          $context,
        BannerRepository $bannerRepository,
        JsonFactory      $jsonFactory,
        BannerFactory $bannerFactory
    ) {
        parent::__construct($context);
        $this->bannerRepository = $bannerRepository;
        $this->jsonFactory = $jsonFactory;
        $this->bannerFactory=$bannerFactory;
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {

        #Using Model
        // Khoi tao kieu dl tra ve
        $resultJson = $this->jsonFactory->create();
        $error = false;//bien kiem tra trang thai loi
        $messages = [];// bien luu t.bao
        if ($this->getRequest()->getParam('isAjax')) { //lay dl nguoi dung post len qua ajax
            $bannerItems = $this->getRequest()->getParam('items', []);
                // dung vong lap de lay ra key trong arrays va upload vao database
                foreach (array_keys($bannerItems) as $bannerId) {
                    try {
                        // load your model to update the data
                        $banner = $this->bannerFactory->create();
                        $banner->load($bannerId);
                        $banner->setData($bannerItems[(string)$bannerId]);
                        $banner->save();
                        $message[]=__("You have successfully saved your edits.");
                    } catch (\Exception $e) {
                        $messages[] = "[Error:] {$e->getMessage()}";
                        $error = true;
                    }
                }
        }
        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);


        #Using Repository
        // $resultJson = $this->jsonFactory->create();
        // $error = false;
        // $messages = [];

        // if ($this->getRequest()->getParam('isAjax')) {
        //     $bannerItems = $this->getRequest()->getParam('items', []);
        //     if (!count($bannerItems)) {
        //         $messages[] = __('Please correct the data sent.');
        //         $error = true;
        //     } else {
        //         foreach (array_keys($bannerItems) as $bannerId) {
        //             $banner = $this->bannerRepository->getById($bannerId);
        //             try {
        //                 $banner->setData($bannerItems[(string)$bannerId]);
        //                 $this->bannerRepository->save($banner);
        //             } catch (\Exception $e) {
        //                 $messages[] = $message[] = "[Error:] {$e->getMessage()}";
        //                 $error = true;
        //             }
        //         }
        //     }
        // }
        // return $resultJson->setData([
        //     'messages' => $messages,
        //     'error' => $error
        // ]);
    }
}
