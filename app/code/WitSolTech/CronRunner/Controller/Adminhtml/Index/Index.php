<?php

namespace WitSolTech\CronRunner\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Cron\Model\ResourceModel\Schedule\CollectionFactory as ScheduleCollectionFactory;
use Magento\Cron\Model\Schedule;
use Magento\Framework\Controller\ResultFactory;
class Index extends Action
{
    protected $resultPageFactory;

    protected $scheduleCollectionFactory;
    protected $resultFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        ScheduleCollectionFactory $scheduleCollectionFactory,
        ResultFactory $resultFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->scheduleCollectionFactory = $scheduleCollectionFactory;
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        try {
            // Run all cron jobs
            $this->_objectManager->get(\Magento\Cron\Observer\ProcessCronQueueObserver::class)->execute(new \Magento\Framework\Event\Observer());
            $this->messageManager->addSuccessMessage(__('All cron jobs have been executed.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('An error occurred while running cron jobs: %1', $e->getMessage()));
        }
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Cron Runner'));
        return $resultPage;
    }
}
