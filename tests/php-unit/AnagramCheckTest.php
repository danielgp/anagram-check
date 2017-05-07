<?php

/**
 *
 * The MIT License (MIT)
 *
 * Copyright (c) 2017 Daniel Popiniuc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */
class AnagramCheckTest extends PHPUnit_Framework_TestCase
{

    use \danielgp\anagram_check\AnagramCheck;

    public function testIsAnagramInvalidBothWordsBooleanFalseFalse()
    {
        $actual = $this->isAnagram(false, false);
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramInvalidBothWordsBooleanTrueFalse()
    {
        $actual = $this->isAnagram(true, false);
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramInvalidBothWordsBooleanTrueTrue()
    {
        $actual = $this->isAnagram(true, true);
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramInvalidBothWordsNull()
    {
        $actual = $this->isAnagram(null, null);
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramInvalidFirstWordBooleanFalse()
    {
        $actual = $this->isAnagram(false, 'no more stars');
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramInvalidFirstWordBooleanTrue()
    {
        $actual = $this->isAnagram(true, 'no more stars');
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramInvalidFirstWordEmpty()
    {
        $actual = $this->isAnagram('', 'no more stars');
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramInvalidFirstWordNull()
    {
        $actual = $this->isAnagram(null, 'no more stars');
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramInvalidFirstWordNumber0()
    {
        $actual = $this->isAnagram(0, 'no more stars');
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramInvalidFirstWordNumber1()
    {
        $actual = $this->isAnagram(1, 'no more stars');
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramValidWordsWithSpaceDifferentCaps()
    {
        $actual = $this->isAnagram('AstroNomers', 'no more stars');
        $this->assertEquals(true, $actual);
    }

    public function testIsAnagramValidWordsWithSpaceSameCaps()
    {
        $actual = $this->isAnagram('astronomers', 'no more stars');
        $this->assertEquals(true, $actual);
    }

    public function testIsAnagramValidWordsWithSpaceSameCapsFalse()
    {
        $actual = $this->isAnagram('astronomers', 'no_more_stars');
        $this->assertEquals(false, $actual);
    }

    public function testIsAnagramValidWordsWithoutSpaceDifferentCaps()
    {
        $actual = $this->isAnagram('admirer', 'Married');
        $this->assertEquals(true, $actual);
    }

    public function testIsAnagramValidWordsWithoutSpaceSameCaps()
    {
        $actual = $this->isAnagram('admirer', 'married');
        $this->assertEquals(true, $actual);
    }

    public function testIsAnagramValidWordsWithoutSpaceSameCapsFalse()
    {
        $actual = $this->isAnagram('admire', 'married');
        $this->assertEquals(false, $actual);
    }
}
