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

function dataSpotFront($dia, $inicio = null, $fim = null){
	$fim_dt = new DateTime($fim);
	$fim = $fim_dt->format('H:i');
	$inicio_dt = new DateTime($inicio);
	$inicio = $inicio_dt->format('H:i');
	$dia_dt = new DateTime($dia);
	$dia = $dia_dt->format('Y-m-d');
	$hoje_dt = new DateTime('today');
	$hoje = $hoje_dt->format('Y-m-d');
	$amanha_dt =  new DateTime('tomorrow');
	$amanha = $amanha_dt->format('Y-m-d');

	if($dia == $hoje){
		$dia = 'HOJE';
	}elseif ($dia == $amanha){
		$dia = 'AMANHÃ';
	}else{
		$dia = $dia_dt->format('d/m');
	}
	if($inicio == null){
		return $dia_dt->format('d/m');
	}elseif ($fim == null){
		return $dia.' - '. $inicio;
	}else{
		return $dia.' - '. $inicio.' às '.$fim;
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