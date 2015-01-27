<?php
/**
 * Created by PhpStorm.
 * User: adrienbrussolo
 * Date: 26/01/15
 * Time: 16:38
 */

use Hangman\Game;
use Hangman\Word;

class GameTest extends \PHPUnit_Framework_TestCase{

    protected $game;

    protected function setUp(){

        $this->game = new Game(new Word('phpunit'));

    }

    /**
     * @test isLetterFound
     * @dataProvider lettersArray
     */
    public function testIsLetterFound($letter){

        $this->game->tryLetter($letter);


        $this->assertTrue($this->game->isLetterFound($letter));

    }

    public function lettersArray(){

        return array(
            array('p'),
//            array('a'),
            array('t'),
            array('h')
        );

    }
/**
     * @test remainingAttemps

     */
    public function testRemainingAttempts(){

        $this->game->tryLetter('a');


        $this->assertEquals(9,$this->game->getRemainingAttempts());

    }


    /**
     * @param $letter
     * @test isLetterNotFound
     * @dataProvider BadLettersArray
     * @expectedException InvalidArgumentException
     */
    public function isLetterNotFound($letter){

        $this->game->tryLetter($letter);

        $this->assertFalse($this->game->isLetterFound($letter));

    }

    public function BadLettersArray(){

        return array(
            array('1'),
            array('+'),
            array('7'),
//            array('F')
        );

    }

    public function testIsWordGood(){


        $this->assertTrue($this->game->tryWord('phpunit'));

    }

    public function testIsTen(){

        $this->assertEquals(10,$this->game->getRemainingAttempts());

    }



} 