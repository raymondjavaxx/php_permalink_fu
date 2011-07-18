<?php
error_reporting(E_ALL | E_STRICT);

set_include_path(implode(PATH_SEPARATOR, array(
	dirname(dirname(__DIR__)) . '/libraries',
	get_include_path()
)));
