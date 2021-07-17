<?php
    include 'conecta/funciones.php';
    include 'lib/nusoap.php';
    
    $namespace = "urn:simiservices";

    // create a new soap server
    $server = new soap_server();

    // configure our WSDL
    $server->configureWSDL("SimiServices");

    // set our namespace
    $server->wsdl->schemaTargetNamespace = $namespace;

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION PARA AUTENTICAR A CONTRIBUYENTE
    $server->wsdl->addComplexType('LoginInput','complexType','struct','all','',array('USUARIO'=>array('name'=>'USUARIO', 'type'=>'xsd:string'),'CLAVE'=>array('name'=>'CLAVE','type'=>'xsd:string')));
    $server->wsdl->addComplexType('LoginOutput','complexType','struct','all','',array('ACCESO' => array('name' => 'ACCESO','type' => 'xsd:int'),'USERADMIN' => array('name' => 'USERADMIN','type' => 'xsd:int')));
    $server->register('LoginContribuyente',array('logincontribuyente'=>'tns:LoginInput'),array('resultado'=>'tns:LoginOutput'),$namespace,$namespace.'#LoginContribuyente','rpc','encoded','');

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION DATOS CONTRIBUYENTE
    $server->wsdl->addComplexType('DatosContribuyenteInput','complexType','struct','all','',array( 'ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string')));
    $server->wsdl->addComplexType('DatosContribuyenteOutput','complexType','struct','all','',array( 'ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string'),'NOMBRE' => array('name' => 'NOMBRE','type' => 'xsd:string'),'DIRECCION' => array('name' => 'DIRECCION','type' => 'xsd:string'),'EMAIL' => array('name' => 'EMAIL','type' => 'xsd:string'),'TELEFONO' => array('name' => 'TELEFONO','type' => 'xsd:string'),'TIPODOC' => array('name' => 'TIPODOC','type' => 'xsd:string'),'DIAS' => array('name' => 'DIAS','type' => 'xsd:int'),'NUMDOC'=>array('name'=>'NUMDOC','type'=>'xsd:string')));
    $server->register('DatosContribuyente',array('contribuyente'=>'tns:DatosContribuyenteInput'),array('resultado'=>'tns:DatosContribuyenteOutput'),$namespace,false,'rpc','encoded','');

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION DETALLE DE ESTADO DE CUENTA CORRIENTE DETALLADO
    $server->wsdl->addComplexType('EstadoCtaDetalladoInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string'),'ANIO_INI' => array('name' => 'ANIO_INI','type' => 'xsd:string'),'ANIO_FIN' => array('name' => 'ANIO_FIN','type' => 'xsd:string'),'PREDIAL' => array('name' => 'PREDIAL','type' => 'xsd:string'),'ARBITRIO' => array('name' => 'ARBITRIO','type' => 'xsd:string'),'SERENAZGO' => array('name' => 'SERENAZGO','type' => 'xsd:string'),'FRACCIONAMIENTO' => array('name' => 'FRACCIONAMIENTO','type' => 'xsd:string')));
    $server->wsdl->addComplexType('EstadoCtaDetalladoOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:EstadoCtaDetalladoOutput[]')));
    $server->register('EstadoCuentaDetallado',array('estadocuentadetallado'=>'tns:EstadoCtaDetalladoInput'),array('resultado' => 'tns:EstadoCtaDetalladoOutput'),$namespace,$namespace.'#EstadoCtaDetallado','rpc','encoded','');  

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION LISTADO DE PAGOS POR CONTRIBUYENTE
    $server->wsdl->addComplexType('ListadoPagosInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string')));
    $server->wsdl->addComplexType('ListadoPagosOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ListadoPagosOutput[]')));
    $server->register('ListadoPagos',array('ListadoPagos'=>'tns:ListadoPagosInput'),array('resultado' => 'tns:ListadoPagosOutput'),$namespace,$namespace.'#ListadoPagos','rpc','encoded','');  

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION DETALLE DE PAGO DEL RECIBO
    $server->wsdl->addComplexType('DetallePagoInput','complexType','struct','all','',array('NRO_RECIBO' => array('name' => 'NRO_RECIBO','type' => 'xsd:string')));
    $server->wsdl->addComplexType('DetallePagoOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:DetallePagoOutput[]')));
    $server->register('DetallePago',array('DetallePago'=>'tns:DetallePagoInput'),array('resultado' => 'tns:DetallePagoOutput'),$namespace,$namespace.'#DetallePago','rpc','encoded','');

    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION LISTA DISTRITOS
    $server->wsdl->addComplexType('ListadoDistritoInput','complexType','struct','all','',array('NRO_RECIBO' => array('name' => 'NRO_RECIBO','type' => 'xsd:string')));
    $server->wsdl->addComplexType('ListadoDistritoOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ListadoDistritoOutput[]')));
    $server->register('ListadoDistrito',array('ListadoDistrito'=>'tns:ListadoDistritoInput'),array('resultado' => 'tns:ListadoDistritoOutput'),$namespace,$namespace.'#ListadoDistrito','rpc','encoded','');  

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION GENERAR LIQUIDACION
    $server->wsdl->addComplexType('GenerarLiquidacionInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string'),'IP_CONTRIB' => array('name' => 'IP_CONTRIB','type' => 'xsd:string'),'RECIBOS' => array('name' => 'RECIBOS','type'=>'xsd:string')));
    $server->wsdl->addComplexType('GenerarLiquidacionOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:GenerarLiquidacionOutput[]')));    
    $server->register('GenerarLiquidacion',array('GenerarLiquidacion'=>'tns:GenerarLiquidacionInput'),array('resultado' => 'tns:GenerarLiquidacionOutput'),$namespace,$namespace.'#GenerarLiquidación','rpc','encoded','');

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION GENERAR PAGO
    $server->wsdl->addComplexType('GenerarPagoInput','complexType','struct','all','',array('CODIGO_LIQUIDACION' => array('name' => 'CODIGO_LIQUIDACION','type' => 'xsd:string'),'ESTADO' => array('name' => 'ESTADO','type' => 'xsd:string'), 'CODIGOALUMNO'=> array('name'=> 'CODIGOALUMNO', 'type'=> 'xsd:string')));
    $server->wsdl->addComplexType('GenerarPagoOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:GenerarPagoOutput[]')));
    $server->register('GenerarPago',array('GenerarPago'=>'tns:GenerarPagoInput'),array('resultado' => 'tns:GenerarPagoOutput'),$namespace,$namespace.'#GenerarPago','rpc','encoded','');
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION CAMBIO CLAVE
    $server->wsdl->addComplexType('CambioClaveInput','complexType','struct','all','',array('USUARIO' => array('name' => 'USUARIO','type' => 'xsd:string'),'CLAVE_ANTERIOR' => array('name' => 'CLAVE_ANTERIOR','type' => 'xsd:string'),'CLAVE_NUEVA' => array('name' => 'CLAVE_NUEVA','type' => 'xsd:string')));
    $server->wsdl->addComplexType('CambioClaveOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:CambioClaveOutput[]')));
    $server->register('CambioClave',array('CambioClave'=>'tns:CambioClaveInput'),array('resultado' => 'tns:CambioClaveOutput'),$namespace,$namespace.'#CambioClave','rpc','encoded','');
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION VERIFICAR NUEVO USUARIO
    $server->wsdl->addComplexType('NuevoUsuarioInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string'),'NRODOI' => array('name' => 'NRODOI','type' => 'xsd:string'),'CONTRIB' => array('name' => 'CONTRIB','type'=>'xsd:string'),'EMAIL' => array('name' => 'EMAIL','type'=>'xsd:string'),'TELEFONO' => array('name' => 'TELEFONO','type'=>'xsd:string')));
    $server->wsdl->addComplexType('NuevoUsuarioOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:NuevoUsuarioOutput[]')));    
    $server->register('NuevoUsuario',array('NuevoUsuario'=>'tns:NuevoUsuarioInput'),array('resultado' => 'tns:NuevoUsuarioOutput'),$namespace,$namespace.'#NuevoUsuario','rpc','encoded','');

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION CLAVE NUEVO USUARIO
    $server->wsdl->addComplexType('NuevaClaveUsuarioInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string'),'ID_USUARIO' => array('name' => 'ID_USUARIO','type' => 'xsd:string'),'CLAVE_NUEVO' => array('name' => 'CLAVE_NUEVO','type' => 'xsd:string')));
    $server->wsdl->addComplexType('NuevaClaveUsuarioOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:NuevaClaveUsuarioOutput[]')));
    $server->register('NuevaClaveUsuario',array('NuevaClaveUsuario'=>'tns:NuevaClaveUsuarioInput'),array('resultado' => 'tns:NuevaClaveUsuarioOutput'),$namespace,$namespace.'#NuevaClaveUsuario','rpc','encoded','');

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION GENERA NUEVA CLAVE
    $server->wsdl->addComplexType('GeneraNuevaClaveInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string'),'EMAIL' => array('name' => 'EMAIL','type' => 'xsd:string')));
    $server->wsdl->addComplexType('GeneraNuevaClaveOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:GeneraNuevaClaveOutput[]')));
    $server->register('GeneraNuevaClave',array('GeneraNuevaClave'=>'tns:GeneraNuevaClaveInput'),array('resultado' => 'tns:GeneraNuevaClaveOutput'),$namespace,$namespace.'#GeneraNuevaClave','rpc','encoded','');

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION ACTUALIZA DATOS USUARIO
    $server->wsdl->addComplexType('ActualizaDatosUsuarioInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string'),'CLAVE' => array('name' => 'CLAVE','type' => 'xsd:string'),'EMAIL' => array('name' => 'EMAIL','type' => 'xsd:string'),'TELEFONO' => array('name' => 'TELEFONO','type' => 'xsd:string')));
    $server->wsdl->addComplexType('ActualizaDatosUsuarioOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ActualizaDatosUsuarioOutput[]')));
    $server->register('ActualizaDatosUsuario',array('ActualizaDatosUsuario'=>'tns:ActualizaDatosUsuarioInput'),array('resultado' => 'tns:ActualizaDatosUsuarioOutput'),$namespace,$namespace.'#ActualizaDatosUsuario','rpc','encoded','');

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//FUNCION VALIDAR DESCUENTO
    $server->wsdl->addComplexType('VerificaDescuentoInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string'),'IP_CONTRIB' => array('name' => 'IP_CONTRIB','type' => 'xsd:string'),'RECIBOS' => array('name' => 'RECIBOS','type'=>'xsd:string'), 'CODIGOALUMNO' => array('name' => 'CODIGOALUMNO', 'type'=> 'xsd:string')));
    $server->wsdl->addComplexType('VerificaDescuentoOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:VerificaDescuentoOutput[]')));    
    $server->register('VerificaDescuento',array('VerificaDescuento'=>'tns:VerificaDescuentoInput'),array('resultado' => 'tns:VerificaDescuentoOutput'),$namespace,$namespace.'#VerificaDescuento','rpc','encoded','');

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//FUNCION GUARDAR BENEFICIO 
    $server->wsdl->addComplexType('GuardarBeneficioInput','complexType','struct','all','',array('IDBENEFICIO' => array('name' => 'IDBENEFICIO','type' => 'xsd:int'),'CODBENEF' => array('name' => 'CODBENEF','type' => 'xsd:string'),'ORDENANZA' => array('name' => 'ORDENANZA','type' => 'xsd:string'),'BENEFICIO' => array('name' => 'BENEFICIO','type'=>'xsd:string'),'FECPUBLICA' => array('name' => 'FECPUBLICA','type'=>'xsd:string'),'FECINICIO' => array('name' => 'FECINICIO','type'=>'xsd:string'),'FECFINAL' => array('name' => 'FECFINAL','type'=>'xsd:string'),'DESCRIPCION' => array('name' => 'DESCRIPCION','type'=>'xsd:string'),'PAGOANIO' => array('name' => 'PAGOANIO','type'=>'xsd:string'),'PAGOTRIM' => array('name' => 'PAGOTRIM','type'=>'xsd:string'),'PAGOTOTAL' => array('name' => 'PAGOTOTAL','type'=>'xsd:string'),'ANIOPAGO' => array('name' => 'ANIOPAGO','type'=>'xsd:string'),'DEUDAANTERIOR' => array('name' => 'DEUDAANTERIOR','type'=>'xsd:string'),'DEUDAXPREDIO' => array('name' => 'DEUDAXPREDIO','type'=>'xsd:string'),'DEUDAFECHAORIGEN' => array('name' => 'DEUDAFECHAORIGEN','type'=>'xsd:string'),'FECHAORIGENINICIO' => array('name' => 'FECHAORIGENINICIO','type'=>'xsd:string'),'FECHAORIGENFINAL' => array('name' => 'FECHAORIGENFINAL','type'=>'xsd:string'),'PAGOCOSTAS' => array('name' => 'PAGOCOSTAS','type'=>'xsd:string'),'LISTADOCOSTAS' => array('name' => 'LISTADOCOSTAS','type'=>'xsd:string'),'PAGOLISTADO' => array('name' => 'PAGOLISTADO','type'=>'xsd:string'),'LISTADOCONTRIB' => array('name' => 'LISTADOCONTRIB','type'=>'xsd:string'),'USUARIO' => array('name' => 'USUARIO','type'=>'xsd:string'),'ESTACION' => array('name' => 'ESTACION','type'=>'xsd:string')));
    $server->wsdl->addComplexType('GuardarBeneficioOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:GuardarBeneficioOutput[]')));    
    $server->register('GuardarBeneficio',array('GuardarBeneficio'=>'tns:GuardarBeneficioInput'),array('resultado' => 'tns:GuardarBeneficioOutput'),$namespace,$namespace.'#GuardarBeneficio','rpc','encoded','');
	
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	//FUNCION GUARDAR DESCUENTO 
    $server->wsdl->addComplexType('GuardarDescuentoArray','complexType','struct','all','',array('IDBENEFICIO' => array('name' => 'IDBENEFICIO','type' => 'xsd:int'),'ANIO' => array('name' => 'ANIO','type' => 'xsd:string'),'IPAJUSTE' => array('name' => 'IPAJUSTE','type'=>'xsd:string'),'IPGASTO' => array('name' => 'IPGASTO','type'=>'xsd:string'),'IPPENSION' => array('name' => 'IPPENSION','type'=>'xsd:string'),'IPMORAS' => array('name' => 'IPMORAS','type'=>'xsd:string'),'LPINSOL' => array('name' => 'LPINSOL','type'=>'xsd:string'),'LPMORAS' => array('name' => 'LPMORAS','type'=>'xsd:string'),'PJINSOL' => array('name' => 'PJINSOL','type'=>'xsd:string'),'PJMORAS' => array('name' => 'PJMORAS','type'=>'xsd:string'),'SEINSOL' => array('name' => 'SEINSOL','type'=>'xsd:string'),'SEMORAS' => array('name' => 'SEMORAS','type'=>'xsd:string'),'FRMORAS' => array('name' => 'FRMORAS','type'=>'xsd:string'),'COSTAS' => array('name' => 'COSTAS','type'=>'xsd:string'),'ELIMINADO' => array('name' => 'ELIMINADO','type'=>'xsd:string')));
    $server->wsdl->addComplexType('GuardarDescuentoInput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:GuardarDescuentoArray[]') ),'tns:GuardarDescuentoArray');
    $server->wsdl->addComplexType('GuardarDescuentoOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:GuardarDescuentoOutput[]')));    
    $server->register('GuardarDescuento',array('guardardescuento'=>'tns:GuardarDescuentoInput'),array('resultado' => 'tns:GuardarDescuentoOutput'),$namespace,$namespace.'#GuardarDescuento','rpc','encoded','');

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION LISTADO DE ORDENANZAS
    $server->wsdl->addComplexType('ListadoBeneficiosInput','complexType','struct','all','',array('IDBENEFICIO' => array('name' => 'IDBENEFICIO','type' => 'xsd:int')));
    $server->wsdl->addComplexType('ListadoBeneficiosOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ListadoBeneficiosOutput[]')));
    $server->register('ListadoBeneficios',array('ListadoBeneficios'=>'tns:ListadoBeneficiosInput'),array('resultado' => 'tns:ListadoBeneficiosOutput'),$namespace,$namespace.'#ListadoBeneficios','rpc','encoded','');  

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//FUNCION CONSULTA DESCUENTO 
    $server->wsdl->addComplexType('ConsultaBeneficioInput','complexType','struct','all','',array('IDBENEFICIO' => array('name' => 'IDBENEFICIO','type' => 'xsd:int')));
    $server->wsdl->addComplexType('ConsultaBeneficioOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ConsultaBeneficioOutput[]')));    
    $server->register('ConsultaBeneficio',array('ConsultaBeneficio'=>'tns:ConsultaBeneficioInput'),array('resultado' => 'tns:ConsultaBeneficioOutput'),$namespace,$namespace.'#ConsultaBeneficio','rpc','encoded','');

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	//FUNCION GUARDAR DESCUENT2 
    //$server->wsdl->addComplexType('GuardarDescuent2Input','complexType','array','','SOAP-ENC:Array',array(),array('IDDESCUENTO' => array('name' => 'IDDESCUENTO','type' => 'xsd:int'),'IDBENEFICIO' => array('name' => 'IDBENEFICIO','type' => 'xsd:int'),'ANIO' => array('name' => 'ANIO','type' => 'xsd:string'),'IPAJUSTE' => array('name' => 'IPAJUSTE','type'=>'xsd:string'),'IPGASTO' => array('name' => 'IPGASTO','type'=>'xsd:string'),'IPPENSION' => array('name' => 'IPPENSION','type'=>'xsd:string'),'IPMORAS' => array('name' => 'IPMORAS','type'=>'xsd:string'),'LPINSOL' => array('name' => 'LPINSOL','type'=>'xsd:string'),'LPMORAS' => array('name' => 'LPMORAS','type'=>'xsd:string'),'PJINSOL' => array('name' => 'PJINSOL','type'=>'xsd:string'),'PJMORAS' => array('name' => 'PJMORAS','type'=>'xsd:string'),'SEINSOL' => array('name' => 'SEINSOL','type'=>'xsd:string'),'SEMORAS' => array('name' => 'SEMORAS','type'=>'xsd:string'),'FRMORAS' => array('name' => 'FRMORAS','type'=>'xsd:string'),'ELIMINADO' => array('name' => 'ELIMINADO','type'=>'xsd:int')));
	$server->wsdl->addComplexType('GuardarDescuentoInput','complexType','struct','all','',array('IDBENEFICIO' => array('name' => 'IDBENEFICIO','type' => 'xsd:int'),'ANIO' => array('name' => 'ANIO','type' => 'xsd:string'),'IPAJUSTE' => array('name' => 'IPAJUSTE','type'=>'xsd:string'),'IPGASTO' => array('name' => 'IPGASTO','type'=>'xsd:string'),'IPPENSION' => array('name' => 'IPPENSION','type'=>'xsd:string'),'IPMORAS' => array('name' => 'IPMORAS','type'=>'xsd:string'),'LPINSOL' => array('name' => 'LPINSOL','type'=>'xsd:string'),'LPMORAS' => array('name' => 'LPMORAS','type'=>'xsd:string'),'PJINSOL' => array('name' => 'PJINSOL','type'=>'xsd:string'),'PJMORAS' => array('name' => 'PJMORAS','type'=>'xsd:string'),'SEINSOL' => array('name' => 'SEINSOL','type'=>'xsd:string'),'SEMORAS' => array('name' => 'SEMORAS','type'=>'xsd:string'),'FRMORAS' => array('name' => 'FRMORAS','type'=>'xsd:string'),'COSTAS' => array('name' => 'COSTAS','type'=>'xsd:string'),'ELIMINADO' => array('name' => 'ELIMINADO','type'=>'xsd:string')));
    //$server->wsdl->addComplexType('GuardarDescuent2Input','complexType','array','','SOAP-ENC:Array',array('IDDESCUENTO' => array('name' => 'IDDESCUENTO','type' => 'xsd:int'),'IDBENEFICIO' => array('name' => 'IDBENEFICIO','type' => 'xsd:int'),'ANIO' => array('name' => 'ANIO','type' => 'xsd:string'),'IPAJUSTE' => array('name' => 'IPAJUSTE','type'=>'xsd:string'),'IPGASTO' => array('name' => 'IPGASTO','type'=>'xsd:string'),'IPPENSION' => array('name' => 'IPPENSION','type'=>'xsd:string'),'IPMORAS' => array('name' => 'IPMORAS','type'=>'xsd:string'),'LPINSOL' => array('name' => 'LPINSOL','type'=>'xsd:string'),'LPMORAS' => array('name' => 'LPMORAS','type'=>'xsd:string'),'PJINSOL' => array('name' => 'PJINSOL','type'=>'xsd:string'),'PJMORAS' => array('name' => 'PJMORAS','type'=>'xsd:string'),'SEINSOL' => array('name' => 'SEINSOL','type'=>'xsd:string'),'SEMORAS' => array('name' => 'SEMORAS','type'=>'xsd:string'),'FRMORAS' => array('name' => 'FRMORAS','type'=>'xsd:string'),'ELIMINADO' => array('name' => 'ELIMINADO','type'=>'xsd:int')));
	$server->wsdl->addComplexType('GuardarDescuent2Output','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:GuardarDescuent2Output[]')));    
    $server->register('GuardarDescuent2',array('guardardescuent2'=>'tns:GuardarDescuent2Input'),array('resultado' => 'tns:GuardarDescuent2Output'),$namespace,$namespace.'#GuardarDescuent2','rpc','encoded','');

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//FUNCION ACTIVAR BENEFICIO 
    $server->wsdl->addComplexType('ActivarBeneficioInput','complexType','struct','all','',array('IDBENEFICIO' => array('name' => 'IDBENEFICIO','type' => 'xsd:int'),'ACTIVO' => array('name' => 'ACTIVO','type' => 'xsd:string'),'USUARIO' => array('name' => 'USUARIO','type'=>'xsd:string'),'ESTACION' => array('name' => 'ESTACION','type'=>'xsd:string')));
    $server->wsdl->addComplexType('ActivarBeneficioOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ActivarBeneficioOutput[]')));    
    $server->register('ActivarBeneficio',array('ActivarBeneficio'=>'tns:ActivarBeneficioInput'),array('resultado' => 'tns:ActivarBeneficioOutput'),$namespace,$namespace.'#ActivarBeneficio','rpc','encoded','');
	
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
	//FUNCION ESTADO DE CUENTA CORRIENTE DETALLADO
    $server->wsdl->addComplexType('EstCtaDetalladoInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string')));
    $server->wsdl->addComplexType('EstCtaDetalladoOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:EstCtaDetalladoOutput[]')));
    $server->register('EstCtaDetallado',array('estctadetallado'=>'tns:EstCtaDetalladoInput'),array('resultado' => 'tns:EstCtaDetalladoOutput'),$namespace,$namespace.'#EstCtaDetallado','rpc','encoded','');  

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------


    //FUNCION ESTADO DE CUENTA CORRIENTE GENERAL
    $server->wsdl->addComplexType('EstCtaGeneralInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string')));
    $server->wsdl->addComplexType('EstCtaGeneralOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:EstCtaGeneralOutput[]')));
    $server->register('EstCtaGeneral',array('estctageneral'=>'tns:EstCtaGeneralInput'),array('resultado' => 'tns:EstCtaGeneralOutput'),$namespace,$namespace.'#EstCtaGeneral','rpc','encoded','');  

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------


    //FUNCION ESTADO DE CUENTA CORRIENTE CONSOLIDADO
    $server->wsdl->addComplexType('EstCtaConsolidadoInput','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string')));
    $server->wsdl->addComplexType('EstCtaConsolidadoOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:EstCtaConsolidadoOutput[]')));
    $server->register('EstCtaConsolidado',array('estctaconsolidado'=>'tns:EstCtaConsolidadoInput'),array('resultado' => 'tns:EstCtaConsolidadoOutput'),$namespace,$namespace.'#EstCtaConsolidado','rpc','encoded','');  


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------


    //FUNCION ESTADO DE CUENTA CORRIENTE CONSOLIDADO SIN COD CATASTRAL
    $server->wsdl->addComplexType('EstCtaConsolidado2Input','complexType','struct','all','',array('ID_CONTRIB' => array('name' => 'ID_CONTRIB','type' => 'xsd:string')));
    $server->wsdl->addComplexType('EstCtaConsolidado2Output','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:EstCtaConsolidado2Output[]')));
    $server->register('EstCtaConsolidado2',array('estctaconsolidado2'=>'tns:EstCtaConsolidado2Input'),array('resultado' => 'tns:EstCtaConsolidado2Output'),$namespace,$namespace.'#EstCtaConsolidado2','rpc','encoded','');  


    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION DATOS ALUMNO
    $server->wsdl->addComplexType('DatosAlumnoInput','complexType','struct','all','',array( 'TYPE' => array('name' => 'TYPE','type' => 'xsd:string'), 'QUERY' => array('name' => 'QUERY', 'type' => 'xsd:string')));
    $server->wsdl->addComplexType('DatosAlumnoOutput','complexType','struct','all','',array( 'CodigoAlumno' => array('name' => 'CodigoAlumno','type' => 'xsd:string'),
        'v_apepat' => array('name' => 'v_apepat', 'type' => 'xsd:string'),
        'v_apemat' => array('name' => 'v_apemat', 'type' => 'xsd:string'),
        'v_nombre' => array('name' => 'v_nombre', 'type' => 'xsd:string'),
        'vrazonsocial' => array('name' => 'vrazonsocial', 'type' => 'xsd:string'),
        'iid_sexo' => array('name' => 'iid_sexo', 'type' => 'xsd:int'),
        'telefono' => array('name' => 'telefono', 'type' => 'xsd:string'),
        'Correo' => array('name' => 'Correo', 'type' => 'xsd:string'),
        'Celular' => array('name' => 'Celular', 'type' => 'xsd:string'),
        'numeroX' => array('name' => 'numeroX', 'type' => 'xsd:string'),
        'numero' => array('name' => 'numero', 'type' => 'xsd:string'),
        'FechaNacimiento' => array('name' => 'FechaNacimiento', 'type' => 'xsd:string'),
        'edad' => array('name' => 'edad', 'type' => 'xsd:int'),
        'CodigoTA' => array('name' => 'CodigoTA', 'type' => 'xsd:string'),
        'iddpto' => array('name' => 'iddpto', 'type' => 'xsd:int'),
        'idprov' => array('name' => 'idprov', 'type' => 'xsd:int'),
        'id_distrito' => array('name' => 'iddistrito', 'type' => 'xsd:int'),
        'direccion' => array('name' => 'direccion', 'type' => 'xsd:string'),
        'Estado' => array('name' => 'Estado', 'type' => 'xsd:int'),
        'iid_persona' => array('name' => 'iid_persona', 'type' => 'xsd:int'),
        'NroSeguro' => array('name' => 'NroSeguro', 'type' => 'xsd:string'),
        'CodigoEC' => array('name' => 'CodigoEC', 'type' => 'xsd:string'),
        'CodigoParentesco' => array('name' => 'CodigoParentesco', 'type' => 'xsd:string'),
        'IdSede' => array('name' => 'IdSede', 'type' => 'xsd:int'),
        'NombreSede' => array('name' => 'NombreSede', 'type' => 'xsd:string')));
    $server->register('DatosAlumno',array('alumno'=>'tns:DatosAlumnoInput'),array('resultado'=>'tns:DatosAlumnoOutput'),$namespace,false,'rpc','encoded','');


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION GUARDAR ALUMNO
    $server->wsdl->addComplexType('GrabarAlumnoInput','complexType','struct','all','',array('CodigoAlumno' => array('name' => 'CodigoAlumno', 'type' => 'xsd:string'),
    'iid_persona' => array('name' => 'iid_persona', 'type' => 'xsd:int'),
    'v_nombre' => array('name' => 'v_nombre', 'type' => 'xsd:string'),
    'v_apepat' => array('name' => 'v_apepat', 'type' => 'xsd:string'),
    'v_apemat' => array('name' => 'v_apemat', 'type' => 'xsd:string'),
    'iid_sexo' => array('name' => 'iid_sexo', 'type' => 'xsd:int'),
    'telefono' => array('name' => 'telefono', 'type' => 'xsd:string'),
    'celular' => array('name' => 'celular', 'type' => 'xsd:string'),
    'Correo' => array('name' => 'Correo', 'type' => 'xsd:string'),
    'numero' => array('name' => 'numero', 'type' => 'xsd:string'),
    'FechaNacimiento' => array('name' => 'FechaNacimiento', 'type' => 'xsd:string'),
    'edad' => array('name' => 'edad', 'type' => 'xsd:int'),
    'idubigeo' => array('name' => 'idubigeo', 'type' => 'xsd:string'),
    'direccion' => array('name' => 'direccion', 'type' => 'xsd:string'),
    'code_email' => array('name' => 'code_email', 'type' => 'xsd:string'),
    'usuario' => array('name' => 'usuario', 'type' => 'xsd:string'),
    'ip' => array('name' => 'ip', 'type' => 'xsd:string')));
    $server->wsdl->addComplexType('GrabarAlumnoOutput','complexType','struct','all','',array('RPTA' => array('name' => 'RPTA','type' => 'xsd:int')));
    $server->register('GrabarAlumno',array('GrabarAlumno'=>'tns:GrabarAlumnoInput'),array('resultado' => 'tns:GrabarAlumnoOutput'),$namespace,$namespace.'#GrabarAlumno','rpc','encoded','');

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------

    //FUNCION LISTADO DE ALUMNOS
    $server->wsdl->addComplexType('ListarAlumnosInput','complexType','struct','all','',array('code_email' => array('name' => 'code_email','type' => 'xsd:string')));
    $server->wsdl->addComplexType('ListarAlumnosOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ListarAlumnosOutput[]')));
    $server->register('ListarAlumnos',array('ListarAlumnos'=>'tns:ListarAlumnosInput'),array('resultado' => 'tns:ListarAlumnosOutput'),$namespace,$namespace.'#ListarAlumnos','rpc','encoded','');  

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //FUNCION NOMBRE SEDE
    $server->wsdl->addComplexType('NombreSedeInput','complexType','struct','all','',array( 'idsede_new' => array('name' => 'idsede_new','type' => 'xsd:int')));
    $server->wsdl->addComplexType('NombreSedeOutput','complexType','struct','all','',array( 'idsede' => array('name' => 'idsede','type' => 'xsd:int'),'nombresede' => array('name' => 'nombresede','type' => 'xsd:string'),'idsede_new' => array('name'=>'idsede_new', 'type'=> 'xsd:int')));
    $server->register('NombreSede',array('contribuyente'=>'tns:NombreSedeInput'),array('resultado'=>'tns:NombreSedeOutput'),$namespace,false,'rpc','encoded','');
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------


    //FUNCION NOMBRE CURSO
    $server->wsdl->addComplexType('NombreCursoInput','complexType','struct','all','',array( 'idsede_new' => array('name' => 'idsede_new','type' => 'xsd:int')));
    $server->wsdl->addComplexType('NombreCursoOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:NombreCursoOutput[]')));
    $server->register('NombreCurso',array('contribuyente'=>'tns:NombreCursoInput'),array('resultado'=>'tns:NombreCursoOutput'),$namespace,false,'rpc','encoded','');
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------    

    //FUNCION DATOS RECIBO CAB
    $server->wsdl->addComplexType('ReciboCabInput','complexType','struct','all','',array('NRO_RECIBO' => array('name' => 'NRO_RECIBO','type' => 'xsd:string')));
    $server->wsdl->addComplexType('ReciboCabOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ReciboCabOutput[]')));
    $server->register('ReciboCab',array('ReciboCab'=>'tns:ReciboCabInput'),array('resultado' => 'tns:ReciboCabOutput'),$namespace,$namespace.'#ReciboCab','rpc','encoded','');
    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------

    //FUNCION LISTADO DE PERIODOS
    $server->wsdl->addComplexType('ListarPeriodosInput','complexType','struct','all','',array('year' => array('name' => 'year','type' => 'xsd:string')));
    $server->wsdl->addComplexType('ListarPeriodosOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ListarPeriodosOutput[]')));
    $server->register('ListarPeriodos',array('ListarPeriodos'=>'tns:ListarPeriodosInput'),array('resultado' => 'tns:ListarPeriodosOutput'),$namespace,$namespace.'#ListarPeriodos','rpc','encoded','');  
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------


    //FUNCION LISTADO DE SEDES
    $server->wsdl->addComplexType('ListarSedesInput','complexType','struct','all','',array('mes' => array('name' => 'mes','type' => 'xsd:int'),'anio' => array('name' => 'anio','type' => 'xsd:string')));
    $server->wsdl->addComplexType('ListarSedesOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ListarSedesOutput[]')));
    $server->register('ListarSedes',array('ListarSedes'=>'tns:ListarSedesInput'),array('resultado' => 'tns:ListarSedesOutput'),$namespace,$namespace.'#ListarSedes','rpc','encoded','');  
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // LISTAR HORARIOS SEGUN SEDES Y CURSOS
    $server->wsdl->addComplexType('ListarHorariosGrillaInput','complexType','struct','all','',array('idsede_new' => array('name' => 'idsede_new','type' => 'xsd:string'),'curso_id' => array('name' => 'curso_id','type' => 'xsd:string')));
    $server->wsdl->addComplexType('ListarHorariosGrillaOutput','complexType','array','','SOAP-ENC:Array',array(),array(array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:ListarHorariosGrillaOutput[]')));
    $server->register('ListarHorariosGrilla',array('estadocuentadetallado'=>'tns:ListarHorariosGrillaInput'),array('resultado' => 'tns:ListarHorariosGrillaOutput'),$namespace,$namespace.'#EstadoCtaDetallado','rpc','encoded','');  

    //Funcion para Autenticar usuario
    function LoginContribuyente($InputParameter)
    {
        $conexion = bd_conecta();

        $user = $InputParameter['USUARIO'];
        $clave = $InputParameter['CLAVE'];

        $query = "execute [visa].[Acceso_contribuyente2] '$user', '$clave'";
        $execute = mssql_query($query);

        //$res = [];
        while ($row = mssql_fetch_array($execute)) {
            $acceso = $row['acceso'];
			$useradmin = $row['uadmin'];
        }

        $data = array('ACCESO'=>$acceso,'USERADMIN'=>$useradmin);

        return $data;
    }

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Función para obtener los datos del contribuyente a partir de si codigo
    function DatosContribuyente($InputParameter)
    {
        $conexion = bd_conecta();

        $id_contrib = $InputParameter['ID_CONTRIB'];
        $result = mssql_query("select C_IDCONT, V_NOMACO,'' AS DFISCAL, V_EMAILWEB, V_TELEFOWEB, 'DNI' AS C_IDDOID, DATEDIFF(day,D_FECHORID,GETDATE()) as DIAS, NUMDOC from panel.tb_usuarioweb where V_EMAILWEB = '$id_contrib'");

        $id_contrib = "Sin datos";
        $nombre = "Sin datos";
        $direccion = "Sin datos";
        $email = "Sin datos";
        $telefono = "Sin datos";
        $tipodoc = "Sin datos";
        $dias = 0;
        $numdoc = "Sin datos";

        if(mssql_num_rows($result) > 0)
        {
            while($row = mssql_fetch_array($result))
            {
                $id_contrib = $row[3];
                $nombre = $row[1];
                $direccion = $row[2];
                $email = $row[3];
                $telefono = $row[4];
                $tipodoc = $row[5];
                $dias = $row[6];
                $numdoc = $row[7];
            }
        }

        $data = array('ID_CONTRIB'=>$id_contrib,'NOMBRE'=>$nombre,'DIRECCION'=>$direccion,'EMAIL'=>$email,'TELEFONO'=>$telefono,'TIPODOC'=>$tipodoc,'DIAS'=>$dias, 'NUMDOC'=>$numdoc);
        return $data;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para imprimir estado de cuenta detallado detallado
    function EstadoCuentaDetallado($InputParameter)
    {
        $conexion = bd_conecta();
        $user = $InputParameter['ID_CONTRIB'];
        $hoy = date('Y-m-d');
        $anio = date('Y');
        $number_month = $InputParameter['ANIO_INI'];// es el mes de la programacion
        $anio_fin = $InputParameter['ANIO_FIN'];

        $predial = $InputParameter['PREDIAL'];
        $arbitrio = $InputParameter['ARBITRIO'];
        $serenazgo = $InputParameter['SERENAZGO'];
        $fraccionamiento = $InputParameter['FRACCIONAMIENTO'];

        $contenedor = [];
        $puntero = 0;
		$sedecont = -1;
		$sedeant ='';
        //for ($anio = $anio_ini; $anio <= $anio_fin ; $anio++){ 

            //$query = "execute [visa].[WEB_RENT_CTADETALLADO_EEEA_CONTRIB2] '$user','$hoy','$anio_ini','$anio_fin',$predial,$arbitrio,$serenazgo,$fraccionamiento";
            $query = "execute [visa].[Listado_ProgramacionCurso2] 1, '$number_month', '$anio' ";
            $execute = mssql_query($query,$conexion);

            if (mssql_num_rows($execute) > 0) {
                
                /*Contadores*/
                $a = 0;
                $b = 0;
                $c = 0;
                $d = 0;
                $e = 0;
				$f = 0;

                while ($row = mssql_fetch_array($execute)) {
					if($row['idsede_new']<>$sedeant){
						$sedeant = $row['idsede_new'];
						$sedecont++;
					}
					
					$contenedor[$sedecont]['anio'] = $row['idsede_new'];
                    
                    $descri = str_replace(" ","",$row['NombreSede']);
		            $descri = str_replace(".","",$descri);

                    $contenedor[$sedecont]['detallado'][$b]['catastral'] = $row['NombreCurso'];
                    $contenedor[$sedecont]['detallado'][$b]['tributo'] = $row['V_RESTRA'];
                    $contenedor[$sedecont]['detallado'][$b]['periodo'] = $row['c_periodo'];
                    $contenedor[$sedecont]['detallado'][$b]['fecha_vencimiento'] = $row['d_fecven'];
                    $contenedor[$sedecont]['detallado'][$b]['insoluto'] = number_format($row['n_impins'],2);
                    $contenedor[$sedecont]['detallado'][$b]['monto_ajustado'] = number_format($row['reajuste'],2);
                    $contenedor[$sedecont]['detallado'][$b]['mora'] = number_format($row['mora'],2);
                    $contenedor[$sedecont]['detallado'][$b]['costo'] = number_format($row['n_costem'],2);
                    $contenedor[$sedecont]['detallado'][$b]['total'] = number_format($row['total'],2);
                    $contenedor[$sedecont]['detallado'][$b]['id'] = $row['CodigoPC'];
                    $contenedor[$sedecont]['detallado'][$b]['direccion_predio'] = $row['Direccion_Predio'];
                    $contenedor[$sedecont]['detallado'][$b]['uso'] = $row['Uso_rentas'];
                    $contenedor[$sedecont]['detallado'][$b]['situacion'] = $row['Situacion'];
                    $contenedor[$sedecont]['detallado'][$b]['coactivo'] = $row['ID_COAC'];

                    $contenedor[$sedecont]['detallado'][$b]['CodigoPC'] = $row['CodigoPC'];
                    $contenedor[$sedecont]['detallado'][$b]['IdSede'] = $row['IdSede'];
                    $contenedor[$sedecont]['detallado'][$b]['sede'] = $row['NombreSede'];
                    $contenedor[$sedecont]['detallado'][$b]['NombreModalidad'] = $row['NombreModalidad'];
                    $contenedor[$sedecont]['detallado'][$b]['edades'] = $row['rango_edad'];
                    $contenedor[$sedecont]['detallado'][$b]['E_desde'] = $row['E_desde'];
                    $contenedor[$sedecont]['detallado'][$b]['E_hasta'] = $row['E_hasta'];
                    $contenedor[$sedecont]['detallado'][$b]['curso'] = $row['NombreCurso'];
                    $contenedor[$sedecont]['detallado'][$b]['dias'] = $row['DescripcionD'];
                    $contenedor[$sedecont]['detallado'][$b]['horas'] = $row['Hora'];
                    $contenedor[$sedecont]['detallado'][$b]['ambiente'] = $row['NombreAmbiente'];
                    $contenedor[$sedecont]['detallado'][$b]['vrazonsocial'] = $row['vrazonsocial'];
                    $contenedor[$sedecont]['detallado'][$b]['NAlumnosMAx'] = $row['NAlumnosMAx'];
                    $contenedor[$sedecont]['detallado'][$b]['NAlumnosMin'] = $row['NAlumnosMin'];
                    $contenedor[$sedecont]['detallado'][$b]['fecini'] = $row['Inicio'];
                    $contenedor[$sedecont]['detallado'][$b]['fecfin'] = $row['Fin'];
                    $contenedor[$sedecont]['detallado'][$b]['vacantes'] = $row['vacantes'];
                    $contenedor[$sedecont]['detallado'][$b]['estado'] = $row['estado'];
                    $contenedor[$sedecont]['detallado'][$b]['CodigoPeriodo'] = $row['CodigoPeriodo'];
                    $contenedor[$sedecont]['detallado'][$b]['Modalidad'] = $row['Modalidad'];
                    $contenedor[$sedecont]['detallado'][$b]['Especialidad'] = $row['Especialidad'];
                    $contenedor[$sedecont]['detallado'][$b]['CodigoCurso'] = $row['CodigoCurso'];
                    $contenedor[$sedecont]['detallado'][$b]['CodigoProfesor'] = $row['CodigoProfesor'];
                    $contenedor[$sedecont]['detallado'][$b]['CodigoAmbiente'] = $row['CodigoAmbiente'];
                    $contenedor[$sedecont]['detallado'][$b]['CodigoDia'] = $row['CodigoDia'];
                    $contenedor[$sedecont]['detallado'][$b]['precio'] = $row['preccurso'];
                    $b++;
                }
                $puntero++;
            }
        $data = ['resultado' => [$contenedor]];
        return $data;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para listado de pagos por contribuyente
    function ListadoPagos($InputParameter)
    {
        $conexion = bd_conecta();

        $id_contrib = $InputParameter['ID_CONTRIB'];

        $contenedor = [];
        $puntero = 0;

        $query = "execute [visa].[Pagos_Contrib_Listado] '$id_contrib'";
        $execute = mssql_query($query,$conexion);
        if (mssql_num_rows($execute) > 0) {
            $a = 0;
            while ($row = mssql_fetch_array($execute)) {
                $contenedor['listado'][$a]['nropedido'] = $row['N_IDLIQU'];
                $contenedor['listado'][$a]['nrorecibo'] = $row['c_nrorec'];
                $contenedor['listado'][$a]['fecha_pago'] = $row['d_fecpag'];
                $contenedor['listado'][$a]['importe'] = number_format($row['n_totrec'],2);
                $a++;
            }
            $puntero++;
        }       
        $data = ['resultado' => [$contenedor]];
        return $data;
    }


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para listado de distritos
    /**
     * @param string the symbol of the stock
     * @return float the stock price
     * @soap
     */
    function ListadoDistrito($InputParameter)
    {
        $conexion = bd_conecta();
        $nro_recibo = $InputParameter['NRO_RECIBO'];
        $contenedor = [];
        $puntero = 0;
        $query = "execute lita_distrito '$nro_recibo'";
        $execute = mssql_query($query,$conexion);
        if (mssql_num_rows($execute) > 0) {
            $a = 0;
            while ($row = mssql_fetch_array($execute)) {
                $contenedor['detalle'][$a]['id_distrito'] = $row['id_distrito'];
                $contenedor['detalle'][$a]['nom_distrito'] = $row['nom_distrito'];
                $a++;
            }
            $puntero++;
        }
        $data = ['resultado' => [$contenedor]];
        return $data;
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para listado de pagos
    function DetallePago($InputParameter)
    {
        $conexion = bd_conecta();
        $nro_recibo = $InputParameter['NRO_RECIBO'];
        $contenedor = [];
        $puntero = 0;
        $query = "execute [visa].[Pagos_Contrib_Detalle] '$nro_recibo'";
        $execute = mssql_query($query,$conexion);
        if (mssql_num_rows($execute) > 0) {      
            $a = 0;
            while ($row = mssql_fetch_array($execute)) {
                $contenedor['detalle'][$a]['id'] = $row['N_IDRECI'];
                $contenedor['detalle'][$a]['anio'] = $row['c_anotri'];
                $contenedor['detalle'][$a]['tributo'] = $row['V_RESTRA'];
                $contenedor['detalle'][$a]['periodo'] = $row['c_perano'];
                // $contenedor['detalle'][$a]['catastral'] = $row['c_cocata'];
                $contenedor['detalle'][$a]['importe'] = number_format($row['n_totdet'],2);
                $contenedor['detalle'][$a]['dias'] = $row['dias'];
                $contenedor['detalle'][$a]['horas'] = $row['horas'];
                $a++;
            }
            $puntero++;
        }       
        $data = ['resultado' => [$contenedor]];        
        return $data;
    }    

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para generar liquidación
    function GenerarLiquidacion($InputParameter)
    {
        $conexion = bd_conecta();

        $user = $InputParameter['ID_CONTRIB'];
        $hoy = date('Y-m-d');
        $ip = $InputParameter['IP_CONTRIB'];
        $recibos = $InputParameter['RECIBOS'];

        $query = "execute [visa].[WEB_RENT_CTADETALLADO_EEEA_RECIBO] '$user', '$recibos', '$hoy','$ip'";
        $execute = mssql_query($query);

        $res = [];
        while ($row = mssql_fetch_array($execute)) {
            $res['liquidacion'] = $row['N_IDLIQU'];
            $res['total'] = $row['n_total'];
        }

        $data = ['resultado' => [$res]];

        return $data;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para generar liquidación
    function NuevoUsuario($InputParameter)
    {
        $conexion = bd_conecta();

        // $codigo = $InputParameter['ID_CONTRIB'];
        $nrodoi = $InputParameter['NRODOI'];
        $contrib = $InputParameter['CONTRIB'];
        $email = $InputParameter['EMAIL'];
        $telefono = $InputParameter['TELEFONO'];

        $query = "execute [visa].[Nuevo_Usuario] '$nrodoi', '$contrib','$email','$telefono'";
        //$query = "execute [visa].[Validar_Nuevo_Usuario] '$codigo', '$nrodoi', '$contrib','$email','$telefono'";
        $execute = mssql_query($query);

        $res = [];
        while ($row = mssql_fetch_array($execute)) {
            $res['resultado'] = $row['respuesta'];
        }

        return $res;
    }
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para generar la verificación y validación de pagos
    function NuevaClaveUsuario($InputParameter)
    {
        $conexion = bd_conecta();


        $codigo = $InputParameter['ID_CONTRIB'];
        $codigo_id = $InputParameter['ID_USUARIO'];
        $clave = $InputParameter['CLAVE_NUEVO'];

        $query = "execute [visa].[Nuevo_Usuario_Password2] '$codigo','$codigo_id','$clave'";
        $execute = mssql_query($query);

        $res = array();
        while ($row = mssql_fetch_array($execute)) {
            $res['resultado'] = $row['respuesta'];
        }
        
        return $res;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para generar la verificación y validación de pagos
    function GenerarPago($InputParameter)
    {
        $conexion = bd_conecta();

        $codigo_liquidacion = $InputParameter['CODIGO_LIQUIDACION'];
        $estado = $InputParameter['ESTADO'];
        $codigo_alumno = $InputParameter['CODIGOALUMNO'];

        $query = "execute [visa].[Proceso_Confirmacion_Pago] '$codigo_liquidacion','$estado', '$codigo_alumno'";
        $execute = mssql_query($query);

        $res = array();
        while ($row = mssql_fetch_array($execute)) {
            $res['resultado'] = $row['respuesta'];
        }
        
        return $res;
    }
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
   function CambioClave($InputParameter)
    {
        $conexion = bd_conecta();

        $usuario = $InputParameter['USUARIO'];
        $claveant = $InputParameter['CLAVE_ANTERIOR'];
        $claveact = $InputParameter['CLAVE_NUEVA'];

        $query = "execute [visa].[Cambio_Password] '$usuario','$claveant','$claveact'";
        $execute = mssql_query($query);

        $res = array();
        while ($row = mssql_fetch_array($execute)) {
            $res['resultado'] = $row['respuesta'];
        }
        
        return $res;
    }
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
   function GeneraNuevaClave($InputParameter)
    {
        $conexion = bd_conecta();

        $codigo = $InputParameter['ID_CONTRIB'];
        $email = $InputParameter['EMAIL'];

        $query = "execute [visa].[Recupera_Nueva_Clave2] '$email'";
        // $query = "execute [visa].[Recupera_Nueva_Clave2] '$codigo','$email'";
        $execute = mssql_query($query);

        $res = array();
        while ($row = mssql_fetch_array($execute)) {
            $res['resultado'] = $row['respuesta'];
        }
        
        return $res;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para generar la actualizar datos
    function ActualizaDatosUsuario($InputParameter)
    {
        $conexion = bd_conecta();


        $codigo = $InputParameter['ID_CONTRIB'];
        $clave = $InputParameter['CLAVE'];
        $email = $InputParameter['EMAIL'];
        $telefono = $InputParameter['TELEFONO'];

        $query = "execute [visa].[Actualizar_Datos_Usuario] '$codigo','$clave','$email','$telefono'";
        $execute = mssql_query($query);

        $res = array();
        while ($row = mssql_fetch_array($execute)) {
            $res['resultado'] = $row['respuesta'];
        }
        
        return $res;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para generar liquidación
    function VerificaDescuento($InputParameter)
    {
        $conexion = bd_conecta();

        $user = $InputParameter['ID_CONTRIB'];
        $hoy = date('Y-m-d');
        $ip = $InputParameter['IP_CONTRIB'];
        $recibos = $InputParameter['RECIBOS'];
        $codalumno = $InputParameter['CODIGOALUMNO'];

        // $query = "execute [visa].[Beneficios_Tributarios2] '$user', '$recibos', '$hoy','$ip'";
        $query = "execute [visa].[agrega_carrito_temporal] '$user','$recibos','$hoy','$ip','$codalumno'";
        $execute = mssql_query($query);

        $contenedor = [];
        $puntero = 0;		
	
        if (mssql_num_rows($execute) > 0) {        
            $a = 0;
            while ($row = mssql_fetch_array($execute)) {
				//$contenedor['descuento']=$row['f_descuento'];
				//$contenedor['mensaje']=$row['v_mensaje'];
                //
                $contenedor['detalle'][$a]['tributo'] = 0;
                $contenedor['detalle'][$a]['anio'] = 0;
                $contenedor['detalle'][$a]['catastral'] = 0;
                $contenedor['detalle'][$a]['subtributo'] = 0;
                $contenedor['detalle'][$a]['periodo'] = 0;
                $contenedor['detalle'][$a]['vencimiento'] = 0;
                $contenedor['detalle'][$a]['Insoluto'] = 0;
                $contenedor['detalle'][$a]['ImpDescuento'] = 0;
                $contenedor['detalle'][$a]['ImpAjustado'] = 0;
                $contenedor['detalle'][$a]['CosEmision'] = 0;
                $contenedor['detalle'][$a]['Mora'] = 0;
                $contenedor['detalle'][$a]['ImpTotal'] = 0;
                $contenedor['detalle'][$a]['nrofrac'] = 0;
                $contenedor['detalle'][$a]['coactivo'] = 0;
                //
				$contenedor['liquidacion']=$row['N_IDLIQU'];
				$contenedor['total']=$row['total'];
                $contenedor['descuento']=0;
                $contenedor['mensaje']='';
                $contenedor['codigoalumno']=$row['CodigoAlumno'];
                $contenedor['nombrealumno']=$row['vrazonsocial'];
                $contenedor['detalle'][$a]['id'] = $row['CodigoPC'];
                $contenedor['detalle'][$a]['IdSede'] = $row['IdSede'];
                $contenedor['detalle'][$a]['sede'] = $row['NombreSede'];
                $contenedor['detalle'][$a]['NombreModalidad'] = $row['NombreModalidad'];
                $contenedor['detalle'][$a]['edades'] = $row['rango_edad'];
                $contenedor['detalle'][$a]['E_desde'] = $row['E_desde'];
                $contenedor['detalle'][$a]['E_hasta'] = $row['E_hasta'];
                $contenedor['detalle'][$a]['curso'] = $row['NombreCurso'];
                $contenedor['detalle'][$a]['dias'] = $row['DescripcionD'];
                $contenedor['detalle'][$a]['horas'] = $row['Hora'];
                $contenedor['detalle'][$a]['ambiente'] = $row['NombreAmbiente'];
                $contenedor['detalle'][$a]['vrazonsocial'] = $row['vrazonsocial'];
                $contenedor['detalle'][$a]['NAlumnosMAx'] = $row['NAlumnosMAx'];
                $contenedor['detalle'][$a]['NAlumnosMin'] = $row['NAlumnosMin'];
                $contenedor['detalle'][$a]['fecini'] = $row['Inicio'];
                $contenedor['detalle'][$a]['fecfin'] = $row['Fin'];
                $contenedor['detalle'][$a]['vacantes'] = $row['vacantes'];
                $contenedor['detalle'][$a]['estado'] = $row['estado'];
                $contenedor['detalle'][$a]['CodigoPeriodo'] = $row['CodigoPeriodo'];
                $contenedor['detalle'][$a]['Modalidad'] = $row['Modalidad'];
                $contenedor['detalle'][$a]['Especialidad'] = $row['Especialidad'];
                $contenedor['detalle'][$a]['CodigoCurso'] = $row['CodigoCurso'];
                $contenedor['detalle'][$a]['CodigoProfesor'] = $row['CodigoProfesor'];
                $contenedor['detalle'][$a]['CodigoAmbiente'] = $row['CodigoAmbiente'];
                $contenedor['detalle'][$a]['CodigoDia'] = $row['CodigoDia'];
                $contenedor['detalle'][$a]['CodigoHora'] = $row['CodigoHora'];
                $contenedor['detalle'][$a]['idsede_new'] = $row['idsede_new'];
                $contenedor['detalle'][$a]['total'] = $row['n_total'];
                $a++;
            }
            $puntero++;
        }
        $data = ['resultado' => [$contenedor]];
        return $data;
    }
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para generar la actualizar datos
    function GuardarBeneficio($InputParameter)
    {
        $conexion = bd_conecta();

        $idbeneficio = $InputParameter['IDBENEFICIO'];
		$codbenef = $InputParameter['CODBENEF'];
        $ordenanza = $InputParameter['ORDENANZA'];
        $beneficio = $InputParameter['BENEFICIO'];
        $fecpublica = $InputParameter['FECPUBLICA'];
        $fecinicio = $InputParameter['FECINICIO'];
		$fecfinal = $InputParameter['FECFINAL'];
		$descripcion = $InputParameter['DESCRIPCION'];
		$pagoanio = $InputParameter['PAGOANIO'];
		$pagotrim = $InputParameter['PAGOTRIM'];
		$pagototal = $InputParameter['PAGOTOTAL'];
		$aniopago = $InputParameter['ANIOPAGO'];
		$deudaanterior = $InputParameter['DEUDAANTERIOR'];
		$deudaxpredio = $InputParameter['DEUDAXPREDIO'];
		$deudafecorigen = $InputParameter['DEUDAFECHAORIGEN'];
		$fecoriginicio = $InputParameter['FECHAORIGENINICIO'];
		$fecorigfinal = $InputParameter['FECHAORIGENFINAL'];
		$pagocostas = $InputParameter['PAGOCOSTAS'];
		$listadocostas = $InputParameter['LISTADOCOSTAS'];
		$pagolistado = $InputParameter['PAGOLISTADO'];
		$listadocontrib = $InputParameter['LISTADOCONTRIB'];
		$usuario = $InputParameter['USUARIO'];
		$estacion = $InputParameter['ESTACION'];
				
        $query = "execute [visa].[Guardar_Beneficio] '$idbeneficio','$codbenef','$ordenanza','$beneficio','$fecpublica','$fecinicio','$fecfinal','$descripcion','$pagoanio','$pagotrim','$pagototal','$aniopago','$deudaanterior','$deudaxpredio','$deudafecorigen','$fecoriginicio','$fecorigfinal','$pagocostas','$listadocostas','$pagolistado','$listadocontrib','$usuario','$estacion'";
        $execute = mssql_query($query);

		$res = array();
		while ($row = mssql_fetch_array($execute)) {
			$res['resultado'] = $row['respuesta'];
		}
			
        return $res;
    }
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para generar la actualizar datos
    function GuardarDescuento($InputParameter)
    {
        $conexion = bd_conecta();
		$contar = 0;

		$descuento = $InputParameter['guardardescuento'];
		
		$res[0] = count($descuento) +1 ;
		
		//foreach ($paramarray as $descuento){
		/*
			$idbeneficio = $descuento['IDBENEFICIO'];
			$anio =$descuento[0]['ANIO'];
			$n_ipajuste =$descuento['IPAJUSTE'];
			$n_ipgastos =$descuento['IPGASTO'];
			$b_ipgastopens =$descuento['IPPENSION'];
			$n_ipmoras =$descuento['IPMORAS'];
			$n_lpinsol =$descuento['LPINSOL'];
			$n_lpmoras =$descuento['LPMORAS'];
			$n_pjinsol =$descuento['PJINSOL'];
			$n_pjmoras =$descuento['PJMORAS'];
			$n_seinsol =$descuento['SEINSOL'];
			$n_semoras =$descuento['SEMORAS'];
			$n_frmoras =$descuento['FRMORAS'];
			
			//$query = "execute [visa].[Guardar_Benef_Descto] '$idbeneficio','$anio','$n_ipajuste','$n_ipgastos','$b_ipgastopens','$n_ipmoras','$n_lpinsol','$n_lpmoras','$n_pjinsol','$n_pjmoras','$n_seinsol','$n_semoras','$n_frmoras'";
			$query = "execute [temporales].[prueba] '$anio'";
			$execute = mssql_query($query);

			$res = array();
			while ($row = mssql_fetch_array($execute)) {
				$res[$contar] = $row['respuesta'];
			}
			$contar++;
		//}
		*/
       
        return $res;
    }
	
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para generar la actualizar datos
    function GuardarDescuent2($InputParameter)
    {
        $conexion = bd_conecta();
		$contar = 0;
		
		//$res[0] = count($InputParameter);
		$res = array();
		
		foreach ($InputParameter as $key => $value){

			$iddescuento = $value['IDDESCUENTO'];
			$idbeneficio = $value['IDBENEFICIO'];
			$anio =$value['ANIO'];
			$n_ipajuste =$value['IPAJUSTE'];
			$n_ipgastos =$value['IPGASTO'];
			$b_ipgastopens =$value['IPPENSION'];
			$n_ipmoras =$value['IPMORAS'];
			$n_lpinsol =$value['LPINSOL'];
			$n_lpmoras =$value['LPMORAS'];
			$n_pjinsol =$value['PJINSOL'];
			$n_pjmoras =$value['PJMORAS'];
			$n_seinsol =$value['SEINSOL'];
			$n_semoras =$value['SEMORAS'];
			$n_frmoras =$value['FRMORAS'];
			$n_costas =$value['COSTAS'];
			$eliminado =$value['ELIMINADO'];
				
  			
			$query = "execute [visa].[Guardar_Benef_Descto] '$iddescuento','$idbeneficio','$anio','$n_ipajuste','$n_ipgastos','$b_ipgastopens','$n_ipmoras','$n_lpinsol','$n_lpmoras','$n_pjinsol','$n_pjmoras','$n_seinsol','$n_semoras','$n_frmoras','$n_costas','$eliminado'";
			//$query = "execute [temporales].[prueba] '$idbeneficio','$anio','$n_ipajuste','$n_ipgastos','$b_ipgastopens','$n_ipmoras','$n_lpinsol','$n_lpmoras','$n_pjinsol','$n_pjmoras','$n_seinsol','$n_semoras','$n_frmoras'";
			$execute = mssql_query($query);


			while ($row = mssql_fetch_array($execute)) {
				$res[$contar] = $row['respuesta'];
			}
			
			$contar++;
		}
       // $res[1] = $contar;
		
        return $res;
    }
	
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para listado de ordenanzas
    function ListadoBeneficios()
    {
        $conexion = bd_conecta();

        $contenedor = [];
        $puntero = 0;


        $query = "execute [visa].[Consultar_Beneficios] ";
        $execute = mssql_query($query,$conexion);

        if (mssql_num_rows($execute) > 0) {
        
            $a = 0;

            while ($row = mssql_fetch_array($execute)) {
                            
                $contenedor['listado'][$a]['IDBENEFICIO'] = $row['id_beneficio'];
                $contenedor['listado'][$a]['CODBENEF'] = $row['c_codbenef'];
                $contenedor['listado'][$a]['ORDENANZA'] = $row['v_ordenanza'];
				$contenedor['listado'][$a]['BENEFICIO'] = $row['v_beneficio'];
				$contenedor['listado'][$a]['FECPUBLICA'] = $row['d_fecpublica'];
				$contenedor['listado'][$a]['FECINICIO'] = $row['d_fecinicio'];
				$contenedor['listado'][$a]['FECFINAL'] = $row['d_fecfinal'];
				$contenedor['listado'][$a]['DESCRIPCION'] = $row['v_descripcion'];
				$contenedor['listado'][$a]['ESTADO'] = $row['estado'];
				$contenedor['listado'][$a]['ACTIVO'] = $row['f_activo'];
				
                $a++;


            }

            $puntero++;
        }
        
        $data = ['resultado' => [$contenedor]];
        
        return $data;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//Funcion para ver beneficio
    function ConsultaBeneficio($InputParameter)
    {
        $conexion = bd_conecta();

        $id_beneficio = $InputParameter['IDBENEFICIO'];

        $query = "execute [visa].[Consulta_Beneficio] '$id_beneficio'";
        $execute = mssql_query($query);

        $contenedor = [];
        $puntero = 0;
		
	
        if (mssql_num_rows($execute) > 0) {
        
            $a = 0;

            while ($row = mssql_fetch_array($execute)) {
                            
				$contenedor['IDBENEFICIO']=$row['id_beneficio'];
				$contenedor['CODBENEF']=$row['c_codbenef'];
				$contenedor['ORDENANZA']=$row['v_ordenanza'];
				$contenedor['BENEFICIO']=$row['v_beneficio'];
				$contenedor['FECPUBLICA']=$row['d_fecpublica'];
				$contenedor['FECINICIO']=$row['d_fecinicio'];
				$contenedor['FECFINAL']=$row['d_fecfinal'];
				$contenedor['DESCRIPCION']=$row['v_descripcion'];
				$contenedor['PAGOANIO']=$row['f_pagoAnio'];
				$contenedor['PAGOTRIM']=$row['f_pagoTrim'];
				$contenedor['PAGOTOTAL']=$row['f_pagoTotal'];
				$contenedor['ANIOPAGO']=$row['aniopago'];
				$contenedor['DEUDAANTERIOR']=$row['f_deudaAnterior'];
				$contenedor['DEUDAXPREDIO']=$row['f_deudaxPredio'];
				$contenedor['DEUDAFECHAORIGEN']=$row['f_deudaFechaOrigen'];
				$contenedor['FECHAORIGENINICIO']=$row['d_fecOrigenInicio'];
				$contenedor['FECHAORIGENFINAL']=$row['d_fecOrigenFinal'];
				$contenedor['PAGOCOSTAS']=$row['f_pagoCostas'];
				$contenedor['LISTADOCOSTAS']=$row['listado_costas'];
				$contenedor['PAGOLISTADO']=$row['f_pagoxListado'];
				$contenedor['LISTADOCONTRIB']=$row['listado_contrib'];
				
				$contenedor['descuento'][$a]['IDDESCUENTO'] = $row['id_descuento'];
                $contenedor['descuento'][$a]['ANIO'] = $row['c_aficat'];
				$contenedor['descuento'][$a]['IPAJUSTE'] = number_format($row['n_ipajuste'],2);
				$contenedor['descuento'][$a]['IPGASTO'] = number_format($row['n_ipgastos'],2);
				$contenedor['descuento'][$a]['IPPENSION'] = $row['b_ipgastopens'];
				$contenedor['descuento'][$a]['IPMORAS'] = number_format($row['n_ipmoras'],2);
				$contenedor['descuento'][$a]['LPINSOL'] = number_format($row['n_lpinsol'],2);
				$contenedor['descuento'][$a]['LPMORAS'] = number_format($row['n_lpmoras'],2);
                $contenedor['descuento'][$a]['PJINSOL'] = number_format($row['n_pjinsol'],2);
                $contenedor['descuento'][$a]['PJMORAS'] = number_format($row['n_pjmoras'],2);
                $contenedor['descuento'][$a]['SEINSOL'] = number_format($row['n_seinsol'],2);
                $contenedor['descuento'][$a]['SEMORAS'] = number_format($row['n_semoras'],2);
                $contenedor['descuento'][$a]['FRMORAS'] = number_format($row['n_frmoras'],2);
				$contenedor['descuento'][$a]['COSTAS'] = number_format($row['n_costas'],2);
				
                $a++;


            }

            $puntero++;
        }
        
        $data = ['resultado' => [$contenedor]];
		
        return $data;
    }
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para activar beneficio
    function ActivarBeneficio($InputParameter)
    {
        $conexion = bd_conecta();

        $idbeneficio = $InputParameter['IDBENEFICIO'];
		$activo =$InputParameter['ACTIVO'];
		$usuario = $InputParameter['USUARIO'];
		$estacion = $InputParameter['ESTACION'];
				
  			
		$query = "execute [visa].[Activar_Beneficio] '$idbeneficio','$activo','$usuario','$estacion'";
		$execute = mssql_query($query);

		$res = array();
		while ($row = mssql_fetch_array($execute)) {
			$res['resultado'] = $row['respuesta'];
		}
	
        
        return $res;
    }

	
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para imprimir estado de cuenta detallado detallado
    function EstCtaDetallado($InputParameter)
    {
        $conexion = bd_conecta();

        $codigo = $InputParameter['ID_CONTRIB'];

        $contenedor = [];
        $puntero = 0;
		$aniocont = -1;
		$anioant ='';

		$query = "execute [visa].[ESTADO_DE_CUENTA_DETALLADO] '$codigo'";
		$execute = mssql_query($query,$conexion);

		if (mssql_num_rows($execute) > 0) {
			
			//$contenedor[$aniocont]['anio'] = $anio;

			/*Contadores*/
			$a = 0;
			$b = 0;
			$c = 0;
			$d = 0;
			$e = 0;
			$f = 0;

			while ($row = mssql_fetch_array($execute)) {
				
				if($row['c_aficat']<>$anioant){
					$anioant = $row['c_aficat'];
					$aniocont++;
				}
				
				$contenedor[$aniocont]['anio'] = $row['c_aficat'];
				
				
				$descri = str_replace(" ","",$row['V_Descri']);
				$descri = str_replace(".","",$descri);
				
				switch ($row['c_idtrar']) {
					case '02.01':
						$contenedor[$aniocont]['detallado'][$descri][$a]['tributo'] = $row['V_RESTRA'];
						$contenedor[$aniocont]['detallado'][$descri][$a]['periodo'] = $row['c_periodo'];
						$contenedor[$aniocont]['detallado'][$descri][$a]['fecha_vencimiento'] = $row['d_fecven'];
						$contenedor[$aniocont]['detallado'][$descri][$a]['insoluto'] = number_format($row['n_impins'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['monto_ajustado'] = number_format($row['reajuste'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['mora'] = number_format($row['mora'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['costo'] = number_format($row['n_costem'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['total'] = number_format($row['total'],2);
						
						$contenedor[$aniocont]['detallado'][$descri][$a]['id'] = $row['N_IDRECI'];
						$contenedor[$aniocont]['detallado'][$descri][$a]['autoval'] = number_format($row['N_AUTOAV'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['anexos'] = number_format($row['N_TOTANE'],0);
						$contenedor[$aniocont]['detallado'][$descri][$a]['anual'] = number_format($row['anual'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['trimes'] = number_format($row['periodo'],2);

						$a++;
						break;
					case '11.01':
						$contenedor[$aniocont]['detallado'][$descri][$b]['catastral'] = $row['c_cocata'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['tributo'] = $row['V_RESTRA'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['periodo'] = $row['c_periodo'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['fecha_vencimiento'] = $row['d_fecven'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['insoluto'] = number_format($row['n_impins'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['monto_ajustado'] = number_format($row['reajuste'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['mora'] = number_format($row['mora'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['costo'] = number_format($row['n_costem'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['total'] = number_format($row['total'],2);
						
						$contenedor[$aniocont]['detallado'][$descri][$b]['id'] = $row['N_IDRECI'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['direccion_predio'] = $row['Direccion_Predio'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['uso'] = $row['Uso_rentas'];

						$b++;
						break;
					case '11.03':
						$contenedor[$aniocont]['detallado'][$descri][$b]['catastral'] = $row['c_cocata'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['tributo'] = $row['V_RESTRA'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['periodo'] = $row['c_periodo'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['fecha_vencimiento'] = $row['d_fecven'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['insoluto'] = number_format($row['n_impins'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['monto_ajustado'] = number_format($row['reajuste'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['mora'] = number_format($row['mora'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['costo'] = number_format($row['n_costem'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['total'] = number_format($row['total'],2);
						
						$contenedor[$aniocont]['detallado'][$descri][$b]['id'] = $row['N_IDRECI'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['direccion_predio'] = $row['Direccion_Predio'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['uso'] = $row['Uso_rentas'];

						$b++;
						break;
					case '11.04':
						$contenedor[$aniocont]['detallado'][$descri][$d]['catastral'] = $row['c_cocata'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['tributo'] = $row['V_RESTRA'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['periodo'] = $row['c_periodo'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['fecha_vencimiento'] = $row['d_fecven'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['insoluto'] = number_format($row['n_impins'],2);
						$contenedor[$aniocont]['detallado'][$descri][$d]['monto_ajustado'] = number_format($row['reajuste'],2);
						$contenedor[$aniocont]['detallado'][$descri][$d]['mora'] = number_format($row['mora'],2);
						$contenedor[$aniocont]['detallado'][$descri][$d]['costo'] = number_format($row['n_costem'],2);
						$contenedor[$aniocont]['detallado'][$descri][$d]['total'] = number_format($row['total'],2);
						
						$contenedor[$aniocont]['detallado'][$descri][$d]['id'] = $row['N_IDRECI'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['direccion_predio'] = $row['Direccion_Predio'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['uso'] = $row['Uso_rentas'];

						$d++;
						break;
					case '12.23':
						$contenedor[$aniocont]['detallado'][$descri][$e]['tributo'] = $row['V_RESTRA'];
						$contenedor[$aniocont]['detallado'][$descri][$e]['periodo'] = $row['c_periodo'];
						$contenedor[$aniocont]['detallado'][$descri][$e]['fecha_vencimiento'] = $row['d_fecven'];
						$contenedor[$aniocont]['detallado'][$descri][$e]['insoluto'] = number_format($row['n_impins'],2);
						$contenedor[$aniocont]['detallado'][$descri][$e]['monto_ajustado'] = number_format($row['reajuste'],2);
						$contenedor[$aniocont]['detallado'][$descri][$e]['mora'] = number_format($row['mora'],2);
						$contenedor[$aniocont]['detallado'][$descri][$e]['costo'] = number_format($row['n_costem'],2);
						$contenedor[$aniocont]['detallado'][$descri][$e]['total'] = number_format($row['total'],2);
						
						$contenedor[$aniocont]['detallado'][$descri][$e]['id'] = $row['N_IDRECI'];

						$e++;
						break;
				}

			}

			$puntero++;
		}
        
        $data = ['resultado' => [$contenedor]];
        
        return $data;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Funcion para imprimir estado de cuenta detallado general
    function EstCtaGeneral($InputParameter)
    {
        $conexion = bd_conecta();

        $codigo = $InputParameter['ID_CONTRIB'];

        $contenedor = [];
        $puntero = 0;
		$aniocont = -1;
		$anioant ='';

		$query = "execute [visa].[ESTADO_DE_CUENTA_GENERAL] '$codigo'";
		$execute = mssql_query($query,$conexion);

		if (mssql_num_rows($execute) > 0) {
			
			//$contenedor[$aniocont]['anio'] = $anio;

			/*Contadores*/
			$a = 0;
			$b = 0;
			$c = 0;
			$d = 0;
			$e = 0;
			$f = 0;

			while ($row = mssql_fetch_array($execute)) {
				
				if($row['c_aficat']<>$anioant){
					$anioant = $row['c_aficat'];
					$aniocont++;
				}
				
				$contenedor[$aniocont]['anio'] = $row['c_aficat'];
				
				
				$descri = str_replace(" ","",$row['V_Descri']);
				$descri = str_replace(".","",$descri);
				
				switch ($row['c_idtrar']) {
					case '02.01':
						$contenedor[$aniocont]['detallado'][$descri][$a]['tributo'] = $row['V_RESTRA'];
						$contenedor[$aniocont]['detallado'][$descri][$a]['periodo'] = $row['c_periodo'];
						$contenedor[$aniocont]['detallado'][$descri][$a]['fecha_vencimiento'] = $row['d_fecven'];
						$contenedor[$aniocont]['detallado'][$descri][$a]['insoluto'] = number_format($row['n_impins'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['monto_ajustado'] = number_format($row['reajuste'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['mora'] = number_format($row['mora'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['costo'] = number_format($row['n_costem'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['total'] = number_format($row['total'],2);
						
						$contenedor[$aniocont]['detallado'][$descri][$a]['id'] = $row['N_IDRECI'];
						$contenedor[$aniocont]['detallado'][$descri][$a]['autoval'] = number_format($row['N_AUTOAV'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['anexos'] = $row['N_TOTANE'];
						$contenedor[$aniocont]['detallado'][$descri][$a]['anual'] = number_format($row['anual'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['trimes'] = number_format($row['periodo'],2);
						$contenedor[$aniocont]['detallado'][$descri][$a]['situacion'] = $row['ESTADO'];

						$a++;
						break;
					case '11.01':
						$contenedor[$aniocont]['detallado'][$descri][$b]['catastral'] = $row['c_cocata'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['tributo'] = $row['V_RESTRA'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['periodo'] = $row['c_periodo'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['fecha_vencimiento'] = $row['d_fecven'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['insoluto'] = number_format($row['n_impins'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['monto_ajustado'] = number_format($row['reajuste'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['mora'] = number_format($row['mora'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['costo'] = number_format($row['n_costem'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['total'] = number_format($row['total'],2);
						
						$contenedor[$aniocont]['detallado'][$descri][$b]['id'] = $row['N_IDRECI'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['direccion_predio'] = $row['Direccion_Predio'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['uso'] = $row['Uso_rentas'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['situacion'] = $row['ESTADO'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['estado'] = $row['V_DEESCO'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['area'] = number_format($row['n_areade'],2);

						$b++;
						break;
					case '11.03':
						$contenedor[$aniocont]['detallado'][$descri][$b]['catastral'] = $row['c_cocata'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['tributo'] = $row['V_RESTRA'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['periodo'] = $row['c_periodo'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['fecha_vencimiento'] = $row['d_fecven'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['insoluto'] = number_format($row['n_impins'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['monto_ajustado'] = number_format($row['reajuste'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['mora'] = number_format($row['mora'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['costo'] = number_format($row['n_costem'],2);
						$contenedor[$aniocont]['detallado'][$descri][$b]['total'] = number_format($row['total'],2);
						
						$contenedor[$aniocont]['detallado'][$descri][$b]['id'] = $row['N_IDRECI'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['direccion_predio'] = $row['Direccion_Predio'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['uso'] = $row['Uso_rentas'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['situacion'] = $row['ESTADO'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['estado'] = $row['V_DEESCO'];
						$contenedor[$aniocont]['detallado'][$descri][$b]['area'] = number_format($row['n_areade'],2);

						$b++;
						break;
					case '11.04':
						$contenedor[$aniocont]['detallado'][$descri][$d]['catastral'] = $row['c_cocata'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['tributo'] = $row['V_RESTRA'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['periodo'] = $row['c_periodo'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['fecha_vencimiento'] = $row['d_fecven'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['insoluto'] = number_format($row['n_impins'],2);
						$contenedor[$aniocont]['detallado'][$descri][$d]['monto_ajustado'] = number_format($row['reajuste'],2);
						$contenedor[$aniocont]['detallado'][$descri][$d]['mora'] = number_format($row['mora'],2);
						$contenedor[$aniocont]['detallado'][$descri][$d]['costo'] = number_format($row['n_costem'],2);
						$contenedor[$aniocont]['detallado'][$descri][$d]['total'] = number_format($row['total'],2);
						
						$contenedor[$aniocont]['detallado'][$descri][$d]['id'] = $row['N_IDRECI'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['direccion_predio'] = $row['Direccion_Predio'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['uso'] = $row['Uso_rentas'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['situacion'] = $row['ESTADO'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['estado'] = $row['V_DEESCO'];
						$contenedor[$aniocont]['detallado'][$descri][$d]['area'] = number_format($row['n_areade'],2);

						$d++;
						break;
					case '12.23':
						$contenedor[$aniocont]['detallado'][$descri][$e]['tributo'] = $row['V_RESTRA'];
						$contenedor[$aniocont]['detallado'][$descri][$e]['periodo'] = $row['c_periodo'];
						$contenedor[$aniocont]['detallado'][$descri][$e]['fecha_vencimiento'] = $row['d_fecven'];
						$contenedor[$aniocont]['detallado'][$descri][$e]['insoluto'] = number_format($row['n_impins'],2);
						$contenedor[$aniocont]['detallado'][$descri][$e]['monto_ajustado'] = number_format($row['reajuste'],2);
						$contenedor[$aniocont]['detallado'][$descri][$e]['mora'] = number_format($row['mora'],2);
						$contenedor[$aniocont]['detallado'][$descri][$e]['costo'] = number_format($row['n_costem'],2);
						$contenedor[$aniocont]['detallado'][$descri][$e]['total'] = number_format($row['total'],2);
						
						$contenedor[$aniocont]['detallado'][$descri][$e]['id'] = $row['N_IDRECI'];
						$contenedor[$aniocont]['detallado'][$descri][$e]['situacion'] = $row['ESTADO'];

						$e++;
						break;
				}

			}

			$puntero++;
		}
        
        $data = ['resultado' => [$contenedor]];
        
        return $data;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//Funcion para imprimir estado de cuenta detallado consolidado
    function EstCtaConsolidado($InputParameter)
    {
        $conexion = bd_conecta();

        $codigo = $InputParameter['ID_CONTRIB'];

		$query = "execute [visa].[ESTADO_DE_CUENTA_CONSOLIDADO] '$codigo'";
		$execute = mssql_query($query,$conexion);

        $contenedor = [];
        $puntero = 0;
		
	
        if (mssql_num_rows($execute) > 0) {
        
            $a = 0;

            while ($row = mssql_fetch_array($execute)) {
                            
				$contenedor['consolidado'][$a]['TRIBUTO']=$row['V_Descri'];
				$contenedor['consolidado'][$a]['CODCATASTRAL']=$row['c_cocata'];
				$contenedor['consolidado'][$a]['ANIO']=$row['c_aficat'];
				$contenedor['consolidado'][$a]['INSOLUTO'] = number_format($row['n_impins'],2);
				$contenedor['consolidado'][$a]['AJUSTADO'] = number_format($row['reajuste'],2);
				$contenedor['consolidado'][$a]['MORA'] = number_format($row['mora'],2);
				$contenedor['consolidado'][$a]['COSTO'] = number_format($row['n_costem'],2);
				$contenedor['consolidado'][$a]['TOTAL'] = number_format($row['total'],2);
				
                $a++;


            }

            $puntero++;
        }
        
        $data = ['resultado' => [$contenedor]];
		
        return $data;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//Funcion para imprimir estado de cuenta detallado consolidado
    function EstCtaConsolidado2($InputParameter)
    {
        $conexion = bd_conecta();

        $codigo = $InputParameter['ID_CONTRIB'];

		$query = "execute [visa].[ESTADO_DE_CUENTA_CONSOLIDADO_SCC] '$codigo'";
		$execute = mssql_query($query,$conexion);

        $contenedor = [];
        $puntero = 0;
		
	
        if (mssql_num_rows($execute) > 0) {
        
            $a = 0;

            while ($row = mssql_fetch_array($execute)) {
                            
				$contenedor['consolidado'][$a]['TRIBUTO']=$row['V_Descri'];
				//$contenedor['consolidado'][$a]['CODCATASTRAL']=$row['c_cocata'];
				$contenedor['consolidado'][$a]['ANIO']=$row['c_aficat'];
				$contenedor['consolidado'][$a]['INSOLUTO'] = number_format($row['n_impins'],2);
				$contenedor['consolidado'][$a]['AJUSTADO'] = number_format($row['reajuste'],2);
				$contenedor['consolidado'][$a]['MORA'] = number_format($row['mora'],2);
				$contenedor['consolidado'][$a]['COSTO'] = number_format($row['n_costem'],2);
				$contenedor['consolidado'][$a]['TOTAL'] = number_format($row['total'],2);
				
                $a++;


            }

            $puntero++;
        }
        
        $data = ['resultado' => [$contenedor]];
		
        return $data;
    }



    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Función para obtener los datos del contribuyente a partir de si codigo
    function DatosAlumno($InputParameter)
    {
        $conexion = bd_conecta();

        $type = $InputParameter['TYPE'];
        $search = $InputParameter['QUERY'];
        $dni = '';
        $nombre = '';
        switch ($type) {
            case 'DNI':
                $dni = $search;
                break;            
            default:
                $nombre = $search;
                break;
        }
        $query = "execute Buscar_alumnos 1, '$dni', '$nombre'";
        $execute = mssql_query($query,$conexion);

        $CodigoAlumno = "Sin datos";
        $v_apepat = "Sin datos";
        $v_apemat = "Sin datos";
        $v_nombre = "Sin datos";
        $vrazonsocial = "Sin datos";
        $iid_sexo = 0;
        $telefono = "Sin datos";
        $Correo = "Sin datos";
        $Celular = "Sin datos";
        $numeroX = "Sin datos";
        $numero = "Sin datos";
        $FechaNacimiento = "Sin datos";
        $edad = 0;
        $CodigoTA = 0;
        $iddpto = 0;
        $idprov = 0;
        $iddistrito = 0;
        $direccion = "Sin datos";
        $Estado = 0;
        $iid_persona = 0;
        $NroSeguro = "Sin datos";
        $CodigoEC = "Sin datos";
        $CodigoParentesco = "Sin datos";
        $IdSede = 0;
        $NombreSede = "Sin datos";

        if(mssql_num_rows($execute) > 0)
        {
            while($row = mssql_fetch_array($execute))
            {
                $CodigoAlumno = $row[0];
                $v_apepat = $row[1];
                $v_apemat = $row[2];
                $v_nombre = $row[3];
                $vrazonsocial = $row[4];
                $iid_sexo = $row[5];
                $telefono = $row[6];
                $Correo = $row[7];
                $Celular = $row[8];
                $numeroX = $row[9];
                $numero = $row[10];
                $FechaNacimiento = $row[11];
                $edad = $row[12];
                $CodigoTA = $row[13];
                $iddpto = $row[14];
                $idprov = $row[15];
                $iddistrito = $row[16];
                $direccion = $row[17];
                $Estado = $row[18];
                $iid_persona = $row[19];
                $NroSeguro = $row[20];
                $CodigoEC = $row[21];
                $CodigoParentesco = $row[22];
                $IdSede = $row[23];
                $NombreSede = $row[24];
            }
        }

        $data = array(
            'CodigoAlumno' => $CodigoAlumno,
            'v_apepat' => $v_apepat,
            'v_apemat' => $v_apemat,
            'v_nombre' => $v_nombre,
            'vrazonsocial' => $vrazonsocial,
            'iid_sexo' => $iid_sexo,
            'telefono' => $telefono,
            'Correo' => $Correo,
            'Celular' => $Celular,
            'numeroX' => $numeroX,
            'numero' => $numero,
            'FechaNacimiento' => $FechaNacimiento,
            'edad' => $edad,
            'CodigoTA' => $CodigoTA,
            'iddpto' => $iddpto,
            'idprov' => $idprov,
            'id_distrito' => $iddistrito,
            'direccion' => $direccion,
            'Estado' => $Estado,
            'iid_persona' => $iid_persona,
            'NroSeguro' => $NroSeguro,
            'CodigoEC' => $CodigoEC,
            'CodigoParentesco' => $CodigoParentesco,
            'IdSede' => $IdSede,
            'NombreSede' => $NombreSede);
        return $data;
    }

    //Funcion para grabar datos del alumno
    function GrabarAlumno($InputParameter)
    {
        $conexion = bd_conecta();
        $CodigoAlumno = $InputParameter['CodigoAlumno'];
        $iid_persona = $InputParameter['iid_persona'];
        $v_nombre = $InputParameter['v_nombre'];
        $v_apepat = $InputParameter['v_apepat'];
        $v_apemat = $InputParameter['v_apemat'];
        $iid_sexo = $InputParameter['iid_sexo'];
        $telefono = $InputParameter['telefono'];
        $celular = $InputParameter['celular'];
        $Correo = $InputParameter['Correo'];
        $numero = $InputParameter['numero'];
        $FechaNacimiento = $InputParameter['FechaNacimiento'];
        $edad = $InputParameter['edad'];
        $idubigeo = $InputParameter['idubigeo'];
        $direccion = $InputParameter['direccion'];
        $code_email = $InputParameter['code_email'];
        $usuario = $InputParameter['usuario'];
        $ip = $InputParameter['ip'];
                
        $query = "execute graba_alumno '$v_nombre','$v_apepat','$v_apemat','$iid_sexo','$telefono','$celular','$Correo','$numero','$FechaNacimiento','$edad','$idubigeo','$direccion','$code_email','$usuario','$ip' ";
        $execute = mssql_query($query);

        while ($row = mssql_fetch_array($execute)) {
            $acceso = $row['respuesta'];
        }      

        $data = array('RPTA'=>$acceso);
        return $data;
    }

    //Funcion para imprimir estado de cuenta detallado consolidado
    function ListarAlumnos($InputParameter)
    {
        $conexion = bd_conecta();
        $codigo = $InputParameter['code_email'];
        $query = "execute lista_alumnos_x_apoderado '$codigo'";
        $execute = mssql_query($query,$conexion);
        $contenedor = [];
        $puntero = 0;
        if (mssql_num_rows($execute) > 0) {
            $a = 0;
            while ($row = mssql_fetch_array($execute)) {
                $contenedor['listado'][$a]['CodigoAlumno']=$row['CodigoAlumno'];
                $contenedor['listado'][$a]['iid_persona']=$row['iid_persona'];
                $contenedor['listado'][$a]['vrazonsocial']=$row['vrazonsocial'];
                $contenedor['listado'][$a]['numero']=$row['numero'];
                $contenedor['listado'][$a]['Correo'] = $row['Correo'];
                $contenedor['listado'][$a]['telefono'] = $row['telefono'];
                $contenedor['listado'][$a]['Celular'] = $row['Celular'];
                $contenedor['listado'][$a]['edad'] = $row['edad'];
                $contenedor['listado'][$a]['V_EMAILWEB'] = $row['V_EMAILWEB'];
                $a++;
            }
            $puntero++;
        }     
        $data = ['resultado' => [$contenedor]];
        return $data;
    }
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //
    function NombreSede($InputParameter)
    {
        $conexion = bd_conecta();

        $idsede_new = $InputParameter['idsede_new'];
        $result = mssql_query("select idsede, NombreSede, idsede_new from vw_sedes where idsede_new = $idsede_new");

        $id = 0;
        $nombre = "Sin datos";
        $idnew = 0;

        if(mssql_num_rows($result) > 0)
        {
            while($row = mssql_fetch_array($result))
            {
                $id = $row[0];
                $nombre = $row[1];
                $idnew = $row[2];
            }
        }

        $data = array('idsede'=>$id,'nombresede'=>$nombre,'idsede_new'=>$idnew);
        return $data;
    }

        //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //
    function NombreCurso($InputParameter)
    {
        $conexion = bd_conecta();
        $anio = date('Y');
        $hoy = date('Y-m-d');
        $idsede_new = $InputParameter['idsede_new'];
        $query = "execute [visa].[Listado_ProgramacionCurso_horarios] 2, '','$anio', '$idsede_new' ";
        $execute = mssql_query($query,$conexion);

        $contenedor = [];
        $puntero = 0;
        if(mssql_num_rows($execute) > 0){
            $a = 0;
            while($row = mssql_fetch_array($execute)){
                $contenedor['listado'][$a]['CodigoCurso']=$row['CodigoCurso'];
                $contenedor['listado'][$a]['nombrecurso']=$row['NombreCurso'];
                $a++;
            }
            $puntero++;
        }
        $data = ['resultado' => [$contenedor]];
        return $data;
    }

    //
    function ListarHorariosGrilla($InputParameter)
    {
        $conexion = bd_conecta();
        $anio = date('Y');
        $mes = date('m');       
        $sede = $InputParameter['idsede_new'];
        $curso = $InputParameter['curso_id'];

        $contenedor = [];
        $puntero = 0;
        $sedecont = -1;
        $sedeant ='';

            $query = "execute [visa].[Listado_ProgramacionCurso_horarios] 1, '$mes', '$anio', '$sede', '$curso' ";
            $execute = mssql_query($query,$conexion);

            if (mssql_num_rows($execute) > 0) {
                
                /*Contadores*/
                $a = 0;
                $b = 0;
                $c = 0;
                $d = 0;
                $e = 0;
                $f = 0;

                while ($row = mssql_fetch_array($execute)) {
                    if($row['idsede_new']<>$sedeant){
                        $sedeant = $row['idsede_new'];
                        $sedecont++;
                    }
                    $contenedor[$sedecont]['anio'] = $row['idsede_new'];
                    
                    $descri = str_replace(" ","",$row['NombreSede']);
                    $descri = str_replace(".","",$descri);

                    $contenedor[$sedecont]['detallado'][$b]['edades'] = $row['rango_edad'];
                    $contenedor[$sedecont]['detallado'][$b]['curso'] = $row['NombreCurso'];
                    $contenedor[$sedecont]['detallado'][$b]['dias'] = $row['DescripcionD'];
                    $contenedor[$sedecont]['detallado'][$b]['horas'] = $row['Hora'];
                    $contenedor[$sedecont]['detallado'][$b]['fecini'] = $row['Inicio'];
                    $contenedor[$sedecont]['detallado'][$b]['fecfin'] = $row['Fin'];
                    $contenedor[$sedecont]['detallado'][$b]['vacantes'] = $row['vacantes'];
                    $contenedor[$sedecont]['detallado'][$b]['precio'] = $row['preccurso'];
                    $contenedor[$sedecont]['detallado'][$b]['id'] = $row['CodigoPC'];
                    $contenedor[$sedecont]['detallado'][$b]['coactivo'] = $row['ID_COAC'];

                    // $contenedor[$sedecont]['detallado'][$b]['catastral'] = $row['NombreCurso'];
                    // $contenedor[$sedecont]['detallado'][$b]['tributo'] = $row['V_RESTRA'];
                    // $contenedor[$sedecont]['detallado'][$b]['periodo'] = $row['c_periodo'];
                    // $contenedor[$sedecont]['detallado'][$b]['fecha_vencimiento'] = $row['d_fecven'];
                    // $contenedor[$sedecont]['detallado'][$b]['insoluto'] = number_format($row['n_impins'],2);
                    // $contenedor[$sedecont]['detallado'][$b]['monto_ajustado'] = number_format($row['reajuste'],2);
                    // $contenedor[$sedecont]['detallado'][$b]['mora'] = number_format($row['mora'],2);
                    // $contenedor[$sedecont]['detallado'][$b]['costo'] = number_format($row['n_costem'],2);
                    // $contenedor[$sedecont]['detallado'][$b]['total'] = number_format($row['total'],2);
                    // $contenedor[$sedecont]['detallado'][$b]['direccion_predio'] = $row['Direccion_Predio'];
                    // $contenedor[$sedecont]['detallado'][$b]['uso'] = $row['Uso_rentas'];
                    // $contenedor[$sedecont]['detallado'][$b]['situacion'] = $row['Situacion'];
                    // $contenedor[$sedecont]['detallado'][$b]['coactivo'] = $row['ID_COAC'];
                    // $contenedor[$sedecont]['detallado'][$b]['CodigoPC'] = $row['CodigoPC'];
                    // $contenedor[$sedecont]['detallado'][$b]['IdSede'] = $row['IdSede'];
                    // $contenedor[$sedecont]['detallado'][$b]['sede'] = $row['NombreSede'];
                    // $contenedor[$sedecont]['detallado'][$b]['NombreModalidad'] = $row['NombreModalidad'];
                    // $contenedor[$sedecont]['detallado'][$b]['E_desde'] = $row['E_desde'];
                    // $contenedor[$sedecont]['detallado'][$b]['E_hasta'] = $row['E_hasta'];
                    // $contenedor[$sedecont]['detallado'][$b]['ambiente'] = $row['NombreAmbiente'];
                    // $contenedor[$sedecont]['detallado'][$b]['vrazonsocial'] = $row['vrazonsocial'];
                    // $contenedor[$sedecont]['detallado'][$b]['NAlumnosMAx'] = $row['NAlumnosMAx'];
                    // $contenedor[$sedecont]['detallado'][$b]['NAlumnosMin'] = $row['NAlumnosMin'];
                    // $contenedor[$sedecont]['detallado'][$b]['estado'] = $row['estado'];
                    // $contenedor[$sedecont]['detallado'][$b]['CodigoPeriodo'] = $row['CodigoPeriodo'];
                    // $contenedor[$sedecont]['detallado'][$b]['Modalidad'] = $row['Modalidad'];
                    // $contenedor[$sedecont]['detallado'][$b]['Especialidad'] = $row['Especialidad'];
                    // $contenedor[$sedecont]['detallado'][$b]['CodigoCurso'] = $row['CodigoCurso'];
                    // $contenedor[$sedecont]['detallado'][$b]['CodigoProfesor'] = $row['CodigoProfesor'];
                    // $contenedor[$sedecont]['detallado'][$b]['CodigoAmbiente'] = $row['CodigoAmbiente'];
                    // $contenedor[$sedecont]['detallado'][$b]['CodigoDia'] = $row['CodigoDia'];
                    $b++;
                }
                $puntero++;
            }
        $data = ['resultado' => [$contenedor]];
        return $data;
    }

    function ReciboCab($InputParameter)
    {
        $conexion = bd_conecta();
        $nro_recibo = $InputParameter['NRO_RECIBO'];
        $contenedor = [];
        $puntero = 0;

        $query = "execute [visa].[Pagos_recibo_cab] '$nro_recibo'";
        $execute = mssql_query($query,$conexion);
        if (mssql_num_rows($execute) > 0) {
            $a = 0;
            while ($row = mssql_fetch_array($execute)) {
                $contenedor['listado'][$a]['nropedido'] = $row['N_IDLIQU'];
                $contenedor['listado'][$a]['nrorecibo'] = $row['c_nrorec'];
                $contenedor['listado'][$a]['fecha_pago'] = $row['d_fecpag'];
                $contenedor['listado'][$a]['importe'] = number_format($row['n_totrec'],2);
                $contenedor['listado'][$a]['nomalumno'] = $row['nombre_alumno'];
                $a++;
            }
            $puntero++;
        }       
        $data = ['resultado' => [$contenedor]];
        return $data;
    }
    //Funcion para listar los periodos (promgramacion)
    function ListarPeriodos($InputParameter)
    {
        $conexion = bd_conecta();
        $year = $InputParameter['year'];
        $query = "execute visa.lista_programacionPeriodos '$year'";
        $execute = mssql_query($query,$conexion);
        $contenedor = [];
        $puntero = 0;
        if (mssql_num_rows($execute) > 0) {
            $a = 0;
            while ($row = mssql_fetch_array($execute)) {
                $contenedor['listado'][$a]['number_month']=$row['number_month'];
                $contenedor['listado'][$a]['name_month']=$row['name_month'];
                $a++;
            }
            $puntero++;
        }     
        $data = ['resultado' => [$contenedor]];
        return $data;
    }

    //Funcion para listar los sedes
    function ListarSedes($InputParameter)
    {
        $conexion = bd_conecta();
        $mes = $InputParameter['mes'];
        $anio = $InputParameter['anio'];
        $query = "execute visa.lista_sedes_select '$mes','$anio'";
        $execute = mssql_query($query,$conexion);
        $contenedor = [];
        $puntero = 0;
        if (mssql_num_rows($execute) > 0) {
            $a = 0;
            while ($row = mssql_fetch_array($execute)) {
                $contenedor['listado'][$a]['idsede']=$row['idsede'];
                $contenedor['listado'][$a]['nombresede']=$row['nombresede'];
                $contenedor['listado'][$a]['idsede_new']=$row['idsede_new'];
                $a++;
            }
            $puntero++;
        }     
        $data = ['resultado' => [$contenedor]];
        return $data;
    }
    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // Get our posted data if the service is being consumed
    // otherwise leave this data blank.
    $POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

    // pass our posted data (or nothing) to the soap service
    $server->service($POST_DATA);
    exit();


?>