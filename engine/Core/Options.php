<?php
/**
 *  Options
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
abstract class Options extends Core_ArrayObject{
    /**
     * Options
     * 
     * @var array 
     */
    protected $options;
    /**
     * Constructor
     *
     * @param array|ArrayObject $options
     * @param string $storage
     */
    public function  __construct($options) {
        $this->options = new Core_ArrayObject();
        $this->set($options);
    }
    /**
     * Set options
     * 
     * @param array|ArrayObject $name
     * @param string $value
     */
    public function set($name,$value = NULL){
        if(is_array($name) OR $name instanceof ArrayObject){
            is_array($name) && $name = new Core_ArrayObject($name);
            foreach($name as $key=>$value){
                $this->options->$key = $value;
            }
            return;
        }
        $this->options->$name = $value;
    }
    
    /**
     * Magic __get method
     * 
     * @param string $name
     * @return mixed
     */
    public function __get($name){
        return isset($this->$name) ? $this->$name : parent::__get($name);
    }
}