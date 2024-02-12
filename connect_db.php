<?php
date_default_timezone_set("Asia/Kolkata");
$server = 'localhost';  
$user = 'cpadmin'; 
$pass = 'radaradmin@2023';  
 

$db = 'cp_db2';
$running_on_localhost = strpos($_SERVER["HTTP_HOST"],'localhost')!==false ? true : false;
if($running_on_localhost)
{
	$user="root";
	$pass="root";
	$db = 'cp_db2';
} 
$avoid_sending_SMS_from_localhost=false;
// Connect to Database 
$connection = mysqli_connect($server, $user, $pass)  or die ("Could not connect to server ... \n" . mysqli_connect_error ()); 
//mysqli_query($connection,'SET character_set_results=utf8');
//mysqli_query($connection,'SET names=utf8');
//mysqli_query($connection,'SET character_set_client=utf8');
mysqli_query($connection,'SET character_set_connection=utf8');
//mysqli_query($connection,'SET character_set_results=utf8');
//mysqli_query($connection,'SET collation_connection=utf8_general_ci');
mysqli_select_db($connection,$db)  or die ("Could not connect to database ... \n" . mysqli_connect_error ());
executed_sql("SET GLOBAL sql_mode = TRADITIONAL;");

function fnWriteLog($pMessage)
{
	$dt_tm = date("Y-m-d H:i:s");
    $myfile = fopen("theLog1.txt", "a");
    $txt = $dt_tm;
    $txt = $pMessage. "\n";
    fwrite($myfile, $txt);
    fclose($myfile);   
}
function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    }else{
        return 0;
    }
}
function rank_desc($pRank)
{
    $ranks=explode(",",",D1,D2,D3,D4,M,GM,AM,DM,GDM,CDM,CCDM,DCDM,MCDM");
    return $ranks[$pRank];
} 
 function is_duplicate_data($tbl_name,$fld_name,$fld_value)
{
    global $connection;
    $sql = "select ".$fld_name." from ".$tbl_name." where ".$fld_name."='".$fld_value."';";  
    if($result=mysqli_query($connection,$sql))
	{
        if(mysqli_num_rows($result)>0)
        {
            return true;
        }
    }
    return false;
}
function log_this($txt)
{
    $dt_tm = date("Y-m-d H:i:s");
    file_put_contents("sqls.txt",$dt_tm." ".$txt.PHP_EOL,FILE_APPEND | LOCK_EX);
}
function executed_sql($sql)
{
    global $connection;
    log_this($sql);
    mysqli_query($connection,$sql);
    if(mysqli_affected_rows($connection)>0)
        return true;
    else
    {
        log_this("Failed");
        return false;
    }
}
function genOTP($pMobileNo,$distributorId)
{
    global $running_on_localhost,$avoid_sending_SMS_from_localhost;
     

	$otp=mt_rand(100000, 999999);
	
    $sql="select distributor_id from member_info where distributor_id='".$distributorId."' ";     
    if(!is_duplicate_data("member_info","distributor_id",$distributorId))
    {
        $sql="insert into member_info(distributor_id) values('".$distributorId."');";
        executed_sql($sql);	
    }
        $sql="Update member_info set otp='".$otp."' ,otp_created_dt_tm='".date("Y-m-d H:i:s")."' where distributor_id='".$distributorId."' ";
        executed_sql($sql);	
    $response='';
    if(!$running_on_localhost || $avoid_sending_SMS_from_localhost)
    {
        $sms_msg=$otp.' is the OTP for validating your mobile number.';
        $URL='http://infinitesms.in/api/v4/?api_key=A8c79dae8e86f5e4e60ae7ebf7d906497&method=sms&message='. urlencode($otp.' is the OTP for validating your mobile number.'.PHP_EOL.PHP_EOL.'-ConyBio').'&to='.$pMobileNo.'&sender=CONYBI';
        
        $URL='https://instantalerts.co/api/web/send?apikey=1160vplhkj586ld8a991s20ug3k645w2j9x&method=sms&message='. urlencode($otp.' is the OTP for validating your mobile number - Conybio').'&to='.$pMobileNo.'&sender=CONYBI';
        
        $log_str=date("Y-m-d H:i:s"). " [".$pMobileNo.']  '.$sms_msg;
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $URL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $err      = curl_error($curl);
        curl_close($curl);
        file_put_contents("a_sms_response.txt",$log_str . " --- ".$response.PHP_EOL,FILE_APPEND);
    }
    else
    {
        $response='"code":200,';
    }
    if(strpos($response,'AWAITED-DLR') !== false || strpos($response,'"code":200,') !== false || strpos($response,'"status":"OK"') !== false)
    {
        return true;
    }
    else
    {
        return false;
    }
}
    function sendWelcomeMessage($pMobileNo,$distributorId)
	{
		global $running_on_localhost,$avoid_sending_SMS_from_localhost; 
		$response='';
		if(!$running_on_localhost || $avoid_sending_SMS_from_localhost)
		{
			$sms_msg='Congrats! Welcome to CONYBIO. Your ID No. is '.$distributorId.'. May you find good health & financial Success. Keep Touching peoples life. Happy Networking.';
			$URL='https://instantalerts.co/api/web/send?apikey=1160vplhkj586ld8a991s20ug3k645w2j9x&method=sms&message='. urlencode('Congrats! Welcome to CONYBIO. Your ID No. is '.$distributorId.'. May you find good health & financial Success. Keep Touching peoples life. Happy Networking.').'&to='.$pMobileNo.'&sender=CONYBI';
			
			$log_str=date("Y-m-d H:i:s"). " [".$pMobileNo.']  '.$sms_msg;
			
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $URL);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl);
			$err      = curl_error($curl);
			curl_close($curl);
			file_put_contents("a_sms_response.txt",$log_str . " --- ".$response.PHP_EOL,FILE_APPEND);
		} 
	}
?>