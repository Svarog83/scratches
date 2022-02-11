<?php

namespace SV;

use PHPUnit\Framework\TestCase;

class ReverseLinkedListTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $head, $expected ): void {
		$solverClass = new ReverseLinkedList();
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

		$ffln3 = new ListNode( 3 );
		$ffln2 = new ListNode( 2, $ffln3 );
		$ffln1 = new ListNode( 1, $ffln2 );


		return [ [ $sln1, [ 3, 3, 2, 1, 1 ] ], [ $ln1, [ 2, 1, 1 ] ], [ $tln1, [ 1 ] ], [ $fln1, [ 1, 1 ] ], [ $ffln1, [ 3, 2, 1 ] ], ];
	}
}
