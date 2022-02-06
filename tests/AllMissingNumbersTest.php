<?php


use PHPUnit\Framework\TestCase;

class AllMissingNumbersTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $expected ): void {
		$missingNumber = new SV\AllMissingNumbers();
		$res           = $missingNumber->solve( $nums );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ [ 4, 3, 2, 7, 8, 2, 3, 1 ], [ 5, 6 ] ],
				 [ [ 1, 1 ], [ 2 ] ], ];
	}
}
