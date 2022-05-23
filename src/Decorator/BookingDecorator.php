<?php
declare( strict_types=1 );

namespace SV\Decorator;

abstract class BookingDecorator implements Booking {
	public function __construct( protected Booking $booking ) {
	}
}