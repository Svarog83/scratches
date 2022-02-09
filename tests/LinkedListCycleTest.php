<?php

namespace SV;

use PHPUnit\Framework\TestCase;

class LinkedListCycleTest extends TestCase {
	/**
	 * @dataProvider additionProvider
	 */
	public function testSolve( $head, $expected ): void {
		$solverClass = new LinkedListCycle();
		$res         = $solverClass->solve( $head );

		$this->assertEquals( $expected, $res );
	}

	public function additionProvider(): array {

		//		head = [3,2,0,-4], pos = 1, links: 3->2->0->-4->2...
		$listNode2    = new ListNode( 2 );
		$listNodeNeg4 = new ListNode( -4, $listNode2 );
		$listNode0    = new ListNode( 0, $listNodeNeg4 );
		$listNode2->setNext( $listNode0 );
		$listNode3 = new ListNode( 3, $listNode2 );

		//		head = [1->2->null],
		$ln2 = new ListNode( 2 );
		$ln1    = new ListNode( 1, $ln2 );

		return [ [ $listNode3, TRUE ], [ $ln1, FALSE ], ];
	}
}
