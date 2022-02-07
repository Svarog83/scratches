<?php

use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $expected ): void {
		$solverClass = new SV\Fibonacci();
		$res         = $solverClass->fib( $nums );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ 2, 1 ],
				 [ 3, 2 ],
				 [ 4, 3 ],
				 [ 5, 5 ],
				 [ 6, 8 ], ];
	}
}
