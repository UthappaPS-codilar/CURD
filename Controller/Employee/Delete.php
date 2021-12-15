<?php
    namespace Codilar\Employee\Controller\Employee;

    use Magento\Framework\App\Action\Action;
    use Magento\Framework\App\Action\Context;
    use Magento\Framework\App\ResponseInterface;
    use Magento\Framework\View\Result\PageFactory;
//    use Codilar\Employee\Model\ResourceModel\Employee\CollectionFactory;
    use Magento\Framework\View\Element\Template;
    use Codilar\Employee\Model\EmployeeFactory;



    class Delete extends Action
    {
        /**
         * @var PageFactory
         */
        protected $collectionFactory;
        protected $pageFactory;

        public function __construct(
            Context $context,
            PageFactory $pageFactory,
            EmployeeFactory $model

        )
        {
            parent::__construct($context);
            $this->pageFactory = $pageFactory;
            $this->model = $model;

        }

        /**
         * Execute action based on request and return result
         *
         * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
         * @throws \Magento\Framework\Exception\NotFoundException
         */
        public function execute()
        {
            $data = $this->getRequest()->getParams('ID');
            $id=$data['ID'];
            $model = $this->model->create();
            $model->load($id);
            $model->delete();
            $this->messageManager->addSuccessMessage(__('Brand %1 saved successfully', $model->getName()));
            return $this->resultRedirectFactory->create()->setPath('employee/employee/view');
        }
    }
