<?php

//_____________________________________________________________________________________________
/**********************************************************************************************

	logfile tests
	
	@Author: Alexander Bassov
	@Email: blackxes@gmx.de
	@Github: https://www.github.com/Blackxes

/*********************************************************************************************/

require_once ( "./Source/Logfile.php" );

error_reporting( E_ALL & ~E_NOTICE );

$logfile = new \Logfile\Logfile();

print_r("<p>---------------------</p>");
print_r("<p>Log simple message</p>");
$logfile->log("simple message");

print_r("<p>---------------------</p>");
print_r("<p>Log with return</p>");
print_r("<p>Return value should be 450: {$logfile->logReturn("another simple message", 450)}</p>");

print_r("<p>---------------------</p>");
print_r("\n" . "Log detailed");
$logfile->logFull( "detailed message", "error", 404 );

print_r("<p>---------------------</p>");
print_r("<p>Log detailed return</p>");
print_r("<p>Return value should be 650: {$logfile->logReturnFull("another detailed message", "success", 200, 650)}</p>");

print_r("<p>Print Logs</p>");

foreach( $logfile->getOpenLogs() as $index => $log )
	echo "<p>Message {$log->getType()}: {$log->getMessage()} ({$log->getCode()})</p>";

echo '<pre>';
	print_r($logfile->getClosedLogs());
echo '</pre>';

//_____________________________________________________________________________________________
//