<?php

use PHPUnit\Framework\TestCase;

class PeakIndexInMountainArrayTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $expected ): void {
		$solverClass = new SV\PeakIndexInMountainArray();
		$res         = $solverClass->solve( $nums );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ [ 0, 1, 0 ], 1 ],
				 [ [ 0, 1, 3, 5, 4, 2, 1, 0 ], 3 ],
				 [ [ 0, 2, 1, 0 ], 1 ],
				 [ [ 0, 1, 2, 0 ], 2 ],
				 [ [ 0, 10, 5, 2 ], 1 ],

		];
	}
}
