<?php

namespace Practice\Dev\Setup;

use Magento\Eav\Setup\EavSetupFactory;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Customer\Setup\CustomerSetupFactory;

use \Practice\Dev\Model\Product\Type\DailyDeal;

class UpgradeData implements UpgradeDataInterface
{
    protected $customerSetupFactory;
    protected $eavSetupFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory, EavSetupFactory $eavSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.3') < 0) {
            $this->_addCustomProductType($setup);
        }

        if (version_compare($context->getVersion(), '1.0.4') < 0) {
            $this->_addCustomProductAttribute($setup);
        }

        $setup->endSetup();
    }

    private function _addCustomProductType(ModuleDataSetupInterface $setup)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $type = DailyDeal::TYPE_DAILY_DEAL;
        $fieldList = [
            'price',
            'special_price',
            'special_from_date',
            'special_to_date',
            'minimal_price',
            'cost',
            'tier_price',
            'weight',
        ];
        foreach ($fieldList as $field) {
            $applyTo = explode(
                ',',
                $eavSetup->getAttribute(\Magento\Catalog\Model\Product::ENTITY,
                    $field, 'apply_to')
            );
            if (!in_array($type, $applyTo)) {
                $applyTo[] = $type;
                $eavSetup->updateAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    $field,
                    'apply_to',
                    implode(',', $applyTo)
                );
            }
        }
    }

    private function _addCustomProductAttribute(ModuleDataSetupInterface $setup)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'features', [
            'type' => 'text',
            'label' => 'Features',
            'input' => 'textarea',
            'required' => false,
            'sort_order' => 100,
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
            'wysiwyg_enabled' => true,
            'is_html_allowed_on_front' => true,
        ]);
    }
}