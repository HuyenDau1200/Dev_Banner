<?php
namespace Dev\Banner\Setup\Patch\Schema;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\ModuleDataSetUpInterface;

class addColumn implements SchemaPatchInterface
{
    private $moduleDataSetup;
    public function __construct(ModuleDataSetUpInterface $moduleDataSetup)
    {
        $this->moduleDataSetup=$moduleDataSetup;
    }

    public static function getDependencies()
   {
       return [];
   }


   public function getAliases()
   {
       return [];
   }


   public function apply()
   {
       $this->moduleDataSetup->startSetup();

       $this->moduleDataSetup->getConnection()->addColumn(
           $this->moduleDataSetup->getTable('banner'),
           'short_description',
           [
               'type' => Table::TYPE_TEXT,
               'length' => 64,
               'nullable' => true,
               'comment'  => 'Short Description',
           ]
       );
       
       $this->moduleDataSetup->endSetup();
   }
}
