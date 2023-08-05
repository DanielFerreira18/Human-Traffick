@extends('/layouts.app')


@section('title', 'Report List')

@section('content')
<script>

    var users = {!! json_encode($details->toArray()) !!};

</script>
<div class="tab-pane" id="settings">
    <div class="container-list" id="setDivHeights">
        <div class="container-border-user" id="divHeights">
            <div>
                <div class="containerHeader">
                    <h1 class="h1-userShow">Gestão de Ocorrencias</h1>
                    <div class="searchss">
                        <form class="form-inline my-2 my-lg-0 search-form-control" method="POST" action="/searchReports">
                            @csrf
                            <input class="form-controler border-radius searchbarInput" type="text" name="searchBarReports" placeholder="Search">
                            <button class="btnprocurar btn-outline my-2 my-sm-0 border-radius-search searchbarButton" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <span class="after-sep"></span>
                @if(isset($details) == false or count($details) == 0)
                    <div class="boxNoClient">
                        <label for="description" class="label label-client" style="cursor:default; text-align:center;">Report não encontrado, por favor digite outra vez</label>
                    </div>
                @else
                    <div>
                        <div id="">
                            @foreach($details as $reports)
                                <div id="{{ $loop->index }}" class="box boxContainer" onclick="location.href='report/{{$reports->id}}'">
                                    <div class="blocksDivs1">
                                        <label for="description" class="label label-client labelInfo1">Tipo: {{$reports->report_type}}</label>
                                        <label for="description" class="label label-client labelInfo2">Cidade: {{$reports->city}}</label>
                                    </div>
                                    <div class="blocksDivs2">
                                        @if($reports->idReportState === 1)
                                            <label for="description" class="label label-client  badge-pill badge-primary authMaker-processamento labelPermission">Processamento</label>
                                        @elseif($reports->idReportState === 2)
                                            <label for="description" class="label label-client  badge-pill badge-primary authMaker-clt labelPermission">Aprovado</label>
                                        @elseif($reports->idReportState === 3)
                                            <label for="description" class="label label-client  badge-pill badge-primary authMaker-admin labelPermission">Negado</label>
                                        @else
                                            <label for="description" class="label label-client  badge-pill badge-primary authMaker-processamento labelPermission">Em processamento</label>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
