<?php
/**
  * @category  KutybaIt
  * @package   KutybaIt_PhpConsole
  * @author    Mateusz Kutyba <mateusz.kutyba@gmail.com>
  * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
  */
class Lotari_PhpConsole_Model_Observer
{
    public function initPhpConsole()
    {
        Mage::getSingleton('phpconsole/phpconsole')->_init();
    }
}
