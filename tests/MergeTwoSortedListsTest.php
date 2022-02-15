<?php

namespace SV;

use PHPUnit\Framework\TestCase;

class MergeTwoSortedListsTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $list1, $list2, $expected ): void {
		$solverClass = new MergeTwoSortedLists();
		$res         = $solverClass->solve( $list1, $list2 );

		$compare = [];
		if ( $res !== NULL ) {
			while ( $res ) {
				$compare[] = $res->val;
				$res       = $res->next;
			}
		}

		$this->assertEquals( $expected, $compare );
	}

	public function additionProvider(): array {
		$ln3 = new ListNode( 4 );
		$ln2 = new ListNode( 2, $ln3 );
		$ln1 = new ListNode( 1, $ln2 );

		$sln3 = new ListNode( 4 );
		$sln2 = new ListNode( 3, $sln3 );
		$sln1 = new ListNode( 1, $sln2 );

		return [ [ $ln1, $sln1, [ 1, 1, 2, 3, 4, 4 ] ] ];
	}
}
