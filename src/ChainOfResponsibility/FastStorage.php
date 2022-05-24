<?php
declare( strict_types=1 );

namespace SV\ChainOfResponsibility;

class FastStorage extends Handler {
	public function __construct( private array $data, ?Handler $successor = NULL ) {
		parent::__construct( $successor );
	}

	protected function processing( RequestInterface $request ): ?string {
		$key = sprintf( '%s?%s',
						$request->getPath(),
						$request->getQuery() );

		if ( $request->getMethod() === 'GET' && isset( $this->data[ $key ] ) ) {
			return $this->data[ $key ];
		}

		return NULL;
	}
}