<?php
    function get_connection(){
        $configVars = require 'config.php';
        try{
            $pdo = new PDO($configVars['database_dsn'],$configVars['database_user'],$configVars['database_password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            $e->errorInfo;
        }

        return $pdo;

    }


    function get_contacts(){
        $messagesJson = file_get_contents('resources/contacts.json');
        $messages = json_decode($messagesJson,true);
        return $messages;

    }
    function save_person(){
        $pdo = get_connection();
        $name = $_REQUEST['name'];
        $username = $_REQUEST['userName'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        if(!empty($name) && !empty($username) && !empty($emaik) && !empty($password))
        $query = 'INSERT INTO person (name, userName, email, password) VALUES (?,?,?,?)';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $username, $email,$password]);
    }

    function log_in(){
        $pdo = get_connection();
        $username = $_REQUEST['userName'];
        $password = $_REQUEST['password'];
        $query = 'SELECT * FROM person WHERE userName= :username and password = :password';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('username',$username);
        $stmt->bindParam('password', $password);
        $stmt->execute();

        $count = $stmt->rowCount();
        $row = $stmt->fetchAll();
        $user_data = $row[0];
        var_dump($row[0]['role']);
        if($count == 1 && $row[0]['role'] == 'ADMIN' ){
            $_SESSION['userName'] = $user_data['userName'];
            $_SESSION['role'] = $user_data['role'];
            header("Location: index.php");
        }elseif($count == 1 && $row[0]['role'] == 'SIMPLE' ){
            $_SESSION['userName'] = $user_data['userName'];
            $_SESSION['role'] = $user_data['role'];
            header("Location: index.php");

        }else{
            echo "Wrong password or userName";
            header("Location: signin.php");


        }


    }


    function save_contacts($messagesToSave){
        $json = json_encode($messagesToSave, JSON_PRETTY_PRINT);
        file_put_contents('resources/contacts.json', $json);
    }
?>