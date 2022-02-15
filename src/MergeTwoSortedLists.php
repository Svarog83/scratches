<?php

namespace SV;

/**
 * My solution was OK: increase each list while it's val is bigger than others. Interesting solution with:
  $dummy = new ListNode( 0 );
  $tail  = $dummy; and
  return $dummy->next
 *
 * You are given the heads of two sorted linked lists list1 and list2.
 *
 * Merge the two lists in a one sorted list. The list should be made by splicing together the nodes of the first two
 * lists.
 *
 * Return the head of the merged linked list.
 */
class MergeTwoSortedLists {

	/**
	 * Optimal version
	 *
	 * @param ListNode $list1
	 * @param ListNode $list2
	 * @return ListNode|null
	 */
	public function solve( ListNode $list1, ListNode $list2 ): ?ListNode {
		$dummy = new ListNode( 0 );
		$tail  = $dummy;
		while ( $list1 && $list2 ) {
			if ( $list1->val < $list2->val ) {
				$tail->next = $list1;
				$list1      = $list1->next;
			} else {
				$tail->next = $list2;
				$list2      = $list2->next;
			}

			$tail = $tail->next;
		}

		if ( $list1 ) {
			$tail->next = $list1;
		} else if ( $list2 ) {
			$tail->next = $list2;
		}

		return $dummy->next;
	}

	/**
	 * My version
	 *
	 * @param ListNode $list1
	 * @param ListNode $list2
	 * @return ListNode|null
	 */
	public function solve2( ListNode $list1, ListNode $list2 ): ?ListNode {
		$newList = NULL;
		$newHead = NULL;
		while ( TRUE ) {
			if ( !$list1 && !$list2 ) {
				break;
			}
			$val1 = $list1 ? $list1->val : PHP_INT_MAX;
			$val2 = $list2 ? $list2->val : PHP_INT_MAX;
			if ( $val1 <= $val2 ) {
				$nextVal = $val1;
				$list1   = $list1->next;
			} else {
				$nextVal = $val2;
				$list2   = $list2->next;
			}

			if ( $newList === NULL ) {
				$newList = new ListNode( $nextVal );
				$newHead = $newList;
			} else {
				$nextNode      = new ListNode( $nextVal );
				$newList->next = $nextNode;
				$newList       = $nextNode;
			}
		}

		return $newHead;
	}
}