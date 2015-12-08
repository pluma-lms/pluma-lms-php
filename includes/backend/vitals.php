/**
 * Pluma
 * Vitals
*/

require_once ( 'database.php' );

class vitals {
  
  private $dbconnector;
  private $db;
  
  public function __construct( $database ) {
    $this->db = $database;
  }
  public function database_connect() {
    $this->db = $db->connect()[0];
  }
  public function database_action( $database_action ) {
    $this->db = "do something??!!";
  }
  public function set_vitals( $setting_name, $setting_value ) {
    $this->database_action();
  }
  
