<?php
/**
 * User: LNV
 * Date: 03.02.2022
 * Time: 13:46
 */

use PHPUnit\Framework\TestCase;

class ContainsDuplicateTest extends TestCase {

	/**
	 * @dataProvider additionProvider
	 */
	public function testSingleNumberRes($nums, $expected): void {
		$single = new SV\ContainsDuplicate();
		$res = $single->solve($nums);

		$this->assertEquals($expected, $res);
	}

	public function additionProvider(): array {
		return [
			[[2,2,1], true],
			[[4,1,2,1,2], true],
			[[1], false],
			[[1, 2, 2, 1, 3, 3, 4], true],
			[[5, 2, 2, 1, 3, 3, 1, 5, 6, 6, 7], true],
			[[1,2,3,1], true],
			[[1,2,3,4], false],
			[[1,1,1,3,3,4,3,2,4,2], true],
		];
	}
}
