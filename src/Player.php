<?php
/**
 * Created by IntelliJ IDEA.
 * User: Maxence
 * Date: 29/03/2018
 * Time: 11:20
 */

class Player
{
    public $id;
    public $pseudo;
    public $score;
    public $clashRoyalTag;

    function __construct(int $id, string $pseudo, string $clashRoyalTag, int $score = null)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->score = $score;
        $this->clashRoyalTag = $clashRoyalTag;
    }

    function getClashRoyalInfo () {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.cr-api.com/player/".$this->clashRoyalTag,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array("auth: 434ee4a28b664a7d9a0183292a08dfa830100c9e079b47fcafc104ed27e25d1c"),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "error";
        } else {
            $result = json_decode($response);
            return $result;
        }
    }
}