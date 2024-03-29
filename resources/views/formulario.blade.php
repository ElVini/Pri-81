@extends('footer')
@extends('header')


@section('header')
    @parent
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 align="center">Pacientes</h2>
            </div>
        </div>
    </div>
    <div class="container" ng-controller="ctrl">
        <form name="frmUsuarios">
            <div class="form-row">
                <div class="form-group col-12">
                    <label>Nombre</label>
                    <input type="text" numbers-only class="form-control" name="paciente" ng-model="paciente.nombrePaciente" required>
                </div>

                <div class="form-group col-12">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" ng-model="paciente.apellidoPaciente" required>
                </div>

                <div class="form-group col-12">
                    <label>Fecha de nacimiento</label>
                    <input type="date" ng-change="calcularEdad()" class="form-control" name="fechaNac" ng-model="paciente.fechaNac" id="fechaNac" required>
                </div>

                <div class="form-group col-12">
                    <label>Fecha cita</label>
                    <select ng-model="paciente.diaConsulta" class="form-control" name="consulta">
                        <option ng-repeat="day in dias" value="@{{ day }}">@{{ day }}</option>
                    </select>
                </div>

                <div class="form-group col-8">
                    <label>Horario</label>
                    <select ng-model="paciente.horaConsulta" class="form-control" name="hora">
                        <option ng-repeat="h in horas">@{{ h.time }}</option>
                    </select>
                </div>

                <div class="form-group col-4">
                    <label>Edad</label>
                    <input type="text" disabled class="form-control" ng-model="paciente.edad">
                </div>
            </div>

            <div class="row">
                <div class="col-8"></div>
                <div class="col-2">
                    <a href="/getConsultas" class="btn btn-link" style="width: 100%;">Consultas</a>
                </div>
                <div class="col-2">
                    <button ng-disabled="frmUsuarios.$invalid" style="width:100%;" class="btn btn-primary" ng-click="guardar()">Guardar</button>
                </div>
            </div>
        </form>

    </div>

@endsection

@section('footer')
@parent
<script>

    app.controller('ctrl', function($scope, $http) {

        $scope.maxFecha = Date.now();

        $scope.calcularEdad = function calcularEdad() {
            var now = Date.now() - $scope.paciente.fechaNac.getTime();
            var ageDate = new Date(now);
            $scope.paciente.edad = Math.abs(ageDate.getUTCFullYear() - 1970);
        }

        

        $scope.paciente = {};
        $scope.dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
        $scope.horas = [
            { active: true, time: '09:00 am - 10:00 am' },
            { active: true, time: '10:00 am - 11:00 am' },
            { active: true, time: '11:00 am - 12:00 pm' },
            { active: true, time: '12:00 pm - 01:00 pm' },
            { active: true, time: '01:00 pm - 02:00 pm' },
            { active: true, time: '02:00 pm - 03:00 pm' },
            { active: true, time: '03:00 pm - 04:00 pm' },
            { active: true, time: '04:00 pm - 05:00 pm' },
            { active: true, time: '05:00 pm - 06:00 pm' }
        ];
        $scope.guardar = function() {
            console.log($scope.paciente);
            $scope.paciente.fechaNacimiento = $scope.paciente.fechaNac.toISOString().slice(0,10);
            console.log('Esto ' + $scope.paciente.fechaNac);
            $http.post('/save', $scope.paciente).then(
                function(response) {

                    /**
                    * Igual a 0 porque es el valor que retorno en el controlador.
                    * Si se retonarna otra valor, ese es el que debe ser evaluado aquí 
                    */
                    if(response.data == 0) {
                        alert('Horario ocupado');
                        $scope.frmUsuarios.$setPristine();
                    } else {
                        alert('Registro guardado');
                        $scope.paciente = {};
                    }
                },
                function(errors) {
                    alert('Completar todos los campos');
                }
            );
        }
    });

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();

    if(dd < 10) {
        dd = '0' + dd;
    }

    if(mm < 10) {
        mm = '0' + mm;
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById('fechaNac').setAttribute('max', today);

</script>

@endsection


    