<?php
/**
 * Created by PhpStorm.
 * User: adrienbrussolo
 * Date: 26/01/15
 * Time: 16:37
 */

namespace Hangman;

class Word {

    protected $word;
    protected $lettersTried = [];
    protected $lettersFound = [];

    public function __construct($word){

        if (!is_string($word)){
            throw new \InvalidArgumentException('invalid');
        }

        $this->word = $word;
    }
    public function tryLetter($letter){

        $letter = strtolower($letter);

        if (0 === preg_match('/^[a-z]$/', $letter)){
            throw new \InvalidArgumentException(sprintf('%s, is not valid character ', $letter));
        }

        if (in_array($letter, $this->lettersTried)){
            throw new \InvalidArgumentException(sprintf('the letter %s has already been found', $letter));
        }
        // si la lettre est dans le mot
        if (false !== strpos($this->word, $letter) ){
            $this->lettersFound[] = $letter;
            return true;
        }

        return false;

    }

    public function getLettersFound(){

        return $this->lettersFound;

        // return array string

    }

    public function getWord(){

        return $this->word;

        // return string

    }

    public function getLettersTried(){



    }

} 