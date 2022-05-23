<?php declare( strict_types=1 );

use PHPUnit\Framework\TestCase;

final class DecoratorTest extends TestCase {
	public function testCanCalculatePriceForBasicDoubleRoomBooking(): void {
		$booking = new \SV\Decorator\DoubleRoomBooking();

		$this->assertSame( 40, $booking->calculatePrice() );
		$this->assertSame( 'double room', $booking->getDescription() );
	}

	public function testCanCalculatePriceForDoubleRoomBookingWithWiFi(): void {
		$booking = new \SV\Decorator\DoubleRoomBooking();
		$booking = new \SV\Decorator\WiFi( $booking );

		$this->assertSame( 42, $booking->calculatePrice() );
		$this->assertSame( 'double room with wifi', $booking->getDescription() );
	}

	public function testCanCalculatePriceForDoubleRoomBookingWithWiFiAndExtraBed(): void {
		$booking = new \SV\Decorator\DoubleRoomBooking();
		$booking = new \SV\Decorator\WiFi( $booking );

		$booking = new \SV\Decorator\ExtraBed( $booking );

		$this->assertSame( 72, $booking->calculatePrice() );
		$this->assertSame( 'double room with wifi with extra bed', $booking->getDescription() );
	}

	public function testWithMockNotWorking(): void {
		$mockedBooking = $this->createMock(\SV\Decorator\WiFi::class);
		$mockedBooking->method('calculatePrice')->willReturn(42);
		$mockedBooking->method('getDescription')->willReturn('with wifi');

		$booking = new \SV\Decorator\ExtraBed( $mockedBooking );

		$this->assertSame( 72, $booking->calculatePrice() );
		$this->assertSame( 'double room with wifi with extra bed', $booking->getDescription() );
	}
}