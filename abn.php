<?
//to set abn, visit localhost/abn.php?abn=TYPEABNHERE
//example of true ABN: 45146737591 (B&D)
//example of false, but 11 digit ABN: 12345678901
$abn = $_GET['abn'];
//if you cbf using GET, then uncomment one of the next lines
// $abn='45146737591' //true
// $abn='12345678901' //false

function ValidateABN($abn)
{
    $weights = array(10, 1, 3, 5, 7, 9, 11, 13, 15, 17, 19);
 
    // strip anything other than digits
    $abn = preg_replace("/[^\d]/","",$abn);
 
    // check length is 11 digits
    if (strlen($abn)==11) {
        // apply ato check method 
        $sum = 0;
        foreach ($weights as $position=>$weight) {
            $digit = $abn[$position] - ($position ? 0 : 1);
            $sum += $weight * $digit;
        }
        return ($sum % 89)==0;
    } 
    return false;
};
echo ValidateABN($abn) ? 'true': 'false';

?>