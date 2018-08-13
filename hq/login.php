<?php
/*Master Admin Level 0*/
$admin=array("");
/*Training Admin Level 1*/
$tadmin=array("");
/*Event Admin Level 2*/
$eadmin=array("");
// a session is required to store the token details in
session_start();

ini_set('error_reporting', E_ALL);
ini_set("display_errors", 1);

require('OAuth.php');
require('SSO.class.php');
require('config.php');

// initiate the SSO class with consumer details and encryption details
$SSO = new SSO($sso['base'], $sso['key'], $sso['secret'], $sso['method'], $sso['cert']);

// return variable is needed later in this script
$sso_return = $sso['return'];
// remove other config variables
unset($sso);

// if VATSIM has redirected the member back
if (isset($_GET['return']) && isset($_GET['oauth_verifier']) && !isset($_GET['oauth_cancel'])){
    // check to make sure there is a saved token for this user
    if (isset($_SESSION[SSO_SESSION]) && isset($_SESSION[SSO_SESSION]['key']) && isset($_SESSION[SSO_SESSION]['secret'])){
        
        /*
         * NOTE: Always request the user data as soon as the member is sent back and then redirect the user away
         */
        
        echo '<a href="index.php">Return</a><br />';
        
        if (@$_GET['oauth_token']!=$_SESSION[SSO_SESSION]['key']){
            echo '<p>Returned token does not match</p>';
            die();
        }
        
        if (@!isset($_GET['oauth_verifier'])){
            echo '<p>No verification code provided</p>';
            die();
        }
        
        // obtain the details of this user from VATSIM
        $user = $SSO->checkLogin($_SESSION[SSO_SESSION]['key'], $_SESSION[SSO_SESSION]['secret'], @$_GET['oauth_verifier']);
        
        if ($user){
            // One-time use of tokens, token no longer valid
            unset($_SESSION[SSO_SESSION]);
            
            // Output this user's details
            echo '<p>Login Success</p>';
            echo '<pre style="font-size: 11px;">';
                /*
                 * NOTE: In a live environment, save these details and then redirect the user
                 */
                                $_SESSION['username'] = $user->user->id;
	                            $_SESSION['firstname'] = $user->user->name_first;
	                            $_SESSION['lastname'] = $user->user->name_last;
	                            $_SESSION['email'] = $user->user->email;
	                            $_SESSION['atc_rating_id'] = $user->user->rating->id;
	                            $_SESSION['atc_rating'] = $user->user->rating->GRP;
	                            $_SESSION['reg_date'] = $user->user->reg_date;
	                            $_SESSION['region_code'] = $user->user->region->code;
 	                            $_SESSION['region_name'] = $user->user->region->name;
   	                            $_SESSION['division_code'] = $user->user->division->code;
                                $_SESSION['division_name'] = $user->user->division->name;
                                $_SESSION['subdivision_code'] = $user->user->subdivision->code;
                                $_SESSION['subdivision_name'] = $user->user->subdivision->name;
                                $_SESSION['pilot_rating'] = $user->user->pilot_rating->rating;
                                
                                
                                
                                if(in_array($_SESSION['username'], $admin,TRUE))
                                {
                                    $_SESSION['role']='0';
                                }
                                elseif(in_array($_SESSION['username'], $tadmin,TRUE))
                                {
                                    $_SESSION['role'] ='1';
                                }
                                 elseif(in_array($_SESSION['username'], $eadmin))
                                {
                                    $_SESSION['role'] ='2';
                                }
                                else
                                {
                                    $_SESSION['role'] ='9';
                                }
                                
                                $db = new mysqli('localhost','vatsimwa','ml+~Karw[4%h','vatsimwa_hq');
                                if($db->connect_errno)
                                {
                                	die('Sorry , We are having some problems');
                                }
                                
                                $vatsimid = $user->user->id;
                                $fname = $user->user->name_first;
                                $lname = $user->user->name_last;
                                $sql = "INSERT INTO log(vatsimid,fname,lname,log_time) VALUES ('$vatsimid','$fname','$lname',NOW())";
                                if ($result = $db->query($sql)) {
                                
                                header("Location: division/");
                                }
                                else
                                {
                                    echo "Error with HQ. Please Contact Division Director";
                                }

            echo '</pre>';
            
            // do not proceed to send the user back to VATSIM
            die();
        } else {
            // OAuth or cURL errors have occurred, output here
            echo '<p>An error occurred</p>';
            $error = $SSO->error();

            if ($error['code']){
                echo '<p>Error code: '.$error['code'].'</p>';
            }

            echo '<p>Error message: '.$error['message'].'</p>';
            
            // do not proceed to send the user back to VATSIM
            die();
        }
    } 
// the user cancelled their login and were sent back
} else if (isset($_GET['return']) && isset($_GET['oauth_cancel'])){
    echo '<a href="index.php">Start Again</a><br />';
    
    echo '<p>You cancelled your login.</p>';
    
    die();
}

// create a request token for this login. Provides return URL and suspended/inactive settings
$token = $SSO->requestToken($sso_return, false, false);

if ($token){
    
    // store the token information in the session so that we can retrieve it when the user returns
    $_SESSION[SSO_SESSION] = array(
        'key' => (string)$token->token->oauth_token, // identifying string for this token
        'secret' => (string)$token->token->oauth_token_secret // secret (password) for this token. Keep server-side, do not make visible to the user
    );
    
    // redirect the member to VATSIM
    $SSO->sendToVatsim();
    
} else {
    
    echo '<p>An error occurred</p>';
    $error = $SSO->error();
    
    if ($error['code']){
        echo '<p>Error code: '.$error['code'].'</p>';
    }
    
    echo '<p>Error message: '.$error['message'].'</p>';
    
}

?>
