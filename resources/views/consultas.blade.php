@extends('footer')
@extends('header')


@section('header')
    @parent
    <div class="container-fluid" ng-controller="ctrl">
        <div class="row">
            <div class="col-3" style="margin-top:20px;">
                <a href="/" class="btn btn-secondary" style="width:100%;"><- Volver</a>
            </div>
            <div class="col-9"></div>
            <div class="col-12">
                <table class="table table-responsive table-hover" style="margin-top: 20px; display:table;">
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Día consulta</th>
                            <th>Horario</th>
                            <th>Fecha de nacimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr ng-repeat="x in consultas">
                            <td> @{{ x.nombrePaciente }} @{{ x.apellidoPaciente }} </td>
                            <td> @{{ x.diaConsulta }} </td>
                            <td> @{{ x.horaConsulta }} </td>
                            <td> @{{ x.fechaNacimiento }} </td>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="/editarCita/@{{x.idConsultas }}" class="btn btn-success" style="width:100%;">Editar</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="/delCita/@{{ x.idConsultas }}" class="btn btn-danger" style="width: 100%;">Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('footer')
@parent
<script>


    app.controller('ctrl', function($scope, $http) {
        $scope.consultas = {};
        $http.get('/getCitas').then(
            function(response) {
                $scope.consultas = response.data;
            },
            function(error) {

            }
        );

        $scope.borrar = function(index) {
            if(confirm('¿Seguro que desea borrar el registro?')) {
                $http.get('/delCita', {id: index}).then(
                    function(response) {

                    },
                    function(errors) {

                    }
                )
            }
        }
    });
</script>
@endsection