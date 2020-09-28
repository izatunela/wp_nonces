<?php declare(strict_types=1);

namespace Marko\WordPressNonces\Interfaces;

/**
* WordPressNonceUrl interface
*/
interface WordPressNonceUrlInterface
{
    /**
    * Get the nonce value
    *
    * @return string
    */
    public function get(): string;
}