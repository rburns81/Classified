<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 5/3/2015
 * Time: 5:59 PM
 */

namespace classified;


class DataFetcher
{


    public function fetchData()
    {
        $db = new Database();
        $pdo = $db->makeDbConn();
        $sql = 'SELECT classifiedads.Id,
                       classifiedads.AdOwner,
                       classifiedads.Teaser,
                       classifiedads.Description,
                       classifiedads.Price,
                       classifiedads.IsActive,
                       classifiedads.Contact1,
                       classifiedads.Contact2,
                       classifiedads.Type,
                       classifiedtypes.description as Type
                  FROM classifiedads
            INNER JOIN classifiedtypes
                    ON classifiedads.type = classifiedtypes.id
                 WHERE IsActive=1';
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function fetchPictures($results)
    {
        $arr = array();
        foreach($results as $result) {
            $id = $result['Id'];
            $path = '../img/' . $id;
            if (is_dir($path)) {
                $handle = opendir($path);
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != '.' && $entry != '..') {
                        $arr[$id][] = $entry;
                    }
                }
                closedir($handle);
                //$arr[$id][] = $pics;
                //$result['Id'] = $pics;
            } /*else {
                $arr[$id] = null;
            }*/
        }
        return $arr;
    }

    public static function fetchTypes(\PDO $pdo)
    {
        $sql = 'SELECT * FROM classifiedtypes';
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}