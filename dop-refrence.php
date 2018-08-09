<?php 

$host = 'localhost';
$user = 'root';
$password = null;
$dbname = 'pdo_test';

//set dns

$dns = 'mysql:host='.$host . ';dbname=' .$dbname;

// create PDO instance
$pdo = new PDO($dns,$user,$password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

/* squery selrch from id
$id = 1 ;
$sql = 'select * from user where id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$users = $stmt->fetchAll();

foreach($users as $user){
    echo $user->name;
}
*/

// entering data 

// $name = "rahul";
// $email = 'rgamil.com';
// $role = "Admin";
// $sql = 'INSERT INTO USER(name,email,role) values(:name,:email,:role)';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['name'=>$name,'email'=>$email,'role'=>$role]);
// echo 'added Users';
