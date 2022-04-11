<?php

$foo = null;

if(is_null($foo)){
	echo 'foo is null!'."\n";
}else{
	echo 'foo is not null!'."\n";
}

if($foo != NULL){
	echo 'foo is not null!'."\n";
}else{
	echo 'foo is null!'."\n";
}