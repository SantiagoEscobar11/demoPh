import * as bootstrap from 'bootstrap'
import './bootstrap';
import $ from "jquery";

    $("button").click(function(){

        let factura_id  = $("#iptBuscar").val()
        if(factura_id===""){
            factura_id=0
        }
    $.ajax({
        url: "/informe/"+factura_id,
        method: 'GET',
        success: function( result ) {
            //console.log(result.error);

            if(result.error == undefined){
            let fecha = (""+result.init_time).split(" ")

            //paciente
            $("#iptIdPaciente").val(result.idpaciente);
            $("#iptNamePaciente").val(result.nombrepaciente);
            $("#iptLastNamePaciente").val(result.apellidopaciente);
            //Medico
            $("#iptNombremedico").val(result.nombremedico);
            $("#iptApellidomedico").val(result.medicoapellido);
                //Cita
            $("#iptIdCita").val(result.idcita)
            $("#iptFechaCita").val(fecha[0])
            $("#iptHICita").val(fecha[1])
            $("#iptFICita").val(result.end_time.split(" ")[1])



            }else{
            //paciente
            $("#iptIdPaciente").val("");
            $("#iptNamePaciente").val("");
            $("#iptLastNamePaciente").val("");
            //Medico
            $("#iptNombremedico").val("");
            $("#iptApellidomedico").val("");
                //Cita
            $("#iptIdCita").val("")
            $("#iptFechaCita").val("")
            $("#iptHICita").val("")
            $("#iptFICita").val("")
                console.log("error :" +result.error)
            }

        }

    })
    });









