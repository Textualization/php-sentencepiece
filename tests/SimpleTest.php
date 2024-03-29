<?php

namespace Textualization\SentencePiece\Tests;

use Textualization\SentencePiece\Processor;
use Textualization\SentencePiece\Vendor;

use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase {
    protected function setUp() : void
        
    {
        if (! file_exists(Vendor::lib())) {
            $this->markTestSkipped('Do Vendor::check() to download the library');
        }
    }

    public function test_load() : void
    {
        $spm = new Processor();
        $this->assertNotNull($spm);
    }
}

