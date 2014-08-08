<?php

function dataMapFront($abertura, $inicio, $encerramento, $fim){
	$encerramento = new DateTime($encerramento);
	$hoje = date('Y-m-d');
	$fim = new DateTime($fim);
	$inicio = new DateTime($inicio);
	if($hoje === $encerramento->format('Y-m-d')){
		return 'Das <b>'.$inicio->format('H:i').'</b> às <b>'. $fim->format('H:i') .'</b>';
	}else{
		return 'Das <b>'.$inicio->format('H:i').'</b> até dia <b>'.$encerramento->format('d/m'). '</b> às <b>'. $fim->format('H:i') .'</b>';
	}
}

function dataSpotFront($dia, $hora = null){
	$hoje = date('Y-m-d');
	$amanha =  new DateTime('tomorrow');
	$final = new DateTime($dia.' '. $hora);
	if($dia == $hoje){
		$dia = 'HOJE';
		if($hora == null){
			return $dia;
		}
		$hora = new DateTime($hora);
		return $dia. $hora->format(' - H:i');
	}elseif($dia == $amanha->format('Y-m-d')){
		$dia = 'AMANHÃ';
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

function getSlugFromNome($nome){
	$slug = DB::table('trucks')->where('nome', $nome)->pluck('slug');
	return $slug;
}

function getID($nome){
	$id = DB::table('trucks')->where('nome', $nome)->pluck('id');
	return $id;
}