<?php

use PHPUnit\Framework\TestCase;

class MaximumSubarrayTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $expected ): void {
		$solverClass = new SV\MaximumSubarray();
		$res         = $solverClass->solve( $nums );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ [ -2, 1, -3, 4, -1, 2, 1, -5, 4 ], 6 ],
				 [ [ 1 ], 1 ],
				 [ [ 3 ], 3 ],
				 [ [ 3, 2 ], 5 ],
				 [ [ -5, -4, -3, -4, 0, -5, -6, -8 ], 0 ],
				 [ [ 5, 4, -1, 7, 8 ], 23 ], ];
	}
}
