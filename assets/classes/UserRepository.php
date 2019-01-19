<?php
/**
 * Created by PhpStorm.
 * User: Maik
 * Date: 12.01.2019
 * Time: 15:04
 */

class UserRepository
{
    /**
     * Gibt Vorname und Nachname in einem Array zurück
     * @param $id
     * @param $connection
     * @return array
     */
    public function getUserNameByID ($id, $connection)
    {
        return SichereConnection::execute($connection, "SELECT user.Vorname, user.Nachname
                                          FROM user
                                          WHERE user.ID ='$id'");
    }
}