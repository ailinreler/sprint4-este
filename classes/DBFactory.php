<?php


class DBFactory{

  public static $dbType;

  public static function getDB()  // MySQLDB - JSONDB
  {
    return new self::$dbType;
  }

}
