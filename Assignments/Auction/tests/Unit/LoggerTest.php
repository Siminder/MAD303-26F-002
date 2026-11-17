<?php


use App\Models\Image;
use PHPUnit\Framework\TestCase;

/**
 * Class ImageTest
 * @package Tests\Unit
 */
class LoggerTest extends TestCase {

	public function testLoggerHasAllRequiredMethods(): void
	{
		$requiredMethods = [
			'emergency',
			'alert',
			'critical',
			'error',
			'warning',
			'notice',
			'info',
			'debug',
		];

		$reflection = new ReflectionClass(\App\Lib\Logger::class);

		foreach ($requiredMethods as $method) {
			$this->assertTrue(
				$reflection->hasMethod($method),
				"Logger is missing method: {$method}"
			);
		}
	}
}
