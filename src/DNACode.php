<?php declare(strict_types=1);

namespace Nobuh\Csphp;

use Nobuh\Csphp\BigBinary;

class DNACode
{
    public BigBinary $data;

    public function compress(string $str): void
    {
        $upper = strtoupper($str);
        $edgeMark = "1";
        $this->data = new BigBinary($edgeMark, 2);
        for ($i = 0; $i < strlen($upper); $i++) {
            switch ($upper[$i]) {
                case "A":
                    $bit = "00";
                    break;
                case "C":
                    $bit = "01";
                    break;
                case "G":
                    $bit = "10";
                    break;
                case "T":
                    $bit = "11";
                    break;
                default:
                    $bit = "bad data";
            }
            if ($bit !== "bad data") {
                $bb = new BigBinary($bit, 2);
                $this->data->shiftLeft(2)->or($bb);    
            }
        }
    }

    public function decompress(): string
    {
        $edgeMarker = $this->data->bitLength();
        $ndigits = $edgeMarker - 1;

        for ($i = 0, $str = ""; $i < $ndigits; $i += 2) {
            $pattern = new BigBinary("11", 2);
            $pattern->and($this->data);
            switch ($pattern->print()) {
                case "00":
                    $str .= "A";
                    break;
                case "01":
                    $str .= "C";
                    break;
                case "10":
                    $str .= "G";
                    break;
                case "11":
                    $str .= "T";
                    break;
            }
            $this->data->shiftRight(2);
        }

        return strrev($str);
    }

    public function dump(): string
    {
        return $this->data->print();
    }
}
