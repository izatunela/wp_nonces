<?php declare(strict_types=1);

namespace Marko\WordPressNonces;

use Marko\WordPressNonces\Interfaces\WordPressNonceInterface;
use Marko\WordPressNonces\Interfaces\WordPressNonceUrlInterface;

/**
* OOP WordPress Nonce URL implementation class
* It implements wp_nonce_url() function.
*/
final class WordPressNonceUrl implements WordPressNonceUrlInterface
{
    /**
     * Default nonce name
     */
    const DEFAULT_NONCE_NAME = '_wpnonce';
    
    /**
     * Nonce object.
     *
     * @var Marko\WordPressNonces\Interfaces\WordPressNonceInterface
     */
    protected $nonce_object;

    /**
     * Nonce name.
     * (Optional) Default value: '_wpnonce'
     * 
     * @var string
     */
    protected $nonce_name;

    /**
     * URL to add nonce action.
     * (Required)
     * 
     * @var string
     */
    protected $url;
    
    /**
     * WordPressNonceUrl constructor.
     *
     * @param WordPressNonceInterface $nonce_object
     * @param string $url URL to add nonce action.
     * @param string $nonce_name (Optional) Nonce name.
     */
    public function __construct( WordPressNonceInterface $nonce_object, string $url, string $nonce_name = self::DEFAULT_NONCE_NAME ) {
        $this->nonce = $nonce_object;
        $this->url = $url;
        $this->nonce_name = $nonce_name ?: self::DEFAULT_NONCE_NAME;
    }
    
    /**
     * Returns the url with embedded nonce.
     *
     * @return string
     */
    public function get(): string
    {
        $nonce_value = $this->nonce->get();
        $url = str_replace( '&amp;', '&', $this->url );
        $has_query_parameters = parse_url( $url, PHP_URL_QUERY );

        if ( $has_query_parameters ) {
            return $url.="&{$this->nonce_name}=$nonce_value";
        } else {
            return $url."?{$this->nonce_name}=$nonce_value";
        }
    }
}
