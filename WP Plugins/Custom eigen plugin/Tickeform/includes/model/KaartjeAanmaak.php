<?php
/**
* Description of KaartjeAanmaak
*
* @author Niels van Hamme
*/
class KaartjeAanmaak {
	/**
	 * getPostValues :
	 * Filter input and retrieve POST input params
	 *
	 * @return array containing known POST input fields
	 */
	 public function getPostValues(){

	 // Define the check for params
	 $post_check_array = array (
	 // submit action
	 'add' => array('filter' => FILTER_SANITIZE_STRING ),

	 'update' => array('filter' => FILTER_SANITIZE_STRING ),

	 // List all update form fields !!!
	 //
	 //  kaartjenaam.
	 'kaartjenaam' => array('filter' => FILTER_SANITIZE_STRING ),
	 // Help text
	 'beschrijving' => array('filter' => FILTER_SANITIZE_STRING ),

	 // Id of current row
	 'id' => array( 'filter' => FILTER_VALIDATE_INT )
	 );
	 // Get filtered input:
	 $inputs = filter_input_array( INPUT_POST, $post_check_array );
	 // RTS
	 return $inputs;
	 }
	 /**
	* 
	* @global type $wpdb The WordPress database class
	* @param type $input_array containing insert data
	* @return boolean TRUE on succes OR FALSE
	*/
	public function save($input_array){
	try {
	if ( !isset($input_array['kaartjenaam']) OR !isset($input_array['beschrijving'])){
	 
	// Mandatory fields are missing
	throw new Exception(__("Missing mandatory fields"));
	}
	 
	if (  (strlen($input_array['kaartjenaam']) < 1) OR (strlen($input_array['beschrijving']) < 1) ){
	 
	// Mandatory fields are empty
	throw new Exception( __("Empty mandatory fields") );  
	}
	 
	global $wpdb;
	 
	// Insert query
	$wpdb->query($wpdb->prepare("INSERT INTO `". $wpdb->prefix .
	"tf_kaartjes_aanmaak` ( `kaartjenaam`, `beschrijving`)".
	" VALUES ( '%s', '%s');",$input_array['kaartjenaam'], 
	$input_array['beschrijving']) );
	 
	// Error ? It's in there:
	if ( !empty($wpdb->last_error) ){
	$this->last_error = $wpdb->last_error;
	return FALSE;
	}
	 
	/*
	echo '<pre>';
	echo __FILE__.__LINE__.'<br />';
	var_dump($wpdb);
	echo '</pre>';
	/
	/*/
	 
	//echo 'Insert kaartjenaam and beschrijving for this kaartje:"'.$input_array['kaartjenaam'].
	//        '"-"'. $input_array['beschrijving'].'"<br />';
	 
	} catch (Exception $exc) {
	// @todo: Add error handling
	echo '<pre>'. $exc->getTraceAsString() .'</pre>';
	}
	 
	return TRUE;
	 
	}
	 /**
	 *
	 * @return int number of cards stored in db
	 */
	 public function getNrOfKaartjesAanmaak(){
	 global $wpdb;

	 $query = "SELECT COUNT(*) AS nr FROM `". $wpdb->prefix
	 ."tf_kaartjes_aanmaak`";
	 $result = $wpdb->get_results( $query, ARRAY_A );

	 return $result[0]['nr'];
	 }
	 /**
	* 
	* @return type
	*/
	public function getCardList(){
	global $wpdb;
	$return_array = array();
	$result_array = $wpdb->get_results( "SELECT * FROM `". $wpdb->prefix . "tf_kaartjes_aanmaak` ORDER BY `id_kaartje`", ARRAY_A);
	/*
	echo '<pre>';
	echo __FILE__.__LINE__.'<br />';
	var_dump($result_array);
	echo '</pre>';
	//*/
	 
	// For all database results:
	foreach ( $result_array as $idx => $array){
	 
	// New object
	$kaart = new KaartjeAanmaak();
	 
	// Set all info
	$kaart->setKaartjeNaam($array['kaartjenaam']);
	$kaart->setId($array['id_kaartje']);
	$kaart->setBeschrijving($array['beschrijving']);
	 
	// Add new object toe return array.
	$return_array[] = $kaart;
	}
	return $return_array;
	}
	
	public function kaartjesSchema(){
	global $wpdb;
	$return_array = array();
	$result_array = $wpdb->get_results( "SELECT * FROM `". $wpdb->prefix . "tf_kaartjes_aanmaak` ORDER BY `id_kaartje`", ARRAY_A);
	/*
	echo '<pre>';
	echo __FILE__.__LINE__.'<br />';
	var_dump($result_array);
	echo '</pre>';
	//*/
	 
	// For all database results:
	foreach ( $result_array as $idx => $array){
	 
	// New object
	$schema = new KaartjeAanmaak();
	 
	// Set all info
	$schema->setId($array['id_kaartje']);
	$schema->setKaartjeNaam($array['kaartjenaam']);
	$schema->setBeschrijving($array['beschrijving']);
	 
	// Add new object toe return array.
	$return_array[] = $schema;
	}
	return $return_array;
	}
	
	public function bestellingSchema(){
	global $wpdb;
	$return_array = array();
	$result_array = $wpdb->get_results( "SELECT * FROM `". $wpdb->prefix . "tf_kaartjes` ORDER BY `id_kaart`", ARRAY_A);
	/*
	echo '<pre>';
	echo __FILE__.__LINE__.'<br />';
	var_dump($result_array);
	echo '</pre>';
	//*/
	// For all database results:
	foreach ( $result_array as $idx => $array){
	 
	// New object
	$schema = new KaartjeAanmaak();
	 
	// Set all info
	$schema->setId($array['id_kaart']);
	$schema->setNaam($array['naam']);
	$schema->setKaartjeId($array['kaartje']);
	$schema->setEmail($array['email']);
	$schema->setAdres($array['adres']);
	$schema->setWoonplaats($array['woonplaats']);
	$schema->setPostcode($array['postcode']);
	$schema->setDatum($array['datum']);
	 
	// Add new object toe return array.
	$return_array[] = $schema;
	}
	return $return_array;
	}
	
	// THIS IS THE SCHEME FOR BESTELLINGEN LIJST.php (SET THE DATA)
	
	public function setKaartjeId( $kaartjeID ){
	if ( is_int(intval($kaartjeID) ) ){
	$this->kaartjeID = $kaartjeID;
	}
	}
	
	public function setNaam( $naam ){
	if ( is_string( $naam )){
	$this->naam = trim($naam);
	}
	}
	
	public function setEmail( $email ){
	if ( is_string( $email )){
	$this->email = trim($email);
	}
	}
	
	public function setAdres( $adres ){
	if ( is_string( $adres )){
	$this->adres = trim($adres);
	}
	}
	
	public function setWoonplaats( $woonplaats ){
	if ( is_string( $woonplaats )){
	$this->woonplaats = trim($woonplaats);
	}
	}
	
	public function setPostcode( $postcode ){
	if ( is_string( $postcode )){
	$this->postcode = trim($postcode);
	}
	}
	
	public function setDatum( $datum ){
	if ( is_string( $datum )){
	$this->datum = trim($datum);
	}
	}
	
	// THIS IS THE SCHEME FOR BESTELLINGEN LIJST.php (GET THE DATA)
	
	public function getKaartjeId(){
	return $this->kaartjeID;
	}
	
	public function getNaam(){
	return $this->naam;
	}
	
	public function getEmail(){
	return $this->email;
	}
	
	public function getAdres(){
	return $this->adres;
	}
	
	public function getWoonplaats(){
	return $this->woonplaats;
	}
	
	public function getPostcode(){
	return $this->postcode;
	}
	
	public function getDatum(){
	return $this->datum;
	}
	
	/**
	* 
	* @param type $id Id of the card
	*/
	public function setId( $id ){
	if ( is_int(intval($id) ) ){
	$this->id = $id;
	}
	}
	 
	/**
	* 
	* @param type $kaartjenaam kaartjenaam of the card
	*/
	public function setKaartjeNaam( $kaartjenaam ){
	if ( is_string( $kaartjenaam )){
	$this->kaartjenaam = trim($kaartjenaam);
	}
	}
	 
	/**
	* 
	* @param type $desc The help text of the card
	*/
	public function setBeschrijving ($beschrijving){
	if ( is_string($beschrijving)){
	$this->beschrijving = trim($beschrijving);
	}
	}
	 /**
	* 
	* @return int The db id of this card
	*/
	public function getId(){
	return $this->id;
	}
	 
	/**
	* 
	* @return string The kaartjenaam of the card
	*/
	public function getKaartjeNaam(){
	return $this->kaartjenaam;
	}
	 
	/**
	* 
	* @return string The help text of the description
	*/
	public function getBeschrijving(){
	return $this->beschrijving;
	}
	
	/**
	 * getGetValues :
	 * Filter input and retrieve GET input params
	 *
	 * @return array containing known GET input fields
	 */
	 public function getGetValues(){
	 // Define the check for params
	 $get_check_array = array (
	 // Action
	 'action' => array('filter' => FILTER_SANITIZE_STRING ),

	 // Id of current row
	 'id' => array( 'filter' => FILTER_VALIDATE_INT )
	 );
	 // Get filtered input:
	 $inputs = filter_input_array( INPUT_GET, $get_check_array );
	 // RTS
	 return $inputs;
	 }
	 /**
	 * Check the action and perform action on :
	 * - delete
	 *
	 * @param type $get_array all get vars en values
	 * @return string the action provided by the $_GET array.
	 */
	 public function handleGetAction( $get_array ){
	 $action = '';

	 switch($get_array['action']){
	 case 'update':
	 // Indicate current action is update if id provided
	 if ( !is_null($get_array['id']) ){
	 $action = $get_array['action'];
	 }
	 break;

	 case 'delete':
	 // Delete current id if provided
	 if ( !is_null($get_array['id']) ){
	 $this->delete($get_array);
	 }
	 $action = 'delete';
	 break;
	 case 'delete':
	 // Delete current id if provided
	 if ( !is_null($get_array['id']) ){
	 $this->delete($get_array);
	 }
	 $action = 'delete';
	 break;
	 default:
	 // Oops
	 break;
	 }
	 return $action;
	 }
	 /**
	 *
	 * @global type $wpdb
	 * @return type string table kaartjenaam with wordpress (and app prefix)
	 */
	 private function getTableName(){

	 global $wpdb;
	 return $table = $wpdb->prefix . "tf_kaartjes_aanmaak";
	 }
	 /**
	 *
	 * @global type $wpdb Wordpress database
	 * @param type $input_array post_array
	 * @return boolean TRUE on Succes else FALSE
	 * @throws Exception
	 */
	 public function update($input_array){

	 try {
	 $array_fields = array('id', 'kaartjenaam', 'beschrijving');
	 $table_fields = array( 'id_kaartje', 'kaartjenaam' , 'beschrijving');
	 $data_array = array();

	 // Check fields
	 foreach( $array_fields as $field){

	 // Check fields
	 if (!isset($input_array[$field])){
	 throw new Exception(__("$field is mandatory for update."));
	 }
	 // Add data_array (without hash idx)
	 // (input_array is POST data -> Could have more fields)
	 $data_array[] = $input_array[$field];
	 }
	 global $wpdb;

	 // Update query
	 /*
	 $wpdb->query($wpdb->prepare("UPDATE ".$this->getTableName().
	 " SET `kaartjenaam` = '%s', `beschrijving` = '%s' ".
	"WHERE
	`wp_tf_kaartjes_aanmaak`.`id_kaartje` =%d;",$input_array['kaartjenaam'],
	$input_array['beschrijving'], $input_array['id']) );
	 /*/

	 // Replace form field id index by table field id kaartjenaam

	 $wpdb->update($this->getTableName(),
	 $this->getTableDataArray($data_array),
	 array( 'id_kaartje' => $input_array['id']), // Where
	 array( '%s', '%s' ), // Data format
	 array( '%d' )); // Where format
	 //*/

	 } catch (Exception $exc) {

	 // @todo: Fix error handlin
	 echo $exc->getTraceAsString();
	 $this->last_error = $exc->getMessage();
	 return FALSE;
	 }
	 return TRUE;
	 }
	 /**
	 * The function takes the input data array and changes the
	 * indexes to the column kaartjenaams
	 * In case of update or insert action
	 *
	 * @param type $input_data_array data array(id, kaartjenaam, descpription)
	 * @param type $action update | insert
	 * @return type array with collumn index and values OR FALSE
	 */
	 private function getTableDataArray($input_data_array, $action=''){

	 // Get the Table Column kaartjenaams.
	 $keys = $this->getTableColumnNames($this->getTableName());

	 // Get data array with table collumns
	 // NULL if collumns and data does not match in count
	 //
	 // Note: The order of the fields shall be the same for both!
	 $table_data = array_combine($keys, $input_data_array);

	 switch ( $action ){
	 case 'update': // Intended fall-through
	 case 'insert':
	 // Remove the index -> is primary key and can
	// therefore not be changed!
	 if (!empty($table_data)){
	 unset($table_data['id_kaartje']);
	 }
	 break;
	 // Remove
	 }
	 return $table_data;
	}
	 /**
	 * Get the column kaartjenaams of the specified table
	 * @global type $wpdb
	 * @param type $table
	 * @return type
	 */
	 private function getTableColumnNames($table){
	 global $wpdb;
	 try {
	 $result_array = $wpdb->get_results("SELECT `COLUMN_NAME` ".
	 " FROM INFORMATION_SCHEMA.COLUMNS".
	 " WHERE `TABLE_SCHEMA`='".DB_NAME.
	 "' AND TABLE_NAME = '".$this->getTableName() ."'", ARRAY_A);
	 $keys = array();
	 foreach ( $result_array as $idx => $row ){
	 $keys[$idx] = $row['COLUMN_NAME'];
	 }
	 return $keys;
	 } catch (Exception $exc) {

	 // @todo: Fix error handlin
	 echo $exc->getTraceAsString();
	 $this->last_error = $exc->getMessage();
	 return FALSE;
	 }
	 }
	 /**
	 *
	 * @global type $wpdb The Wordpress database class
	 * @param type $input_array containing delete id
	 * @return boolean TRUE on succes OR FALSE
	 */
	 public function delete($input_array){

	 try {
	 // Check input id
	 if (!isset($input_array['id']) )
	 throw new Exception(__("Missing mandatory fields") );
	 global $wpdb;
	 // Delete query
	 /*
	 $query = $wpdb->prepare("Delete FROM `". $this->getTableName().
	"` WHERE `id_kaartje` = %d", $input_array['id']);
	 // Execute query:
	 $wpdb->query( $query );
	 /*/
	 // Delete row by provided id (Wordpress style)
	 $wpdb->delete( $this->getTableName(),
	array( 'id_kaartje' => $input_array['id'] ),
	array( '%d' ) ); // Where format
	 //*/

	 // Error ? It's in there:
	 if ( !empty($wpdb->last_error) ){

	 throw new Exception( $wpdb->last_error);
	 }


	 } catch (Exception $exc) {
	 // @todo: Add error handling
	 echo '<pre>';
	 $this->last_error = $exc->getMessage();
	 echo $exc->getTraceAsString();
	 echo $exc->getMessage();
	 echo '</pre>';
	 }
	 return TRUE;
	 }
}
?>