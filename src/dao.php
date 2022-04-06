<?php
class DAO {
    private $user = "USER";
    private $password = "PASSWORD";
    private $dsn = "DSN";

    private function getConnection(){
        try{
            return new PDO($this->dsn, $this->user, $this->password);
        } catch(PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getApplications(){
        $connection = $this->getConnection();
        try{
            return $connection->query("SELECT * FROM application",PDO::FETCH_ASSOC);
        }catch (Exception $e){
            echo print_r($e,1);
            exit;
        }
    }

    public function enableApplication($appName){
        $connection = $this->getConnection();
        $statement = "UPDATE application SET app_enabled = TRUE WHERE app_name=:app_name";
        $preparedStatement = $connection->prepare($statement);
        $preparedStatement->bindParam(":app_name",$appName);
        $preparedStatement->execute();
    }

    public function disableApplication($appName) {
        $connection = $this->getConnection();
        $statement = "UPDATE application SET app_enabled = FALSE WHERE app_name=:app_name";
        $preparedStatement = $connection->prepare($statement);
        $preparedStatement->bindParam(":app_name",$appName);
        $preparedStatement->execute();
    }

    public function createUser($email,$name,$password,$access) {
        $connection = $this->getConnection();
        $statement = "INSERT INTO user (email, name, password, access) values(:email,:name, :password, :access);";
        $preparedStatement = $connection->prepare($statement);
        $preparedStatement->bindParam(":email",$email);
        $preparedStatement->bindParam(":name",$name);
        $preparedStatement->bindParam(":password",$password);
        $preparedStatement->bindParam(":access",$access);
        $preparedStatement->execute();
    }

    public function deleteUser($email) {
        $connection = $this->getConnection();
        $statement = "DELETE FROM user WHERE email=:email";
        $preparedStatement = $connection->prepare($statement);
        $preparedStatement->bindParam(":email",$email);
        $preparedStatement->execute();
    }

    public function userExists($email, $password){
        $connection = $this->getConnection();
        try{
            $statement = "SELECT count(*) as total FROM user WHERE email=:email AND password=:password";
            $preparedStatement = $connection->prepare($statement);
            $preparedStatement->bindParam(":email",$email);
            $preparedStatement->bindParam(":password",$password);
            $preparedStatement->execute();
            $row = $preparedStatement->fetch();
            if($row['total'] == 1){
                return 1;
            } else {
                return 0;
            }
        }catch (Exception $e){
            echo print_r($e,1);
            exit;
        }
    }

    public function getUserName($email,$password){
        $connection = $this->getConnection();
        try{
            $statement = "SELECT name FROM user WHERE email=:email AND password=:password";
            $preparedStatement = $connection->prepare($statement);
            $preparedStatement->bindParam(":email",$email);
            $preparedStatement->bindParam(":password",$password);
            $preparedStatement->execute();
            return $preparedStatement->fetch();
        }catch (Exception $e){
            echo print_r($e,1);
            exit;
        }
    }

    public function emailExists($email){
        $connection = $this->getConnection();
        try{
            $statement = "SELECT count(*) as total FROM user WHERE email=:email";
            $preparedStatement = $connection->prepare($statement);
            $preparedStatement->bindParam(":email",$email);
            $preparedStatement->execute();
            $row = $preparedStatement->fetch();
            if($row['total'] == 1){
                return true;
            } else {
                return false;
            }
        }catch (Exception $e){
            echo print_r($e,1);
            exit;
        }
    }
}
?>
