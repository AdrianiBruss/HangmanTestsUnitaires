<?php
/**
 * Created by PhpStorm.
 * User: adrienbrussolo
 * Date: 26/01/15
 * Time: 16:38
 */

namespace Hangman;

class Game {

    private $word;
    private $attempts = 0;
    const MAX_ATTEMPTS = 10;

    public function __construct(Word $word){

        $this->word = $word;

    }


    public function getRemainingAttempts(){

        return self::MAX_ATTEMPTS - $this->attempts;

    }

    public function tryLetter($letter){


        $result = $this->word->tryLetter($letter);

        if (!$result){

            $this->attempts++;

        }

        return $result;

    }

    public function isLetterFound($letter){

        $lettersFound = $this->word->getLettersFound();


        // return bool
        if (in_array($letter, $lettersFound)){
            return true;
        }else{
            return false;
        }


    }

    public function tryWord($word){

        return $this->word->getWord() === $word;

        // return bool

    }

} 