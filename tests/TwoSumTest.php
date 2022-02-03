<?php

use PHPUnit\Framework\TestCase;

class TwoSumTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve($nums, $target, $expected): void {
		$threeSum = new SV\TwoSum();
		$res      = $threeSum->solve($nums, $target);

		$this->assertEquals($expected, $res);
	}

	public function additionProvider(): array {
		return [
			[[2,7,11,15], 9, [0,1]],
			[[3,2,4], 6, [1,2]],
			[[3,3], 6, [0,1]],
		];
	}
}
