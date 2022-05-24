<?php declare( strict_types=1 );

use PHPUnit\Framework\TestCase;

class ChainOfResponsibilityTest extends TestCase {
	private \SV\ChainOfResponsibility\Handler $chain;

	protected function setUp(): void {
		$this->chain = new \SV\ChainOfResponsibility\FastStorage( [ '/foo/bar?index=1' => 'Hello In Memory!' ],
																  new \SV\ChainOfResponsibility\SlowStorage() );
	}

	public function testCanRequestKeyInFastStorage(): void {
		$request = $this->createMock( \SV\ChainOfResponsibility\RequestInterface::class );
		$request->method( 'getPath' )->willReturn( '/foo/bar' );
		$request->method( 'getQuery' )->willReturn( 'index=1' );
		$request->method( 'getMethod' )->willReturn( 'GET' );

		$this->assertSame( 'Hello In Memory!', $this->chain->handle( $request ) );
	}

	public function testCanRequestKeyInSlowStorage(): void {
		$request = $this->createMock( \SV\ChainOfResponsibility\RequestInterface::class );
		$request->method( 'getPath' )->willReturn( '/foo/baz' );
		$request->method( 'getQuery' )->willReturn( '' );
		$request->method( 'getMethod' )->willReturn( 'GET' );

		$this->assertSame( 'Hello World!', $this->chain->handle( $request ) );
	}
}