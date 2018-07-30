<?php

declare(strict_types=1);

namespace Yamilovs\Skyeng\Task4;

class Task4
{
    public function sum(string $a, string $b): string
    {
        $aInt = $this->getClearNumberString($a);
        $bInt = $this->getClearNumberString($b);

        $result = '';
        $swap = 0;

        if ($this->isGreater($bInt, $aInt)) {
            list($aInt, $bInt) = [$bInt, $aInt];
        }

        for ($i = 1; $i <= max(strlen($aInt), strlen($bInt)); $i++) {
            $a1 = $aInt[-$i] ?? 0;
            $b1 = $bInt[-$i] ?? 0;

            if ($this->hasMinus($a) xor $this->hasMinus($b)) { // subtraction operation
                $r1 = (int)$a1 - (int)$b1 - $swap;

                if ($r1 < 0) {
                    $swap = 1;
                    $result .= $r1 + 10;
                } else {
                    $swap = 0;
                    $result .= $r1;
                }
            } else { // addition operation
                $r1 = (int)$a1 + (int)$b1 + $swap;

                if ($r1 >= 10) {
                    $swap = 1;
                    $result .= $r1 % 10;
                } else {
                    $swap = 0;
                    $result .= $r1;
                }
            }
        }

        $result = sprintf(
            '%s%s',
            $this->getResultSymbol($a, $b),
            ltrim(strrev($result.$swap), '0')
        );

        if (empty($result) || $result === '-') {
            $result = '0';
        }

        return $result;
    }

    private function isGreater(string $first, string $second): bool
    {
        switch (strlen($first) <=> strlen($second)) {
            case -1:
                return false;
                break;
            case 1:
                return true;
                break;
            case 0:
                for ($i = 0; $i < strlen($first); $i++) {
                    if ($first[$i] == $second[$i]) {
                        continue;
                    }

                    return $first[$i] > $second[$i];
                }
                break;
        }

        return false;
    }

    private function hasMinus(string $string): bool
    {
        return strpos($string, '-') !== false;
    }

    private function getResultSymbol(string $a, string $b): string
    {
        $aInt = $this->getClearNumberString($a);
        $bInt = $this->getClearNumberString($b);

        if ($this->hasMinus($a) && $this->hasMinus($b)) {
            return '-';
        } elseif ($this->hasMinus($a) && $this->isGreater($aInt, $bInt)) {
            return '-';
        } elseif ($this->hasMinus($b) && $this->isGreater($bInt, $aInt)) {
            return '-';
        } else {
            return '';
        }
    }

    private function getClearNumberString(string $string): string
    {
        return preg_replace('/\D/', '', $string);
    }
}