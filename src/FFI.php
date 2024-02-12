<?php

namespace Textualization\SentencePiece;

class FFI
{
    private static $instance;

    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = \FFI::cdef('
              void * spm_new_sentencepiece_processor();
              bool   spm_load_model(void *, char *);
              int    spm_get_piece_size(void *);
              int    spm_encode(void * ptr_inst, char* text, int * buffer, int buffer_length);
              int    spm_piece_to_id(void * ptr_inst, char* token);
', Vendor::lib());
        }
        return self::$instance;
    }
}
    
