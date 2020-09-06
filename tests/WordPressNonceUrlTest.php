<?php

namespace Marko\WordPressNonces\Tests;

use PHPUnit\Framework\TestCase;
use Marko\WordPressNonces\WordPressNonce;
use Marko\WordPressNonces\WordPressNonceUrl;

class WordPressNonceUrlTest extends TestCase
{
    const ACTION_URL = 'http://www.ismycomputeron.com/';
    const NONCE_NAME = 'example_nonce_name';
    protected $wp_nonce;

    public function setUp(): void
    {
        $this->wp_nonce = new WordPressNonce('action');
        $this->wp_nonce_url = new WordPressNonceUrl($this->wp_nonce, self::ACTION_URL, self::NONCE_NAME);
    }

    /** @test */
    public function it_creates_nonce_value_and_returns_it_embedded_in_a_given_url_with_no_parameters()
    {
        $this->wp_nonce_url = new WordPressNonceUrl($this->wp_nonce, self::ACTION_URL, self::NONCE_NAME);

        $this->assertEquals(self::ACTION_URL."?".self::NONCE_NAME."=".$this->wp_nonce->get(), $this->wp_nonce_url->get());
    }
    
    /** @test */
    public function it_creates_nonce_value_and_returns_it_embedded_in_a_given_url_with_multiple_parameters()
    {
        $this->wp_nonce_url = new WordPressNonceUrl($this->wp_nonce, self::ACTION_URL."?foo=bar", self::NONCE_NAME);

        $this->assertEquals(self::ACTION_URL."?foo=bar&".self::NONCE_NAME."=".$this->wp_nonce->get(), $this->wp_nonce_url->get());
    }

    public function tearDown(): void
    {
        unset($this->wp_nonce);
    }
}
