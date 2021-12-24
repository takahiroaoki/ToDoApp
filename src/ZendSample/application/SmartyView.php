<?php

require_once APPLICATION_PATH . '/../library/Smarty/Smarty.class.php';

class SmartyView implements Zend_View_Interface
{
    protected $_view;

    public function __construct($params = array())
    {
        $this->_view = new Smarty();

        foreach ($params as $key => $value) {
            $this->_view->$key = $value;
        }
    }

    /**
     * Return the template engine object, if any
     *
     * If using a third-party template engine, such as Smarty, patTemplate,
     * phplib, etc, return the template engine object. Useful for calling
     * methods on these objects, such as for setting filters, modifiers, etc.
     *
     * @return mixed
     */
    public function getEngine()
    {
        return $this->_view;
    }

    /**
     * Set the path to find the view script used by render()
     *
     * @param string|array The directory (-ies) to set as the path. Note that
     * the concrete view implentation may not necessarily support multiple
     * directories.
     * @return void
     */
    public function setScriptPath($path)
    {
        return $this->setBasePath($path);
    }

    /**
     * Retrieve all view script paths
     *
     * @return array
     */
    public function getScriptPaths()
    {
        return $this->_view->getTemplateDir();
    }

    /**
     * Set a base path to all view resources
     *
     * @param  string $path
     * @param  string $classPrefix
     * @return void
     */
    public function setBasePath($path, $classPrefix = 'Zend_View')
    {
        $this->_view->setTemplateDir($path . '/templates/');
        $this->_view->setCompileDir($path . '/../cache/');
    }

    /**
     * Add an additional path to view resources
     *
     * @param  string $path
     * @param  string $classPrefix
     * @return void
     */
    public function addBasePath($path, $classPrefix = 'Zend_View')
    {
        return $this->setBasePath($path);
    }

    /**
     * Assign a variable to the view
     *
     * @param string $key The variable name.
     * @param mixed $val The variable value.
     * @return void
     */
    public function __set($key, $val)
    {
        $this->_view->assign($key, $value);
    }

    /**
     * Allows testing with empty() and isset() to work
     *
     * @param string $key
     * @return boolean
     */
    public function __isset($key)
    {
        return ($this->_view->get_template_vars($key) !== null);
    }

    /**
     * Allows unset() on object properties to work
     *
     * @param string $key
     * @return void
     */
    public function __unset($key)
    {
        $this->_view->clear_assign($key);
    }

    /**
     * Assign variables to the view script via differing strategies.
     *
     * Suggested implementation is to allow setting a specific key to the
     * specified value, OR passing an array of key => value pairs to set en
     * masse.
     *
     * @see __set()
     * @param string|array $spec The assignment strategy to use (key or array of key
     * => value pairs)
     * @param mixed $value (Optional) If assigning a named variable, use this
     * as the value.
     * @return void
     */
    public function assign($spec, $value = null)
    {
        if (is_array($spec)) {
            $this->_view->assign($spec);
        } else {
            $this->_view->assign($spec, $value);
        }
    }

    /**
     * Clear all assigned variables
     *
     * Clears all variables assigned to Zend_View either via {@link assign()} or
     * property overloading ({@link __get()}/{@link __set()}).
     *
     * @return void
     */
    public function clearVars()
    {
        $this->_view->clear_all_assign();
    }

    /**
     * Processes a view script and returns the output.
     *
     * @param string $name The script script name to process.
     * @return string The script output.
     */
    public function render($name)
    {
        return $this->_view->fetch($name);
    }
}