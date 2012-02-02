<?= "<?php\n" ?>

class <?= $this->className ?> extends Mad_Model_Base
{
    // relationships and validation
    protected function _initialize()
    {
    }
    /**#@+
     * Defining the methods here to overcome the late static binding problem of PHP < 5.3
     */
    public static function className()
    {
        return __CLASS__;
    }
    public static function find($type, $options=array(), $bindVars=null)
    {
        return parent::find($type, $options, $bindVars);
    }
    public static function first($options=array(), $bindVars=null)
    {
        return parent::first($options, $bindVars);
    }
    public static function count($options=array(), $bindVars=null)
    {
        return parent::count($options, $bindVars);
    }
    public static function findBySql($type, $sql, $bindVars=null)
    {
        return parent::findBySql($type, $sql, $bindVars);
    }
    public static function countBySql($sql, $bindVars=null)
    {
        return parent::countBySql($sql, $bindVars);
    }
    public static function paginate($options=array(), $bindVars=null)
    {
        return parent::paginate($options, $bindVars);
    }
    public static function exists($id)
    {
        return parent::exists($id);
    }
    public static function create($attributes)
    {
        return parent::create($attributes);
    }
    public static function update($id, $attributes=null)
    {
        return parent::update($id, $attributes);
    }
    public static function updateAll($set, $conditions=null, $bindVars=null)
    {
        return parent::updateAll($set, $conditions, $bindVars);
    }
    public static function delete($id)
    {
        return parent::delete($id);
    }
    public static function deleteAll($conditions=null, $bindVars=null)
    {
        return parent::deleteAll($conditions, $bindVars);
    }
    /**#@-*/
}
