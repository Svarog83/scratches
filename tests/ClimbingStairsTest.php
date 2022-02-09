<?php

use PHPUnit\Framework\TestCase;

class ClimbingStairsTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $n, $expected ): void {
		$solverClass = new SV\ClimbingStairs();
		$res         = $solverClass->solve( $n );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ 1, 1 ],
				 [ 2, 2 ],
				 [ 3, 3 ],
				 [ 4, 5 ],
				 [ 5, 8 ], ];
	}
}
