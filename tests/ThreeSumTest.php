<?php

use PHPUnit\Framework\TestCase;

class ThreeSumTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve($nums, $expected): void {
		$threeSum = new SV\ThreeSum();
		$res      = $threeSum->solve($nums);

		$this->assertEquals($expected, $res);
	}

	public function additionProvider(): array {
		return [
			[[-1, 0, 1, 2, -1, -4], [[-1, -1, 2], [-1, 0, 1]]],
			[[], []],
			[[0], []],
		];
	}
}
