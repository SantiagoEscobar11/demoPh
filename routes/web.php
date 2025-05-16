<?php

use App\Http\Resources\PacienteResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('demoPh');
});



Route::get('/user/{id}', function (string $id) {
    $users = DB::table('gbl_entity')->get();

    return new PacienteResource($users);
});

Route::get('/informe/{id}', function (int $id) {

try {
$informe = DB::select('SELECT cita.* FROM
  (SELECT adm_admission_appointment.* FROM adm_admission_appointment JOIN
  (SELECT adm_admission.id as id_admission FROM adm_admission JOIN
  (SELECT adm_admission_flow.adm_admission_id FROM adm_admission_flow JOIN
  (SELECT  cnt_medical_order.adm_admission_flow_id  as admisionflowId FROM cnt_medical_order JOIN
  (SELECT cnt_medical_order_medicament.id as ordermedicamentId FROM cnt_medical_order_medicament  JOIN
  (SELECT cnt_medical_order_medicament_id FROM cnt_medical_order_quotation JOIN
  (SELECT * FROM com_quotation_line WHERE  com_quotation_id=?) as lineacotizacion ON lineacotizacion.id=line_id) as medicament_quotation
  ON  medicament_quotation.cnt_medical_order_medicament_id = cnt_medical_order_medicament.id)
  as ordermedicament ON  ordermedicament.ordermedicamentId=cnt_medical_order.id) as order_admission_flow
  ON  order_admission_flow.admisionflowid=adm_admission_flow.id) as admission_flow ON adm_admission.id=admission_flow.adm_admission_id) as admAdmission
  ON admAdmission.id_admission= adm_admission_appointment.adm_admission_id) as admissionAppointment
  JOIN
  (SELECT sch_workflow_slot_assigned.id as workflow_assigned_id ,asignacionCita.* FROM sch_workflow_slot_assigned JOIN
  (SELECT citaCompleta.idpaciente,citaCompleta.idassigcita,citaCompleta.init_time,citaCompleta.end_time,sch_calendar.id_gbl_entity,citaCompleta.idCita FROM sch_calendar JOIN
  (SELECT citapaciente.* , sch_event.sch_calendar_id as calendarmedico FROM sch_event JOIN
  (SELECT  sch_slot_assigned.id_gbl_entity as idpaciente , sch_slot.init_time ,sch_slot.end_time ,sch_slot.id as idassigcita,sch_slot_assigned.id as idCita ,sch_slot.sch_event_id as eventmedic
  FROM sch_slot_assigned
  JOIN sch_slot
  ON sch_slot_assigned.sch_slot_id = sch_slot.id) as citapaciente ON citapaciente.eventmedic=sch_event.id) as citaCompleta ON citaCompleta.calendarmedico=sch_calendar.id)
  as asignacionCita ON  asignacionCita.idcita=sch_workflow_slot_assigned.sch_slot_assigned_id) as cita ON cita.workflow_assigned_id = admissionAppointment .id;',[$id]);
   $ids_map =$informe[0];
   $pacient = DB::select("select id as idpaciente, nombre as nombrepaciente, apellido as apellidopaciente from gbl_entity where id = ? ", [$ids_map->idpaciente] );
   $doctor  = DB::select("select nombre as nombremedico , apellido as medicoapellido from gbl_entity where id = ? " ,   [$ids_map->id_gbl_entity]);
   $cita = DB::select("select id as idCita, init_time , end_time from sch_slot where id= ?  ",[$ids_map->idassigcita]);
   $resultobj = (object)array_merge((array)$doctor[0],(array)$pacient[0] , (array)$cita[0]);

   return $resultobj;
}catch(Exception $e){
   return (object) ["error"=>"error en la consulta"];
}
});
