<?php

function dataSpotFront($dia, $hora){
	$hoje = date('Y-m-d');
	$final = new DateTime($dia.' '. $hora);
	if($dia == $hoje){
		$dia = 'HOJE';
		$hora = new DateTime($hora);
		return $dia. $hora->format(' - h:i');
	}else{
		return $final->format('d/m - h:i');
	}
}
function dataEvento($data){
	$data = explode('-', $data);
	$mes = $data[1];
	$dia = $data[2];
	return "<span class='dia'>$dia</span><span class='mes'>$mes</span>";
}