<?php
// an interface specifies what methods a class should implement

interface DB
{
    public function connect($host, $username = '', $password);
    public function query($query);
}
?>















<!--$username ="epiz_21113631", $password = "leader01", $host = "sql105.epizy.com", $dbname = "epiz_21113631_books", $options = [] -->