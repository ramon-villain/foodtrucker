<?php

function dataSpotFront($dia, $hora){
	$final = new DateTime($dia.' '. $hora);
	return $final->format('d/m - h:i');
}
function dataEvento($data){
	$data = explode('-', $data);
	$mes = $data[1];
	$dia = $data[2];
	return "<span class='dia'>$dia</span><span class='mes'>$mes</span>";
}