<?php

use PHPUnit\Framework\TestCase;

class AllDuplicatesInArrayTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $expected ): void {
		$solverClass = new SV\AllDuplicatesInArray();
		$res         = $solverClass->solve( $nums );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ [ 4, 3, 2, 7, 8, 2, 3, 1 ], [ 2, 3 ] ],
				 [ [ 1, 1, 2 ], [ 1 ] ],
				 [ [ 1 ], [] ], ];
	}
}
