<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Klasse um das öffnen und Schließen der Datenbankconnection zu vereinfachen
 * TODO:PHP Doc erstellen und modifizieren
 */

class SichereConnection
{
    public $hasConnection;
    public $connection;

    /**
     * Handelt ein PDO Objekt bzw erzeugt eines, wenn die übergebene Variable NULL ist
     * @param $con
     */
    private function _set($con)
    {
        $this->hasConnection = ($con!=null);
        if(!$this->hasConnection)
        {
            $con = connectDatabase();
        }
        $this->connection = $con;
    }

    /**
     *
     */
    private function _end(){
        if(!$this->hasConnection){
            $this->connection = null;
        }
    }

    public static function execute($con, $sqlstatement)
    {
        $sConnection = new SichereConnection();
        $sConnection->_set($con);
        $re = array();
        foreach ($sConnection->connection->query($sqlstatement) as $value){
            $re[] = (object)$value;
        }
        $sConnection->_end(null);
        return $re;
    }
}