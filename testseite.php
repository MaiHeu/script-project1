<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 20.12.2018
 * For Testing
 */

include_once  'utilities.php';

/*class Interesse {
    public $InteressenID;
    public $Bezeichnung;
}

class SichereConnection {
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

class InteresseRepository {
    public function SucheAlle($connection)
    {
        return SichereConnection::Ausfuehren($connection, "SELECT interessen.Bezeichnung, Interessen.InteressenID
         FROM interessen");
    }

  public function SucheFuerBenutzer($connection, $benutzer)
  {
      return SichereConnection::Ausfuehren($connection, "SELECT interessen.Bezeichnung, Interessen.InteressenID
                         FROM interessen WHERE interessen.InterssenID IN (
                         SELECT userinteressen.Interesse
                          FROM userinteressen
                          WHERE userinteressen.User = '$benutzer->BenutzerID'
                         )");
  }
}

class InteressePresentation
{
    public function ZeichneCheckBoxListe($arrayOfInteresse, $arrayOfInteresseAusgewaehlt)
    {

    }
}
$iRepository =new InteresseRepository();*/
/** @var Interesse $value */
//Herrn Gütling fragen wie man $value in ein Interesse-Objekt wandelt.
foreach ($iRepository->SucheAlle(null) as $value){
    echo $value->Bezeichnung;
}

getUserInterestById(1);
printInterests(0, false);
printInterests(1, true);