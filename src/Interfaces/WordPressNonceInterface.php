<?php declare(strict_types=1);

namespace Marko\WordPressNonces\Interfaces;

/**
 * WordPressNonce interface
 */
interface WordPressNonceInterface
{
    /**
     * Get the nonce value
     *
     * @return string
     */
    public function get(): string;

    /**
     * Verify nonce
     *
     * @param string $target_nonce string to be verified
     * @return boolean
     */
    public function verify_nonce(string $target_nonce): bool;
}