<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Klasse um das öffnen und Schließen der Datenbankconnection zu vereinfachen
 * TODO:PHP Doc erstellen und modifizieren
 */

class SichereConnection
{
    public $warda;
    public $connection;

    private function Set($con)
    {
        $this->warda = ($con!=null);
        if(!$this->warda)
        {
            $con = connectDatabase();
        }
        $this->connection = $con;
    }

    private function Ende(){
        if(!$this->warda){
            $this->connection = null;
        }
    }

    public static function Ausfuehren($con,$text)
    {
        $sConnection = new SichereConnection();
        $sConnection->Set($con);
        $re = array();
        foreach ($sConnection->connection->query($text) as $value){
            $re[] = (object)$value;
        }
        $sConnection->Ende(null);
        return $re;
    }
}