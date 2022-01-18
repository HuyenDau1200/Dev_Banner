<?php

namespace Dev\Banner\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Dev_Banner::massdelete';

    protected $_filter;
    protected $_collectionFactory;
    protected $_bannerRepository;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Ui\Component\MassAction\Filter $filter,
        \Dev\Banner\Model\ResourceModel\Banner\CollectionFactory $collectionFactory,
        \Dev\Banner\Model\BannerRepository $bannerRepository
    ) {
        parent::__construct($context);
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        $this->_bannerRepository = $bannerRepository;
    }

    public function execute()
    {
        #Cach 1: Dung Collection de lay ds banner duoc chon -> duyet tung phan tu trong ds -> xoa 
            try{
                $bannerCollection = $this->_filter->getCollection($this->_collectionFactory->create());
                $collectionSize=$bannerCollection->getSize();
               foreach($bannerCollection as $banner){
                    $banner->delete();
               }
               $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));
            }
           catch(\Magento\Framework\Exception\NotFoundException $e){
                $this->messageManager->addErrorMessage($e->getMessage());
           }
           $resultRedirect=$this->resultRedirectFactory->create();
           return $resultRedirect->setPath('banner/index/index');

        #Cach 2: lay ds id cua banner selected bang cach getRequest Param -> duyet mang ds id -> dung bannerRepository de lay thong tin banner theo id -> delete banner.
        // $deleteIds = $this->getRequest()->getParam('selected');//$deletedId=$this->getRequest->getParams() //dd($deletedId); 
        // if (!is_array($deleteIds) || empty($deleteIds)) {
        //     $this->messageManager->addErrorMessage(__("Please select item(s)!"));
        // } else {
        //     try {
        //         $itemIds=0;
        //         foreach ($deleteIds as $itemId) {
        //             $banner = $this->_bannerRepository->getById($itemId); //dd($banner->getData())
        //             $banner->delete();
        //             $itemIds++;
        //         }
        //         $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.',$itemIds));
        //     } catch (\Exception $e) {
        //         $this->messageManager->addErrorMessage($e->getMessage());
        //     }
        // }
        // /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        // $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        // return $resultRedirect->setPath('*/*/');
    }
}
