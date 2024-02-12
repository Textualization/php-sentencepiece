<?php

namespace Textualization\SentencePiece\Tests;

use Textualization\SentencePiece\SentencePieceProcessor;

use PHPUnit\Framework\TestCase;

class TokenizationTest extends TestCase {

    protected function setUp() : void
    {
        if (! file_exists(__DIR__ . "/sentencepiece.bpe.model")) {
            $this->markTestSkipped('Download https://huggingface.co/intfloat/multilingual-e5-small/blob/main/sentencepiece.bpe.model and put in the tests/ folder');
        }
    }

    public function test_load() : void
    {
        $spm = new \Textualization\SentencePiece\SentencePieceProcessor();
         $spm->Load(__DIR__ . "/sentencepiece.bpe.model");
         $out = $spm->Encode("This is an example sentence", 50);
         $this->assertEquals($out, [ 3292, 82, 141, 27780, 149356 ]);
    }    
}
