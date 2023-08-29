<?php

namespace core;

class Validator {

    public static function string($value, $min = 1, $max = INF) {

        $value = trim($value);
        $valueLen = strlen($value);

        return $valueLen >= $min && $valueLen < $max;
    }

    public static function email($value) {

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function exists($table, $column, $value) {

      $db = App::container()->resolve(Database::class);

      return $db->query("SELECT * FROM notes WHERE title = :value AND user_id = :user_id", [
          'value' => $value,
          'user_id' => 1
      ])->find();
    }
}
