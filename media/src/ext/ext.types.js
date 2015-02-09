<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Tool
 * @subpackage Framework
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: Basic.php 24593 2012-01-05 20:35:02Z matthew $
 */

/**
 * @see Zend_Tool_Framework_Metadata_Interface
 */
require_once 'Zend/Tool/Framework/Metadata/Interface.php';

/**
 * @see Zend_Tool_Framework_Metadata_Attributable
 */
require_once 'Zend/Tool/Framework/Metadata/Attributable.php';

/**
 * @category   Zend
 * @package    Zend_Tool
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Tool_Framework_Metadata_Basic
    implements Zend_Tool_Framework_Metadata_Interface, Zend_Tool_Framework_Metadata_Attributable
{

    /**#@+
     * Search constants
     */
    const ATTRIBUTES_ALL        = 'attributesAll';
    const ATTRIBUTES_NO_PARENT  = 'attributesParent';
    /**#@-*/

    /**#@+
     * @var string
     */
    protected $_type        = 'Basic';
    protected $_name        = null;
    protected $_value       = null;
    /**#@-*/

    /**
     * @var mixed
     */
    protected $_reference   = null;

    /**
