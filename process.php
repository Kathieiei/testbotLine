
<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'rondingt');

    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert($name_w, $name_d, $location_f, $location_l) {
            $result = mysqli_query($this->dbcon, "INSERT INTO worktod(name_w,name_d,location_f,location_l) VALUES('$name_w', '$name_d', '$location_f', '$location_l')");
            return $result;
        }
        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM worktod");
            return $result;
        }
    }

?>