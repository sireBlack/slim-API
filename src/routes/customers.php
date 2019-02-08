<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Tuupola\Middleware\CorsMiddleware;

$app = new \Slim\App;

$app->add(new Tuupola\Middleware\CorsMiddleware);


//Get all customers

$app->get('/api/customers', function(Request $req, Response $res){
    
    $sql = "SELECT * FROM customers";

    try{
        //Get DB object
        $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->query($sql);

        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

        echo json_encode($customers);

    }catch(PDOException $e){
        echo '{"error": { "text": '.$e->getMessage().'}';
    }

});

//Get single customer
$app->get('/api/customer/{id}', function(Request $req, Response $res){
    
    $id = $req->getAttribute('id');

    $sql = "SELECT * FROM customers WHERE _id = $id";

    try{
        //Get DB object
        $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->query($sql);

        $customer = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

        echo json_encode($customer);

    }catch(PDOException $e){
        echo '{"error": { "text": '.$e->getMessage().'}';
    }

});

//Save new customer
$app->post('/api/customer/add', function(Request $req, Response $res){

    $first_name = $req->getParam('first_name');
    $last_name = $req->getParam('last_name');
    $phone = $req->getParam('phone');
    $email = $req->getParam('email');
    $address = $req->getParam('address');
    $city = $req->getParam('city');
    $state = $req->getParam('state');
    
    $sql = "INSERT INTO customers SET first_name = :first_name, last_name = :last_name, phone = :phone, email = :email, _address = :_address, city  = :city, _state = :_state";

    try{

        //Get DB object
        $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':first_name', $first_name );
        $stmt->bindParam(':last_name', $last_name );
        $stmt->bindParam(':phone', $phone );
        $stmt->bindParam(':email', $email );
        $stmt->bindParam(':_address', $address );
        $stmt->bindParam(':city', $city );
        $stmt->bindParam(':_state', $state );

        $stmt->execute();

        echo '{"status" : { "success" : true, "message" : "customer added" }';

    }catch(PDOException $e){
        echo '{"error": { "text": '.$e->getMessage().'}';
    }

});

//Update customer
$app->put('/api/customer/update/{id}', function(Request $req, Response $res){

    $id = $req->getAttribute('id');

    $first_name = $req->getParam('first_name');
    $last_name = $req->getParam('last_name');
    $phone = $req->getParam('phone');
    $email = $req->getParam('email');
    $address = $req->getParam('address');
    $city = $req->getParam('city');
    $state = $req->getParam('state');
    
    $sql = "UPDATE customers SET first_name = :first_name, last_name = :last_name, phone = :phone, email = :email, _address = :_address, city  = :city, _state = :_state WHERE _id = $id";

    try{

        //Get DB object
        $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':first_name', $first_name );
        $stmt->bindParam(':last_name', $last_name );
        $stmt->bindParam(':phone', $phone );
        $stmt->bindParam(':email', $email );
        $stmt->bindParam(':_address', $address );
        $stmt->bindParam(':city', $city );
        $stmt->bindParam(':_state', $state );

        $stmt->execute();

        echo '{"status" : { "success" : true, "message" : "customer updated" }';

    }catch(PDOException $e){
        echo '{"error": { "text": '.$e->getMessage().'}';
    }

});

//Delete customer
$app->delete('/api/customer/delete/{id}', function(Request $req, Response $res){
    
    $id = $req->getAttribute('id');

    $sql = "DELETE FROM customers WHERE _id = $id";

    try{
        //Get DB object
        $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->execute();
    
        $db = null;

        echo '{"status" : { "success" : true, "message" : "customer deleted" }';

    }catch(PDOException $e){
        echo '{"error": { "text": '.$e->getMessage().'}';
    }

});