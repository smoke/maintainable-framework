<?php
/**
 * @category   Mad
 * @package    Mad_Controller
 * @subpackage Validation
 * @copyright  (c) 2007-2009 Maintainable Software, LLC
 * @license    http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Validation rule for attributes of models before save/insert/update
 *
 * @category   Mad
 * @package    Mad_Controller
 * @subpackage Validation
 * @copyright  (c) 2007-2009 Maintainable Software, LLC
 * @license    http://opensource.org/licenses/bsd-license.php BSD
 */
abstract class Mad_Model_Validation_Base
{
    /**
     * The model attributes to validate
     * @var array
     */
    protected $_attribute;

    /**
     * The options for the validation rule
     * @var array
     */
    protected $_options;

    /**
     * The model we are performing the validation on
     * @param object
     */
    protected $_model;

    /*##########################################################################
    # Construct/Destruct
    ##########################################################################*/

    /**
     * Construct validation object
     */
    abstract public function __construct($attributes, $options);

    /**
     * Construct association object - simple factory
     * @param   string  $macro (format|length|numericality|presence|uniqueness)
     * @param   string  $attributes
     * @param   array   $options
     * @return  Mad_Model_Validation_Base concrete validation object for this attribute
     */
    public static function factory($macro, $attribute, $options)
    {
        $className = "Mad_Model_Validation_".Mad_Support_Inflector::camelize($macro);
        return new $className($attribute, $options);
    }


    /*##########################################################################
    # Validation Methods
    ##########################################################################*/
    
    /**
     * Perform validation on the given attribute fields
     *
     * @param   string  $on     save|create|update
     * @param   array   $model
     * @return  array   An array of error messages
     */
    public function validate($on, Mad_Model_Base $model)
    {
        if ($this->_options['on'] == $on) {
            $this->_model = $model;
            $msg = $this->_validate($this->_attribute, $this->_model->{$this->_attribute});
            $this->_model = null;
            return $msg;
        }
        
        return null;
    }

    /**
     * Get the attribute that this validation rule affects
     */
    public function getAttribute()
    {
        return $this->_attribute;
    }

    /**
     * Get the "on" option that this validation rule affects
     */
    public function getOptionOn()
    {
        return $this->_options['on'];
    }
    
    /*##########################################################################
    # Abstract Methods
    ##########################################################################*/

    /**
     * Validation implemented by concrete subclass
     * @param   string  $column
     * @param   string  $value
     */
    abstract protected function _validate($column, $value);
}
