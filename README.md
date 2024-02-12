PHP SentencePiece
=================

This is a minimal wrapper on top of [Google
SentencePiece](https://github.com/google/sentencepiece) to enable
executing the [XLMRobertaTokenizer](https://github.com/huggingface/transformers/blob/v4.37.2/src/transformers/models/xlm_roberta/tokenization_xlm_roberta.py#L63) encode method.

It needs the dynamic library for SentencePiece built with aditional C wrapper functions, see the fork at [https://github.com/textualization/sentencepiece/].

A binary for the library can be downloaded by doing:

```
composer exec -- php -r "require 'vendor/autoload.php'; Textualization\SentencePiece\Vendor::check();"
```

but depending on platform and GLIBC you might need to compile it yourself and copy to `vendor/textualization/sentencepiece/lib` (create the folder if it doesn't exist). See `src/Vendor.php` for details.

## Running the tests

To run the tests you'll need to install the library per the instructions above.

To fully test it, download this file [sentencepiece.bpe.model](https://huggingface.co/intfloat/multilingual-e5-small/blob/main/sentencepiece.bpe.model) and place it in `tests/`.

