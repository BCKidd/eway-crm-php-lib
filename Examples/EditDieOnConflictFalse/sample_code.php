<?php

    // Load API
    require_once "../../eway.class.php";
    
    // Connect to API and set dieOnItemConflict to false
    $connector = new eWayConnector('https://trial.eway-crm.com/31994', 'api', 'ApiTrial@eWay-CRM');
    
    // Lets create new company to have something to edit
    $company = array(
                        'FileAs' => 'Monsters Inc.', 
                        'CompanyName' => 'Monsters Inc.',
                        'Purchaser' => "1",
                        'Phone' => '544 727 379',
                        'Email' => 'info@monsters.com',
                        );

    // Try to save new company
    $companyGuid = $connector->saveCompany($company)->Guid;
	var_dump($connector->searchCompanies($company));
    
    // Edited company fields
    $company = array(
                        'ItemGUID' => $companyGuid,
                        'Phone' => '',
                        'Email' => 'support@monsters.com',
                        );
    
    // Try to edit new company
    $connector->saveCompany($company);
	
	// Load and print data
	$company = array('ItemGUID' => $companyGuid);
	var_dump($connector->searchCompanies($company));
    
?>