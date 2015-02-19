<?php
/**
  * @category  KutybaIt
  * @package   KutybaIt_PhpConsole
  * @author    Mateusz Kutyba <mateusz.kutyba@gmail.com>
  * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
  */
require_once('lib/PhpConsole/__autoload.php');

class Lotari_PhpConsole_Model_Phpconsole
{
    protected $_enabled = false;
    protected $_handler = null;
    protected $_key;

    protected function isEnabled()
    {
        $this->_enabled = Mage::getStoreConfig('dev/debug/phpconsole') && Mage::helper('core')->isDevAllowed();
        return $this->_enabled;
    }

    public function _init()
    {
        if (is_null($this->_handler)) {
            $this->_key = Mage::getStoreConfig('general/store_information/name');

            $this->_handler = PhpConsole\Handler::getInstance();
            $this->_handler->start();
            $this->_handler->getConnector()->setSourcesBasePath($_SERVER['DOCUMENT_ROOT']); // so files paths on client will be shorter (optional)

            $this->_handler->getConnector()->getDebugDispatcher()->setDumper(
                new PhpConsole\Dumper(20, 1000, 1000) // set levelLimit, itemsCountLimit, itemSizeLimit
            );
        }
    }

    public function log($value, $trace)
    {
        if ($this->isEnabled()) {
            $this->_init();
            $this->_handler->getConnector()->getDebugDispatcher()->detectTraceAndSource = (bool) $trace;
            $this->_handler->debug($value, $this->_key);
        }
    }
}
