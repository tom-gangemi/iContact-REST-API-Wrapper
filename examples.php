<?php

// An example of creating some contacts, creating a list, adding contacts to that list and then deleting the list.


require_once 'inc/iContact.php';

// Create instance
$iContact = new iContact(
		'https://app.icontact.com/icp',		// apiUrl
		'xxxxxxxxxxxxxx',					// username
		'xxxxxxxxxxx',						// password
		'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',	// appId
		000000,								// accountId
		0000,								// clientFolderId
		true								// debug mode
);

$welcomeEmailId = 'xxxxxx';
$listName = 'Api Test List';

$contacts[] = array('email'=>'example01@example.com');
$contacts[] = array('email'=>'example02@example.com');
$contacts[] = array('email'=>'example03@example.com');

// Create the contacts and get their ids
$contactIds = $iContact->createContacts($contacts);

// Create a list (a list requires a welcome email to be attached, by default it is not activated though)
$listId = $iContact->createList($listName, $welcomeEmailId);

// Add contacts to new list
$iContact->subscribeContactsToList($listId, $contactIds);

// Delete list (the iContact platform will also delete contacts if they don't exist in any other lists)
$iContact->deleteList($listId);


?>