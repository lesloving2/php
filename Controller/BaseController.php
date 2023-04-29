<?PHP
class BaseController
{
    public $load = array();
    public function __construct()
    {
        $this->load = new Load();
    }
}
