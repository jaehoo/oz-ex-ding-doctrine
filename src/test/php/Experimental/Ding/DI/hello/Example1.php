<?php

require_once "../../../../../../include.php";

/**
 * Example using ding. See also beans.xml.
 *
 * PHP Version 5
 *
 * @category   Ding
 * @package    Examples
 * @subpackage Basic
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @link       http://marcelog.github.com/
 *
 * Copyright 2011 Marcelo Gornstein <marcelog@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */
//ini_set(
//    'include_path',
//    implode(
//        PATH_SEPARATOR,
//        array(
//            implode(DIRECTORY_SEPARATOR, array('..', '..', '..', 'src', 'test','Experimental','DI')),
//            ini_get('include_path'),
//        )
//    )
//);

/**
 * This is our bean.
 */
class MyBean
{
    private $_someProperty;

    public function setSomeProperty($value)
    {
        $this->_someProperty = $value;
    }

    public function getSomeProperty()
    {
        return $this->_someProperty;
    }
    public function __construct()
    {

    }
}
//require_once ROOT_DIR.'vendor/Ding/Autoloader/Autoloader.php'; // Include ding autoloader.
//\Ding\Autoloader\Autoloader::register(); // Call autoloader register for ding autoloader.
use \Ding\Container\Impl\ContainerImpl;


// Here you configure the container, its subcomponents, drivers, etc.
$properties = array(
    'ding' => array(
        'log4php.properties' => 'log4php.xml',
        'factory' => array(
            'bdef' => array( // Both of these drivers are optional. They are both included just for the thrill of it.
                'xml' => array('filename' => 'beans.xml'),
                'annotation' => array('scanDir' => array(realpath(__DIR__)))
            ),
            // These properties will be used by the container when instantiating the beans, see beans.xml
            'properties' => array(
                'user.name' => 'nobody',
                'user.namex' => 'nobody',
            )
        )
//    ,
//        // You can configure the cache for the bean definition, the beans, and the proxy definitions.
//        // Other available implementations: zend, file, dummy, and memcached.
//        'cache' => array(
//            'proxy' => array('impl' => 'apc'),
//            'bdef' => array('impl' => 'apc'),
//            'beans' => array('impl' => 'apc')
//        )
    )
);


$container = ContainerImpl::getInstance($properties);
$bean = $container->getBean('myBeanName');
var_dump($bean->getSomeProperty());

//use Experimental\DI\TestBean;

//$algo=\Experimental\DI\TestBean;

$bean2=  cast($container->getBean('testBean'));
//$bean2=  $container->getBean('testBean');
$bean2->getName();

var_dump($bean2->getName());


function cast(\Experimental\DI\TestBean  $obj){
    return $obj;
}


