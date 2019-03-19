
# Creating items with dieOnItemConflict detection disable

First we prepare company attributes that we want to save and set ItemVersion to 1. This signalize that company is new and should be created. Api checks for existence of item with acoarding  GUID does exist. If yes, items are merged, if not, item is created. Because ItemVersion does not change before second saving, merge will occur, due to item has already been created. If you increase item version before saving, item will be overwritten by new attributes and merge will not occur.

```php

// Connect to API
$connector = new eWayConnector('https://trial.eway-crm.com/31994', 'api', 'ApiTrial@eWay-CRM');
    
// This is new company, that we want to create
$newCompany = array(
					'ItemGUID' => 'ebdd18f3-92e9-412d-afec-e1aaf6139b09',
					'FileAs' => 'Monsters Inc.', 
					'CompanyName' => 'Monsters Inc.',
					'Purchaser' => '1',
					'Phone' => '131 522 348',
					'Email' => 'info@monsters.com',
					'ItemVersion' => '1'
					);

// Try to save new company
$connector->saveCompany($newCompany);

```

In conclusion, creating item with same GUID as existing item will behave as editing.

## Sample code
To see the whole sample code click [here](sample_code.php)