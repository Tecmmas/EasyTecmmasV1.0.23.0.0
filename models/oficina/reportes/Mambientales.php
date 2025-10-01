<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mambientales extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->dbutil();
        $this->db = $this->load->database('default', true);
        $this->myforge = $this->load->dbforge($this->db, TRUE);
    }

    //inicio consulta infome carder
    //    public function informecarder_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme) {
    //        $query = $this->db->query("SELECT                  
    //			p.idprueba AS Id,
    //                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') 'Fecha inicio',
    //                        v.numero_placa AS Placa,
    //                        cl.cod_ciudad AS  'Codigo ciudad',
    //                        IF(v.registroRunt=1,
    //                        (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
    //                        (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) Marca,
    //                        c.nombre AS 'Tipo vehiculo',
    //                        s.nombre AS Servicio,
    //                        v.cilindraje AS Cilindraje,
    //                        v.ano_modelo AS Modelo,
    //                        t.nombre AS Combustible,
    //                        v.kilometraje AS Kilometraje,
    //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti',
    //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti',
    //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti',
    //                        (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Valor ruido',
    //                        IF(p.estado=2,'Aprobado','Rechazado') Resultado
    //                        FROM 
    //			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma 
    //                        WHERE 
    //                        h.idhojapruebas=p.idhojapruebas AND
    //                        p.idmaquina=ma.idmaquina AND 
    //                        ma.idmaquina=$idconf_maquina AND 
    //                        p.idtipo_prueba=3 AND
    //                        v.idclase = c.idclase AND 
    //                        (h.reinspeccion=0 or h.reinspeccion=1) AND
    //                        p.estado<>0 AND
    //                        v.idvehiculo=h.idvehiculo AND
    //                        v.idcliente=cl.idcliente AND 
    //                        v.idservicio=s.idservicio AND 
    //                        v.idtipocombustible=t.idtipocombustible AND 
    //                        v.idtipocombustible=2 AND 
    //                        v.tipo_vehiculo=3 AND
    //                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
    //        return $query;
    //    }
    //    public function informecarder_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme) {
    //        $query = $this->db->query("SELECT                  
    //			p.idprueba AS Id,
    //                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') 'Fecha inicio',
    //                        v.numero_placa AS Placa,
    //                        cl.cod_ciudad AS 'Codigo ciudad',
    //                        IF(v.registroRunt=1,
    //                        (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
    //                        (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) Marca,
    //                        c.nombre AS 'Tipo vehiculo',
    //                        s.nombre AS Servicio,
    //                        v.ano_modelo AS Modelo,
    //                        v.cilindraje AS Cilindraje,
    //                        t.nombre AS Combustible,
    //                        v.kilometraje AS Kilometraje,
    //                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'Rpm ralenti',
    //                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'Hc ralenti',
    //                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'Co ralenti',
    //                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'Co2 ralenti',
    //                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 ralenti',
    //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm crucero',
    //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co crucero',
    //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 crucero',
    //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Hc crucero',
    //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'O2 crucero',
    //                        (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Valor ruido',
    //                        IF(p.estado=2,'Aprobado','Rechazado') Resultado
    //                        FROM 
    //			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma 
    //                        WHERE 
    //                        h.idhojapruebas=p.idhojapruebas AND
    //                        p.idmaquina=ma.idmaquina AND 
    //                        ma.idmaquina=$idconf_maquina AND 
    //                        p.idtipo_prueba=3 AND
    //                        v.idclase = c.idclase AND 
    //                        (h.reinspeccion=0 or h.reinspeccion=1) AND
    //                        p.estado<>0 AND
    //                        v.idvehiculo=h.idvehiculo AND
    //                        v.idcliente=cl.idcliente AND 
    //                        v.idservicio=s.idservicio AND 
    //                        v.idtipocombustible=t.idtipocombustible AND 
    //                        (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND 
    //                        v.idtipocombustible= 2 AND                         
    //                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
    //        return $query;
    //    }


    public function informecarder_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT                  
			p.idprueba AS Id,
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') 'Fecha inicio',
                        v.numero_placa AS Placa,
                        cl.cod_ciudad AS 'Codigo ciudad',
                        IF(v.registroRunt=1,
                        (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                        (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) Marca,
                        c.nombre AS 'Tipo vehiculo',
                        s.nombre AS Servicio,
                        v.cilindraje AS Cilindraje,
                        t.nombre AS Combustible,
                        v.ano_modelo AS Modelo,
                        v.kilometraje AS Kilometraje,
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'---') AS 'Rpm',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---') AS 'Ciclo 1',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---') AS 'Ciclo 2',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---') AS 'Ciclo 3',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---') AS 'Ciclo 4',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=61 ORDER BY 1 DESC LIMIT 1),'---') Opacidad,
                        (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) Valor_ruido,
                        IF(p.estado=2,'Aprobado','Rechazado') Resultado
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma 
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        p.idtipo_prueba=2 AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        p.estado<>0 AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND 
                        v.idtipocombustible= 1 AND 
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    //fin consulta infome carder
    //
    //inicio consulta infome corponarino
    public function informecorponarino_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT                  
			cd.nombre_cda AS 'Nombre cda',
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d') 'Fecha',
                        v.numero_placa AS Placa,
                        v.ano_modelo AS Modelo,
                        s.nombre AS Servicio,
                        IF(v.registroRunt=1,
                        (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                        (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) Marca,
                        c.nombre AS Clase,
                        v.tiempos AS 'Motor',
                        v.cilindraje AS Cilindraje,
                        v.kilometraje AS Kilometraje,
                        IF(v.scooter = 0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'0') 'Temperatura',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'O2 ralenti (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti (Ppm)',
                        IF(p.estado=2,'Aprobado','No Aprobado') Estado
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma , cda cd
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        p.idtipo_prueba=3 AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        (p.estado<>0 AND p.estado<>5 AND p.estado <> 9) AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        v.idtipocombustible=2 AND 
                        v.tipo_vehiculo=3 AND
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informecorponarino_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT                  
			cd.nombre_cda AS 'Nombre cda',
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d') 'Fecha',
                        v.numero_placa AS Placa,
                        v.ano_modelo AS Modelo,
                        s.nombre AS Servicio,
                        IF(v.registroRunt=1,
                        (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                        (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) Marca,
                        if(v.registroRunt=1,
                        (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                        (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                        c.nombre AS Clase,
                        v.cilindraje AS Cilindraje,
                        v.kilometraje AS Kilometraje,
                        IF(v.scooter = 0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'') 'Temperatura',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co crucero (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 crucero (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'O2 ralenti (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'O2 crucero (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti (Ppm)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Hc crucero (Ppm)',
                        IF(p.estado=2,'Aprobado','No Aprobado') Estado
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma , cda cd
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        p.idtipo_prueba=3 AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        (p.estado<>0 AND p.estado<>5 AND p.estado <> 9) AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND 
                        v.idtipocombustible= 2 AND 
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informecorponarino_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT                  
			cd.nombre_cda AS 'Nombre cda',
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d') 'Fecha',
                        v.numero_placa AS Placa,
                        v.ano_modelo AS Modelo,
                        s.nombre AS Servicio,
                        IF(v.registroRunt=1,
                        (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                        (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) Marca,
                        if(v.registroRunt=1,
                        (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                        (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                        t.nombre AS Combustible,
                        c.nombre AS Clase,
                        v.cilindraje AS Cilindraje,
                        v.kilometraje AS Kilometraje,
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=39 ORDER BY 1 DESC LIMIT 1),'---') 'Temperatura',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=41 ORDER BY 1 DESC LIMIT 1),'---') 'Rpm',
                        

                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 1',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo Preliminar',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo Preliminar',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 2',

                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 1',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 1',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 3',

                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 2',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 2',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 4',
                        
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 3',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 3',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---')
                        ) AS 'Valor',
                        IF(p.estado=2,'Aprobado','No Aprobado') Resultado
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma , cda cd
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        p.idtipo_prueba=2 AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        (p.estado<>0 AND p.estado<>5 AND p.estado <> 9) AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND 
                        v.idtipocombustible= 1 AND 
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informe_metropolitana_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT                  
			cd.tipo_identificacion AS 'REVTIPIDE',
			cd.numero_cda AS 'REVIDENTE',
			se.cod_ciudad AS 'REVDIVIPO',
			se.numero_sede AS 'REVSUCURSAL',
			se.clase AS 'REVCLASE',
			cr.numero_certificado AS 'REVNUM CERTIFICADO',
			DATE_FORMAT(cr.fechaimpresion, '%Y/%m/%d') AS 'REVFECHA EXP',
			DATE_FORMAT(cr.fecha_vigencia, '%Y/%m/%d') AS 'REVFECHA VEN',
			'CO' AS 'REVPAIS',
			'0' AS 'REVVEH ESPECIAL',
			v.numero_placa AS 'REVPLACA',
			c.nombre AS 'REVCLASE VEH',
			v.idservicio AS 'REVTIPO SER',
		IF(v.registroRunt=1,
			(SELECT m.idmarcaRUNT FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
			(SELECT m.idmarca FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'REVMARCA',
		IF(v.registroRunt=1,
			(SELECT l.idlineaRUNT FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
			(SELECT l.idlinea FROM linea l WHERE l.idlinea=v.idlinea)) 'REVLINEA',
			v.ano_modelo AS 'REVMODELO',
			v.idcolor AS 'REVCOLOR',
			v.idtipocombustible AS 'REVTIPO COMB',
			v.numero_vin AS 'REVVIN',
			v.cilindraje AS 'REVCILINDRAJE',
			v.kilometraje AS 'REVKILOMETROS',
			IF(v.blindaje = 1, 'SI','NO') AS 'REVBLINDADO',
                        IF(v.polarizado = 1, 'SI','NO') AS 'REVVIDRIOS POLARIZADOS',
			IF(v.tiempos = 4, '4T', '2T') AS 'REVTIPMOTOR MOTO',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISICO RAL',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISICO2 RAL',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISIHC RAL',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISIO2 RAL',
			'' AS 'REVEMISINOX RAL',
			IF(v.scooter = 0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'0') 'REVTEMPERATURA RAL',
			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'REVREVOLUCIONES RAL',           
			(SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'REVEMISI RUIDO',
			(SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=8 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='defecto' ORDER BY 1 DESC LIMIT 1) 'REVCAUSA'
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma , cda cd, sede se, certificados cr
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        cd.idcda=se.idcda AND 
                        h.idhojapruebas=cr.idhojapruebas AND 
                        p.idtipo_prueba=3 AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        p.estado<>0 AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        v.idtipocombustible=2 AND 
                        v.tipo_vehiculo=3 AND
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informe_metropolitana_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT                  
			cd.tipo_identificacion AS 'REVTIPIDE',
			cd.numero_cda AS 'REVIDENTE',
			se.cod_ciudad AS 'REVDIVIPO',
			se.numero_sede AS 'REVSUCURSAL',
			se.clase AS 'REVCLASE',
			cr.numero_certificado AS 'REVNUM CERTIFICADO',
			DATE_FORMAT(cr.fechaimpresion, '%Y/%m/%d') AS 'REVFECHA EXP',
			DATE_FORMAT(cr.fecha_vigencia, '%Y/%m/%d') AS 'REVFECHA VEN',
			'CO' AS 'REVPAIS',
			'0' AS 'REVVEH_ESPECIAL',
			v.numero_placa AS 'REVPLACA',
			c.nombre AS 'REVCLASE_VEH',
			v.idservicio AS 'REVTIPO SER',
		IF(v.registroRunt=1,
			(SELECT m.idmarcaRUNT FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
			(SELECT m.idmarca FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'REVMARCA',
		IF(v.registroRunt=1,
			(SELECT l.idlineaRUNT FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
			(SELECT l.idlinea FROM linea l WHERE l.idlinea=v.idlinea)) 'REVLINEA',
			v.ano_modelo AS 'REVMODELO',
			v.idcolor AS 'REVCOLOR',
			v.idtipocombustible AS 'REVTIPO COMB',
			v.numero_vin AS 'REVVIN',
			v.cilindraje AS 'REVCILINDRAJE',
			v.kilometraje AS 'REVKILOMETROS',
			IF(v.blindaje = 1, 'SI','NO') AS 'REVBLINDADO',
			IF(v.polarizado = 1, 'SI','NO') AS 'REVVIDRIOS POLARIZADOS',
			v.diametro_escape AS 'REVDIAMETROESC',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISICO_RAL',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISICO2_RAL',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISIHC_RAL',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISIO2_RAL',
			'' AS 'REVEMISINOX RAL',
			IF(v.scooter = 0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'') 'REVTEMPERATURA_RAL',
			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'REVREVOLUCIONES_RAL',
			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'REVREVOLUCIONES_CRU',           
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISICO_CRU',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISICO2_CRU',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISIHC_CRU',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'REVEMISIO2_CRU',
			IF(v.scooter = 0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'') 'REVTEMPERATURA_CRU',
			'' AS 'REVEMISINOX CRU',
		        (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'REVEMISI_RUIDO',
			(SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=8 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='defecto' ORDER BY 1 DESC LIMIT 1) 'REVCAUSA'
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma , cda cd, sede se, certificados cr
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        cd.idcda=se.idcda AND 
                        h.idhojapruebas=cr.idhojapruebas AND 
                        p.idtipo_prueba=3 AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        p.estado<>0 AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND 
                        v.idtipocombustible= 2 AND 
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informe_metropolitana_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT                  
			cd.tipo_identificacion AS 'REVTIPIDE',
			cd.numero_cda AS 'REVIDENTE',
			se.cod_ciudad AS 'REVDIVIPO',
			se.numero_sede AS 'REVSUCURSAL',
			se.clase AS 'REVCLASE',
			cr.numero_certificado AS 'REVNUM CERTIFICADO',
			DATE_FORMAT(cr.fechaimpresion, '%Y/%m/%d') AS 'REVFECHA EXP',
			DATE_FORMAT(cr.fecha_vigencia, '%Y/%m/%d') AS 'REVFECHA VEN',
			'CO' AS 'REVPAIS',
			'0' AS 'REVVEH_ESPECIAL',
			v.numero_placa AS 'REVPLACA',
			c.nombre AS 'REVCLASE_VEH',
			v.idservicio AS 'REVTIPO SER',
			v.diametro_escape AS 'REVDIAMETROESC',
		IF(v.registroRunt=1,
			(SELECT m.idmarcaRUNT FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
			(SELECT m.idmarca FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'REVMARCA',
		IF(v.registroRunt=1,
			(SELECT l.idlineaRUNT FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
			(SELECT l.idlinea FROM linea l WHERE l.idlinea=v.idlinea)) 'REVLINEA',
			v.ano_modelo AS 'REVMODELO',
			v.idcolor AS 'REVCOLOR',
			v.idtipocombustible AS 'REVTIPO COMB',
			v.numero_vin AS 'REVVIN',
			v.cilindraje AS 'REVCILINDRAJE',
			v.kilometraje AS 'REVKILOMETROS',
			IF(v.blindaje = 1, 'SI','NO') AS 'REVBLINDADO',
			IF(v.polarizado = 1, 'SI','NO') AS 'REVVIDRIOS POLARIZADOS',
			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=39 ORDER BY 1 DESC LIMIT 1),'---') 'REVTEMPERATURA',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=41 ORDER BY 1 DESC LIMIT 1),'---') 'REVREVOLUCIONES',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=34 ORDER BY 1 DESC LIMIT 1),'---') 'REVCICLO1',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=35 ORDER BY 1 DESC LIMIT 1),'---') 'REVCICLO2',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=36 ORDER BY 1 DESC LIMIT 1),'---') 'REVCICLO3',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=37 ORDER BY 1 DESC LIMIT 1),'---') 'REVCICLO4',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=61 ORDER BY 1 DESC LIMIT 1),'---') 'REVVALOR',
			(SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'REVEMISI RUIDO',
			(SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=8 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='defecto' ORDER BY 1 DESC LIMIT 1) 'REVCAUSA'
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma , cda cd, sede se, certificados cr
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        cd.idcda=se.idcda AND 
                        h.idhojapruebas=cr.idhojapruebas AND 
                        p.idtipo_prueba=2 AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        p.estado<>0 AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND 
                        v.idtipocombustible= 1 AND  
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informe_car_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($fechainicial == "1") {
            $where = "p.idmaquina=$idconf_maquina AND p.idprueba=$fechafinal";
        } else {
            $where = "p.idmaquina=$idconf_maquina AND 
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY p.fechainicial ASC ";
        }
        if ($datoInforme == 1) {
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr Span Bajo HC',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Resultado Vr Span Bajo HC',   
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr Span Bajo CO %',
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Resultado Vr Span Bajo CO',
			IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr Span Bajo CO2 %',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leido Span Bajo CO2',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr Span Alto HC pp,',
			IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leido Span Alto HC',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr Span Alto CO %',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leido Span Alto CO',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr Span Alto CO2%',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leido Span Alto CO2',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha y hora ultima verificacion y ajuste',";
            //            $cal = "IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Vr Span Bajo HC',
            //                        IFNULL((select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---')  AS 'Resultado Vr Span Bajo HC',
            //                        IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Vr Span Bajo CO %',
            //                        IFNULL((select 
            //                        if((v.tiempos = '2' 
            //                        AND (
            //                        parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.05 
            //                        OR 
            //                        parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.05
            //                        )),
            //                        (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.02,
            //                        if((v.tiempos = '4' 
            //                        AND (
            //                        parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.05
            //                        OR 
            //                        parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.05
            //                        )),
            //                        (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.02,
            //                        parametro))
            //                        from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Resultado Vr Span Bajo CO',
            //                        IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Vr Span Bajo CO2 %',
            //                        IFNULL((select if((v.tiempos = '2' 
            //                        AND (
            //                        parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.4 
            //                        OR 
            //                        parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.4
            //                        )),
            //                        (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
            //                        if((v.tiempos = '4' 
            //                        AND (
            //                        parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.4
            //                        OR 
            //                        parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.4
            //                        )),
            //                        (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
            //                        parametro)) 
            //                        from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor leido Span Bajo CO2',
            //                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Vr Span Alto HC ppm',
            //                        IFNULL((select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor leido Span Alto HC',
            //                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Vr Span Alto CO %',
            //                        IFNULL((select 
            //                        if((v.tiempos = '2' 
            //                        AND (
            //                        parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.2 
            //                        OR 
            //                        parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.2
            //                        )),
            //                        (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
            //                        if((v.tiempos = '4' 
            //                        AND (
            //                        parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.2
            //                        OR 
            //                        parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.2
            //                        )),
            //                        (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
            //                        parametro)) 
            //                        from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor leido Span Alto CO ',
            //
            //                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Vr Span Alto CO2 %',
            //                        
            //                        IFNULL((select 
            //                        if((v.tiempos = '2' 
            //                        AND (
            //                        parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.8 
            //                        OR 
            //                        parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.8
            //                        )),
            //                        (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
            //                        if((v.tiempos = '4' 
            //                        AND (
            //                        parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.8
            //                        OR 
            //                        parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.8
            //                        )),
            //                        (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
            //                        parametro)) 
            //                        from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor leido Span Alto CO2 ',
            //                        DATE_FORMAT((select parametro from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'%Y/%m/%d') AS 'Fecha de verificacion AAAA/MM/DD',";
        } else {
            $cal = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo CO',
            
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto CO2',
            IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Fecha y hora ultima verificacion y ajuste',";
        }
        $consulta = <<<EOF
                   Select
                        ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500') AS 'No CDA',
                        '' AS 'Razon_social',
                        IFNULL((select c.nombre_cda FROM cda c LIMIT 1),'---') AS 'Nombre CDA',
                        IFNULL((select c.numero_id FROM cda c LIMIT 1),'---') AS 'Nit CDA',
                        IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto',
                        IFNULL((select s.direccion FROM sede s LIMIT 1),'---')  AS 'Direccion CDA',
                        IFNULL((select s.email FROM sede s LIMIT 1),'---') AS 'Correo electronico',
                        IFNULL((select s.telefono_uno FROM sede s LIMIT 1),'---') AS 'Telefono de contacto',
								IFNULL((select s.cod_ciudad FROM sede s LIMIT 1),'---') AS 'Ciudad',
                        IFNULL((select c.numero_resolucion FROM cda c LIMIT 1),'---') AS 'No. Resolución de Certificación Autoridad Ambiental',
                        IFNULL((select DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') FROM cda c LIMIT 1),'---') AS 'Fecha resolucion CDA',
                        IFNULL((select s.clase FROM sede s LIMIT 1),'---') AS 'Clase del cda',                        
                        '' AS 'Numero_expe',
                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado de RTM',
                        '' AS 'No_total_equipos_analizadores_motos_4T_2T',
                        '' as 'valorPef',
                        '' AS 'Serie_banco',
                        '' AS 'Serie_analizador',
                        '' AS 'Marca_analizador',
                        $cal
                        'TECMMAS SAS' AS 'Nombre proveedor del software de operación',
                        '---' AS 'Marca_software_operacion',
                        '---' AS 'Version_software_operacion',
                        p.idprueba  AS 'No de consecutivo prueba',
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') AS 'Fecha y hora inicio de la prueba',
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i')  AS 'Fecha y hira final de la prueba',
                        IFNULL((SELECT u.identificacion FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'---') AS 'Inspector Realiza Prueba',
                        IFNULL((SELECT concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Nombre razon social propietario',
                        IFNULL((SELECT ti.id_mintransporte FROM usuarios u, tipo_identificacion ti WHERE p.idusuario = u.IdUsuario AND u.tipo_identificacion = ti.tipo_identificacion LIMIT 1),'---') AS 'Tipo documento',
                        IFNULL((SELECT cl.numero_identificacion FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'No documento',
                        IFNULL((SELECT cl.direccion FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Direccion',
                        IFNULL((SELECT cl.telefono1 FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Telefono',
                        IFNULL((SELECT cl.cod_ciudad FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Ciudad Cliente',
                        v.numero_placa AS 'Placa',
                        if(v.registroRunt=1,
                        (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                        (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                        v.ano_modelo AS 'Ano modelo',
                        v.cilindraje AS 'Cilindraje',
                        if(v.registroRunt=1,
                        (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                        (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                        if(v.scooter=1,'2','1') AS 'Diseno',
                        v.idclase AS 'Clase',
                        CASE
                            WHEN v.idservicio = 1 THEN '4'
                            WHEN v.idservicio = 3 THEN '1'
                            WHEN v.idservicio = 4 THEN '3'
                            ELSE v.idservicio
                        END AS 'Servicio',
                        CASE
                            WHEN v.idtipocombustible = 2 THEN '1'
                            WHEN v.idtipocombustible = 1 THEN '3'
                            ELSE v.idtipocombustible
                        END AS 'Combustible',
                        'Encendido por chispa' AS 'Tipo motor',
                        v.numero_exostos AS 'Número de tubos de escape',
                        v.numero_motor AS 'No motor',
                        v.numero_serie AS 'No vin / serie',
                        v.numero_tarjeta_propiedad AS 'No licencia transito',
                        v.kilometraje AS 'Kilometraje (km)',                        
                        (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado = 'temp_ambiente') order by 1 desc limit 1) AS 'Temperatura ambiente (°C)',
                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa (%)',                        
                        if(v.convertidor=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura de motor (°C)',
                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'RPM Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC (ppm) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO (%) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2(%) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 (%) Ralentí',
                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=328 or valor = '3.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas en el tubo de escape',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=378 OR valor = '2.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '3.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'Ausencia tapa combustible o fugas',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '3.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'Ausencia tapa aceite o de fugas de aceite',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=335 OR valor = '3.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones en el tubo de escape que no permitan la instalación sistema de muestreo',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=329 OR valor = '4.1.1.1.2')  order by 1 desc limit 1),'NO') AS 'Salidas adicionales al diseño',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),'NO') AS 'Revoluciones fuera de rango',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),'NO') AS 'Presencia humo negro azul',
                        if(p.estado = 5,
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %h:%m'),
                        '') AS 'Fecha y hora aborto de prueba',
                        ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'') AS 'Falla del equipo de medición',
                        ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'') AS 'Falla súbita fluido eléctrico',
                        ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),'') AS 'Bloqueo forzado del equipo de medición',
                        ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'') AS 'Ejecución incorrecta prueba',                        
                       if(p.estado = 1 OR p.estado = 3,
                        concat(
                           ifnull((SELECT '1' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),''),
                           ifnull((SELECT '2' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=349   order by 1 desc limit 1),''),
                           ifnull((SELECT '3' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),''),
                           ifnull((SELECT '4' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),''),
                           ifnull((SELECT '5' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2')  order by 1 desc limit 1),''),
                           ifnull((SELECT '7' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),''),
                           ifnull((SELECT '8' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),''),
                           if(v.tiempos = 2,
                              (ifnull((SELECT '13' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='co_ralenti'  AND valor >= '3.5' order by 1 desc limit 1),'') OR 
                              ifnull((SELECT '14' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='hc_ralenti'  AND valor >= '8000' order by 1 desc limit 1),'') OR 
                              ifnull((SELECT '15' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='co_ralenti'  AND valor >= '3.5' order by 1 desc limit 1),'') OR 
                              ifnull((SELECT '16' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='hc_ralenti'  AND valor >= '1600' order by 1 desc limit 1),'')),                              
                              ''
                           ),
                                               
                           if(v.tiempos = 4,
                           (
                              ifnull((SELECT '17' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti'  AND valor >= '3.5' order by 1 desc limit 1),'')OR 
                              ifnull((SELECT '18' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti'  AND valor >= '1300' order by 1 desc limit 1),'')),
                              ''
                           )                                                                                                  
                        
                        ),'0') AS 'Causas de rechazo',
                        if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'Concepto tecnico',
                        'Resolucion 0762 de 2022' AS 'Resolución de límites máximos permisibles',
                         IFNULL((SELECT ma.idmaquina FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'') 'idsonometro',                        
                        '' AS 'marca_sonometro',
                        '' AS 'serie_sonometro', 
                        IFNULL((SELECT r.valor FROM resultados r, pruebas pp WHERE h.idhojapruebas = pp.idhojapruebas AND pp.idprueba = r.idprueba AND pp.idtipo_prueba = 4 LIMIT 1),'') AS 'Valor de ruido reportado'                        
                        from
                        hojatrabajo h,pruebas p, vehiculos v
                        where
                        v.idvehiculo=h.idvehiculo and
                        h.idhojapruebas=p.idhojapruebas and
                        p.idtipo_prueba=3 and
                        (h.reinspeccion=0 or h.reinspeccion=1) and
                        p.estado<>0 AND
                        $where
                
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
        //        $query = $this->db->query("Select
        //                        ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500') AS 'No CDA',
        //                        c.nombre_cda AS 'Nombre CDA',
        //                        c.numero_id AS 'Nit CDA',
        //                        s.direccion AS 'Direccion CDA',
        //                        s.telefono_uno AS 'Telefono 1 CDA',
        //                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado de RTM',
        //                        s.cod_ciudad  AS 'Ciudad cda',
        //                        c.numero_resolucion AS 'No resolucion CDA',
        //                        DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') AS 'Fecha resolucion CDA',
        //                        (select parametro from config_maquina where tipo_parametro='PEF' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr PEF',
        //                        (select parametro from config_maquina where idmaquina=p.idmaquina and tipo_parametro='serie_analizador' limit 1) AS 'No de serie del banco',
        //                        m.serie AS 'No de serie analizador',
        //                        m.nombre AS 'Marca analizador',
        //                        $cal
        //                        (select valor from config_prueba where idconfig_prueba=601) AS 'Nombre programa',
        //                        (select valor from config_prueba where idconfig_prueba=600) AS 'Version programa',
        //                        p.idprueba  AS 'No de consecutiva prueba',
        //                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha y hora inicio de la prueba',
        //                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s')  AS 'Fecha y hora final de la prueba',
        //                        if(p.estado=5,DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') ,'---') AS 'Fecha y hora aborto de la prueba',
        //                        u.identificacion AS 'Operador realiza prueba',
        //                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_ambiente' order by 1 desc limit 1) AS 'Temperatura ambiente',
        //                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa',
        //                        if(p.estado = 5,
        //                        concat(
        //                        ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'')
        //                        ),'') AS 'Causal aborto analisis',
        //                        concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) AS 'Nombre razon social',
        //                        ti.id_mintransporte AS 'Tipo identificacion',
        //                        cl.numero_identificacion AS 'No documento',
        //                        cl.direccion AS 'Direccion',
        //                        cl.telefono1 AS 'Telefono 1',
        //                        ifnull(cl.telefono2,'---') AS 'Telefono 2',
        //                        cl.cod_ciudad AS 'Ciudad',
        //                        if(v.registroRunt=1,
        //                        (SELECT m.idmarcaRUNT from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
        //                        (SELECT m.idmarca from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
        //                        if(v.tiempos=2,'2T','4T') AS 'Tipo motor',
        //                        if(v.registroRunt=1,
        //                        (SELECT l.idlinearunt from linearunt l where l.idlinearunt=v.idlinea),
        //                        (select l.idlinea from linea l where l.idlinea=v.idlinea)) AS 'Linea',
        //                        if(v.scooter=1,'2','1') AS 'Diseno',
        //                        v.ano_modelo AS 'Ano modelo',
        //                        v.numero_placa AS 'Placa',
        //                        v.cilindraje AS 'Cilindraje',
        //                        v.idclase AS 'Clase',
        //                        CASE
        //                            WHEN v.idservicio = 1 THEN '4'
        //                            WHEN v.idservicio = 3 THEN '1'
        //                            WHEN v.idservicio = 4 THEN '3'
        //                            ELSE v.idservicio
        //                        END AS 'Servicio',
        //                        CASE
        //                            WHEN v.idtipocombustible = 2 THEN '1'
        //                            WHEN v.idtipocombustible = 1 THEN '3'
        //                            ELSE v.idtipocombustible
        //                        END AS 'Combustible',
        //                        v.numero_motor AS 'Numero motor',
        //                        v.numero_serie AS 'Numero VIN serie',
        //                        v.numero_tarjeta_propiedad AS 'No licencia transito',
        //                        v.kilometraje AS 'Kilometraje',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo escape',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=378  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Presencia tapa combustible',
        //                     	ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Presencia tapa aceite',
        //			ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales diseno',								
        //			ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo negro azul',
        //			ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera rango',
        //                        if(v.scooter=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura motor',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'Rpm_ralenti',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'Hc ralenti',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'Co ralenti',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'Co2 ralenti',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 ralenti',
        //                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','--')) AS 'Incumplimiento emisiones',
        //                        if((p.estado=3 OR p.estado=1) AND p.estado<>5,
        //                        concat(
        //                        ifnull((select '1,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),''),
        //                        ifnull((select '2,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=378  order by 1 desc limit 1),''),
        //                        ifnull((select '3,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),''),
        //                        ifnull((select '4,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),''),
        //                        ifnull((select '5,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '7,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '8,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '13,' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '4.5' AND v.tiempos = '2' AND v.ano_modelo <='2009' ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '14,' from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' and valor >= '10000' AND v.tiempos = '2' AND v.ano_modelo <='2009'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '15,' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '4.5' AND v.tiempos = '2' AND v.ano_modelo >='2010'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '16' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti' and valor >= '2000' AND v.tiempos = '2' AND v.ano_modelo >='2010'   order by 1 desc limit 1),''),
        //                        ifnull((SELECT '17' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '4.5' AND v.tiempos = '4'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '18' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti' and valor >= '2000' AND v.tiempos = '4' order by 1 desc limit 1),'')
        //                        ),'0') AS 'Causas rechazo',
        //                        if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'Resultado de la prueba',
        //                        IFNULL((SELECT ma.nombre FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'---') 'Marca sonometro',
        //                        IFNULL((SELECT ma.serie FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'---')  'Serie sonometro',
        //                        IFNULL((SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1),'---') 'Valor de ruido reportado'
        //                        from
        //                        cda c,sede s,hojatrabajo h,pruebas p,maquina m,usuarios u,clientes cl,
        //                        vehiculos v,tipo_identificacion ti
        //                        where
        //                        c.idcda=s.idcda AND
        //                        h.idhojapruebas=p.idhojapruebas and
        //                        p.idtipo_prueba=3 and
        //                        (h.reinspeccion=0 or h.reinspeccion=1) and
        //                        (p.estado<>0 and p.estado <> 9) and
        //                        m.idmaquina=p.idmaquina and
        //                        p.idusuario=u.idusuario and
        //                        v.idvehiculo=h.idvehiculo and
        //                        v.idpropietarios=cl.idcliente and
        //                        ti.tipo_identificacion=cl.tipo_identificacion and
        //                        v.tipo_vehiculo=3 and
        //                        $where
        //                        ");
        //        return $query;
    }

    public function informe_car_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($fechainicial == "1") {
            $where = "p.idmaquina=$idconf_maquina AND p.idprueba=$fechafinal";
        } else {
            $where = "p.idmaquina=$idconf_maquina AND 
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY p.fechainicial ASC";
        }
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr_Pef',";
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr_Span_Bajo_HC',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Resultado_Vr_Span_Bajo_HC',   
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr_Span_Bajo_CO',
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Resultado_Vr_Span_Bajo_CO',
			IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr_Span_Bajo_CO2',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor_leido_Span_Bajo_CO2',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr_Span_Alto_HC_ ppm',
			IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor_leido_Span_Alto_HC',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr_Span_Alto_CO',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor_leido_Span_Alto_CO',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr_Span_Alto_CO2',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor_leido_Span_Alto_CO2',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha_y_hora_ultima_verificacion_y_ajuste',";
        } else {
            $pef = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'PEF' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr_PEF',";
            $cal = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo CO',
            
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto CO2',
            IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Fecha y hora ultima verificacion y ajuste',";
        }
        $consulta = <<<EOF
                    SELECT

                        ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500') AS 'No CDA',
                        '' AS 'Razon_social',
                        IFNULL((select c.nombre_cda FROM cda c LIMIT 1),'---') AS 'Nombre CDA',
                        IFNULL((select c.numero_id FROM cda c LIMIT 1),'---') AS 'Nit CDA',
                        IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto',
                        IFNULL((select s.direccion FROM sede s LIMIT 1),'---')  AS 'Direccion CDA',
                        IFNULL((select s.email FROM sede s LIMIT 1),'---') AS 'Correo electronico',
                        IFNULL((select s.telefono_uno FROM sede s LIMIT 1),'---') AS 'Telefono de contacto',
								IFNULL((select s.cod_ciudad FROM sede s LIMIT 1),'---') AS 'Ciudad',
                        IFNULL((select c.numero_resolucion FROM cda c LIMIT 1),'---') AS 'No. Resolución de Certificación Autoridad Ambiental',
                        IFNULL((select DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') FROM cda c LIMIT 1),'---') AS 'Fecha resolucion CDA',
                        IFNULL((select s.clase FROM sede s LIMIT 1),'---') AS 'Clase del cda',                        
                        '' AS 'Numero_expe',
                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado de RTM',
                        '' AS 'Numero_total_de_analizadores_Otto',
                        $pef
                        '' AS 'Serie_banco',
                        '' AS 'Serie_analizador',
                        '' AS 'No_serie_electronico_del_analizador',
                        '' AS 'Marca_analizador',
                        $cal
                        'TECMMAS SAS' AS 'Nombre proveedor del software de operación',
                        '---' AS 'Marca_software_operacion',
                        '---' AS 'Version_software_operacion',
                        p.idprueba  AS 'No de consecutivo prueba',
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') AS 'Fecha y hora inicio de la prueba',
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i')  AS 'Fecha y hira final de la prueba',
                        IFNULL((SELECT u.identificacion FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'---') AS 'Inspector Realiza Prueba',
                        IFNULL((SELECT concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Nombre razon social propietario',
                        IFNULL((SELECT ti.id_mintransporte FROM usuarios u, tipo_identificacion ti WHERE p.idusuario = u.IdUsuario AND u.tipo_identificacion = ti.tipo_identificacion LIMIT 1),'---') AS 'Tipo documento',
                        IFNULL((SELECT cl.numero_identificacion FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'No documento',
                        IFNULL((SELECT cl.direccion FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Direccion',
                        IFNULL((SELECT cl.telefono1 FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Telefono',
                        IFNULL((SELECT cl.cod_ciudad FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Ciudad Cliente',

                        v.numero_placa AS 'Placa',
                        if(v.registroRunt=1,
                        (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                        (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                        v.ano_modelo AS 'Ano modelo',
                        v.cilindraje AS 'Cilindraje',
                        if(v.registroRunt=1,
                        (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                        (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                        v.idclase AS 'Clase',
                        CASE
                            WHEN v.idservicio = 1 THEN '4'
                            WHEN v.idservicio = 3 THEN '1'
                            WHEN v.idservicio = 4 THEN '3'
                            ELSE v.idservicio
                        END AS 'Servicio',
                        CASE
                            WHEN v.idtipocombustible = 2 THEN '1'
                            WHEN v.idtipocombustible = 1 THEN '3'
                            ELSE v.idtipocombustible
                        END AS 'Combustible',
                        'Encendido por chispa' AS 'Tipo motor',
                        v.numero_motor AS 'No motor',
                        v.numero_serie AS 'No vin / serie',
                        v.numero_tarjeta_propiedad AS 'No licencia transito',
                        v.kilometraje AS 'Kilometraje (km)',                        
                        (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente (°C)',
                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa (%)',                        
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1), '') AS 'Método de medición de temperatura motor',
                        if(v.convertidor=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura de motor (°C)',
                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'RPM Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC (ppm) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO (%) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2(%) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 (%) Ralentí',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'RPM Crucero',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'HC (ppm) Crucero',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'CO (%)Crucero',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'CO2(%) Crucero',
			ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_crucero' order by 1 desc limit 1),'---') AS 'O2 (%)Crucero',
                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=328 or valor = '3.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas en el tubo de escape',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=378 OR valor = '2.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '3.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'Ausencia tapa combustible o fugas',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '3.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'Ausencia tapa aceite o de fugas de aceite',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=335 OR valor = '3.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones en el tubo de escape que no permitan la instalación sistema de muestreo',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=329 OR valor = '4.1.1.1.2')  order by 1 desc limit 1),'NO') AS 'Salidas adicionales al diseño',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=334 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Ausencia del filtro del aire',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=336 OR valor = '2.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'Falla sistema de refrigeración',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),'NO') AS 'Revoluciones fuera de rango',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=337 OR valor = '3.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'PCV (Sistema recirculación de gases del cárter)',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),'NO') AS 'Presencia humo negro azul',
                        IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Presencia de dilución',
                        if(p.estado = 5,
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %h:%m'),
                        '') AS 'Fecha y hora aborto de prueba',
                        ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'') AS 'Falla del equipo de medición',
                        ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'') AS 'Falla súbita fluido eléctrico',
                        ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),'') AS 'Bloqueo forzado del equipo de medición',
                        ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'') AS 'Ejecución incorrecta prueba',                        
                        
                         if(p.estado = 1 OR p.estado = 3,
                        concat(
                           ifnull((SELECT '1' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),''),
                           ifnull((SELECT '2' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=349   order by 1 desc limit 1),''),
                           ifnull((SELECT '3' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),''),
                           ifnull((SELECT '4' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),''),
                           ifnull((SELECT '5' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2')  order by 1 desc limit 1),''),
                           ifnull((SELECT '6' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=354 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),''),                              
                           ifnull((SELECT '7' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),''),
                           ifnull((SELECT '8' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),''),                           
                           ifnull((SELECT '9' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=337 OR valor = '3.1.1.1.6')  order by 1 desc limit 1),''),
                           ifnull((SELECT '10' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=335 OR valor = '3.1.1.1.7')  order by 1 desc limit 1),''),                           
                           ifnull((SELECT '11' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=336 OR valor = '2.1.1.1.6')  order by 1 desc limit 1),''),
                           IFNULL((SELECT '12' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),''),
                           ifnull((SELECT '13' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1984 AND tiporesultado='co_ralenti'  AND valor >= '4.0' order by 1 desc limit 1),''),
                           ifnull((SELECT '14' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1984 AND tiporesultado='hc_ralenti'  AND valor >= '650' order by 1 desc limit 1),''),
                           ifnull((SELECT '15' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1985 AND v.ano_modelo <= 1997) AND tiporesultado='co_ralenti'  AND valor >= '3.0' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '16' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1985 AND v.ano_modelo <= 1997) AND tiporesultado='hc_ralenti'  AND valor >= '400' order by 1 desc limit 1),''),                                                      
                           ifnull((SELECT '17' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1998 AND v.ano_modelo <= 2009) AND tiporesultado='co_ralenti'  AND valor >= '1.0' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '18' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1998 AND v.ano_modelo <= 2009) AND tiporesultado='hc_ralenti'  AND valor >= '200' order by 1 desc limit 1),''),
                           ifnull((SELECT '19' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='co_crucero'  AND valor >= '0.8' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '20' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='hc_crucero'  AND valor >= '160' order by 1 desc limit 1),''),
                           ifnull((SELECT '21' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1984 AND tiporesultado='co_crucero'  AND valor >= '4.0' order by 1 desc limit 1),''),
                           ifnull((SELECT '22' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1984 AND tiporesultado='hc_crucero'  AND valor >= '650' order by 1 desc limit 1),''),
                           ifnull((SELECT '23' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1985 AND v.ano_modelo <= 1997) AND tiporesultado='co_crucero'  AND valor >= '3.0' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '24' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1985 AND v.ano_modelo <= 1997) AND tiporesultado='hc_crucero'  AND valor >= '400' order by 1 desc limit 1),''),                                                      
                           ifnull((SELECT '25' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1998 AND v.ano_modelo <= 2009) AND tiporesultado='co_crucero'  AND valor >= '1.0' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '26' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1998 AND v.ano_modelo <= 2009) AND tiporesultado='hc_crucero'  AND valor >= '200' order by 1 desc limit 1),''),
                           ifnull((SELECT '27' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='co_crucero'  AND valor >= '0.8' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '28' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='hc_crucero'  AND valor >= '160' order by 1 desc limit 1),'')                                                                                                            
                        
                        ),'0') AS 'Causas de rechazo',
                        if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'Concepto tecnico',
                        'Resolucion 0762 de 2022' AS 'Resolución de límites máximos permisibles',
                        IFNULL((SELECT ma.idmaquina FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'') 'idsonometro',                        
                        '' AS 'marca_sonometro',
                        '' AS 'serie_sonometro', 
                        IFNULL((SELECT r.valor FROM resultados r, pruebas pp WHERE h.idhojapruebas = pp.idhojapruebas AND pp.idprueba = r.idprueba AND pp.idtipo_prueba = 4 LIMIT 1),'') AS 'Valor de ruido reportado'                        
                        from
                        hojatrabajo h,pruebas p, vehiculos v
                        where
                        v.idvehiculo=h.idvehiculo and
                        h.idhojapruebas=p.idhojapruebas and
                        p.idtipo_prueba=3 and
                        (h.reinspeccion=0 or h.reinspeccion=1) and
                        p.estado<>0 AND
                         $where
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }

        //        $query = $this->db->query("Select
        //                        ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500') AS 'No_CDA',
        //                        c.nombre_cda AS 'Nombre_CDA',
        //                        c.numero_id AS 'Nit_CDA',
        //                        s.direccion AS 'Direccion_CDA',
        //                        s.telefono_uno AS 'Telefono',
        //                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado de RTM',
        //                        s.cod_ciudad  AS 'Ciudad_cda',
        //                        c.numero_resolucion AS 'No_resolucion CDA',
        //                        DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') AS 'Fecha_resolucion_CDA',
        //                        $pef
        //                        (select parametro from config_maquina where idmaquina=p.idmaquina and tipo_parametro='serie_analizador' limit 1) AS 'No_de_serie_banco',
        //                        m.serie AS 'No_serie_analizador',
        //                        m.nombre AS 'Marca_analizador',
        //                        $cal
        //                        'TECMMAS S.A.S' AS 'Nombre_proveedor',
        //                        (select valor from config_prueba where idconfig_prueba=601) AS 'Nombre_programa',
        //                        (select valor from config_prueba where idconfig_prueba=600) AS 'Version_programa',
        //                        p.idprueba  AS 'No_de_consecutivo_prueba',
        //                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') AS 'Fecha_y_hora_inicio_de_la_prueba',
        //                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i')  AS 'Fecha_y_hora_final_de_la_prueba',
        //                        if(p.estado=5,DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i') ,'---') AS 'Fecha_y_hora_aborto_de_la_prueba',
        //                        u.identificacion AS 'Operador_realiza_prueba',
        //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1), '') AS 'Metodo_de_medicion_de_temperatura_motor',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_ambiente' order by 1 desc limit 1),'---') AS 'Temperatura_ambiente',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1),'---') AS 'Humedad_relativa',
        //                        if(p.estado = 5,
        //                        concat(
        //                        ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'')
        //                        ),'') AS 'Causal_aborto_analisis',
        //                        concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) AS 'Nombre_razon_social_propietario',
        //                        ti.id_mintransporte AS 'Tipo_documento',
        //                        cl.numero_identificacion AS 'No_documento',
        //                        cl.direccion AS 'Direccion',
        //                        cl.telefono1 AS 'Telefono_1',
        //                        ifnull(cl.telefono2,'---') AS 'Telefono_2',
        //                        cl.cod_ciudad AS 'Ciudad',
        //                        if(v.registroRunt=1,
        //                        (SELECT m.idmarcaRUNT from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
        //                        (select m.idmarca from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
        //                        if(v.registroRunt=1,
        //                        (select l.idlinearunt from linearunt l where l.idlinearunt=v.idlinea),
        //                        (select l.idlinea from linea l where l.idlinea=v.idlinea)) AS 'Linea',
        //                        v.numero_placa AS 'Placa',
        //                        v.cilindraje AS 'Cilindraje',
        //                        v.ano_modelo AS 'Ano_modelo',
        //                        v.idclase AS 'Clase',
        //                        CASE
        //                            WHEN v.idservicio = 1 THEN '4'
        //                            WHEN v.idservicio = 3 THEN '1'
        //                            WHEN v.idservicio = 4 THEN '3'
        //                            ELSE v.idservicio
        //                        END AS 'Servicio',
        //                        CASE
        //                            WHEN v.idtipocombustible = 2 THEN '1'
        //                            WHEN v.idtipocombustible = 1 THEN '3'
        //                            ELSE v.idtipocombustible
        //                        END AS 'Combustible',
        //                        v.numero_motor AS 'Numero_motor',
        //                        v.numero_serie AS 'Numero_VIN_serie',
        //                        v.numero_tarjeta_propiedad AS 'No_licencia_transito',
        //                        v.kilometraje AS 'Kilometraje',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas_tubo_escape',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=378  order by 1 desc limit 1),'NO') AS 'Fugas_silenciador',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Accesorios_o_deformaciones_en_el_tubo_de_escape_que_no_permitan_la_instalacion_sistema_de_muestreo',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Presencia_tapa_Combustible_o_fugas_en_el_mismo',
        //			ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Presencia_Tapa_Aceite',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia_o_mal_estado_filtro_de_Aire',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas_adicionales_diseno',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=337  order by 1 desc limit 1),'NO') AS 'PCV_Sistema_recirculacion_de_gases_del_carter',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia_humo_negro_azul',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM_fuera_rango',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Falla_sistema_de_refrigeracion',
        //                        if(v.scooter=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura_motor',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'Rpm_ralenti',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'Hc_ralenti',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'Co_ralenti',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'Co2_ralenti',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2_ralenti',
        //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'Rpm_crucero',
        //                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'Hc_crucero',
        //                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'Co_crucero',
        //			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'Co2_crucero',
        //			ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_crucero' order by 1 desc limit 1),'---') AS 'O2_crucero',
        //			IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Presencia_de_dilucion',
        //                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Incumplimiento_de_niveles_de_emision',
        //                        if((p.estado=3 OR p.estado=1) AND p.estado<>5,
        //                        concat(
        //                        ifnull((select '1,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),''),
        //                        ifnull((select '2,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=348  order by 1 desc limit 1),''),
        //                        ifnull((select '3,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=351  order by 1 desc limit 1),''),
        //                        ifnull((select '4,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=350  order by 1 desc limit 1),''),
        //                        ifnull((select '5,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '6,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=354  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '7,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '8,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=356  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '9,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=337  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '10,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '11,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '12,' from resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '13,' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '5' AND v.ano_modelo <='1970' ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '14,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti' and valor >= '800' AND v.ano_modelo <='1970' ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '15,' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '4' AND (v.ano_modelo >='1971' AND v.ano_modelo <='1984') ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '16,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti' and valor >= '650' AND (v.ano_modelo >='1971' AND v.ano_modelo <='1984') ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '17,' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '3' AND (v.ano_modelo >='1985' AND v.ano_modelo <='1997') ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '18,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti' and valor >= '400' AND (v.ano_modelo >='1985' AND v.ano_modelo <='1997') ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '19,' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '1' AND v.ano_modelo >='1998' ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '20,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti' and valor >= '200' AND v.ano_modelo >='1998'  ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '21,' from resultados where idprueba=p.idprueba AND tiporesultado='co_crucero' and valor >= '5' AND v.ano_modelo <='1970' ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '22,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_crucero' and valor >= '800' AND v.ano_modelo <='1970' ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '23,' from resultados where idprueba=p.idprueba AND tiporesultado='co_crucero' and valor >= '4' AND (v.ano_modelo >='1971' AND v.ano_modelo <='1984') ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '24,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_crucero' and valor >= '650' AND (v.ano_modelo >='1971' AND v.ano_modelo <='1984') ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '25,' from resultados where idprueba=p.idprueba AND tiporesultado='co_crucero' and valor >= '3' AND (v.ano_modelo >='1985' AND v.ano_modelo <='1997') ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '26,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_crucero' and valor >= '400' AND (v.ano_modelo >='1985' AND v.ano_modelo <='1997') ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '27,' from resultados where idprueba=p.idprueba AND tiporesultado='co_crucero' and valor >= '1' AND v.ano_modelo >='1998' ORDER by 1 desc limit 1),''),
        //                        ifnull((SELECT '28,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_crucero' and valor >= '200' AND v.ano_modelo >='1998'  ORDER by 1 desc limit 1),'')
        //                        ),'0') AS 'Causas_rechazo',
        //                        if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'Concepto_tecnico',
        //                        IFNULL((SELECT ma.nombre FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'---') 'Marca_sonometro',                        
        //                        IFNULL((SELECT ma.serie FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'---')  'Serie_sonometro',
        //                        IFNULL((SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1),'---') 'Valor_de_ruido_reportado'
        //                        from
        //                        cda c,sede s,hojatrabajo h,pruebas p,maquina m,usuarios u,clientes cl,
        //                        vehiculos v,tipo_identificacion ti
        //                        where
        //                        c.idcda=s.idcda AND
        //                        h.idhojapruebas=p.idhojapruebas and
        //                        p.idtipo_prueba=3 and
        //                        (h.reinspeccion=0 or h.reinspeccion=1) and
        //                        (p.estado<>0 and p.estado <> 9) and
        //                        m.idmaquina=p.idmaquina and
        //                        p.idusuario=u.idusuario and
        //                        v.idvehiculo=h.idvehiculo and
        //                        v.idpropietarios=cl.idcliente and
        //                        ti.tipo_identificacion=cl.tipo_identificacion and
        //                        (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND 
        //                        v.idtipocombustible= 2 AND 
        //                        $where");
        //        return $query;
    }

    public function informe_car_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($fechainicial == "1") {
            $where = "p.idmaquina=$idconf_maquina AND p.idprueba=$fechafinal";
        } else {
            $where = "p.idmaquina=$idconf_maquina AND 
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY p.fechainicial ASC";
        }
        if ($datoInforme == "1") {
            $opa = "IFNULL((SELECT c.valor1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr primer punto de linealidad',
                        IFNULL((SELECT c.lectura1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Resultado primer punto de linealidad',
                        IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr segundo punto de linealidad',
                        IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Resultado segundo punto de linealidad',
                        IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr tercer punto de linealidad',
                        IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Resultado tercer punto de linealidad',
                        IFNULL((SELECT c.valor4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr cuarto punto de linealidad',
                        IFNULL((SELECT c.lectura4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Resultado cuarto punto de linealidad',";
        } else {
            $opa = "(select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Vr primer punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado primer punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Vr segundo punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado segundo punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 3 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Vr tercer punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 3 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado tercer punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 4 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Vr cuarto punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 4 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado cuarto punto de linealidad',";
        }

        $consulta = <<<EOF
                    SELECT 
                        ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500') AS 'No CDA',
                        '' AS 'Razon_social',
                        IFNULL((select c.nombre_cda FROM cda c LIMIT 1),'---') AS 'Nombre CDA',
                        IFNULL((select c.numero_id FROM cda c LIMIT 1),'---') AS 'Nit CDA',
                        IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto',
                        IFNULL((select s.direccion FROM sede s LIMIT 1),'---')  AS 'Direccion CDA',
                        IFNULL((select s.email FROM sede s LIMIT 1),'---') AS 'Correo electronico',
                        IFNULL((select s.telefono_uno FROM sede s LIMIT 1),'---') AS 'Telefono de contacto',
								IFNULL((select s.cod_ciudad FROM sede s LIMIT 1),'---') AS 'Ciudad',
                        IFNULL((select c.numero_resolucion FROM cda c LIMIT 1),'---') AS 'No. Resolución de Certificación Autoridad Ambiental',
                        IFNULL((select DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') FROM cda c LIMIT 1),'---') AS 'Fecha resolucion CDA',
                        IFNULL((select s.clase FROM sede s LIMIT 1),'---') AS 'Clase del cda',                      
                        '' AS 'Numero_expe',
                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado de RTM',
                        '' AS 'Numero_total_de_equipos_opacimetros',
                        '' AS 'Marca_opacimetro',
                        '' AS 'Serie_del_medidor',
                        '' AS 'Serie_electronico_medidor',
                        'TECMMAS SAS' AS 'Nombre proveedor del software de operación',
                        '---' AS 'Marca_software_operacion',
                        '---' AS 'Version_software_operacion',
                        $opa
                        p.idprueba  AS 'No de consecutivo prueba',
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') AS 'Fecha y hora inicio de la prueba',
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i')  AS 'Fecha y hira final de la prueba',
                          IFNULL((SELECT u.identificacion FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'---') AS 'Inspector Realiza Prueba',
                        IFNULL((SELECT concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Nombre razon social propietario',
                        IFNULL((SELECT ti.id_mintransporte FROM usuarios u, tipo_identificacion ti WHERE p.idusuario = u.IdUsuario AND u.tipo_identificacion = ti.tipo_identificacion LIMIT 1),'---') AS 'Tipo documento',
                        IFNULL((SELECT cl.numero_identificacion FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'No documento',
                        IFNULL((SELECT cl.direccion FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Direccion',
                        IFNULL((SELECT cl.telefono1 FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Telefono',
                        IFNULL((SELECT cl.cod_ciudad FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'---') AS 'Ciudad Cliente',
                        v.numero_placa AS 'Placa',
                        if(v.registroRunt=1,
                        (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                        (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                        v.ano_modelo AS 'Ano modelo',
                        v.cilindraje AS 'Cilindraje',
                        if(v.registroRunt=1,
                        (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                        (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                        v.idclase AS 'Clase',
                        CASE
                            WHEN v.idservicio = 1 THEN '4'
                            WHEN v.idservicio = 3 THEN '1'
                            WHEN v.idservicio = 4 THEN '3'
                            ELSE v.idservicio
                        END AS 'Servicio',
                        CASE
                            WHEN v.idtipocombustible = 2 THEN '1'
                            WHEN v.idtipocombustible = 1 THEN '3'
                            ELSE v.idtipocombustible
                        END AS 'Combustible',
                        'Encendido por compresion' AS 'Tipo motor',
                        v.numero_motor AS 'No motor',
                        v.numero_serie AS 'No vin / serie',
                        v.numero_tarjeta_propiedad AS 'No licencia transito',
                        'NO' AS 'Modificaciones al motor',
                        v.kilometraje AS 'Kilometraje (km)',
                        v.potencia_motor AS 'Potencia del motor (valor necesario sólo para reporte de resultados en porcentaje de opacidad)',
                        (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente (°C)',
                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa (%)',   
                        '230' AS 'LTOE Estándar (mm) (Opacidad y Densidad de humo)',                     
                        
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---') AS 'Temperatura Motor (Temperatura Inicial Diésel) (°C)',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura Final (Diésel T<50)',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rpm ralenti',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'Rpm gobernada',
                        
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo Preliminar (m-1)',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo Preliminar',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo Preliminar',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 1 (m-1)',

                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 1',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 1',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 2 (m-1)',

                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 2',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 2',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 3 (m-1)',
                        
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 3',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 3',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---')
                        ) AS 'Promedio Final (m-1)',
                        
                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=358 OR valor  = '2.1.1.1.9')  order by 1 desc limit 1),'NO') AS 'Velocidad no alcanzada 5 seg',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba  and tiporesultado='T' and valor=357  order by 1 desc limit 1),'NO') AS 'Falla subita motor',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=147   order by 1 desc limit 1),'NO') AS 'Inestabilidad durante ciclos de medicion',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=341  order by 1 desc limit 1),'NO') AS 'Falla por temperatura motor',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=149 OR valor = '2.1.1.1.12')  order by 1 desc limit 1),'NO') AS 'Diferencias aritmeticas (m-1)',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas tubo escape',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=349  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'Auscencia tapa combustible o fugas',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'Ausencia tapa aceite o de fugas de aceite',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=352 OR valor = '2.1.1.1.5') order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones en tubo escape',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2')  order by 1 desc limit 1),'NO') AS 'Salidas adicionales al diseno',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=354 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Auscencia del filtro aire',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=355 OR valor = '2.1.1.1.6') order by 1 desc limit 1),'NO') AS 'Falla sistema de refrigeracion',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=356 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),'NO') AS 'Revoluciones instables o fuera rango',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=405 or valor = '2.1.1.1.10') and observacion='INDICACION DEL MAL FUNCIONAMIENTO DEL MOTOR'  order by 1 desc limit 1),'NO') AS 'Indicacion mal funcionamiento del motor',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'Funicionamiento del sistema de control de velocidad del motor',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=379 OR valor = '2.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'Instalacion dispositivos que alteren rpm',
                        
                        if(p.estado = 5,
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %h:%m'),
                        '') AS 'Fecha y hora aborto de prueba',
                        ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'') AS 'Falla del equipo de medición',
                        ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'') AS 'Falla súbita fluido eléctrico',
                        ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),'') AS 'Bloqueo forzado del equipo de medición',
                        ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'') AS 'Ejecución incorrecta prueba',                        
                        IFNULL((SELECT '5' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'') AS 'Falla de desviacion cero',
                        
                        if(p.estado = 1 OR p.estado = 3,
                        concat(
                           ifnull((SELECT '1' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),''),
                           ifnull((SELECT '2' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=349   order by 1 desc limit 1),''),
                           ifnull((SELECT '3' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),''),
                           ifnull((SELECT '4' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),''),
                           ifnull((SELECT '5' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2')  order by 1 desc limit 1),''),
                           ifnull((SELECT '6' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=354 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),''),
                           ifnull((SELECT '7' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=379 OR valor = '2.1.1.1.8')  order by 1 desc limit 1),''),
                           ifnull((SELECT '8' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=352 OR valor = '2.1.1.1.5') order by 1 desc limit 1),''),                           
                           ifnull((SELECT '9' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=355 OR valor = '2.1.1.1.6') order by 1 desc limit 1),''),
                           ifnull((SELECT '10' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=355 OR valor = '2.1.1.1.6') order by 1 desc limit 1),''),
                           ifnull((SELECT '11' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=358 OR valor  = '2.1.1.1.9')  order by 1 desc limit 1),''),
                           ifnull((SELECT '12' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=405 or valor = '2.1.1.1.10') and observacion='INDICACION DEL MAL FUNCIONAMIENTO DEL MOTOR'  order by 1 desc limit 1),''),                           
                           IFNULL((SELECT '14' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=149 OR valor = '2.1.1.1.12') order by 1 desc limit 1),''),
                           ifnull((SELECT '15' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=147   order by 1 desc limit 1),''),
                           ifnull((SELECT '16' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=341   order by 1 desc limit 1),''),
                           ifnull((SELECT '17' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo <= 2000 AND v.cilindraje < 5000 AND valor >= '6' order by 1 desc limit 1),''),
                           ifnull((SELECT '18' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo <= 2000 AND v.cilindraje >= 5000 AND valor >= '5.5' order by 1 desc limit 1),''),
                           ifnull((SELECT '19' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND (v.ano_modelo >= 2001 AND v.ano_modelo <= 2015) AND v.cilindraje < 5000 AND valor >= '5.0' order by 1 desc limit 1),''),
                           ifnull((SELECT '20' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND (v.ano_modelo >= 2001 AND v.ano_modelo <= 2015) AND v.cilindraje >= 5000 AND valor >= '4.5' order by 1 desc limit 1),''),
                           ifnull((SELECT '21' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo >= 2016  AND v.cilindraje <= 5000 AND valor >= '4.0' order by 1 desc limit 1),''),
                           ifnull((SELECT '22' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo >= 2016  AND v.cilindraje >= 5000 AND valor >= '3.5' order by 1 desc limit 1),'')
                          
                        ),'0') AS 'Causas de rechazo',
                        if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'Concepto tecnico',
                        'Resolucion 0762 de 2022' AS 'Resolución de límites máximos permisibles',
                         IFNULL((SELECT ma.idmaquina FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'') 'idsonometro',                        
                        '' AS 'marca_sonometro',
                        '' AS 'serie_sonometro',  
                        IFNULL((SELECT r.valor FROM resultados r, pruebas pp WHERE h.idhojapruebas = pp.idhojapruebas AND pp.idprueba = r.idprueba AND pp.idtipo_prueba = 4 LIMIT 1),'') AS 'Valor de ruido reportado'                        
                        FROM 
                        hojatrabajo h,pruebas p, vehiculos v
                        where
                        v.idvehiculo=h.idvehiculo and
                        h.idhojapruebas=p.idhojapruebas and
                        p.idtipo_prueba=2 and
                        (h.reinspeccion=0 or h.reinspeccion=1) and
                        p.estado<>0 AND
                       $where
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
        //        $query = $this->db->query("select 
        //                        ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500')  AS 'No CDA',
        //                        c.nombre_cda AS 'Nombre CDA',
        //                        c.numero_id AS 'Nit CDA',
        //                        s.direccion AS 'Direccion CDA',
        //                        s.telefono_uno AS 'Telefono 1 cda',
        //                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado de RTM',
        //                        s.cod_ciudad AS 'Ciudad CDA',
        //                        c.numero_resolucion AS 'No resolucion CDA',
        //                        DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') AS 'Fecha resolucion CDA',
        //                        m.serie AS 'Serie del medidor',
        //                        m.marca AS 'Marca del medidor',
        //                        (select valor from config_prueba where idconfig_prueba=601) AS 'Nombre programa',
        //                        (select valor from config_prueba where idconfig_prueba=600) AS 'Version programa',
        //                        $opa
        //                        p.idprueba AS 'No de consecutivo prueba',
        //                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha y hora inicio de la prueba',
        //                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha y hora final de la prueba',
        //                        if(p.estado=5,DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') ,'---') AS 'Fecha y hora aborto de prueba',
        //                        u.identificacion AS 'Inspector realiza prueba',
        //                        (select valor from resultados where idprueba=p.idprueba and idconfig_prueba=200 order by 1 desc limit 1) AS 'Temperatura ambiente',
        //                        (select valor from resultados where idprueba=p.idprueba and idconfig_prueba=201  order by 1 desc limit 1) AS 'Humedad relativa',
        //                        if(p.estado = 5,
        //                        concat(
        //                        ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'')
        //                        ),'') AS 'Causal aborto analisis',
        //                        concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) AS 'Nombre razon social propietario',
        //                        ti.id_mintransporte AS 'Tipo documento',
        //                        cl.numero_identificacion AS 'No documento',
        //                        cl.direccion AS 'Direccion',
        //                        cl.telefono1 AS 'Telefono',
        //                        cl.cod_ciudad AS 'Ciudad',
        //                        if(v.registroRunt=1,
        //                        (select m.idmarcaRUNT from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
        //                        (select m.idmarca from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS Marca,
        //                        if(v.registroRunt=1,
        //                        (select l.idlineaRUNT from linearunt l where l.idlinearunt=v.idlinea),
        //                        (select l.idlinea from linea l where l.idlinea=v.idlinea)) AS Linea,
        //                        v.ano_modelo AS 'Ano modelo',
        //                        v.numero_placa AS 'Placa',
        //                        v.cilindraje AS 'Cilindraje',
        //                        v.idclase AS 'Clase',
        //                        CASE
        //                            WHEN v.idservicio = 1 THEN '4'
        //                            WHEN v.idservicio = 3 THEN '1'
        //                            WHEN v.idservicio = 4 THEN '3'
        //                            ELSE v.idservicio
        //                        END AS Servicio,
        //                        CASE
        //                            WHEN v.idtipocombustible = 2 THEN '1'
        //                            WHEN v.idtipocombustible = 1 THEN '3'
        //                            ELSE v.idtipocombustible
        //                        END AS Combustible,
        //                        v.numero_motor AS 'No motor',
        //                        v.numero_serie AS 'No VIN serie',
        //                        v.numero_tarjeta_propiedad AS 'No licencia transito',
        //                        '' AS 'Modificaciones al motor',
        //                        v.kilometraje AS 'Kilemetraje',
        //                        v.potencia_motor AS 'Potencia motor',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=348  order by 1 desc limit 1),'NO') AS 'Fugas tubo escape',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=349  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=350  order by 1 desc limit 1),'NO') AS 'Auscencia tapa combustible o fugas',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=351  order by 1 desc limit 1),'NO') AS 'Auscencia tapa aceite o fugas de aceite',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=352  order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones tubo escape',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=353  order by 1 desc limit 1),'NO') AS 'Salidas adicionales al diseno',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=354  order by 1 desc limit 1),'NO') AS 'Auscencia filtro aire',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=355  order by 1 desc limit 1),'NO') AS 'Falla sistema de refrigeracion',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=356  order by 1 desc limit 1),'NO') AS 'Revoluciones instables o fuera rango',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='INDICACION DEL MAL FUNCIONAMIENTO DEL MOTOR'  order by 1 desc limit 1),'NO') AS 'Indicacion mal funcionamiento del motor',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'Funcionamiento del sistema de control velocidad de motor',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=379  order by 1 desc limit 1),'NO') AS 'Instalacion dispositivos que alteren rpm',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---') AS 'Temperatura inicial de motor',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=358  order by 1 desc limit 1),'NO') AS 'Velocidad no alcanzada 5 seg',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'---') AS 'Rpm velocidad gobernada',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba  and tiporesultado='T' and valor=357  order by 1 desc limit 1),'NO') AS 'Falla subita motor',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rpm ralenti',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---') AS 'Resultado ciclo preliminar',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'RPM gobernada ciclo preliminar',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---') AS 'Resultado opacidad primer ciclo',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'RPM gobernada primer ciclo',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---') AS 'Resultado opacidad segundo ciclo',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'RPM gobernada segundo ciclo',
        //                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---') AS 'Resultado opacidad tercer ciclo',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'RPM gobernada tercer ciclo',
        //                        abs(round(v.diametro_escape * 10,1)) AS  'LTOE',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura final del motor',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=341  order by 1 desc limit 1),'NO') AS 'Falla por temperatura motor',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=147  order by 1 desc limit 1),'NO') AS 'Inestabilidad durante ciclos de medicion',
        //                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencias aritmeticaa',
        //                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---') AS 'Resultado final',
        //                        if((p.estado=3 OR p.estado=1) AND p.estado<>5,
        //                        concat(
        //                        ifnull((select '1,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),''),
        //                        ifnull((select '2,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=348  order by 1 desc limit 1),''),
        //                        ifnull((select '3,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=351  order by 1 desc limit 1),''),
        //                        ifnull((select '4,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=350  order by 1 desc limit 1),''),
        //                        ifnull((select '5,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '6,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=354  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '7,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=379  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '8,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '9,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '10,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=358  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '11,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=358  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '12,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=405  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '14,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=149  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '15,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=357  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '16,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=357  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '17,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '50' AND v.ano_modelo <= '1970'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '18,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '45' AND  (v.ano_modelo >='1971' AND v.ano_modelo <='1984')  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '19,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '40' AND  (v.ano_modelo >='1985' AND v.ano_modelo <='1997')  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '20,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '35' AND  v.ano_modelo >='1998'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '21,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '50' AND v.ano_modelo <= '1970'  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '22,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '45' AND  (v.ano_modelo >='1971' AND v.ano_modelo <='1984')  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '23,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '40' AND  (v.ano_modelo >='1985' AND v.ano_modelo <='1997')  order by 1 desc limit 1),''),
        //                        ifnull((SELECT '24,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '35' AND  v.ano_modelo >='1998'  order by 1 desc limit 1),'')
        //                        ),'0') AS 'Causas rechazo',
        //                        if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'Concepto tecnico',
        //                        IFNULL((SELECT ma.nombre FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'---') 'Marca sonometro',
        //                        IFNULL((SELECT ma.serie FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'---')  'Serie sonometro',
        //                        IFNULL((SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1),'---') 'Valor de ruido reportado'
        //                        from
        //                        cda c,sede s,hojatrabajo h,pruebas p,maquina m,usuarios u,clientes cl,
        //                        vehiculos v,tipo_identificacion ti
        //                        where
        //                        c.idcda=s.idcda AND
        //                        h.idhojapruebas=p.idhojapruebas and
        //                        p.idtipo_prueba=2 and
        //                        (h.reinspeccion=0 or h.reinspeccion=1) and
        //                        (p.estado<>0 and p.estado <> 9) and
        //                        m.idmaquina=p.idmaquina and
        //                        p.idusuario=u.idusuario and
        //                        v.idvehiculo=h.idvehiculo and
        //                        v.idpropietarios=cl.idcliente and
        //                        ti.tipo_identificacion=cl.tipo_identificacion and
        //                	$where");
        //        return $query;
    }

    public function informe_corantioquia_motos($where, $idconf_maquina, $fechainicial, $fechafinal, $datoInforme, $motocarro)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Baja ppm',
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Baja %',
                        IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Baja %',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Baja ppm',   
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Baja %',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  CO2 Baja %',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Alta ppm',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Alta %',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Alta %',
                        IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Alta ppm',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Alta %',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO2 Alta %',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha de Verificación AAAA/MM/DD',
                        'Aprobado' AS 'Resultado de Verificación'";
        } else {
            $pef = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'PEF' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor PEF',";
            $cal = "(select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Span Bajo HC ppm',
            (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Bajo CO %',
            (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Bajo CO2 %',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Valor leido Span Bajo HC',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Bajo CO',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Bajo CO2',
            (select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Alto HC',
            (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Alto CO',
            (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Alto CO2',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Valor leido Span Alto HC',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Alto CO',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Alto CO2',  
            (select DATE_FORMAT(parametro, '%Y/%m/%d %H:%i:%s' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha verificacion',
                        'Aprobado' AS 'Resultado verificacion'";
        }
        // } else {
        //     $pef = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'PEF' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor PEF',";
        //     $cal = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_hc' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo HC ppm',
        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO %',
        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co2' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO2 %',

        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_hc' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo HC',

        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO',

        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co2' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO2',


        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_hc' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto HC',
        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO',
        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co2' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO2',
        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_hc' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto HC',
        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO',
        //     IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co2' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO2',
        //     IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
        //     DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
        //     c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Fecha verificacion',
        //                 'Aprobado' AS 'Resultado verificacion'";
        // }

        if ($motocarro == 1) {
            $motocar = 'v.idclase = 14 and ';
        } else {
            $motocar = '';
        }
        $query = $this->db->query("SELECT DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha inicio prueba AAAA/MM/DD Hora inicio prueba HH:MM:SS',
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha fin prueba AAAA/MM/DD Hora fin prueba HH:MM:SS',
                        IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Municipio de Inspección',
                        IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Lugar de la prueba',
                        IFNULL((SELECT c.idconsecutivotc FROM consecutivotc c WHERE c.idconsecutivotc = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'N° Inspección (FUR)',
                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'N° certificado emitido',
                        IFNULL((SELECT CONCAT(u.nombres,' ',u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'Nombre Completo Inspector que realiza la Prueba',
                        IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='temperatura_ambiente' OR idconfig_prueba = 200)  limit 1),'---') AS 'Temperatura ambiente (°C)',
                        IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), 'Metodo aceite',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'Metodo Bloque',if(v.scooter =1,'Scooter', if(v.convertidor =1,'Convertidor','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'Metodo bloque') AS 'Método medición T°',
                        IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201)   limit 1),'---') AS 'Humedad relativa (%)',
                        if(p.estado = 5,
                        IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.idconfig_prueba = 700),''),
                        '') AS 'Causal del aborto',
                        if(p.estado = 5,
                            DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s'),
                            '') AS 'Fecha Aborto AAAA/MM/DD Hora Aborto HH:MM:SS',
                            v.numero_placa AS 'Placa',
                        if(v.registroRunt=1,
                              (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                              (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                        v.ano_modelo AS 'Año modelo',
                        v.cilindraje AS 'Cilindraje en cm3',
                        IF(v.registroRunt=1,
                              (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                              (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                        IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
                        IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
                        IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE v.idtipocombustible = ti.idtipocombustible LIMIT 1),'') AS 'Combustible',
                        CONCAT(v.tiempos, 'T') AS 'Tipo de motor',
                        v.numero_exostos AS 'N° Tubos escape',
                        if(v.scooter = '1','Scooter','Convencional') AS 'Diseño',
                        '' AS 'No_serie_analizador',
                        '' AS 'Marca_analizador',
                        '' AS 'Pef',
                        '' AS 'Nombre_delsoftware_de_aplicacion',
                        '' AS 'Version_software_operacion',
                        $cal,       
                        if(v.scooter=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura motor °C',
                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'RPM Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC Ralentí ppm',
                        ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO Ralentí %',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2 Ralentí %',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 Ralentí %',
                        IF((v.tiempos = 4 AND (select valor from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' limit 1) >= 6),'SI',
                                if((v.tiempos = 2 AND v.ano_modelo <= 2009 AND (select valor from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' limit 1) >= 11),'SI',
                                if((v.tiempos = 2 AND v.ano_modelo >= 2010 AND (select valor from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' limit 1) >= 6),'SI','NO'))) 'Presencia Dilución',
                        if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto Final',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo escape',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=378  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapon combustible',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapón aceite',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Humo negro o azul',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera de rango'   
                        from
                       vehiculos v, hojatrabajo h,pruebas p
                        where
                       v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 3 and 
                        p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND $where and $motocar
                        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')
                        ");

        if ($query->num_rows() > 0) {
            $rta = $query->result();
            return $rta;
        } else {
            return [];
        }
        //return $query;
    }

    public function informe_corantioquia_gasolina($where, $idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Baja ppm',
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Baja %',
                        IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Baja %',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Baja ppm',   
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Baja %',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  CO2 Baja %',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Alta ppm',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Alta %',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Alta %',
                        IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Alta ppm',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Alta %',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO2 Alta %',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha de Verificación AAAA/MM/DD',
                        'Aprobado' AS 'Resultado de Verificación'";
        } else {
            $pef = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'PEF' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor PEF',";
            $cal = "(select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Span Bajo HC ppm',
            (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Bajo CO %',
            (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Bajo CO2 %',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Valor leido Span Bajo HC',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Bajo CO',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Bajo CO2',
            (select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Alto HC',
            (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Alto CO',
            (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Alto CO2',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Valor leido Span Alto HC',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Alto CO',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Alto CO2',  
            (select DATE_FORMAT(parametro, '%Y/%m/%d %H:%i:%s' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha verificacion',
            'Aprobado' AS 'Resultado verificacion'";
            // $cal = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_hc' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo HC ppm',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO %',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co2' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO2 %',

            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_hc' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo HC',

            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO',

            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co2' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO2',


            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_hc' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto HC',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co2' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO2',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_hc' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto HC',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co2' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO2',
            // IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1) LIMIT 1),'---') AS 'Fecha verificacion',
            //             'Aprobado' AS 'Resultado verificacion'";
        }
        $query = $this->db->query("SELECT
DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha inicio prueba AAAA/MM/DD Hora inicio prueba HH:MM:SS',
DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha fin prueba AAAA/MM/DD Hora fin prueba HH:MM:SS',
IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Municipio de inspeccion',
IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Lugar de la prueba',
IFNULL((SELECT c.idconsecutivotc FROM consecutivotc c WHERE c.idconsecutivotc = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'N° Inspección (FUR)',
IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'N° certificado emitido',
IFNULL((SELECT CONCAT(u.nombres,' ',u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'Nombre Completo Inspector que realiza la Prueba',
IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='temperatura_ambiente' OR idconfig_prueba = 200)  limit 1),'---') AS 'Temperatura ambiente (°C)',
IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), 'Metodo aceite',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'Metodo Bloque',if(v.scooter =1,'---', if(v.convertidor =1,'Convertidor','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'Metodo bloque') AS 'Método medición T°',
IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201)   limit 1),'---') AS 'Humedad relativa (%)',
if(p.estado = 5,
IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.idconfig_prueba = 700),''),
'') AS 'Causal del aborto',
if(p.estado = 5,
    DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s'),
    '') AS 'Fecha Aborto AAAA/MM/DD Hora Aborto HH:MM:SS',
    v.numero_placa AS 'Placa',
if(v.registroRunt=1,
      (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
      (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
v.ano_modelo AS 'Año modelo',
v.cilindraje AS 'Cilindraje en cm3',
IF(v.registroRunt=1,
      (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
      (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE v.idtipocombustible = ti.idtipocombustible LIMIT 1),'') AS 'Combustible',
'Encendido por chispa' AS 'Tipo de motor',
'' AS 'No_serie_analizador',
'' AS 'Marca_analizador',
'' AS 'Pef',
'' AS 'Nombre_delsoftware_de_aplicacion',
'' AS 'Version_software_operacion',
$cal,                   
if(v.scooter=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura motor °C',
ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'RPM Ralentí',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC Ralentí ppm',
ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO Ralentí %',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2 Ralentí %',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 Ralentí %',
IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'RPM Crucero',
IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'HC Crucero ppm',
IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'CO Crucero %',
IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'CO2 Crucero %',
IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'O2 Crucero %',
IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Presencia Dilución',
if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto final',
IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=328 or valor = '3.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas tubo escape',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=378 OR valor = '2.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=329 OR valor = '4.1.1.1.2')  order by 1 desc limit 1),'NO') AS 'Salidas adicionales',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '3.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapón combustible',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '3.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapón aceite',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),'NO') AS 'Humo negro o azul',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),'NO') AS 'RPM fuera de rango',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=336 OR valor = '2.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'Falla sistema de refrigeracion',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=337 OR valor = '3.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'Desconexion de sistema de recirculacion de gases',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=334 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Sistema admisión de aire en mal estado',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=335 OR valor = '3.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones en tubo escape'
                        from
                       vehiculos v, hojatrabajo h,pruebas p
                        where
                       v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 3 and 
                        p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND $where and v.idclase <> 14 and  
                        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')");

        if ($query->num_rows() > 0) {
            $rta = $query->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_corantioquia_disel($where, $idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $opa = "IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor referencia  filtro 1 %',
                        IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  filtro 1 %',
                        IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor referencia  filtro 2 %',
                        IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  filtro 2 %',
                        
                        IFNULL((SELECT DATE_FORMAT(c.fecha, '%Y/%m/%d') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Fecha de Verificación linealidad AAAA/MM/DD',
                        IFNULL((SELECT if(c.aprobado = 'S', 'Aprobado', 'Rechazado') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Resultado de Verificación Linealidad'";
        } else {
            $opa = "(select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia a filtro 1',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leido filtro 1',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia a filtro 2',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leido filtro 2',
                        (SELECT DATE_FORMAT(fechaguardado,'%Y/%m/%d')  from resultadosauditoria where observacion='Estado' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Fecha verificacion',                        
                        (select valor from resultadosauditoria where observacion='Estado' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado verificacion'
                        ";
        }
        $query = $this->db->query("SELECT
DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha inicio prueba AAAA/MM/DD Hora inicio prueba HH:MM:SS',
DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha fin prueba AAAA/MM/DD Hora fin prueba HH:MM:SS',
IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Municipio de inspeccion',
IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Lugar de la prueba',
IFNULL((SELECT c.idconsecutivotc FROM consecutivotc c WHERE c.idconsecutivotc = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'N° Inspección (FUR)',
IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'N° certificado emitido',
IFNULL((SELECT CONCAT(u.nombres,' ',u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'Nombre Completo Inspector que realiza la Prueba',
IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='temperatura_ambiente' OR idconfig_prueba = 200)  limit 1),'---') AS 'Temperatura ambiente (°C)',
IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), 'Metodo aceite',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'Metodo Bloque',if(v.scooter =1,'---', if(v.convertidor =1,'Convertidor','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'Metodo aceite') AS 'Metodo medicion T°',
IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201)   limit 1),'---') AS 'Humedad relativa (%)',
if(p.estado = 5,
IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.idconfig_prueba = 700),''),
'') AS 'Causal del aborto',
if(p.estado = 5,
    DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s'),
    '') AS 'Fecha Aborto AAAA/MM/DD Hora Aborto HH:MM:SS',
    v.numero_placa AS 'Placa',
if(v.registroRunt=1,
      (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
      (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
v.ano_modelo AS 'Año modelo',
v.cilindraje AS 'Cilindraje en cm3',
IF(v.registroRunt=1,
      (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
      (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE v.idtipocombustible = ti.idtipocombustible LIMIT 1),'') AS 'Combustible',
'Encendido por compresion' AS 'Tipo de motor',
'0' AS 'Potencia motor',
'NO' AS 'Modificaciones al motor (Potenciado)',
'' AS 'No_serie_analizador',
'' AS 'Marca_analizador',
'' AS 'Ltoe',
'' AS 'Nombre_delsoftware_de_aplicacion',
'' AS 'Version_software_operacion',
$opa,
                    
ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'---') AS 'RPM Gobernada Medida',
ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---') AS 'Temperatura Inicial del motor °C',
ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí',
if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
   ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
   ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
) AS 'Resultado Inicial Densidad de humo Ciclo Preliminar (m-1)',

ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'RPM Gobernada en Ciclo Preliminar',
if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
   ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---'),
   ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---')
) AS 'Resultado Densidad de humo 1er Ciclo (m-1)',

ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'RPM 1er Ciclo GOBERNADA',
if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
   ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---'),
   ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
) AS 'Resultado Densidad de humo 2do Ciclo (m-1)',

ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'RPM  2do Ciclo GOBERNADA',
if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
   ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---'),
   ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
) AS 'Resultado Densidad de humo 3er Ciclo (m-1)',

ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'RPM 3er Ciclo GOBERNADA',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencias Aritméticas (m-1)',

if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
   ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---'),
   ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---')
) AS 'Resultado Opacidad Final (promedio 3 últimos ciclos) (m-1)',


ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura Final del Motor °C',
if(p.estado = 2, 'Aprobado',if(p.estado = 5, 'Abortado', 'Rechazada')) AS 'Concepto final'
                                
                        from
                       vehiculos v, hojatrabajo h,pruebas p
                        where
                       v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND 
                        p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND $where and p.idtipo_prueba = 2 and 
                        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')
                                ");
        if ($query->num_rows() > 0) {
            $rta = $query->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_bogota_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr_PEF',";
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Bajo HC',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Bajo HC',   
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Bajo CO %',
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Bajo CO',
			IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Bajo CO2 %',
		        IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Bajo CO2',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Alto HC pp,',
			IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Alto HC',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Alto CO %',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Alto CO',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Alto CO2%',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Alto CO2',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %h:%i')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha y hora ultima verificación y ajuste',";
        } else {
            $pef = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'PEF' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo CO',
            
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto CO2',
            IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Fecha y hora ultima verificacion y ajuste',";
        }

        $consulta = <<<EOF
                    Select
                        ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500') AS 'No CDA',
                        '' AS 'Razon_social',
                        c.nombre_cda AS 'Nombre CDA',
                        c.numero_id AS 'Nit CDA',
                        IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto',
                        s.direccion AS 'Direccion CDA',
                        s.email AS 'Correo electronico',
                        s.telefono_uno AS 'Telefono de contacto',
                        s.cod_ciudad AS 'Ciudad',
                        c.numero_resolucion AS 'No. Resolución de Certificación Autoridad Ambiental',
                        DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') AS 'Fecha resolucion CDA',
                        s.clase AS 'Clase del cda',                        
                        '' AS 'Numero_expe',
                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado de RTM',
                        '' AS 'No_total_equipos_analizadores_motos_4T_2T',
                        $pef
                        '' AS 'SerieBanco',
                        '' AS 'Serie_Analizador',
                        '' AS 'Marca_Analizador',
                        $cal
                        'TECMMAS SAS' AS 'Nombre proveedor del software de operación',
                        '---' AS 'Marca_software_operacion',
                        '---' AS 'Version_software_operacion',
                        p.idprueba  AS 'No de consecutivo prueba',
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') AS 'Fecha y hora inicio de la prueba',
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i')  AS 'Fecha y hira final de la prueba',
                        u.identificacion AS 'Inspector Realiza Prueba',
                        concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) AS 'Nombre razon social propietario',
                        ti.id_mintransporte AS 'Tipo documento',
                        cl.numero_identificacion AS 'No documento',
                        cl.direccion AS 'Direccion',
                        cl.telefono1 AS 'Telefono',
                        cl.cod_ciudad AS 'Ciudad Cliente',
                        v.numero_placa AS 'Placa',
                        if(v.registroRunt=1,
                        (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                        (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                        v.ano_modelo AS 'Ano modelo',
                        v.cilindraje AS 'Cilindraje',
                        if(v.registroRunt=1,
                        (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                        (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                        if(v.scooter=1,'2','1') AS 'Diseno',
                        v.idclase AS 'Clase',
                        CASE
                            WHEN v.idservicio = 1 THEN '4'
                            WHEN v.idservicio = 3 THEN '1'
                            WHEN v.idservicio = 4 THEN '3'
                            ELSE v.idservicio
                        END AS 'Servicio',
                        CASE
                            WHEN v.idtipocombustible = 2 THEN '1'
                            WHEN v.idtipocombustible = 1 THEN '3'
                            ELSE v.idtipocombustible
                        END AS 'Combustible',
                        'Encendido por chispa' AS 'Tipo motor',
                        v.numero_exostos AS 'Número de tubos de escape',
                        v.numero_motor AS 'No motor',
                        v.numero_serie AS 'No vin / serie',
                        v.numero_tarjeta_propiedad AS 'No licencia transito',
                        v.kilometraje AS 'Kilometraje (km)',
                        (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente (°C)',
                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa (%)',                        
                        if(v.convertidor=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura de motor (°C)',
                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'RPM Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC (ppm) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO (%) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2(%) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 (%) Ralentí',
                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=328 or valor = '3.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas en el tubo de escape',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=378 OR valor = '2.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '3.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'Ausencia tapa combustible o fugas',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '3.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'Ausencia tapa aceite o de fugas de aceite',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=335 OR valor = '3.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones en el tubo de escape que no permitan la instalación sistema de muestreo',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=329 OR valor = '4.1.1.1.2')  order by 1 desc limit 1),'NO') AS 'Salidas adicionales al diseño',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),'NO') AS 'Revoluciones fuera de rango',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),'NO') AS 'Presencia humo negro azul',
                        if(p.estado = 5,
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %h:%m'),
                        '') AS 'Fecha y hora aborto de prueba',
                        ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'') AS 'Falla del equipo de medición',
                        ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'') AS 'Falla súbita fluido eléctrico',
                        ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),'') AS 'Bloqueo forzado del equipo de medición',
                        ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'') AS 'Ejecución incorrecta prueba',                        
                       if(p.estado = 1 OR p.estado = 3,
                        concat(
                           ifnull((SELECT '1' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),''),
                           ifnull((SELECT '2' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=349   order by 1 desc limit 1),''),
                           ifnull((SELECT '3' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),''),
                           ifnull((SELECT '4' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),''),
                           ifnull((SELECT '5' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2')  order by 1 desc limit 1),''),
                           ifnull((SELECT '7' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),''),
                           ifnull((SELECT '8' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),''),
                           if(v.tiempos = 2,
                              (ifnull((SELECT '13' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='co_ralenti'  AND valor >= '3.5' order by 1 desc limit 1),'') OR 
                              ifnull((SELECT '14' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='hc_ralenti'  AND valor >= '8000' order by 1 desc limit 1),'') OR 
                              ifnull((SELECT '15' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='co_ralenti'  AND valor >= '3.5' order by 1 desc limit 1),'') OR 
                              ifnull((SELECT '16' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='hc_ralenti'  AND valor >= '1600' order by 1 desc limit 1),'')),                              
                              ''
                           ),
                                               
                           if(v.tiempos = 4,
                           (
                              ifnull((SELECT '17' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti'  AND valor >= '3.5' order by 1 desc limit 1),'')OR 
                              ifnull((SELECT '18' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti'  AND valor >= '1300' order by 1 desc limit 1),'')),
                              ''
                           )                                                                                                  
                        
                        ),'0') AS 'Causas de rechazo',
                        if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'Concepto tecnico',
                        'Resolucion 0762 de 2022' AS 'Resolución de límites máximos permisibles'
                        from
                        cda c,sede s,hojatrabajo h,pruebas p,usuarios u,clientes cl,
                        vehiculos v,tipo_identificacion ti
                        where
                        c.idcda=s.idcda AND
                        h.idhojapruebas=p.idhojapruebas and
                        p.idtipo_prueba=3 and
                        (h.reinspeccion=0 or h.reinspeccion=1) and
                        p.estado<>0 and
                        p.idmaquina=$idconf_maquina AND 
                        p.idusuario=u.idusuario and
                        v.idvehiculo=h.idvehiculo and
                        v.idpropietarios=cl.idcliente and
                        ti.tipo_identificacion=cl.tipo_identificacion and
                        v.tipo_vehiculo=3 and
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY 30 ASC
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_bogota_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr_PEF',";
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Bajo HC',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Bajo HC',   
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Bajo CO %',
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Bajo CO',
			IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Bajo CO2 %',
		        IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Bajo CO2',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Alto HC pp,',
			IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Alto HC',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Alto CO %',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Alto CO',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr Span Alto CO2%',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado Vr Span Alto CO2',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %h:%i')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha y hora ultima verificación y ajuste',";
        } else {
            $pef = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'PEF' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo CO',
            
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Bajo CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Bajo CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Vr Span Alto CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Resultado Vr Span Alto CO2',
            IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Fecha y hora ultima verificacion y ajuste',";
        }
        $consulta = <<<EOF
                        Select
                        ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500') AS 'No CDA',
                        '' AS 'Razon_social',
                        c.nombre_cda AS 'Nombre CDA',
                        c.numero_id AS 'Nit CDA',
                        IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto',
                        s.direccion AS 'Direccion CDA',
                        s.email AS 'Correo electronico',
                        s.telefono_uno AS 'Telefono de contacto',
                        s.cod_ciudad AS 'Ciudad',
                        c.numero_resolucion AS 'No. Resolución de Certificación Autoridad Ambiental',
                        DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') AS 'Fecha resolucion CDA',
                        s.clase AS 'Clase del cda',                        
                        '' AS 'Numero_expe',
                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado de RTM',
                        '' AS 'Numero_total_de_analizadores_Otto',
                        $pef
                        '' AS 'SerieBanco',
                        '' AS 'Serie_Analizador',
                        '' AS 'Marca_Analizador',
                        $cal
                        'TECMMAS SAS' AS 'Nombre proveedor del software de operación',
                        '---' AS 'Marca_software_operacion',
                        '---' AS 'Version_software_operacion',
                        p.idprueba  AS 'No de consecutivo prueba',
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') AS 'Fecha y hora inicio de la prueba',
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i')  AS 'Fecha y hira final de la prueba',
                        u.identificacion AS 'Inspector Realiza Prueba',
                        concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) AS 'Nombre razon social propietario',
                        ti.id_mintransporte AS 'Tipo documento',
                        cl.numero_identificacion AS 'No documento',
                        cl.direccion AS 'Direccion',
                        cl.telefono1 AS 'Telefono',
                        cl.cod_ciudad AS 'Ciudad Cliente',
                        v.numero_placa AS 'Placa',
                        if(v.registroRunt=1,
                        (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                        (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                        v.ano_modelo AS 'Ano modelo',
                        v.cilindraje AS 'Cilindraje',
                        if(v.registroRunt=1,
                        (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                        (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                        v.idclase AS 'Clase',
                        CASE
                            WHEN v.idservicio = 1 THEN '4'
                            WHEN v.idservicio = 3 THEN '1'
                            WHEN v.idservicio = 4 THEN '3'
                            ELSE v.idservicio
                        END AS 'Servicio',
                        CASE
                            WHEN v.idtipocombustible = 2 THEN '1'
                            WHEN v.idtipocombustible = 1 THEN '3'
                            ELSE v.idtipocombustible
                        END AS 'Combustible',
                        'Encendido por chispa' AS 'Tipo motor',
                        v.numero_motor AS 'No motor',
                        v.numero_serie AS 'No vin / serie',
                        v.numero_tarjeta_propiedad AS 'No licencia transito',
                        v.kilometraje AS 'Kilometraje (km)',                        
                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_ambiente' order by 1 desc limit 1) AS 'Temperatura ambiente (°C)',
                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa (%)',                        
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1), '') AS 'Método de medición de temperatura motor',
                        if(v.convertidor=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura de motor (°C)',
                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'RPM Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC (ppm) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO (%) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2(%) Ralentí',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 (%) Ralentí',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'RPM Crucero',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'HC (ppm) Crucero',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'CO (%)Crucero',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'CO2(%) Crucero',
			ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_crucero' order by 1 desc limit 1),'---') AS 'O2 (%)Crucero',
                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=328 or valor = '3.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas en el tubo de escape',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=378 OR valor = '2.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '3.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'Ausencia tapa combustible o fugas',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '3.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'Ausencia tapa aceite o de fugas de aceite',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=335 OR valor = '3.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones en el tubo de escape que no permitan la instalación sistema de muestreo',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=329 OR valor = '4.1.1.1.2')  order by 1 desc limit 1),'NO') AS 'Salidas adicionales al diseño',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=334 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Ausencia del filtro del aire',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=336 OR valor = '2.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'Falla sistema de refrigeración',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),'NO') AS 'Revoluciones fuera de rango',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=337 OR valor = '3.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'PCV (Sistema recirculación de gases del cárter)',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),'NO') AS 'Presencia humo negro azul',
                        IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Presencia de dilución',
                        if(p.estado = 5,
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %h:%m'),
                        '') AS 'Fecha y hora aborto de prueba',
                        ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'') AS 'Falla del equipo de medición',
                        ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'') AS 'Falla súbita fluido eléctrico',
                        ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),'') AS 'Bloqueo forzado del equipo de medición',
                        ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'') AS 'Ejecución incorrecta prueba',                        
                        
                         if(p.estado = 1 OR p.estado = 3,
                        concat(
                           ifnull((SELECT '1' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),''),
                           ifnull((SELECT '2' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=349   order by 1 desc limit 1),''),
                           ifnull((SELECT '3' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),''),
                           ifnull((SELECT '4' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),''),
                           ifnull((SELECT '5' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2')  order by 1 desc limit 1),''),
                           ifnull((SELECT '6' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=354 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),''),                              
                           ifnull((SELECT '7' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),''),
                           ifnull((SELECT '8' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),''),                           
                           ifnull((SELECT '9' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=337 OR valor = '3.1.1.1.6')  order by 1 desc limit 1),''),
                           ifnull((SELECT '10' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=335 OR valor = '3.1.1.1.7')  order by 1 desc limit 1),''),                           
                           ifnull((SELECT '11' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=336 OR valor = '2.1.1.1.6')  order by 1 desc limit 1),''),
                           IFNULL((SELECT '12' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),''),
                           ifnull((SELECT '13' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1984 AND tiporesultado='co_ralenti'  AND valor >= '4.0' order by 1 desc limit 1),''),
                           ifnull((SELECT '14' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1984 AND tiporesultado='hc_ralenti'  AND valor >= '650' order by 1 desc limit 1),''),
                           ifnull((SELECT '15' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1985 AND v.ano_modelo <= 1997) AND tiporesultado='co_ralenti'  AND valor >= '3.0' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '16' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1985 AND v.ano_modelo <= 1997) AND tiporesultado='hc_ralenti'  AND valor >= '400' order by 1 desc limit 1),''),                                                      
                           ifnull((SELECT '17' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1998 AND v.ano_modelo <= 2009) AND tiporesultado='co_ralenti'  AND valor >= '1.0' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '18' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1998 AND v.ano_modelo <= 2009) AND tiporesultado='hc_ralenti'  AND valor >= '200' order by 1 desc limit 1),''),
                           ifnull((SELECT '19' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='co_crucero'  AND valor >= '0.8' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '20' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='hc_crucero'  AND valor >= '160' order by 1 desc limit 1),''),
                           ifnull((SELECT '21' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1984 AND tiporesultado='co_crucero'  AND valor >= '4.0' order by 1 desc limit 1),''),
                           ifnull((SELECT '22' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1984 AND tiporesultado='hc_crucero'  AND valor >= '650' order by 1 desc limit 1),''),
                           ifnull((SELECT '23' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1985 AND v.ano_modelo <= 1997) AND tiporesultado='co_crucero'  AND valor >= '3.0' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '24' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1985 AND v.ano_modelo <= 1997) AND tiporesultado='hc_crucero'  AND valor >= '400' order by 1 desc limit 1),''),                                                      
                           ifnull((SELECT '25' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1998 AND v.ano_modelo <= 2009) AND tiporesultado='co_crucero'  AND valor >= '1.0' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '26' from resultados where idprueba=p.idprueba AND (v.ano_modelo >= 1998 AND v.ano_modelo <= 2009) AND tiporesultado='hc_crucero'  AND valor >= '200' order by 1 desc limit 1),''),
                           ifnull((SELECT '27' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='co_crucero'  AND valor >= '0.8' order by 1 desc limit 1),''),                           
                           ifnull((SELECT '28' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='hc_crucero'  AND valor >= '160' order by 1 desc limit 1),'')                                                                                                            
                        
                        ),'0') AS 'Causas de rechazo',
                        if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'Concepto tecnico',
                        'Resolucion 0762 de 2022' AS 'Resolución de límites máximos permisibles'
                        from
                        cda c,sede s,hojatrabajo h,pruebas p,usuarios u,clientes cl,
                        vehiculos v,tipo_identificacion ti
                        where
                        c.idcda=s.idcda AND
                        h.idhojapruebas=p.idhojapruebas and
                        p.idtipo_prueba=3 and
                        (h.reinspeccion=0 or h.reinspeccion=1) and
                        p.estado<>0 and
                        p.idmaquina=$idconf_maquina AND 
                        p.idusuario=u.idusuario and
                        v.idvehiculo=h.idvehiculo and
                        v.idpropietarios=cl.idcliente and
                        ti.tipo_identificacion=cl.tipo_identificacion and
                        (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND 
                        v.idtipocombustible= 2 AND 
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY h.fechainicial ASC
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
        //        return $rta;
    }

    public function informe_bogota_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $opa = "IFNULL((SELECT c.valor1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr primer punto de linealidad',
                        IFNULL((SELECT c.lectura1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado primer punto de linealidad',
                        IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr segundo punto de linealidad',
                        IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado segundo punto de linealidad',
                        IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr tercer punto de linealidad',
                        IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado tercer punto de linealidad',
                        IFNULL((SELECT c.valor4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Vr cuarto punto de linealidad',
                        IFNULL((SELECT c.lectura4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Resultado cuarto punto de linealidad',";
        } else {
            $opa = "(select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Vr primer punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado primer punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Vr segundo punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado segundo punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 3 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Vr tercer punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 3 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado tercer punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 4 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Vr cuarto punto de linealidad',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 4 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado cuarto punto de linealidad',";
        }

        $consulta = <<<EOF
                       SELECT 
                        ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500') AS 'No CDA',
                        '' AS 'Razon_social',
                        c.nombre_cda AS 'Nombre CDA',
                        c.numero_id AS 'Nit CDA',
                        IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto',
                        s.direccion AS 'Direccion CDA',
                        s.email AS 'Correo electronico',
                        s.telefono_uno AS 'Telefono de contacto',
                        s.cod_ciudad AS 'Ciudad',
                        c.numero_resolucion AS 'No. Resolución de Certificación Autoridad Ambiental',
                        DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') AS 'Fecha resolucion CDA',
                        s.clase AS 'Clase del cda',                        
                        '' AS 'Numero_expe',
                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado de RTM',
                        '' AS 'No_total_equipos_opacimetros',
                        '' AS 'Marca_del_medidor',
                        '' AS 'Serie_del_medidor',
                        'TECMMAS SAS' AS 'Nombre proveedor del software de operación',
                        '---' AS 'Marca_software_operacion',
                        '---' AS 'Version_software_operacion',
                        $opa
                        p.idprueba  AS 'No de consecutivo prueba',
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') AS 'Fecha y hora inicio de la prueba',
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i')  AS 'Fecha y hira final de la prueba',
                        u.identificacion AS 'Inspector Realiza Prueba',
                        concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) AS 'Nombre razon social propietario',
                        ti.id_mintransporte AS 'Tipo documento',
                        cl.numero_identificacion AS 'No documento',
                        cl.direccion AS 'Direccion',
                        cl.telefono1 AS 'Telefono',
                        cl.cod_ciudad AS 'Ciudad Cliente',
                        v.numero_placa AS 'Placa',
                        if(v.registroRunt=1,
                        (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                        (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                        v.ano_modelo AS 'Ano modelo',
                        v.cilindraje AS 'Cilindraje',
                        if(v.registroRunt=1,
                        (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                        (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                        v.idclase AS 'Clase',
                        CASE
                            WHEN v.idservicio = 1 THEN '4'
                            WHEN v.idservicio = 3 THEN '1'
                            WHEN v.idservicio = 4 THEN '3'
                            ELSE v.idservicio
                        END AS 'Servicio',
                        CASE
                            WHEN v.idtipocombustible = 2 THEN '1'
                            WHEN v.idtipocombustible = 1 THEN '3'
                            ELSE v.idtipocombustible
                        END AS 'Combustible',
                        'Encendido por compresion' AS 'Tipo motor',
                        v.numero_motor AS 'No motor',
                        v.numero_serie AS 'No vin / serie',
                        v.numero_tarjeta_propiedad AS 'No licencia transito',
                        'NO' AS 'Modificaciones al motor',
                        v.kilometraje AS 'Kilometraje (km)',
                        v.potencia_motor AS 'Potencia del motor (valor necesario sólo para reporte de resultados en porcentaje de opacidad)',
                        (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente (°C)',
                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa (%)',   
                        '230' AS 'LTOE Estándar (mm) (Opacidad y Densidad de humo)',                     
                        
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---') AS 'Temperatura Motor (Temperatura Inicial Diésel) (°C)',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura Final (Diésel T<50)',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rpm ralenti',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'Rpm gobernada',
                        
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo Preliminar (m-1)',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo Preliminar',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo Preliminar',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 1 (m-1)',

                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 1',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 1',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 2 (m-1)',

                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 2',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 2',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 3 (m-1)',
                        
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 3',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 3',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---')
                        ) AS 'Promedio Final (m-1)',
                        
                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=358 OR valor  = '2.1.1.1.9')  order by 1 desc limit 1),'NO') AS 'Velocidad no alcanzada 5 seg',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=147   order by 1 desc limit 1),'NO') AS 'Inestabilidad durante ciclos de medicion',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=341  order by 1 desc limit 1),'NO') AS 'Falla por temperatura motor',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=149 OR valor = '2.1.1.1.12')  order by 1 desc limit 1),'NO') AS 'Diferencias aritmeticas (m-1)',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas tubo escape',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=349  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'Auscencia tapa combustible o fugas',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'Ausencia tapa aceite o de fugas de aceite',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=352 OR valor = '2.1.1.1.5') order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones en tubo escape',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2')  order by 1 desc limit 1),'NO') AS 'Salidas adicionales al diseno',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=354 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Auscencia del filtro aire',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=355 OR valor = '2.1.1.1.6') order by 1 desc limit 1),'NO') AS 'Falla sistema de refrigeracion',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=356 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),'NO') AS 'Revoluciones instables o fuera rango',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=405 or valor = '2.1.1.1.10') and observacion='INDICACION DEL MAL FUNCIONAMIENTO DEL MOTOR'  order by 1 desc limit 1),'NO') AS 'Indicacion mal funcionamiento del motor',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'Funicionamiento del sistema de control de velocidad del motor',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=379 OR valor = '2.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'Instalacion dispositivos que alteren rpm',
                        
                        if(p.estado = 5,
                        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %h:%m'),
                        '') AS 'Fecha y hora aborto de prueba',
                        ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'') AS 'Falla del equipo de medición',
                        ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'') AS 'Falla súbita fluido eléctrico',
                        ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),'') AS 'Bloqueo forzado del equipo de medición',
                        ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'') AS 'Ejecución incorrecta prueba',                        
                        IFNULL((SELECT '5' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'') AS 'Falla de desviacion cero',
                        
                        if(p.estado = 1 OR p.estado = 3,
                        concat(
                           ifnull((SELECT '1' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),''),
                           ifnull((SELECT '2' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=349   order by 1 desc limit 1),''),
                           ifnull((SELECT '3' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),''),
                           ifnull((SELECT '4' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),''),
                           ifnull((SELECT '5' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2')  order by 1 desc limit 1),''),
                           ifnull((SELECT '6' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=354 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),''),
                           ifnull((SELECT '7' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=379 OR valor = '2.1.1.1.8')  order by 1 desc limit 1),''),
                           ifnull((SELECT '8' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=352 OR valor = '2.1.1.1.5') order by 1 desc limit 1),''),                           
                           ifnull((SELECT '9' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=355 OR valor = '2.1.1.1.6') order by 1 desc limit 1),''),
                           ifnull((SELECT '10' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=355 OR valor = '2.1.1.1.6') order by 1 desc limit 1),''),
                           ifnull((SELECT '11' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=358 OR valor  = '2.1.1.1.9')  order by 1 desc limit 1),''),
                           ifnull((SELECT '12' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=405 or valor = '2.1.1.1.10') and observacion='INDICACION DEL MAL FUNCIONAMIENTO DEL MOTOR'  order by 1 desc limit 1),''),                           
                           IFNULL((SELECT '14' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=149 OR valor = '2.1.1.1.12') order by 1 desc limit 1),''),
                           ifnull((SELECT '15' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=147   order by 1 desc limit 1),''),
                           ifnull((SELECT '16' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=341   order by 1 desc limit 1),''),
                           ifnull((SELECT '17' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo <= 2000 AND v.cilindraje < 5000 AND valor >= '6' order by 1 desc limit 1),''),
                           ifnull((SELECT '18' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo <= 2000 AND v.cilindraje >= 5000 AND valor >= '5.5' order by 1 desc limit 1),''),
                           ifnull((SELECT '19' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND (v.ano_modelo >= 2001 AND v.ano_modelo <= 2015) AND v.cilindraje < 5000 AND valor >= '5.0' order by 1 desc limit 1),''),
                           ifnull((SELECT '20' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND (v.ano_modelo >= 2001 AND v.ano_modelo <= 2015) AND v.cilindraje >= 5000 AND valor >= '4.5' order by 1 desc limit 1),''),
                           ifnull((SELECT '21' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo >= 2016  AND v.cilindraje <= 5000 AND valor >= '4.0' order by 1 desc limit 1),''),
                           ifnull((SELECT '22' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo >= 2016  AND v.cilindraje >= 5000 AND valor >= '3.5' order by 1 desc limit 1),'')
                          
                        ),'0') AS 'Causas de rechazo',
                        if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'Concepto tecnico',
                        if(p.fechafinal < DATE_FORMAT('2024-06-12', '%Y/%m/%d %H:%i'),
                           'Resolucion 0762 de 2022',
                           'Resolucion 2703 de 2023'
                        ) AS 'Resolución de límites máximos permisibles'
                        from
                        cda c,sede s,hojatrabajo h,pruebas p,usuarios u,clientes cl,
                        vehiculos v,tipo_identificacion ti
                        where
                        c.idcda=s.idcda AND
                        h.idhojapruebas=p.idhojapruebas and
                        p.idtipo_prueba=2 and
                        (h.reinspeccion=0 or h.reinspeccion=1) and
                        p.estado<>0 and
                        p.idusuario=u.idusuario and
                        v.idvehiculo=h.idvehiculo and
                        v.idpropietarios=cl.idcliente and
                        ti.tipo_identificacion=cl.tipo_identificacion and
                	p.idmaquina = $idconf_maquina and
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY h.fechainicial ASC 
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_cormacarena_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT                  
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') 'Fecha inicio',
                        v.numero_placa AS Placa,
                        IF(v.registroRunt=1,
                        (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                        (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) Marca,
                        s.nombre AS Servicio,
                        v.cilindraje AS Cilindraje,
                        v.tiempos AS Tiempos,
                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_ambiente' order by 1 desc limit 1) AS 'Temperatura ambiente',
                        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti %',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti %',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti %',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti',
                        (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Valor ruido [dBA]',
                        IF(p.estado=2,'Sin defecto','Reprobado') Resultado
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma 
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        p.idtipo_prueba=3 AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        p.estado<>0 AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        v.idtipocombustible=2 AND 
                        v.tipo_vehiculo=3 AND
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informe_cormacarena_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT                  
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') 'Fecha inicio',
                        v.numero_placa AS Placa,
                        IF(v.registroRunt=1,
                        (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                        (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) Marca,
                        s.nombre AS Servicio,
                        v.cilindraje AS Cilindraje,
                        v.tiempos AS Tiempos,
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti %',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti %',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti %',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co crucero %',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 crucero %',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Hc crucero %',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm crucero',
                        (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Valor ruido [dBA]',
                        IF(p.estado=2,'Sin defecto','Reprobado') Resultado
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma 
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        p.idtipo_prueba=3 AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        p.estado<>0 AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND 
                        v.idtipocombustible= 2 AND 
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informe_cormacarena_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT                  
                        DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i') 'Fecha inicio',
                        v.numero_placa AS Placa,
                        IF(v.registroRunt=1,
                        (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                        (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) Marca,
                        s.nombre AS Servicio,
                        v.cilindraje AS Cilindraje,
                        v.tiempos AS Tiempos,
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rpm ralenti',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'---') AS 'Rpm gobernada',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=34 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 1 (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=35 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 2 (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=36 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 3 (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=37 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 4 (%)',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=61 ORDER BY 1 DESC LIMIT 1),'---') 'Valor (%)',
                        (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Valor ruido [dBA]',
                        IF(p.estado=2,'Sin defecto','Reprobado') Resultado
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma 
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        p.idtipo_prueba=2 AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        p.estado<>0 AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND 
                        v.idtipocombustible= 1 AND 
                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informe_cornare_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Vr Pef',";
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Span Bajo HC',
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Span Bajo CO %',
                        IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Span Bajo CO2 %',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Valor Leido HC Baja ppm',   
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Valor Leido CO Baja %',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Valor Leido CO2 Baja %',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Span Alto HC ppm',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Span Alto CO %',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Span Alto CO2%',
			IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Valor Leido HC Alta ppm',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Valor Leido CO Alta ppm',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Valor Leido CO2 Alta ppm',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha de verificacion AAAA/MM/DD',";
        } else {
            $pef = "(select parametro from config_maquina where tipo_parametro='PEF' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr PEF',";
            $cal = "IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span HC Baja ppm',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span CO Baja %',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span CO2 Baja %',
                        IFNULL((select 
if((v.tiempos = '2' 
AND (
 parametro   >  (select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 100 
OR 
parametro  < (select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 100
)),
(SELECT ROUND(parametro * 0.512) from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 10,
if((v.tiempos = '4' 
AND (
parametro   > (select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 50
OR 
parametro   < (select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 50
)),
(select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 5,
parametro))
from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido HC Baja ppm',
                        IFNULL((select 
								if((v.tiempos = '2' 
								AND (
								parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.05 
								OR 
								parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.05
								)),
								(select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.02,
								if((v.tiempos = '4' 
								AND (
								parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.05
								OR 
								parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.05
								)),
								(select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.02,
								parametro))
								 from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido Co Baja %',
                        IFNULL((select if((v.tiempos = '2' 
								AND (
								parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.4 
								OR 
								parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.4
								)),
								(select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
								if((v.tiempos = '4' 
								AND (
								parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.4
								OR 
								parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.4
								)),
								(select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
								parametro)) 
								from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido CO2 Baja %',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span HC Alta ppm',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span CO Alta %',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span CO2 Alta %',
                        IFNULL((select 
if((v.tiempos = '2' 
AND (
parametro   > (select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 100
OR 
parametro   < (select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 100
)),
(select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 10,
if((v.tiempos = '4' 
AND (
parametro  > (select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 50
OR 
parametro < (select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 50
)),
(select ROUND(parametro * 0.512)  from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 5,
parametro))
from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido HC Alta ppm',
                        IFNULL((select 
                        if((v.tiempos = '2' 
								AND (
								parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.2 
								OR 
								parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.2
								)),
								(select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
								if((v.tiempos = '4' 
								AND (
								parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.2
								OR 
								parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.2
								)),
								(select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
								parametro)) 
								 from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido CO Alta % ',
                        IFNULL((select 
								if((v.tiempos = '2' 
								AND (
								parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.8 
								OR 
								parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.8
								)),
								(select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
								if((v.tiempos = '4' 
								AND (
								parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.8
								OR 
								parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.8
								)),
								(select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
								parametro)) 
								 from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido CO2 Alta % ',
                        DATE_FORMAT((select parametro from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'%Y/%m/%d') AS 'Fecha de verificacion AAAA/MM/DD',";
            //            
        }
        $consulta = <<<EOF
                       SELECT 
                                IFNULL((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'NUMERO CERTIFICADO', 
                                 p.idprueba AS 'NUMERO CONSECUTIVO DE LA PRUEBA',
                                IF(v.registroRunt=1,
                                   (SELECT m.nombre FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                                   (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'MARCA',
                                   if(v.registroRunt=1,
                            (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                            (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                                v.ano_modelo AS 'ANO MODELO',
                                v.numero_placa AS 'PLACA',
                                v.cilindraje AS 'CILINDRAJE EN cm3',
                                if(v.tiempos = 2, '2T','4T') AS 'TIPO DE MOTOR',
                                if(v.scooter = 1, 'SCOOTER', 'CONVENCIONAL') AS 'DISENO',
                                DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'FECHA REALIZACION DE LA PRUEBA AAAA/MM/DD HH:MM',
                                IFNULL ((SELECT CONCAT(u.nombres, ' ', u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1), '---' )AS 'INSPECTOR QUE REALIZA LA PRUEBA',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado = 'temp_ambiente') order by 1 desc limit 1),'---') AS 'TEMPERATURA AMBIENTE °C',
                                (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'HUMEDAD RELATIVA %',
                                IFNULL ((SELECT cd.nombre FROM sede s, cda c, ciudades cd WHERE c.idcda = s.idcda  AND s.cod_ciudad = cd.cod_ciudad LIMIT 1),'---') AS 'CIUDAD',
                                IFNULL ((SELECT s.direccion FROM sede s, cda c WHERE c.idcda = s.idcda LIMIT 1 ),'---') AS 'DIRECCION',
                                if(v.scooter=0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'0') AS 'TEMPERATURA MOTOR °C',
                                v.cilindros AS 'N° DE CILINDROS',
                                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'RPM RALENTI',
                                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'HC RALENTI ppm',
                                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'CO RALENTI %',
                                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'CO2 RALENTI %',
                                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'O2 RALENTI %',
                                IF(EXISTS(SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='observaciones' AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'Si','No') AS 'Presencia dilusion',
                                if(p.estado=2,'Aprobado',if((p.estado=1 or p.estado=3),'Rechazado','Abortado')) AS 'Concepto final',
                                if(p.estado = 1 OR p.estado = 3 OR p.estado = 5,
                        concat(
                          ifnull((SELECT 'Fallas del equipo de medicion' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Falla subita del fluido electrico' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Bloqueo forzado del equipo' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Ejecucion incorrecta de la prueba' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Existencia de fugas en el tubo, uniones del múltiple y silenciador del sistema de escape del vehículo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=328 OR valor=378 OR valor= '4.1.1.1.1')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Salidas adicionales en el sistema de escape diferentes a las de diseño original del vehículo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=329 OR valor = '4.1.1.1.2')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Ausencia de tapones de aceite o fugas en el mismo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=330 OR valor = '4.1.1.1.3')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Presencia tapa llenado combustible' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=331 OR valor = '4.1.1.1.4')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Revoluciones fuera de rango.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=332 OR valor = '4.1.1.1.5')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Salidas adicionales a las del diseño.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=369 OR valor = '4.1.1.1.6')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Presencia de humo negro o azul (solo para motores 4T).' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=333 OR valor = '4.1.1.1.7')  order by 1 desc limit 1),''),
                           if(v.tiempos = 2,
                              CONCAT (
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='co_ralenti'  AND CAST(valor AS FLOAT) >=  CAST('4.5' AS FLOAT) order by 1 desc limit 1),
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='hc_ralenti'  AND CAST(valor AS FLOAT) >=  CAST('10000' AS FLOAT) order by 1 desc limit 1),
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='co_ralenti'  AND CAST(valor AS FLOAT) >=  CAST('3.6' AS FLOAT) order by 1 desc limit 1),
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='hc_ralenti'  AND CAST(valor AS FLOAT) >=  CAST('1600' AS FLOAT) order by 1 desc limit 1),
										'')))
										)),''
                           ),
                           
                           if(v.tiempos = 4,
                              CONCAT (
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti'  AND CAST(valor AS FLOAT) >= CAST('3.6' AS FLOAT) limit 1),
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti'  AND CAST(valor AS FLOAT) >= CAST('1600' AS FLOAT) limit 1),'')
										)),''
                           )
                        
                ),'') AS 'causalesRechazoAborto',
                                $pef
                                '' AS 'Marca_analizador',
                                '' AS 'No_serie_analizador',
                                '' AS 'No_serie_banco',
                                '' AS 'No_serie_electronico_del_analizador',
                                '' AS 'Nombre_delsoftware_de_aplicacion',
                                '' AS 'Version_software_de_aplicacion',
                                $cal
                                'Aprobado' AS 'RESULTADO DE LA VERIFICACION'
                                FROM vehiculos v, hojatrabajo h, pruebas p
                                WHERE 
                                v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas AND 
                                (h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
                                (p.estado<>0 and p.estado<>5 and p.estado<>9) AND
                                p.idtipo_prueba = 3 AND
                                p.idmaquina = $idconf_maquina AND 
                                v.tipo_vehiculo=3 AND 
                                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY p.fechainicial ASC 
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_cornare_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT cr.pef FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC limit 1),'---') AS 'Vr Pef',";
            $cal = "IFNULL((SELECT cr.span_bajo_hc FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Span Bajo HC',
                        IFNULL((SELECT cr.span_bajo_co FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Span Bajo CO %',
                        IFNULL((SELECT cr.span_bajo_co2 FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Span Bajo CO2 %',
                        IFNULL((SELECT cr.cal_bajo_hc FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Valor Leido HC Baja ppm',   
                        IFNULL((SELECT cr.cal_bajo_co FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Valor Leido CO Baja %',
			IFNULL((SELECT cr.cal_bajo_co2 FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Valor Leido CO2 Baja %',
                        IFNULL((SELECT cr.span_alto_hc FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Span Alto HC ppm',
                        IFNULL((SELECT cr.span_alto_co FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Span Alto CO %',
                        IFNULL((SELECT cr.span_alto_co2 FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Span Alto CO2%',
			IFNULL((SELECT cr.cal_alto_hc FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Valor Leido HC Alta ppm',
			IFNULL((SELECT cr.cal_alto_co FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Valor Leido CO Alta ppm',
                        IFNULL((SELECT cr.cal_alto_co2 FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Valor Leido CO2 Alta ppm',
                        IFNULL((SELECT DATE_FORMAT(cr.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion cr WHERE cr.fecha < p.fechafinal AND cr.idmaquina = p.idmaquina AND  cr.resultado = 'S' ORDER BY cr.fecha DESC  limit 1),'---') AS 'Fecha de verificacion AAAA/MM/DD',";
        } else {
            $pef = "(select parametro from config_maquina where tipo_parametro='PEF' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr PEF',";
            $cal = "IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span HC Baja ppm',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span CO Baja %',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span CO2 Baja %',
                        IFNULL((select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---')  AS 'Valor Leido HC Baja ppm',
                        IFNULL((select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido Co Baja %',
                        IFNULL((select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido CO2 Baja %',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span HC Alta ppm',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span CO Alta %',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Span CO2 Alta %',
                        IFNULL((select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido HC Alta ppm',
                        IFNULL((select parametro from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido CO Alta % ',
                        IFNULL((select parametro from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'---') AS 'Valor Leido CO2 Alta % ',
                        DATE_FORMAT((select parametro from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'%Y/%m/%d %H:%i:%s') AS 'Fecha de verificacion AAAA/MM/DD',";
        }
        $consulta = <<<EOF
                       SELECT 
                                IFNULL((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'NUMERO CERTIFICADO', 
                                 p.idprueba AS 'NUMERO CONSECUTIVO DE LA PRUEBA',
                                IF(v.registroRunt=1,
                                   (SELECT m.nombre FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                                   (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'MARCA',
                                   if(v.registroRunt=1,
                            (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                            (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                                v.ano_modelo AS 'ANO MODELO',
                                v.numero_placa AS 'PLACA',
                                v.cilindraje AS 'CILINDRAJE EN cm3',
                                IFNULL((SELECT t.nombre FROM tipo_vehiculo t WHERE v.tipo_vehiculo = t.idtipo_vehiculo LIMIT 1),'---') AS 'CLASE',
                                IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'SERVICIO',
                                ifnull((SELECT tc.nombre FROM tipo_combustible tc WHERE v.idtipocombustible = tc.idtipocombustible LIMIT 1),'') AS 'COMBUSTIBLE',
                                DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'FECHA REALIZACION DE LA PRUEBA AAAA/MM/DD HH:MM',
                                IFNULL ((SELECT CONCAT(u.nombres, ' ', u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1), '---' )AS 'INSPECTOR QUE REALIZA LA PRUEBA',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_ambiente' order by 1 desc limit 1),'---') AS 'TEMPERATURA AMBIENTE °C',
                                (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'HUMEDAD RELATIVA %',
                                IFNULL ((SELECT cd.nombre FROM sede s, cda c, ciudades cd WHERE c.idcda = s.idcda  AND s.cod_ciudad = cd.cod_ciudad LIMIT 1),'---') AS 'CIUDAD',
                                IFNULL ((SELECT s.direccion FROM sede s, cda c WHERE c.idcda = s.idcda LIMIT 1 ),'---') AS 'DIRECCION',
                                if(v.scooter=0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'0') AS 'TEMPERATURA MOTOR °C',
                                v.cilindros AS 'N° DE CILINDROS',
                                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti ppm',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti %',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti %',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'O2 ralenti %',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm crucero',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Hc crucero ppm',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co crucero %',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 crucero %',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'O2 crucero %',
                                IF(EXISTS(SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='observaciones' AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'Si','No') AS 'Presencia dilusion',
                                if(p.estado=2,'Aprobado',if((p.estado=1 or p.estado=3),'Rechazado','Abortado')) AS 'Concepto final',
                                if(p.estado = 1 OR p.estado = 3 OR p.estado = 5,
                           concat(
                              ifnull((SELECT 'Fallas del equipo de medicion' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'') ,
                              ifnull((SELECT 'Falla subita del fluido electrico' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'') ,
                              ifnull((SELECT 'Bloqueo forzado del equipo' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),'') ,
                              ifnull((SELECT 'Ejecucion incorrecta de la prueba' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'') ,                        
                              ifnull((SELECT 'Existencia de fugas en el tubo, uniones del multiple y silenciador del sistema de escape del vehiculo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=328 OR valor= '3.1.1.1.1')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Existencia de fugas en el tubo, uniones del multiple y silenciador del sistema de escape del vehiculo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=378 OR valor = '3.1.1.1.1')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Salidas adicionales en el sistema de escape diferentes a las de diseño original del vehiculo.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=329 OR valor = '3.1.1.1.2')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Ausencia de tapones de aceite o fugas en el mismo. ' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=330 OR valor = '3.1.1.1.3')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Ausencia de tapas o tapones de combustible o fugas del mismo. ' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=331 OR valor = '3.1.1.1.4')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Sistema de admisión de aire en mal estado (filtro roto o deformado) o ausencia del filtro de aire. ' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=334 OR valor = '3.1.1.1.5')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Desconexion del sistema de recirculacion de gases provenientes del Cárter del Motor. (Por ejemplo válvulade ventilación positiva del Cárter).' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=337 OR valor = '3.1.1.1.6')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Instalacion de accesorios o deformaciones en el tubo de escape que no permitan la introducción de la sonda' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=335 OR valor = '3.1.1.1.7')  order by 1 desc limit 1),''),  
                              ifnull((SELECT 'Incorrecta operación del sistema de refrigeracion, cuya verificación se hará por medio de inspección' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=336 OR valor = '3.1.1.1.8')  order by 1 desc limit 1),''),                              
                              ifnull((SELECT 'Presencia de humo negro o azul.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),''),
                              ifnull((SELECT 'Revoluciones fuera de rango.' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),''),

                                         ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1970 AND tiporesultado='co_ralenti'  AND valor >= '5.0' AND v.idclase <> 14  order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1970 AND tiporesultado='hc_ralenti'  AND valor >= '800' AND v.idclase <> 14  order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1970 AND v.ano_modelo <= 1984) AND tiporesultado='co_ralenti'  AND valor >= '4.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1970 AND v.ano_modelo <= 1984) AND tiporesultado='hc_ralenti'  AND valor >= '650' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1984 AND v.ano_modelo <= 1997) AND tiporesultado='co_ralenti'  AND valor >= '3.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1984 AND v.ano_modelo <= 1997) AND tiporesultado='co_ralenti'  AND valor >= '3.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1984 AND v.ano_modelo <= 1997) AND tiporesultado='hc_ralenti'  AND valor >= '400' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo > 1997 AND tiporesultado='co_ralenti'  AND valor >= '1.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo > 1997 AND tiporesultado='hc_ralenti'  AND valor >= '200' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='co_ralenti'  AND valor >= '0.8' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='hc_ralenti'  AND valor >= '160' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1970 AND tiporesultado='co_crucero'  AND valor >= '5.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1970 AND tiporesultado='hc_crucero'  AND valor >= '800' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1970 AND v.ano_modelo <= 1984) AND tiporesultado='co_crucero'  AND valor >= '4.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1970 AND v.ano_modelo <= 1984) AND tiporesultado='hc_crucero'  AND valor >= '650' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1984 AND v.ano_modelo <= 1997) AND tiporesultado='co_crucero'  AND valor >= '3.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1984 AND v.ano_modelo <= 1997) AND tiporesultado='hc_crucero'  AND valor >= '400' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo > 1997 AND tiporesultado='co_crucero'  AND valor >= '1.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo > 1997 AND tiporesultado='hc_crucero'  AND valor >= '200' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='co_crucero'  AND valor >= '0.8' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='hc_crucero'  AND valor >= '160' AND v.idclase <> 14 order by 1 desc limit 1),''))))))))))))))))))))
										  ),
                              if(v.idclase = 14,
                              CONCAT (
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad
competente.
NOTA: Las emisiones de gases contaminantes se verificarán según el tipo de Motor y de combustible.' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti'  AND CAST(valor AS FLOAT) >= CAST('3.5' AS FLOAT) limit 1),
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad
competente.
NOTA: Las emisiones de gases contaminantes se verificarán según el tipo de Motor y de combustible.' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti'  AND CAST(valor AS FLOAT) >= CAST('1300' AS FLOAT) limit 1),'')
										)),''
                           )
                                
                                 

                ),'') AS 'causalesRechazoAborto',
                                $pef
                                '' AS 'Marca_analizador',
                                '' AS 'No_serie_analizador',
                                '' AS 'No_serie_banco',
                                '' AS 'No_serie_electronico_del_analizador',
                                '' AS 'Nombre_delsoftware_de_aplicacion',
                                '' AS 'Version_software_de_aplicacion',
                                $cal
                                'Aprobado' AS 'RESULTADO DE LA VERIFICACION'
                                FROM vehiculos v, hojatrabajo h, pruebas p
                                WHERE 
                                v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas AND 
                                (h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
                                (p.estado<>0 and p.estado<>5 and p.estado<>9) AND
                                p.idmaquina = $idconf_maquina AND 
                                p.idtipo_prueba = 3 AND
                                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY p.fechainicial ASC 
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_cornare_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $opa = "IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'valor Ref Filtro 1',
                        IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'valor Lei Filtro 1',
                        IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'valor Ref Filtro 2',
                        IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'valor Lei Filtro 2',
                        'Aprobado' AS 'Resultado verificacion linealidad',
                        IFNULL((SELECT DATE_FORMAT(c.fecha, '%Y/%m/%d') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Fecha verificacion linealidad AAAA/MM/DD'
                        ";
        } else {
            $opa = "(select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'valor Ref Filtro 1',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'valor Lei Filtro 1',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 3 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'valor Ref Filtro 2',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 3 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'valor Lei Filtro 2',
                        'Aprobado' AS 'Resultado verificacion linealidad',
                        (select fechaguardado from resultadosauditoria where substring(observacion,1,13)='Lente 4 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Fecha verificacion linealidad AAAA/MM/DD'
                        ";
        }
        $query = $this->db->query("SELECT   
                            IFNULL((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'NUMERO CERTIFICADO', 
                            p.idprueba AS 'NUMERO CONSECUTIVO DE LA PRUEBA',
                            IF(v.registroRunt=1,
                            (SELECT m.nombre FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                            (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'Marca',
                            if(v.registroRunt=1,
                            (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                            (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                            v.ano_modelo AS 'Ano modelo',
                            v.numero_placa AS 'Placa',
                            v.cilindraje AS 'Cilindraje en cm3',
                            IFNULL((SELECT t.nombre FROM tipo_vehiculo t WHERE v.tipo_vehiculo = t.idtipo_vehiculo LIMIT 1),'---') AS 'Clase',
                            s.nombre AS 'Servicio',
                            'No' AS 'Modificaciones al motor', 
                            DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha realizacion de la  prueba AAAA/MM/DD/HH',
                            CONCAT(us.nombres,' ',us.apellidos) AS 'Inspector que realiza la prueba',
                            (select ifnull((select CAST(round(valor,2) AS CHAR(10000) CHARACTER SET utf8) from resultados where idprueba=p.idprueba and idconfig_prueba=200 order by idprueba desc limit 1),'')) AS 'Temperatura ambiente',
                            (select ifnull((select CAST(round(valor,2) AS CHAR(10000) CHARACTER SET utf8) from resultados where idprueba=p.idprueba and idconfig_prueba=201 order by idprueba desc limit 1),'')) AS 'Humedad relativa',
                            IFNULL ((SELECT ci.nombre FROM sede se, cda c, ciudades ci WHERE cd.idcda = se.idcda  AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'---') AS 'CIUDAD',
                            se.direccion AS 'Direccion',
                            IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=41 ORDER BY 1 DESC LIMIT 1),'---') AS 'Rpm gobernada medida',
                            IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=224 ORDER BY 1 DESC LIMIT 1),'---') AS 'Temperatura inicial del motor',
                            IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=38 ORDER BY 1 DESC LIMIT 1),'---') AS 'Rpm ralenti',
                            if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                              ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
                              ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
                           ) AS 'RESULTADO INICIAL DENSIDAD CICLO PRELIMINAR (m-1)',
                           
                            ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'RPM GOBERNADA en Ciclo Preliminar',
                            if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                              ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---'),
                              ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---')
                           ) AS 'RESULTADO  DENSIDAD  1er Ciclo (m-1)',
                            
                            ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'RPM 1er Ciclo GOBERNADA',
                           if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                              ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---'),
                              ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
                           ) AS 'RESULTADO  DENSIDAD 2do Ciclo (m-1)',
                            
                            ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'RPM 2do Ciclo GOBERNADA',
                            if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
                        ) AS 'RESULTADO  DENSIDAD 3er Ciclo (m-1)',
                            ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'RPM 3er Ciclo GOBERNADA',
                            
            CONCAT((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),',',(SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),',',(SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1)) AS 'Diferencia_aritmetica',
            if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
               ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---'),
               ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---')
            ) AS 'RESULTADO  DENSIDAD Final (promedio 3 últimos ciclos) (m-1)',
                            IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=39 ORDER BY 1 DESC LIMIT 1),'---') AS 'Temperatura final del motor',
                            if(p.estado=2,'Aprobado',if((p.estado=1 or p.estado=3),'Rechazado','Abortado')) AS 'Concepto final',
                            if(p.estado = 1 OR p.estado = 3 OR p.estado = 5,
                        concat(
                          ifnull((SELECT 'Fallas del equipo de medición' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Falla súbita del fluido eléctrico' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Bloqueo forzado del equipo' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Ejecución incorrecta de la prueba' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),''),                        
                           IFNULL((SELECT 'falla de desviacion cero' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Existencia de fugas en el tubo, uniones del múltiple y silenciador del sistema de escape del vehículo.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=348 OR valor=349 OR  valor= '2.1.1.1.1')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Salidas adicionales en el sistema de escape diferentes a las de diseño original del vehículo.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=353 OR valor = '2.1.1.1.2')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Ausencia de tapones de aceite o fugas en el mismo.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Ausencia de tapones de combustible o fugas en el mismo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Instalación de accesorios o deformaciones en el tubo de escape que no permitan la introducción del acople.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=352 OR valor = '2.1.1.1.5') order by 1 desc limit 1),''),
                           ifnull((SELECT 'Incorrecta operación del sistema de refrigeración, cuya verificación se hará por medio de inspección. NOTA 1 esta inspección puede consistir en verificación fugas, verificación del estado del ventilador del sistema, vibraciones o posibles contactos por deflexión de los alabes del ventilador a altas revoluciones o elementos con sujeción inadecuada, entre otros.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=355 OR valor = '2.1.1.1.6') order by 1 desc limit 1),''), 
                           ifnull((SELECT 'Ausencia o incorrecta instalación del filtro de aire.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=354 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),''),
                           ifnull((SELECT ' Activación de dispositivos instalados en el Motor o en el vehículo que alteren las características normales de velocidad de giro y que tengan como efecto la modificación de los resultados de la prueba de opacidad o que impidan su ejecución adecuada. Si no pueden ser desactivados antes de la siguiente prueba, el vehículo es rechazado por operación inadecuada.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=379 OR valor = '2.1.1.1.8')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Durante la medición no se alcanza la velocidad gobernada antes de 5 segundos' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=358 OR valor  = '2.1.1.1.9')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Indicación de mal funcionamiento del motor.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=405 or valor=505 or valor = '2.1.1.1.10') and observacion='INDICACION DEL MAL FUNCIONAMIENTO DEL MOTOR'  order by 1 desc limit 1),''),                           
                           IFNULL((SELECT 'Incumplimiento de niveles máximos permitidos por la autoridad competente. ' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=126 OR valor = '2.1.1.1.11') order by 1 desc limit 1),''),
                           IFNULL((SELECT 'La diferencia aritmética entre el valor mayor y menor de opacidad de las tres (3) aceleraciones, especificadosen el numeral 3.2.4. (NTC4231)' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=340 OR valor = '2.1.1.1.12') order by 1 desc limit 1),''),
                           
                           ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo <= 2000 AND v.cilindraje < 5000 AND valor >= '6' order by 1 desc limit 1),
							ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND (v.ano_modelo >= 2001 AND v.ano_modelo <= 2015) AND v.cilindraje < 5000 AND valor >= '5.0' order by 1 desc limit 1),
							ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo <= 2000 AND v.cilindraje >= 5000 AND valor >= '5.5' order by 1 desc limit 1),
							ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND (v.ano_modelo >= 2001 AND v.ano_modelo <= 2015) AND v.cilindraje >= 5000 AND valor >= '4.5' order by 1 desc limit 1),
							ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo >= 2016  AND v.cilindraje <= 5000 AND valor >= '4.0' order by 1 desc limit 1),
							ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo >= 2016  AND v.cilindraje >= 5000 AND valor >= '3.5' order by 1 desc limit 1),''))))))
                           
                          
                        ),'') AS 'causalesRechazoAborto',
                            '' AS 'Ltoe',
                            '' AS 'Marca_opaciemtro',
                            '' AS 'No_serie_opaciemtro',
                            '' AS 'No_serie_electronico_del_opaciemtro',
                            '' AS 'Nombre_delsoftware_de_aplicacion',
                            '' AS 'Version_software_de_aplicacion',
                             $opa
                            FROM 
                            hojatrabajo h,pruebas p,vehiculos v, clase c, servicio s, tipo_combustible t, maquina ma , 
                            cda cd, sede se, consecutivotc ct, usuarios us
                            WHERE 
                            v.idvehiculo=h.idvehiculo AND h.idhojapruebas=p.idhojapruebas AND 
                            p.idusuario=us.IdUsuario AND 
                            v.idclase=c.idclase AND v.idservicio=s.idservicio AND v.idtipocombustible=t.idtipocombustible AND 
                            p.idmaquina=ma.idmaquina AND cd.idcda=se.idcda AND h.idhojapruebas=ct.idhojapruebas AND  
                            (h.reinspeccion=0 or h.reinspeccion=1) AND
                            (p.estado<>0 and p.estado<>5 and p.estado<>9) AND
                            ma.idmaquina=$idconf_maquina AND 
                            p.idtipo_prueba=2 AND 
                            v.idtipocombustible=1 AND 
                            (v.tipo_vehiculo=2 OR v.tipo_vehiculo=1) AND
                            DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY p.fechainicial ASC");
        if ($query->num_rows() > 0) {
            $query = $query->result();
            return $query;
        } else {
            return [];
        }
    }

    public function informe_corpouraba_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Pef',";
            $cal = "    IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo HC',   
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO2',
			IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto HC',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO2',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC  limit 1),'---') AS 'Fecha de verificacion AAAA/MM/DD',";
        } else {
            $pef = "(select parametro from config_maquina where tipo_parametro='PEF' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr PEF',";
            $cal = "(select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Vr Span Bajo HC',
                            (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO',
                            (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO2',
                            (select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto HC',
                            (select parametro from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO', 
                            (select parametro from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO2',
                            (select DATE_FORMAT(parametro, '%Y/%m/%d %H:%i:%s' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha y hora ultima verificacion',";
        }
        $query = $this->db->query("SELECT
                            ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500')  AS 'No CDA',
                            c.nombre_cda AS 'Nombre CDA',
                            c.numero_id AS 'Nit CDA',
                            s.direccion AS 'Direccion CDA',
                            s.telefono_uno AS 'Telefono 1 CDA',
                            '---' AS 'Telefono 2 CDA',
                            s.cod_ciudad AS 'Ciudad CDA',
                            c.numero_resolucion AS 'No resolucion CDA',
                            DATE_FORMAT(c.fecha_resolucion, '%Y-%m-%d')  AS 'Fecha resolucion CDA',
                            $pef
                            m.serie AS 'No serie del banco',
                            m.nombre AS 'Marca analizador',
                            m.serie AS 'Serie analizador',
                            $cal
                            (select valor from config_prueba where idconfig_prueba=601) AS 'Nombre programa',
                            (select valor from config_prueba where idconfig_prueba=600) AS 'Version programa',
                            p.idprueba AS 'No prueba',
                            DATE_FORMAT(p.fechainicial, '%Y/%m/%d') AS 'Fecha y hora inicio analisis',
                            DATE_FORMAT(p.fechafinal, '%Y/%m/%d') AS 'Fecha y hora final analisis',
                            if(p.estado = 5,DATE_FORMAT(p.fechafinal, '%Y/%m/%d'), '---') AS 'Fecha y hora aborto analisis',
                            u.identificacion AS 'Operador realiza prueba',
                            (select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_ambiente' order by 1 desc limit 1) AS 'Temperatura ambiente',
                            (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa',
                            if(p.estado = 5,
                            concat(
                            ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),''),
                            ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),''),
                            ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),''),
                            ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'')
                            ),'') AS 'Causal aborto analisis',
                            concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) AS 'Propietario',
                            ti.id_mintransporte AS 'Tipo documento',
                            cl.numero_identificacion AS 'No documento',
                            cl.direccion AS 'Direccion',
                            cl.telefono1 AS 'Telefono 1',
                            ifnull(cl.telefono2,'---') AS 'Telefono 2',
                            cl.cod_ciudad AS 'Ciudad',
                            if(v.registroRunt=1,
                            (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                            (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                            v.tiempos AS 'Tipo motor',
                            if(v.registroRunt=1,
                            (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                            (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                            if(v.scooter = 1, 'Scooter', 'Convencional') AS 'Diseno',
                            v.ano_modelo AS 'Ano modelo',
                            v.numero_placa AS 'Placa',
                            v.cilindraje AS 'Cilindraje',
                            v.idclase AS 'Clase',
                            CASE
                                    WHEN v.idservicio = 1 THEN '4'
                                    WHEN v.idservicio = 3 THEN '1'
                                    WHEN v.idservicio = 4 THEN '3'
                                    ELSE v.idservicio
                            END AS 'Servicio',
                            CASE
                                    WHEN v.idtipocombustible = 2 THEN '1'
                                    WHEN v.idtipocombustible = 1 THEN '3'
                                    ELSE v.idtipocombustible
                            END AS 'Combustible',
                            v.numero_motor AS 'Numero motor',
                            v.numero_serie AS 'Numero VIN serie',
                            v.numero_tarjeta_propiedad AS 'No licencia transito',
                            v.kilometraje AS 'Kilometraje',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo escape',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=378  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones en el tubo de escape que no permitan la instalación sistema de muestreo',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Auscencia tapa combustible',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado filtro de Aire',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapa aceite',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales diseno',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=337  order by 1 desc limit 1),'NO') AS 'PCV (Sistema recirculación de gases del cárter)',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo negro azul',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera rango',
                            ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Falla sistema de refrigeración',
                            if(v.scooter=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura motor',
                            ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'Rpm_ralenti',
                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'Hc ralenti',
                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'Co ralenti',
                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'Co2 ralenti',
                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 ralenti',
                            if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Incumplimiento de niveles de emision',
                            if(p.estado=2,'Aprobado',if((p.estado=3 OR p.estado=1),'Rechazado','Abortado')) AS 'Resultado de la prueba',
                            (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Resultado de la prueba de ruido'
                            from
                            cda c,sede s,hojatrabajo h,pruebas p,maquina m,usuarios u,clientes cl,
                            vehiculos v,tipo_identificacion ti
                            where
                            c.idcda=s.idcda AND
                            h.idhojapruebas=p.idhojapruebas and
                            p.idtipo_prueba=3 and
                            p.estado<>0 and
                            m.idmaquina=p.idmaquina and
                            p.idusuario=u.idusuario and
                            v.idvehiculo=h.idvehiculo and
                            v.idpropietarios=cl.idcliente and
                            ti.tipo_identificacion=cl.tipo_identificacion and
                            v.tipo_vehiculo=3 and
                            (h.reinspeccion = 0 OR h.reinspeccion = 1) and
                            m.idmaquina=$idconf_maquina AND
                            DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        if ($query->num_rows() > 0) {
            $query = $query->result();
            return $query;
        } else {
            return [];
        }
    }

    public function informe_corpouraba_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Pef',";
            $cal = "    IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo HC',   
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO2',
			IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto HC',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO2',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC  limit 1),'---') AS 'Fecha de verificacion AAAA/MM/DD',";
        } else {
            $pef = "(select parametro from config_maquina where tipo_parametro='PEF' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr PEF',";
            $cal = "(select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Vr Span Bajo HC',
                            (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO',
                            (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO2',
                            (select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto HC',
                            (select parametro from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO', 
                            (select parametro from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO2',
                            (select DATE_FORMAT(parametro, '%Y/%m/%d %H:%i:%s' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha y hora ultima verificacion',";
        }
        $query = $this->db->query("
        SELECT
                                ifnull((select valor from config_prueba where idconfig_prueba=1500),'Asignar valor 1500')  AS 'No CDA',
                                IFNULL((SELECT c.nombre_cda FROM cda c LIMIT 1),'') AS 'Nombre CDA',
                                IFNULL((SELECT c.numero_id FROM cda c LIMIT 1),'') AS 'Nit CDA',
                                IFNULL((SELECT s.direccion FROM  sede s LIMIT 1),'') AS 'Direccion CDA',
                                IFNULL((SELECT s.telefono_uno FROM  sede s LIMIT 1),'') AS 'Telefono 1 CDA',
                                '---' AS 'Telefono 2 CDA',
                                IFNULL((SELECT s.cod_ciudad FROM  sede s LIMIT 1),'') AS 'Ciudad CDA',
                                IFNULL((SELECT c.numero_resolucion FROM cda c LIMIT 1),'') AS 'No resolucion CDA',
                                IFNULL((SELECT DATE_FORMAT(c.fecha_resolucion, '%Y-%m-%d') FROM cda c LIMIT 1),'')  AS 'Fecha resolucion CDA',
                                $pef
                                '' AS 'No_serie_analizador',
                                '' AS 'Marca_analizador',
                                '' AS 'No_serie_analizador',
                                  $cal
                                (select valor from config_prueba where idconfig_prueba=601) AS 'Nombre_programa',
                                (select valor from config_prueba where idconfig_prueba=600) AS 'Version_software_de_aplicacion',
                                p.idprueba AS 'No prueba',
                                DATE_FORMAT(p.fechainicial, '%Y/%m/%d') AS 'Fecha y hora inicio analisis',
                                DATE_FORMAT(p.fechafinal, '%Y/%m/%d') AS 'Fecha y hora final analisis',
                                if(p.estado = 5,DATE_FORMAT(p.fechafinal, '%Y/%m/%d'), '---') AS 'Fecha y hora aborto analisis',
                                IFNULL((SELECT u.identificacion FROM usuarios u WHERE u.IdUsuario = p.idusuario LIMIT 1),'') AS 'Operador realiza prueba',

                                (select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_ambiente' order by 1 desc limit 1) AS 'Temperatura ambiente',
                                (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa',
                                if(p.estado = 5,
                                concat(
                                ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),''),
                                ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),''),
                                ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),''),
                                ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'')
                                ),'') AS 'Causal aborto analisis',
                                IFNULL((SELECT concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,''))  FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'')  AS 'Propietario',

                                IFNULL((SELECT ti.id_mintransporte  FROM clientes cl, tipo_identificacion ti WHERE v.idcliente = cl.idcliente AND cl.tipo_identificacion = ti.tipo_identificacion LIMIT 1),'')  AS 'Tipo documento',
                                IFNULL((SELECT cl.numero_identificacion  FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'') AS 'No documento',
                                 IFNULL((SELECT cl.direccion  FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'') AS 'Direccion',
                                IFNULL((SELECT cl.telefono1  FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'') AS 'Telefono 1',
                                IFNULL((SELECT cl.telefono2  FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'') AS 'Telefono 2',
                                IFNULL((SELECT cl.cod_ciudad  FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'') AS 'Ciudad',
                                if(v.registroRunt=1,
                                (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                                (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                                v.tiempos AS 'Tipo motor',
                                if(v.registroRunt=1,
                                (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                                (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                                if(v.scooter = 1, 'Scooter', 'Convencional') AS 'Diseno',
                                v.ano_modelo AS 'Ano modelo',
                                v.numero_placa AS 'Placa',
                                v.cilindraje AS 'Cilindraje',
                                v.idclase AS 'Clase',
                                CASE
                                        WHEN v.idservicio = 1 THEN '4'
                                        WHEN v.idservicio = 3 THEN '1'
                                        WHEN v.idservicio = 4 THEN '3'
                                        ELSE v.idservicio
                                END AS 'Servicio',
                                CASE
                                        WHEN v.idtipocombustible = 2 THEN '1'
                                        WHEN v.idtipocombustible = 1 THEN '3'
                                        ELSE v.idtipocombustible
                                END AS 'Combustible',
                                v.numero_motor AS 'Numero motor',
                                v.numero_serie AS 'Numero VIN serie',
                                v.numero_tarjeta_propiedad AS 'No licencia transito',
                                v.kilometraje AS 'Kilometraje',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo escape',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=378  order by 1 desc limit 1),'NO') AS 'Fugas silenciador',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones en el tubo de escape que no permitan la instalación sistema de muestreo',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Auscencia tapa combustible',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado filtro de Aire',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapa aceite',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales diseno',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=337  order by 1 desc limit 1),'NO') AS 'PCV (Sistema recirculación de gases del cárter)',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo negro azul',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera rango',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Falla sistema de refrigeración',
                                if(v.scooter=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura motor',
                                ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'Rpm_ralenti',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'Hc ralenti',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'Co ralenti',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'Co2 ralenti',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 ralenti',
                                if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Incumplimiento de niveles de emision',
                                if(p.estado=2,'Aprobado',if((p.estado=3 OR p.estado=1),'Rechazado','Abortado')) AS 'Resultado de la prueba',
                                (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Resultado de la prueba de ruido'
                                from
                                hojatrabajo h, pruebas p, vehiculos v
                                where
                                v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas AND p.idmaquina = $idconf_maquina and 
                                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')
        ");
        if ($query->num_rows() > 0) {
            $query = $query->result();
            return $query;
        } else {
            return [];
        }
    }

    public function informe_corpouraba_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {



        
        $query = $this->db->query("SELECT
                                IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado',
                                if(v.registroRunt=1,
                                (select ma.nombre from linearunt l,marcarunt ma where l.idmarcarunt=ma.idmarcarunt and l.idlinearunt=v.idlinea),
                                (select ma.nombre from linea l,marca ma where l.idmarca=ma.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                                v.ano_modelo AS 'Ano modelo',
                                v.numero_placa AS 'Placa',
                                v.cilindraje AS 'Cilindraje',
                                IFNULL((SELECT cla.nombre FROM clase cla WHERE v.idclase = cla.idclase),'---') AS 'Clase',
                                IFNULL((SELECT se.nombre FROM servicio se WHERE v.idservicio = se.idservicio),'---') AS 'Servicio',
                                'No' AS 'Modificaciones al motor',
                                DATE_FORMAT(p.fechainicial, '%Y/%m/%d') AS 'Fecha realizacion prueba',
                                CONCAT(u.nombres, ' ', u.apellidos) AS 'Inspector que realiza prueba',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=200 order by 1 desc limit 1),'---') AS 'Temperatura ambiente',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=201 order by 1 desc limit 1),'---') AS 'Humedad relativa',
                                'N/A' AS 'Ciudad',
                                'N/A' AS 'Direccion',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'---') AS 'Rpm gobernada medida',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---') AS 'Temperatura inicial',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rpm ralenti',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---') AS 'Resultado opacidad ciclo preliminar',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'RPM ciclo preliminar',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---') AS 'Resultado opacidad ciclo 1',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'RPM ciclo 1',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---') AS 'Resultado opacidad ciclo 2',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'RPM ciclo 2',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---') AS 'Resultado opacidad ciclo 3',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'RPM ciclo 3',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencia aritmetica',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---') AS 'Resultado final',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=225 order by 1 desc limit 1),'---') AS 'Temperatura final',
                                v.diametro_escape AS 'Diametro escape',
                                if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto final',
                                if(m.marca LIKE '%Capelec%', '0.215', '0.364') AS 'Ltoe',                       
                                m.marca AS 'Marca analizador',
                                m.serie AS 'Serie analizador',                        
                                (select valor from config_prueba where idconfig_prueba=601) AS 'Nombre programa',
                                (select valor from config_prueba where idconfig_prueba=600) AS 'Version programa',
                                (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia a filtro 1',
                                (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leido filtro 1',
                                (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia a filtro 2',
                                (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leido filtro 2',                        
                                (select valor from resultadosauditoria where observacion='Estado' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado verificacion',
                                (SELECT DATE_FORMAT(fechaguardado,'%Y/%m/%d')  from resultadosauditoria where observacion='Estado' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Fecha verificacion'
                                from
                                cda c,sede s,hojatrabajo h,pruebas p,maquina m,usuarios u,clientes cl,
                                vehiculos v,tipo_identificacion ti
                                where
                                c.idcda=s.idcda AND
                                h.idhojapruebas=p.idhojapruebas and
                                p.idtipo_prueba=2 and
                                p.estado<>0 and
                                m.idmaquina=p.idmaquina and
                                p.idusuario=u.idusuario and
                                v.idvehiculo=h.idvehiculo and
                                v.idpropietarios=cl.idcliente and
                                ti.tipo_identificacion=cl.tipo_identificacion and
                                (h.reinspeccion = 0 OR h.reinspeccion = 1) and
                                p.idmaquina = $idconf_maquina and
                                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informe_dagma_cvc($idconf_maquina, $fechainicial, $fechafinal)
    {
        //        $query = $this->db->query("SELECT                  
        //			DATE_FORMAT(h.fechainicial, '%Y/%m/%d') AS 'Fecha',
        //			v.numero_placa AS 'Placa',
        //			IF(v.registroRunt=1,
        //			(SELECT m.nombre FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
        //			(SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'Marca',
        //			v.cilindraje AS 'Cilindraje',
        //			s.nombre AS 'Servicio',
        //			tv.nombre AS 'Tipo vehiculo',
        //			v.tiempos AS 'Tiempos',
        //			t.nombre AS 'Combustible',
        //			v.ano_modelo AS 'Modelo',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'O2 ralenti',
        //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=34 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 1 (%)',
        //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=35 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 2 (%)',
        //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=36 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 3 (%)',
        //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=37 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 4 (%)',
        //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=61 ORDER BY 1 DESC LIMIT 1),'---') 'Valor (%)',
        //                        (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Valor ruido',
        //			IF(p.estado=2,'Aprobado','No Aprobado') Resultado
        //			FROM 
        //                        hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma , certificados cr, tipo_vehiculo tv
        //                        WHERE 
        //                        h.idhojapruebas=p.idhojapruebas AND
        //                        tv.idtipo_vehiculo = v.tipo_vehiculo AND 
        //                        p.idmaquina=ma.idmaquina AND 
        //                        ma.idmaquina=$idconf_maquina AND 
        //                        h.idhojapruebas=cr.idhojapruebas AND 
        //                        (p.idtipo_prueba=3 OR p.idtipo_prueba= 2) AND
        //                        v.idclase = c.idclase AND 
        //                        (h.reinspeccion=0 or h.reinspeccion=1) AND
        //                        p.estado<>0 AND
        //                        v.idvehiculo=h.idvehiculo AND
        //                        v.idcliente=cl.idcliente AND 
        //                        v.idservicio=s.idservicio AND 
        //                        v.idtipocombustible=t.idtipocombustible AND 
        //                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        //        return $query;
        $consulta = <<<EOF
                            SELECT  DISTINCT
                                IFNULL((SELECT c.nombre_cda FROM cda c LIMIT 1),'---') AS 'Nombre o razon social',
                                IFNULL((SELECT t.abrev FROM cda c, tipo_identificacion t WHERE c.tipo_identificacion = t.tipo_identificacion LIMIT 1),'---') AS 'Tipo de documento (C.C,C.E,NIT )',            
                                IFNULL((SELECT c.numero_id FROM cda c LIMIT 1),'---') AS 'Numero de identificacion', 
                                IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto', 
                                IFNULL((SELECT s.email FROM sede s LIMIT 1),'---') AS 'Correo electronico', 
                                IFNULL((SELECT CONCAT(s.telefono_uno, ' - ', s.telefono_dos)  FROM sede s LIMIT 1),'---') AS 'Telefono de contacto', 
                                IFNULL((SELECT ci.nombre  FROM sede s, ciudades ci WHERE s.cod_ciudad = ci.cod_ciudad LIMIT 1),'---') AS 'Ciudad / Departamento', 
                                IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Representante legal', 
                                IFNULL((SELECT c.numero_resolucion  FROM cda c LIMIT 1),'---') AS 'No. de Resolucion CVC', 
                                IFNULL((SELECT DATE_FORMAT(c.fecha_resolucion, '%d/%m/%Y')  FROM cda c LIMIT 1),'---') AS 'Fecha resolucion',
                                IFNULL((SELECT s.clase  FROM sede s LIMIT 1),'---') AS 'Clase del cda',
                                ''AS 'Numero_expe',
                                ''AS 'Numero_total_de_equipos_opacimetros',
                                ''AS 'Numero_total_de_analizadores_Otto',
                                ''AS 'Numero_total_de_analizadores_mots_4T',
                                ''AS 'Numero_total_de_analizadores_mots_2T',
                                p.idprueba AS 'No. de prueba', 
                                DATE_FORMAT(p.fechainicial, '%d/%m/%Y %H:%i:%s') AS 'Fecha - hora inicio de la prueba',
                                DATE_FORMAT(p.fechafinal, '%d/%m/%Y %H:%i:%s') AS 'Fecha - hora final de la prueba',
                                IFNULL((SELECT d.nombre FROM sede s, deptos d, ciudades ci WHERE ci.cod_depto = d.cod_depto AND s.cod_ciudad = ci.cod_ciudad LIMIT 1),'---')  AS 'Municipio de inspeccion',
                                IFNULL((SELECT s.direccion FROM sede s LIMIT 1),'---') AS 'Lugar de prueba',
                                IFNULL((SELECT co.idconsecutivotc FROM consecutivotc co WHERE h.idhojapruebas = co.idhojapruebas LIMIT 1),'---') AS 'Numero inspeccion',
                                IFNULL((SELECT if(p.estado = 2,ce.numero_certificado,'') FROM certificados ce WHERE h.idhojapruebas = ce.idhojapruebas and ce.estado = 1 LIMIT 1),'---') AS 'Numero de certificado',
                                '---' AS 'Serial_equipo_utilizado',
                                '---' AS 'Pef',
                                '---' AS 'Marca_software_operacion',
                                '---' AS 'Version_software_operacion',
                                IFNULL((SELECT u.IdUsuario FROM usuarios u WHERE u.IdUsuario = p.idusuario LIMIT 1),'---') AS 'Id inspector',
                                v.numero_placa AS 'Placa',
                                IF(v.registroRunt=1,
                                   (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                                   (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'Marca',
                                v.ano_modelo AS 'Modelo',
                                v.cilindraje AS 'Cilindraje',
                                IF(v.registroRunt=1,
                                   (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                                   (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                                IFNULL((SELECT cl.nombre FROM clase cl WHERE cl.idclase = v.idclase LIMIT 1),'---') AS 'Clase',
                                IFNULL((SELECT se.nombre FROM servicio se WHERE se.idservicio = v.idservicio LIMIT 1),'---') AS 'Servicio',
                                IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE ti.idtipocombustible = v.idtipocombustible LIMIT 1),'---') AS 'Combustible',
                                CONCAT(v.tiempos, 'T') AS 'Tipo de motor',
                                v.numero_exostos AS 'Numero de tubos de escape',
                                if(v.scooter = 1, 'Scooter', 'Convencional') AS 'Diseno',
                                IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='temperatura_ambiente' OR idconfig_prueba = 200)  limit 1),'---') AS 'Temperatura ambiente (°C)',
                                IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201)   limit 1),'---') AS 'Humedad relativa (%)',
                                if(v.idtipocombustible = 1, abs(round(v.diametro_escape * 10,1)), '') AS  'LTOE estandar (mm)',
                                IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), 'Metodo aceite',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'Metodo Bloque',if(v.scooter =1,'Scooter', if(v.convertidor =1,'Convertidor','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'Metodo bloque') AS 'Método de medición de temperatura',
                                if(v.idtipocombustible = 1,
ifnull((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---'),
ifnull((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---')
)AS 'Temperatura motor (Tecmperatura inicial disel)(°C)',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura final (Disel T<50)',
                                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---'),
                                '---') AS 'Rpm crucero',
                                IFNULL((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC ralenti (ppm)',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'HC crucero (ppm)',
                                IFNULL((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO ralenti %',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'CO crucero %',
                                IFNULL((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2 ralenti %',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'CO2 crucero %',
                                IFNULL((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 ralenti %',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'O2 crucero %',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---') AS 'Ciclo_preliminar_',
                            
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'---') AS 'Rpm gobernada ciclo preliminar (%)',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rpm ralenti ciclo preliminar (%)',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---') AS 'Ciclo_1',
                                
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'Rmp gobernada ciclo 1',
                                IFNULL((SELECT valor + 10 from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rmp ralenti ciclo 1',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---') AS 'Ciclo_2',
                                
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'Rmp gobernada ciclo 2',
                                IFNULL((SELECT valor - 10 from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rmp ralenti ciclo 2',
                                 ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---') AS 'Ciclo_3',
                                
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'Rmp gobernada ciclo 3',
                                IFNULL((SELECT valor - 20 from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rmp ralenti ciclo 3',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---') AS 'Ciclo_1',
                                
                                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                                    '---',
                                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
                                ) AS 'Ciclo_preliminar_m1',
                                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                                '---',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---')
                            ) AS '_1_m1',
                                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                                '---',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
                                ) AS '_2_m1',
                                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                                    '---',
                                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
                                ) AS '_3_m1',
                                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                                    '---',
                                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---')
                                ) AS '_final_m1',

                                if(p.estado = 2, 'Aprobado',if((p.estado = 1 OR p.estado = 3),'Rechazado','Abortada')) AS 'Concepto final',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro/azul)',
                                IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Dilucion en la mezcla (SI/NO)',
                                if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera rango',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Auscencia tapones combustible o fuga (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o incorrecta inst. Filtro de Aire (SI/NO)',
                                'NO' AS 'Desconexión Recirculación (Si/No)',
                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Accesorios tubo (Si/No)',
                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Operación Incorrecta Refrigeración (Si/No)',
                                if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','--')) AS 'Emisiones',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'Incorrecta Operación Gobernador',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=357  order by 1 desc limit 1),'NO') AS 'Falla subita',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecución Incorrecta',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencia aritmetica',
                                'NO' AS 'Diferencia de Temperatura',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo(SI/NO)',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales_',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Auscencia tapones combustible o fuga',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Instalación accesorios tubo (Si/No)',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Operación Incorrecta Refrigeración (Si-No)',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o Incorrecta Instalación Filtro Aire (Si-No)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=379  order by 1 desc limit 1),'NO') AS 'Activacion dispositivos (SI/NO)',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'Rpm fuera rango',                                
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro-azul)',
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Fugas tubo (Si/No)', 
                                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales(Si/No)',   
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI-NO)',                                                                
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'NO') AS 'Fallas del equipo de medicion',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita del fluido electrico',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo' ORDER by 1 desc limit 1),'NO') AS 'Bloqueo forzado del equipo',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta de la prueba',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'NO') AS 'Falla de desviacion cero',
                                '762 de 2022' AS 'Norma aplicada'
                                FROM 
                                hojatrabajo h,pruebas p,vehiculos v, maquina ma 
                                WHERE 
                                h.idhojapruebas=p.idhojapruebas AND
                                p.idmaquina=ma.idmaquina AND 
                                ma.idmaquina=$idconf_maquina AND 
                                (h.reinspeccion=0 or h.reinspeccion=1) AND
                                (p.estado<>0 AND p.estado <> 9) AND
                                v.idvehiculo=h.idvehiculo AND
                                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_dagma($idconf_maquina, $fechainicial, $fechafinal)
    {
        $query = $this->db->query("
                        SELECT    
			IFNULL((SELECT c.nombre_cda FROM cda c LIMIT 1),'---') AS 'CDA',
			p.idprueba AS 'REGISTRO',
			DATE_FORMAT(h.fechainicial, '%d/%m/%Y') AS 'FECHA',
			IFNULL(cr.numero_certificado, '---') AS 'Nº CERTIFICADO',
			tv.nombre AS 'TIPO VEHICULO',
			s.nombre AS 'TIPO SERVICIO VEHICULO',
			v.numero_placa AS 'PLACA',
			v.ano_modelo AS 'MODELO',
			v.kilometraje AS 'KILOMETRAJE',
			t.nombre AS 'TIPO DE COMBUSTIBLE',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'CO (%)',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'CO2 (%)',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'O2 (%)',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'HC (ppm)',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'CO(%)',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'CO2(%)',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'O2(%)',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'HC(ppm)',
			IF(v.idtipocombustible= 1,
                        IF(v.ano_modelo >= 1998 && v.ano_modelo <= 3000,'35',
			IF(v.ano_modelo >= 1985 && v.ano_modelo <= 1997,'40',
			IF(v.ano_modelo >= 1971 && v.ano_modelo <= 1984,'45',
			IF(v.ano_modelo >= 0 && v.ano_modelo <= 1970,'50','---')))), '---')AS 'NORMA %',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=61 ORDER BY 1 DESC LIMIT 1),'---') 'RESULTADO % OPACIDAD',
			CASE
                        WHEN (p.estado = 1 OR p.estado=3) THEN 'REPROBADO'
                        WHEN p.estado = 2 THEN 'APROBADO'
                        ELSE 'ABORTADO'
                        END AS 'RESULTADO PRUEBA',
                        IFNULL((SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1),'---') 'RUIDO'
			FROM 
                        hojatrabajo h,pruebas p,vehiculos v, clase c, clientes cl, servicio s, tipo_combustible t, maquina ma , certificados cr, tipo_vehiculo tv
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        tv.idtipo_vehiculo = v.tipo_vehiculo AND 
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        h.idhojapruebas=cr.idhojapruebas AND 
                        (p.idtipo_prueba=3 OR p.idtipo_prueba= 2) AND
                        v.idclase = c.idclase AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        p.estado<>0 AND
                        v.idvehiculo=h.idvehiculo AND
                        v.idcliente=cl.idcliente AND 
                        v.idservicio=s.idservicio AND 
                        v.idtipocombustible=t.idtipocombustible AND 
                        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informe_epa($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        //        $query = $this->db->query("SELECT   
        //			DATE_FORMAT(h.fechainicial, '%Y/%m/%d') AS 'Fecha inicial', 
        //			DATE_FORMAT(h.fechainicial, '%h:%i:%s') AS 'Hora',
        //			v.numero_placa AS 'Placa',
        //			IF(p.estado=2,'Aprobado','Rechazado') 'Resultado',
        //			IF(v.registroRunt=1,
        //			(SELECT m.nombre FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
        //			(SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'Marca',
        //		IF(v.registroRunt=1,
        //			(SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
        //			(SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea', 
        //			v.cilindraje AS 'Cilindraje',
        //                        v.kilometraje AS 'Kilometraje', 
        //			s.nombre AS 'Servicio',
        //			c.nombre AS 'Clase',
        //			t.nombre AS 'Tipo combustible',
        //			v.ano_modelo AS 'Modelo',     
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'O2 ralenti',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co crucero',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 crucero',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Hc crucero',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'O2 crucero',
        //			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=34 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 1',
        //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=35 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 2',
        //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=36 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 3',
        //                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=37 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 4',           
        //			(SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Resultado sonometro'
        //                        FROM 
        //			hojatrabajo h,pruebas p,vehiculos v, clase c, servicio s, tipo_combustible t, maquina ma , cda cd, sede se
        //                        WHERE 
        //                        h.idhojapruebas=p.idhojapruebas AND
        //                        p.idmaquina=ma.idmaquina AND 
        //                       ma.idmaquina=$idconf_maquina AND 
        //                       cd.idcda=se.idcda AND 
        //                       (p.idtipo_prueba=3 OR p.idtipo_prueba=2) AND
        //                       v.idclase = c.idclase AND 
        //                       (h.reinspeccion=0 or h.reinspeccion=1) AND
        //                       (p.estado<>0 AND p.estado<>5) AND
        //                       v.idvehiculo=h.idvehiculo AND
        //                       v.idservicio=s.idservicio AND 
        //                       v.idtipocombustible=t.idtipocombustible AND 
        //                       DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        $query = $this->db->query("SELECT   
			DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha de medicion del vehiculo', 
			v.numero_placa AS 'Placa',
			IF(p.estado=2,'Aprobado','Rechazado') 'Resultado',
                        IFNULL((SELECT t.nombre FROM tipo_vehiculo t WHERE v.tipo_vehiculo = t.idtipo_vehiculo LIMIT 1),'---') AS 'Tipo vehiculo',
                        IFNULL((SELECT s.nombre FROM servicio s WHERE s.idservicio = v.idservicio LIMIT 1),'---') AS 'Servicio',
                        IFNULL((SELECT c.nombre FROM clase c  WHERE c.idclase = v.idclase LIMIT 1),'---') AS 'Clase',
                        IFNULL((SELECT tc.nombre FROM tipo_combustible tc  WHERE tc.idtipocombustible = v.idtipocombustible LIMIT 1),'---') AS 'Combustible',
                        v.ano_modelo AS 'Modelo',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'O2 ralenti',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co crucero',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 crucero',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Hc crucero',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'O2 crucero',
			if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 1',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 2',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 3',
                        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---'),
                           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
                        ) AS 'Ciclo 4',
			(SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Resultado sonometro'
                        FROM 
			hojatrabajo h,pruebas p,vehiculos v, maquina ma 
                        WHERE 
                        h.idhojapruebas=p.idhojapruebas AND
                        p.idmaquina=ma.idmaquina AND 
                        ma.idmaquina=$idconf_maquina AND 
                        (p.idtipo_prueba=3 OR p.idtipo_prueba=2) AND 
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        (p.estado<>0 AND p.estado<>5 AND p.estado <>9) AND
                        v.idvehiculo=h.idvehiculo AND
                        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    public function informe_superintendencia($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $query = $this->db->query("SELECT   
			IF(ct.idconsecutivotc AND h.reinspeccion=1, CONCAT(ct.idconsecutivotc,'-1'),CONCAT(ct.idconsecutivotc,'-0')) AS 'Numero formato',
			DATE_FORMAT(h.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha inicial', 
			IF(cr.numero_certificado,'Aprobado','Rechazado') AS 'Resultado',
			cr.numero_certificado AS 'Numero de control',
			cr.consecutivo_runt AS 'Numero consecutivo runt',
			v.numero_placa AS 'Placa',
			s.nombre AS 'Servicio',
			c.nombre AS 'Clase',
		IF(v.registroRunt=1,
			(SELECT m.nombre FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
			(SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'Marca',
		IF(v.registroRunt=1,
			(SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
			(SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea', 
			v.ano_modelo AS 'Modelo', 
			v.fecha_matricula AS 'Fecha matricula',
			t.nombre AS 'Tipo combustible',
			IF(v.idtipocombustible = 1,'Diesel',IF(v.idtipocombustible <> 1 && v.tipo_vehiculo<> 3,'Otto',IF(v.tiempos = 4 && v.tipo_vehiculo=3,'4T','2T'))) AS 'Tipo motor',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1),'---') 'Ruido escape',
			
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=1 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=14 ORDER BY 1 DESC LIMIT 1),'---') 'Intencidad baja derecha',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=1 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=15 ORDER BY 1 DESC LIMIT 1),'---') 'Intencidad alta derecha',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=1 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=16 ORDER BY 1 DESC LIMIT 1),'---') 'Intencidad baja izquierda',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=1 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=17 ORDER BY 1 DESC LIMIT 1),'---') 'Intencidad alta izquierda',			
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=1 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=19 ORDER BY 1 DESC LIMIT 1),'---') 'Inclinacion izquierda',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=1 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=20 ORDER BY 1 DESC LIMIT 1),'---') 'Inclinacion derecha', 
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=1 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=18 ORDER BY 1 DESC LIMIT 1),'---') 'Intencidad total',
			
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=9 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=142 ORDER BY 1 DESC LIMIT 1),'---') 'Delantera derecha',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=9 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=143 ORDER BY 1 DESC LIMIT 1),'---') 'Delantera izquierda',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=9 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=144 ORDER BY 1 DESC LIMIT 1),'---') 'Trasera derecha',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=9 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  idconfig_prueba=145 ORDER BY 1 DESC LIMIT 1),'---') 'Trasera izquierda',
						
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Frenos eje 1 derecho' ORDER BY 1 DESC LIMIT 1),'---') 'Fuerza eje 1 derecho',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Frenos eje 1 Izquierdo' ORDER BY 1 DESC LIMIT 1),'---') 'Fuerza eje 1 izquierdo', 
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Frenos eje 2 derecho' ORDER BY 1 DESC LIMIT 1),'---') 'Fuerza eje 2 derecho',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Frenos eje 2 Izquierdo' ORDER BY 1 DESC LIMIT 1),'---') 'Fuerza eje 2 izquierdo',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Frenos eje 3 derecho' ORDER BY 1 DESC LIMIT 1),'---') 'Fuerza eje 3 derecho',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Frenos eje 3 Izquierdo' ORDER BY 1 DESC LIMIT 1),'---') 'Fuerza eje 3 izquierdo',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Frenos eje 4 derecho' ORDER BY 1 DESC LIMIT 1),'---') 'Fuerza eje 4 derecho',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Frenos eje 4 Izquierdo' ORDER BY 1 DESC LIMIT 1),'---') 'Fuerza eje 4 izquierdo',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Frenos eje 5 derecho' ORDER BY 1 DESC LIMIT 1),'---') 'Fuerza eje 5 derecho',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Frenos eje 5 Izquierdo' ORDER BY 1 DESC LIMIT 1),'---') 'Fuerza eje 5 izquierdo',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Pesaje eje 1 derecho' ORDER BY 1 DESC LIMIT 1),'---') 'Pesaje eje 1 derecho',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Pesaje eje 1 Izquierdo' ORDER BY 1 DESC LIMIT 1),'---') 'Pesaje eje 1 izquierdo',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Pesaje eje 2 derecho' ORDER BY 1 DESC LIMIT 1),'---') 'Pesaje eje 2 derecho',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Pesaje eje 2 Izquierdo' ORDER BY 1 DESC LIMIT 1),'---') 'Pesaje eje 2 izquierdo',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Pesaje eje 3 derecho' ORDER BY 1 DESC LIMIT 1),'---') 'Pesaje eje 3 derecho',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Pesaje eje 3 Izquierdo' ORDER BY 1 DESC LIMIT 1),'---') 'Pesaje eje 3 izquierdo',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Pesaje eje 4 derecho' ORDER BY 1 DESC LIMIT 1),'---') 'Pesaje eje 4 derecho',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Pesaje eje 4 Izquierdo' ORDER BY 1 DESC LIMIT 1),'---') 'Pesaje eje 4 izquierdo',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Pesaje eje 5 derecho' ORDER BY 1 DESC LIMIT 1),'---') 'Pesaje eje 5 derecho',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Pesaje eje 5 Izquierdo' ORDER BY 1 DESC LIMIT 1),'---') 'Pesaje eje 5 izquierdo',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Desequilibrio eje 1' ORDER BY 1 DESC LIMIT 1),'---') 'Desequilibrio eje 1',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Desequilibrio eje 2' ORDER BY 1 DESC LIMIT 1),'---') 'Desequilibrio eje 2',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Desequilibrio eje 3' ORDER BY 1 DESC LIMIT 1),'---') 'Desequilibrio eje 3',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Desequilibrio eje 4' ORDER BY 1 DESC LIMIT 1),'---') 'Desequilibrio eje 4',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Desequilibrio eje 5' ORDER BY 1 DESC LIMIT 1),'---') 'Desequilibrio eje 5',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='eficacia_auxiliar' ORDER BY 1 DESC LIMIT 1),'---') 'Eficacia auxiliar',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=7 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='eficacia_maxima' ORDER BY 1 DESC LIMIT 1),'---') 'Eficacia maxima',
			
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=10 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Alineación eje 1' ORDER BY 1 DESC LIMIT 1),'---') 'Alineacion eje 1',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=10 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Alineación eje 2' ORDER BY 1 DESC LIMIT 1),'---') 'Alineacion eje 2',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=10 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Alineación eje 3' ORDER BY 1 DESC LIMIT 1),'---') 'Alineacion eje 3',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=10 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Alineación eje 4' ORDER BY 1 DESC LIMIT 1),'---') 'Alineacion eje 4',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=10 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  observacion='Alineación eje 5' ORDER BY 1 DESC LIMIT 1),'---') 'Alineacion eje 5',
			
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=6 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  tiporesultado='Rllanta' ORDER BY 1 DESC LIMIT 1),'---') 'Referencia Comercial de la llanta',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=6 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  tiporesultado='error_tiempo_nuevo' ORDER BY 1 DESC LIMIT 1),'---') 'Error en distancia',
			IFNULL((SELECT valor FROM pruebas pr, resultados re  WHERE pr.idtipo_prueba=6 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND  tiporesultado='error_distancia_nuevo' ORDER BY 1 DESC LIMIT 1),'---') 'Error en tiempo',
			
			CASE
				WHEN v.scooter=0 THEN  IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---')
				WHEN (v.scooter=1 AND v.tipo_vehiculo = 3) THEN 0
				ELSE ' '
			END 'Temperatura',
			
			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'O2 ralenti',
			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm crucero',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co crucero',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 crucero',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Hc crucero',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'O2 crucero',
			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=38 ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti disel',
			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=41 ORDER BY 1 DESC LIMIT 1),'---') 'Rpm gobernada',
			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=39 ORDER BY 1 DESC LIMIT 1),'---') 'Temperatura disel',
			IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=34 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 1',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=35 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 2',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=36 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 3',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=37 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 4'           
                        FROM 
                        hojatrabajo h,pruebas p,vehiculos v, clase c, servicio s, tipo_combustible t, maquina ma , 
                        cda cd, sede se, certificados cr, consecutivotc ct
                        WHERE 
                        v.idvehiculo=h.idvehiculo AND h.idhojapruebas=p.idhojapruebas AND 
                        v.idclase=c.idclase AND v.idservicio=s.idservicio AND v.idtipocombustible=t.idtipocombustible AND 
                        p.idmaquina=ma.idmaquina AND cd.idcda=se.idcda AND h.idhojapruebas=cr.idhojapruebas AND h.idhojapruebas=ct.idhojapruebas AND  
                        (h.reinspeccion=0 or h.reinspeccion=1) AND
                        (p.estado<>0 and p.estado<>5) AND
                        ma.idmaquina=$idconf_maquina AND 
                        (p.idtipo_prueba=2 OR p.idtipo_prueba=3) AND 
                        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY 1 ASC ");
        return $query;
    }

    public function getPruebagases($idhojapruebas)
    {
        $query = $this->db->query("SELECT p.idprueba, p.idmaquina,
                                    IFNULL((SELECT v.numero_placa FROM vehiculos v WHERE v.idvehiculo = h.idvehiculo ), '---') AS 'placa',
                                    IFNULL((SELECT if(v.tipo_vehiculo = 1,'4983',if(v.tipo_vehiculo = 2,'4231', '5365')) FROM vehiculos v WHERE v.idvehiculo = h.idvehiculo ), '---') AS 'norma',
                                    DATE_FORMAT(p.fechafinal,'%Y%m%d%H%m%s') AS 'fecha'
                                    v.idtipocombustible
                                    FROM vehiculos v, pruebas p, hojatrabajo h 
                                    WHERE 
                                    v.idvehiculo = h.idvehiculo AND 
                                    p.idhojapruebas = h.idhojapruebas AND (p.idtipo_prueba=3 or p.idtipo_prueba = 2) AND p.estado <> 0 AND p.idhojapruebas=$idhojapruebas AND p.idmaquina IS NOT NULL
                                    ");
        if ($query->num_rows() > 0) {
            $query = $query->result();
            return $query;
        } else {
            return FALSE;
        }
    }

    public function informe_Copoboyaca($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        $consulta = <<<EOF
                            SELECT DISTINCT
                                    DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%m:%s') AS 'Fecha prueba',
                                    v.numero_placa AS 'Placa',
                                    v.ano_modelo AS 'Modelo', 
                                    v.cilindraje AS 'Cilindraje',
                                    s.nombre AS 'Tipo servicio',
                                    c.nombre AS 'Clase',
                                    t.nombre AS 'Tipo combustible',
                                    IFNULL((SELECT valor FROM pruebas pr, resultados re, maquina m  WHERE pr.idtipo_prueba=4 AND pr.idmaquina=m.idmaquina AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1),'---') 'Ruido escape',
                                    IFNULL((SELECT pr.idmaquina FROM pruebas pr, resultados re,  maquina m  WHERE pr.idtipo_prueba=4 AND pr.idmaquina=m.idmaquina AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba   AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1),'---') 'SerialSonometro',
                                    IFNULL((SELECT m.marca FROM pruebas pr, resultados re,  maquina m  WHERE pr.idtipo_prueba=4 AND pr.idmaquina=m.idmaquina AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1),'---') 'MarcaSonometro',
                                    IFNULL((SELECT c.parametro FROM pruebas pr, config_maquina c WHERE pr.idtipo_prueba = 4 AND h.idhojapruebas = pr.idhojapruebas AND pr.idmaquina = c.idmaquina AND c.tipo_parametro = 'modelo' ORDER BY 1 DESC LIMIT 1),'---') 'ModeloSonometro',
                                    CASE
                                                                    WHEN v.scooter=0 THEN  IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---')
                                                                    WHEN (v.scooter=1 AND v.tipo_vehiculo = 3) THEN 0
                                                                    ELSE '---'
                                    END 'Temperatura',
                                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti',
                                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti',
                                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti',
                                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti',
                                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'O2 ralenti',
                                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm crucero',
                                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co crucero',
                                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 crucero',
                                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'Hc crucero',
                                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'O2 crucero',
                                    if(p.idtipo_prueba = 3,ma.idmaquina, '---') AS 'SerieAnalizador',
                                    if(p.idtipo_prueba = 3,ma.nombre, '---') AS 'MarcaAnalizador',
                                    if(p.idtipo_prueba = 3,IFNULL((SELECT c.parametro FROM pruebas pr, config_maquina c WHERE pr.idtipo_prueba = 3 AND h.idhojapruebas = pr.idhojapruebas AND pr.idmaquina = c.idmaquina AND c.tipo_parametro = 'serie_analizador' ORDER BY 1 DESC LIMIT 1),'---'),'---') 'ModeloAnalizador',
                                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=38 ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti disel',
                                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=41 ORDER BY 1 DESC LIMIT 1),'---') 'Rpm gobernada',
                                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=39 ORDER BY 1 DESC LIMIT 1),'---') 'Temperatura disel',
                                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=34 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 1',
                                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=35 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 2',
                                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=36 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 3',
                                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=37 ORDER BY 1 DESC LIMIT 1),'---') 'Ciclo 4',
                                    if(p.estado = 2, 'Aprobado',if(p.estado = 5, 'Abortado', if((p.estado = 3 OR p.estado=1),'Rechazado','Reasignado individual'))) AS 'Resultado',
                                    if(p.idtipo_prueba = 2,ma.idmaquina, '---') AS 'SerieOpacimetro',
                                    if(p.idtipo_prueba = 2,ma.marca, '---') AS 'MarcaOpacimetro',
                                    if(p.idtipo_prueba = 2,ma.serie, '---') AS 'ModeloOpacimetro'
                                    FROM 
                                    hojatrabajo h,pruebas p,vehiculos v, clase c, servicio s, tipo_combustible t, maquina ma , 
                                    cda cd, sede se, certificados cr, consecutivotc ct
                                    WHERE 
                                    v.idvehiculo=h.idvehiculo AND h.idhojapruebas=p.idhojapruebas AND 
                                    v.idclase=c.idclase AND v.idservicio=s.idservicio AND v.idtipocombustible=t.idtipocombustible AND 
                                    p.idmaquina=ma.idmaquina AND cd.idcda=se.idcda AND h.idhojapruebas=cr.idhojapruebas AND h.idhojapruebas=ct.idhojapruebas AND  
                                    (h.reinspeccion=0 or h.reinspeccion=1) AND
                                    p.estado<>0 AND
                                    ma.idmaquina=$idconf_maquina AND 
                                    (p.idtipo_prueba=2 OR p.idtipo_prueba=3) AND 
                                    DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d') ORDER BY p.fechafinal ASC 
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_car_adutioria_new($idmaquina, $idprueba, $datoInforme)
    {
        $this->createTableControl();
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_PEF',";

            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_Span_Bajo_HC',
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_Span_Bajo_CO',
                        IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_Span_Bajo_CO2',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Resultado_Vr_Span_Bajo_HC',   
                        IFNULL((SELECT 
                            if((v.tiempos = '2' 
                                AND (
                                c.cal_bajo_co > IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.05 
                                OR 
                                c.cal_bajo_co < IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') - 0.05
                                )),
                                IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') + 0.02,
                            if((v.tiempos = '4' 
                                AND (
                                c.cal_bajo_co > IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.05
                                OR 
                                c.cal_bajo_co < IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') - 0.05
                                )),
                                IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') + 0.02,
                                c.cal_bajo_co))
                                FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Resultado_Vr_Span_Bajo_CO',
                        IFNULL((select 
                            if((v.tiempos = '2' 
                                AND (
                                cal_bajo_co2 > IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.4 
                                OR 
                                cal_bajo_co2 < IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') - 0.4
                                )),
                                IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.1,
                            if((v.tiempos = '4' AND v.tipo_vehiculo = 3
				AND (
				cal_bajo_co2 > IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.4
				OR 
				cal_bajo_co2 < IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') - 0.4
				)),
				IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.1,
                            if((v.tiempos = '4' AND v.tipo_vehiculo = 1
				AND (
				cal_bajo_co2 > IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.6
				OR 
				cal_bajo_co2 < IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') - 0.6
				)),
				IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.1,
				cal_bajo_co2
				))) 
				FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Resultado_Vr_Span_Bajo_CO2',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_Span_Alto_HC',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_Span_Alto_CO',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_Span_Alto_CO2',
			IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Resultado_Vr_Span_Alto_HC',
                        IFNULL((select 
                            if((v.tiempos = '2' 
				AND (
				c.cal_alto_co > IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.2 
				OR 
				c.cal_alto_co < IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') - 0.2
				)),
				IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.1,
                            if((v.tiempos = '4' 
				AND (
				c.cal_alto_co > IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.2
				OR 
				c.cal_alto_co < IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') - 0.2
				)),
				IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.1,
				c.cal_alto_co)) 
				FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Resultado_Vr_Span_Alto_CO',
         		IFNULL((select 
                            if((v.tiempos = '2' 
				AND (
				c.cal_alto_co2 > IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.8 
				OR 
				c.cal_alto_co2 < IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') - 0.8
				)),
				IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.1,
			    if((v.tiempos = '4' AND v.tipo_vehiculo = 1
				AND (
				c.cal_alto_co2 > IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.6
				OR 
				c.cal_alto_co2 < IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') - 0.6
				)),
			IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.1,
                            if((v.tiempos = '4' AND v.tipo_vehiculo = 3
				AND (
				c.cal_alto_co2 > IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.8
				OR 
				c.cal_alto_co2 < IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') - 0.8
				)),
				IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') + 0.1,
				c.cal_alto_co2		
				))) 
				FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Resultado_Vr_Span_Alto_CO2',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y-%m-%dT%h:%i')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC  limit 1),'') AS 'Fecha_y_hora_ultima_verificacion_y_ajuste',";
            //            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Vr_Span_Bajo_HC',
            //                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Resultado_Vr_Span_Bajo_HC',   
            //                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Vr_Span_Bajo_CO',
            //                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Resultado_Vr_Span_Bajo_CO',
            //			IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Vr_Span_Bajo_CO2',
            //			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Resultado_Vr_Span_Bajo_CO2',
            //                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Vr_Span_Alto_HC',
            //			IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Resultado_Vr_Span_Alto_HC',
            //                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Vr_Span_Alto_CO',
            //			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Resultado_Vr_Span_Alto_CO',
            //                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Vr_Span_Alto_CO2',
            //                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),' ') AS 'Resultado_Vr_Span_Alto_CO2',
            //                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC  limit 1),' ') AS 'Fecha_y_hora_ultima_verificacion_y_ajuste',";

            $lin = "IFNULL((SELECT c.valor1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_primer_punto_de_linealidad',
                        IFNULL((SELECT c.lectura1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Resultado_primer_punto_de_linealidad',
                        IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_segundo_punto_de_linealidad',
                        IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Resultado_segundo_punto_de_linealidad',
                        IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_tercer_punto_de_linealidad',
                        IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Resultado_tercer_punto_de_linealidad',
                        IFNULL((SELECT c.valor4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Vr_cuarto_punto_de_linealidad',
                        IFNULL((SELECT c.lectura4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'') AS 'Resultado_cuarto_punto_de_linealidad',";
        } else {
            $pef = "IFNULL((select parametro from config_maquina where tipo_parametro='PEF' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Vr_PEF',";

            $cal = "IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Vr_Span_Bajo_HC',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Vr_Span_Bajo_CO',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Vr_Span_Bajo_CO2',
                        IFNULL((select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'')  AS 'Resultado_Vr_Span_Bajo_HC',
                        IFNULL((select 
                            if((v.tiempos = '2' 
                                AND (
                                parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.05 
                                OR 
                                parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.05
                                )),
                                (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.02,
                            if((v.tiempos = '4' 
                                AND (
                                parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.05
                                OR 
                                parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.05
                                )),
                                (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.02,
                                parametro))
                                from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Resultado_Vr_Span_Bajo_CO',
                        IFNULL((select 
                            if((v.tiempos = '2' 
                                AND (
                                parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.4 
                                OR 
                                parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.4
                                )),
                                (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
                            if((v.tiempos = '4' AND v.tipo_vehiculo = 3
				AND (
				parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.4
				OR 
				parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.4
				)),
				(select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
				if((v.tiempos = '4' AND v.tipo_vehiculo = 1
				AND (
				parametro > (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.6
				OR 
				parametro < (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.6
				)),
				(select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
				parametro
				))) 
				from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Resultado_Vr_Span_Bajo_CO2',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Vr_Span_Alto_HC',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Vr_Span_Alto_CO',
                        IFNULL((select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Vr_Span_Alto_CO2',
                        IFNULL((select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Resultado_Vr_Span_Alto_HC',
                        IFNULL((select 
                            if((v.tiempos = '2' 
				AND (
				parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.2 
				OR 
				parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.2
				)),
				(select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
                            if((v.tiempos = '4' 
				AND (
				parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.2
				OR 
				parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.2
				)),
				(select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
				parametro)) 
				from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Resultado_Vr_Span_Alto_CO',
         		IFNULL((select 
                            if((v.tiempos = '2' 
				AND (
				parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.8 
				OR 
				parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.8
				)),
				(SELECT parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
			    if((v.tiempos = '4' AND v.tipo_vehiculo = 1
				AND (
				parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.6
				OR 
				parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.6
				)),
				(select parametro from config_maquina  WHERE tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
                            if((v.tiempos = '4' AND v.tipo_vehiculo = 3
				AND (
				parametro > (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.8
				OR 
				parametro < (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) - 0.8
				)),
				(select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) + 0.1,
				parametro		
				))) 
				from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'') AS 'Resultado_Vr_Span_Alto_CO2',
                        DATE_FORMAT((select parametro from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1),'%Y-%m-%dT%h:%i') AS 'Fecha_y_hora_ultima_verificacion_y_ajuste',";
            //            
            $lin = "IFNULL((select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)),'') AS 'Vr_primer_punto_de_linealidad',
                        IFNULL((select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)),'') AS 'Resultado_primer_punto_de_linealidad',
                        IFNULL((select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)),'') AS 'Vr_segundo_punto_de_linealidad',
                        IFNULL((select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)),'') AS 'Resultado_segundo_punto_de_linealidad',
                        IFNULL((select valor from resultadosauditoria where substring(observacion,1,13)='Lente 3 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)),'') AS 'Vr_tercer_punto_de_linealidad',
                        IFNULL((select valor from resultadosauditoria where substring(observacion,1,13)='Lente 3 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)),'') AS 'Resultado_tercer_punto_de_linealidad',
                        IFNULL((select valor from resultadosauditoria where substring(observacion,1,13)='Lente 4 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)),'') AS 'Vr_cuarto_punto_de_linealidad',
                        IFNULL((select valor from resultadosauditoria where substring(observacion,1,13)='Lente 4 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)),'') AS 'Resultado_cuarto_punto_de_linealidad',";
        }
        $consulta = <<<EOF
                 SELECT
			IFNULL((SELECT if((v.tipo_vehiculo = 1 AND (v.idtipocombustible=2 OR v.idtipocombustible= 4)),'2',if(v.idtipocombustible = 1,'1', '3')) FROM vehiculos v WHERE v.idvehiculo = h.idvehiculo ),'') AS 'norma',
                        ifnull((select valor from config_prueba where idconfig_prueba=1500),'') AS 'No_CDA',
                        c.nombre_cda AS 'Nombre_CDA',
                        c.numero_id AS 'Nit_CDA',
                        s.direccion AS 'Direccion_CDA',
                        s.telefono_uno AS 'Telefono',
                        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'') AS 'Numero de certificado de RTM',
                        s.cod_ciudad  AS 'Ciudad_cda',
                        c.numero_resolucion AS 'No_resolucion_CDA',
                        DATE_FORMAT(c.fecha_resolucion, '%Y-%m-%d') AS 'Fecha_resolucion_CDA',
                        $pef
                        IFNULL((select parametro from config_maquina where idmaquina=p.idmaquina and tipo_parametro='serie_analizador' limit 1),'') AS 'No_de_serie_banco',
                        m.serie AS 'No_serie_analizador',
                        m.nombre AS 'Marca_analizador',
                        IFNULL(if(v.tiempos = '2', '2T',if(v.tiempos = '4' AND v.tipo_vehiculo = 1 AND v.idtipocombustible<>1, 'OTTO', if(v.idtipocombustible  = 1, 'DIESEL', '4T'))),'') AS 'tipomotor',
                        $cal
                        'TECMMAS S.A.S' AS 'Nombre_proveedor',
                        (select valor from config_prueba where idconfig_prueba=601) AS 'Nombre_programa',
                        (select valor from config_prueba where idconfig_prueba=600) AS 'Version_programa',
                        $lin
                        p.idprueba  AS 'No_de_consecutivo_prueba',
                        DATE_FORMAT(p.fechainicial, '%Y-%m-%dT%H:%i') AS 'Fecha_y_hora_inicio_de_la_prueba',
                        DATE_FORMAT(p.fechafinal, '%Y-%m-%dT%H:%i')  AS 'Fecha_y_hora_final_de_la_prueba',
                        if(p.estado=5,DATE_FORMAT(p.fechafinal, '%Y-%m-%dT%H:%i') ,' ') AS 'Fecha_y_hora_aborto_de_la_prueba',
                        u.identificacion AS 'Operador_realiza_prueba',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'') AS 'Metodo_de_medicion_de_temperatura_motor',
                        IFNULL((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_ambiente' order by 1 desc limit 1),'') AS 'Temperatura_ambiente',
                        IFNULL((select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1),'') AS 'Humedad_relativa',
                        if(p.estado = 5,
                        concat(
                        ifnull((SELECT '1' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),''),
                        ifnull((SELECT '2' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),''),
                        ifnull((SELECT '3' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),''),
                        ifnull((SELECT '4' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'')
                        ),'') AS 'Causal_aborto_analisis',
                        concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) AS 'Nombre_razon_social_propietario',
                        ti.id_mintransporte AS 'Tipo_documento',
                        cl.numero_identificacion AS 'No_documento',
                        cl.direccion AS 'Direccion',
                        cl.telefono1 AS 'Telefono_1',
                        ifnull(cl.telefono2,' ') AS 'Telefono_2',
                        cl.cod_ciudad AS 'Ciudad',
                        if(v.registroRunt=1,
                        (SELECT m.idmarcaRUNT from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                        (select m.idmarca from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                        if(v.registroRunt=1,
                        (select l.idlinearunt from linearunt l where l.idlinearunt=v.idlinea),
                        (select l.idlinea from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                        car.nombre AS 'Carroceria',
                        v.numero_placa AS 'Placa',
                        v.cilindraje AS 'Cilindraje',
                        v.ano_modelo AS 'Ano_modelo',
                        v.idclase AS 'Clase',
                        CASE
                            WHEN v.idservicio = 1 THEN '4'
                            WHEN v.idservicio = 3 THEN '1'
                            WHEN v.idservicio = 4 THEN '3'
                            ELSE v.idservicio
                        END AS 'Servicio',
                        CASE
                            WHEN v.idtipocombustible = 2 THEN '1'
                            WHEN v.idtipocombustible = 1 THEN '3'
                            ELSE v.idtipocombustible
                        END AS 'Combustible',
                        v.numero_motor AS 'Numero_motor',
                        v.numero_serie AS 'Numero_VIN_serie',
                        v.numero_tarjeta_propiedad AS 'No_licencia_transito',
                        v.kilometraje AS 'Kilometraje',
                        v.potencia_motor AS 'Potencia_motor',
                        'NO' AS 'modificadion_motor',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas_tubo_escape',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=378  order by 1 desc limit 1),'NO') AS 'Fugas_silenciador',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Accesorios_o_deformaciones_en_el_tubo_de_escape_que_no_permitan_la_instalacion_sistema_de_muestreo',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Presencia_tapa_Combustible_o_fugas_en_el_mismo',
			ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Presencia_Tapa_Aceite',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia_o_mal_estado_filtro_de_Aire',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas_adicionales_diseno',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=337  order by 1 desc limit 1),'NO') AS 'PCV_Sistema_recirculacion_de_gases_del_carter',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia_humo_negro_azul',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM_fuera_rango',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Falla_sistema_de_refrigeracion',
                        if(v.scooter=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),''),'0') AS 'Temperatura_motor',
                        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'') AS 'Rpm_ralenti',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'') AS 'Hc_ralenti',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'') AS 'Co_ralenti',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'') AS 'Co2_ralenti',
                        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'') AS 'O2_ralenti',
                        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'') AS 'Rpm_crucero',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'') AS 'Hc_crucero',
                        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'') AS 'Co_crucero',
			IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'') AS 'Co2_crucero',
			ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_crucero' order by 1 desc limit 1),'') AS 'O2_crucero',
			IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Presencia_de_dilucion',
                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','')) AS 'Incumplimiento_de_niveles_de_emision_gases',
                        if((p.estado=3 OR p.estado=1) AND p.estado<>5,
                        concat(
                        ifnull((select '1,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),''),
                        ifnull((select '2,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=348  order by 1 desc limit 1),''),
                        ifnull((select '3,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=351  order by 1 desc limit 1),''),
                        ifnull((select '4,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=350  order by 1 desc limit 1),''),
                        ifnull((select '5,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),''),
                        ifnull((SELECT '6,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=354  order by 1 desc limit 1),''),
                        ifnull((SELECT '7,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),''),
                        ifnull((SELECT '8,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=356  order by 1 desc limit 1),''),
                        ifnull((SELECT '9,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=337  order by 1 desc limit 1),''),
                        ifnull((SELECT '10,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),''),
                        ifnull((SELECT '11,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),''),
                        ifnull((SELECT '12,' from resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA'  order by 1 desc limit 1),''),
                        ifnull((SELECT '13,' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '5' AND v.ano_modelo <='1970' ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '14,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti' and valor >= '800' AND v.ano_modelo <='1970' ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '15,' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '4' AND (v.ano_modelo >='1971' AND v.ano_modelo <='1984') ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '16,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti' and valor >= '650' AND (v.ano_modelo >='1971' AND v.ano_modelo <='1984') ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '17,' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '3' AND (v.ano_modelo >='1985' AND v.ano_modelo <='1997') ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '18,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti' and valor >= '400' AND (v.ano_modelo >='1985' AND v.ano_modelo <='1997') ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '19,' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti' and valor >= '1' AND v.ano_modelo >='1998' ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '20,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti' and valor >= '200' AND v.ano_modelo >='1998'  ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '21,' from resultados where idprueba=p.idprueba AND tiporesultado='co_crucero' and valor >= '5' AND v.ano_modelo <='1970' ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '22,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_crucero' and valor >= '800' AND v.ano_modelo <='1970' ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '23,' from resultados where idprueba=p.idprueba AND tiporesultado='co_crucero' and valor >= '4' AND (v.ano_modelo >='1971' AND v.ano_modelo <='1984') ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '24,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_crucero' and valor >= '650' AND (v.ano_modelo >='1971' AND v.ano_modelo <='1984') ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '25,' from resultados where idprueba=p.idprueba AND tiporesultado='co_crucero' and valor >= '3' AND (v.ano_modelo >='1985' AND v.ano_modelo <='1997') ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '26,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_crucero' and valor >= '400' AND (v.ano_modelo >='1985' AND v.ano_modelo <='1997') ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '27,' from resultados where idprueba=p.idprueba AND tiporesultado='co_crucero' and valor >= '1' AND v.ano_modelo >='1998' ORDER by 1 desc limit 1),''),
                        ifnull((SELECT '28,' from resultados where idprueba=p.idprueba AND tiporesultado='hc_crucero' and valor >= '200' AND v.ano_modelo >='1998'  ORDER by 1 desc limit 1),'')
                        ),'0') AS 'Causas_rechazo_gases',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=348  order by 1 desc limit 1),'NO') AS 'Fugas_tubo_escape_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=349  order by 1 desc limit 1),'NO') AS 'Fugas_silenciador_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=350  order by 1 desc limit 1),'NO') AS 'Auscencia_tapa_combustible_o_fugas_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=351  order by 1 desc limit 1),'NO') AS 'Auscencia_tapa_aceite_o_fugas_de_aceite_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=352  order by 1 desc limit 1),'NO') AS 'Accesorios_o _deformaciones_tubo_escape_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=353  order by 1 desc limit 1),'NO') AS 'Salidas_adicionales_al_diseno_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=354  order by 1 desc limit 1),'NO') AS 'Auscencia_filtro_aire_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=355  order by 1 desc limit 1),'NO') AS 'Falla_sistema_de_refrigeracion_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=356  order by 1 desc limit 1),'NO') AS 'Revoluciones_instables_o_fuera_rango_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='INDICACION DEL MAL FUNCIONAMIENTO DEL MOTOR'  order by 1 desc limit 1),'NO') AS 'Indicacion_mal_funcionamiento_del_motor_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'Funcionamiento_del_sistema_de_control_velocidad_de_motor_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=379  order by 1 desc limit 1),'NO') AS 'Instalacion_dispositivos_que_alteren_rpm_disel',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'') AS 'Temperatura_inicial_de_motor_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=358  order by 1 desc limit 1),'NO') AS 'Velocidad_no_alcanzada_5_seg_disel',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'') AS 'Rpm_velocidad_gobernada_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=357  order by 1 desc limit 1),'NO') AS 'Falla_subita_motor_disel',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'') AS 'Rpm_ralenti_disel',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'') AS 'Resultado_ciclo_preliminar_disel',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'') AS 'RPM_gobernada_ciclo_preliminar_disel',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'') AS 'Resultado_opacidad_primer_ciclo_disel',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'') AS 'RPM_gobernada_primer_ciclo_disel',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'') AS 'Resultado_opacidad_segundo_ciclo_disel',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'') AS 'RPM_gobernada_segundo_ciclo',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'') AS 'Resultado_opacidad_tercer_ciclo',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'') AS 'RPM_gobernada_tercer_ciclo',
                        abs(round(v.diametro_escape * 10,1)) AS  'LTOE',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=225 order by 1 desc limit 1),'') AS 'Temperatura_final_del_motor_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=341  order by 1 desc limit 1),'NO') AS 'Falla_por_temperatura_motor_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=147  order by 1 desc limit 1),'NO') AS 'Inestabilidad_durante_ciclos_de_medicion_disel',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencias_aritmetica_disel',
                        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'') AS 'Resultado_final_opa_disel',
                        if((p.estado=3 OR p.estado=1) AND p.estado<>5,
                        concat(
                        ifnull((select '1,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),''),
                        ifnull((select '2,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=348  order by 1 desc limit 1),''),
                        ifnull((select '3,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=351  order by 1 desc limit 1),''),
                        ifnull((select '4,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=350  order by 1 desc limit 1),''),
                        ifnull((select '5,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),''),
                        ifnull((SELECT '6,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=354  order by 1 desc limit 1),''),
                        ifnull((SELECT '7,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=379  order by 1 desc limit 1),''),
                        ifnull((SELECT '8,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),''),
                        ifnull((SELECT '9,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),''),
                        ifnull((SELECT '10,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=358  order by 1 desc limit 1),''),
                        ifnull((SELECT '11,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=358  order by 1 desc limit 1),''),
                        ifnull((SELECT '12,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=405  order by 1 desc limit 1),''),
                        ifnull((SELECT '14,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=149  order by 1 desc limit 1),''),
                        ifnull((SELECT '15,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=357  order by 1 desc limit 1),''),
                        ifnull((SELECT '16,' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=357  order by 1 desc limit 1),''),
                        ifnull((SELECT '17,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '50' AND v.ano_modelo <= '1970'  order by 1 desc limit 1),''),
                        ifnull((SELECT '18,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '45' AND  (v.ano_modelo >='1971' AND v.ano_modelo <='1984')  order by 1 desc limit 1),''),
                        ifnull((SELECT '19,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '40' AND  (v.ano_modelo >='1985' AND v.ano_modelo <='1997')  order by 1 desc limit 1),''),
                        ifnull((SELECT '20,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '35' AND  v.ano_modelo >='1998'  order by 1 desc limit 1),''),
                        ifnull((SELECT '21,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '50' AND v.ano_modelo <= '1970'  order by 1 desc limit 1),''),
                        ifnull((SELECT '22,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '45' AND  (v.ano_modelo >='1971' AND v.ano_modelo <='1984')  order by 1 desc limit 1),''),
                        ifnull((SELECT '23,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '40' AND  (v.ano_modelo >='1985' AND v.ano_modelo <='1997')  order by 1 desc limit 1),''),
                        ifnull((SELECT '24,' from resultados where idprueba=p.idprueba and idconfig_prueba=61 AND valor > '35' AND  v.ano_modelo >='1998'  order by 1 desc limit 1),'')
                        ),'0') AS 'Causas_rechazo_opa',
                        if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'Concepto_tecnico',
                        IFNULL((SELECT ma.idmaquina FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'') 'idsonometro',                        
                        IFNULL((SELECT ma.nombre FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'') 'Marca_sonometro',                        
                        IFNULL((SELECT ma.serie FROM pruebas pr, maquina ma WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND pr.idmaquina = ma.idmaquina   ORDER BY 1 DESC LIMIT 1),'')  'Serie_sonometro',
                        IFNULL((SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1),'') 'Valor_de_ruido_reportado'
                        from
                        cda c,sede s,hojatrabajo h,pruebas p,maquina m,usuarios u,clientes cl,
                        vehiculos v,tipo_identificacion ti, carroceria car
                        where
                        car.idcarroceria=v.diseno and
                        c.idcda=s.idcda AND
                        h.idhojapruebas=p.idhojapruebas and
                        (p.idtipo_prueba=3 OR p.idtipo_prueba=2) and
                        (h.reinspeccion=0 or h.reinspeccion=1) and
                        p.estado<>0 and
                        m.idmaquina=p.idmaquina and
                        p.idusuario=u.idusuario and
                        v.idvehiculo=h.idvehiculo and
                        v.idpropietarios=cl.idcliente and
                        ti.tipo_identificacion=cl.tipo_identificacion and 
                        m.idmaquina=$idmaquina AND p.idprueba=$idprueba           
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    function informe_car_new_basic($idhojapruebas)
    {
        $consulta = <<<EOF
                SELECT
                    concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) AS 'Nombre_razon_social_propietario',
                    IFNULL((SELECT t.abrev from tipo_identificacion t WHERE cl.tipo_identificacion = t.tipo_identificacion LIMIT 1),'') AS 'Tipo_documento',
                    cl.numero_identificacion AS 'No_documento',
                    cl.direccion AS 'Direccion',
                    cl.telefono1 AS 'Telefono_1',
                    ifnull(cl.telefono2,' ') AS 'Telefono_2',
                    cl.cod_ciudad AS 'Ciudad',
                    if(v.registroRunt=1,
                    (SELECT m.idmarcaRUNT from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                    (select m.idmarca from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                    if(v.registroRunt=1,
                       (select l.idlinearunt from linearunt l where l.idlinearunt=v.idlinea),
                       (select l.idlinea from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                      IFNULL((SELECT car.nombre FROM carroceria car WHERE v.diseno = car.idcarroceria LIMIT 1),'') AS 'Carroceria',
                       v.numero_placa AS 'Placa',
                       v.cilindraje AS 'Cilindraje',
                       v.ano_modelo AS 'Ano_modelo',
                       v.idclase AS 'Clase',
                    CASE
                       WHEN v.idservicio = 1 THEN '4'
                       WHEN v.idservicio = 3 THEN '1'
                       WHEN v.idservicio = 4 THEN '3'
                       ELSE v.idservicio
                       END AS 'Servicio',
                    CASE
                       WHEN v.idtipocombustible = 2 THEN '1'
                       WHEN v.idtipocombustible = 1 THEN '3'
                          ELSE v.idtipocombustible
                    END AS 'Combustible',
                    IFNULL(if(v.tiempos = '2', '2T',if(v.tiempos = '4' AND v.tipo_vehiculo = 1 AND v.idtipocombustible<>1, 'OTTO', if(v.idtipocombustible  = 1, 'DIESEL', '4T'))),'') AS 'tipomotor',
                    v.numero_motor AS 'Numero_motor',
                    v.numero_serie AS 'Numero_VIN_serie',
                    v.numero_tarjeta_propiedad AS 'No_licencia_transito',
                    v.kilometraje AS 'Kilometraje',
                    v.potencia_motor AS 'Potencia_motor'
                    from
                    vehiculos v, clientes cl, hojatrabajo h
                    where
                    v.idvehiculo = h.idvehiculo AND 
                    v.idcliente = cl.idcliente AND h.idhojapruebas=$idhojapruebas           
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    function createTableControl()
    {
        $fields = array(
            'idcontrol' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'idprueba' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => FALSE,
            ),
            'tipo' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => FALSE,
            ),
            'estado' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ),
            'usuario' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'fecharegistro' => array(
                'type' => 'TIMESTAMP',
                'null' => FALSE,
            ),
        );
        $this->myforge->add_key('idcontrol', TRUE);
        $this->myforge->add_field($fields);
        $attributes = array('ENGINE' => 'MyISAM');
        $this->myforge->create_table('control', TRUE, $attributes);
    }

    function insertControlCar($datos)
    {
        if ($this->db->insert('control', $datos)) {
            return 1;
        }
    }

    function getEnvioCar($idprueba_gases)
    {
        $this->createTableControl();
        $consulta = <<<EOF
                 SELECT * FROM control c WHERE c.idprueba = $idprueba_gases  and c.estado = 1 and c.tipo <> 'Envio car exitoso.' and c.tipo <> 'Envio sample exitoso.' and c.tipo NOT LIKE '%Iniciando envio%' 
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_sema_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Pef',";
            $cal = "    IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo HC',   
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO2',
			IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto HC',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO2',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = m.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC  limit 1),'---') AS 'Fecha de verificacion AAAA/MM/DD',";
        } else {
            $pef = "(select parametro from config_maquina where tipo_parametro='PEF' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr PEF',";
            $cal = "(select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Vr Span Bajo HC',
                            (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO',
                            (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO2',
                            (select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto HC',
                            (select parametro from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO', 
                            (select parametro from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO2',
                            (select DATE_FORMAT(parametro, '%Y/%m/%d %H:%i:%s' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha y hora ultima verificacion',";
        }
        $query = $this->db->query("SELECT
                            v.numero_placa AS 'Placa',
                            if(v.registroRunt=1,
                            (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                            (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                            if(v.registroRunt=1,
                            (select l.nombre from linearunt l where l.idlinearunt=v.idlinea),
                            (select l.nombre from linea l where l.idlinea=v.idlinea)) AS 'Linea',
                            v.ano_modelo AS 'Modelo',
                            IFNULL((SELECT t.nombre FROM tipo_combustible t WHERE v.idtipocombustible = t.idtipocombustible LIMIT 1),'---') AS 'Combustible',
                            IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'---') AS 'Servicio',
                            v.cilindraje AS 'Cilindraje',
                            CONCAT(v.tiempos, 'T') AS 'Tipo motor',
                            v.kilometraje AS 'Kilometraje',
                            IFNULL((SELECT TRUNCATE(r.valor / 9.81,0)  FROM pruebas p, resultados r WHERE h.idhojapruebas = p.idhojapruebas AND p.idprueba = r.idprueba AND p.idtipo_prueba = 7 AND r.observacion = 'Pesaje eje 1 derecho' LIMIT 1 ), '') AS 'Peso bruto',
                            IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Hc ralenti',
                            IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co ralenti',
                            IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Co2 ralenti',
                            IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti',
                            if((p.estado = 3 OR p.estado = 1),'Rechazado',if(p.estado = 2,'Aprobado','Abortado')) AS 'Estado'
                            from
                            vehiculos v,hojatrabajo h,pruebas p,maquina m
                            where
                            h.idhojapruebas=p.idhojapruebas and
                            p.idtipo_prueba=3 and
                            p.estado<>0 and
                            m.idmaquina=p.idmaquina and
                            v.idvehiculo=h.idvehiculo and
                            v.tipo_vehiculo=3 and
                            (h.reinspeccion = 0 OR h.reinspeccion = 1) and
                            m.idmaquina=$idconf_maquina AND
                            DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')");
        return $query;
    }

    function getBitacoraGases($idprueba)
    {
        $this->controlGases();
        $consulta = <<<EOF
                 SELECT 
                    IFNULL((SELECT c.idprueba FROM control_prueba_gases c WHERE c.idprueba = p.idprueba LIMIT 1),'0') AS 'control',
                    h.idhojapruebas,p.idprueba,p.fechainicial,v.tipo_vehiculo, v.tiempos,v.ano_modelo,
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'rpm_ralenti' LIMIT 1),'0') AS 'rpm_ralenti',
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'hc_ralenti' LIMIT 1),'0') AS 'hc_ralenti',
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'co_ralenti' LIMIT 1),'0') AS 'co_ralenti', 
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'co2_ralenti' LIMIT 1),'0') AS 'co2_ralenti', 
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'o2_ralenti' LIMIT 1),'0') AS 'o2_ralenti',
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'rpm_crucero' LIMIT 1),'0') AS 'rpm_crucero',
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'hc_crucero' LIMIT 1),'0') AS 'hc_crucero',
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'co_crucero' LIMIT 1),'0') AS 'co_crucero', 
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'co2_crucero' LIMIT 1),'0') AS 'co2_crucero', 
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'o2_crucero' LIMIT 1),'0') AS 'o2_crucero',
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'promhcra_ant' LIMIT 1),'0') AS 'promhcra_ant',
                    IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.observacion = 'promcora_ant' LIMIT 1),'0') AS 'promcora_ant' 
                    FROM vehiculos v, hojatrabajo h, pruebas p
                    WHERE 
                    v.idvehiculo = h.idvehiculo AND 
                    h.idhojapruebas = p.idhojapruebas AND  
                    p.idtipo_prueba = 3 AND (p.estado = 2 OR p.estado = 1 OR p.estado= 3) AND p.idprueba= $idprueba         
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    function logGasesInsert($datos)
    {
        $this->db->insert('control_prueba_gases', $datos);
    }

    function controlGases()
    {
        $fields = array(
            'idcontrol_prueba_gases' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'idprueba' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ),
            'exosto' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ),
            'datos_ciclo_ralenti' => array(
                'type' => 'LONGTEXT',
                'null' => FALSE,
            ),
            'datos_ciclo_crucero' => array(
                'type' => 'LONGTEXT',
                'null' => TRUE,
            ),
        );
        $this->myforge->add_key('idcontrol_prueba_gases', TRUE);
        $this->myforge->add_field($fields);
        $attributes = array('ENGINE' => 'InnoDB');
        $this->myforge->create_table('control_prueba_gases', TRUE, $attributes);
    }

    public function imageNot()
    {
        $consulta = <<<EOF
                 select DISTINCT
v.numero_placa, h.fechainicial, p.*
FROM 
vehiculos v, hojatrabajo h, pruebas p, imagenes i
WHERe
v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas AND 
(h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
p.idtipo_prueba = 5 AND (p.estado <>5 AND p.estado <> 9) AND 
p.idprueba  not in (SELECT im.idprueba from imagenes_bd.imagenes im ) AND p.fechainicial > '2021-01-01' ORDER BY p.fechainicial ASC        
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function getSicov()
    {
        $consulta = <<<EOF
                 SELECT e.idelemento, e.cadena FROM imagenes_bd.eventossicov e WHERE e.tipo = 'f' AND e.enviado = 1  AND e.cadena  LIKE '%{%' GROUP BY e.idelemento      
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_762($idconf_maquina, $fechainicial, $fechafinal, $datoInforme, $tipo_vehiculo, $tipo_prueba)
    {
        if ($tipo_vehiculo == 2) {
            $tipo_vehiculoFinal = "(v.tipo_vehiculo= 2 OR v.tipo_vehiculo= 1) AND";
        } else {
            $tipo_vehiculoFinal = "v.tipo_vehiculo= $tipo_vehiculo AND";
        }
        $consulta = <<<EOF
                            SELECT  DISTINCT
                                IFNULL((SELECT c.nombre_cda FROM cda c LIMIT 1),'---') AS 'Nombre o razon social',
                                IFNULL((SELECT t.abrev FROM cda c, tipo_identificacion t WHERE c.tipo_identificacion = t.tipo_identificacion LIMIT 1),'---') AS 'Tipo de documento (C.C,C.E,NIT )',            
                                IFNULL((SELECT c.numero_id FROM cda c LIMIT 1),'---') AS 'Numero de identificacion', 
                                IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto', 
                                IFNULL((SELECT s.email FROM sede s LIMIT 1),'---') AS 'Correo electronico', 
                                IFNULL((SELECT CONCAT(s.telefono_uno, ' - ', s.telefono_dos)  FROM sede s LIMIT 1),'---') AS 'Telefono de contacto', 
                                IFNULL((SELECT p.nombre FROM sede s, ciudades ci, deptos p WHERE s.cod_ciudad = ci.cod_ciudad AND p.cod_depto = ci.cod_depto LIMIT 1),'---') AS 'Departamento',
                                IFNULL((SELECT ci.nombre FROM sede s, ciudades ci, deptos p WHERE s.cod_ciudad = ci.cod_ciudad AND p.cod_depto = ci.cod_depto LIMIT 1),'---') AS 'Ciudad',  
                                IFNULL((SELECT c.numero_resolucion  FROM cda c LIMIT 1),'---') AS 'Numero de resolucion de certificacion autoridad ambiental', 
                                IFNULL((SELECT DATE_FORMAT(c.fecha_resolucion, '%d/%m/%Y')  FROM cda c LIMIT 1),'---') AS 'Fecha resolucion',
                                IFNULL((SELECT s.clase  FROM sede s LIMIT 1),'---') AS 'Clase del cda',
                                ''AS 'Numero_expe',
                                ''AS 'Numero_total_de_equipos_opacimetros',
                                ''AS 'Numero_total_de_analizadores_Otto',
                                ''AS 'Numero_total_de_analizadores_mots_4T',
                                ''AS 'Numero_total_de_analizadores_mots_2T',
                                DATE_FORMAT(p.fechainicial, '%d/%m/%Y %H:%i:%s') AS 'Fecha - hora inicio de la prueba',
                                DATE_FORMAT(p.fechafinal, '%d/%m/%Y %H:%i:%s') AS 'Fecha - hora final de la prueba',
                                IFNULL((SELECT ci.nombre FROM sede s, deptos d, ciudades ci WHERE ci.cod_depto = d.cod_depto AND s.cod_ciudad = ci.cod_ciudad LIMIT 1),'---')  AS 'Municipio de inspeccion',
                                IFNULL((SELECT s.direccion FROM sede s LIMIT 1),'---') AS 'Lugar de prueba',
                                IFNULL((SELECT co.idconsecutivotc FROM consecutivotc co WHERE h.idhojapruebas = co.idhojapruebas LIMIT 1),'---') AS 'Numero inspeccion',
                                IFNULL((SELECT if(p.estado = 2,ce.numero_certificado,'') FROM certificados ce WHERE h.idhojapruebas = ce.idhojapruebas and ce.estado = 1 LIMIT 1),'---') AS 'Numero de certificado',
                                '---' AS 'Serial_equipo_utilizado',
                                '---' AS 'Pef',
                                '---' AS 'Ltoe',
                                '---' AS 'Marca_software_operacion',
                                '---' AS 'Version_software_operacion',
                                IFNULL((SELECT u.IdUsuario FROM usuarios u WHERE u.IdUsuario = p.idusuario LIMIT 1),'---') AS 'Id inspector',
                                v.numero_placa AS 'Placa',
                                IF(v.registroRunt=1,
                                   (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                                   (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'Marca',
                                v.ano_modelo AS 'Modelo',
                                v.cilindraje AS 'Cilindraje',
                                v.kilometraje AS 'Kilometraje',
                                IF(v.registroRunt=1,
                                   (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                                   (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                                IFNULL((SELECT cl.nombre FROM clase cl WHERE cl.idclase = v.idclase LIMIT 1),'---') AS 'Clase',
                                IFNULL((SELECT se.nombre FROM servicio se WHERE se.idservicio = v.idservicio LIMIT 1),'---') AS 'Servicio',
                                IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE ti.idtipocombustible = v.idtipocombustible LIMIT 1),'---') AS 'Combustible',
                                CONCAT(v.tiempos, 'T') AS 'Tipo de motor',
                                v.numero_exostos AS 'Numero de tubos de escape',
                                if(v.tipo_vehiculo = 3,
                                if(v.scooter = 1, 'Scooter', 'Convencional'),
                                '') AS 'Diseno',
                                IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='temperatura_ambiente' OR idconfig_prueba = 200)  limit 1),'---') AS 'Temperatura ambiente (°C)',
                                IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201)   limit 1),'---') AS 'Humedad relativa (%)',
                                '430' AS  'LTOE estandar (mm)',
                                if(v.tipo_vehiculo = 3,
                                 CASE 
                                    WHEN v.scooter = 1 THEN 'Scooter'
                                    ELSE 'Metodo bloque'
                                 END ,
                                 CASE
                                    WHEN v.convertidor = 1 THEN 'Convertidor'
                                    WHEN IFNULL(( SELECT r.valor = 1 FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp' LIMIT 1),'') THEN 'Metodo aceite'
                                    ELSE 'Metodo bloque'
                                 END ) AS 'Método de medición de temperatura',
                                 if(v.idtipocombustible = 1,
                                 ifnull((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---'),
                                 if(v.scooter = 1,0,
                                 ifnull((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'))
                                 
                                 )AS 'Temperatura motor (Tecmperatura inicial disel)(°C)',
                                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura final (Disel T<50)',
                                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---'),
                                '---') AS 'Rpm crucero',
                                IFNULL((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC ralenti (ppm)',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select valor from resultados where idprueba=p.idprueba and tiporesultado='hc_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'HC crucero (ppm)',
                                IFNULL((SELECT TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO ralenti %',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'CO crucero %',
                                IFNULL((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2 ralenti %',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'CO2 crucero %',
                                IFNULL((SELECT TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 ralenti %',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'O2 crucero %',
                                IFNULL((SELECT valor from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---') AS 'Ciclo_preliminar_',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'---') AS 'Rpm gobernada ciclo preliminar (%)',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rpm ralenti ciclo preliminar (%)',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---') AS 'Ciclo_1',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'Rmp gobernada ciclo 1',
                                IFNULL((SELECT valor + 10 from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rmp ralenti ciclo 1',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---') AS 'Ciclo_2',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'Rmp gobernada ciclo 2',
                                IFNULL((SELECT valor - 10 from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rmp ralenti ciclo 2',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---') AS 'Ciclo_3',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'Rmp gobernada ciclo 3',
                                IFNULL((SELECT valor - 20 from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rmp ralenti ciclo 3',
                                IFNULL((SELECT valor  from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---') AS 'Promedio_final',
                                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                                    '---',
                                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
                                ) AS 'Ciclo_preliminar_m1',
                                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                                '---',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---')
                                ) AS '_1_m1',
                                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                                '---',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
                                ) AS '_2_m1',
                                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                                    '---',
                                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
                                ) AS '_3_m1',
                                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                                    '---',
                                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---')
                                ) AS '_final_m1',
                                if(p.estado = 2, 'Aprobado',if((p.estado = 1 OR p.estado = 3),'Rechazado','Abortada')) AS 'Concepto final',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro/azul)',
                                IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Dilucion en la mezcla (SI/NO)',
                                if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera rango',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=328 or valor = '3.1.1.1.1')   order by 1 desc limit 1),'NO') AS 'Fugas tubo (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=329 or valor = '3.1.1.1.2')  order by 1 desc limit 1),'NO') AS 'Salidas adicionales (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=330 or valor = '3.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=331 or valor = '3.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'Auscencia tapones combustible o fuga (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=334 or valor = '3.1.1.1.5')  order by 1 desc limit 1),'NO') AS 'Admision mal estado - filtro de Aire (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=337 or valor = '3.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'Desconexion Recirculacion (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=335 or valor = '3.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Accesorios tubo (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=336 or valor = '3.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'Operacion incorrecta refrigeración (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=334 or valor = '3.1.1.1.5')  order by 1 desc limit 1),'NO') AS 'Ausencia o incorrecta inst. Filtro de Aire (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and (valor=379 or valor = '2.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'Activacion dispositivos (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera rango',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=333 or valor = '3.1.1.1.9')  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro/azul)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=328 or valor = '4.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'Fugas tubo (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=329 or valor = '4.1.1.1.2')  order by 1 desc limit 1),'NO') AS 'Salidas adicionales (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=330 or valor = '3.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI/NO)',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'NO') AS 'Fallas del equipo de medicion',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita del fluido electrico',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo' ORDER by 1 desc limit 1),'NO') AS 'Bloqueo forzado del equipo',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta de la prueba',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'NO') AS 'Falla de desviacion cero',                       
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'incorrecta operación gobernador (SI/NO)',
                                'NO' AS 'Diferencia de temperatura (SI/NO)',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencia aritmetica (SI/NO)',
                                '762 de 2022' AS 'Norma aplicada',
                                IFNULL((SELECT r.valor FROM resultados r, pruebas p WHERE h.idhojapruebas = p.idhojapruebas AND p.idprueba = r.idprueba AND p.idtipo_prueba = 4 LIMIT 1),'') AS 'Medicion escape'
                                FROM 
                                hojatrabajo h,pruebas p,vehiculos v
                                WHERE 
                                h.idhojapruebas=p.idhojapruebas AND
                                p.idmaquina=$idconf_maquina AND 
                                p.idtipo_prueba= $tipo_prueba AND
                                (h.reinspeccion=0 or h.reinspeccion=1) AND
                                (p.estado<>0 AND p.estado <> 9) AND
                                v.idvehiculo=h.idvehiculo AND
                                $tipo_vehiculoFinal
                                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informeCorpocaldas($idconf_maquina, $fechainicial, $fechafinal, $datoInforme, $tipo_vehiculo, $tipo_prueba)
    {
        if ($tipo_vehiculo == 2) {
            $tipo_vehiculoFinal = "(v.tipo_vehiculo= 2 OR v.tipo_vehiculo= 1) AND";
        } else {
            $tipo_vehiculoFinal = "v.tipo_vehiculo= $tipo_vehiculo AND";
        }
        if ($datoInforme == "1") {
            $cal = "IFNULL((SELECT c.span_bajo_hc  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo HC', 
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Bajo HC',     
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO',
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Bajo CO',     
			IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO2',
                        IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Bajo CO2',
			IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto HC',
                        IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Alto HC',
			IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO',
                        IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Alto CO',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO2',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Alto CO',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC  limit 1),'---') AS 'Fecha y hora ultima verificacion',";
        } else {

            $cal = "(select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Vr Span Bajo HC',
                        (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Vr Resultado  de Vr Span Bajo HC',
                        (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO',
                        (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Resultado  de Vr Span Bajo CO',
                        (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO2',
                        (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Resultado  de Vr Span Bajo CO2',
                        (select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto HC',
                        (select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Resultado  de Vr Span Alto HC',
                        (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto CO', 
                        (select parametro from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO',
                        (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto CO2',
                        (select parametro from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO2',
                        (select DATE_FORMAT(parametro, '%Y/%m/%d %H:%i:%s' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha y hora ultima verificacion',";
        }
        $consulta = <<<EOF
                    SELECT  DISTINCT
                                IFNULL((SELECT c.nombre_cda FROM cda c LIMIT 1),'---') AS 'Nombre o razon social',
                                IFNULL((SELECT t.abrev FROM cda c, tipo_identificacion t WHERE c.tipo_identificacion = t.tipo_identificacion LIMIT 1),'---') AS 'Tipo de documento (C.C,C.E,NIT )',            
                                IFNULL((SELECT c.numero_id FROM cda c LIMIT 1),'---') AS 'Numero de identificacion', 
                                IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto', 
                                IFNULL((SELECT s.email FROM sede s LIMIT 1),'---') AS 'Correo electronico', 
                                IFNULL((SELECT CONCAT(s.telefono_uno, ' - ', s.telefono_dos)  FROM sede s LIMIT 1),'---') AS 'Telefono de contacto', 
                                IFNULL((SELECT d.nombre  FROM sede s, ciudades ci, deptos d WHERE s.cod_ciudad = ci.cod_ciudad and ci.cod_depto = d.cod_depto LIMIT 1),'---') AS 'Departamento CDA', 
                                IFNULL((SELECT ci.nombre  FROM sede s, ciudades ci WHERE s.cod_ciudad = ci.cod_ciudad LIMIT 1),'---') AS 'Ciudad', 
                                IFNULL((SELECT c.numero_resolucion  FROM cda c LIMIT 1),'---') AS 'Numero de resolucion de certificacion autoridad ambiental', 
                                IFNULL((SELECT DATE_FORMAT(c.fecha_resolucion, '%d/%m/%Y')  FROM cda c LIMIT 1),'---') AS 'Fecha resolucion',
                                IFNULL((SELECT s.clase  FROM sede s LIMIT 1),'---') AS 'Clase del cda',
                                ''AS 'Numero_expe',
                                ''AS 'Numero_total_de_equipos_opacimetros',
                                ''AS 'Numero_total_de_analizadores_Otto',
                                ''AS 'Numero_total_de_analizadores_mots_4T',
                                ''AS 'Numero_total_de_analizadores_mots_2T',
                                DATE_FORMAT(p.fechainicial, '%d/%m/%Y %H:%i:%s') AS 'Fecha - hora inicio de la prueba',
                                DATE_FORMAT(p.fechafinal, '%d/%m/%Y %H:%i:%s') AS 'Fecha - hora final de la prueba',
                                IFNULL((SELECT d.nombre FROM sede s, deptos d, ciudades ci WHERE ci.cod_depto = d.cod_depto AND s.cod_ciudad = ci.cod_ciudad LIMIT 1),'---')  AS 'Municipio de inspeccion',
                                IFNULL((SELECT s.direccion FROM sede s LIMIT 1),'---') AS 'direccion del cda',
                                IFNULL((SELECT co.idconsecutivotc FROM consecutivotc co WHERE h.idhojapruebas = co.idhojapruebas LIMIT 1),'---') AS 'Numero inspeccion',
                                IFNULL((SELECT ce.numero_certificado FROM certificados ce WHERE h.idhojapruebas = ce.idhojapruebas LIMIT 1),'---') AS 'Numero de certificado',
                                '---' AS 'Serial_equipo_utilizado',
                                '---' AS 'Marca_del_medidor',
                                'TECMMAS S.A.S' AS 'Nombre proveedor software',
                                '---' AS 'Marca_software_operacion',
                                '---' AS 'Version_software_operacion',
                                IFNULL((SELECT u.IdUsuario FROM usuarios u WHERE u.IdUsuario = p.idusuario LIMIT 1),'---') AS 'Id inspector',
                                '---' AS 'Pef',
                                '---' AS 'Serial_banco',
                                '---' AS 'Marca_analizador',
                                $cal
                                v.numero_placa AS 'Placa',
                                IF(v.registroRunt=1,
                                   (SELECT m.nombre FROM linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                                   (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'Marca',
                                v.ano_modelo AS 'Modelo',
                                v.cilindraje AS 'Cilindraje',
                                v.kilometraje AS 'Kilometraje',
                                IF(v.registroRunt=1,
                                   (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                                   (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                                IFNULL((SELECT cl.nombre FROM clase cl WHERE cl.idclase = v.idclase LIMIT 1),'---') AS 'Clase',
                                IFNULL((SELECT se.nombre FROM servicio se WHERE se.idservicio = v.idservicio LIMIT 1),'---') AS 'Servicio',
                                IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE ti.idtipocombustible = v.idtipocombustible LIMIT 1),'---') AS 'Combustible',
                                CONCAT(v.tiempos, 'T') AS 'Tipo de motor',
                                v.numero_exostos AS 'Numero de tubos de escape',
                                if(v.scooter = 1, 'Scooter', 'Convencional') AS 'Diseno',
                                IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='temperatura_ambiente' OR idconfig_prueba = 200)  limit 1),'---') AS 'Temperatura ambiente (°C)',
                                IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201)   limit 1),'---') AS 'Humedad relativa (%)',
                                if(v.idtipocombustible = 1, abs(round(v.diametro_escape * 10,1)), '') AS  'LTOE estandar (mm)',
                                if(v.idtipocombustible = 1, 430, '') AS  'LTOE estandar (mm) (densidad de Humo)',
                                if(v.idtipocombustible = 1,
                              ifnull((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---'),
                              ifnull((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---')
                              )AS 'Temperatura motor inicial',
                              if(v.idtipocombustible = 1,
                               ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---'),
                              ifnull((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---')
                              )AS 'Temperatura motor final',
                                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'---') 'Rpm ralenti V',
                                IFNULL((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC ralenti (ppm)',
                                IFNULL((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO ralenti %',
                                IFNULL((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2 ralenti %',
                                IFNULL((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 ralenti %',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---'),
                                '---') AS 'Rpm crucero',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'HC crucero (ppm)',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'CO crucero %',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'CO2 crucero %',
                                if(v.tipo_vehiculo <> 3,
                                IFNULL((select TRUNCATE(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_crucero' order by 1 desc limit 1),'---'),
                                '---') AS 'O2 crucero %',

                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rpm ralenti',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'---') AS 'Rpm gobernada ciclo preliminar',                                
                                IFNULL((SELECT valor from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---') AS 'Ciclo_preliminar_',
                                IFNULL((SELECT valor + 10 from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rmp ralenti ciclo 1',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'Rmp gobernada ciclo 1',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---') AS 'Ciclo_1',
                                IFNULL((SELECT valor - 10 from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rmp ralenti ciclo 2',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'Rmp gobernada ciclo 2',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---') AS 'Ciclo_2',
                                IFNULL((SELECT valor - 20 from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rmp ralenti ciclo 3',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'Rmp gobernada ciclo 3',
                                IFNULL((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---') AS 'Ciclo_3',
                                IFNULL((SELECT valor  from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---') AS 'Promedio_final',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---') AS 'Ciclo_preliminar_m1',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---') AS '_1_m1',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---') AS '_2_m1',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---') AS '_3_m1',
                                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---') AS '_final_m1',
                                if(p.estado = 2, 'Aprobado',if((p.estado = 1 OR p.estado = 3),'Rechazado','Abortada')) AS 'Concepto final',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro/azul)',
                                IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Presencia de dilución',
                                if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel de emisión aplicable',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'Revoluciones fuera de rango',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo escape',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas Adicionales Diseno',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Ausencia Tapa Aceite',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Ausencia Tapa combustible',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado filtro de Aire',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=337  order by 1 desc limit 1),'NO') AS 'Desconexion recirculación',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Accesorios o deformaciones en el tubo de escape que no permitan la instalación sistema de muestreo',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Operacion incorrecta refrigeración',
                                if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Emisiones',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'incorrecta operación gobernado',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=357  order by 1 desc limit 1),'NO') AS 'Falla subita',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencia aritmetica',
                                'NO' AS 'Diferencia de Temperatura',
                                IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=379  order by 1 desc limit 1),'NO') AS 'Activacion dispositivos',
                                if(p.estado = 5, 
                                IFNULL((SELECT p.fechafinal FROM resultados r WHERE p.idprueba = r.idprueba AND r.idconfig_prueba= 175 LIMIT 1),'---'),'---') AS 'Fecha y hora aborto de prueba',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'NO') AS 'Falla equipo medicion',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita del fluido electrico',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo' ORDER by 1 desc limit 1),'NO') AS 'Bloqueo forzado del equipo',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta de la prueba',
                                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'NO') AS 'Falla de desviacion cero',                       
                                '762 de 2022' AS 'Norma aplicada',
                                (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Medicion escape (db)'
                                FROM 
                                hojatrabajo h,pruebas p,vehiculos v, maquina ma 
                                WHERE 
                                h.idhojapruebas=p.idhojapruebas AND
                                p.idmaquina=ma.idmaquina AND 
                                ma.idmaquina=$idconf_maquina AND 
                                p.idtipo_prueba= $tipo_prueba AND
                                (h.reinspeccion=0 or h.reinspeccion=1) AND
                                (p.estado<>0 AND p.estado <> 9) AND
                                v.idvehiculo=h.idvehiculo AND
                                $tipo_vehiculoFinal
                                DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') AND DATE_FORMAT('$fechafinal','%Y-%m-%d')  
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    function getPrueba($idhojapruebas)
    {
        $consulta = <<<EOF
                 SELECT 
                    v.idtipocombustible,
                    v.tipo_vehiculo,
                    p.idmaquina,p.idprueba
                    FROM vehiculos v
                    INNER JOIN hojatrabajo h ON v.idvehiculo=h.idvehiculo
                    INNER JOIN pruebas p ON p.idhojapruebas=h.idhojapruebas
                    WHERE
                    h.idhojapruebas=$idhojapruebas AND (p.idtipo_prueba = 3 OR p.idtipo_prueba = 2);
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    function getEnvioCornare($idprueba_gases)
    {
        $consulta = <<<EOF
                 SELECT * FROM control c WHERE c.idprueba = $idprueba_gases  and c.estado = 1 
EOF;
        $rta = $this->db->query($consulta);
        return $rta;
    }

    public function ntc5365($idmaquina, $idprueba)
    {
        // $this->getTablas();
        $consulta = <<<EOF
            SELECT 
                IFNULL((SELECT c.numero_id FROM cda c LIMIT 1),0) AS 'nit',
                IFNULL((SELECT c.nombre_cda FROM cda c LIMIT 1),0) AS 'nombreCda',
                '' AS 'expedienteCornare',
                p.idprueba AS 'numeroConsecutivoPrueba',
                IFNULL((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND ct.estado = 1 ORDER BY 1 DESC LIMIT 1),0) AS 'numeroCertificado', 
                IF(v.registroRunt=1,
                      (SELECT m.nombre FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                      (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'marca',
                      IF(v.registroRunt=1,
                                   (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                                   (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                v.ano_modelo AS 'annoModelo',
                v.numero_placa AS 'placa',
                v.cilindraje AS 'cilindraje',
                if(v.tiempos = 2, '2T','4T') AS 'tipoMotor',
                if(v.scooter = 1, 'SCOOTER', if(v.idclase = 14, 'MOTOCARRO','CONVENCIONAL')) AS 'disenno',
                DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'fechaPrueba',
                IFNULL ((SELECT CONCAT(u.nombres, ' ', u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1), 0 )AS 'nombreInspector',
                IFNULL((select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado = 'temp_ambiente' OR idconfig_prueba = 200) order by 1 desc limit 1),0) AS 'temperaturaAmbiente',
                (select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201) order by 1 desc limit 1) AS 'humedadRelativa',
                IFNULL((SELECT ci.nombre FROM clientes cl, ciudades ci WHERE v.idcliente = cl.idcliente AND cl.cod_ciudad = ci.cod_ciudad LIMIT 1),0) AS 'ciudad',
                IFNULL((SELECT cl.direccion FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),0) AS 'direccion',
                if(v.scooter=0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),0),'0') AS 'temperaturaMotor',
                v.cilindros AS 'numeroCilindros',
                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),0) 'rpmRalenti',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),0) 'hcRalenti',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),0) 'coRalenti',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),0) 'co2Ralenti',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),0) 'o2Ralenti',
                IF(EXISTS(SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='observaciones' AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'Si','No') AS 'presenciaDilucion',
                if(p.estado=2,'Aprobado',if((p.estado=1 or p.estado=3),'Rechazado','Abortado')) AS 'conceptoFinal',
                if(p.estado = 1 OR p.estado = 3 OR p.estado = 5,
                        concat(
                          ifnull((SELECT 'Fallas del equipo de medicion' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Falla subita del fluido electrico' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Bloqueo forzado del equipo' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Ejecucion incorrecta de la prueba' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Existencia de fugas en el tubo, uniones del múltiple y silenciador del sistema de escape del vehículo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=328 OR valor=378 OR valor= '4.1.1.1.1')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Salidas adicionales en el sistema de escape diferentes a las de diseño original del vehículo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=329 OR valor = '4.1.1.1.2')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Ausencia de tapones de aceite o fugas en el mismo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=330 OR valor = '4.1.1.1.3')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Presencia tapa llenado combustible' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=331 OR valor = '4.1.1.1.4')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Revoluciones fuera de rango.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=332 OR valor = '4.1.1.1.5')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Salidas adicionales a las del diseño.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=369 OR valor = '4.1.1.1.6')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Presencia de humo negro o azul (solo para motores 4T).' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=333 OR valor = '4.1.1.1.7')  order by 1 desc limit 1),''),
                           if(v.tiempos = 2,
                              CONCAT (
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='co_ralenti'  AND CAST(valor AS FLOAT) >=  CAST('4.5' AS FLOAT) order by 1 desc limit 1),
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='hc_ralenti'  AND CAST(valor AS FLOAT) >=  CAST('10000' AS FLOAT) order by 1 desc limit 1),
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='co_ralenti'  AND CAST(valor AS FLOAT) >=  CAST('3.6' AS FLOAT) order by 1 desc limit 1),
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='hc_ralenti'  AND CAST(valor AS FLOAT) >=  CAST('1600' AS FLOAT) order by 1 desc limit 1),
										'')))
										)),''
                           ),
                           
                           if(v.tiempos = 4,
                              CONCAT (
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND tiporesultado='co_ralenti'  AND CAST(valor AS FLOAT) >= CAST('3.6' AS FLOAT) limit 1),
										ifnull((SELECT 'Concentraciones de gases y sustancias contaminantes mayores a las establecidas por la autoridad competente.' from resultados where idprueba=p.idprueba AND tiporesultado='hc_ralenti'  AND CAST(valor AS FLOAT) >= CAST('1600' AS FLOAT) limit 1),'')
										)),''
                           ) 
                        
                ),'') AS 'causalesRechazo',
                '' AS 'valorPef',
                '' AS 'marcaAnalizador',
                '' AS 'numeroSerieAnalizador',
                '' AS 'numeroSerieBanco',
                '' AS 'numeroSerieElectronico',
                '' AS 'nombreSoftwareAplicacion',
                '' AS 'versionSoftwareAplicacion',
                IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'spanHcBaja',
                IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'spanCoBaja',
                IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'spanCo2Baja',
                IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'valorLeidoHcBaja',   
                IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'valorLeidoCoBaja',
                IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'valorLeidoCo2Baja',
                IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'spanHcAlta',
                IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'spanCoAlta',
                IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'spanCo2Alta',
                IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'valorLeidoHcAlta',
                IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'valorLeidoCoAlta',
                IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'valorLeidoCo2Alta',
                IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),0) AS 'fechaVerificacion',
                'Aprobado' AS 'resultadoVerificacion'
                FROM vehiculos v, hojatrabajo h, pruebas p
                WHERE 
                v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas AND 
                (h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
                (p.estado<>0 and p.estado<>5 and p.estado<>9) AND
                p.idtipo_prueba = 3 AND
                p.idmaquina = $idmaquina AND 
                v.tipo_vehiculo=3 AND 
                p.idprueba = $idprueba      
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function ntc4983($idmaquina, $idprueba)
    {
        // $this->getTablas();
        $consulta = <<<EOF
            SELECT 
                IFNULL((SELECT c.numero_id FROM cda c LIMIT 1),'') AS 'nit',
                IFNULL((SELECT c.nombre_cda FROM cda c LIMIT 1),'') AS 'nombreCda',
                '' AS 'expedienteCornare',
                p.idprueba AS 'numeroConsecutivoPrueba',
                IFNULL((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND ct.estado = 1 ORDER BY 1 DESC LIMIT 1),'') AS 'numeroCertificado', 
                IF(v.registroRunt=1,
                      (SELECT m.nombre FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                      (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'marca',
                      IF(v.registroRunt=1,
                                   (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                                   (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                v.ano_modelo AS 'annoModelo',
                v.numero_placa AS 'placa',
                v.cilindraje AS 'cilindraje',
                IFNULL((SELECT cla.nombre FROM clase cla WHERE v.idclase = cla.idclase LIMIT 1), '') AS 'clase',
                iFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'servicio',
                IFNULL((SELECT tc.nombre FROM tipo_combustible tc WHERE v.idtipocombustible = tc.idtipocombustible LIMIT 1),'') AS 'combustible',
                DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'fechaPrueba',
                IFNULL ((SELECT CONCAT(u.nombres, ' ', u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1), '' )AS 'nombreInspector',
                IFNULL((select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado = 'temp_ambiente' OR idconfig_prueba = 200) order by 1 desc limit 1),'') AS 'temperaturaAmbiente',
                (select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201) order by 1 desc limit 1) AS 'humedadRelativa',
                IFNULL((SELECT ci.nombre FROM clientes cl, ciudades ci WHERE v.idcliente = cl.idcliente AND cl.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'ciudad',
                IFNULL((SELECT cl.direccion FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'direccion',
                if(v.scooter=0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),''),'0') AS 'temperaturaMotor',
                v.cilindros AS 'numeroCilindros',
                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_ralenti' ORDER BY 1 DESC LIMIT 1),'') 'rpmRalenti',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' ORDER BY 1 DESC LIMIT 1),'') 'hcRalenti',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' ORDER BY 1 DESC LIMIT 1),'') 'coRalenti',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_ralenti' ORDER BY 1 DESC LIMIT 1),'') 'co2Ralenti',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_ralenti' ORDER BY 1 DESC LIMIT 1),'') 'o2Ralenti',
                IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'') 'rpmCrucero',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'') 'hcCrucero',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'') 'coCrucero',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'') 'co2Crucero',
                IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'') 'o2Crucero',
                IF(EXISTS(SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='observaciones' AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'Si','No') AS 'presenciaDilucion',
                if(p.estado=2,'Aprobado',if((p.estado=1 or p.estado=3),'Rechazado','Abortado')) AS 'conceptoFinal',
                if(p.estado = 1 OR p.estado = 3 OR p.estado = 5,
                           concat(
                              ifnull((SELECT 'Fallas del equipo de medicion' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'') ,
                              ifnull((SELECT 'Falla subita del fluido electrico' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'') ,
                              ifnull((SELECT 'Bloqueo forzado del equipo' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),'') ,
                              ifnull((SELECT 'Ejecucion incorrecta de la prueba' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'') ,                        
                              ifnull((SELECT 'Existencia de fugas en el tubo, uniones del multiple y silenciador del sistema de escape del vehiculo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=328 OR valor= '3.1.1.1.1')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Existencia de fugas en el tubo, uniones del multiple y silenciador del sistema de escape del vehiculo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=378 OR valor = '3.1.1.1.1')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Salidas adicionales en el sistema de escape diferentes a las de diseño original del vehiculo.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=329 OR valor = '3.1.1.1.2')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Ausencia de tapones de aceite o fugas en el mismo. ' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=330 OR valor = '3.1.1.1.3')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Ausencia de tapas o tapones de combustible o fugas del mismo. ' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=331 OR valor = '3.1.1.1.4')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Sistema de admisión de aire en mal estado (filtro roto o deformado) o ausencia del filtro de aire. ' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=334 OR valor = '3.1.1.1.5')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Desconexion del sistema de recirculacion de gases provenientes del Cárter del Motor. (Por ejemplo válvulade ventilación positiva del Cárter).' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=337 OR valor = '3.1.1.1.6')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Instalacion de accesorios o deformaciones en el tubo de escape que no permitan la introducción de la sonda' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=335 OR valor = '3.1.1.1.7')  order by 1 desc limit 1),''),  
                              ifnull((SELECT 'Incorrecta operación del sistema de refrigeracion, cuya verificación se hará por medio de inspección' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=336 OR valor = '3.1.1.1.8')  order by 1 desc limit 1),''),                              
                              ifnull((SELECT 'Presencia de humo negro o azul.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),''),
                              ifnull((SELECT 'Revoluciones fuera de rango.' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10')  order by 1 desc limit 1),''),
                              ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1970 AND tiporesultado='hc_ralenti'  AND valor >= '800' AND v.idclase <> 14  order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1970 AND v.ano_modelo <= 1984) AND tiporesultado='co_ralenti'  AND valor >= '4.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1970 AND v.ano_modelo <= 1984) AND tiporesultado='hc_ralenti'  AND valor >= '650' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1984 AND v.ano_modelo <= 1997) AND tiporesultado='co_ralenti'  AND valor >= '3.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1984 AND v.ano_modelo <= 1997) AND tiporesultado='co_ralenti'  AND valor >= '3.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1984 AND v.ano_modelo <= 1997) AND tiporesultado='hc_ralenti'  AND valor >= '400' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo > 1997 AND tiporesultado='co_ralenti'  AND valor >= '1.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo > 1997 AND tiporesultado='hc_ralenti'  AND valor >= '200' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='co_ralenti'  AND valor >= '0.8' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='hc_ralenti'  AND valor >= '160' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1970 AND tiporesultado='co_crucero'  AND valor >= '5.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo <= 1970 AND tiporesultado='hc_crucero'  AND valor >= '800' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1970 AND v.ano_modelo <= 1984) AND tiporesultado='co_crucero'  AND valor >= '4.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1970 AND v.ano_modelo <= 1984) AND tiporesultado='hc_crucero'  AND valor >= '650' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1984 AND v.ano_modelo <= 1997) AND tiporesultado='co_crucero'  AND valor >= '3.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND (v.ano_modelo > 1984 AND v.ano_modelo <= 1997) AND tiporesultado='hc_crucero'  AND valor >= '400' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo > 1997 AND tiporesultado='co_crucero'  AND valor >= '1.0' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo > 1997 AND tiporesultado='hc_crucero'  AND valor >= '200' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='co_crucero'  AND valor >= '0.8' AND v.idclase <> 14 order by 1 desc limit 1),
										  ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba AND v.ano_modelo >= 2010  AND tiporesultado='hc_crucero'  AND valor >= '160' AND v.idclase <> 14 order by 1 desc limit 1),''))))))))))))))))))))                                                                                                        
                ),'') AS 'causalesRechazo',
                '' AS 'valorPef',
                '' AS 'marcaAnalizador',
                '' AS 'numeroSerieAnalizador',
                '' AS 'numeroSerieBanco',
                '' AS 'numeroSerieElectronico',
                '' AS 'nombreSoftwareAplicacion',
                '' AS 'versionSoftwareAplicacion',
                IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'spanHcBaja',
                IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'spanCoBaja',
                IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'spanCo2Baja',
                IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'valorLeidoHcBaja',   
                IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'valorLeidoCoBaja',
                IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'valorLeidoCo2Baja',
                IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'spanHcAlta',
                IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'spanCoAlta',
                IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'spanCo2Alta',
                IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'valorLeidoHcAlta',
                IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'valorLeidoCoAlta',
                IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'valorLeidoCo2Alta',
                IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'') AS 'fechaVerificacion',
                'Aprobado' AS 'resultadoVerificacion'
                FROM vehiculos v, hojatrabajo h, pruebas p
                WHERE 
                v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas AND 
                (h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
                (p.estado<>0 and p.estado<>5 and p.estado<>9) AND
                p.idtipo_prueba = 3 AND
                p.idmaquina = $idmaquina AND 
                p.idprueba = $idprueba       
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function ntc4231($idmaquina, $idprueba)
    {
        //$this->getTablas();
        $consulta = <<<EOF
             SELECT 
                    IFNULL((SELECT c.numero_id FROM cda c LIMIT 1),'') AS 'nit',
                    IFNULL((SELECT c.nombre_cda FROM cda c LIMIT 1),'') AS 'nombreCda',
                    '' AS 'expedienteCornare',
                    p.idprueba AS 'consecutivoPrueba',
                    IFNULL((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND ct.estado = 1 ORDER BY 1 DESC LIMIT 1),'') AS 'numeroCertificado', 
                    IF(v.registroRunt=1,
                          (SELECT m.nombre FROM  linearunt l,marcarunt m WHERE l.idmarcarunt=m.idmarcarunt AND l.idlinearunt=v.idlinea),
                          (SELECT m.nombre FROM linea l,marca m WHERE l.idmarca=m.idmarca AND l.idlinea=v.idlinea)) 'marca',
                    IF(v.registroRunt=1,
                                   (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                                   (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                    v.ano_modelo AS 'annoModelo',
                    v.numero_placa AS 'placa',
                    v.cilindraje AS 'cilindraje',
                    IFNULL((SELECT cla.nombre FROM clase cla WHERE v.idclase = cla.idclase LIMIT 1), '') AS 'clase',
                    iFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'servicio',
                    'NO' AS 'modificacionesMotor',
                    DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'fechaPrueba',
                    IFNULL ((SELECT CONCAT(u.nombres, ' ', u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1), '' )AS 'nombreInspector',
                    IFNULL((select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado = 'temp_ambiente' OR idconfig_prueba = 200) order by 1 desc limit 1),'') AS 'temperaturaAmbiente',
                    (select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201) order by 1 desc limit 1) AS 'humedadRelativa',
                    IFNULL((SELECT ci.nombre FROM clientes cl, ciudades ci WHERE v.idcliente = cl.idcliente AND cl.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'ciudad',
                    IFNULL((SELECT cl.direccion FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'direccion',
                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=41 ORDER BY 1 DESC LIMIT 1),'') AS 'rpmGobernadaMedia',
                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=224 ORDER BY 1 DESC LIMIT 1),'') AS 'temperaturaInicialMotor',
                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=38 ORDER BY 1 DESC LIMIT 1),'') AS 'rpmRalenti',
                    if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                       ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),''),
                       ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'')
                    ) AS 'resultadoCicloPreliminar',                           
                    ifnull((select valor from resultados where idprueba=p.idprueba and (idconfig_prueba=62 or idconfig_prueba=41) order by 1 desc limit 1),'') AS 'rpmGobernadaCicloPreliminar',
                    if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                       ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),''),
                       ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'')
                    ) AS 'resultadoPrimerCiclo',                           
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'') AS 'rpmGobernadaPrimerCiclo',
                    if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                       ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),''),
                       ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'')
                    ) AS 'resultadoSegundoCiclo',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'') AS 'rpmGobernadaSegundoCiclo',
                    if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                       ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),''),
                       ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'')
                    ) AS 'resultadoTercerCiclo',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'') AS 'rpmGobernadaTercerCiclo',                            
                    CONCAT((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),',',(SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),',',(SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1)) AS 'diferenciasAritmeticas',
                    if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                       ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),''),
                       ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'')
                    ) AS 'resultadoDensidadFinal',
                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=39 ORDER BY 1 DESC LIMIT 1),'') AS 'temperaturaFinalMotor',
                    if(p.estado=2,'Aprobado',if((p.estado=1 or p.estado=3),'Rechazado','Abortado')) AS 'conceptoFinal',
                    if(p.estado = 1 OR p.estado = 3 OR p.estado = 5,
                        concat(
                           ifnull((SELECT 'Fallas del equipo de medición' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Falla súbita del fluido eléctrico' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Bloqueo forzado del equipo' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Ejecución incorrecta de la prueba' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),''),                        
                           IFNULL((SELECT 'falla de desviacion cero' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Existencia de fugas en el tubo, uniones del múltiple y silenciador del sistema de escape del vehículo.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=348 OR valor=349 OR  valor= '2.1.1.1.1')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Salidas adicionales en el sistema de escape diferentes a las de diseño original del vehículo.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=353 OR valor = '2.1.1.1.2')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Ausencia de tapones de aceite o fugas en el mismo.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Ausencia de tapones de combustible o fugas en el mismo' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Instalación de accesorios o deformaciones en el tubo de escape que no permitan la introducción del acople.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=352 OR valor = '2.1.1.1.5') order by 1 desc limit 1),''),
                           ifnull((SELECT 'Incorrecta operación del sistema de refrigeración, cuya verificación se hará por medio de inspección. NOTA 1 esta inspección puede consistir en verificación fugas, verificación del estado del ventilador del sistema, vibraciones o posibles contactos por deflexión de los alabes del ventilador a altas revoluciones o elementos con sujeción inadecuada, entre otros.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=355 OR valor = '2.1.1.1.6') order by 1 desc limit 1),''), 
                           ifnull((SELECT 'Ausencia o incorrecta instalación del filtro de aire.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=354 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),''),
                           ifnull((SELECT ' Activación de dispositivos instalados en el Motor o en el vehículo que alteren las características normales de velocidad de giro y que tengan como efecto la modificación de los resultados de la prueba de opacidad o que impidan su ejecución adecuada. Si no pueden ser desactivados antes de la siguiente prueba, el vehículo es rechazado por operación inadecuada.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=379 OR valor = '2.1.1.1.8')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Durante la medición no se alcanza la velocidad gobernada antes de 5 segundos' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=358 OR valor  = '2.1.1.1.9')  order by 1 desc limit 1),''),
                           ifnull((SELECT 'Indicación de mal funcionamiento del motor.' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=405 or valor=505 or valor = '2.1.1.1.10') and observacion='INDICACION DEL MAL FUNCIONAMIENTO DEL MOTOR'  order by 1 desc limit 1),''),                           
                           IFNULL((SELECT 'Incumplimiento de niveles máximos permitidos por la autoridad competente. ' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=126 OR valor = '2.1.1.1.11') order by 1 desc limit 1),''),
                           IFNULL((SELECT 'La diferencia aritmética entre el valor mayor y menor de opacidad de las tres (3) aceleraciones, especificadosen el numeral 3.2.4. (NTC4231)' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=340 OR valor = '2.1.1.1.12') order by 1 desc limit 1),''),
                           ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo <= 2000 AND v.cilindraje < 5000 AND valor >= '6' order by 1 desc limit 1),
							ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND (v.ano_modelo >= 2001 AND v.ano_modelo <= 2015) AND v.cilindraje < 5000 AND valor >= '5.0' order by 1 desc limit 1),
							ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo <= 2000 AND v.cilindraje >= 5000 AND valor >= '5.5' order by 1 desc limit 1),
							ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND (v.ano_modelo >= 2001 AND v.ano_modelo <= 2015) AND v.cilindraje >= 5000 AND valor >= '4.5' order by 1 desc limit 1),
							ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo >= 2016  AND v.cilindraje <= 5000 AND valor >= '4.0' order by 1 desc limit 1),
							ifnull((SELECT 'Los vehículos cuyas emisiones de gases de escape tengan concentración de gases y sustancias contaminantes mayores a las establecidas por los requisitos legales ambientales definidas por las autoridades competentes' from resultados where idprueba=p.idprueba and idconfig_prueba=505 AND v.ano_modelo >= 2016  AND v.cilindraje >= 5000 AND valor >= '3.5' order by 1 desc limit 1),''))))))
                        ),'') AS 'causalesRechazo',
                    '' AS 'observaciones',
                    '430' AS 'ltoe',
                    '' AS 'marcaOpacimetro',
                    '' AS 'numeroSerieOpacimetro',
                    '' AS 'numeroSerieElectronicoOpacimetro',
                    '' AS 'nombreSoftwareAplicacion',
                    '' AS 'versionSoftwareAplicacion',
                    IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'') AS 'valorReferenciaFiltro1',
                    IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'') AS 'valorLeidoFiltro1',
                    IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'') AS 'valorReferenciaFiltro2',
                    IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'') AS 'valorLeidoFiltro2',
                    'Aprobado' AS 'resultadoVerificacionLinealidad',
                    IFNULL((SELECT DATE_FORMAT(c.fecha, '%Y/%m/%d') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY 1 DESC limit 1),'') AS 'fechaVerificacion'
                    FROM vehiculos v, hojatrabajo h, pruebas p
                    WHERE 
                    v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas AND 
                    p.estado<>0 AND
                    p.idtipo_prueba = 2 AND
                    p.idmaquina = $idmaquina AND  
                    p.idprueba = $idprueba
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function insertControl($idprueba, $idusuario)
    {
        $data['idprueba'] = $idprueba;
        $data['tipo'] = 'Envio informe cornare';
        $data['estado'] = '1';
        $data['usuario'] = $idusuario;
        $this->db->insert('control', $data);
    }


    public function informe_cesar_motos($where, $idconf_maquina, $fechainicial, $fechafinal, $datoInforme, $motocarro)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Baja ppm',
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Baja %',
                        IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Baja %',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Baja ppm',   
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Baja %',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  CO2 Baja %',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Alta ppm',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Alta %',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Alta %',
                        IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Alta ppm',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Alta %',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO2 Alta %',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha de Verificación AAAA/MM/DD',
                        'Aprobado' AS 'Resultado de Verificación',";
        } else {
            $pef = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'PEF' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo HC ppm',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO %',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO2 %',
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo HC',
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO',
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO2',
            
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO2',
            IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Fecha verificacion',
                        'Aprobado' AS 'Resultado verificacion',";
        }

        if ($motocarro == 1) {
            $motocar = 'v.idclase = 14 and ';
        } else {
            $motocar = '';
        }
        $query = $this->db->query("SELECT DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha inicio prueba AAAA/MM/DD Hora inicio prueba HH:MM:SS',
        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha fin prueba AAAA/MM/DD Hora fin prueba HH:MM:SS',
        IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Municipio de Inspección',
        IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Lugar de la prueba: Dirección CDA / Ubicación de la unidad móvil',
        '' AS 'Lugar de la prueba:  Ubicación de la unidad móvil (Coordenadas GMS)',
        IFNULL((SELECT c.idconsecutivotc FROM consecutivotc c WHERE c.idconsecutivotc = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'Numero inspección FUR',
        IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero del certificado emitido',
        '' AS 'Nombre_delsoftware_de_aplicacion',
        '' AS 'Version_software_operacion',
        IFNULL((SELECT u.identificacion FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'ID Inspector',
        v.numero_placa AS 'Placa',
        if(v.registroRunt=1,
              (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
              (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
        v.ano_modelo AS 'Año modelo',
        v.cilindraje AS 'Cilindraje',
        IF(v.registroRunt=1,
              (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
              (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
        IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
        IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
        CONCAT(v.tiempos, 'T') AS 'Tipo de motor',
        v.numero_exostos AS 'N° Tubos escape',
        if(v.scooter = '1','Scooter','Convencional') AS 'Diseño',
        (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente °C',
        (select valor from resultados where idprueba=p.idprueba and (tiporesultado='humedad' or idconfig_prueba =201)  order by 1 desc limit 1) AS 'Humedad Relativa %',
        IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), 'Metodo aceite',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'Metodo Bloque',if(v.scooter =1,'Scooter', if(v.convertidor =1,'Convertidor','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'Metodo bloque') AS 'Método medición T°',
        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'RPM Ralentí',
        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC Ralentí ppm',
        ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO Ralentí %',
        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2 Ralentí %',
        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 Ralentí %',
        if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto Final',
        DATE_FORMAT(p.fechafinal, '%d/%m/%Y %h:%m:%s') AS 'Fecha Verificacion Instrumento– Hora Inicio de la prueba en formato (DD/MM/AAAA HH:MM:SS)',
        '' AS 'Marca_analizador',
        '' AS 'Pef',
        '' AS 'No_serie_analizador',
        $cal
        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia de Humo (Negro / Azul)',
                        IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Dilución en la Mezcla (SI/NO)',
                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera de rango',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapón aceite',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapon combustible',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=334 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Admisión Mal estado - Filtro aire (si/no)',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=337  order by 1 desc limit 1),'NO') AS 'Desconexión Recirculación (SI/NO)',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=335 or valor = '3.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Accesorios tubo (SI/NO)',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=336 or valor = '3.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'Operacion incorrecta refrigeración',
                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Emisiones',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'incorrecta operación gobernador',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta',
                        IFNULL((SELECT 'SI' from resultados WHERE idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencia aritmetica',
                        'NO' AS 'Diferencia de Temperatura',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapón aceite_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapon combustible_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Instalación accesorios tubo_',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=336 or valor = '3.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'Operacion incorrecta refrigeración_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o Incorrecta Instalación Filtro Aire_',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=379  order by 1 desc limit 1),'NO') AS 'Activacion dispositivos_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'Rpm fuera rango_',                                
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro-azul)_',
    
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Fugas tubo (Si/No)', 
                           
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI/NO)',
    
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'NO') AS 'Fallas del equipo de medicion',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita del fluido electrico',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo' ORDER by 1 desc limit 1),'NO') AS 'Bloqueo forzado del equipo',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta de la prueba',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'NO') AS 'Falla de desviacion cero',
    
                        (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Ruido motor',
                        '762 de 2022' AS 'Norma aplicada'
                        from
                       vehiculos v, hojatrabajo h,pruebas p
                        where
                       v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 3 and 
                        p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND $where and $motocar
                        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')
                        ");

        if ($query->num_rows() > 0) {
            $rta = $query->result();
            return $rta;
        } else {
            return [];
        }
        //return $query;
    }

    //     public function informe_cesar_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    //     {
    //         if ($datoInforme == "1") {
    //             $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Baja ppm',
    //                         IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Baja',
    //                         IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Baja',
    //                         IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Baja ppm',   
    //                         IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Baja',
    // 			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO2 Baja',
    //                         IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Alta ppm',
    //                         IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Alta',
    //                         IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Alta',
    //                         IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Alta ppm',
    // 			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Alta',
    //                         IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO2 Alta',
    //                         IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha verificacion',
    //                         ";
    //         } else {

    //             $cal = "(select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'SPAN HC Baja ppm',
    //                         (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'SPAN CO Baja',
    //                         (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'SPAN CO2 Baja',
    //                         (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Valor leído HC Baja ppm',
    //                         (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leído CO Baja',
    //                         (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leído CO2 Baja',
    //                         (select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'SPAN HC Alta ppm',
    //                         (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'SPAN CO Alta',
    //                         (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'SPAN CO2 Alta',
    //                         (select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leído HC Alta ppm',
    //                         (select parametro from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leído CO Alta',
    //                         (select parametro from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leído CO2 Alta',
    //                         (select DATE_FORMAT(parametro, '%Y/%m/%d' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha verificacion',";
    //         }
    //         $consulta = <<<EOF
    //                   SELECT
    //                         IFNULL((SELECT cd.nombre_cda FROM cda cd LIMIT 1),'') AS 'Nombre o razon social',
    //                         IFNULL((SELECT cd.tipo_identificacion FROM cda cd LIMIT 1),'') AS 'Tipo de documento',
    //                         IFNULL((SELECT cd.numero_id FROM cda cd LIMIT 1),'') AS 'Numero de identificacion',
    //                         IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto',
    //                         IFNULL((SELECT se.email FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'Correo electronico',
    //                         IFNULL((SELECT se.telefono_uno FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'Telefono de contacto',

    //                         IFNULL((SELECT de.nombre FROM cda cd, sede se, ciudades ci, deptos de WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad AND ci.cod_depto = de.cod_depto LIMIT 1),'') AS 'Municipio/Departamento',

    //                         IFNULL((SELECT cd.numero_resolucion FROM cda cd LIMIT 1),'') AS 'N° Resolucion Certificacion',
    //                         IFNULL((SELECT DATE_FORMAT(cd.fecha_resolucion, '%Y/%m/%d') FROM cda cd LIMIT 1),'') AS 'Fecha Resolucion (dd/mm/aaaa)',
    //                         '' AS 'Numero y fecha de modificacion de certificacion',
    //                         IFNULL((SELECT se.clase FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'Clase del CDA',
    //                         '' AS 'Numero_expe',
    //                         '' AS 'Numero_total_opacimetros',
    //                         '' AS 'Numero_total_analizadores',
    //                         '' AS 'Numero_total_analizadores_2t',
    //                         '' AS 'Numero_total_analizadores_4t',
    //                         DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha inicio prueba AAAA/MM/DD',
    //                         DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha fin prueba AAAA/MM/DD',
    //                         IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Municipio de inspeccion',
    //                         IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Lugar de la prueba:  Ubicacion de la unidad movil (Coordenadas GMS)',
    //                         '' AS 'Ubicacion de la unidad movil (Coordenadas GMS)',
    //                         IFNULL((SELECT c.idconsecutivotc FROM consecutivotc c WHERE c.idconsecutivotc = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'Numero Inspeccion / FUR',
    //                         IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado emitido',
    //                         '' AS 'Nombre_delsoftware_de_aplicacion',
    //                         '' AS 'Version_software_operacion',
    //                         IFNULL((SELECT u.identificacion FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'ID Inspector',
    //                         v.numero_placa AS 'Placa',
    //                         if(v.registroRunt=1,
    //                               (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
    //                               (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
    //                         v.ano_modelo AS 'Ano modelo',
    //                         v.cilindraje AS 'Cilindraje',
    //                          IF(v.registroRunt=1,
    //                               (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
    //                               (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
    //                         IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
    //                         IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
    //                         CONCAT(v.tiempos, 'T') AS 'Tipo de motor',
    //                         v.numero_exostos AS 'Numero de tubos de escape',
    //                         if(v.scooter = '1','Scooter','Convencional') AS 'Diseno',
    //                         (select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_ambiente' order by 1 desc limit 1) AS 'Temperatura ambiente',
    //                         (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa',
    //                         IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), 'Metodo aceite',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'Metodo Bloque',if(v.scooter =1,'Scooter', if(v.convertidor =1,'Convertidor','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'Metodo bloque') AS 'Metodo de  medicion temperatura',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'Rpm_ralenti',
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'Hc ralenti',
    //                         ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'Co ralenti',
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'Co2 ralenti',
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 ralenti',
    //                         if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto final',
    //                         DATE_FORMAT(p.fechafinal,'%Y-%m-%d') as 'Fecha Verificacion Instrumento',
    //                         '' AS 'Marca_analizador',
    //                         '' AS 'Pef',
    //                         '' AS 'No_serie_analizador',
    //                         $cal
    //                         'Aprobado' AS 'Resultado verificacion',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),'NO') AS 'PresenciaHumo negro o azul',
    //                         IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Dilucion en la mezcla (SI/NO)',
    //                         if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera rango',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Auscencia tapones combustible o fuga (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Admisión Mal estado - Filtro aire (si/no)',
    //                         'NO' AS 'Desconexión Recirculación (Si/No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Accesorios tubo (Si/No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Operación Incorrecta Refrigeración (Si/No)',
    //                         if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','--')) AS 'Emisiones',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'Incorrecta Operación Gobernador',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=357  order by 1 desc limit 1),'NO') AS 'Falla subita',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecución Incorrecta',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencia aritmetica',
    //                         'NO' AS 'Diferencia de Temperatura',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo(SI/NO)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales_',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Auscencia tapones combustible o fuga',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Instalación accesorios tubo (Si/No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Operación Incorrecta Refrigeración (Si-No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o Incorrecta Instalación Filtro Aire (Si-No)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=379  order by 1 desc limit 1),'NO') AS 'Activacion dispositivos (SI/NO)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'Rpm fuera rango',                                
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro-azul)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Fugas tubo (Si/No)',    
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI-NO)',                                                                
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'NO') AS 'Fallas del equipo de medicion',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita del fluido electrico',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo' ORDER by 1 desc limit 1),'NO') AS 'Bloqueo forzado del equipo',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta de la prueba',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'NO') AS 'Falla de desviacion cero',
    //                         (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Ruido motor',
    //                         '762 de 2022' AS 'Norma aplicada'
    //                         from
    //                        vehiculos v, hojatrabajo h,pruebas p
    //                         where
    //                        v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 3 and 
    //                         p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9)  and
    //                         DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')          
    // EOF;
    //         $rta = $this->db->query($consulta);
    //         if ($rta->num_rows() > 0) {
    //             $rta = $rta->result();
    //             return $rta;
    //         } else {
    //             return [];
    //         }
    //     }

    public function informe_cesar_gasolina($where, $idconf_maquina, $fechainicial, $fechafinal, $datoInforme, $motocarro)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Baja ppm',
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Baja %',
                        IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Baja %',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Baja ppm',   
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Baja %',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  CO2 Baja %',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Alta ppm',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Alta %',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Alta %',
                        IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Alta ppm',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Alta %',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO2 Alta %',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha de Verificación AAAA/MM/DD',
                        'Aprobado' AS 'Resultado de Verificación',
                        'Aprobado' as 'Resultado verificación Repetitibilidad',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha verificación repetibilidad (DD/MM/AAAA HH:MM:SS)',";
        } else {
            $pef = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'PEF' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo HC ppm',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO %',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO2 %',
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo HC',
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO',
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO2',
            
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO2',
            IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Fecha verificacion',
                        'Aprobado' AS 'Resultado verificacion',
                        'Aprobado' AS 'Resultado verificación Repetitibilidad',
                        IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Fecha verificación repetibilidad
            (DD/MM/AAAA HH:MM:SS)',";
        }

        if ($motocarro == 1) {
            $motocar = 'v.idclase = 14 and ';
        } else {
            $motocar = '';
        }

        $consulta = <<<EOF
                SELECT 
                    DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha inicio prueba AAAA/MM/DD Hora inicio prueba HH:MM:SS',
                    DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha fin prueba AAAA/MM/DD Hora fin prueba HH:MM:SS',
                    IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Municipio de Inspección',
                    IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Lugar de la prueba: Dirección CDA / Ubicación de la unidad móvil',
                    '' AS 'Lugar de la prueba:  Ubicación de la unidad móvil (Coordenadas GMS)',
                    IFNULL((SELECT c.idconsecutivotc FROM consecutivotc c WHERE c.idconsecutivotc = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'Numero inspección FUR',
                    IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero del certificado emitido',
                    '' AS 'Nombre_delsoftware_de_aplicacion',
                    '' AS 'Version_software_operacion',
                    IFNULL((SELECT CONCAT(u.nombres, ' ', u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'Nombre Inspector que realiza la Prueba',
                    IFNULL((SELECT u.identificacion FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'ID Inspector',
                    v.numero_placa AS 'Placa',
                    if(v.registroRunt=1,
                        (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                        (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                    v.ano_modelo AS 'Año modelo',
                    v.cilindraje AS 'Cilindraje',
                    IF(v.registroRunt=1,
                        (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                        (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                    IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
                    IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
                    IFNULL((SELECT tc.nombre FROM tipo_combustible tc WHERE v.idtipocombustible = tc.idtipocombustible LIMIT 1),'') AS 'Tipo de combustible',
                    CONCAT(v.tiempos, 'T') AS 'Tipo de motor',
                    v.numero_exostos AS 'N° Tubos escape',
                    '' AS 'Modificaciones al motor (potenciado)',
                    
                    (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente °C',
                    (select valor from resultados where idprueba=p.idprueba and (tiporesultado='humedad' or idconfig_prueba =201)  order by 1 desc limit 1) AS 'Humedad Relativa %',
                    IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), 'Metodo aceite',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'Metodo Bloque',if(v.scooter =1,'Scooter', if(v.convertidor =1,'Convertidor','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'Metodo bloque') AS 'Método medición T°',
                    if(v.convertidor=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura de motor (°C)',
                    ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'RPM Ralentí',
                    IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'RPM Crucero',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC Ralentí ppm',
                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'HC (ppm) Crucero',
                    ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO Ralentí %',
                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'CO (%)Crucero',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2 Ralentí %',
                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'CO2 (%)Crucero',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 Ralentí %',
                    IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') AS 'O2 Crucero',
                    if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto Final',
                    DATE_FORMAT(p.fechafinal, '%d/%m/%Y %h:%m:%s') AS 'Fecha Verificacion Instrumento– Hora Inicio de la prueba en formato (DD/MM/AAAA HH:MM:SS)',
                    '' AS 'Marca_analizador',
                    '' AS 'Pef',
                    '' AS 'No_serie_analizador',
                    $cal
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia de Humo (Negro / Azul)',
                    IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Dilución en la Mezcla (SI/NO)',
                    if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera de rango',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapón aceite',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapon combustible',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=334 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Admisión Mal estado - Filtro aire (si/no)',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=337  order by 1 desc limit 1),'NO') AS 'Desconexión Recirculación (SI/NO)',
                    IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=335 or valor = '3.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Accesorios tubo (SI/NO)',
                    IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=336 or valor = '3.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'Operacion incorrecta refrigeración',
                    if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Emisiones',
                    IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'incorrecta operación gobernador',
                    IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita',
                    IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta',
                    IFNULL((SELECT 'SI' from resultados WHERE idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencia aritmetica',
                    'NO' AS 'Diferencia de Temperatura',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo_',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales_',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapón aceite_',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapon combustible_',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Instalación accesorios tubo_',
                    IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=336 or valor = '3.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'Operacion incorrecta refrigeración_',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o Incorrecta Instalación Filtro Aire_',
                    IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=379  order by 1 desc limit 1),'NO') AS 'Activacion dispositivos_',
                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'Rpm fuera rango_',                                
                    IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro-azul)_',

                    ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Fugas tubo (Si/No)', 
                       
                    IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI/NO)',

                    IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'NO') AS 'Fallas del equipo de medicion',
                    IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita del fluido electrico',
                    IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo' ORDER by 1 desc limit 1),'NO') AS 'Bloqueo forzado del equipo',
                    IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta de la prueba',
                    IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'NO') AS 'Falla de desviacion cero',

                    (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Ruido motor',
                    '762 de 2022' AS 'Norma aplicada'
                        from
                    vehiculos v, hojatrabajo h,pruebas p
                        where
                    v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 3 and 
                        p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND $where and $motocar
                        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')          
EOF;

        // echo $consulta;



        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    //     public function informe_cesar_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    //     {
    //         if ($datoInforme == "1") {
    //             $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Baja ppm',
    //                         IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Baja',
    //                         IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Baja',
    //                         IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Baja ppm',   
    //                         IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Baja',
    // 			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO2 Baja',
    //                         IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Alta ppm',
    //                         IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Alta',
    //                         IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Alta',
    //                         IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Alta ppm',
    // 			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Alta',
    //                         IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO2 Alta',
    //                         IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha verificacion',
    //                         ";
    //         } else {

    //             $cal = "(select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'SPAN HC Baja ppm',
    //                         (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'SPAN CO Baja',
    //                         (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'SPAN CO2 Baja',
    //                         (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Valor leído HC Baja ppm',
    //                         (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leído CO Baja',
    //                         (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leído CO2 Baja',
    //                         (select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'SPAN HC Alta ppm',
    //                         (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'SPAN CO Alta',
    //                         (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'SPAN CO2 Alta',
    //                         (select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leído HC Alta ppm',
    //                         (select parametro from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leído CO Alta',
    //                         (select parametro from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leído CO2 Alta',
    //                         (select DATE_FORMAT(parametro, '%Y/%m/%d' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha verificacion',";
    //         }
    //         $consulta = <<<EOF
    //               SELECT
    //                         IFNULL((SELECT cd.nombre_cda FROM cda cd LIMIT 1),'') AS 'Nombre o razon social',
    //                         IFNULL((SELECT cd.tipo_identificacion FROM cda cd LIMIT 1),'') AS 'Tipo de documento',
    //                         IFNULL((SELECT cd.numero_id FROM cda cd LIMIT 1),'') AS 'Numero de identificacion',
    //                         IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto',
    //                         IFNULL((SELECT se.email FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'Correo electronico',
    //                         IFNULL((SELECT se.telefono_uno FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'Telefono de contacto',
    //                         IFNULL((SELECT de.nombre FROM cda cd, sede se, ciudades ci, deptos de WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad AND ci.cod_depto = de.cod_depto LIMIT 1),'') AS 'Municipio/Departamento',
    //                         IFNULL((SELECT cd.numero_resolucion FROM cda cd LIMIT 1),'') AS 'N° Resolucion Certificacion',
    //                         IFNULL((SELECT DATE_FORMAT(cd.fecha_resolucion, '%Y/%m/%d') FROM cda cd LIMIT 1),'') AS 'Fecha Resolucion (dd/mm/aaaa)',
    //                         '' AS 'Numero y fecha de modificacion de certificacion',
    //                         IFNULL((SELECT se.clase FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'Clase del CDA',
    //                         '' AS 'Numero_expe',
    //                         '' AS 'Numero_total_opacimetros',
    //                         '' AS 'Numero_total_analizadores',
    //                         '' AS 'Numero_total_analizadores_2t',
    //                         '' AS 'Numero_total_analizadores_4t',
    //                         DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha inicio prueba AAAA/MM/DD',
    //                         DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha fin prueba AAAA/MM/DD',
    //                         IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Municipio de inspeccion',
    //                         IFNULL((SELECT se.direccion FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Lugar de la prueba: Dirección CDA',
    //                         '' AS 'Ubicacion de la unidad movil (Coordenadas GMS)',
    //                         IFNULL((SELECT c.idconsecutivotc FROM consecutivotc c WHERE c.idconsecutivotc = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'Numero Inspeccion / FUR',
    //                         IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado emitido',
    //                         '' AS 'Nombre_delsoftware_de_aplicacion',
    //                         '' AS 'Version_software_operacion',
    //                         IFNULL((SELECT CONCAT(u.nombres,' ',u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'Nombre Inspector que realiza la Prueba',
    //                         IFNULL((SELECT u.identificacion FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'ID Inspector',
    //                         v.numero_placa AS 'Placa',
    //                         if(v.registroRunt=1,
    //                               (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
    //                               (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
    //                         v.ano_modelo AS 'Ano modelo',
    //                         v.cilindraje AS 'Cilindraje',
    //                          IF(v.registroRunt=1,
    //                               (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
    //                               (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
    //                         IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
    //                         IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
    //                         IFNULL((SELECT tc.nombre FROM tipo_combustible tc WHERE v.idtipocombustible = tc.idtipocombustible LIMIT 1),'') AS 'Tipo de combustible',
    //                         CONCAT(v.tiempos,'T') AS 'Tipo de motor',
    //                         v.numero_exostos AS 'Numero de tubos de escape',
    //                         'No' AS 'Modificaciones al motor',
    //                         (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente',
    //                         (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa',
    //                         IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), 'Metodo aceite',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'Metodo Bloque',if(v.scooter =1,'Scooter', if(v.convertidor =1,'Convertidor','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'Metodo bloque') AS 'Metodo de  medicion temperatura',
    //                         IF(v.convertidor = 0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'') 'Temperatura motor',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'Rpm ralenti',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_crucero' order by 1 desc limit 1),'---') AS 'Rpm crucero o gobernada',                        
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'Hc ralenti',
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_crucero' order by 1 desc limit 1),'---') AS 'Hc crucero',                        
    //                         ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'Co ralenti',
    //                         ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_crucero' order by 1 desc limit 1),'---') AS 'Co crucero',                        
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'Co2 ralenti',
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_crucero' order by 1 desc limit 1),'---') AS 'Co2 crucero',                        
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 ralenti',
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_crucero' order by 1 desc limit 1),'---') AS 'O2 crucero',                        
    //                         if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto final',
    //                         DATE_FORMAT(p.fechafinal,'%Y-%m-%d') as 'Fecha Verificacion Instrumento',
    //                         '' AS 'Marca_analizador',
    //                         '' AS 'Pef',
    //                         '' AS 'No_serie_analizador',
    //                         $cal
    //                         'Aprobado' AS 'Resultado verificacion',
    //                         '' AS 'Resultado verificacion Repetitibilidad',
    //                         '' AS 'Fecha verificacion repetibilidad',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),'NO') AS 'PresenciaHumo negro o azul',
    //                         IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Dilucion en la mezcla (SI/NO)',
    //                         if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera rango',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Auscencia tapones combustible o fuga (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Admisión Mal estado - Filtro aire (si/no)',
    //                         'NO' AS 'Desconexión Recirculación (Si/No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Accesorios tubo (Si/No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Operación Incorrecta Refrigeración (Si/No)',
    //                         if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','--')) AS 'Emisiones',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'Incorrecta Operación Gobernador',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=357  order by 1 desc limit 1),'NO') AS 'Falla subita',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecución Incorrecta',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencia aritmetica',
    //                         'NO' AS 'Diferencia de Temperatura',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo(SI/NO)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales_',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Auscencia tapones combustible o fuga',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Instalación accesorios tubo (Si/No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Operación Incorrecta Refrigeración (Si-No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o Incorrecta Instalación Filtro Aire (Si-No)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=379  order by 1 desc limit 1),'NO') AS 'Activacion dispositivos (SI/NO)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'Rpm fuera rango',                                
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro-azul)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Fugas tubo (Si/No)',    
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI-NO)',                                                                
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'NO') AS 'Fallas del equipo de medicion',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita del fluido electrico',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo' ORDER by 1 desc limit 1),'NO') AS 'Bloqueo forzado del equipo',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta de la prueba',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'NO') AS 'Falla de desviacion cero',
    //                         (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Ruido motor',
    //                         '762 de 2022' AS 'Norma aplicada'
    //                         from
    //                        vehiculos v, hojatrabajo h,pruebas p
    //                         where
    //                        v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 3 and 
    //                         p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9)  and
    //                         DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')              
    // EOF;
    //         $rta = $this->db->query($consulta);
    //         if ($rta->num_rows() > 0) {
    //             $rta = $rta->result();
    //             return $rta;
    //         } else {
    //             return [];
    //         }
    //     }

    public function informe_cesar_disel($where, $idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $opa = "IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor referencia  filtro 1 %',
                        IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  filtro 1 %',
                        IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor referencia  filtro 2 %',
                        IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  filtro 2 %',
                        
                        IFNULL((SELECT DATE_FORMAT(c.fecha, '%Y/%m/%d') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Fecha de Verificación linealidad AAAA/MM/DD',
                        IFNULL((SELECT if(c.aprobado = 'S', 'Aprobado', 'Rechazado') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Resultado de Verificación Linealidad'";
        } else {
            $opa = "(select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia a filtro 1',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leido filtro 1',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia a filtro 2',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leido filtro 2',
                        (SELECT DATE_FORMAT(fechaguardado,'%Y/%m/%d')  from resultadosauditoria where observacion='Estado' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Fecha verificacion',                        
                        (select valor from resultadosauditoria where observacion='Estado' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado verificacion'
                        ";
        }

        $consulta = <<<EOF
        SELECT
                    DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha inicio prueba AAAA/MM/DD Hora inicio prueba HH:MM:SS',
                    DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha fin prueba AAAA/MM/DD Hora fin prueba HH:MM:SS',
                    IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Municipio de Inspección',
                    IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Lugar de la prueba: Dirección CDA / Ubicación de la unidad móvil',
                    '' AS 'Lugar de la prueba:  Ubicación de la unidad móvil (Coordenadas GMS)',
                    IFNULL((SELECT c.idconsecutivotc FROM consecutivotc c WHERE c.idconsecutivotc = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'Numero inspección FUR',
                    IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero del certificado emitido',
                    '' AS 'No_serie_opaciemtro',
                    '' AS 'Nombre_delsoftware_de_aplicacion',
                    '' AS 'Version_software_operacion',
                    IFNULL((SELECT CONCAT(u.nombres, ' ', u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'Nombre Inspector que realiza la Prueba',
                    IFNULL((SELECT u.identificacion FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'ID Inspector',
                    v.numero_placa AS 'Placa',
                    if(v.registroRunt=1,
                        (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                        (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                    v.ano_modelo AS 'Año modelo',
                    v.cilindraje AS 'Cilindraje',
                    IF(v.registroRunt=1,
                        (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                        (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                    IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
                    IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
                    'Diesel' AS 'Tipo de motor',
                    v.numero_exostos AS 'Numero de tubos de escape',
                    'NA' AS 'Modificaciones al motor',
                    (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente °C',
                    (select valor from resultados where idprueba=p.idprueba and (tiporesultado='humedad' or idconfig_prueba =201)  order by 1 desc limit 1) AS 'Humedad Relativa %',
                    '430' AS 'LTOE',
                    IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), 'Metodo aceite',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'Metodo Bloque',if(v.scooter =1,'---', if(v.convertidor =1,'Convertidor','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'Metodo aceite') AS 'Metodo medicion T°',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---') AS 'Temperatura Motor (Temperatura Inicial Diésel) (°C)',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura Final (Diésel T<50)',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'---') AS 'RPM Crucero o Gobernada',
                    if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
                    ) AS 'Ciclo Preliminar (%)',
                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'RPM Gobernada en Ciclo Preliminar',
                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo Preliminar',
                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
                ) AS 'Ciclo 1 (m-1)',
                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 1',
                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 1',
                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---'),
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
                ) AS 'Ciclo 2 (m-1)',
                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 2',
                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 2',
                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---'),
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
                ) AS 'Ciclo 3 (m-1)',
                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 3',
                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 3',
                
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---') AS 'Promedio Final %',
                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
                    ) AS 'Ciclo Preliminar (m-1)',
                ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura Final °C',
                if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---'),
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---')
                ) AS 'Promedio Final (m-1)',
                if(p.estado = 2, 'Aprobado',if(p.estado = 5, 'Abortado', 'Rechazada')) AS 'Concepto final',
                DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha Verificacion Instrumento– Hora Inicio de la prueba en formato (DD/MM/AAAA HH:MM:SS)',
                '' AS 'Ltoe',
                '' AS 'Marca_opaciemtro',
                $opa,
                ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia de Humo (Negro / Azul)',
                IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Dilución en la Mezcla (SI/NO)',
                if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera de rango',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapón aceite',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapon combustible',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=334 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Admisión Mal estado - Filtro aire (si/no)',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=337  order by 1 desc limit 1),'NO') AS 'Desconexión Recirculación (SI/NO)',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=335 or valor = '3.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'Accesorios tubo (SI/NO)',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=336 or valor = '3.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'Operacion incorrecta refrigeración',
                        if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Emisiones',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'incorrecta operación gobernador',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta',
                        IFNULL((SELECT 'SI' from resultados WHERE idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencia aritmetica',
                        'NO' AS 'Diferencia de Temperatura',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapón aceite_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Ausencia o mal estado tapon combustible_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Instalación accesorios tubo_',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and (valor=336 or valor = '3.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'Operacion incorrecta refrigeración_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o Incorrecta Instalación Filtro Aire_',
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=379  order by 1 desc limit 1),'NO') AS 'Activacion dispositivos_',
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'Rpm fuera rango_',                                
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro-azul)_',
    
                        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Fugas tubo (Si/No)', 
                           
                        IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI/NO)',
    
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'NO') AS 'Fallas del equipo de medicion',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita del fluido electrico',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo' ORDER by 1 desc limit 1),'NO') AS 'Bloqueo forzado del equipo',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta de la prueba',
                        IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'NO') AS 'Falla de desviacion cero',
    
                        (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Ruido motor',
                        '762 de 2022' AS 'Norma aplicada'
                        from
                    vehiculos v, hojatrabajo h,pruebas p
                        where
                    v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 2 and 
                        p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND $where and
                        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')          
EOF;

        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    //     public function informe_cesar_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    //     {
    //         if ($datoInforme == "1") {
    //             $opa = "IFNULL((SELECT c.valor1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Valor referencia  filtro 1',
    //                         IFNULL((SELECT c.lectura1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Valor leído  filtro 1',
    //                         IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Valor referencia  filtro 2',
    //                         IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Valor leído  filtro 2',
    //                         'Aprobado' AS 'Resultado verificacion linealidad',
    //                         IFNULL((SELECT DATE_FORMAT(c.fecha, '%Y-%m-%d') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha verificación linealidad',";
    //         } else {
    //             $opa = "(select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia  filtro 1',
    //                         (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leído  filtro 1',
    //                         (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia  filtro 2',
    //                         (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leído  filtro 2',
    //                         'Aprobado' AS 'Resultado verificacion linealidad',
    //                         (select DATE_FORMAT(fechaguardado, '%Y-%m-%d') from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Fecha verificación linealidad',";
    //         }
    //         $consulta = <<<EOF
    //                   SELECT
    //                         IFNULL((SELECT cd.nombre_cda FROM cda cd LIMIT 1),'') AS 'Nombre o razon social',
    //                         IFNULL((SELECT cd.tipo_identificacion FROM cda cd LIMIT 1),'') AS 'Tipo de documento',
    //                         IFNULL((SELECT cd.numero_id FROM cda cd LIMIT 1),'') AS 'Numero de identificacion',
    //                         IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'Persona de contacto',
    //                         IFNULL((SELECT se.email FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'Correo electronico',
    //                         IFNULL((SELECT se.telefono_uno FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'Telefono de contacto',

    //                         IFNULL((SELECT de.nombre FROM cda cd, sede se, ciudades ci, deptos de WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad AND ci.cod_depto = de.cod_depto LIMIT 1),'') AS 'Municipio/Departamento',

    //                         IFNULL((SELECT cd.numero_resolucion FROM cda cd LIMIT 1),'') AS 'N° Resolucion Certificacion',
    //                         IFNULL((SELECT DATE_FORMAT(cd.fecha_resolucion, '%Y/%m/%d') FROM cda cd LIMIT 1),'') AS 'Fecha Resolucion (dd/mm/aaaa)',
    //                         '' AS 'Numero y fecha de modificacion de certificacion',
    //                         IFNULL((SELECT se.clase FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'Clase del CDA',
    //                         '' AS 'Numero_expe',
    //                         '' AS 'Numero_total_opacimetros',
    //                         '' AS 'Numero_total_analizadores',
    //                         '' AS 'Numero_total_analizadores_2t',
    //                         '' AS 'Numero_total_analizadores_4t',
    //                         DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'Fecha inicio prueba AAAA/MM/DD',
    //                         DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha fin prueba AAAA/MM/DD',
    //                         IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Municipio de inspeccion',
    //                         IFNULL((SELECT se.direccion FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Lugar de la prueba: Dirección CDA',
    //                         '' AS 'Ubicacion de la unidad movil (Coordenadas GMS)',
    //                         IFNULL((SELECT c.idconsecutivotc FROM consecutivotc c WHERE c.idconsecutivotc = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'Numero Inspeccion / FUR',
    //                         IFNULL ((SELECT ct.numero_certificado FROM certificados ct WHERE ct.idhojapruebas = h.idhojapruebas AND p.estado = 2 ORDER BY 1 DESC LIMIT 1),'---') AS 'Numero de certificado emitido',
    //                         '' AS 'numeroSerieOpacimetro',
    //                         '' AS 'Nombre_delsoftware_de_aplicacion',
    //                         '' AS 'Version_software_operacion',
    //                         IFNULL((SELECT CONCAT(u.nombres,' ',u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'Nombre Inspector que realiza la Prueba',
    //                         IFNULL((SELECT u.identificacion FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'ID Inspector',
    //                         v.numero_placa AS 'Placa',
    //                         if(v.registroRunt=1,
    //                               (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
    //                               (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
    //                         v.ano_modelo AS 'Ano modelo',
    //                         v.cilindraje AS 'Cilindraje',
    //                          IF(v.registroRunt=1,
    //                               (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
    //                               (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
    //                         IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
    //                         IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
    //                         CONCAT(v.tiempos,'T') AS 'Tipo de motor',
    //                         v.numero_exostos AS 'Numero de tubos de escape',
    //                         'No' AS 'Modificaciones al motor',
    //                         (select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_ambiente' order by 1 desc limit 1) AS 'Temperatura ambiente',
    //                         (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad relativa',
    //                         '430' AS 'Ltoe estandar',
    //                         IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), 'Metodo aceite',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'Metodo Bloque',if(v.scooter =1,'Scooter', if(v.convertidor =1,'Convertidor','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'Metodo bloque') AS 'Metodo de  medicion temperatura',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---') AS 'Temperatura Motor Inicial',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura Motor Final',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'Rpm ralenti',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'Rpm gobernada',
    //                         if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
    //                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
    //                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
    //                         ) AS 'Ciclo Preliminar (m-1)',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo Preliminar',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo Preliminar',
    //                         if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
    //                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---'),
    //                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---')
    //                         ) AS 'Ciclo 1 (m-1)',

    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 1',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 1',
    //                         if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
    //                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---'),
    //                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
    //                         ) AS 'Ciclo 2 (m-1)',

    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 2',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 2',
    //                         if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
    //                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---'),
    //                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
    //                         ) AS 'Ciclo 3 (m-1)',

    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'RPM Gobernada Ciclo 3',
    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí Ciclo 3',
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---') AS 'Promedio Final (%)',
    //                         ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---') AS 'Ciclo preliminar (m-1)',

    //                         ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura Final',
    //                         if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
    //                            '',
    //                            ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---')
    //                         ) AS 'Promedio Final (m-1)',                                                

    //                         if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto final',
    //                         DATE_FORMAT(p.fechafinal,'%Y-%m-%d') as 'Fecha Verificacion Instrumento',
    //                         '' AS 'Ltoe',
    //                         '' AS 'marcaOpacimetro',
    //                        $opa
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') order by 1 desc limit 1),'NO') AS 'PresenciaHumo negro o azul',
    //                         IFNULL((SELECT 'SI' FROM resultados WHERE idprueba=p.idprueba AND (idconfig_prueba = 153 OR idconfig_prueba = 99) AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'NO') 'Dilucion en la mezcla (SI/NO)',
    //                         if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','---')) AS 'Nivel emisiones (norma aplicable)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'RPM fuera rango',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Auscencia tapones combustible o fuga (SI/NO)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Admisión Mal estado - Filtro aire (si/no)',
    //                         'NO' AS 'Desconexión Recirculación (Si/No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Accesorios tubo (Si/No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Operación Incorrecta Refrigeración (Si/No)',
    //                         if(p.estado=2,'NO',if(p.estado=3 or p.estado=1,'SI','--')) AS 'Emisiones',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=405 and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'Incorrecta Operación Gobernador',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=357  order by 1 desc limit 1),'NO') AS 'Falla subita',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecución Incorrecta',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencia aritmetica',
    //                         'NO' AS 'Diferencia de Temperatura',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=328  order by 1 desc limit 1),'NO') AS 'Fugas tubo(SI/NO)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Salidas adicionales_',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=331  order by 1 desc limit 1),'NO') AS 'Auscencia tapones combustible o fuga',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=335  order by 1 desc limit 1),'NO') AS 'Instalación accesorios tubo (Si/No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=336  order by 1 desc limit 1),'NO') AS 'Operación Incorrecta Refrigeración (Si-No)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=334  order by 1 desc limit 1),'NO') AS 'Ausencia o Incorrecta Instalación Filtro Aire (Si-No)',
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=379  order by 1 desc limit 1),'NO') AS 'Activacion dispositivos (SI/NO)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=332  order by 1 desc limit 1),'NO') AS 'Rpm fuera rango',                                
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=333  order by 1 desc limit 1),'NO') AS 'Presencia humo (negro-azul)',
    //                         ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=329  order by 1 desc limit 1),'NO') AS 'Fugas tubo (Si/No)',    
    //                         IFNULL((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='T' and valor=330  order by 1 desc limit 1),'NO') AS 'Auscencia tapones aceite o fugas (SI-NO)',                                                                
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Fallas del equipo de medición'  order by 1 desc limit 1),'NO') AS 'Fallas del equipo de medicion',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Falla súbita del fluido eléctrico'  order by 1 desc limit 1),'NO') AS 'Falla subita del fluido electrico',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Bloqueo forzado del equipo' ORDER by 1 desc limit 1),'NO') AS 'Bloqueo forzado del equipo',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='Ejecución incorrecta de la prueba'  order by 1 desc limit 1),'NO') AS 'Ejecucion incorrecta de la prueba',
    //                         IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and observacion='falla de desviacion cero'  order by 1 desc limit 1),'NO') AS 'Falla de desviacion cero',
    //                         (SELECT valor FROM pruebas pr,resultados re WHERE pr.idtipo_prueba=4 AND pr.idhojapruebas=h.idhojapruebas AND re.idprueba=pr.idprueba AND re.tiporesultado='valor_ruido_motor1' ORDER BY 1 DESC LIMIT 1) 'Ruido motor',
    //                         '762 de 2022' AS 'Norma aplicada'
    //                         from
    //                        vehiculos v, hojatrabajo h,pruebas p
    //                         where
    //                        v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 2 and 
    //                         p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9)  and
    //                         DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')    
    // EOF;
    //         $rta = $this->db->query($consulta);
    //         if ($rta->num_rows() > 0) {
    //             $rta = $rta->result();
    //             return $rta;
    //         } else {
    //             return [];
    //         }
    //     }
    public function datosGeneralesCorantioquia()
    {
        $consulta = <<<EOF
                SELECT
                    IFNULL((SELECT cd.nombre_cda FROM cda cd LIMIT 1),'') AS 'Nombre_o_razon_social',
                    IFNULL((SELECT ti.abrev FROM cda cd, tipo_identificacion ti WHERE cd.tipo_identificacion = ti.tipo_identificacion LIMIT 1),'') AS 'TipoDocumento',
                    IFNULL((SELECT cd.numero_id FROM cda cd LIMIT 1),'') AS 'NumeroIdentificacion',
                    IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'PersonaContacto',
                    IFNULL((SELECT se.email FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'CorreoElectronico',
                    IFNULL((SELECT se.telefono_uno FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'TelefonoContacto',
                    IFNULL((SELECT ci.nombre FROM cda cd, sede se, ciudades ci WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad LIMIT 1),'') AS 'Ciudad',
                    IFNULL((SELECT de.nombre FROM cda cd, sede se, ciudades ci, deptos de WHERE cd.idcda = se.idcda AND se.cod_ciudad = ci.cod_ciudad AND ci.cod_depto = de.cod_depto LIMIT 1),'') AS 'Departamento',
                    IFNULL((SELECT cd.numero_resolucion FROM cda cd LIMIT 1),'') AS 'ResolucionCertificacion',
                    IFNULL((SELECT DATE_FORMAT(cd.fecha_resolucion, '%Y/%m/%d') FROM cda cd LIMIT 1),'') AS 'FechaResolucion',
                    IFNULL((SELECT se.clase FROM cda cd, sede se WHERE cd.idcda = se.idcda LIMIT 1),'') AS 'ClaseCDA',
                    '' AS 'Numero_expe',
                    '' AS 'Numero_total_equipos_certificados',
                    '' AS 'Numero_total_opacimetros',
                    '' AS 'Numero_total_analizadores',
                    '' AS 'Numero_total_analizadores_2t',
                    '' AS 'Numero_total_analizadores_4t'
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }


    public function informe_cortolima_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Baja ppm',
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Baja %',
                        IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Baja %',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Baja ppm',   
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Baja %',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  CO2 Baja %',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Alta ppm',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Alta %',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Alta %',
                        IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Alta ppm',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Alta %',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO2 Alta %',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha de Verificación AAAA/MM/DD',
                        'Aprobado' AS 'Resultado de Verificación'";
        } else {
            $pef = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'PEF' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor PEF',";
            $cal = "
            (select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Span Bajo HC ppm',
            (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Bajo CO %',
            (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Bajo CO2 %',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Valor leido Span Bajo HC',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Bajo CO',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Bajo CO2',
            (select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Alto HC',
            (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Alto CO',
            (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Span Alto CO2',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Valor leido Span Alto HC',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Alto CO',
            (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Valor leido Span Alto CO2',  
            (select DATE_FORMAT(parametro, '%Y/%m/%d %H:%i:%s' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha verificacion',
            'Aprobado' AS 'Resultado verificacion'";
            // $cal = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_hc' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo HC ppm',

            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO %',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co2' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO2 %',

            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_hc' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo HC',

            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO',

            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co2' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO2',


            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_hc' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto HC',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co2' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO2',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_hc' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto HC',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO',
            // IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co2' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO2',
            // IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
            // DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            // c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11   LIMIT 1)LIMIT 1),'---') AS 'Fecha verificacion',
            //             'Aprobado' AS 'Resultado verificacion'";

        }


        $query = $this->db->query("SELECT 
        IFNULL((SELECT CONCAT(c.nombre1, ' ', c.nombre2, ' ', c.apellido1, ' ', c.apellido2) FROM clientes c WHERE v.idcliente = c.idcliente LIMIT 1),'---') AS 'Cliente',
        
        v.numero_motor AS 'Numero Motor',
        v.numero_vin  AS 'Numero chasis',
        IFNULL((SELECT CONCAT(u.nombres,' ',u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'Nombre Inspector',
        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha de la prueba',
        (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente °C',
        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad Relativa %',
        v.numero_placa AS 'Placa',
        IF(v.registroRunt=1,
                                      (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                                      (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
        if(v.registroRunt=1,
                                      (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                                      (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
        v.ano_modelo AS 'Año modelo',
        v.cilindraje AS 'Cilindraje en cm3',
        IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
        IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
        IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE v.idtipocombustible = ti.idtipocombustible LIMIT 1),'') AS 'Combustible',
        CONCAT(v.tiempos, 'T') AS 'Tipo de motor',
        $cal,
        $pef
        if(v.scooter=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura motor °C',
        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'RPM Ralentí',
        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC Ralentí ppm',
        ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO Ralentí %',
        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2 Ralentí %',
        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 Ralentí %',
        if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto Final'
        from
        vehiculos v, hojatrabajo h,pruebas p
        where
        v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 3 and 
        p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND (h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')");


        return $query;
    }
    public function informe_cortolima_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $pef = "IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Baja ppm',
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Baja %',
                        IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Baja %',
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Baja ppm',   
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Baja %',
			IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  CO2 Baja %',
                        IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN HC Alta ppm',
                        IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO Alta %',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'SPAN CO2 Alta %',
                        IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído HC Alta ppm',
			IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO Alta %',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído CO2 Alta %',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'---') AS 'Fecha de Verificación AAAA/MM/DD',
                        'Aprobado' AS 'Resultado de Verificación'";
        } else {
            $pef = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'PEF' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC  LIMIT 1)LIMIT 1),'---') AS 'Valor PEF',";
            $cal = "IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC  LIMIT 1)LIMIT 1),'---') AS 'Span Bajo HC ppm',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC  LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO %',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC  LIMIT 1)LIMIT 1),'---') AS 'Span Bajo CO2 %',
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo HC',
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC  LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO',
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_bajo_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC  LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Bajo CO2',
            
            
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11 ORDER BY c.fecha DESC   LIMIT 1)LIMIT 1),'---') AS 'Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC  LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'span_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC  LIMIT 1)LIMIT 1),'---') AS 'Span Alto CO2',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_hc' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC   LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto HC',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC  LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO',
            IFNULL((SELECT c.parametro FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'cal_alto_co2' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11  ORDER BY c.fecha DESC  LIMIT 1)LIMIT 1),'---') AS 'Valor leido Span Alto CO2',
            IFNULL((SELECT DATE_FORMAT(c.parametro, '%Y/%m/%d %H:%i:%s' ) FROM config_maquina c WHERE c.idmaquina = p.idmaquina AND c.tipo_parametro = 'fecha_ultima_calibracion' AND c.idconfiguracion = 11 AND 
            DATE_FORMAT(descripcion,'%Y-%m-%d %h:%i:%s')  < DATE_FORMAT(p.fechafinal,'%Y-%m-%d %h:%i:%s') AND 
            c.descripcion=(SELECT co.descripcion FROM config_maquina co WHERE co.tipo_parametro='Resultado' and  co.parametro='APROBADO' AND co.idmaquina = p.idmaquina AND co.idconfiguracion = 11 ORDER BY c.fecha DESC   LIMIT 1)LIMIT 1),'---') AS 'Fecha verificacion',
                        'Aprobado' AS 'Resultado verificacion'";
        }


        $query = $this->db->query("SELECT 
        IFNULL((SELECT CONCAT(c.nombre1, ' ', c.nombre2, ' ', c.apellido1, ' ', c.apellido2) FROM clientes c WHERE v.idcliente = c.idcliente LIMIT 1),'---') AS 'Cliente',
        
        v.numero_motor AS 'Numero Motor',
        v.numero_vin  AS 'Numero chasis',
        IFNULL((SELECT CONCAT(u.nombres,' ',u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'Nombre Inspector',
        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha de la prueba',
        (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente °C',
        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad Relativa %',
        v.numero_placa AS 'Placa',
        IF(v.registroRunt=1,
                                      (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                                      (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
        if(v.registroRunt=1,
                                      (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                                      (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
        v.ano_modelo AS 'Año modelo',
        v.cilindraje AS 'Cilindraje en cm3',
        IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
        IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
        IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE v.idtipocombustible = ti.idtipocombustible LIMIT 1),'') AS 'Combustible',
        CONCAT(v.tiempos, 'T') AS 'Tipo de motor',
        $cal,
        $pef
        if(v.scooter=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura motor °C',
        ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'RPM Ralentí',
        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'HC Ralentí ppm',
        ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'CO Ralentí %',
        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'CO2 Ralentí %',
        ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'O2 Ralentí %',
        IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='rpm_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'RPM Crucero',
        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'HC Crucero ppm',
        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'CO Crucero %',
        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'CO2 Crucero %',
        IFNULL((SELECT ROUND(valor,2) FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='o2_crucero' ORDER BY 1 DESC LIMIT 1),'---') 'O2 Crucero %',
        if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto Final'
        from
        vehiculos v, hojatrabajo h,pruebas p
        where
        v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 3 and 
        p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND (h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')");


        return $query;
    }
    public function informe_cortolima_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {
        if ($datoInforme == "1") {
            $opa = "IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor referencia  filtro 1 %',
                        IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  filtro 1 %',
                        IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor referencia  filtro 2 %',
                        IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  filtro 2 %',
                        
                        IFNULL((SELECT DATE_FORMAT(c.fecha, '%Y/%m/%d') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Fecha de Verificación linealidad AAAA/MM/DD',
                        IFNULL((SELECT if(c.aprobado = 'S', 'Aprobado', 'Rechazado') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Resultado de Verificación Linealidad'";
        } else {
            $opa = "(select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia a filtro 1',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leido filtro 1',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia a filtro 2',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leido filtro 2',
                        (SELECT DATE_FORMAT(fechaguardado,'%Y/%m/%d')  from resultadosauditoria where observacion='Estado' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Fecha verificacion',                        
                        (select valor from resultadosauditoria where observacion='Estado' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado verificacion'
                        ";
        }



        $query = $this->db->query("SELECT 
        IFNULL((SELECT CONCAT(c.nombre1, ' ', c.nombre2, ' ', c.apellido1, ' ', c.apellido2) FROM clientes c WHERE v.idcliente = c.idcliente LIMIT 1),'---') AS 'Cliente',
        
        v.numero_motor AS 'Numero Motor',
        v.numero_vin  AS 'Numero chasis',
        IFNULL((SELECT CONCAT(u.nombres,' ',u.apellidos) FROM usuarios u WHERE p.idusuario = u.IdUsuario LIMIT 1),'') AS 'Nombre Inspector',
        DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fecha de la prueba',
        (select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado='temp_ambiente' or idconfig_prueba =200) order by 1 desc limit 1) AS 'Temperatura ambiente °C',
        (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'Humedad Relativa %',
        v.numero_placa AS 'Placa',
        IF(v.registroRunt=1,
                                      (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                                      (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
        if(v.registroRunt=1,
                                      (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                                      (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
        v.ano_modelo AS 'Año modelo',
        v.cilindraje AS 'Cilindraje en cm3',
        IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
        IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
        IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE v.idtipocombustible = ti.idtipocombustible LIMIT 1),'') AS 'Combustible',                 
         $opa,                     
        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=41 order by 1 desc limit 1),'---') AS 'RPM Gobernada Medida',
        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---') AS 'Temperatura Inicial del motor °C',
        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'RPM Ralentí',
        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d %H:%i'),
           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=34 order by 1 desc limit 1),'---'),
           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---')
        ) AS 'Resultado Inicial Densidad de humo Ciclo Preliminar (m-1)',
        
        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=62 order by 1 desc limit 1),'---') AS 'RPM Gobernada en Ciclo Preliminar',
        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---'),
           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---')
        ) AS 'Resultado Densidad de humo 1er Ciclo (m-1)',
        
        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'RPM 1er Ciclo GOBERNADA',
        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---'),
           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---')
        ) AS 'Resultado Densidad de humo 2do Ciclo (m-1)',
        
        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'RPM  2do Ciclo GOBERNADA',
        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---'),
           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---')
        ) AS 'Resultado Densidad de humo 3er Ciclo (m-1)',
        
        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'RPM 3er Ciclo GOBERNADA',
        ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' and valor=149  order by 1 desc limit 1),'NO') AS 'Diferencias Aritméticas (m-1)',
        
        if(p.fechafinal < DATE_FORMAT('2023-08-08', '%Y/%m/%d'),
           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---'),
           ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---')
        ) AS 'Resultado Opacidad Final (promedio 3 últimos ciclos) (m-1)',
        
        
        ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 'Temperatura Final del Motor °C',
        if(p.estado = 2, 'Aprobado',if(p.estado = 5, 'Abortado', 'Rechazada')) AS 'Concepto final'
        from
        vehiculos v, hojatrabajo h,pruebas p
        where
        v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 2 and 
        p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND (h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')");


        return $query;
    }

    public function informe_epa_motos($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {

        if ($datoInforme == "1") {
            $cal = "IFNULL((SELECT c.span_bajo_hc  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo HC', 
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Bajo HC',     
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO',
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Bajo CO',     
			IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO2',
                        IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Bajo CO2',
			IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto HC',
                        IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Alto HC',
			IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO',
                        IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Alto CO',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO2',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Alto CO',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC  limit 1),'---') AS 'Fecha y hora ultima verificacion',";
        } else {

            $cal = "(select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Vr Span Bajo HC',
                        (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Vr Resultado  de Vr Span Bajo HC',
                        (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO',
                        (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Resultado  de Vr Span Bajo CO',
                        (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO2',
                        (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Resultado  de Vr Span Bajo CO2',
                        (select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto HC',
                        (select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Resultado  de Vr Span Alto HC',
                        (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto CO', 
                        (select parametro from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO',
                        (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto CO2',
                        (select parametro from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO2',
                        (select DATE_FORMAT(parametro, '%Y/%m/%d %H:%i:%s' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha y hora ultima verificacion',";
        }
        $consulta = <<<EOF
                  SELECT 
                    
                    IFNULL((SELECT cd.nombre_cda FROM cda cd LIMIT 1),'') 'Nombre',
                    IFNULL((SELECT se.clase FROM sede se LIMIT 1),'') 'Tipo',
                    DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fe_medi',
                    v.numero_placa AS 'Placa',
                    v.ano_modelo AS 'Modelo',
                    v.numero_motor AS 'Num_motor',
                    v.cilindraje AS 'Cilindraje',
                    v.numero_tarjeta_propiedad AS 'Lic_trans',
                    v.kilometraje AS 'km',
                    if(v.registroRunt=1,
                    (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                    (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                    IF(v.registroRunt=1,
                    (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                    (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                    IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
                    IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
                    IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE v.idtipocombustible = ti.idtipocombustible LIMIT 1),'') AS 'tip_comb',
                    if((v.tiempos=4 AND v.tipo_vehiculo = 3),'4T',if((v.tiempos=4 AND v.tipo_vehiculo = 1),'OTTO',if(v.tiempos=2,'2T','Diesel'))) 'tip_motor',
                    '' AS 'Marca_Analizador',
                    '' AS 'Serie_Banco',
                    '' AS 'Serie_Analizador',
                    '' AS 'marca_bg',
                    '' AS 'mod_bg',
                    '' AS 'serial_bg',
                    '' AS 'serial_e',
                    IFNULL(( SELECT pr.idmaquina  FROM pruebas pr WHERE h.idhojapruebas = pr.idhojapruebas AND pr.idtipo_prueba = 14 LIMIT 1),'') AS 'idcaptador',
                    '' AS 'marca_rpm',
                    '' AS 'serial_rpm',
                    IFNULL(( SELECT pr.idmaquina  FROM pruebas pr WHERE h.idhojapruebas = pr.idhojapruebas AND pr.idtipo_prueba = 21 LIMIT 1),'') AS 'idensortemp',
                    '' AS 'marca_tem_m',
                    '' AS 'serial_tem_m',
                    IFNULL(( SELECT pr.idmaquina  FROM pruebas pr WHERE h.idhojapruebas = pr.idhojapruebas AND pr.idtipo_prueba = 12 LIMIT 1),'') AS 'idth',
                    '' AS 'marca_temp_a',
                    '' AS 'serial_temp_a',
                    '' AS 'marca_hum_r',
                    '' AS 'serie_hum_r',
                    '' AS 'nom_soft',
                    '' AS 'ver_soft',
                    'TECMMAS S.A.S' AS 'des_soft',
                    IFNULL((select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado = 'temp_ambiente') order by 1 desc limit 1),'---') AS 't_amb',
                    (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'h_rel',
                    if(v.scooter=0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'0') AS 't_motor',
                    ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'rmp_ral',
                    ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=333 OR valor = '4.1.1.1.7')  order by 1 desc limit 1),'') AS 'humo', 
                    if(v.scooter=0,ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='temperatura_aceite' order by 1 desc limit 1),'---'),'0') AS 'Temperatura motor °C',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'r_hc_ral',
                    ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'r_co_ral',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'r_co2_ral',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'r_o2_ral',
                    IFNULL((SELECT re.valor FROM pruebas pr, resultados re WHERE h.idhojapruebas = pr.idhojapruebas AND pr.idtipo_prueba = 4 AND pr.idprueba = re.idprueba AND re.tiporesultado = 'valor_ruido_motor1' LIMIT 1), '') AS 'rs_sono',
                    if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto Final'
                    from
                    vehiculos v, hojatrabajo h,pruebas p
                    where
                    v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 3 and 
                    p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND (h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
                    DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')  
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_epa_gasolina($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {

        if ($datoInforme == "1") {
            $cal = "IFNULL((SELECT c.span_bajo_hc  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo HC', 
                        IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Bajo HC',     
                        IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO',
                        IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Bajo CO',     
			IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Bajo CO2',
                        IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Bajo CO2',
			IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto HC',
                        IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Alto HC',
			IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO',
                        IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Alto CO',
                        IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Span Alto CO2',
                        IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC limit 1),'---') AS 'Vr Resultado  de Vr Span Alto CO',
                        IFNULL((SELECT DATE_FORMAT(c.fecha,'%Y/%m/%d %H:%i:%s')  FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = ma.idmaquina AND  c.resultado = 'S' ORDER BY 1 DESC  limit 1),'---') AS 'Fecha y hora ultima verificacion',";
        } else {

            $cal = "(select parametro from config_maquina where tipo_parametro='span_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Vr Span Bajo HC',
                        (select parametro from config_maquina where tipo_parametro='cal_bajo_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1)  AS 'Vr Resultado  de Vr Span Bajo HC',
                        (select parametro from config_maquina where tipo_parametro='span_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO',
                        (select parametro from config_maquina where tipo_parametro='cal_bajo_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Resultado  de Vr Span Bajo CO',
                        (select parametro from config_maquina where tipo_parametro='span_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Bajo CO2',
                        (select parametro from config_maquina where tipo_parametro='cal_bajo_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Resultado  de Vr Span Bajo CO2',
                        (select parametro from config_maquina where tipo_parametro='span_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto HC',
                        (select parametro from config_maquina where tipo_parametro='cal_alto_hc' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Resultado  de Vr Span Alto HC',
                        (select parametro from config_maquina where tipo_parametro='span_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto CO', 
                        (select parametro from config_maquina where tipo_parametro='cal_alto_co' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO',
                        (select parametro from config_maquina where tipo_parametro='span_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Vr Span Alto CO2',
                        (select parametro from config_maquina where tipo_parametro='cal_alto_co2' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Resultado Vr Span Alto CO2',
                        (select DATE_FORMAT(parametro, '%Y/%m/%d %H:%i:%s' )from config_maquina where tipo_parametro='fecha_ultima_calibracion' and descripcion=(SELECT descripcion FROM config_maquina WHERE tipo_parametro='Resultado' and  parametro='APROBADO' AND  idmaquina=p.idmaquina and descripcion < p.fechafinal order by 1 desc limit 1) limit 1) AS 'Fecha y hora ultima verificacion',";
        }
        $consulta = <<<EOF
                  SELECT 
                    IFNULL((SELECT cd.nombre_cda FROM cda cd LIMIT 1),'') 'Nombre',
                    IFNULL((SELECT se.clase FROM sede se LIMIT 1),'') 'Tipo',
                    DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fe_medi',
                    v.numero_placa AS 'Placa',
                    v.ano_modelo AS 'Modelo',
                    v.numero_motor AS 'Num_motor',
                    v.cilindraje AS 'Cilindraje',
                    v.numero_tarjeta_propiedad AS 'Lic_trans',
                    v.kilometraje AS 'km',
                    if(v.registroRunt=1,
                    (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                    (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                    IF(v.registroRunt=1,
                    (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                    (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                    IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
                    IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
                    IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE v.idtipocombustible = ti.idtipocombustible LIMIT 1),'') AS 'tip_comb',
                    if((v.tiempos=4 AND v.tipo_vehiculo = 3),'4T',if((v.tiempos=4 AND v.tipo_vehiculo = 1),'OTTO',if(v.tiempos=2,'2T','Diesel'))) 'tip_motor',
                    ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'ral_min_fab',
                    ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'ral_max_fab',
                    v.numero_exostos AS 'Num_escape',
                    '' AS 'Marca_analizador',
                    '' AS 'Serie_banco',
                    '' AS 'Serie_analizador',
                    '' AS 'marca_bg',
                    '' AS 'mod_bg',
                    '' AS 'serial_bg',
                    '' AS 'serial_e',
                    IFNULL(( SELECT pr.idmaquina  FROM pruebas pr WHERE h.idhojapruebas = pr.idhojapruebas AND pr.idtipo_prueba = 14 LIMIT 1),'0') AS 'idcaptador',
                    '' AS 'marca_rpm',
                    '' AS 'serial_rpm',
                    IFNULL(( SELECT pr.idmaquina  FROM pruebas pr WHERE h.idhojapruebas = pr.idhojapruebas AND pr.idtipo_prueba = 21 LIMIT 1),'0') AS 'idensortemp',
                    '' AS 'marca_tem_m',
                    '' AS 'serial_tem_m',
                    IFNULL(( SELECT pr.idmaquina  FROM pruebas pr WHERE h.idhojapruebas = pr.idhojapruebas AND pr.idtipo_prueba = 12 LIMIT 1),'0') AS 'idth',
                    '' AS 'marca_temp_a',
                    '' AS 'serial_temp_a',
                    '' AS 'marca_hum_r',
                    '' AS 'serie_hum_r',
                    '' AS 'nom_soft',
                    '' AS 'ver_soft',
                    'TECMMAS S.A.S' AS 'des_soft',
                    'Aprobado' AS 'r-vgp',
                    IFNULL((select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado = 'temp_ambiente') order by 1 desc limit 1),'---') AS 't_amb',
                    (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'h_rel',
                    if(v.scooter=0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'0') AS 't_motor',
                    ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'---') AS 'rmp_ral',
                    ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_crucero' order by 1 desc limit 1),'---') AS 'rmp_cru',
                    ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=333 OR valor = '4.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'humo', 
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'---') AS 'r_hc_ral',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_crucero' order by 1 desc limit 1),'---') AS 'r_hc_cru',
                    ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'---') AS 'r_co_ral',
                    ifnull((SELECT ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_crucero' order by 1 desc limit 1),'---') AS 'r_cu_cru',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'---') AS 'r_co2_ral',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_crucero' order by 1 desc limit 1),'---') AS 'r_co2_cru',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'---') AS 'r_o2_ral',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_crucero' order by 1 desc limit 1),'---') AS 'r_o2_cru',
                    IFNULL((SELECT re.valor FROM pruebas pr, resultados re WHERE h.idhojapruebas = pr.idhojapruebas AND pr.idtipo_prueba = 4 AND pr.idprueba = re.idprueba AND re.tiporesultado = 'valor_ruido_motor1' LIMIT 1), '') AS 'rs_sono',
        if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'Concepto Final'
        from
        vehiculos v, hojatrabajo h,pruebas p
        where
        v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 3 and 
        p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND (h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
        DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')   
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_epa_disel($idconf_maquina, $fechainicial, $fechafinal, $datoInforme)
    {

        if ($datoInforme == "1") {
            $opa = "IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor referencia  filtro 1 %',
                        IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  filtro 1 %',
                        IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor referencia  filtro 2 %',
                        IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Valor leído  filtro 2 %',
                        
                        IFNULL((SELECT DATE_FORMAT(c.fecha, '%Y/%m/%d') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Fecha de Verificación linealidad AAAA/MM/DD',
                        IFNULL((SELECT if(c.aprobado = 'S', 'Aprobado', 'Rechazado') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'Resultado de Verificación Linealidad'";
        } else {
            $opa = "(select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia a filtro 1',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 1 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leido filtro 1',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Valor' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor referencia a filtro 2',
                        (select valor from resultadosauditoria where substring(observacion,1,13)='Lente 2 Lectu' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Valor leido filtro 2',
                        (SELECT DATE_FORMAT(fechaguardado,'%Y/%m/%d')  from resultadosauditoria where observacion='Estado' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Fecha verificacion',                        
                        (select valor from resultadosauditoria where observacion='Estado' and idauditoria=(select idauditoria from resultadosauditoria where observacion='ID Banco' and valor=p.idmaquina and fechaguardado<p.fechafinal order by fechaguardado desc limit 1)) AS 'Resultado verificacion'
                        ";
        }


        $consulta = <<<EOF
                  SELECT 
                    
                    IFNULL((SELECT cd.nombre_cda FROM cda cd LIMIT 1),'') 'Nombre',
                    IFNULL((SELECT se.clase FROM sede se LIMIT 1),'') 'Tipo',
                    DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'Fe_medi',
                    v.numero_placa AS 'Placa',
                    v.ano_modelo AS 'Modelo',
                    v.numero_motor AS 'Num_motor',
                    v.diametro_escape AS 'dia_scape',
                    v.cilindraje AS 'Cilindraje',
                    v.numero_tarjeta_propiedad AS 'Lic_trans',
                    v.kilometraje AS 'km',
                    if(v.registroRunt=1,
                    (select m.nombre from linearunt l,marcarunt m where l.idmarcarunt=m.idmarcarunt and l.idlinearunt=v.idlinea),
                    (select m.nombre from linea l,marca m where l.idmarca=m.idmarca and l.idlinea=v.idlinea)) AS 'Marca',
                    IF(v.registroRunt=1,
                    (SELECT l.nombre FROM  linearunt l WHERE l.idlinearunt=v.idlinea),
                    (SELECT l.nombre FROM linea l WHERE l.idlinea=v.idlinea)) 'Linea',
                    IFNULL((SELECT cl.nombre FROM clase cl WHERE v.idclase = cl.idclase LIMIT 1),'') AS 'Clase',
                    IFNULL((SELECT s.nombre FROM servicio s WHERE v.idservicio = s.idservicio LIMIT 1),'') AS 'Servicio',
                    IFNULL((SELECT ti.nombre FROM tipo_combustible ti WHERE v.idtipocombustible = ti.idtipocombustible LIMIT 1),'') AS 'tip_comb',
                    if((v.tiempos=4 AND v.tipo_vehiculo = 3),'4T',if((v.tiempos=4 AND v.tipo_vehiculo = 1),'OTTO',if(v.tiempos=2,'2T','Diesel'))) 'tip_motor',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'ral_min_fab',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'ral_max_fab',
                    '' AS 'Marca_opacimetro',
                    '' AS 'No_serie_opaciemtro',
                    '' AS 'No_serie_banco',
                    '' AS 'No_serie_electronico_del_opaciemtro',
                    '' AS 'Marca_opacimetro',
                    IFNULL((select valor from resultados where idprueba=p.idprueba and (tiporesultado='temperatura_ambiente' or tiporesultado = 'temp_ambiente') order by 1 desc limit 1),'---') AS 't_amb',
                    (select valor from resultados where idprueba=p.idprueba and tiporesultado='humedad'  order by 1 desc limit 1) AS 'h_rel',
                    '' AS 'Ltoe',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=224 order by 1 desc limit 1),'---') AS 't_inicial_motor',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=39 order by 1 desc limit 1),'---') AS 't_final_motor',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'rpm_ral_c1',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'rpm_gob_c1',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=35 order by 1 desc limit 1),'---') AS 'r_op_c1',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---') AS 'r_den_c1',

                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'rpm_ral_c2',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'rpm_gob_c2',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=36 order by 1 desc limit 1),'---') AS 'r_op_c2',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---') AS 'r_den_c2',

                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=38 order by 1 desc limit 1),'---') AS 'rpm_ral_c3',
                    ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'rpm_gob_c3',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=37 order by 1 desc limit 1),'---') AS 'r_op_c3',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---') AS 'r_den_c3',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=61 order by 1 desc limit 1),'---') AS 'r_final_op',
                    ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---') AS 'r_final_den',

                    IFNULL((SELECT re.valor FROM pruebas pr, resultados re WHERE h.idhojapruebas = pr.idhojapruebas AND pr.idtipo_prueba = 4 AND pr.idprueba = re.idprueba AND re.tiporesultado = 'valor_ruido_motor1' LIMIT 1), '') AS 'rs_sono',
                    if(p.estado=2,'Aprobado',if(p.estado=5,'Abortada','Rechazada')) AS 'res_final'
                    from
                    vehiculos v, hojatrabajo h,pruebas p
                    where
                    v.idvehiculo = h.idvehiculo AND h.idhojapruebas = p.idhojapruebas  AND p.idtipo_prueba = 2 and 
                    p.idmaquina = $idconf_maquina AND (p.estado <> 0 AND p.estado <> 9) AND (h.reinspeccion = 0 OR h.reinspeccion = 1) AND 
                    DATE_FORMAT(p.fechafinal,'%Y-%m-%d') between DATE_FORMAT('$fechainicial','%Y-%m-%d') and DATE_FORMAT('$fechafinal','%Y-%m-%d')   
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function informe_bogota_MotosWeb($idconf_maquina, $idprueba)

    {
        $consulta = <<<EOF
              SELECT
                '60' AS  'id_programa',
                '3' AS 'tipo_ciclo',
                CASE DAYOFWEEK(p.fechafinal)
                    WHEN 1 THEN '7'
                    WHEN 2 THEN '1'
                    WHEN 3 THEN '2'
                    WHEN 4 THEN '3'
                    WHEN 5 THEN '4'
                    WHEN 6 THEN '5'
                    WHEN 7 THEN '6'
                END AS 'dia_semana',
                IFNULL(
                REGEXP_REPLACE(
                    (SELECT c.nombre_cda FROM cda c),
                    '[áéíóúñ.]', ''),
                '') AS 'nombre_entidad_cda',
                IFNULL((SELECT s.clase FROM sede s),'') AS 'clase_cda',  
                IFNULL((SELECT c.numero_id FROM cda c),'') AS 'nit',
                IFNULL((SELECT ci.cod_ciudad FROM ciudades ci, sede s WHERE ci.cod_ciudad = s.cod_ciudad LIMIT 1),'') AS 'ciudad',
                IFNULL((SELECT s.direccion FROM  sede s LIMIT 1),'') AS 'direccion',
                IFNULL((SELECT s.telefono_uno FROM  sede s LIMIT 1),'') AS 'telefono',
                IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'persona_contacto_cda',
                IFNULL((SELECT concat(u.nombres,' ',u.apellidos) FROM usuarios u WHERE u.IdUsuario = p.idusuario LIMIT 1 ),'---') AS 'inspector_realiza_prueba',
                IFNULL((SELECT u.identificacion FROM usuarios u WHERE u.IdUsuario = p.idusuario LIMIT 1 ),'---') AS 'id_inspector_prueba',
                IFNULL((SELECT c.numero_resolucion FROM cda c LIMIT 1),'') AS 'numero_resolucion',
                IFNULL((SELECT DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') FROM cda c LIMIT 1),'') AS 'fecha_resolucion',
                '' AS 'expediente_autoridad_ambiental',
                '' AS 'total_equipos_opacimetros',
                '' AS 'total_equipos_analizadores_chispa',
                '' AS 'total_equipos_analizadores_motos_4t',
                '' AS 'total_equipos_analizadores_motos_2t',
                '' AS 'vr_pef_ltoe',
                '' AS 'numero_serie_banco',
                '' AS 'numero_serie_fisico',
                '' AS 'numero_serie_electronico',
                '' AS 'marca_equipo',
IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_bajo_hc',
IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_bajo_hc',   
IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_bajo_co',
IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_bajo_co',
IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_bajo_co2',
IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_bajo_co2',
IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_alto_hc',
IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_alto_hc',
IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_alto_co',
IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_alto_co',
IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_alto_co2',
IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_alto_co2',
IFNULL((SELECT c.valor1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_primer_punto_linealidad',
IFNULL((SELECT c.lectura1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_primer_punto_linealidad',
IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_segundo_punto_linealidad',
IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_segundo_punto_linealidad',
IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_tercer_punto_linealidad',
IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_tercer_punto_linealidad',
IFNULL((SELECT c.valor4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_cuarto_punto_linealidad',
IFNULL((SELECT c.lectura4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_cuarto_punto_linealidad',
IFNULL((SELECT DATE_FORMAT(c.fecha, '%Y/%m/%d %H:%i:%s') FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'0') AS 'fecha_hora_ultima_verificacion_ajuste',


                '' AS 'nombre_software',
                '' AS 'version_software',
                p.idprueba AS 'numero_consecutivo_prueba',
                DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'fecha_hora_inicio_prueba',
                DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'fecha_hora_final_prueba',
                if(p.estado = 5, DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s'), '') AS 'fecha_hora_aborto_prueba',
                IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), '1',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'2',if(v.scooter =1,'---', if(v.convertidor =1,'3','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'2') AS 'metodo_medicion_temperatura_motor',
                IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='temperatura_ambiente' OR idconfig_prueba = 200)  limit 1),'---') AS 'temperatura_ambiente',
                IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201)   limit 1),'---') AS 'humedad_relativa',
                if(p.estado = 5,
                IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.idconfig_prueba = 700),''),
                '') AS 'causal_aborto_analisis',
                IFNULL((SELECT concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'') AS 'nombre_razon_social_propietario',
                IFNULL((SELECT ti.id_mintransporte  FROM clientes cl, tipo_identificacion ti WHERE v.idcliente = cl.idcliente AND cl.tipo_identificacion = ti.tipo_identificacion  LIMIT 1),'') AS 'tipo_documento',
                IFNULL((SELECT cl.numero_identificacion  FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'numero_documento',
                IFNULL((SELECT cl.direccion  FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'direccion_propietario',
                IFNULL((SELECT cl.telefono1  FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'telefono_propietario',
                IFNULL((SELECT ci.cod_ciudad  FROM clientes cl, ciudades ci WHERE v.idcliente = cl.idcliente AND ci.cod_ciudad = cl.cod_ciudad  LIMIT 1),'') AS 'ciudad',
                'NA' AS 'nombre_empresa',
CASE 
    WHEN v.migrateLineaMarca <> 1 THEN
   		IFNULL((SELECT lr.idlineaRUNT FROM linearunt lr WHERE lr.idlineaRUNT=v.idlinea LIMIT 1),'SIN LINEA')
    ELSE 
        IFNULL((SELECT nl.codigo_ws FROM newlineas nl WHERE nl.idlineas=v.idlinea LIMIT 1),'SIN LINEA')
END as linea,
CASE 
    WHEN v.migrateLineaMarca <> 1 THEN
        IFNULL((SELECT mr.idmarcaRUNT FROM marcarunt mr WHERE mr.idmarcaRUNT=(SELECT lr.idmarcarunt FROM linearunt lr WHERE lr.idlineaRUNT=v.idlinea)),0)
    ELSE 
        IFNULL((SELECT nm.idmarcas FROM newmarcas nm WHERE nm.idmarcas=(SELECT nl.idmarcas FROM newlineas nl WHERE nl.idlineas=v.idlinea)),0)
END AS marca,
                v.ano_modelo AS 'ano_modelo',
                v.numero_placa AS 'placa',
                v.cilindraje AS 'cilindraje',
                if(v.scooter = 1, '2', '1') AS 'diseno',
                if(v.tiempos = 2, '2', '1' ) AS 'tipo_motor',
                v.idclase AS 'clase',
                v.idservicio AS 'servicio',
                IFNULL((SELECT mo.modo_transporte FROM modoTransporte mo WHERE v.idmodoTransporte = mo.idmodoTransporte LIMIT 1),'1') AS 'modo_transporte',
                IFNULL((SELECT t.idtipocombustible FROM tipo_combustible t WHERE v.idtipocombustible = t.idtipocombustible LIMIT 1), '') AS 'combustible',
                v.numejes AS 'numero_ejes',
                v.num_pasajeros AS 'capacidad',
                v.numero_motor AS 'numero_motor',
                v.numero_vin AS 'numero_vin_serie',
                v.numero_tarjeta_propiedad AS 'numero_licencia_transito',
                v.kilometraje AS 'kilometraje',
                'null' AS 'modificaciones_motor',
                'null' AS 'potencia_motor',
                IFNULL(( SELECT co.idhojapruebas FROM consecutivotc co WHERE co.idhojapruebas = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'numero_rtm',
                'NO' AS 'generadores_ruido',
                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=328 OR valor=378 OR valor= '4.1.1.1.1')  order by 1 desc limit 1),'NO')  AS 'ausencia_silenciador',
                ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND valor= '1.2.3.4.1'  order by 1 desc limit 1),'NO')  AS 'fugas_tubo_escape',
                IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=328 OR valor=378 OR valor= '4.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'fugas_silenciador',
                ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND valor= '3.1.1.1.7'  order by 1 desc limit 1),'NO') AS 'accesorios_deformaciones_obstrucciones_tubo_escape',
                ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=331 OR valor = '4.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'ausencia_tapa_combustible_fugas',
                ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND valor = '3.1.1.1.5'  order by 1 desc limit 1),'NO') AS 'ausencia_mal_estado_filtro_aire',
                ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=330 OR valor = '4.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'ausencia_tapa_aceite_fugas_aceite',
                ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=369 OR valor = '4.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'salidas_adicionales_diseno',
                'null' AS 'pcv',
                ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=333 OR valor = '4.1.1.1.7') order by 1 desc LIMIT 1),'NO') AS 'presencia_humo_negro_azul',
                'null' AS 'dispositivos_alteran_rpm',
                ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=332 OR valor = '4.1.1.1.5')  order by 1 desc limit 1),'NO')  AS 'revoluciones_inestables',
                'null' AS 'falla_sistema_refrigeracion',
                if(v.scooter=0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'0') AS 'temperatura_inicial_motor',
                if(v.scooter=0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'0') AS 'temperatura_final_motor',
                'null' AS 'indicacion_mal_funcionamiento_motor',
                'null' AS 'sistema_control_velocidad_motor',
                'null' AS 'falla_temperatura_motor',
                'null' AS 'inestabilidad_durante_ciclos_medicion',
                'null' AS 'diferencias_aritmeticas',
                'null' AS 'velocidad_no_alcanzada_5_seg',
                'null' AS 'rpm_velocidad_gobernada',
                'null' AS 'falla_subita_motor',
                'null' AS 'resultado_ciclo_preliminar',
                ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'0') AS 'rpm_ralenti_ciclo_preliminar',
                'null' AS 'rpm_gobernada_ciclo_preliminar',
                'null' AS 'resultado_opacidad_primer_ciclo',
                'null' AS 'rpm_ralenti_primer_ciclo',
                'null' AS 'rpm_gobernada_primer_ciclo',
                'null' AS 'resultado_opacidad_segundo_ciclo',
                'null' AS 'rpm_ralenti_segundo_ciclo',
                'null' AS 'rpm_gobernada_segundo_ciclo',
                'null' AS 'resultado_opacidad_tercer_ciclo',
                'null' AS 'rpm_ralenti_tercer_ciclo',
                'null' AS 'rpm_gobernada_tercer_ciclo',
                'null' AS 'resultado_final',
                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'0') AS 'hc_ralenti',
                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'0') AS 'co_ralenti',
                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'0') AS 'co2_ralenti',
                ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'0') AS 'o2_ralenti',
                'null' AS 'rpm_crucero',
                'null' AS 'hc_crucero',
                'null' AS 'co_crucero',
                'null' AS 'co2_crucero',
                'null' AS 'o2_crucero',
                IF(EXISTS(SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='observaciones' AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'Si','No') AS 'presencia_dilucion',
                IF(p.estado = 1 OR p.estado = 3,
   IF(
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')) OR
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=368 OR valor= '1.2.3.4.1')) OR
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND valor=349) OR
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' AND valor >= '3.5'),
      
      CONCAT(
         '[',
         (
            IFNULL((SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1') LIMIT 1), 0) +
            IFNULL((SELECT 3 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=368 OR valor= '1.2.3.4.1') LIMIT 1), 0) +
            IFNULL((SELECT 2 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND valor=349 LIMIT 1), 0) +
            IFNULL((SELECT 3 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3') LIMIT 1), 0) +
            IFNULL((SELECT 4 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4') LIMIT 1), 0) +
            IFNULL((SELECT 5 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2') LIMIT 1), 0) +
            IFNULL((SELECT 7 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') LIMIT 1), 0) +
            IFNULL((SELECT 8 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10') LIMIT 1), 0) +
            IF(v.tiempos = 2,
               (
                  IFNULL((SELECT 13 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='co_ralenti' AND valor >= '3.5' LIMIT 1), 0) +
                  IFNULL((SELECT 14 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='hc_ralenti' AND valor >= '8000' LIMIT 1), 0) +
                  IFNULL((SELECT 15 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='co_ralenti' AND valor >= '3.5' LIMIT 1), 0) +
                  IFNULL((SELECT 16 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='hc_ralenti' AND valor >= '1600' LIMIT 1), 0)
               ),
               0
            ) +
            IF(v.tiempos = 4,
               (
                  IFNULL((SELECT 17 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' AND valor >= '3.5' LIMIT 1), 0) +
                  IFNULL((SELECT 18 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' AND valor >= '1300' LIMIT 1), 0)
               ),
               0
            )
         ),
         ']'
      ),
      '[0]'
   ),
   '[0]'  
) AS 'causa_rechazo',
                if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'concepto_tecnico_vehiculo',

                'Resolución 762 del 2022' AS 'resolucion_limites',
                '2027/07/01' AS 'fecha_actualizacion_equipo'

                        from
                        vehiculos v,hojatrabajo h, pruebas p
                        where
                         v.idvehiculo=h.idvehiculo and
                        h.idhojapruebas=p.idhojapruebas and
                      p.idprueba = $idprueba
                
EOF;
        $rta = $this->db->query($consulta);
        
                
         $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }


    public function informe_bogota_GasolinaWeb($idconf_maquina, $idprueba)

    {
        $consulta = <<<EOF
              SELECT
'60' AS  'id_programa',
'2' AS 'tipo_ciclo',
CASE DAYOFWEEK(p.fechafinal)
    WHEN 1 THEN '7'
    WHEN 2 THEN '1'
    WHEN 3 THEN '2'
    WHEN 4 THEN '3'
    WHEN 5 THEN '4'
    WHEN 6 THEN '5'
    WHEN 7 THEN '6'
  END AS 'dia_semana',
IFNULL(
  REGEXP_REPLACE(
    (SELECT c.nombre_cda FROM cda c),
    '[áéíóúñ.]', ''),
  '') AS 'nombre_entidad_cda',
IFNULL((SELECT s.clase FROM sede s),'') AS 'clase_cda',  
IFNULL((SELECT c.numero_id FROM cda c),'') AS 'nit',
IFNULL((SELECT ci.cod_ciudad FROM ciudades ci, sede s WHERE ci.cod_ciudad = s.cod_ciudad LIMIT 1),'') AS 'ciudad',
IFNULL((SELECT s.direccion FROM  sede s LIMIT 1),'') AS 'direccion',
IFNULL((SELECT s.telefono_uno FROM  sede s LIMIT 1),'') AS 'telefono',
IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'persona_contacto_cda',
IFNULL((SELECT concat(u.nombres,' ',u.apellidos) FROM usuarios u WHERE u.IdUsuario = p.idusuario LIMIT 1 ),'---') AS 'inspector_realiza_prueba',
IFNULL((SELECT u.identificacion FROM usuarios u WHERE u.IdUsuario = p.idusuario LIMIT 1 ),'---') AS 'id_inspector_prueba',
IFNULL((SELECT c.numero_resolucion FROM cda c LIMIT 1),'') AS 'numero_resolucion',
IFNULL((SELECT DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') FROM cda c LIMIT 1),'') AS 'fecha_resolucion',
'' AS 'expediente_autoridad_ambiental',
'' AS 'total_equipos_opacimetros',
'' AS 'total_equipos_analizadores_chispa',
'' AS 'total_equipos_analizadores_motos_4t',
'' AS 'total_equipos_analizadores_motos_2t',
IFNULL((SELECT c.pef FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'---') AS 'vr_pef_ltoe',
'' AS 'numero_serie_banco',
'' AS 'numero_serie_fisico',
'' AS 'numero_serie_electronico',
'' AS 'marca_equipo',
IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_bajo_hc',
IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_bajo_hc',   
IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_bajo_co',
IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_bajo_co',
IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_bajo_co2',
IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_bajo_co2',
IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_alto_hc',
IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_alto_hc',
IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_alto_co',
IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_alto_co',
IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_alto_co2',
IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_alto_co2',
IFNULL((SELECT c.valor1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_primer_punto_linealidad',
IFNULL((SELECT c.lectura1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_primer_punto_linealidad',
IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_segundo_punto_linealidad',
IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_segundo_punto_linealidad',
IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_tercer_punto_linealidad',
IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_tercer_punto_linealidad',
IFNULL((SELECT c.valor4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_cuarto_punto_linealidad',
IFNULL((SELECT c.lectura4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_cuarto_punto_linealidad',
IFNULL((SELECT DATE_FORMAT(c.fecha, '%Y/%m/%d %H:%i:%s') FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC limit 1),'0') AS 'fecha_hora_ultima_verificacion_ajuste',


'' AS 'nombre_software',
'' AS 'version_software',
p.idprueba AS 'numero_consecutivo_prueba',
DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'fecha_hora_inicio_prueba',
DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'fecha_hora_final_prueba',
if(p.estado = 5, DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s'), '') AS 'fecha_hora_aborto_prueba',
IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), '1',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'2',if(v.scooter =1,'1', if(v.convertidor =1,'3','1')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'2') AS 'metodo_medicion_temperatura_motor',
IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='temperatura_ambiente' OR idconfig_prueba = 200)  limit 1),'---') AS 'temperatura_ambiente',
IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201)   limit 1),'---') AS 'humedad_relativa',
if(p.estado = 5,
IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.idconfig_prueba = 700),''),
'') AS 'causal_aborto_analisis',
IFNULL((SELECT concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'') AS 'nombre_razon_social_propietario',
IFNULL((SELECT ti.id_mintransporte  FROM clientes cl, tipo_identificacion ti WHERE v.idcliente = cl.idcliente AND cl.tipo_identificacion = ti.tipo_identificacion  LIMIT 1),'') AS 'tipo_documento',
IFNULL((SELECT cl.numero_identificacion  FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'numero_documento',
IFNULL((SELECT cl.direccion  FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'direccion_propietario',
IFNULL((SELECT cl.telefono1  FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'telefono_propietario',
IFNULL(
    (SELECT ci.cod_ciudad 
     FROM clientes cli
     JOIN ciudades ci ON ci.cod_ciudad = cli.cod_ciudad
     WHERE v.idcliente = cli.idcliente
     LIMIT 1),
    ''
) AS 'ciudad',

'NA' AS 'nombre_empresa',
CASE 
    WHEN v.migrateLineaMarca <> 1 THEN
   		IFNULL((SELECT lr.idlineaRUNT FROM linearunt lr WHERE lr.idlineaRUNT=v.idlinea LIMIT 1),'SIN LINEA')
    ELSE 
        IFNULL((SELECT nl.codigo_ws FROM newlineas nl WHERE nl.idlineas=v.idlinea LIMIT 1),'SIN LINEA')
END as linea,
CASE 
    WHEN v.migrateLineaMarca <> 1 THEN
        IFNULL((SELECT mr.idmarcaRUNT FROM marcarunt mr WHERE mr.idmarcaRUNT=(SELECT lr.idmarcarunt FROM linearunt lr WHERE lr.idlineaRUNT=v.idlinea)),0)
    ELSE 
        IFNULL((SELECT nm.idmarcas FROM newmarcas nm WHERE nm.idmarcas=(SELECT nl.idmarcas FROM newlineas nl WHERE nl.idlineas=v.idlinea)),0)
END AS marca,

v.ano_modelo AS 'ano_modelo',
v.numero_placa AS 'placa',
v.cilindraje AS 'cilindraje',
if(v.scooter = 1, '2', '1') AS 'diseno',
if(v.tiempos = 2, '2', '1' ) AS 'tipo_motor',
v.idclase AS 'clase',
v.idservicio AS 'servicio',
IFNULL((SELECT mo.modo_transporte FROM modoTransporte mo WHERE v.idmodoTransporte = mo.idmodoTransporte LIMIT 1),'1') AS 'modo_transporte',
IFNULL((SELECT t.idtipocombustible FROM tipo_combustible t WHERE v.idtipocombustible = t.idtipocombustible LIMIT 1), '') AS 'combustible',
v.numejes AS 'numero_ejes',
v.num_pasajeros AS 'capacidad',
v.numero_motor AS 'numero_motor',
v.numero_vin AS 'numero_vin_serie',
v.numero_tarjeta_propiedad AS 'numero_licencia_transito',
v.kilometraje AS 'kilometraje',
'null' AS 'modificaciones_motor',
'null' AS 'potencia_motor',
IFNULL(( SELECT co.idhojapruebas FROM consecutivotc co WHERE co.idhojapruebas = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'numero_rtm',
'NO' AS 'generadores_ruido',
IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=328 OR valor=378 OR valor= '4.1.1.1.1')  order by 1 desc limit 1),'NO')  AS 'ausencia_silenciador',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND valor= '1.2.3.4.1'  order by 1 desc limit 1),'NO')  AS 'fugas_tubo_escape',
IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=328 OR valor=378 OR valor= '4.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'fugas_silenciador',
'NO' AS 'accesorios_deformaciones_obstrucciones_tubo_escape',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=331 OR valor = '4.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'ausencia_tapa_combustible_fugas',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=331 OR valor = '3.1.1.1.5')  order by 1 desc limit 1),'NO') AS 'ausencia_mal_estado_filtro_aire',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=330 OR valor = '4.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'ausencia_tapa_aceite_fugas_aceite',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=369 OR valor = '4.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'salidas_adicionales_diseno',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=331 OR valor = '3.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'pcv',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=333 OR valor = '4.1.1.1.7') order by 1 desc LIMIT 1),'NO') AS 'presencia_humo_negro_azul',
'null' AS 'dispositivos_alteran_rpm',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=332 OR valor = '4.1.1.1.5')  order by 1 desc limit 1),'NO')  AS 'revoluciones_inestables',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=331 OR valor = '3.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'falla_sistema_refrigeracion',
if(v.scooter=0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'0') AS 'temperatura_inicial_motor',
if(v.scooter=0, IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='temperatura_aceite' ORDER BY 1 DESC LIMIT 1),'---'),'0') AS 'temperatura_final_motor',
'null' AS 'indicacion_mal_funcionamiento_motor',
'null' AS 'sistema_control_velocidad_motor',
'null' AS 'falla_temperatura_motor',
'null' AS 'inestabilidad_durante_ciclos_medicion',
'null' AS 'diferencias_aritmeticas',
'null' AS 'velocidad_no_alcanzada_5_seg',
'null' AS 'rpm_velocidad_gobernada',
'null' AS 'falla_subita_motor',
'null' AS 'resultado_ciclo_preliminar',
ifnull((select valor from resultados where idprueba=p.idprueba and tiporesultado='rpm_ralenti' order by 1 desc limit 1),'0') AS 'rpm_ralenti_ciclo_preliminar',
'null' AS 'rpm_gobernada_ciclo_preliminar',
'null' AS 'resultado_opacidad_primer_ciclo',
'null' AS 'rpm_ralenti_primer_ciclo',
'null' AS 'rpm_gobernada_primer_ciclo',
'null' AS 'resultado_opacidad_segundo_ciclo',
'null' AS 'rpm_ralenti_segundo_ciclo',
'null' AS 'rpm_gobernada_segundo_ciclo',
'null' AS 'resultado_opacidad_tercer_ciclo',
'null' AS 'rpm_ralenti_tercer_ciclo',
'null' AS 'rpm_gobernada_tercer_ciclo',
'null' AS 'resultado_final',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_ralenti' order by 1 desc limit 1),'0') AS 'hc_ralenti',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_ralenti' order by 1 desc limit 1),'0') AS 'co_ralenti',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_ralenti' order by 1 desc limit 1),'0') AS 'co2_ralenti',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_ralenti' order by 1 desc limit 1),'0') AS 'o2_ralenti',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='rpm_crucero' order by 1 desc limit 1),'0') AS 'rpm_crucero',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='hc_crucero' order by 1 desc limit 1),'0') AS 'hc_crucero',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co_crucero' order by 1 desc limit 1),'0') AS 'co_crucero',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='co2_crucero' order by 1 desc limit 1),'0') AS 'co2_crucero',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and tiporesultado='o2_crucero' order by 1 desc limit 1),'0') AS 'o2_crucero',
IF(EXISTS(SELECT valor FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='observaciones' AND valor='DILUSION EXCESIVA' ORDER BY 1 DESC LIMIT 1),'Si','No') AS 'presencia_dilucion',
IF(p.estado = 1 OR p.estado = 3,
   IF(
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')) OR
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=368 OR valor= '1.2.3.4.1')) OR
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND valor=349) OR
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' AND valor >= '3.5'),
      
      CONCAT(
         '[',
         (
            IFNULL((SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1') LIMIT 1), 0) +
            IFNULL((SELECT 3 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=368 OR valor= '1.2.3.4.1') LIMIT 1), 0) +
            IFNULL((SELECT 2 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND valor=349 LIMIT 1), 0) +
            IFNULL((SELECT 3 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3') LIMIT 1), 0) +
            IFNULL((SELECT 4 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4') LIMIT 1), 0) +
            IFNULL((SELECT 5 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2') LIMIT 1), 0) +
            IFNULL((SELECT 7 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') LIMIT 1), 0) +
            IFNULL((SELECT 8 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10') LIMIT 1), 0) +
            IF(v.tiempos = 2,
               (
                  IFNULL((SELECT 13 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='co_ralenti' AND valor >= '3.5' LIMIT 1), 0) +
                  IFNULL((SELECT 14 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='hc_ralenti' AND valor >= '8000' LIMIT 1), 0) +
                  IFNULL((SELECT 15 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='co_ralenti' AND valor >= '3.5' LIMIT 1), 0) +
                  IFNULL((SELECT 16 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='hc_ralenti' AND valor >= '1600' LIMIT 1), 0)
               ),
               0
            ) +
            IF(v.tiempos = 4,
               (
                  IFNULL((SELECT 17 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' AND valor >= '3.5' LIMIT 1), 0) +
                  IFNULL((SELECT 18 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' AND valor >= '1300' LIMIT 1), 0)
               ),
               0
            )
         ),
         ']'
      ),
      '[0]'
   ),
   '[0]'  
) AS 'causa_rechazo',
if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'concepto_tecnico_vehiculo',

'Resolucion 762 del 2022' AS 'resolucion_limites',
'2025/07/01' AS 'fecha_actualizacion_equipo'
                        from
                        vehiculos v,hojatrabajo h, pruebas p
                        where
                         v.idvehiculo=h.idvehiculo and
                        h.idhojapruebas=p.idhojapruebas and
                      p.idprueba = $idprueba
                
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }


    public function informe_bogota_DieselWeb($idconf_maquina, $idprueba)

    {
        $consulta = <<<EOF
              SELECT
'60' AS  'id_programa',
'1' AS 'tipo_ciclo',
CASE DAYOFWEEK(p.fechafinal)
    WHEN 1 THEN '7'
    WHEN 2 THEN '1'
    WHEN 3 THEN '2'
    WHEN 4 THEN '3'
    WHEN 5 THEN '4'
    WHEN 6 THEN '5'
    WHEN 7 THEN '6'
  END AS 'dia_semana',
IFNULL(
  REGEXP_REPLACE(
    (SELECT c.nombre_cda FROM cda c),
    '[áéíóúñ.]', ''),
  '') AS 'nombre_entidad_cda',
IFNULL((SELECT s.clase FROM sede s),'') AS 'clase_cda',  
IFNULL((SELECT c.numero_id FROM cda c),'') AS 'nit',
IFNULL((SELECT ci.cod_ciudad FROM ciudades ci, sede s WHERE ci.cod_ciudad = s.cod_ciudad LIMIT 1),'') AS 'ciudad',
IFNULL((SELECT s.direccion FROM  sede s LIMIT 1),'') AS 'direccion',
IFNULL((SELECT s.telefono_uno FROM  sede s LIMIT 1),'') AS 'telefono',
IFNULL((SELECT CONCAT(u.nombres , ' ', u.apellidos)  FROM usuarios u WHERE u.idperfil = 7 LIMIT 1),'---') AS 'persona_contacto_cda',
IFNULL((SELECT concat(u.nombres,' ',u.apellidos) FROM usuarios u WHERE u.IdUsuario = p.idusuario LIMIT 1 ),'---') AS 'inspector_realiza_prueba',
IFNULL((SELECT u.identificacion FROM usuarios u WHERE u.IdUsuario = p.idusuario LIMIT 1 ),'---') AS 'id_inspector_prueba',
IFNULL((SELECT c.numero_resolucion FROM cda c LIMIT 1),'') AS 'numero_resolucion',
IFNULL((SELECT DATE_FORMAT(c.fecha_resolucion, '%Y/%m/%d') FROM cda c LIMIT 1),'') AS 'fecha_resolucion',
'' AS 'expediente_autoridad_ambiental',
'' AS 'total_equipos_opacimetros',
'' AS 'total_equipos_analizadores_chispa',
'' AS 'total_equipos_analizadores_motos_4t',
'' AS 'total_equipos_analizadores_motos_2t',

'' AS 'vr_pef_ltoe',
'' AS 'numero_serie_banco',
'' AS 'numero_serie_fisico',
'' AS 'numero_serie_electronico',
'' AS 'marca_equipo',


IFNULL((SELECT c.span_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_bajo_hc',
IFNULL((SELECT c.cal_bajo_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_bajo_hc',   
IFNULL((SELECT c.span_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_bajo_co',
IFNULL((SELECT c.cal_bajo_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_bajo_co',
IFNULL((SELECT c.span_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_bajo_co2',
IFNULL((SELECT c.cal_bajo_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_bajo_co2',
IFNULL((SELECT c.span_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_alto_hc',
IFNULL((SELECT c.cal_alto_hc FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_alto_hc',
IFNULL((SELECT c.span_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_alto_co',
IFNULL((SELECT c.cal_alto_co FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_alto_co',
IFNULL((SELECT c.span_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_span_alto_co2',
IFNULL((SELECT c.cal_alto_co2 FROM control_calibracion c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.resultado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_de_vr_span_alto_co2',
IFNULL((SELECT c.valor1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_primer_punto_linealidad',
IFNULL((SELECT c.lectura1 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_primer_punto_linealidad',
IFNULL((SELECT c.valor2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_segundo_punto_linealidad',
IFNULL((SELECT c.lectura2 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_segundo_punto_linealidad',
IFNULL((SELECT c.valor3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_tercer_punto_linealidad',
IFNULL((SELECT c.lectura3 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_tercer_punto_linealidad',
IFNULL((SELECT c.valor4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'valor_cuarto_punto_linealidad',
IFNULL((SELECT c.lectura4 FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC  limit 1),'0') AS 'resultado_cuarto_punto_linealidad',
IFNULL((SELECT DATE_FORMAT(c.fecha, '%Y/%m/%d %H:%i:%s') FROM control_linealidad c WHERE c.fecha < p.fechafinal AND c.idmaquina = p.idmaquina AND  c.aprobado = 'S' ORDER BY c.fecha DESC limit 1),'0') AS 'fecha_hora_ultima_verificacion_ajuste',

'' AS 'nombre_software',
'' AS 'version_software',
p.idprueba AS 'numero_consecutivo_prueba',
DATE_FORMAT(p.fechainicial, '%Y/%m/%d %H:%i:%s') AS 'fecha_hora_inicio_prueba',
DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s') AS 'fecha_hora_final_prueba',
if(p.estado = 5, DATE_FORMAT(p.fechafinal, '%Y/%m/%d %H:%i:%s'), '') AS 'fecha_hora_aborto_prueba',
IFNULL((SELECT if((r.valor = 1 AND v.scooter = 0 AND v.convertidor = 0), '1',if((r.valor = 2 AND v.scooter = 0 AND v.convertidor = 0),'2',if(v.scooter =1,'---', if(v.convertidor =1,'3','---')))) FROM resultados r WHERE r.idprueba=p.idprueba AND r.tiporesultado='Metodo_Medicion_Temp'order by 1 desc limit 1),'2') AS 'metodo_medicion_temperatura_motor',
IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='temperatura_ambiente' OR idconfig_prueba = 200)  limit 1),'---') AS 'temperatura_ambiente',
IFNULL((select valor from resultados where idprueba=p.idprueba AND (tiporesultado='humedad' OR idconfig_prueba = 201)   limit 1),'---') AS 'humedad_relativa',
if(p.estado = 5,
IFNULL((SELECT r.valor FROM resultados r WHERE r.idprueba = p.idprueba AND r.idconfig_prueba = 700),''),
'') AS 'causal_aborto_analisis',
IFNULL((SELECT concat(cl.nombre1,' ',ifnull(cl.nombre2,''),' ',cl.apellido1,' ',ifnull(cl.apellido2,'')) FROM clientes cl WHERE v.idcliente = cl.idcliente LIMIT 1),'') AS 'nombre_razon_social_propietario',
IFNULL((SELECT ti.id_mintransporte  FROM clientes cl, tipo_identificacion ti WHERE v.idcliente = cl.idcliente AND cl.tipo_identificacion = ti.tipo_identificacion  LIMIT 1),'') AS 'tipo_documento',
IFNULL((SELECT cl.numero_identificacion  FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'numero_documento',
IFNULL((SELECT cl.direccion  FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'direccion_propietario',
IFNULL((SELECT cl.telefono1  FROM clientes cl WHERE v.idcliente = cl.idcliente  LIMIT 1),'') AS 'telefono_propietario',
IFNULL((SELECT ci.cod_ciudad  FROM clientes cl, ciudades ci WHERE v.idcliente = cl.idcliente AND ci.cod_ciudad = cl.cod_ciudad  LIMIT 1),'') AS 'ciudad',
'NA' AS 'nombre_empresa',
CASE 
    WHEN v.migrateLineaMarca <> 1 THEN
   		IFNULL((SELECT lr.idlineaRUNT FROM linearunt lr WHERE lr.idlineaRUNT=v.idlinea LIMIT 1),'SIN LINEA')
    ELSE 
        IFNULL((SELECT nl.codigo_ws FROM newlineas nl WHERE nl.idlineas=v.idlinea LIMIT 1),'SIN LINEA')
END as linea,
CASE 
    WHEN v.migrateLineaMarca <> 1 THEN
        IFNULL((SELECT mr.idmarcaRUNT FROM marcarunt mr WHERE mr.idmarcaRUNT=(SELECT lr.idmarcarunt FROM linearunt lr WHERE lr.idlineaRUNT=v.idlinea)),0)
    ELSE 
        IFNULL((SELECT nm.idmarcas FROM newmarcas nm WHERE nm.idmarcas=(SELECT nl.idmarcas FROM newlineas nl WHERE nl.idlineas=v.idlinea)),0)
END AS marca,
v.ano_modelo AS 'ano_modelo',
v.numero_placa AS 'placa',
v.cilindraje AS 'cilindraje',
if(v.scooter = 1, '2', '1') AS 'diseno',
if(v.tiempos = 2, '2', '1' ) AS 'tipo_motor',
v.idclase AS 'clase',
v.idservicio AS 'servicio',
IFNULL((SELECT mo.modo_transporte FROM modoTransporte mo WHERE v.idmodoTransporte = mo.idmodoTransporte LIMIT 1),'1') AS 'modo_transporte',
IFNULL((SELECT t.idtipocombustible FROM tipo_combustible t WHERE v.idtipocombustible = t.idtipocombustible LIMIT 1), '') AS 'combustible',
v.numejes AS 'numero_ejes',
v.num_pasajeros AS 'capacidad',
v.numero_motor AS 'numero_motor',
v.numero_vin AS 'numero_vin_serie',
v.numero_tarjeta_propiedad AS 'numero_licencia_transito',
v.kilometraje AS 'kilometraje',
'NO' AS 'modificaciones_motor',
v.potencia_motor AS 'potencia_motor',
IFNULL(( SELECT co.idhojapruebas FROM consecutivotc co WHERE co.idhojapruebas = h.idhojapruebas LIMIT 1),h.idhojapruebas) AS 'numero_rtm',
'NO' AS 'generadores_ruido',
IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'ausencia_silenciador',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'fugas_tubo_escape',
IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=348 OR valor= '2.1.1.1.1')  order by 1 desc limit 1),'NO') AS 'fugas_silenciador',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=352 OR valor = '2.1.1.1.5') order by 1 desc limit 1),'NO') AS 'accesorios_deformaciones_obstrucciones_tubo_escape',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=350 OR valor = '2.1.1.1.4')  order by 1 desc limit 1),'NO') AS 'ausencia_tapa_combustible_fugas',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=354 OR valor = '2.1.1.1.7')  order by 1 desc limit 1),'NO') AS 'ausencia_mal_estado_filtro_aire',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=351 OR valor = '2.1.1.1.3')  order by 1 desc limit 1),'NO') AS 'ausencia_tapa_aceite_fugas_aceite',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND  valor = '1.1.6.17.2'  order by 1 desc limit 1),'NO') AS 'salidas_adicionales_diseno',
'null' AS 'pcv',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND  valor = '3.1.1.1.9'  order by 1 desc limit 1),'NO') AS 'presencia_humo_negro_azul',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=379 OR valor = '2.1.1.1.8')  order by 1 desc limit 1),'NO') AS 'dispositivos_alteran_rpm',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND valor=147   order by 1 desc limit 1),'NO') AS 'revoluciones_inestables',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=355 OR valor  = '2.1.1.1.6')  order by 1 desc limit 1),'NO') AS 'falla_sistema_refrigeracion',
IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND (tiporesultado='temp_inicial' or idconfig_prueba = 224 ) ORDER BY 1 DESC LIMIT 1),'0') AS 'temperatura_inicial_motor',
IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND (tiporesultado='temp_final' or idconfig_prueba = 39) ORDER BY 1 DESC LIMIT 1),'0') AS 'temperatura_final_motor',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=405 or valor=505 or valor = '2.1.1.1.10')  order by 1 desc limit 1),'NO') AS 'indicacion_mal_funcionamiento_motor',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=405 OR valor = '2.1.1.1.10') and observacion='FALLA DEL SISTEMA DE REVOLUCIONES (GOBERNADOR)'  order by 1 desc limit 1),'NO') AS 'sistema_control_velocidad_motor',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND valor=341  order by 1 desc limit 1),'NO') AS 'falla_temperatura_motor',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=332 OR valor = 'RECHAZADO POR RPM FUERA DE RANGO O INESTABLE')  order by 1 desc limit 1),'NO') AS 'inestabilidad_durante_ciclos_medicion',
IFNULL((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=340 OR valor = '2.1.1.1.12') order by 1 desc limit 1),'NO') AS 'diferencias_aritmeticas',
ifnull((SELECT 'SI' from resultados where idprueba=p.idprueba and (tiporesultado='defecto' OR tiporesultado='T') AND (valor=358 OR valor  = '2.1.1.1.9')  order by 1 desc limit 1),'NO') AS 'velocidad_no_alcanzada_5_seg',
IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=41 ORDER BY 1 DESC LIMIT 1),'') AS 'rpm_velocidad_gobernada',
ifnull((select 'SI' from resultados where idprueba=p.idprueba and tiporesultado='defecto' AND (valor=357 OR valor = '2.1.1.1.13')  order by 1 desc limit 1),'NO') AS 'falla_subita_motor',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=501 order by 1 desc limit 1),'---') AS 'resultado_ciclo_preliminar',
IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=38 ORDER BY 1 DESC LIMIT 1),'---') AS 'rpm_ralenti_ciclo_preliminar',
IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=62 ORDER BY 1 DESC LIMIT 1),'---') AS 'rpm_gobernada_ciclo_preliminar',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=502 order by 1 desc limit 1),'---') AS 'resultado_opacidad_primer_ciclo',
IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=38 ORDER BY 1 DESC LIMIT 1),'---') AS 'rpm_ralenti_primer_ciclo',
ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=63 order by 1 desc limit 1),'---') AS 'rpm_gobernada_primer_ciclo',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=503 order by 1 desc limit 1),'---') AS 'resultado_opacidad_segundo_ciclo',
IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=38 ORDER BY 1 DESC LIMIT 1),'---') AS 'rpm_ralenti_segundo_ciclo',
ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=64 order by 1 desc limit 1),'---') AS 'rpm_gobernada_segundo_ciclo',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=504 order by 1 desc limit 1),'---') AS 'resultado_opacidad_tercer_ciclo',
IFNULL((SELECT valor FROM resultados WHERE idprueba=p.idprueba AND idconfig_prueba=38 ORDER BY 1 DESC LIMIT 1),'---') AS 'rpm_ralenti_tercer_ciclo',
ifnull((select valor from resultados where idprueba=p.idprueba and idconfig_prueba=65 order by 1 desc limit 1),'---') AS 'rpm_gobernada_tercer_ciclo',
ifnull((select ROUND(valor,2) from resultados where idprueba=p.idprueba and idconfig_prueba=505 order by 1 desc limit 1),'---') AS 'resultado_final',
'null' AS 'hc_ralenti',
'null' AS 'co_ralenti',
'null' AS 'co2_ralenti',
'null' AS 'o2_ralenti',
'null' AS 'rpm_crucero',
'null' AS 'hc_crucero',
'null' AS 'co_crucero',
'null' AS 'co2_crucero',
'null' AS 'o2_crucero',
'null' AS 'presencia_dilucion',
IF(p.estado = 1 OR p.estado = 3,
   IF(
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1')) OR
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=368 OR valor= '1.2.3.4.1')) OR
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND valor=349) OR
      EXISTS(SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' AND valor >= '3.5'),
      
      CONCAT(
         '[',
         (
            IFNULL((SELECT 1 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=348 OR valor= '2.1.1.1.1') LIMIT 1), 0) +
            IFNULL((SELECT 3 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=368 OR valor= '1.2.3.4.1') LIMIT 1), 0) +
            IFNULL((SELECT 2 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND valor=349 LIMIT 1), 0) +
            IFNULL((SELECT 3 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=351 OR valor = '2.1.1.1.3') LIMIT 1), 0) +
            IFNULL((SELECT 4 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=350 OR valor = '2.1.1.1.4') LIMIT 1), 0) +
            IFNULL((SELECT 5 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='defecto' AND (valor=353 OR valor = '2.1.1.1.2') LIMIT 1), 0) +
            IFNULL((SELECT 7 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='T' AND (valor=333 OR valor = '3.1.1.1.9') LIMIT 1), 0) +
            IFNULL((SELECT 8 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='T' AND (valor=332 OR valor = '3.1.1.1.10') LIMIT 1), 0) +
            IF(v.tiempos = 2,
               (
                  IFNULL((SELECT 13 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='co_ralenti' AND valor >= '3.5' LIMIT 1), 0) +
                  IFNULL((SELECT 14 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo <= 2009 AND tiporesultado='hc_ralenti' AND valor >= '8000' LIMIT 1), 0) +
                  IFNULL((SELECT 15 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='co_ralenti' AND valor >= '3.5' LIMIT 1), 0) +
                  IFNULL((SELECT 16 FROM resultados WHERE idprueba=p.idprueba AND v.ano_modelo >= 2010 AND tiporesultado='hc_ralenti' AND valor >= '1600' LIMIT 1), 0)
               ),
               0
            ) +
            IF(v.tiempos = 4,
               (
                  IFNULL((SELECT 17 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='co_ralenti' AND valor >= '3.5' LIMIT 1), 0) +
                  IFNULL((SELECT 18 FROM resultados WHERE idprueba=p.idprueba AND tiporesultado='hc_ralenti' AND valor >= '1300' LIMIT 1), 0)
               ),
               0
            )
         ),
         ']'
      ),
      '[0]'
   ),
   '[0]'  
) AS 'causa_rechazo',
if(p.estado=2,'1',if(p.estado=3 or p.estado=1,'2','3')) AS 'concepto_tecnico_vehiculo',
'Resolución 762 del 2022' AS 'resolucion_limites',
'2025/07/01' AS 'fecha_actualizacion_equipo'

                        from
                        vehiculos v,hojatrabajo h, pruebas p
                        where
                         v.idvehiculo=h.idvehiculo and
                        h.idhojapruebas=p.idhojapruebas and
                      p.idprueba = $idprueba
                
EOF;
        // $rta = $this->db->query($consulta);
        // if ($rta->num_rows() > 0) {
        //     $rta = $rta->result();
        //     return $rta[0];
        // } else {
        //     return [];
        // }
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }

    public function saveInfoEnvioBogota($placa, $idmaquina, $idprueba, $mensaje, $estado)
    {
        $data = array(
            'placa' => $placa,
            'idmaquina' => $idmaquina,
            'idprueba' => $idprueba,
            'mensaje' => $mensaje,
            'estado' => $estado
        );
        $this->db->insert('control_envio_api', $data);
    }

    public function updateInfoEnvioBogota($idcontrolenvioapi,  $mensaje, $estado)
    {
        $data = array(
            'mensaje' => $mensaje,
            'estado' => $estado
        );
        $this->db->where('idcontrolenvioapi', $idcontrolenvioapi);
        $this->db->update('control_envio_api', $data);
        return $this->db->affected_rows();
    }

    public function getPendientes()
    {
        $consulta = <<<EOF
             SELECT * FROM (
    SELECT 
        CASE
            WHEN v.idservicio = '1' THEN 
                CONCAT('<label style="border-radius: 6px; background: gold; color: black; font-size: 22px; font-weight: bold; border: solid black; padding: 7px"><strong>', v.numero_placa, '</strong></label>')
            WHEN v.idservicio = '2' THEN
                CONCAT('<label style="border-radius: 6px; background: white; color: black; font-size: 22px; font-weight: bold; border: solid black; padding: 7px"><strong>', v.numero_placa, '</strong></label>')
            WHEN v.idservicio = '3' THEN 
                CONCAT('<label style="border-radius: 6px; background: gold; color: black; font-size: 22px; font-weight: bold; border: solid black; padding: 7px"><strong>', v.numero_placa, '</strong></label>')
            WHEN v.idservicio = '4' THEN 
                CONCAT('<label style="border-radius: 6px; background: blue; color: white; font-size: 22px; font-weight: bold; border: solid whitesmoke; padding: 7px"><strong>', v.numero_placa, '</strong></label>')
            WHEN v.idservicio = '7' THEN 
                CONCAT('<label style="border-radius: 6px; background: blue; color: white; font-size: 22px; font-weight: bold; border: solid whitesmoke; padding: 7px"><strong>', v.numero_placa, '</strong></label>')
            ELSE 
                CONCAT('<label style="border-radius: 6px; background: gold; color: black; font-size: 22px; font-weight: bold; border: solid black; padding: 7px"><strong>', v.numero_placa, '</strong></label>')
        END AS placadata,
        v.tipo_vehiculo,
        v.idtipocombustible,
        c.*,
        ROW_NUMBER() OVER (PARTITION BY c.placa ORDER BY c.fecha DESC, c.idcontrolenvioapi DESC) as rn
    FROM control_envio_api c
    INNER JOIN vehiculos v ON v.numero_placa = c.placa
    WHERE c.estado = 0 
        AND NOT EXISTS (
            SELECT 1 
            FROM control_envio_api c2 
            WHERE c2.placa = c.placa 
            AND c2.estado = 1
        )
) ranked
WHERE rn = 1
ORDER BY fecha DESC;
                
EOF;
        $rta = $this->db->query($consulta);
        if ($rta->num_rows() > 0) {
            $rta = $rta->result();
            return $rta;
        } else {
            return [];
        }
    }
}
