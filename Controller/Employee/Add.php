<?php

    namespace Codilar\Employee\Controller\Employee;

    use Magento\Framework\App\Action\Action;
    use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
    use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;
    use Magento\Framework\App\Action\Context;

    class Add extends Action
    {
        /**
         * @var ModelFactory
         */
        protected $modelFactory;

        /**
         * @var ResourceModel
         */
        protected $resourceModel;

        public function __construct(
            Context       $context,
            ModelFactory  $modelFactory,
            ResourceModel $resourceModel
        )
        {
            parent::__construct($context);
            $this->modelFactory = $modelFactory;
            $this->resourceModel = $resourceModel;
        }

        public function execute()
        {
//            die('here');
            $emptyEmployee = $this->modelFactory->create();
            $data = $this->getRequest()->getParams();
            $emptyEmployee->setFirstName($data['first_name'] ?? null);
            $emptyEmployee->setMiddleName($data['middle_name'] ?? null);
            $emptyEmployee->setLastName($data['last_name'] ?? null);
            $emptyEmployee->setDob($data['DOB'] ?? null);
            $emptyEmployee->setGuardian($data['guardian'] ?? null);
            $emptyEmployee->setGender($data['gender'] ?? null);
            $emptyEmployee->setMartialStatus($data['martial_status'] ?? null);
            $emptyEmployee->setIdentityMark($data['identity_mark'] ?? null);
            $emptyEmployee->setBloodGroup($data['blood_group'] ?? null);
            $emptyEmployee->setPermanentAddress($data['permanent_address'] ?? null);
            $emptyEmployee->setCurrentWorking($data['is_active'] ?? 0);
            $emptyEmployee->setCurrentDesignation($data['current_designation'] ?? null);
            $emptyEmployee->setCurrentOffice($data['current_office'] ?? null);
            $emptyEmployee->setCurrentAddress($data['current_address'] ?? null);

            $this->resourceModel->save($emptyEmployee);
            $this->messageManager->addSuccessMessage(__('Brand %1 saved successfully', $emptyEmployee->getName()));
//            die();
            return $this->resultRedirectFactory->create()->setPath('employee/employee/view');


        }
    }
