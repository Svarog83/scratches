<?php

namespace SV;

/**
 * Definition for a singly-linked list.
 */
class ListNode {
	public int           $val  = 0;
	public ListNode|null $next = NULL;

	function __construct( $val, ListNode $next = NULL ) {
		$this->val  = $val;
		$this->next = $next;
	}

	/**
	 * @return ListNode|null
	 */
	public function getNext(): ?ListNode {
		return $this->next;
	}

	/**
	 * @param ListNode|null $next
	 * @return ListNode
	 */
	public function setNext( ?ListNode $next ): ListNode {
		$this->next = $next;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getVal(): int {
		return $this->val;
	}

}