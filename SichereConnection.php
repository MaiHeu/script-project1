<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 12.01.2019
 * Time: 14:58
 */

class SichereConnection
{
    public $warda;
    public $connection;

    public function Set($con)
    {
        $this->warda = ($con!=null);
        if(!$this->warda)
        {
            $con = connectDatabase();
        }
        $this->connection = $con;
    }

    public function Ende(){
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