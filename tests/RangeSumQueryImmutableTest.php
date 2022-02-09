<?php

use PHPUnit\Framework\TestCase;

class RangeSumQueryImmutableTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $arrIndices, $expected ): void {
		$solverClass = new SV\RangeSumQueryImmutable( $nums );
		[ $left, $right ] = $arrIndices;
		$res = $solverClass->solve( $left, $right );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ [ 5, 6, 7, 8 ], [ 0, 3 ], 26 ],
				 [ [ 5, 6, 7, 8 ], [ 0, 2 ], 18 ],
				 [ [ 5, 6, 7, 8 ], [ 1, 2 ], 13 ],
				 [ [ 5, 6, 7, 8 ], [ 1, 3 ], 21 ],
				 [ [ -2, 0, 3, -5, 2, -1 ], [ 0, 2 ], 1 ],
				 [ [ -2, 0, 3, -5, 2, -1 ], [ 2, 5 ], -1 ],
				 [ [ -2, 0, 3, -5, 2, -1 ], [ 0, 5 ], -3 ] ];
	}
}
