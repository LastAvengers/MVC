<?php

require_once(LIBRARY_PATH . DS . 'Database.php');

/**
 * This is the User class.
 *
 * @author donal.ellis@rmit.edu.au
 */

class User {

  private static $errors;

  /**
   * A method for retrieving users from the users table.
   *
   * @param array $data An optional array of key:value pairs to be used as
   *                    parameters in the SQL query.
   * @return array An array of database Objects where each Object represents a
   *               user.
   */
  public static function retrieve(array $data = array()) {

    $sql = 'SELECT * FROM account';
    $values = array();
    if (count($data)) {
      $count = 0;
      foreach ($data as $key => $value) 
      {
        if ((++$count) == 1)
        {
          $sql .= " WHERE {$key} = ?";
          $values[] = $value;
        } 
        else 
        {
          $sql .= " AND {$key} = ?";
          $values[] = $value;
        }
      }
    }

    try {
      $database = Database::getInstance();
    
      $statement = $database->pdo->prepare($sql);
      $statement->execute($values);
      // result is FALSE if no rows found
      $result = $statement->fetchAll(PDO::FETCH_OBJ);

      /**
      $result2 = (array)$result[0];
      $salt = $result2['salt_value'];
      $pw = $result2['password'];

	return $salt;
       return $pw;
       **/
	

      $database->pdo = null;
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
    }
    if (count($result) > 1) {
      return $result;
    } else if (count($result) == 1) {
      return $result[0];
    } else {
      return NULL;
    }
  }



  /**
   * An example private method to show the @access tag for PhpDocumentor.
   *
   * @access private 
   */
  private static function sanitise() {

  }

}
