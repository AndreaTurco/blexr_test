<?php  
require_once __DIR__.'/../conf/db_connection.php';

class Odd{
    /*
     * load table of Odds
     * */
	public function getOddsConversionTable(){
        global $link;

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