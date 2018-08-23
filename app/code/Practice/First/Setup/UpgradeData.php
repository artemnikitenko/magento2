<?php

namespace Practice\First\Setup;

use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;

class UpgradeData implements UpgradeDataInterface
{
    protected $customerSetupFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory, EavSetupFactory $eavSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context){

        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.2') < 0) {
            $this->_addSimpleAttribute();
        }

        if (version_compare($context->getVersion(), '1.0.3') < 0) {
            $this->_addCustomProductAttribute($setup);
        }

        $setup->endSetup();
    }

    private function _addSimpleAttribute()
    {
        $customerSetup = $this->customerSetupFactory->create();
        $customerSetup->addAttribute(Customer::ENTITY,
            'sample_attribute', [
                'type'         => 'varchar',
                'label'        => 'Sample Attribute',
                'input'        => 'text',
                'required'     => false,
                'visible'      => true,
                'user_defined' => true,
                'position'     => 999,
                'system'       => 0,
            ]
        );
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'sample_attribute');
        $attribute->setData(
            'used_in_forms',
            ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']
        );
        $attribute->save();
    }

    private function _addCustomProductAttribute(ModuleDataSetupInterface $setup)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'sample_attribute',
            [
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Sample Atrribute',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );
    }
}
