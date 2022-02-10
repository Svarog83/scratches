<?php

namespace SV;

/**
 * need to use two pointers: slow and fast. If the fast meets the end the slow one would be in the middle
 *
 * When traversing the list with a pointer slow, make another pointer fast that traverses twice as fast. When fast
 * reaches the end of the list, slow must be in the middle.
 *
 * Given the head of a singly linked list, return the middle node of the linked list.
 *
 * If there are two middle nodes, return the second middle node.
 */
class MiddleLinkedList {

	/**
	 * Optimal-optimal version
	 *
	 * @param ListNode $head
	 * @return ListNode
	 */
	public function solve( ListNode $head ) {
		$fastItem = $head;
		$slowItem = $head;

		while ( $fastItem && $fastItem->next ) {
			$slowItem = $slowItem->next;
			$fastItem = $fastItem->next->next;
		}

		return $slowItem;
	}
}