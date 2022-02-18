<?php

use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $target, $expected ): void {
		$solverClass = new SV\BinarySearch();
		$res         = $solverClass->solve( $nums, $target );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ [ -1, 0, 2, 3, 5, 9, 12 ], 9, 5 ],
				 [ [ -1, 0, 2, 3, 5, 9, -1, 0, 2, 3, 5, 9, -1, 0, 2, 3, 5, 9, 12 ], 12, 18 ],
				 [ [ -1, 0, 2, 3, 5, 9, 12 ], 12, 6 ],
				 [ [ -1, 0, 3, 5, 9, 12 ], 2, -1 ],
				 [ [ -1, 0, 2, 3, 5, 9, 12 ], 2, 2 ],
				 [ [ -1, 0, 2, 3, 5, 9, 12 ], -1, 0 ],

		];
	}
}
