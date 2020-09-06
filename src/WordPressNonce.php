<?php declare(strict_types=1);

namespace Marko\WordPressNonces;

use Marko\WordPressNonces\Interfaces\WordPressNonceInterface;

/**
 * OOP WordPress Nonce implementation class.
 * It implements wp_create_nonce() and wp_verify_nonce() functions.
 */
final class WordPressNonce implements WordPressNonceInterface
{
    /**
     * Nonce action name.
     * (Optional) Default value: -1
     *
     * @var int|string 
     */
    protected $action;

    /**
     * WordPressNonce constructor.
     *
     * @param (string|int) $action (Optional) Scalar value to add context to the nonce.
     */
    public function __construct( $action = -1 )
    {
        $this->action = $action;
        // $this->nonce_string = '';
    }
    
    /**
    * Create nonce value
    *
    * @return string
    */
    protected function create_nonce(): string
    {
        return substr( hash( 'sha256',(string) $this->action ), -10, 10 );
    }
    
    /**
    * Get nonce 
    *
    * @return string
    */
    public function get(): string
    {
        return $this->create_nonce();
    }
    
    /**
    * Verify nonce
    *
    * @param   string  $target_nonce string to be verified
    * @return  bool
    */
    public function verify_nonce( string $target_nonce ): bool
    {
        $expected = $this->create_nonce();
        return ( $expected === $target_nonce );
    }
}