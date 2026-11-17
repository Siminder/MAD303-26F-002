<?php

namespace Tests\Unit;

use App\Lib\Helper;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
/**
 * Class HelperTest
 * @package Tests\Unit
 */
class HelperTest extends TestCase {

	private $reflection;

	public function setUp() : void {
		$this->reflection = new ReflectionClass(Helper::class);
	}

	public function testGet() {
		$this->assertTrue(
			$this->reflection->hasMethod('get')
		);
	}

	public function testSet() {
		$this->assertTrue(
			$this->reflection->hasMethod('set')
		);
	}

}