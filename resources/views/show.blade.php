@extends('layouts.app')

@section('title', 'Visualizar Report')

@section('content')
<div class="report-container">
    <div class="verreport">
        <h1 class="titulo"> <b> Visualizar Ocorrência </b> </h1>
        <hr class="linereport">
        <label class= "tituloreport" for="report_type"><h4>Tipo de ocorrência</h4></label>
        <label class = "textoreport"> {{$report->report_type}} </label>
        <label class= "tituloreport" for="city"><h4>Distrito</h4></label>
        <label class = "textoreport"> {{$report->city}} </label>
        <label class= "tituloreport" for="persons"><h4>Nº de pessoas traficadas</h4></label>
        <label class = "textoreport"> {{$report->persons}} </label>
        <label class= "tituloreport" for="trafficdate"><h4>Data da ocorrência</h4></label>
        <label class = "textoreport"> {{$report->created_at}} </label>
        <label class= "tituloreport" for="description"><h4>Descrição</h4></label>
        @if(empty($report->description))
            <textarea readonly class = "textoreport"> Não existe descrição </textarea>
        @else
            <textarea readonly class = "textoreport">{{$report->description}} </textarea>
        @endif
        <hr class="linereport">
        @if($report->updated_at != $report->created_at)
            <label class= "tituloreport" for="trafficdate"><h4>Ultima update da ocorrência</h4></label>
            <label class = "textoreport"> {{$report->updated_at}} </label>
        @endif
        @if($user->idUserType == 1 or $user->idUserType == 2)
            <form method="POST" action="/report/{{ $report->id }}" style="margin-bottom: 1em;">
                @method('PATCH')
                @csrf
                <label class= "tituloreport" for="idReportState"><h4>Estado da ocorrência</h4></label>
                <select class="{{ $errors->has('idReportState') ? 'is-invalid' : ''}}" name="idReportState" required>
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
                @if ($errors->has('idReportState'))
                    <span class="invalid-feedback1" role="alert">
                        <strong>{{ $errors->first('idReportState') }}</strong>
                    </span>
                @endif
                <button type="submit" class="btnreport"> Atualizar Estado</button>
            </form>
        @else
            <label for="idReportState"><h4>Estado do Report</h4></label>
            @if($report->idReportState == 1)
                <label class = "form-control" >Em Processo</label>
            @elseif($report->idReportState == 2)
                <label class = "form-control">Aprovado</label>
            @elseif($report->idReportState == 3)
                <label class = "form-control">Negado</label>
            @elseif($report->idReportState == 4)
                <label class = "form-control">Cancelado</label>
            @else
                <label class = "form-control">Em Processo</label>
            @endif
        @endif
    </div>
</div>
@endsection
