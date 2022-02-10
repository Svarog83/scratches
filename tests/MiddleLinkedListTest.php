<?php

namespace SV;

use PHPUnit\Framework\TestCase;

class MiddleLinkedListTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $head, $expected ): void {
		$solverClass = new MiddleLinkedList();
		$res         = $solverClass->solve( $head );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		$ln5 = new ListNode( 5 );
		$ln4 = new ListNode( 4, $ln5 );
		$ln3 = new ListNode( 3, $ln4 );
		$ln2 = new ListNode( 2, $ln3 );
		$ln1 = new ListNode( 1, $ln2 );

		$sln6 = new ListNode( 6 );
		$sln5 = new ListNode( 5, $sln6 );
		$sln4 = new ListNode( 4, $sln5 );
		$sln3 = new ListNode( 3, $sln4 );
		$sln2 = new ListNode( 2, $sln3 );
		$sln1 = new ListNode( 1, $sln2 );

		return [ [ $ln1, $ln3 ], [ $sln1, $sln4 ] ];
	}
}
