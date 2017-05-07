<?php

/*
 * The MIT License
 *
 * Copyright 2017 Daniel Popiniuc.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace danielgp\anagram_check;

trait AnagramCheck
{

    public function isAnagram($string1, $string2)
    {
        if (!is_string($string1) || !is_string($string2)) {
            return false;
        }
        $aolString1 = $this->computeArrayOfLetters($string1);
        $aolString2 = $this->computeArrayOfLetters($string2);
        $result1    = array_diff_assoc($aolString1, $aolString2);
        $result2    = array_diff_assoc($aolString2, $aolString1);
        return (($result1 === []) && ($result2 === []));
    }

    private function computeArrayOfLetters($inString)
    {
        $aReturn       = [];
        $workingString = \str_replace(' ', '', $inString);
        $inLength      = strlen($workingString);
        if ($inLength >= 1) {
            for ($counter = 0; $counter < $inLength; $counter++) {
                $crtLetter = strtolower(substr($workingString, $counter, 1));
                if (array_key_exists($crtLetter, $aReturn)) {
                    $aReturn[$crtLetter] += 1;
                } else {
                    $aReturn[$crtLetter] = 1;
                }
            }
        }
        ksort($aReturn);
        return $aReturn;
    }
}
