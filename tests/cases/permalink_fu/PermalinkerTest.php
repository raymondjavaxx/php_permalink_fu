<?php

require_once 'permalink_fu/Permalinker.php';

use permalink_fu\Permalinker;

class PermalinkerTest extends \PHPUnit_Framework_TestCase {

	protected $_samples = array(
		'This IS a Tripped out title!!.!1 (well/ not really)' => 'this-is-a-tripped-out-title1-well-not-really',
		'////// meph1sto r0x ! \\\\\\' => 'meph1sto-r0x',
		'āčēģīķļņū' => 'acegiklnu',
		'中文測試 chinese text' => 'chinese-text',
		'fööbär' => 'foobar',
		'-' => '',
		'-El Portón Azul-' => 'el-porton-azul'
	);

	public function testEscape() {
		foreach ($this->_samples as $from => $expected) {
			$result = Permalinker::escape($from);
			$this->assertEquals($expected, $result);
		}
	}
}
