<?php
declare(strict_types=1);
namespace SV\ChainOfResponsibility;

interface RequestInterface
{
	public function getPath(): string;

	public function getQuery(): string;

	public function getMethod(): string;
}