<?php  
require_once 'DB.php';
require $_SERVER['DOCUMENT_ROOT'].'/blexr_test/conf/configuration.php';
error_reporting(E_ERROR | E_NOTICE);

class Odd{
    /*
     * load table of Odds
     * */
	public function getOddsConversionTable(){
        /*$db = new DB();
        $db->connect();
        $result = $db->select("odds_chart", "");*/
        $link = mysqli_connect("localhost", "root", "", "blexr_odds_conv");

        if (!$link) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
        $query = mysqli_query($link,"SELECT Fractional_UK , Decimal_EU, Moneyline_US FROM odds_chart");
        $resultArray = array();
        while($row = mysqli_fetch_assoc($query))
        {
            array_push($resultArray, $row);
        }
        mysqli_close($link);
		return $resultArray;
	}
}

?>