<?php

use PHPUnit\Framework\TestCase;

class BestTimeBuySellStockTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $expected ): void {
		$solverClass = new SV\BestTimeBuySellStock();
		$res         = $solverClass->solve( $nums );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ [ 7, 1, 5, 3, 6, 4 ], 5 ],
				 [ [ 7, 6, 4, 3, 1 ], 0 ],
				 [ [ 1, 5, 3, 2 ], 4 ], ];
	}
}
