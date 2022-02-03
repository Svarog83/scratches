<?php
/**
 * User: LNV
 * Date: 03.02.2022
 * Time: 13:19
 */

use PHPUnit\Framework\TestCase;

class SingleNumberTest extends TestCase {

	/**
	 * @dataProvider additionProvider
	 */
	public function testSingleNumberRes($nums, $expected): void {
		$single = new SingleNumber();
		$res = $single->singleNumberRes($nums);

		$this->assertEquals($expected, $res);
 	}

	public function additionProvider(): array {
		return [
			[[2,2,1], 1],
			[[4,1,2,1,2], 4],
			[[1], 1],
			[[1, 2, 2, 1, 3, 3, 4], 4],
			[[5, 2, 2, 1, 3, 3, 1, 5, 6, 6, 7], 7],
		];
	}
}
