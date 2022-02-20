<?php

use PHPUnit\Framework\TestCase;

class SmallestLetterGreaterThanTargetTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $target, $expected ): void {
		$solverClass = new SV\SmallestLetterGreaterThanTarget();
		$res         = $solverClass->solve( $nums, $target );


		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ [ 'c', 'f', 'j' ], 'c', 'f' ],
				 [ [ 'c', 'f', 'j' ], 'b', 'c' ],
				 [ [ 'c', 'f', 'j' ], 'a', 'c' ],
				 [ [ 'a', 'b' ], 'z', 'a' ],


				 [ [ 'c', 'f', 'j' ], 'd', 'f' ], ];
	}
}
