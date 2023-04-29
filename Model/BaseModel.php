<?PHP
class  BaseModel
{
    public $db = array();
    public function __construct()
    {
        $connect = 'mysql:dbname=test;host=localhost';
        $username = 'root';
        $pass = '';
        $this->db = new database($connect, $username, $pass);
    }
}
