<?php

use PHPUnit\Framework\TestCase;

class RotateArrayTest extends TestCase {

	/**
	 * @dataProvider additionProvider
	 */
	public function testRotate($nums, $k, $expected): void {
		$rotate = new RotateArray();

		$rotate->rotate($nums, $k);

		$this->assertEquals($expected, $nums, 'Wrong array');

	}

	public function testRotate2(): void {
		$rotate = new RotateArray();

		$nums = [1,2,3];
		$this->expectException(Exception::class);
		$rotate->rotate($nums, -1);
	}

	public function additionProvider(): array {
		return [
			[[1, 2, 3, 4, 5, 6, 7], 1, [7, 1, 2, 3, 4, 5, 6]],
			[[1, 2, 3, 4, 5, 6, 7], 2, [6, 7, 1, 2, 3, 4, 5]],
			[[1, 2, 3, 4, 5, 6, 7], 3, [5, 6, 7, 1, 2, 3, 4]],
			[[-1], 2, [-1]],
			[[1, 2], 3, [2, 1]],
			[[1, 2], 5, [2, 1]],
			[[1, 2], 4, [1, 2]],
			[[-1,-100,3,99], 2, [3,99,-1,-100]],
		];
	}
}
