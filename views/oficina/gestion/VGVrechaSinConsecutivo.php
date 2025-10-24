<!DOCTYPE html>
<html class=" ">

<head>

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>VEHICULO RECHAZADO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon" /> <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-57-precomposed.png"> <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-114-precomposed.png"> <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-72-precomposed.png"> <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-144-precomposed.png"> <!-- For iPad Retina display -->

    <!-- CORE CSS FRAMEWORK - START -->
    <link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->


    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->


    <!-- CORE CSS TEMPLATE - START -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS TEMPLATE - END -->
    <!-- CORE CSS TEMPLATE - END -->

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="login_page" style="background: white">

    <div class="col-xl-12">
        <section class="box ">
            <div class="content-body" style="background: salmon">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">Vehiculo rechazado sin consecutivo</h2>
                            </header>
                            <div class="content-body">
                                <input id="idhojapruebas" value="<?php echo $dato; ?>" type="hidden" />
                                <br>
                                <table class="table table-bordered" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>Id control</th>
                                            <th>Placa</th>
                                            <th>Ocasión</th>
                                            <th>FUR</th>
                                            <th>Tamaño hoja</th>
                                            <th>Medio</th>
                                            <th>Consecutivo RUNT</th>
                                            <th>Enviar a SICOV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php
                                                echo $idhojapruebas;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $vehiculo->placa;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $ocacion;
                                                ?>
                                            </td>
                                            <form action="<?php echo base_url(); ?>index.php/oficina/fur/CFUR" method="post" style="width: 100px;text-align: center">
                                                <td>
                                                    <button name="dato" class="btn btn-accent btn-block" value="<?php echo $dato; ?>" type="submit" formtarget="_blank" style="border-radius: 40px 40px 40px 40px;font-size: 14px;background-color: #393185">📄 Ver</button>
                                                </td>
                                                <td>
                                                    <select name="tamano" class="form-control input-lg m-bot15">
                                                        <option value="oficio" selected>Oficio</option>
                                                        <option value="carta">Carta</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="medio" class="form-control input-lg m-bot15">
                                                        <option value="0" selected>Impreso</option>
                                                        <option value="1">Digital</option>
                                                    </select>
                                                </td>
                                            </form>
                                            <td>
                                                <input id="consecutivoRunt" type="number" class="form-control" onchange="guardarConsecutivo(this)">
                                                <label id="mensaje" style="background: white;
                                                   width: 100%;
                                                   text-align: center;
                                                   font-weight: bold;
                                                   font-size: 15px;display: none;position: absolute;
                                                   padding: 5px;color: salmon">Este campo es obligatorio</label>
                                            </td>
                                            <td>
                                                <input type="button" class="btn btn-danger btn-block" id="btnenviarsicov" style="border-radius: 40px 40px 40px 40px;font-size: 20px;" value="✉️ Enviar" data-toggle='modal' data-target='#confirmacionEnvio' />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="text-align: center">
                                    <input class="btn btn-warning btn-block" id="btnenviarfirmado" style="border-radius: 40px 40px 40px 40px;font-size: 20px;width: 300px" value="🚫 Anular este envío" data-toggle='modal' data-target='#confirmacionAnulacion' /><br>
                                </div>
                                <form action="<?php echo base_url(); ?>index.php/oficina/CGestion" method="post">
                                    <input name="button" class="btn btn-accent btn-block" style="width: 100px;background: #393185" type="submit" value="Atras" />
                                </form>
                            </div>
                            <img src="<?php echo base_url(); ?>assets/images/logo.png" />
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal" id="confirmacionEnvio" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog animated bounceInDown">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmación de envío</h4>
                </div>
                <div class="modal-body" style="background: whitesmoke">
                    <label id="mensajeSicov" style="background: white;
                               width: 100%;
                               text-align: center;
                               font-weight: bold;
                               font-size: 15px;
                               padding: 5px;border: solid gray 2px;
                               border-radius:  15px 15px 15px 15px;color: black">¿ESTÁ SEGURO(A) DE REALIZAR EL ENVÍO A SICOV</label>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">NO</button>
                    <button id="btnAsignar" class="btn btn-success" type="button" onclick="enviarASICOV()">SI</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="confirmacionAnulacion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog animated bounceInDown">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmación de anulación</h4>
                </div>
                <div class="modal-body" style="background: whitesmoke">
                    <label id="mensajeSicov1" style="background: white;
                               width: 100%;
                               text-align: center;
                               font-weight: bold;
                               font-size: 15px;
                               padding: 5px;border: solid gray 2px;
                               border-radius:  15px 15px 15px 15px;color: black"><strong style="color: salmon">ADVERTENCIA</strong> <br><br>Esta acción enviará la placa a la sección de RECHAZADOS SIN FIRMAR, se recomienda revisar si este FUR a sido firmado en el SICOV antes de confirmar esta acción. <br><br> ¿DESEA ENVIAR LA PLACA A "RECHAZADOS SIN FIRMAR"?</label>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">NO</button>
                    <button id="btnAsignar1" class="btn btn-success" type="button" onclick="enviarAnulacion()">SI</button>
                </div>
            </div>
        </div>
    </div>


    <!-- MAIN CONTENT AREA ENDS -->
    <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


    <!-- CORE JS FRAMEWORK - START -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"><\/script>');
    </script>
    <!-- CORE JS FRAMEWORK - END -->


    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->

    <script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/autonumeric/autoNumeric-min.js" type="text/javascript"></script>
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


    <!-- CORE TEMPLATE JS - START -->
    <script src="<?php echo base_url(); ?>assets/js/scripts.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>application/libraries/sesion.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS - END -->


    <script type="text/javascript">
        var placa = "<?php
                        echo $placa;
                        ?>";
        var ocasion = "<?php
                        echo $ocacion;
                        ?>";
        var ipCAR = "<?php
                        echo $ipCAR;
                        ?>";
        var ipLocal = '<?php
                        echo base_url();
                        ?>';
        var informeWebCornare = "<?php
                                    echo $informeWebCornare;
                                    ?>";
        var informeWebBogota = '<?php
                                echo $this->session->userdata('informeWebBogota');
                                ?>';
        var dominio = "";
        $(document).ready(function() {
            if (informeWebBogota == '1') {
                getTokenBogota();
            }
            var data = {
                desdeVisor: 'car',
                dato: $('#idhojapruebas').val(),
                IdUsuario: '1'
            };
            //                                                            console.log(data);
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/oficina/fur/CFUR',
                type: 'post',
                data: data,
                mimeType: 'json',
                success: function(rta) {
                    //                                        console.log(rta)
                    console.log(rta);
                    //                                        console.log(rta.idprueba);
                    for (var c = 0; c < rta.length; c++) {
                        //                                            if (rta[c].basic) {
                        //                                                envioBasicCAr(rta[c].basic, rta[c].idprueba)
                        //                                            }
                        if ((rta[c].cadena !== "" || rta[c].cadena !== null) && (rta[c].idprueba !== "" || rta[c].idprueba !== null)) {
                            inforCAr(rta[c].cadena, rta[c].idprueba);
                        }
                    }
                    //                                        
                    //                                        
                },
                error(rta) {
                    console.log(rta);
                }
            });
            var text = new XMLHttpRequest();
            text.open("GET", ipLocal + "system/dominio.dat", false);
            text.send(null);
            dominio = text.responseText;

        });





        function inforCAr(rta, idprueba) {
            $.ajax({
                type: "POST",
                url: "http://" + ipCAR + "/cdapp/rest/final/medicionfinal",
                headers: {
                    "Authorization": "b56c19aa217e36a6c182be3ce6fab1851c32a6860f74a312f2cf6d230f6c1573",
                    "Content-Type": "application/json"
                },

                data: rta,
                success: function(rta) {
                    console.log(rta)
                    if (rta.resp == "OK") {
                        var estado = 1;
                        var tipo = 'Envio car exitoso.';
                        guardarTabla(estado, tipo, idprueba);
                    } else {
                        var estado = 0;
                        var tipo = 'Envio car fallido.';
                        guardarTabla(estado, tipo, idprueba);
                    }
                },
                errors: function(rta) {
                    console.log(rta);
                }
            });
        }

        function guardarTabla(estado, tipo, idprueba) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/oficina/fur/CFUR/saveControl",
                data: {
                    estado: estado,
                    tipo: tipo,
                    idprueba: idprueba
                },
                success: function(rta) {
                    console.log(rta);
                },
                errors: function(rta) {
                    console.log(rta);
                }
            });
        }



        var guardarConsecutivo = function(e) {
            var idht = $('#idhojapruebas').val().split('-');
            var data = {
                idhojapruebas: idht[0],
                consecutivorunt: e.value,
                reinspeccion: idht[1]
            };
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/oficina/gestion/CGPrueba/guardarConsecutivoRechazado',
                type: 'post',
                data: data,
                async: false
            });
        };

        var enviarAnulacion = function() {
            var idht = $('#idhojapruebas').val().split('-');
            var data = {
                idhojapruebas: $('#idhojapruebas').val(),
                placa: placa,
                ocasion: ocasion,
                reinspeccion: idht[1]
            };
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/oficina/gestion/CGPrueba/CGVRECHAEnvioAnulacion',
                type: 'post',
                data: data,
                async: false,
                success: function() {
                    window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
                }
            });
        };

        // var enviarASICOV = function() {
        //     // if (informeWebBogota == '1') {
        //     //     getPruebasGases();
        //     // }
        //     if ($('#consecutivoRunt').val() === '') {
        //         var mensaje = document.getElementById('mensaje');
        //         mensaje.style.display = 'block';
        //         mensaje.style.position = 'relative';
        //         $("#confirmacionEnvio").modal('hide');
        //     } else {
        //         var segundos = 2;
        //         var proceso = setInterval(function() {
        //             document.getElementById('btnAsignar').disabled = 'true';
        //             document.getElementById('mensajeSicov').style.color = 'black';
        //             $('#mensajeSicov').text('Por favor espere. Este proceso puede tomar hasta un minuto');
        //             if (segundos === 0) {
        //                 clearInterval(proceso);
        //                 var data = {
        //                     envioSicov: 'true',
        //                     dato: $('#idhojapruebas').val(),
        //                     envio: '2',
        //                     IdUsuario: '1',
        //                     sicovModoAlternativo: localStorage.getItem("sicovModoAlternativo"),
        //                     ipSicovAlternativo: localStorage.getItem("ipSicovAlternativo")
        //                 };
        //                 $.ajax({
        //                     url: '<?php echo base_url(); ?>index.php/oficina/fur/CFUR',
        //                     type: 'post',
        //                     data: data,
        //                     async: false,
        //                     success: function(rta) {
        //                         var dat = rta.split('|');
        //                         if (dat[1] === '0000' || dat[1] === '1') {
        //                             var segundos = 3;
        //                             var proceso = setInterval(function() {
        //                                 $('#mensajeSicov').text("Mensaje de SICOV: " + dat[0] + ". Detalles en el visor.");
        //                                 document.getElementById('mensajeSicov').style.color = 'green';
        //                                 if (segundos === 3) {
        //                                     if (informeWebCornare == '1' || informeWebBogota == '1')
        //                                         getPruebasGases();
        //                                 }
        //                                 if (segundos === 0) {
        //                                     clearInterval(proceso);
        //                                     window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
        //                                 }
        //                                 segundos--;
        //                             }, 1000);
        //                         } else {
        //                             var segundos = 3;
        //                             $('#mensajeSicov').text("Mensaje de SICOV: " + dat[0] + ". Detalles en el visor.");
        //                             document.getElementById('mensajeSicov').style.color = 'salmon';
        //                             var proceso = setInterval(function() {
        //                                 if (segundos === 0) {
        //                                     clearInterval(proceso);
        //                                     window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
        //                                 }
        //                                 segundos--;
        //                             }, 1000);
        //                         }
        //                     }
        //                 });
        //             }
        //             segundos--;
        //         }, 500);
        //     }
        // };

        // var getPruebasGases = function() {
        //     var idhojapruebas = $('#idhojapruebas').val().split("-");
        //     $.ajax({
        //         type: 'POST',
        //         url: "<?php echo base_url(); ?>index.php/oficina/reportes/Cambientales/getPruebasGases",
        //         mimeType: 'json',
        //         async: true,
        //         data: {
        //             idhojapruebas: idhojapruebas[0]
        //         },
        //         success: function(data, textStatus, jqXHR) {

        //             if (informeWebBogota == '1') {
        //                 $.each(data, function(i, data) {
        //                     console.log(data)
        //                     envioinformeBogota(data.idmaquina, data.idprueba, data.tipo_vehiculo, data.idtipocombustible);
        //                 });
        //             } else {
        //                 $.each(data, function(i, data) {
        //                     saveSerCornare(data.idmaquina, data.idprueba, data.tipo_vehiculo, data.idtipocombustible);
        //                 });
        //             }
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             console.log(jqXHR.responseText)

        //         }
        //     });
        // }

        // var envioinformeBogota = function(idmaquina, idprueba, tipo_vehiculo, idtipocombustible) {
        //     $.ajax({
        //         type: 'POST',
        //         url: "<?php echo base_url(); ?>index.php/oficina/reportes/Cambientales/envioinformeBogota",
        //         mimeType: 'json',
        //         async: true,
        //         data: {
        //             idmaquina: idmaquina,
        //             idprueba: idprueba,
        //             tipo_vehiculo: tipo_vehiculo,
        //             idtipocombustible: idtipocombustible,
        //             token: localStorage.getItem("tokenBogota")
        //         },
        //         success: function(data, textStatus, jqXHR) {
        //             // console.log(data);
        //             let mensaje = "";
        //             let estado = 0;
        //             if (data !== null) {
        //                 if (typeof data.data.original.aErrores !== "undefined" && data.data.original.aErrores) {
        //                     // console.log(data.data.original.aErrores);
        //                     if (Array.isArray(data.data.original.aErrores)) {
        //                         mensaje = data.data.original.aErrores.map(function(e) {
        //                             return "<div style='font-size:12px;'>" + e + "</div>";
        //                         }).join("");
        //                     } else {
        //                         mensaje = "<div style='font-size:12px;'>" + data.data.original.aErrores + "</div>";
        //                     }
        //                     footer = "<div style='font-size:12px; color:red'>Si el envío no se realizó con éxito, por favor diríjase a la sección de informes ambientales y envíelo nuevamente una vez haya corregido los problemas reportados por el servidor.</div>";
        //                     estado = 0;

        //                 } else {
        //                     footer = "";
        //                     mensaje = data.data.original.message
        //                     estado = 1;
        //                 }


        //                 saveInfoEnvioBogota(idmaquina, idprueba, mensaje, estado);
        //                 Swal.fire({
        //                     icon: "info",
        //                     title: "<div style='font-size:14px;'>" + data.data.original.name + "</div>",
        //                     html: "<div style='font-size:14px;'>" + data.data.original.message + "</div><br>" + mensaje,
        //                     footer: footer,
        //                     width: "800px",
        //                 });
        //             } else {
        //                 mensaje = "No se recibió respuesta del servidor.";
        //                 estado = 0;
        //                 Swal.fire({
        //                     icon: "info",
        //                     html: "<div style='font-size:14px;'>Tenemos problemas para realizar el envio a la autoridad ambiental, comuniquese con soporte.</div><br>",
        //                     footer: "<div style='font-size:12px; color:red'>Si el envío no se realizó con éxito, por favor diríjase a la sección de informes ambientales y envíelo nuevamente una vez haya corregido los problemas reportados por el servidor.</div>",
        //                     width: "800px",
        //                 });
        //                 saveInfoEnvioBogota(idmaquina, idprueba, mensaje, estado);
        //             }

        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             console.log("error:" + jqXHR.responseText)

        //         }
        //     });
        // }


        var enviarASICOV = function() {
            // if (informeWebBogota == '1') {
            //     getPruebasGases();
            // }
            // if ($('#consecutivoRunt').val() === '') {
            //     var mensaje = document.getElementById('mensaje');
            //     mensaje.style.display = 'block';
            //     mensaje.style.position = 'relative';
            //     $("#confirmacionEnvio").modal('hide');
            // } else {
            // var segundos = 2;
            // var proceso = setInterval(function() {
            document.getElementById('btnAsignar').disabled = 'true';
            document.getElementById('mensajeSicov').style.color = 'black';
            $('#mensajeSicov').text('Por favor espere. Este proceso puede tomar hasta un minuto');
            // if (segundos === 0) {
            // clearInterval(proceso);
            var data = {
                envioSicov: 'true',
                dato: $('#idhojapruebas').val(),
                envio: '2',
                IdUsuario: '1',
                sicovModoAlternativo: localStorage.getItem("sicovModoAlternativo"),
                ipSicovAlternativo: localStorage.getItem("ipSicovAlternativo")
            };
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/oficina/fur/CFUR',
                type: 'post',
                data: data,
                async: true,
                success: function(rta) {
                    var dat = rta.split('|');
                    var segundos = 3;
                    if (dat[1] === '0000' || dat[1] === '1') {
                        if (informeWebCornare == '1' || informeWebBogota == '1') {
                            $('#mensajeSicov').text("Mensaje de SICOV: " + dat[0] + ". Detalles en el visor.");
                            document.getElementById('mensajeSicov').style.color = 'green';
                            var proceso = setInterval(function() {
                                if (segundos === 0) {
                                    clearInterval(proceso);
                                    $("#confirmacionEnvio").modal('hide');
                                    Swal.fire({
                                        icon: "info",
                                        title: "Enviando a Ministerio de Ambiente",
                                        text: "Por favor espere mientras se realiza el envío...",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        showConfirmButton: false,
                                        didOpen: () => {
                                            Swal.showLoading();
                                        }
                                    });
                                    // Para cerrarlo después, usa: Swal.close();
                                    getPruebasGases();
                                }
                                segundos--;
                            }, 1000);

                        } else {
                            $('#mensajeSicov').text("Mensaje de SICOV: " + dat[0] + ". Detalles en el visor.");
                            document.getElementById('mensajeSicov').style.color = 'green';
                            var proceso = setInterval(function() {
                                if (segundos === 0) {
                                    clearInterval(proceso);
                                    window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
                                }
                                segundos--;
                            }, 1000);
                        }
                    } else {
                        var segundos = 3;
                        $('#mensajeSicov').text("Mensaje de SICOV: " + dat[0] + ". Detalles en el visor.");
                        document.getElementById('mensajeSicov').style.color = 'salmon';
                        var proceso = setInterval(function() {
                            if (segundos === 0) {
                                clearInterval(proceso);
                                window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
                            }
                            segundos--;
                        }, 1000);
                    }
                }
            });
            // }
            // segundos--;
            // }, 500);
            // }
        };

        var getPruebasGases = function() {
            var idhojapruebas = $('#idhojapruebas').val().split("-");
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/oficina/reportes/Cambientales/getPruebasGases",
                mimeType: 'json',
                async: true,
                data: {
                    idhojapruebas: idhojapruebas[0]
                },
                success: function(data, textStatus, jqXHR) {


                    if (informeWebBogota == '1') {
                        $.each(data, function(i, data) {

                            if (data !== null && data !== "") {
                                envioinformeBogota(data.idmaquina, data.idprueba, data.tipo_vehiculo, data.idtipocombustible);
                            } else {
                                Swal.close();
                                window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
                            }
                        });
                    } else {
                        $.each(data, function(i, data) {
                            if (data !== null && data !== "") {
                                saveSerCornare(data.idmaquina, data.idprueba, data.tipo_vehiculo, data.idtipocombustible);
                            } else {
                                Swal.close();
                                window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
                            }
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.close();
                   Swal.fire({
                        icon: "error",
                        title: "<div style='font-size:14px;'>Problemas en el envio</div>",
                        html: "<div style='font-size:14px;'>" + jqXHR.responseText +"</div>",
                        // footer: footer,
                        width: "800px",
                        confirmButtonText: "Aceptar"
                    }).then(function(result) {
                        if (result && result.isConfirmed) {
                            window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
                        }
                    });

                }
            });
        }

        var envioinformeBogota = function(idmaquina, idprueba, tipo_vehiculo, idtipocombustible) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/oficina/reportes/Cambientales/envioinformeBogota",
                mimeType: 'json',
                async: true,
                data: {
                    idmaquina: idmaquina,
                    idprueba: idprueba,
                    tipo_vehiculo: tipo_vehiculo,
                    idtipocombustible: idtipocombustible,
                    token: localStorage.getItem("tokenBogota")
                },
                success: function(data, textStatus, jqXHR) {
                    // console.log(data);
                    Swal.close();
                    let mensaje = "";
                    let estado = 0;

                      if (data == null || data == '') {
                        Swal.fire({
                            icon: "error",
                            title: "<div style='font-size:14px;'>Problemas en el envio</div>",
                            html: "<div style='font-size:14px;'>No se recibió respuesta del servidor, por favor intente nuevamente.</div>",
                            footer: "<div style='font-size:12px; color:red'>Si el envío no se realizó con éxito, por favor diríjase a la sección de informes ambientales y envíelo nuevamente una vez haya corregido los problemas reportados por el servidor.</div>",
                            width: "800px",
                            confirmButtonText: "Aceptar"
                        }).then(function(result) {
                            if (result && result.isConfirmed) {
                                window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
                            }
                        });
                        saveInfoEnvioBogota(idmaquina, idprueba, mensaje, estado);
                        return;
                    }
                    if (data !== null) {
                        if (typeof data.data.original.aErrores !== "undefined" && data.data.original.aErrores) {
                            // console.log(data.data.original.aErrores);
                            if (Array.isArray(data.data.original.aErrores)) {
                                mensaje = data.data.original.aErrores.map(function(e) {
                                    return "<div style='font-size:12px;'>" + e + "</div>";
                                }).join("");
                            } else {
                                mensaje = "<div style='font-size:12px;'>" + data.data.original.aErrores + "</div>";
                            }
                            footer = "<div style='font-size:12px; color:red'>Si el envío no se realizó con éxito, por favor diríjase a la sección de informes ambientales y envíelo nuevamente una vez haya corregido los problemas reportados por el servidor.</div>";
                            estado = 0;

                        } else {
                            footer = "";
                            mensaje = data.data.original.message
                            estado = 1;
                        }

                        saveInfoEnvioBogota(idmaquina, idprueba, mensaje, estado);
                        Swal.fire({
                            icon: "info",
                            title: "<div style='font-size:14px;'>" + data.data.original.name + "</div>",
                            html: "<div style='font-size:14px;'>" + data.data.original.message + "</div><br>" + mensaje,
                            footer: footer,
                            width: "800px",
                            confirmButtonText: "Aceptar"
                        }).then(function(result) {
                            if (result && result.isConfirmed) {
                                window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
                            }
                        });
                    } else {
                        mensaje = "No se recibió respuesta del servidor.";
                        estado = 0;
                        saveInfoEnvioBogota(idmaquina, idprueba, mensaje, estado);
                        Swal.fire({
                            icon: "info",
                            html: "<div style='font-size:14px;'>Tenemos problemas para realizar el envio a la autoridad ambiental, comuniquese con soporte.</div><br>",
                            footer: "<div style='font-size:12px; color:red'>Si el envío no se realizó con éxito, por favor diríjase a la sección de informes ambientales y envíelo nuevamente una vez haya corregido los problemas reportados por el servidor.</div>",
                            width: "800px",
                        }).then(function(result) {
                            if (result && result.isConfirmed) {
                                window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
                            }
                        });
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.close();
                    Swal.fire({
                        icon: "error",
                        title: "<div style='font-size:14px;'>Problemas en el envio</div>",
                        html: "<div style='font-size:14px;'>" + jqXHR.responseText +"</div>",
                        // footer: footer,
                        width: "800px",
                        confirmButtonText: "Aceptar"
                    }).then(function(result) {
                        if (result && result.isConfirmed) {
                            window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
                        }
                    });

                }
            });
        }

        async function saveInfoEnvioBogota(idmaquina, idprueba, mensaje, estado) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/oficina/reportes/Cambientales/saveInfoEnvioBogota",
                mimeType: 'json',
                async: true,
                data: {
                    placa: placa,
                    idmaquina: idmaquina,
                    idprueba: idprueba,
                    mensaje: mensaje,
                    estado: estado
                },
                success: function(data, textStatus, jqXHR) {
                    console.log(data);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText)

                }
            });
        }

        var saveSerCornare = function(idmaquina, idprueba, tipo_vehiculo, tipoCombustible) {
            //var idhojapruebas = $('#idhojapruebas').val().split("-");
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/oficina/reportes/Cambientales/getInformeCornareWeb",
                mimeType: 'json',
                async: true,
                data: {
                    idmaquina: idmaquina,
                    idprueba: idprueba,
                    tipo_vehiculo: tipo_vehiculo,
                    tipoCombustible: tipoCombustible
                },
                success: function(data, textStatus, jqXHR) {
                    console.log(data)
                    Swal.close();
                    if (data.length !== 0) {
                        envioInformeCornare(data, idprueba, tipo_vehiculo, tipoCombustible);
                        //                                            envioInformeCornare(data, idprueba, tipoVehiculo);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //console.log(jqXHR.responseText)

                }
            });
        }
        var envioInformeCornare = function(data, idprueba, tipoVehiculo, tipoCombustible) {
            var datos = {
                informe: data,
                function: "saveDatos"
            }
            var norma = "";
            console.log(tipoVehiculo)
            console.log(tipoCombustible)
            if (tipoVehiculo !== '3' && (tipoCombustible === '2' || tipoCombustible === '4' || tipoCombustible === '3')) {
                norma = "NTC4983";
            } else if (tipoVehiculo !== '3' && tipoCombustible === '1') {
                norma = "NTC4231";
            } else {
                norma = "NTC5365";
            }
            fetch("http://" + dominio + "/api/index.php/" + norma, {
                    method: "POST",
                    body: JSON.stringify(datos),
                    headers: {
                        'Autorization': 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ijg5NnNkYndmZTg3dmNzZGFmOTg0bmc4ZmdoMjRvMTI5MHIi.HraZ7y3eG3dGhKngzOWge-je8Y3lxZgldXjbRbcA7cA',
                        'Content-Type': 'application/json'
                    },
                }, 200)
                .then(respuesta => respuesta)
                .then((rta) => {
                    insertControl(idprueba);

                })
                .catch(error => {
                    console.log(error.message);

                });
        }

        var insertControl = function(idprueba) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/oficina/reportes/Cambientales/insertControl",
                mimeType: 'json',
                async: true,
                data: {
                    idprueba: idprueba
                },
                success: function(data, textStatus, jqXHR) {
                    console.log(data)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText)

                }
            });
        }

        // // Función principal mejorada
        // var enviarASICOV = async function() {
        //     // Validación inicial
        //     if ($('#consecutivoRunt').val() === '') {
        //         mostrarMensajeError('El consecutivo RUNT es requerido');
        //         $("#confirmacionEnvio").modal('hide');
        //         return;
        //     }

        //     try {
        //         // Preparar interfaz para el proceso
        //         prepararInterfazParaEnvio();

        //         // Espera inicial para feedback visual
        //         await esperar(2000);

        //         // Envío a SICOV
        //         const resultadoSicov = await enviarSICOV();

        //         // Procesar respuesta de SICOV
        //         await procesarRespuestaSICOV(resultadoSicov);

        //     } catch (error) {
        //         console.error('Error en el proceso:', error);
        //         mostrarMensajeError('Ocurrió un error inesperado en el proceso');
        //     }
        // };

        // // Función para preparar la interfaz
        // const prepararInterfazParaEnvio = () => {
        //     document.getElementById('btnAsignar').disabled = true;
        //     mostrarMensajeProcesando('Por favor espere. Este proceso puede tomar hasta un minuto');
        // };

        // // Función para enviar a SICOV
        // const enviarSICOV = () => {
        //     return new Promise((resolve, reject) => {
        //         const data = {
        //             envioSicov: 'true',
        //             dato: $('#idhojapruebas').val(),
        //             envio: '2',
        //             IdUsuario: '1',
        //             sicovModoAlternativo: localStorage.getItem("sicovModoAlternativo"),
        //             ipSicovAlternativo: localStorage.getItem("ipSicovAlternativo")
        //         };

        //         $.ajax({
        //             url: '<?php echo base_url(); ?>index.php/oficina/fur/CFUR',
        //             type: 'post',
        //             data: data,
        //             success: function(response) {
        //                 resolve(response);
        //             },
        //             error: function(xhr, status, error) {
        //                 reject(new Error(`Error en envío SICOV: ${error}`));
        //             }
        //         });
        //     });
        // };

        // // Función para procesar respuesta de SICOV
        // const procesarRespuestaSICOV = async (respuesta) => {
        //     const datos = respuesta.split('|');
        //     const codigoRespuesta = datos[1];
        //     const mensaje = datos[0];

        //     if (codigoRespuesta === '0000' || codigoRespuesta === '1') {
        //         // Éxito
        //         mostrarMensajeExito(`Mensaje de SICOV: ${mensaje}. Detalles en el visor.`);

        //         // Envío de pruebas ambientales si corresponde
        //         if (informeWebCornare === '1' || informeWebBogota === '1') {
        //             await procesarPruebasAmbientales();
        //         }

        //         // Espera y redirección
        //         await esperarConContador(3000, 'Redirigiendo en');
        //         redirigirAGestion();

        //     } else {
        //         // Error
        //         mostrarMensajeError(`Mensaje de SICOV: ${mensaje}. Detalles en el visor.`);
        //         await esperarConContador(3000, 'Redirigiendo en');
        //         redirigirAGestion();
        //     }
        // };

        // // Función para procesar pruebas ambientales
        // const procesarPruebasAmbientales = async () => {
        //     try {
        //         const pruebas = await obtenerPruebasGases();

        //         if (informeWebBogota === '1') {
        //             await enviarPruebasBogota(pruebas);
        //         } else {
        //             await enviarPruebasCornare(pruebas);
        //         }

        //     } catch (error) {
        //         console.error('Error procesando pruebas ambientales:', error);
        //         mostrarMensajeAdvertencia('Hubo problemas con el envío de pruebas ambientales');
        //     }
        // };

        // // Función mejorada para obtener pruebas
        // const obtenerPruebasGases = () => {
        //     return new Promise((resolve, reject) => {
        //         const idhojapruebas = $('#idhojapruebas').val().split("-")[0];

        //         $.ajax({
        //             type: 'POST',
        //             url: "<?php echo base_url(); ?>index.php/oficina/reportes/Cambientales/getPruebasGases",
        //             data: {
        //                 idhojapruebas: idhojapruebas
        //             },
        //             success: function(data) {
        //                 resolve(data);
        //             },
        //             error: function(jqXHR, textStatus, errorThrown) {
        //                 reject(new Error(`Error obteniendo pruebas: ${errorThrown}`));
        //             }
        //         });
        //     });
        // };

        // // Función mejorada para enviar a Bogotá
        // const enviarPruebasBogota = async (pruebas) => {
        //     const resultados = [];

        //     for (const prueba of pruebas) {
        //         try {
        //             const resultado = await enviarPruebaBogotaIndividual(prueba);
        //             resultados.push(resultado);

        //             // Pequeña pausa entre envíos
        //             await esperar(500);

        //         } catch (error) {
        //             console.error(`Error enviando prueba ${prueba.idprueba}:`, error);
        //             resultados.push({
        //                 prueba: prueba.idprueba,
        //                 estado: 'error',
        //                 mensaje: error.message
        //             });
        //         }
        //     }

        //     mostrarResumenEnvios(resultados);
        //     return resultados;
        // };

        // // Función para enviar prueba individual a Bogotá
        // const enviarPruebaBogotaIndividual = (prueba) => {
        //     return new Promise((resolve, reject) => {
        //         $.ajax({
        //             type: 'POST',
        //             url: "<?php echo base_url(); ?>index.php/oficina/reportes/Cambientales/envioinformeBogota",
        //             data: {
        //                 idmaquina: prueba.idmaquina,
        //                 idprueba: prueba.idprueba,
        //                 tipo_vehiculo: prueba.tipo_vehiculo,
        //                 idtipocombustible: prueba.idtipocombustible,
        //                 token: localStorage.getItem("tokenBogota")
        //             },
        //             success: function(data) {
        //                 procesarRespuestaBogota(data, prueba)
        //                     .then(resolve)
        //                     .catch(reject);
        //             },
        //             error: function(jqXHR, textStatus, errorThrown) {
        //                 reject(new Error(`Error de conexión: ${errorThrown}`));
        //             }
        //         });
        //     });
        // };

        // // Procesar respuesta de Bogotá
        // const procesarRespuestaBogota = async (data, prueba) => {
        //     let mensaje, estado, footer;

        //     if (!data) {
        //         mensaje = "No se recibió respuesta del servidor.";
        //         estado = 0;
        //         footer = "<div style='font-size:12px; color:red'>Comuníquese con soporte técnico.</div>";
        //     } else if (data.data?.original?.aErrores) {
        //         const errores = Array.isArray(data.data.original.aErrores) ?
        //             data.data.original.aErrores :
        //             [data.data.original.aErrores];

        //         mensaje = errores.map(e => `<div style='font-size:12px;'>${e}</div>`).join("");
        //         estado = 0;
        //         footer = "<div style='font-size:12px; color:red'>Revise los problemas reportados antes de reintentar.</div>";
        //     } else {
        //         mensaje = data.data?.original?.message || "Envío exitoso";
        //         estado = 1;
        //         footer = "";
        //     }

        //     // Guardar información del envío
        //     await guardarInfoEnvioBogota(prueba, mensaje, estado);

        //     // Mostrar alerta al usuario
        //     await mostrarAlertaBogota(data, mensaje, footer);

        //     return {
        //         prueba: prueba.idprueba,
        //         estado: estado === 1 ? 'éxito' : 'error',
        //         mensaje: mensaje
        //     };
        // };

        // // Función mejorada para mostrar alertas de Bogotá
        // const mostrarAlertaBogota = (data, mensaje, footer) => {
        //     return Swal.fire({
        //         icon: data ? "info" : "error",
        //         title: `<div style='font-size:14px;'>${data?.data?.original?.name || 'Envío a Bogotá'}</div>`,
        //         html: `<div style='font-size:14px;'>${data?.data?.original?.message || 'Proceso completado'}</div><br>${mensaje}`,
        //         footer: footer,
        //         width: "800px",
        //     });
        // };

        // // Función mejorada para guardar información
        // const guardarInfoEnvioBogota = (prueba, mensaje, estado) => {
        //     return new Promise((resolve) => {
        //         $.ajax({
        //             type: 'POST',
        //             url: "<?php echo base_url(); ?>index.php/oficina/reportes/Cambientales/saveInfoEnvioBogota",
        //             data: {
        //                 placa: placa,
        //                 idmaquina: prueba.idmaquina,
        //                 idprueba: prueba.idprueba,
        //                 mensaje: mensaje,
        //                 estado: estado
        //             },
        //             success: function() {
        //                 resolve();
        //             },
        //             error: function() {
        //                 // No rechazamos para no interrumpir el flujo principal
        //                 resolve();
        //             }
        //         });
        //     });
        // };

        // // Funciones de utilidad para mensajes
        // const mostrarMensajeProcesando = (mensaje) => {
        //     const elemento = document.getElementById('mensajeSicov');
        //     elemento.style.color = 'black';
        //     elemento.textContent = mensaje;
        // };

        // const mostrarMensajeExito = (mensaje) => {
        //     const elemento = document.getElementById('mensajeSicov');
        //     elemento.style.color = 'green';
        //     elemento.textContent = mensaje;
        // };

        // const mostrarMensajeError = (mensaje) => {
        //     const elemento = document.getElementById('mensajeSicov');
        //     elemento.style.color = 'salmon';
        //     elemento.textContent = mensaje;
        // };

        // const mostrarMensajeAdvertencia = (mensaje) => {
        //     const elemento = document.getElementById('mensajeSicov');
        //     elemento.style.color = 'orange';
        //     elemento.textContent = mensaje;
        // };

        // // Funciones de utilidad para esperas
        // const esperar = (ms) => new Promise(resolve => setTimeout(resolve, ms));

        // const esperarConContador = (ms, mensajeBase) => {
        //     return new Promise(resolve => {
        //         let segundos = ms / 1000;
        //         const elemento = document.getElementById('mensajeSicov');
        //         const mensajeOriginal = elemento.textContent;

        //         const intervalo = setInterval(() => {
        //             elemento.textContent = `${mensajeOriginal} (${mensajeBase} ${segundos}s)`;
        //             segundos--;

        //             if (segundos < 0) {
        //                 clearInterval(intervalo);
        //                 elemento.textContent = mensajeOriginal;
        //                 resolve();
        //             }
        //         }, 1000);
        //     });
        // };

        // // Función de redirección
        // const redirigirAGestion = () => {
        //     window.location.replace("<?php echo base_url(); ?>index.php/oficina/CGestion");
        // };

        // // Función para mostrar resumen de envíos (opcional)
        // const mostrarResumenEnvios = (resultados) => {
        //     const exitosos = resultados.filter(r => r.estado === 'éxito').length;
        //     const errores = resultados.filter(r => r.estado === 'error').length;

        //     if (errores > 0) {
        //         console.log(`Resumen envíos: ${exitosos} exitosos, ${errores} con error`);
        //     }
        // };

        // var getTokenBogota = function() {
        //     $.ajax({
        //         url: '<?php echo base_url(); ?>index.php/Cindex/getTokenBogota',
        //         type: 'post',
        //         mimeType: 'json',
        //         success: function(data) {
        //             if (localStorage.getItem("tokenBogota") === null || localStorage.getItem("tokenBogota") === undefined) {
        //                 localStorage.setItem("tokenBogota", data['access_token']);
        //             }

        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             console.log(jqXHR.responseText)
        //         }
        //     });
        // }
    </script>
</body>

</html>