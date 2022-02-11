<?php

namespace SV;

/**
 * It can be done with only one pointer. Just reassign ->next to ->next->next if values are the same
 *
 * Given the head of a sorted linked list, delete all duplicates such that each element appears only once. Return the
 * linked list sorted as well.
 */
class RemoveDuplicatesFromSortedList {

	/**
	 * Optimal version
	 *
	 * @param ListNode $head
	 * @return ListNode|null
	 */
	public function solve( ListNode $head ): ?ListNode {
		$list = $head;
		while ( $list ) {
			if ( !$list->next ) {
				break;
			}
			if ( $list->val === $list->next->val ) {
				$list->next = $list->next->next;
			} else {
				$list = $list->next;
			}
		}

		return $head;
	}

	/**
	 * My version - not the best because I need to return the same list (not create a new one)
	 *
	 * @param ListNode $head
	 * @return ListNode|null
	 */
	public function solve2( ListNode $head ): ?ListNode {
		$returnHead = NULL;
		if ( $head ) {
			$newHead    = new ListNode( $head->val );
			$returnHead = $newHead;
			if ( $head->next ) {
				$slow = $head;
				$fast = $head->next;
				while ( $fast ) {
					if ( $fast->val > $slow->val ) {
						$nextNode      = new ListNode( $fast->val );
						$newHead->next = $nextNode;
						$newHead       = $nextNode;

						$slow = $fast;
					}
					$fast = $fast->next;
				}
			}
		}

		return $returnHead;
	}
}