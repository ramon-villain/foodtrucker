<?php

function dataSpotFront($dia, $hora = null){
	$hoje = date('Y-m-d');
	$final = new DateTime($dia.' '. $hora);
	if($dia == $hoje){
		$dia = 'HOJE';
		if($hora == null){
			return $dia;
		}
		$hora = new DateTime($hora);
		return $dia. $hora->format(' - H:i');
	}else{
		if($hora == null){
			return $final->format('d/m');
		}
		return $final->format('d/m - H:i');
	}
}
function dataEvento($data){
	$data = explode('-', $data);
	$mes = $data[1];
	$dia = $data[2];
	return "<span class='dia'>$dia</span><span class='mes'>$mes</span>";
}

function respostaServico($status){
	if($status == 1){
		return "<i class='fa fa-check'></i>";
	}else{
		return "<i class='fa fa-times'></i>";
	}
}