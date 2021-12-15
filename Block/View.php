<?php

    namespace Codilar\Employee\Block;

    use Magento\Framework\View\Element\Template;
    use Codilar\Employee\Model\Employee;

    use Codilar\Employee\Model\ResourceModel\Employee\CollectionFactory;

    class View extends Template
    {
        /**
         * @var CollectionFactory
         */
        protected $collectionFactory;
        protected $id;

        public function __construct(
            Template\Context  $context,
            CollectionFactory $collectionFactory,
            array             $data = []
        )
        {
            parent::__construct($context, $data);
            $this->collectionFactory = $collectionFactory;
        }

        /**
         * @return Employee[]
         */
        public function getAllEmployee()
        {
            $collection = $this->collectionFactory->create();
            $collection->addFieldToFilter('currently_working', ['eq' => 1]);
            return $collection->getItems();
        }
        public function getSelectedEmployee()
        {
            $data = $this->getRequest()->getParams('ID');
            $id=$data['ID'];
            $collection = $this->collectionFactory->create();
            $collection->addFieldToFilter('entity_id', ['eq' => $id]);
            return $collection->getItems();
        }

        public function getAddUrl()
        {
            return $this->getUrl('employee/employee/add');
        }

        public function getFormUrl()
        {
            return $this->getUrl('employee/employee/form');
        }

        public function getDeleteUrl()
        {
            return $this->getUrl('employee/employee/delete');
        }
        public function getUpdateUrl()
        {
            return $this->getUrl('employee/employee/update');
        }
        public function getUpdateDataUrl()
        {
            return $this->getUrl('employee/employee/updatedata');
        }
        public function getViewDataUrl()
        {
            return $this->getUrl('employee/employee/viewpersonal');
        }
    }
