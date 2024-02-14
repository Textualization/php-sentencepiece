<?php

namespace Textualization\SentencePiece;

class Processor implements \Countable {

    private $ffi;
    private $spm;

    public function __construct()
    {
        $this->ffi = FFI::instance();
        $this->spm = $this->ffi->spm_new_sentencepiece_processor();
    }

    public function Load($model_file) : bool
    {
        return $this->ffi->spm_load_model($this->spm, $model_file);
    }

    public function count() : int
    {
        return $this->ffi->spm_get_piece_size($this->spm);
    }

    public function Encode(string $text, int $max_tokens) : array
    {
        $buffer_type = \FFI::arrayType(\FFI::type("int32_t")/*\FFI\CType::TYPE_SINT64*/, [$max_tokens]);
        $buffer = \FFI::new($buffer_type);
        $actual = $this->ffi->spm_encode($this->spm, $text, $buffer, $max_tokens);
        $result=[];
        if($actual > 0) {
            for($i=0; $i<$actual && $i<$max_tokens; $i++) {
                $result[] = $buffer[$i];
            }
        }
        return $result; //array_slice($buffer, 0, $actual);
    }

    public function PieceToId(string $text) : array
    {
        return $this->ffi->spm_piece_to_id($this->spm, $token);
    }
}
