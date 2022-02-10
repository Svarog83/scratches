<?php

namespace SV;

use PHPUnit\Framework\TestCase;

class PalindromeLinkedListTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $head, $expected ): void {
		$solverClass = new PalindromeLinkedList();
		$res         = $solverClass->solve( $head );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {
		$ln5 = new ListNode( 1 );
		$ln4 = new ListNode( 2, $ln5 );
		$ln3 = new ListNode( 3, $ln4 );
		$ln2 = new ListNode( 2, $ln3 );
		$ln1 = new ListNode( 1, $ln2 );

		$sln6 = new ListNode( 1 );
		$sln5 = new ListNode( 2, $sln6 );
		$sln4 = new ListNode( 3, $sln5 );
		$sln3 = new ListNode( 3, $sln4 );
		$sln2 = new ListNode( 2, $sln3 );
		$sln1 = new ListNode( 1, $sln2 );

		$tln2 = new ListNode( 2 );
		$tln1 = new ListNode( 1, $tln2 );

		$fln1 = new ListNode( 1 );

		return [ [ $ln1, TRUE ], [ $sln1, TRUE ], [ $tln1, FALSE ], [ $fln1, TRUE ] ];
	}
}
