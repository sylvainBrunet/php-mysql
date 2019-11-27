<?php
/**
 * Created by IntelliJ IDEA.
 * User: Maxence
 * Date: 29/03/2018
 * Time: 12:02
 */

class Match
{
    public $playerOne;
    public $playerTwo;
    public $scorePlayerOne;
    public $scorePlayerTwo;
    public $winner;

    function __construct($playerOne, $playerTwo, $scorePlayerOne, $scorePlayerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
        $this->scorePlayerOne = $scorePlayerOne;
        $this->scorePlayerTwo = $scorePlayerTwo;

        if ($scorePlayerOne > $scorePlayerTwo) {
            $this->winner = $playerOne;
        } elseif ($scorePlayerOne < $scorePlayerTwo) {
            $this->winner = $playerTwo;
        } else {
            $this->winner = -1;
        }
    }
}