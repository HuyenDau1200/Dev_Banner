<?php
namespace Dev\Banner\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Dev\Banner\Model\BannerFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends \Magento\Backend\App\Action
{
    private $resultRedirect;
    private $bannerFactory;

    public function __construct(
        Action\Context  $context,
        BannerFactory   $bannerFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->bannerFactory = $bannerFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['banner_id']) ? $data['banner_id'] : null;
        $newData = [
            'name' => $data['name'],
            'status' => $data['status'],
        ];
        if(!$data['images']){
            $data['image']= null;

        }else{
            $newData['image'] = $data['images'][0]['name'];
        }
        $banners = $this->bannerFactory->create();
        if ($id) {
            $banners->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit success'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save success.'));
        }
        try {
            $banners->addData($newData);
            $banners->save();
            return $this->resultRedirect->create()->setPath('banner/index/index');
        } catch (\Exception $e) {
            dd($e);
           return $this->getMessageManager()->addErrorMessage(__('Save fail.'));
        }
    }
}
