@extends('layouts.app')

@section('title', 'Editar Report')

@section('content')

<form method="POST" action="/report/{{ $report->id }}" style="margin-bottom: 1em;">
    @method('PATCH')
    @csrf

    <label for="name"><h4>Titulo do report</h4></label>
    <input type="text" maxlength="50" class = "form-control {{ $errors->has('title') ? 'is-danger' : ''}}" name="title" value="{{$report->title}}" required>

<label for="report_type"><h4>Tipo de Report</h4></label>
<select class="dropdown-item {{ $errors->has('report_type') ? 'is-danger' : ''}}" name="report_type" required>
        @if($report->report_type == 1)
        <option value="1" selected>Exploracao Sexual</option>
        <option value="2">Exploracao de Trabalho</option>
        <option value="3">Casamento Forcado</option>
        <option value="4">Criminalidade Forcado</option>
        <option value="5">Criancas Soldados</option>
        <option value="6">Trafico de Orgaos</option>
        <option value="7">Trafico de Criancas</option>
        <option value="8">Trafico de Adultos</option>
        <option value="9">Outro Tipo de Trafico</option>

        @elseif($report->report_type == 2)
        <option value="1">Exploracao Sexual</option>
        <option value="2" selected>Exploracao de Trabalho</option>
        <option value="3">Casamento Forcado</option>
        <option value="4">Criminalidade Forcado</option>
        <option value="5">Criancas Soldados</option>
        <option value="6">Trafico de Orgaos</option>
        <option value="7">Trafico de Criancas</option>
        <option value="8">Trafico de Adultos</option>
        <option value="9">Outro Tipo de Trafico</option>

        @elseif($report->report_type == 3)
        <option value="1">Exploracao Sexual</option>
        <option value="2">Exploracao de Trabalho</option>
        <option value="3" selected>Casamento Forcado</option>
        <option value="4">Criminalidade Forcado</option>
        <option value="5">Criancas Soldados</option>
        <option value="6">Trafico de Orgaos</option>
        <option value="7">Trafico de Criancas</option>
        <option value="8">Trafico de Adultos</option>
        <option value="9">Outro Tipo de Trafico</option>

        @elseif($report->report_type == 4)
        <option value="1">Exploracao Sexual</option>
        <option value="2">Exploracao de Trabalho</option>
        <option value="3">Casamento Forcado</option>
        <option value="4" selected>Criminalidade Forcado</option>
        <option value="5">Criancas Soldados</option>
        <option value="6">Trafico de Orgaos</option>
        <option value="7">Trafico de Criancas</option>
        <option value="8">Trafico de Adultos</option>
        <option value="9">Outro Tipo de Trafico</option>

        @elseif($report->report_type == 5)
        <option value="1">Exploracao Sexual</option>
        <option value="2">Exploracao de Trabalho</option>
        <option value="3">Casamento Forcado</option>
        <option value="4">Criminalidade Forcado</option>
        <option value="5" selected>Criancas Soldados</option>
        <option value="6">Trafico de Orgaos</option>
        <option value="7">Trafico de Criancas</option>
        <option value="8">Trafico de Adultos</option>
        <option value="9">Outro Tipo de Trafico</option>

        @elseif($report->report_type == 6)
        <option value="1">Exploracao Sexual</option>
        <option value="2">Exploracao de Trabalho</option>
        <option value="3">Casamento Forcado</option>
        <option value="4">Criminalidade Forcado</option>
        <option value="5">Criancas Soldados</option>
        <option value="6" selected>Trafico de Orgaos</option>
        <option value="7">Trafico de Criancas</option>
        <option value="8">Trafico de Adultos</option>
        <option value="9">Outro Tipo de Trafico</option>

        @elseif($report->report_type == 7)
        <option value="1">Exploracao Sexual</option>
        <option value="2">Exploracao de Trabalho</option>
        <option value="3">Casamento Forcado</option>
        <option value="4">Criminalidade Forcado</option>
        <option value="5">Criancas Soldados</option>
        <option value="6">Trafico de Orgaos</option>
        <option value="7" selected>Trafico de Criancas</option>
        <option value="8">Trafico de Adultos</option>
        <option value="9">Outro Tipo de Trafico</option>

        @elseif($report->report_type == 8)
        <option value="1">Exploracao Sexual</option>
        <option value="2">Exploracao de Trabalho</option>
        <option value="3">Casamento Forcado</option>
        <option value="4">Criminalidade Forcado</option>
        <option value="5">Criancas Soldados</option>
        <option value="6">Trafico de Orgaos</option>
        <option value="7">Trafico de Criancas</option>
        <option value="8" selected>Trafico de Adultos</option>
        <option value="9">Outro Tipo de Trafico</option>

        @elseif($report->report_type == 9)
        <option value="1">Exploracao Sexual</option>
        <option value="2">Exploracao de Trabalho</option>
        <option value="3">Casamento Forcado</option>
        <option value="4">Criminalidade Forcado</option>
        <option value="5">Criancas Soldados</option>
        <option value="6">Trafico de Orgaos</option>
        <option value="7">Trafico de Criancas</option>
        <option value="8">Trafico de Adultos</option>
        <option value="9" selected>Outro Tipo de Trafico</option>
    @endif
</select>

<label for="city"><h4>Cidade</h4></label>
<select class="dropdown-item {{ $errors->has('city') ? 'is-danger' : ''}}" name="city" required>
    @if($report->city == "Aveiro")
    <option value="Aveiro" selected>Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Beja")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja" selected>Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Braga")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga" selected>Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Braganca")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca" selected>Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Castelo Branco")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja" >Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco" selected>Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Coimbra")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra" selected>Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Evora")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora" selected>Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Faro")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro" selected>Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Guarda")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda" selected>Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Leiria")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria" selected>Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Lisboa")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa" selected>Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Portalegre")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre" selected>Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Porto")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto" selected>Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Santarem")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem" selected>Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Setubal")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal" selected>Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Viana do Castelo")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo" selected>Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Vila Real")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real" selected>Vila Real</option>
    <option value="Viseu">Viseu</option>

    @elseif($report->city == "Viseu")
    <option value="Aveiro">Aveiro</option>
    <option value="Beja">Beja</option>
    <option value="Braga">Braga</option>
    <option value="Braganca">Braganca</option>
    <option value="Castelo Branco">Castelo Branco</option>
    <option value="Coimbra">Coimbra</option>
    <option value="Evora">Evora</option>
    <option value="Faro">Faro</option>
    <option value="Guarda">Guarda</option>
    <option value="Leiria">Leiria</option>
    <option value="Lisboa">Lisboa</option>
    <option value="Portalegre">Portalegre</option>
    <option value="Porto">Porto</option>
    <option value="Santarem">Santarem</option>
    <option value="Setubal">Setubal</option>
    <option value="Viana do Castelo">Viana do Castelo</option>
    <option value="Vila Real">Vila Real</option>
    <option value="Viseu" selected>Viseu</option>
    @endif
 </select>
</select>

<label for="persons"><h4>Nº de pessoas traficadas</h4></label>
<select class="dropdown-item {{ $errors->has('persons') ? 'is-danger' : ''}}" name="persons" required>
    @if($report->persons == "1")
    <option value="1" selected>1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="5+">5+</option>

    @elseif($report->persons == "2")
    <option value="1">1</option>
    <option value="2"selected>2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="5+">5+</option>

    @elseif($report->persons == "3")
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3"selected>3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="5+">5+</option>

    @elseif($report->persons == "4")
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4" selected>4</option>
    <option value="5">5</option>
    <option value="5+">5+</option>

    @elseif($report->persons == "5")
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5" selected>5</option>
    <option value="5+">5+</option>

    @elseif($report->persons == "5+")
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="5+" selected>5+</option>
    @endif
</select>

<label for="description"><h4>Descrição</h4></label>
<input type="text" class = "form-control {{ $errors->has('title') ? 'is-danger' : ''}}" name="description"  placeholder="description" value="{{$report->description}}" required>

<label for="urgent"><h4>Importancia do report</h4></label>
<select class="dropdown-item {{ $errors->has('urgent') ? 'is-danger' : ''}}" name="urgent" required>
    @if($report->urgent == 0)
    <option value="0" selected> Report Não Urgente</option>
    <option value="1">Report Urgente</option>
    @else
    <option value="0"> Report Não Urgente</option>
    <option value="1" selected>Report Urgente</option>
    @endif
</select>

<label for="idReportState"><h4>Estado do report</h4></label>
<select class="dropdown-item {{ $errors->has('idReportState') ? 'is-danger' : ''}}" name="idReportState" required>
    @if($report->idReportState == 1)
    <option value="1" selected> Em Processo</option>
    <option value="2"> Concluido com sucesso</option>
    <option value="3"> Concluido sem sucesso</option>
    <option value="4">Cancelado</option>
    @elseif($report->idReportState == 2)
    <option value="1"> Em Processo</option>
    <option value="2" selected> Concluido com sucesso</option>
    <option value="3"> Concluido sem sucesso</option>
    <option value="4">Cancelado</option>
    @elseif($report->idReportState == 3)
    <option value="1"> Em Processo</option>
    <option value="2"> Concluido com sucesso</option>
    <option value="3" selected> Concluido sem sucesso</option>
    <option value="4">Cancelado</option>
    @elseif($report->idReportState == 4)
    <option value="1"> Em Processo</option>
    <option value="2"> Concluido com sucesso</option>
    <option value="3"> Concluido sem sucesso</option>
    <option value="4" selected>Cancelado</option>
    @endif
</select>

        <label for="time"><h4>Horas</h4></label>
        <label class = "form-control"> {{$report->time}} </label>

        <label for="trafficdate"><h4>Data do tráfico</h4></label>
        <label class = "form-control"> {{$report->trafficdate}} </label>

<button type="submit" style="width: 100%" class="btn btn-outline-primary">Enviar Report</button>
</form>
@endsection
