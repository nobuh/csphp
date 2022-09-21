<?php declare(strict_types=1);

namespace Nobuh\Csphp;

class Onetimepad
{
    private string $key;

    public function decrypt(string $code): string
    {
        if (strlen($code) !== strlen($this->key)) {
            return "";
        }
        return (string)($code ^ $this->key);
    }

    public function encrypt(string $input): string
    {
        $this->key = random_bytes(strlen($input));
        return (string)($input ^ $this->key);
    }
}
