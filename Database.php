<?php 

class Database {
    public $conn;
    public $statement;
    public function __construct( $config, $username = 'root', $password ='' )
    {
        $dsn = 'mysql:' . http_build_query( $config, '', ';' );        
        // dd( $dsn );
        
        // $dsn = "mysql:host=localhost;port=3306;charset=utf8mb4;dbname=phpforbeginers_laracasts;user=root;password=";
        $this->conn = new PDO( $dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ] );        
    }
    
    public function query( string $query, array $params = [] ) 
    {
        $this->statement = $this->conn->prepare( $query );
        $this->statement->execute( $params );        
        return $this;
    }
    
    public function find() 
    {
        return $this->statement->fetch();
    }
    
    public function findOrFail() 
    {
        $result = $this->find();
        if ( ! $result ) {
            abort( 404 );
        }
        return $result;
    }
    
    public function get() 
    {
        return $this->statement->fetchAll();
    }
}