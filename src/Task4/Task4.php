<?php

declare(strict_types=1);

namespace Yamilovs\Skyeng\Task4;

class Task4
{
    public function sum(string $a, string $b): string
    {
        $aInt = preg_replace('/\D/', '', $a);
        $bInt = preg_replace('/\D/', '', $b);

        $result = '';
        $swap = 0;

        if ($bInt > $aInt) {
            list($aInt, $bInt) = [$bInt, $aInt];
        }

        for ($i = 1; $i <= max(strlen($aInt), strlen($bInt)); $i++) {
            $a1 = $aInt[-$i] ?? 0;
            $b1 = $bInt[-$i] ?? 0;

            if ($this->hasMinus($a) xor $this->hasMinus($b)) {
                $r1 = (int)$a1 - (int)$b1 + $swap;
            } else {
                $r1 = (int)$a1 + (int)$b1 + $swap;
            }

            if ($r1 >= 10) {
                $swap = floor($r1 / 10);
                $result .= $r1 % 10;
            } else {
                $result .= $r1;
            }
        }

        return sprintf(
            '%s%s',
            $this->getResultSymbol($a, $b),
            ltrim(strrev($result.$swap), '0')
        );
    }

    private function hasMinus(string $string): bool
    {
        return strpos($string, '-') !== false;
    }

    private function getResultSymbol(string $a, string $b): string
    {
        $aInt = preg_replace('/\D/', '', $a);
        $bInt = preg_replace('/\D/', '', $b);

        if ($this->hasMinus($a) && $this->hasMinus($b)) {
            return '-';
        } elseif ($this->hasMinus($a) && $aInt > $bInt) {
            return '-';
        } elseif ($this->hasMinus($b) && $bInt > $aInt) {
            return '-';
        } else {
            return '';
        }
    }
}