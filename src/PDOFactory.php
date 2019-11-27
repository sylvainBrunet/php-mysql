<?php

class PDOFactory
{
    public static function createPDO()
    {

        $configJson = file_get_contents(__DIR__.'/../config.json');
        $config = json_decode($configJson, true);

        $sqlFirstPartConnection = sprintf(
            'mysql:host=%s:%s;dbname=%s;charset=utf8',
            $config['bdd']['adresseMysql'],
            $config['bdd']['portMysql'],
            $config['bdd']['dbNameMysql']
        );

        return new PDO($sqlFirstPartConnection, $config['bdd']['userMysql'], $config['bdd']['mdpMysql'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}
