<?php

if (!defined("WHMCS"))
	die("This file cannot be accessed directly");

function userengage_config() {
    $configarray = array(
    "name" => "UserEngage",
    "description" => "Bringing you full-featured UserEngage Saas marketing tool.<br>Find your <a href=\"https://app.userengage.io/clients/integration/\" target=\"_blank\"><b>Api Key here</b></a>",
    "version" => "1.0",
    "author" => "UserEngage",
    "website" => "www.userengage.io",
    "language" => "english",
    "fields" => array(
      "apikey" => array(
    	"FriendlyName" => "Api Key",
    	"Type" => "text",
    	"Size" => "64",
    	"Description" => "",
    	"Default" => ""
			)
    ));
    return $configarray;
}

function userengage_activate() {
    # Return Result
    return array('status'=>'success','description'=>'Module was installed. Click configure to place in tracking code.');
    return array('status'=>'error','description'=>'There was an error on activation.');
    return array('status'=>'info','description'=>'There may be a problem.');

}

function userengage_deactivate() {
    # Return Result
    return array('status'=>'success','description'=>'UserEngage Module has been succesfully deactivated.');
    return array('status'=>'error','description'=>'There was an error deactivating UserEngage Module.');
    return array('status'=>'info','description'=>'There may be a problem.');

}

function userengage_upgrade($vars) {

}

function userengage_output($vars) {

	echo "To configure, go to Setup -> Addon Modules -> UserEngage -> Cofigure.";

}

function userengage_sidebar($vars) {

}
