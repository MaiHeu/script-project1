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

    /**
     * @param $con
     */
    private function set($con)
    {
        $this->warda = ($con!=null);
        if(!$this->warda)
        {
            $con = connectDatabase();
        }
        $this->connection = $con;
    }

    /**
     *
     */
    private function end(){
        if(!$this->warda){
            $this->connection = null;
        }
    }

    public static function execute($con, $text)
    {
        $sConnection = new SichereConnection();
        $sConnection->set($con);
        $re = array();
        foreach ($sConnection->connection->query($text) as $value){
            $re[] = (object)$value;
        }
        $sConnection->end(null);
        return $re;
    }
}