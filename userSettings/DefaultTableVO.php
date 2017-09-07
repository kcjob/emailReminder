<?php

class DefaultTableVO {  //Value Object

  var $dbname;          // database name
  var $table_name;      // table name
  var $where_column;           // where clause
  var $column_list;     // list of column in table
  var $data_array;      // data from the database
  var $errors;          // array of error messages
}
