<?php
/**
 * Created by PhpStorm.
 * User: adrienbrussolo
 * Date: 27/01/15
 * Time: 12:55
 */

use Hangman\Game;
use Hangman\Word;


class GameExpectedTest extends \PHPUnit_Framework_TestCase {

    protected $game;

    protected function setUp(){

        $this->game = new Game(new Word('phpunit'));

    }

    /**
     * @expectedException
     */
    public function testInvalidWord(){

        $this->setExpectedException('InvalidArgumentException', 'invalid');
        new Word(234);

    }

} 