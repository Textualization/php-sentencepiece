<?php

namespace Textualization\SentencePiece;

require 'vendor/autoload.php';

class Vendor
{
    public const VERSION = '0.1.99';

    public static function lib() {
        return self::libDir() . '/' . "libsentencepiece.so." . self::VERSION;
    }
    
    public static function check($event=null) {
        $dest = self::lib();
        
        if(file_exists($dest)) {
            echo "✔ SentencePiece library found\n";
            return;
        }
        
        $dir = self::libDir();
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        echo "Downloading SentencePiece library...\n";

        $url = "https://github.com/Textualization/sentencepiece/releases/download/v" .
             self::VERSION . "-adapter-1/libsentencepiece.so." . self::VERSION;
        $contents = file_get_contents($url);

        $checksum = hash('sha256', $contents);
        if($checksum != "c7d68503e24a952d130aa5362164f7d14ca899afc2ab091f4e2a0e7ddf404d26") {
            throw new \Exception("Bad checksum: $checksum");
        }
        file_put_contents($dest, $contents);
        
        echo "✔ Success\n";        
    }

    private static function libDir() {
        return __DIR__ . '/../lib';
    }
}

