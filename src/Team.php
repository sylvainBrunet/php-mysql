<?php
class Team
{
    public $id;
    public $teamName;
    public $score;
    public $joueurUn;
    public $joueurDeux;

    function __construct(int $id, string $teamName, string $joueurUn, string $joueurDeux, int $score = null)
    {
        $this->id = $id;
        $this->teamName = $teamName;
        $this->joueurUn = $joueurUn;
        $this->joueurDeux = $joueurDeux;
        $this->score = $score;

    }

}
