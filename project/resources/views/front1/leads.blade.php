@extends('layouts.front')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <?php
        $id = 1;
    ?>

    <section class="leads">
        <div class="container">
            <div style="margin-top:30px; text-align:right;">
                <a class="card-button" style="padding:10px;" href="{{route('front.download_leads')}}">
                    <i class="fa fa-download"></i>
                    {{$langg->lang1566}}
                </a>
            </div>
            <div style="margin:50px 0px; text-align:center;">
                <table class="table table-striped table-bordered" id="sortTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{$langg->lang1567}}</th>
                            <th scope="col">{{$langg->lang1568}}</th>
                            <th scope="col">{{$langg->lang1569}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$id++}}</th>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                        @endforeach
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <th scope="row">{{$id++}}</th>
                                <td>{{$subscriber->created_at}}</td>
                                <td>{{$subscriber->name}}</td>
                                <td>{{$subscriber->email}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <input type="hidden" value="{{Session::get('language')}}" id="session_lang">
    </section>

    <script>
        var lang = document.getElementById("session_lang").value;
        if(lang == 12)
        {
            $('#sortTable').DataTable({
                "language": {
                    "sProcessing":    "Procesando...",
                    "sLengthMenu":    "Mostrar _MENU_ entradas",
                    "sZeroRecords":   "No hay datos disponibles en la tabla",
                    "sEmptyTable":    "Ningún dato disponible en esta tabla",
                    "sInfo":          "Mostrando _START_ a _END_ de un total de _TOTAL_ entradas",
                    "sInfoEmpty":     "Mostrando 0 a 0 de un total de 0 entradas",
                    "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":   "",
                    "sSearch":        "Buscar:",
                    "sUrl":           "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":    "Último",
                        "sNext":    "Próxima",
                        "sPrevious": "Previo"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        }
        else if(lang == 13)
        {
            $('#sortTable').DataTable({
                "language": {
                    "emptyTable": "Não foi encontrado nenhum registo",
                    "loadingRecords": "A carregar...",
                    "processing": "A processar...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "Não foram encontrados resultados",
                    "search": "Procurar:",
                    "paginate": {
                        "first": "Primeiro",
                        "previous": "Anterior",
                        "next": "Seguinte",
                        "last": "Último"
                    },
                    "aria": {
                        "sortAscending": ": Ordenar colunas de forma ascendente",
                        "sortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "autoFill": {
                        "cancel": "cancelar",
                        "fill": "preencher",
                        "fillHorizontal": "preencher células na horizontal",
                        "fillVertical": "preencher células na vertical",
                        "info": "Exemplo de Auto Preenchimento"
                    },
                    "buttons": {
                        "collection": "Coleção",
                        "colvis": "Visibilidade de colunas",
                        "colvisRestore": "Restaurar visibilidade",
                        "copy": "Copiar",
                        "copyKeys": "Pressiona CTRL ou u2318 + C para copiar a informação para a área de transferência. Para cancelar, clica neste mensagem ou pressiona ESC.",
                        "copySuccess": {
                            "1": "Uma linha copiada para a área de transferência",
                            "_": "%ds linhas copiadas para a área de transferência"
                        },
                        "copyTitle": "Copiar para a área de transferência",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas as linhas",
                            "1": "Mostrar 1 linha",
                            "_": "Mostrar %d linhas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "decimal": ",",
                    "infoFiltered": "(filtrado num total de _MAX_ registros)",
                    "infoThousands": ".",
                    "searchBuilder": {
                        "add": "Adicionar condição",
                        "button": {
                            "0": "Construtor de pesquisa",
                            "_": "Construtor de pesquisa (%d)"
                        },
                        "clearAll": "Limpar tudo",
                        "condition": "Condição",
                        "conditions": {
                            "date": {
                                "after": "Depois",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "not": "Diferente",
                                "notBetween": "Não está entre",
                                "notEmpty": "Não está vazio"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "gt": "Maior que",
                                "gte": "Maior ou igual a",
                                "lt": "Menor que",
                                "lte": "Menor ou igual a",
                                "not": "Diferente",
                                "notBetween": "Não está entre",
                                "notEmpty": "Não está vazio"
                            },
                            "string": {
                                "contains": "Contém",
                                "empty": "Vazio",
                                "endsWith": "Termina em",
                                "equals": "Igual",
                                "not": "Diferente",
                                "notEmpty": "Não está vazio",
                                "startsWith": "Começa em"
                            },
                            "array": {
                                "equals": "Igual",
                                "empty": "Vazio",
                                "contains": "Contém",
                                "not": "Diferente",
                                "notEmpty": "Não está vazio",
                                "without": "Não contém"
                            }
                        },
                        "data": "Dados",
                        "deleteTitle": "Excluir condição de filtragem",
                        "logicAnd": "E",
                        "logicOr": "Ou",
                        "title": {
                            "0": "Construtor de pesquisa",
                            "_": "Construtor de pesquisa (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Limpar tudo",
                        "collapse": {
                            "0": "Painéis de pesquisa",
                            "_": "Painéis de pesquisa (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sem painéis de pesquisa",
                        "loadMessage": "A carregar painéis de pesquisa",
                        "title": "Filtros ativos"
                    },
                    "select": {
                        "1": "%d linha seleccionada",
                        "_": "%d linhas seleccionadas",
                        "cells": {
                            "1": "1 célula seleccionada",
                            "_": "%d células seleccionadas"
                        },
                        "columns": {
                            "1": "1 coluna seleccionada",
                            "_": "%d colunas seleccionadas"
                        },
                        "rows": {
                            "1": "%d linha seleccionada"
                        }
                    },
                    "thousands": ".",
                    "editor": {
                        "close": "Fechar",
                        "create": {
                            "button": "Novo",
                            "title": "Criar novo registro",
                            "submit": "Criar"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar registro",
                            "submit": "Atualizar"
                        },
                        "remove": {
                            "button": "Remover",
                            "title": "Remover",
                            "submit": "Remover",
                            "confirm": {
                                "_": "Tem certeza que quer apagar %d entradas?",
                                "1": "Tem certeza que quer apagar esta entrada?"
                            }
                        },
                        "multi": {
                            "title": "Multiplos valores",
                            "info": "Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais.",
                            "restore": "Desfazer alterações",
                            "noMulti": "Este campo não pode ser editado em grupo"
                        },
                        "error": {
                            "system": "Ocorreu um erro no sistema"
                        }
                    },
                    "info": "Mostrando os registros _START_ a _END_ num total de _TOTAL_",
                    "infoEmpty": "Mostrando 0 os registros num total de 0",
                    "datetime": {
                        "previous": "anterior",
                        "next": "próximo",
                        "hours": "horas",
                        "minutes": "minutos",
                        "seconds": "segundos",
                        "unknown": "desconhecido",
                        "amPm": [
                            "am",
                            "pm"
                        ],
                        "weekdays": [
                            "Seg",
                            "Ter",
                            "Qua",
                            "Qui",
                            "Sex",
                            "Sáb",
                            "Dom"
                        ],
                        "months": [
                            "Janeiro",
                            "Fevereiro",
                            "Março",
                            "Abril",
                            "Maio",
                            "Junho",
                            "Julho",
                            "Agosto",
                            "Setembro",
                            "Outubro",
                            "Novembro",
                            "Dezembro"
                        ]
                    }
                } 
            });
        }
        else
        {
            $('#sortTable').DataTable();
        }
            
        
    </script>

@endsection