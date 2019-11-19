<?php 
$I = new FunctionalTester($scenario);
$I->am('a Laravel developer');
$I->wantTo('know if Laravel installed successfully');

$I->amOnPage('/');
$I->see('You have arrived');