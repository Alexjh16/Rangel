<?php

require_once('core/core.php');
$class=isset($_REQUEST['class']) ? $_REQUEST['class'] : 'Index';
$view=isset($_REQUEST['view']) ? $_REQUEST['view'] : 'index';

require_once('controllers/'.$class.'Controller.php');
$class=$class.'Controller';
$objeto= new $class();
$objeto->$view();



?>