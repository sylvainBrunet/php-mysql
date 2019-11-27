<?php
class TeamMatch
{
    public $teamOne;
    public $teamTwo;
    public $scoreTeamOne;
    public $scoreTeamTwo;
    public $teamWinner;

    function __construct($teamOne, $teamTwo, $scoreTeamOne, $scoreTeamTwo)
    {
        $this->teamOne = $teamOne;
        $this->teamTwo = $teamTwo;
        $this->scoreTeamOne = $scoreTeamOne;
        $this->scoreTeamTwo = $scoreTeamTwo;

        if ($scoreTeamOne > $scoreTeamTwo) {
            $this->teamWinner = $teamOne;
        } elseif ($scoreTeamOne < $scoreTeamTwo) {
            $this->teamWinner = $teamTwo;
        } else {
            $this->teamWinner = -1;
        }
    }
}
