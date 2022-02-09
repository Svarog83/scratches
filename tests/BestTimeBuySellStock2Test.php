<?php

use PHPUnit\Framework\TestCase;

class BestTimeBuySellStock2Test extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $expected ): void {
		$solverClass = new SV\BestTimeBuySellStock2();
		$res         = $solverClass->solve( $nums );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ [ 7, 1, 5, 3, 6, 4 ], 7 ],
				 [ [ 7, 6, 4, 3, 1 ], 0 ],
				 [ [ 1, 2, 3, 4, 5 ], 4 ],
				 [ [ 1, 5, 3, 2, 5 ], 7 ], ];
	}
}
