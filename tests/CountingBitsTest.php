<?php

use PHPUnit\Framework\TestCase;

class CountingBitsTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $n, $expected ): void {
		$solverClass = new SV\CountingBits();
		$res         = $solverClass->solve( $n );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ 7, [ 0, 1, 1, 2, 1, 2, 2, 3 ] ],
				 [ 6, [ 0, 1, 1, 2, 1, 2, 2 ] ],
				 [ 5, [ 0, 1, 1, 2, 1, 2 ] ],
				 [ 2, [ 0, 1, 1 ] ],
				 [ 1, [ 0, 1 ] ],
				 [ 0, [ 0 ] ],

				 [ 8, [ 0, 1, 1, 2, 1, 2, 2, 3, 1 ] ], ];
	}
}
