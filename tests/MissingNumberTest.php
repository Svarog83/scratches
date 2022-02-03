<?php


use PHPUnit\Framework\TestCase;

class MissingNumberTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $nums, $expected ): void {
		$missingNumber = new SV\MissingNumber();
		$res           = $missingNumber->solve( $nums );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		return [ [ [ 3, 0, 1 ], 2 ],
				 [ [ 0, 1 ], 2 ],
				 [ [ 1 ], 0 ],
				 [ [ 1, 2 ], 0 ],
				 [ [ 2, 1 ], 0 ],
				 [ [ 3, 1, 4, 6, 5, 0 ], 2 ],
				 [ [ 9, 6, 4, 2, 3, 5, 7, 0, 1 ], 8 ], ];
	}
}
