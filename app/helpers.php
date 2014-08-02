<?php

function dataSpotFront($dia, $hora){
	$final = new DateTime($dia.' '. $hora);
	return $final->format('d/m - h:i');
}