<?php
    class Conectar{
        protected $dbh;

        protected function conexion(){
            try{
                $con = $this->dbh = new PDO("mysql:local=localhost;dbname=cashflow","root","");
                return $con;
            }catch(Exception $e){
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){
			    return $this->dbh->query("SET NAMES 'utf8'");
        }

    }
?>