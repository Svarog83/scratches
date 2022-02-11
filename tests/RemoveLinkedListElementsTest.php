<?php

namespace SV;

use PHPUnit\Framework\TestCase;

class RemoveLinkedListElementsTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $head, $val, $expected ): void {
		$solverClass = new RemoveLinkedListElements();
		$res         = $solverClass->solve( $head, $val );
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
		$ln4 = new ListNode( 7 );
		$ln3 = new ListNode( 7, $ln4 );
		$ln2 = new ListNode( 7, $ln3 );
		$ln1 = new ListNode( 7, $ln2 );

		$sln7 = new ListNode( 6 );
		$sln6 = new ListNode( 5, $sln7 );
		$sln5 = new ListNode( 4, $sln6 );
		$sln4 = new ListNode( 3, $sln5 );
		$sln3 = new ListNode( 6, $sln4 );
		$sln2 = new ListNode( 2, $sln3 );
		$sln1 = new ListNode( 1, $sln2 );


		return [ [ $sln1, 6, [ 1, 2, 3, 4, 5 ] ], [ $ln1, 7, [] ], ];
	}
}
