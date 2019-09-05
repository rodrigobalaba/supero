<?php 

function my_exec($cmd, $input='') {
	$proc=proc_open($cmd, array(0=>array('pipe', 'r'), 1=>array('pipe', 'w'), 2=>array('pipe', 'w')), $pipes); 
	fwrite($pipes[0], $input);
	fclose($pipes[0]); 
	$stdout=stream_get_contents($pipes[1]);
	fclose($pipes[1]); 
	$stderr=stream_get_contents($pipes[2]);
	fclose($pipes[2]); 
	$rtn=proc_close($proc); 
	return array('stdout'=>$stdout, 'stderr'=>$stderr, 'return'=>$rtn ); 
} 
echo "<pre>";
var_export(my_exec('mv vendor vendor_bkp')); 
var_export(my_exec('rm -rf vendor')); 
var_export(my_exec('export PATH=$PATH:/opt/rh/rh-php70/root/usr/bin && export COMPOSER_HOME=/var/www/2005522/api && /usr/local/bin/composer install --ignore-platform-reqs')); 
echo "</pre>";

/*echo '<pre>';


//echo ( exec('mkdir pasta_nova', $retval));

$last_line = system('ls -lart', $retval);

echo ( exec('rm -r api', $retval));


$last_line = system('ls -lart', $retval);

// Mostrando informação adicional
echo '
</pre>';
*/
?>

