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
                    <span class="error-msg" ng-show="frmUsuarios.paciente.$error.required && frmUsuarios.paciente.$dirty">Completar
                        este campo</span>
                </div>

                <div class="form-group col-12">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" ng-model="paciente.apellidoPaciente" required>
                    <span class="error-msg" ng-show="frmUsuarios.apellidos.$error.required && frmUsuarios.apellidos.$dirty">Completar
                        este campo</span>
                </div>

                <div class="form-group col-12">
                    <label>Fecha de nacimiento</label>
                    <input readonly type="text" ng-change="calcularEdad()" class="form-control" name="fechaNac" ng-model="paciente.fechaNac" id="fechaNac" required>
                    <span class="error-msg" ng-show="frmUsuarios.fechaNac.$error.required && frmUsuarios.fechaNac.$dirty">Completar
                        este campo</span>
                </div>

                <div class="form-group col-12">
                    <label>Fecha cita</label>
                    <select ng-model="paciente.diaConsulta" class="form-control" name="consulta">
                        <option ng-repeat="day in dias" value="@{{ day }}">@{{ day }}</option>
                    </select>
                    <span class="error-msg" ng-show="frmUsuarios.consulta.$error.required && frmUsuarios.consulta.$dirty">Completar
                        este campo</span>
                </div>

                <div class="form-group col-8">
                    <label>Horario</label>
                    <select ng-model="paciente.horaConsulta" class="form-control" name="hora">
                        <option ng-repeat="h in horas">@{{ h.time }}</option>
                    </select>
                    <span class="error-msg" ng-show="frmUsuarios.hora.$error.required && frmUsuarios.chora.$dirty">Completar
                        este campo</span>
                </div>

                <div class="form-group col-4">
                    <label>Edad</label>
                    <input type="text" disabled class="form-control" ng-model="paciente.edad">
                </div>
            </div>

            <div class="row">
                <div class="col-8"></div>
                <div class="col-4">
                    <button class="btn btn-primary btn-block" ng-click="guardar()">Guardar</button>
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
            var now = Date.now() - new Date('{{ $cita->fechaNacimiento }}');
            var ageDate = new Date(now);
            $scope.paciente.edad = Math.abs(ageDate.getUTCFullYear() - 1970);
        }
        
        $scope.paciente = {
            nombrePaciente: '{{ $cita->nombrePaciente }}',
            apellidoPaciente: '@php echo $cita->apellidoPaciente @endphp',
            fechaNac: '{{ $cita->fechaNacimiento }}',
            diaConsulta: '{{ $cita->diaConsulta }}',
            horaConsulta: '{{ $cita->horaConsulta }}'
        };

        $scope.calcularEdad();

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
            console.log('Esto ' + $scope.paciente.fechaNac);
            $http.post('/commitEdit/{{ $cita->idConsultas }}', $scope.paciente).then(
                function(response) {
                    if(response.data == 0) {
                        alert('Horario ocupado');
                    } else {
                        alert('Registro actualizado');
                        location.href = '/getConsultas';
                    }
                },
                function(errors) {

                }
            );
        }
    });

</script>

@endsection


    