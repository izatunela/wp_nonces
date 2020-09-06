<?php

namespace Marko\WordPressNonces\Tests;

use PHPUnit\Framework\TestCase;
use Marko\WordPressNonces\WordPressNonce;

class WordPressNonceTest extends TestCase
{
    protected $wp_nonce;

    public function setUp(): void
    {
        $this->wp_nonce = new WordPressNonce('action');
    }

    /** @test */
    public function it_creates_nonce_value_and_returns_it()
    {
        $this->assertEquals(substr(hash('sha256','action'),-10,10), $this->wp_nonce->get());
    }

    /** @test */
    public function it_verifies_the_nonce_value()
    {
        $this->assertTrue($this->wp_nonce->verify_nonce($this->wp_nonce->get()));
    }
    
    public function tearDown(): void
    {
        unset($this->wp_nonce);
    }
}
