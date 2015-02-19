<?php
/**
  * @category  KutybaIt
  * @package   KutybaIt_PhpConsole
  * @author    Mateusz Kutyba <mateusz.kutyba@gmail.com>
  * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
  */
class KutybaIt_PhpConsole_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function log($value, $trace = false)
    {
        $this->getPhpConsole()->log($value, $trace);
        return $this;
    }

    public function debug($value, $trace = false)
    {
        if ($value instanceof Varien_Object) {
            $value = $value->debug();
        }

        $this->log($value, $trace);
        return $this;
    }
    
    public function getPhpConsole()
    {
        return Mage::getSingleton('phpconsole/phpconsole');
    }
}
