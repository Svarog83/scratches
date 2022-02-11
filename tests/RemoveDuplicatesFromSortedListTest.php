<?php

namespace SV;

use PHPUnit\Framework\TestCase;

class RemoveDuplicatesFromSortedListTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $head, $expected ): void {
		$solverClass = new RemoveDuplicatesFromSortedList();
		$res         = $solverClass->solve( $head );
		$compare     = [];
		if ( $res !== NULL ) {
			while ( $res ) {
				$compare[] = $res->val;
				$res       = $res->next;
			}
		}

		$this->assertEquals( $expected, $compare );
	}

	public function additionProvider(): array {
		$ln3 = new ListNode( 2 );
		$ln2 = new ListNode( 1, $ln3 );
		$ln1 = new ListNode( 1, $ln2 );

		$sln5 = new ListNode( 3, NULL );
		$sln4 = new ListNode( 3, $sln5 );
		$sln3 = new ListNode( 2, $sln4 );
		$sln2 = new ListNode( 1, $sln3 );
		$sln1 = new ListNode( 1, $sln2 );

		$tln1 = new ListNode( 1 );

		$fln2 = new ListNode( 1 );
		$fln1 = new ListNode( 1, $fln2 );


		return [ [ $sln1, [ 1, 2, 3 ] ], [ $ln1, [ 1, 2 ] ], [ $tln1, [ 1 ] ], [ $fln1, [ 1 ] ], ];
	}
}
