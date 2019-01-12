<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 12.01.2019
 * Time: 14:56
 */
class InteressenRepository
{
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