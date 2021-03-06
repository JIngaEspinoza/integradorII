USE [SGA]
GO
/****** Object:  Table [audit].[tbCurso]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [audit].[tbCurso](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[accion] [varchar](10) NULL,
	[CodigoCurso] [char](8) NULL,
	[NombreCurso] [varchar](50) NULL,
	[CodigoCategoria] [char](4) NULL,
	[Costo] [decimal](18, 2) NULL,
	[Estado] [int] NULL,
	[IdSede] [int] NULL,
	[fecha] [datetime] NULL,
 CONSTRAINT [PK__tbCurso__3213E83F0678CA93] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[code]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[code](
	[id_code] [int] IDENTITY(1,1) NOT NULL,
	[CodigoCurso] [varchar](50) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[codes]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[codes](
	[id_code] [int] IDENTITY(1,1) NOT NULL,
	[CodigoCurso] [varchar](50) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Codigos]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Codigos](
	[id_codigo] [int] IDENTITY(1,1) NOT NULL,
	[CodigoCurso] [varchar](50) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Alumno]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Alumno](
	[CodigoAlumno] [varchar](12) NOT NULL,
	[iid_persona] [int] NOT NULL,
	[CodigoTA] [int] NULL,
	[CodigoParentesco] [int] NULL,
	[Observaciones] [varchar](250) NULL,
	[FechaR] [date] NULL,
	[FechaA] [date] NULL,
	[estado] [int] NULL,
	[usuario] [varchar](100) NULL,
	[Correo] [varchar](100) NULL,
	[telefono] [varchar](15) NULL,
	[Celular] [varchar](15) NULL,
	[idsede] [int] NULL,
 CONSTRAINT [PK_tb_Alumno] PRIMARY KEY CLUSTERED 
(
	[CodigoAlumno] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_alumnoweb]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_alumnoweb](
	[CodigoAlumno] [varchar](12) NOT NULL,
	[iid_persona] [int] NULL,
	[CodigoTA] [int] NULL,
	[CodigoParentesco] [int] NULL,
	[Observaciones] [varchar](50) NULL,
	[FechaR] [date] NULL,
	[fechaA] [date] NULL,
	[estado] [int] NULL,
	[usuario] [varchar](100) NULL,
	[Correo] [varchar](100) NULL,
	[telefono] [varchar](15) NULL,
	[Celular] [varchar](15) NULL,
	[idsede] [int] NULL,
	[V_EMAILWEB] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoAlumno] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Ambiente]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Ambiente](
	[CodigoAmbiente] [int] IDENTITY(1,1) NOT NULL,
	[NombreAmbiente] [varchar](50) NOT NULL,
	[estado] [int] NULL,
	[Capacidad] [int] NULL,
	[Sede] [int] NULL,
	[TipoAmbiente] [varchar](25) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoAmbiente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_cajas]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_cajas](
	[CodigoCaja] [int] IDENTITY(1,1) NOT NULL,
	[NumeroRecibo] [int] NULL,
	[Estado] [int] NULL,
	[v_estacion] [varchar](50) NULL,
	[fecha] [datetime] NULL,
	[v_usuario] [varchar](50) NULL,
	[IdSede] [int] NULL,
	[iid_usuario] [int] NULL,
	[CodigoPeriodo] [varchar](10) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoCaja] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_CategoriaCursos]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_CategoriaCursos](
	[CodigoCategoria] [char](8) NOT NULL,
	[NombreCategoria] [varchar](40) NULL,
	[Estado] [int] NULL,
	[IdSede] [int] NULL,
 CONSTRAINT [PK__tb_Categ__3CEE2F4C07C12930] PRIMARY KEY CLUSTERED 
(
	[CodigoCategoria] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_conceptos]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_conceptos](
	[Cod_concepto] [int] NULL,
	[Descripcion_concepto] [varchar](50) NULL,
	[partida_pres] [varchar](20) NULL,
	[estado] [int] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Curso]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Curso](
	[CodigoCurso] [char](8) NOT NULL,
	[NombreCurso] [varchar](100) NULL,
	[CodigoCategoria] [char](8) NULL,
	[CodigoModalidad] [char](4) NULL,
	[Costo] [decimal](18, 2) NULL,
	[Estado] [int] NULL,
	[IdSede] [int] NULL,
 CONSTRAINT [PK_tb_Curso] PRIMARY KEY CLUSTERED 
(
	[CodigoCurso] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_cursos_x_sedes]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_cursos_x_sedes](
	[N_IDLIQ] [int] NULL,
	[N_IDRECI] [varchar](50) NULL,
	[C_IDCONT] [varchar](100) NULL,
	[id_sede] [int] NULL,
	[c_nrorec] [varchar](14) NULL,
	[estado] [int] NULL,
	[c_fecpag] [datetime] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_cursos_x_sedes2]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_cursos_x_sedes2](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[N_IDLIQ] [int] NULL,
	[N_IDRECI] [varchar](50) NULL,
	[C_IDCONT] [varchar](100) NULL,
	[id_sede] [int] NULL,
	[c_nrorec] [varchar](14) NULL,
	[estado] [int] NULL,
	[c_fecpag] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_detalle_matricula]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_detalle_matricula](
	[id_detalle_matricula] [int] IDENTITY(1,1) NOT NULL,
	[HoraProgra] [char](10) NULL,
	[Monto] [decimal](18, 2) NULL,
	[id_Matricula] [char](10) NULL,
	[CodigoRMD] [char](10) NULL,
	[pago_mes] [varchar](100) NULL,
	[voucher] [varchar](15) NULL,
	[b_concepto] [int] NULL,
	[ValDescuento] [decimal](18, 2) NULL,
	[carnet] [int] NULL,
 CONSTRAINT [PK__tb_detal__07247C6C1B9317B3] PRIMARY KEY CLUSTERED 
(
	[id_detalle_matricula] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_detalle_ProgrCurso]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_detalle_ProgrCurso](
	[CodigoPC] [char](9) NOT NULL,
	[CodigoCurso] [char](8) NOT NULL,
	[CodigoProfesor] [char](10) NOT NULL,
	[CodigoAmbiente] [int] NULL,
	[CodigoHora] [int] NULL,
	[CodigoDia] [int] NULL,
	[inicio] [date] NOT NULL,
	[fin] [date] NOT NULL,
	[NAlumnosMin] [int] NULL,
	[NAlumnosMAx] [int] NULL,
	[estado] [char](1) NULL,
	[E_desde] [int] NULL,
	[E_hasta] [int] NULL,
	[IdSede] [int] NULL,
 CONSTRAINT [PK__tb_detal__E024278612FDD1B2] PRIMARY KEY CLUSTERED 
(
	[CodigoPC] ASC,
	[CodigoCurso] ASC,
	[CodigoProfesor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Dias]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Dias](
	[CodigoDia] [int] IDENTITY(1,1) NOT NULL,
	[DescripcionD] [varchar](50) NOT NULL,
	[Estado] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoDia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[DescripcionD] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_documentos_persona]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_documentos_persona](
	[iid_personadoc] [int] IDENTITY(1,1) NOT NULL,
	[iid_persona] [int] NOT NULL,
	[iid_tdocpersona] [int] NOT NULL,
	[numero] [varchar](100) NULL,
	[flag] [int] NULL,
	[bprincipal] [int] NULL DEFAULT ((0))
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_EstadoCivil]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_EstadoCivil](
	[CodigoEC] [int] IDENTITY(1,1) NOT NULL,
	[NombreEC] [varchar](15) NOT NULL,
	[estado] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoEC] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[NombreEC] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_EstadoRecibo]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_EstadoRecibo](
	[Id_EstadoRecibo] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](100) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_EstaPagos]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_EstaPagos](
	[idEstaPagos] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [varchar](100) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idEstaPagos] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_historial_anula]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_historial_anula](
	[id_anula] [int] IDENTITY(1,1) NOT NULL,
	[fec_anula] [datetime] NULL,
	[user_anula] [varchar](20) NULL,
	[estacion] [varchar](20) NULL,
	[sede] [int] NULL,
	[num_recibo] [varchar](20) NULL,
	[monto_anula] [decimal](18, 2) NULL,
	[motivo_anula] [varchar](300) NULL,
	[estado] [int] NULL,
	[codigoalumno] [varchar](15) NULL,
	[id_matricula] [varchar](15) NULL,
	[idrm] [varchar](15) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Horarios]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Horarios](
	[CodHorario] [int] IDENTITY(1,1) NOT NULL,
	[Inicio] [int] NOT NULL,
	[Fin] [int] NOT NULL,
	[Hora] [varchar](30) NULL,
	[Sede] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[CodHorario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Horas]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Horas](
	[CodigoHora] [int] IDENTITY(1,1) NOT NULL,
	[DescripcionH] [varchar](50) NOT NULL,
	[Estado] [int] NULL,
	[horita_24] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoHora] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Matricula]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Matricula](
	[Id_Matricula] [char](10) NULL,
	[CodigoRM] [char](10) NULL,
	[Contador] [int] NULL,
	[Voucher] [varchar](15) NULL,
	[HoraProgra] [char](10) NULL,
	[FechaRegis] [date] NULL,
	[idEstaPagos] [int] NULL,
	[estado] [int] NULL,
	[obs] [varchar](500) NULL,
	[idmatricula] [int] IDENTITY(1,1) NOT NULL,
	[pago_mes] [varchar](100) NULL,
	[cuota] [varchar](10) NULL,
 CONSTRAINT [PK__tb_Matri__C63F5ED40880433F] PRIMARY KEY CLUSTERED 
(
	[idmatricula] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_medio_contacto]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_medio_contacto](
	[iid_telefono] [int] IDENTITY(1,1) NOT NULL,
	[iid_persona] [int] NOT NULL,
	[iid_tfono] [int] NOT NULL,
	[descripcion] [varchar](150) NULL,
	[flag] [int] NULL,
	[bprincipal] [int] NULL,
	[CodigoAlumno] [varchar](12) NULL,
PRIMARY KEY CLUSTERED 
(
	[iid_telefono] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_ModalidadCurso]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_ModalidadCurso](
	[CodigoModalidad] [char](4) NOT NULL,
	[NombreModalidad] [varchar](40) NULL,
	[Estado] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoModalidad] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[NombreModalidad] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_pagos]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_pagos](
	[iid_pago] [int] NOT NULL,
	[iid_persona] [int] NOT NULL,
	[v_numrecibo] [varchar](50) NOT NULL,
	[d_fecpago] [date] NOT NULL,
	[d_fechor] [datetime] NULL,
	[n_monto] [numeric](18, 2) NOT NULL,
	[i_caja] [int] NULL,
	[i_tipopago] [int] NOT NULL,
	[v_] [nchar](10) NULL,
 CONSTRAINT [PK_tb_pagos] PRIMARY KEY CLUSTERED 
(
	[iid_pago] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Parentesco]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Parentesco](
	[CodigoParentesco] [int] IDENTITY(1,1) NOT NULL,
	[NombreParentesco] [varchar](50) NOT NULL,
	[estado] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoParentesco] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[NombreParentesco] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Periodo]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Periodo](
	[CodigoPeriodo] [char](3) NOT NULL,
	[AnioPeriodo] [char](15) NOT NULL,
	[FechaInicioPeriodo] [date] NULL,
	[FechaFinPeriodo] [date] NULL,
	[EstadoPeriodo] [int] NULL,
	[comenta] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoPeriodo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[AnioPeriodo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_persona]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_persona](
	[iid_persona] [int] IDENTITY(1,1) NOT NULL,
	[iid_tpersona] [int] NULL CONSTRAINT [DF__tb_person__iid_t__3DE82FB7]  DEFAULT ((1)),
	[vrazonsocial] [varchar](400) NULL,
	[idubigeo] [varchar](30) NULL,
	[direccion] [varchar](300) NULL,
	[vreplegal] [varchar](300) NULL,
	[vtipodocrl] [int] NULL,
	[vnrodocrl] [varchar](50) NULL,
	[vdireccirl] [varchar](250) NULL,
	[Clasificacion] [varchar](50) NULL CONSTRAINT [DF__tb_person__Clasi__3EDC53F0]  DEFAULT ((1)),
	[vusuario] [varchar](50) NULL CONSTRAINT [DF__tb_person__vusua__3FD07829]  DEFAULT (suser_sname()),
	[vestacion] [varchar](50) NULL CONSTRAINT [DF__tb_person__vesta__40C49C62]  DEFAULT (host_name()),
	[dfecha] [datetime] NULL CONSTRAINT [DF__tb_person__dfech__41B8C09B]  DEFAULT (getdate()),
	[v_nombre] [varchar](50) NULL,
	[v_apepat] [varchar](100) NULL,
	[v_apemat] [varchar](100) NULL,
	[iid_sexo] [int] NULL,
	[NroSeguro] [varchar](12) NULL,
	[CodigoEC] [int] NULL,
	[FechaNacimiento] [date] NULL,
	[edad] [int] NULL,
 CONSTRAINT [PK_tb_persona] PRIMARY KEY CLUSTERED 
(
	[iid_persona] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Profesor]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Profesor](
	[CodigoProfesor] [char](10) NOT NULL,
	[iid_persona] [int] NOT NULL,
	[observaciones] [varchar](250) NULL,
	[fecharegistro] [date] NULL,
	[fechaactualiza] [date] NULL,
	[usuario] [varchar](50) NULL,
	[estado] [int] NULL,
	[telefono] [varchar](15) NULL,
	[celular] [varchar](10) NULL,
	[email] [varchar](50) NULL,
	[Emcooporativo] [varchar](50) NULL,
	[IdSede] [int] NULL,
 CONSTRAINT [PK_tb_Profesor] PRIMARY KEY CLUSTERED 
(
	[CodigoProfesor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_ProgramacionCurso]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_ProgramacionCurso](
	[CodigoPC] [char](9) NOT NULL,
	[CodigoPeriodo] [char](3) NULL,
	[IdSede] [int] NULL,
	[CodigoTemporada] [char](5) NULL,
	[CodigoCurso] [char](8) NULL,
	[CodigoProfesor] [char](10) NULL,
	[CodigoAmbiente] [int] NULL,
	[CodigoHora] [int] NULL,
	[CodigoDia] [int] NOT NULL,
	[NAlumnosMin] [int] NULL,
	[NAlumnosMAx] [int] NULL,
	[ContadoRegistros] [int] NULL,
	[estado] [int] NULL,
	[usuario] [varchar](100) NULL,
	[FechaR] [date] NULL,
	[FechaA] [date] NULL,
	[Inicio] [date] NULL,
	[Fin] [date] NULL,
	[Modalidad] [int] NULL,
	[Especialidad] [varchar](30) NULL,
	[nivel] [varchar](50) NULL,
	[E_desde] [int] NULL,
	[E_hasta] [int] NULL,
	[vacantes] [int] NULL,
	[Monto_descuento] [decimal](18, 2) NULL,
 CONSTRAINT [PK__tb_Progr__DB3194DE15DA3E5D] PRIMARY KEY CLUSTERED 
(
	[CodigoPC] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_ProgramacionCurso_bk]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_ProgramacionCurso_bk](
	[CodigoPC] [char](9) NOT NULL,
	[CodigoPeriodo] [char](3) NULL,
	[IdSede] [int] NULL,
	[CodigoTemporada] [char](5) NULL,
	[CodigoCurso] [char](8) NULL,
	[CodigoProfesor] [char](10) NULL,
	[CodigoAmbiente] [int] NULL,
	[CodigoHora] [int] NULL,
	[CodigoDia] [int] NOT NULL,
	[NAlumnosMin] [int] NULL,
	[NAlumnosMAx] [int] NULL,
	[ContadoRegistros] [int] NULL,
	[estado] [int] NULL,
	[usuario] [varchar](100) NULL,
	[FechaR] [date] NULL,
	[FechaA] [date] NULL,
	[Inicio] [date] NULL,
	[Fin] [date] NULL,
	[Modalidad] [int] NULL,
	[Especialidad] [varchar](30) NULL,
	[nivel] [varchar](50) NULL,
	[E_desde] [int] NULL,
	[E_hasta] [int] NULL,
	[vacantes] [int] NULL,
	[Monto_descuento] [decimal](18, 2) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_RegistroMembresia]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_RegistroMembresia](
	[CodigoRM] [char](10) NULL,
	[FechaRM] [date] NULL,
	[CodigoPeriodo] [char](3) NULL,
	[CodigoAlumno] [varchar](12) NULL,
	[MontoTotal] [decimal](18, 2) NULL,
	[ValDescuento] [char](4) NULL,
	[Monto] [decimal](18, 2) NULL,
	[Usuario] [varchar](100) NULL,
	[Estado] [int] NULL,
	[FechaA] [date] NULL,
	[CodigoCategoria] [char](4) NULL,
	[CodigoModalidad] [char](4) NULL,
	[CodigoCurso] [char](8) NULL,
	[PartidaPresupuestal] [varchar](11) NULL,
	[idEstaPagos] [int] NULL,
	[CodigoAmbiente] [int] NULL,
	[CodigoDia] [int] NULL,
	[CodigoHora] [int] NULL,
	[idrm] [int] IDENTITY(1,1) NOT NULL,
	[voucher] [varchar](15) NULL,
	[idsede] [int] NULL,
 CONSTRAINT [PK__tb_Regis__9DBB54925C6CB6D7] PRIMARY KEY CLUSTERED 
(
	[idrm] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Sede]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Sede](
	[IdSede] [int] IDENTITY(1,1) NOT NULL,
	[NombreSede] [varchar](200) NOT NULL,
	[Direccion] [varchar](200) NULL,
	[Telefono] [varchar](50) NULL,
	[Nombre_encargado] [varchar](50) NULL,
	[DNI_encargado] [varchar](10) NULL,
	[Email_encargado] [varchar](50) NULL,
	[Cargo_encargado] [varchar](50) NULL,
	[Estado] [int] NULL CONSTRAINT [DF__tb_Sede__Estado__5AEE82B9]  DEFAULT ((1)),
 CONSTRAINT [PK__tb_Sede__A7780DFF5FB337D6] PRIMARY KEY CLUSTERED 
(
	[IdSede] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_sexo]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_sexo](
	[iid_sexo] [int] IDENTITY(1,1) NOT NULL,
	[vnom_sexo] [varchar](20) NULL,
PRIMARY KEY CLUSTERED 
(
	[iid_sexo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_tarjeta_pago]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_tarjeta_pago](
	[numero_recibo] [varchar](15) NULL,
	[codigo_caja] [varchar](2) NULL,
	[codigo_tarjeta] [varchar](5) NULL,
	[codigo_operacion] [varchar](20) NULL,
	[codigo_aut] [varchar](20) NULL,
	[fecha] [datetime] NULL,
	[usuario] [varchar](50) NULL,
	[IDsede] [int] NULL,
	[estado] [int] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_tdocumento_persona]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_tdocumento_persona](
	[iid_tdocpersona] [int] IDENTITY(1,1) NOT NULL,
	[vdescripcion] [varchar](250) NOT NULL,
	[flag] [int] NOT NULL DEFAULT ('1'),
	[Nrodigito] [int] NULL DEFAULT (NULL),
PRIMARY KEY CLUSTERED 
(
	[iid_tdocpersona] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_temp_tb_detalle_matricula]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_temp_tb_detalle_matricula](
	[id_detalle_matricula] [int] IDENTITY(1,1) NOT NULL,
	[HoraProgra] [char](10) NULL,
	[Monto] [decimal](18, 2) NULL,
	[id_Matricula] [char](10) NULL,
	[CodigoRMD] [char](10) NULL,
	[pago_mes] [varchar](100) NULL,
	[voucher] [varchar](15) NULL,
	[b_concepto] [int] NULL,
	[ValDescuento] [decimal](18, 2) NULL,
	[carnet] [int] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_Temporada]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_Temporada](
	[CodigoTemporada] [char](5) NOT NULL,
	[CodigoPeriodo] [char](3) NOT NULL,
	[NombreTemporada] [varchar](40) NOT NULL,
	[FechaInicio] [date] NULL,
	[FechaFin] [date] NULL,
	[Estado] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoTemporada] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[NombreTemporada] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_tipo_pago]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_tipo_pago](
	[id_tipo_p] [int] IDENTITY(1,1) NOT NULL,
	[cod_tarjeta] [varchar](5) NULL,
	[nombre_tarjeta] [varchar](100) NULL,
	[estado] [int] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_TipoAlumno]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_TipoAlumno](
	[CodigoTA] [int] IDENTITY(1,1) NOT NULL,
	[NombreTA] [varchar](50) NOT NULL,
	[estado] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoTA] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[NombreTA] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_TipoAmbiente]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_TipoAmbiente](
	[CodigoTipoAmbiente] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [varchar](50) NOT NULL,
	[IdSede] [int] NULL,
	[Estado] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[CodigoTipoAmbiente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_tipopersona]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_tipopersona](
	[iid_tpersona] [int] IDENTITY(1,1) NOT NULL,
	[vdescrip] [varchar](250) NOT NULL,
	[flag] [int] NOT NULL DEFAULT ('1'),
PRIMARY KEY CLUSTERED 
(
	[iid_tpersona] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_tmedio_contacto]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_tmedio_contacto](
	[iid_tfono] [int] IDENTITY(1,1) NOT NULL,
	[vdescripcion] [varchar](150) NOT NULL,
	[flag] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[iid_tfono] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tb_ubigeo]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tb_ubigeo](
	[id_ubigeo] [varchar](30) NOT NULL,
	[id_depto] [char](2) NOT NULL,
	[nomb_depto] [varchar](100) NULL DEFAULT (''),
	[id_provincia] [char](2) NOT NULL,
	[nom_provincia] [varchar](100) NOT NULL,
	[id_distrito] [char](2) NOT NULL,
	[nom_distrito] [varchar](100) NOT NULL,
	[anio] [char](4) NOT NULL DEFAULT ('2010'),
PRIMARY KEY CLUSTERED 
(
	[id_ubigeo] ASC,
	[anio] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[temp_curso]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING OFF
GO
CREATE TABLE [dbo].[temp_curso](
	[iidCurso] [int] IDENTITY(1,1) NOT NULL,
	[CodigoCurso] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[iidCurso] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [ingresos].[tb_cajarec_dia]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [ingresos].[tb_cajarec_dia](
	[c_nrorec] [varchar](20) NULL,
	[c_idcaja] [varchar](10) NULL,
	[c_fecpag] [datetime] NULL,
	[v_nomusu] [varchar](20) NULL,
	[v_estaci] [varchar](20) NULL,
	[v_sede] [int] NULL,
	[estado] [int] NULL,
	[c_tipopag] [varchar](50) NULL,
	[iid_persona] [int] NULL,
	[mod_sis] [varchar](5) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [ingresos].[tb_cajarecdet_dia]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [ingresos].[tb_cajarecdet_dia](
	[c_nrorec] [varchar](20) NULL,
	[c_idcaja] [varchar](10) NULL,
	[Cod_concepto] [int] NULL,
	[c_fecpag] [datetime] NULL,
	[monto_det] [decimal](12, 2) NULL,
	[v_nomusu] [varchar](20) NULL,
	[v_estaci] [varchar](20) NULL,
	[estado] [int] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [panel].[tb_acceso]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [panel].[tb_acceso](
	[iid_acceso] [int] IDENTITY(1,1) NOT NULL,
	[iid_sistema] [int] NOT NULL,
	[iid_usuario] [int] NOT NULL,
	[v_ip] [varchar](50) NULL,
	[b_estado] [int] NULL DEFAULT ((1)),
	[d_fechaingreso] [datetime] NOT NULL DEFAULT (getdate()),
	[v_idsession] [varchar](100) NULL,
	[d_fechasalida] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[iid_acceso] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [panel].[tb_dpermisoformulario]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [panel].[tb_dpermisoformulario](
	[iid_sistema] [int] NOT NULL,
	[iid_formulario] [int] NOT NULL,
	[iid_usuario] [int] NOT NULL,
	[flag] [int] NULL DEFAULT ((1)),
PRIMARY KEY CLUSTERED 
(
	[iid_sistema] ASC,
	[iid_formulario] ASC,
	[iid_usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [panel].[tb_dpermisoservicio]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [panel].[tb_dpermisoservicio](
	[iid_sistema] [int] NOT NULL,
	[iid_usuario] [int] NOT NULL,
	[iid_servicio] [int] NOT NULL,
	[iid_formulario] [int] NOT NULL,
	[flag] [int] NULL DEFAULT ((1)),
PRIMARY KEY CLUSTERED 
(
	[iid_sistema] ASC,
	[iid_usuario] ASC,
	[iid_servicio] ASC,
	[iid_formulario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [panel].[tb_formulario]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [panel].[tb_formulario](
	[iid_formulario] [int] IDENTITY(1,1) NOT NULL,
	[iid_sistema] [int] NOT NULL,
	[vnombre] [varchar](150) NULL,
	[vtitle] [varchar](150) NULL,
	[vdescripcion] [varchar](350) NULL,
	[vfile] [varchar](250) NULL,
	[inivel] [int] NULL DEFAULT ((0)),
	[iorden] [int] NULL,
	[vtipoformulario] [varchar](50) NOT NULL DEFAULT ('VENTANA'),
	[bflag] [int] NULL DEFAULT ((1)),
	[bfinal] [int] NULL DEFAULT ((0)),
	[idepende] [int] NULL DEFAULT ((0)),
	[iwidth] [int] NULL DEFAULT ((600)),
	[iheight] [int] NULL DEFAULT ((400)),
	[bcerrar] [int] NULL DEFAULT ((1)),
	[bminimiza] [int] NULL DEFAULT ((1)),
	[bmaximiza] [int] NULL DEFAULT ((1)),
	[vusuario] [varchar](50) NULL DEFAULT (suser_sname()),
	[dfecha] [datetime] NULL DEFAULT (getdate()),
	[vestacion] [varchar](50) NULL DEFAULT (host_name()),
	[dfecha_upt] [datetime] NULL,
	[vuser_upt] [varchar](50) NULL,
	[viconCls] [varchar](50) NULL DEFAULT (''),
PRIMARY KEY CLUSTERED 
(
	[iid_formulario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [panel].[tb_servicio]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [panel].[tb_servicio](
	[iid_servicio] [int] IDENTITY(1,1) NOT NULL,
	[vnombre] [varchar](150) NOT NULL,
	[vimagen] [varchar](50) NULL DEFAULT (NULL),
	[vdescripcion] [varchar](150) NULL DEFAULT (NULL),
	[iAccion] [int] NULL DEFAULT ((0)),
	[vAccion] [varchar](100) NULL DEFAULT ('NONE'),
	[estado] [int] NULL DEFAULT ((1)),
	[fechaCreacion] [datetime] NULL DEFAULT (getdate()),
	[userCrea] [varchar](50) NULL DEFAULT (suser_sname()),
	[estacion] [varchar](50) NULL DEFAULT (host_name()),
PRIMARY KEY CLUSTERED 
(
	[iid_servicio] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [panel].[tb_sistema]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [panel].[tb_sistema](
	[iid_sistema] [int] IDENTITY(1,1) NOT NULL,
	[iid_empresa] [int] NOT NULL,
	[v_nombre] [varchar](300) NOT NULL,
	[v_carpeta] [varchar](150) NOT NULL,
	[v_fileindex] [varchar](150) NOT NULL,
	[v_basedato] [varchar](50) NOT NULL,
	[v_tipodb] [varchar](50) NOT NULL,
	[v_servidor_db] [varchar](50) NOT NULL,
	[v_servidor_ap] [varchar](50) NOT NULL,
	[v_userdb] [varchar](50) NOT NULL,
	[v_clavedb] [varchar](50) NOT NULL,
	[vusuarioreg] [varchar](30) NULL DEFAULT (NULL),
	[dfechareg] [datetime] NULL DEFAULT (getdate()),
	[dfechaact] [datetime] NULL DEFAULT (NULL),
	[vusuarioact] [varchar](30) NULL DEFAULT (NULL),
	[IdSede] [int] NULL DEFAULT ((0)),
PRIMARY KEY CLUSTERED 
(
	[iid_sistema] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [panel].[tb_SistemaUsuario]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [panel].[tb_SistemaUsuario](
	[idregistro] [int] IDENTITY(1,1) NOT NULL,
	[iid_usuario] [int] NOT NULL,
	[iid_sistema] [int] NOT NULL,
	[estado] [int] NULL DEFAULT ((1)),
	[login] [varchar](50) NOT NULL,
	[passwor] [varchar](100) NOT NULL,
	[id_tipousuario] [int] NOT NULL DEFAULT ((1)),
	[fechaRegistro] [datetime] NULL DEFAULT (getdate()),
	[fechaActualiz] [datetime] NULL DEFAULT (getdate()),
	[vusuario] [varchar](50) NULL DEFAULT (suser_sname()),
	[vestacion] [varchar](50) NULL DEFAULT (host_name()),
	[IdSede] [int] NULL DEFAULT ((1)),
	[v_caja] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idregistro] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [panel].[tb_tipousuario]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [panel].[tb_tipousuario](
	[id_tipousuario] [int] IDENTITY(1,1) NOT NULL,
	[vdescri] [varchar](50) NULL DEFAULT (NULL),
PRIMARY KEY CLUSTERED 
(
	[id_tipousuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [panel].[tb_usuario]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [panel].[tb_usuario](
	[iid_usuario] [int] IDENTITY(1,1) NOT NULL,
	[iid_persona] [int] NOT NULL,
	[bflag] [int] NOT NULL,
	[dfecha] [datetime] NOT NULL CONSTRAINT [DF__tb_usuari__dfech__2B3F6F97]  DEFAULT (getdate()),
	[v_usuario] [varchar](50) NOT NULL,
	[v_estacion] [varchar](50) NOT NULL,
	[fecha_upd] [datetime] NULL CONSTRAINT [DF__tb_usuari__fecha__2C3393D0]  DEFAULT (NULL),
	[vusuarioupd] [varchar](30) NULL CONSTRAINT [DF__tb_usuari__vusua__2D27B809]  DEFAULT (NULL),
	[v_correo] [varchar](50) NULL,
	[v_cargo] [varchar](500) NULL,
 CONSTRAINT [PK__tb_usuar__D2FCA2DC4CA06362] PRIMARY KEY CLUSTERED 
(
	[iid_usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [panel].[tb_usuarioweb]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [panel].[tb_usuarioweb](
	[C_IDCONT] [char](7) NULL,
	[C_ESTADOWEB] [tinyint] NULL,
	[N_IDUSUARIO] [int] NULL,
	[V_EMAILWEB] [varchar](50) NOT NULL,
	[V_TELEFOWEB] [varchar](20) NULL,
	[D_FECHORID] [datetime] NULL,
	[D_FECHOR] [datetime] NULL,
	[V_PASSWEB] [varbinary](20) NULL,
	[f_admin] [bit] NULL,
	[V_NOMACO] [varchar](150) NULL,
	[NUMDOC] [varchar](11) NULL,
UNIQUE NONCLUSTERED 
(
	[V_EMAILWEB] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [visa].[DET_LIQUIDACION]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [visa].[DET_LIQUIDACION](
	[N_IDLIQU] [int] NOT NULL,
	[N_IDRECI] [varchar](9) NOT NULL,
	[C_IDCONT] [varchar](100) NULL,
	[C_IDTRAM] [char](5) NULL,
	[C_IDTRAR] [char](5) NULL,
	[C_AFICAT] [char](4) NULL,
	[C_COCATA] [char](16) NULL,
	[C_PERIODO] [char](2) NULL,
	[D_FECVEN] [datetime] NULL,
	[N_IMPINS] [numeric](14, 2) NULL,
	[N_IMPREA] [numeric](14, 2) NULL,
	[N_IMPDES] [numeric](14, 2) NULL,
	[N_COSTEM] [numeric](12, 2) NULL,
	[N_MORA] [numeric](12, 2) NULL,
	[N_TOTAL] [numeric](12, 2) NULL,
	[V_NRODOC] [varchar](12) NULL,
	[V_NOMUSU] [varchar](20) NULL,
	[V_ESTACI] [varchar](20) NULL,
	[D_FECHOR] [datetime] NOT NULL,
	[id_coac] [int] NULL,
 CONSTRAINT [PK_DET_LIQUIDACION] PRIMARY KEY CLUSTERED 
(
	[N_IDLIQU] ASC,
	[N_IDRECI] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [visa].[m_cajarec_vis]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [visa].[m_cajarec_vis](
	[c_nrorec] [varchar](14) NULL,
	[c_idcaja] [char](2) NULL,
	[c_idcont] [varchar](100) NULL,
	[c_tippag] [char](1) NULL,
	[d_fecpag] [datetime] NULL,
	[n_totrec] [decimal](9, 2) NULL,
	[v_estaci] [varchar](100) NULL,
	[v_nomusu] [varchar](100) NULL,
	[N_IDLIQU] [int] NULL,
	[CodigoAlumno] [varchar](12) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [visa].[m_cajarecdet_vis]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [visa].[m_cajarecdet_vis](
	[c_nrorec] [varchar](14) NULL,
	[c_idcaja] [char](2) NULL,
	[d_fecpag] [datetime] NULL,
	[n_totdet] [decimal](9, 2) NULL,
	[v_estaci] [varchar](100) NULL,
	[v_nomusu] [varchar](100) NULL,
	[N_IDRECI] [varchar](9) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [visa].[M_LIQUIDACION]    Script Date: 17/05/2021 18:34:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [visa].[M_LIQUIDACION](
	[N_IDLIQU] [int] NOT NULL,
	[C_IDCONT] [varchar](100) NULL,
	[N_TOTAL] [numeric](12, 2) NULL,
	[N_ESTADO] [tinyint] NULL,
	[V_NOMUSU] [varchar](20) NULL,
	[V_ESTACI] [varchar](20) NULL,
	[D_FECHOR] [datetime] NOT NULL,
	[codigoalumno] [varchar](50) NULL,
 CONSTRAINT [PK_M_LIQUIDACION] PRIMARY KEY CLUSTERED 
(
	[N_IDLIQU] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
ALTER TABLE [dbo].[tb_documentos_persona]  WITH CHECK ADD FOREIGN KEY([iid_tdocpersona])
REFERENCES [dbo].[tb_tdocumento_persona] ([iid_tdocpersona])
GO
ALTER TABLE [dbo].[tb_medio_contacto]  WITH CHECK ADD FOREIGN KEY([iid_tfono])
REFERENCES [dbo].[tb_tmedio_contacto] ([iid_tfono])
GO
ALTER TABLE [dbo].[tb_ProgramacionCurso]  WITH CHECK ADD  CONSTRAINT [FK__tb_Progra__Codig__17C286CF] FOREIGN KEY([CodigoPeriodo])
REFERENCES [dbo].[tb_Periodo] ([CodigoPeriodo])
GO
ALTER TABLE [dbo].[tb_ProgramacionCurso] CHECK CONSTRAINT [FK__tb_Progra__Codig__17C286CF]
GO
ALTER TABLE [dbo].[tb_ProgramacionCurso]  WITH CHECK ADD  CONSTRAINT [FK__tb_Progra__IdSed__18B6AB08] FOREIGN KEY([IdSede])
REFERENCES [dbo].[tb_Sede] ([IdSede])
GO
ALTER TABLE [dbo].[tb_ProgramacionCurso] CHECK CONSTRAINT [FK__tb_Progra__IdSed__18B6AB08]
GO
ALTER TABLE [dbo].[tb_RegistroMembresia]  WITH CHECK ADD  CONSTRAINT [FK__tb_Regist__Codig__5E54FF49] FOREIGN KEY([CodigoModalidad])
REFERENCES [dbo].[tb_ModalidadCurso] ([CodigoModalidad])
GO
ALTER TABLE [dbo].[tb_RegistroMembresia] CHECK CONSTRAINT [FK__tb_Regist__Codig__5E54FF49]
GO
ALTER TABLE [dbo].[tb_RegistroMembresia]  WITH CHECK ADD  CONSTRAINT [FK__tb_Regist__Codig__5F492382] FOREIGN KEY([CodigoPeriodo])
REFERENCES [dbo].[tb_Periodo] ([CodigoPeriodo])
GO
ALTER TABLE [dbo].[tb_RegistroMembresia] CHECK CONSTRAINT [FK__tb_Regist__Codig__5F492382]
GO
ALTER TABLE [dbo].[tb_RegistroMembresia]  WITH CHECK ADD  CONSTRAINT [FK__tb_Regist__idEst__603D47BB] FOREIGN KEY([idEstaPagos])
REFERENCES [dbo].[tb_EstaPagos] ([idEstaPagos])
GO
ALTER TABLE [dbo].[tb_RegistroMembresia] CHECK CONSTRAINT [FK__tb_Regist__idEst__603D47BB]
GO
ALTER TABLE [dbo].[tb_RegistroMembresia]  WITH CHECK ADD  CONSTRAINT [FK__tb_Regist__idEst__61316BF4] FOREIGN KEY([idEstaPagos])
REFERENCES [dbo].[tb_EstaPagos] ([idEstaPagos])
GO
ALTER TABLE [dbo].[tb_RegistroMembresia] CHECK CONSTRAINT [FK__tb_Regist__idEst__61316BF4]
GO
ALTER TABLE [dbo].[tb_Temporada]  WITH CHECK ADD FOREIGN KEY([CodigoPeriodo])
REFERENCES [dbo].[tb_Periodo] ([CodigoPeriodo])
GO
ALTER TABLE [panel].[tb_acceso]  WITH CHECK ADD FOREIGN KEY([iid_sistema])
REFERENCES [panel].[tb_sistema] ([iid_sistema])
GO
ALTER TABLE [panel].[tb_acceso]  WITH CHECK ADD  CONSTRAINT [FK__tb_acceso__iid_u__4F7CD00D] FOREIGN KEY([iid_usuario])
REFERENCES [panel].[tb_usuario] ([iid_usuario])
GO
ALTER TABLE [panel].[tb_acceso] CHECK CONSTRAINT [FK__tb_acceso__iid_u__4F7CD00D]
GO
ALTER TABLE [panel].[tb_dpermisoformulario]  WITH CHECK ADD FOREIGN KEY([iid_formulario])
REFERENCES [panel].[tb_formulario] ([iid_formulario])
ON DELETE CASCADE
GO
ALTER TABLE [panel].[tb_dpermisoformulario]  WITH CHECK ADD FOREIGN KEY([iid_sistema])
REFERENCES [panel].[tb_sistema] ([iid_sistema])
GO
ALTER TABLE [panel].[tb_dpermisoformulario]  WITH CHECK ADD  CONSTRAINT [FK__tb_dpermi__iid_u__52593CB8] FOREIGN KEY([iid_usuario])
REFERENCES [panel].[tb_usuario] ([iid_usuario])
GO
ALTER TABLE [panel].[tb_dpermisoformulario] CHECK CONSTRAINT [FK__tb_dpermi__iid_u__52593CB8]
GO
ALTER TABLE [panel].[tb_dpermisoservicio]  WITH CHECK ADD FOREIGN KEY([iid_formulario])
REFERENCES [panel].[tb_formulario] ([iid_formulario])
ON DELETE CASCADE
GO
ALTER TABLE [panel].[tb_dpermisoservicio]  WITH CHECK ADD FOREIGN KEY([iid_servicio])
REFERENCES [panel].[tb_servicio] ([iid_servicio])
GO
ALTER TABLE [panel].[tb_dpermisoservicio]  WITH CHECK ADD FOREIGN KEY([iid_sistema])
REFERENCES [panel].[tb_sistema] ([iid_sistema])
GO
ALTER TABLE [panel].[tb_dpermisoservicio]  WITH CHECK ADD  CONSTRAINT [FK__tb_dpermi__iid_u__5629CD9C] FOREIGN KEY([iid_usuario])
REFERENCES [panel].[tb_usuario] ([iid_usuario])
GO
ALTER TABLE [panel].[tb_dpermisoservicio] CHECK CONSTRAINT [FK__tb_dpermi__iid_u__5629CD9C]
GO
ALTER TABLE [panel].[tb_formulario]  WITH CHECK ADD FOREIGN KEY([iid_sistema])
REFERENCES [panel].[tb_sistema] ([iid_sistema])
ON DELETE CASCADE
GO
ALTER TABLE [visa].[DET_LIQUIDACION]  WITH CHECK ADD  CONSTRAINT [FK_DET_LIQUIDACION_M_LIQUIDACION] FOREIGN KEY([N_IDLIQU])
REFERENCES [visa].[M_LIQUIDACION] ([N_IDLIQU])
GO
ALTER TABLE [visa].[DET_LIQUIDACION] CHECK CONSTRAINT [FK_DET_LIQUIDACION_M_LIQUIDACION]
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Codigo de alumno ' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'CodigoAlumno'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Codigo de la persona lo une con la tabla tb_persona' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'iid_persona'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Codigo tipo alumno / lo une con la tabla tb_TipoAlumno' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'CodigoTA'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Codigo de parentesco padre, tio' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'CodigoParentesco'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Observaciones acerca del alumno' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'Observaciones'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Fecha de registro de datos' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'FechaR'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Fecha de actualizacion de datos' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'FechaA'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'activo o inactivo' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'estado'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Usuario que lo registra' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'usuario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Correo del alumno' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'Correo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'telefono del alumno' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'telefono'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Numero de celular del alumno' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'Celular'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Codigo de la sede a la que pertenece el alumno / donde se matriculo y llevo cursos' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Alumno', @level2type=N'COLUMN',@level2name=N'idsede'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Codigo ambiente' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Ambiente', @level2type=N'COLUMN',@level2name=N'CodigoAmbiente'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Nombre ambiente (debe ser unico por sede)' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Ambiente', @level2type=N'COLUMN',@level2name=N'NombreAmbiente'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'estado(activo - inactivo)' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Ambiente', @level2type=N'COLUMN',@level2name=N'estado'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Capacidad maxima del ambiente' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Ambiente', @level2type=N'COLUMN',@level2name=N'Capacidad'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Sede a la que pertenece el ambiente' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Ambiente', @level2type=N'COLUMN',@level2name=N'Sede'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Tipo de ambiente (tb_TipoAmbiente)' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_Ambiente', @level2type=N'COLUMN',@level2name=N'TipoAmbiente'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE PERSONA' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_documentos_persona', @level2type=N'COLUMN',@level2name=N'iid_persona'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID TIPO DE DOCUMENTO(VER TABLA: [tb_tdocumento_persona])' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_documentos_persona', @level2type=N'COLUMN',@level2name=N'iid_tdocpersona'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'NUMERO DE DOCUMENTO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_documentos_persona', @level2type=N'COLUMN',@level2name=N'numero'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ESTADO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_documentos_persona', @level2type=N'COLUMN',@level2name=N'flag'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'INDICA SI EL DOCUMENTO ES PRINCIPAL 1=PRINCIPAL,0=ADICIONAL' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_documentos_persona', @level2type=N'COLUMN',@level2name=N'bprincipal'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE PERSONA A QUIEN PERTENCE UNO O VARIOS MEDIO(S) DE CONTACTO(S)' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_medio_contacto', @level2type=N'COLUMN',@level2name=N'iid_persona'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'TIPO DE MEDIO DE CONTACTO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_medio_contacto', @level2type=N'COLUMN',@level2name=N'iid_tfono'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'DESCRIPCION DEL MEDIO DE CONTACTO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_medio_contacto', @level2type=N'COLUMN',@level2name=N'descripcion'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'INDICA MEDIO DE CANTAC. PRINCIPAL' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_medio_contacto', @level2type=N'COLUMN',@level2name=N'bprincipal'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID UNICO DE REGISTRO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_persona', @level2type=N'COLUMN',@level2name=N'iid_persona'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'TIPO DE PERSONA' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_persona', @level2type=N'COLUMN',@level2name=N'iid_tpersona'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'RAZON SOCIAL PARA PERSONAS JURIDICAS' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_persona', @level2type=N'COLUMN',@level2name=N'vrazonsocial'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE UBIGEO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_persona', @level2type=N'COLUMN',@level2name=N'idubigeo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'DIRECCION REFE.' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_persona', @level2type=N'COLUMN',@level2name=N'direccion'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'DESCRIPCION DEL TIPO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_tdocumento_persona', @level2type=N'COLUMN',@level2name=N'vdescripcion'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ESTADO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_tdocumento_persona', @level2type=N'COLUMN',@level2name=N'flag'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'CANTIDAD DE CARACTERES POR CADA TIPO DE DOC.' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_tdocumento_persona', @level2type=N'COLUMN',@level2name=N'Nrodigito'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'CODIGO DE UBIGEO(000000) ID DPTO,ID PROV, ID DITRI.' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_ubigeo', @level2type=N'COLUMN',@level2name=N'id_ubigeo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'CODIGO DE DEPTO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_ubigeo', @level2type=N'COLUMN',@level2name=N'id_depto'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'NOMBRE DEL DEPARTAMENTO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_ubigeo', @level2type=N'COLUMN',@level2name=N'nomb_depto'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE LA PROVINCIA' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_ubigeo', @level2type=N'COLUMN',@level2name=N'id_provincia'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'NOMBRE DE LA PROVINCIA' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_ubigeo', @level2type=N'COLUMN',@level2name=N'nom_provincia'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DEL DISTRITO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_ubigeo', @level2type=N'COLUMN',@level2name=N'id_distrito'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'NOMBRE DEL DISTRITO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_ubigeo', @level2type=N'COLUMN',@level2name=N'nom_distrito'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ANIO DEL UBIGEO' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tb_ubigeo', @level2type=N'COLUMN',@level2name=N'anio'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE CADA ACCESO AL SISTEMA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_acceso', @level2type=N'COLUMN',@level2name=N'iid_acceso'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE SISTEMA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_acceso', @level2type=N'COLUMN',@level2name=N'iid_sistema'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DEL USUARIO DEL SISTEMA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_acceso', @level2type=N'COLUMN',@level2name=N'iid_usuario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'IP DEL PC CLIENTE' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_acceso', @level2type=N'COLUMN',@level2name=N'v_ip'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ESTADO DEL ACCESO 1=INGRESO,2=SALIDA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_acceso', @level2type=N'COLUMN',@level2name=N'b_estado'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'FECHA Y HORA DE INGRESO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_acceso', @level2type=N'COLUMN',@level2name=N'd_fechaingreso'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE CADA SESION INICIADA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_acceso', @level2type=N'COLUMN',@level2name=N'v_idsession'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE SISTEMA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_dpermisoformulario', @level2type=N'COLUMN',@level2name=N'iid_sistema'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE FORMULARIO ' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_dpermisoformulario', @level2type=N'COLUMN',@level2name=N'iid_formulario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'USUARIO DEL SISTEMA A QUIEN SE LE ASIGNA LOS PERMISOS' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_dpermisoformulario', @level2type=N'COLUMN',@level2name=N'iid_usuario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE SISTEMA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_dpermisoservicio', @level2type=N'COLUMN',@level2name=N'iid_sistema'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE USUARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_dpermisoservicio', @level2type=N'COLUMN',@level2name=N'iid_usuario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE SERVICIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_dpermisoservicio', @level2type=N'COLUMN',@level2name=N'iid_servicio'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE FORMULARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_dpermisoservicio', @level2type=N'COLUMN',@level2name=N'iid_formulario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE FORMULARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'iid_formulario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE SISTEMA A LA QUE PERTENECA UN FORMULARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'iid_sistema'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'NOMBRE DEL FORMULARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'vnombre'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'TITULO DEL FORMULARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'vtitle'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'DETALLE DEL FORMULARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'vdescripcion'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ARCHIVO ASOCIADO AL FORMULARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'vfile'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'NIVEL EN EL MENU PRINCIPAL' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'inivel'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'NIVEL DE ORDEN COMO SUBMENUS' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'iorden'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'TIPO DE FORMULARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'vtipoformulario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ESTADO 1=ACTIVO; 0=DESACTIVO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'bflag'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'INDICA FINAL DE CADA NODO DEL MENU' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'bfinal'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'INDICA ID DE FORMULARIO DE QUIEN DEPENDE EL FORMULARIO ACTUAL.' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'idepende'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ANCHO DEL FORMULARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'iwidth'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ALTO  DEL FORMULARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'iheight'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'BOTON CERRAR VISIBLE 1=VISIBLE,0=NO VISIBLE' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'bcerrar'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'BOTON MINIMIZAR VISIBLE 1=VISIBLE,0=NO VISIBLE' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'bminimiza'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'BOTON MAXIMIZA VISIBLE 1=VISIBLE,0=NO VISIBLE' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'bmaximiza'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'USUARIO QUIEN REGISTRA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'vusuario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'FECAH DE REGISTRO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'dfecha'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'IP DE LA PC CLIENTE' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'vestacion'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'FECHA DE ACTUALIZACION DE DATOS DEL FORM.' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_formulario', @level2type=N'COLUMN',@level2name=N'dfecha_upt'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID SISTEMAS' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'iid_sistema'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE LA EMPRESA RELACIONADO AL SISTEMA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'iid_empresa'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'NOMBRE DEL SISTEMA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'v_nombre'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'CARPETA DE LA APLICACION EN EL SERVIDOR' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'v_carpeta'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ARCHIVO INDEX DEL APICACION' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'v_fileindex'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'BASE DE DATOS A DONDE SE CONECTA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'v_basedato'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'TIPO DE BASE DE DATOS' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'v_tipodb'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'SERVIDOR DE BASE DE DATOS' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'v_servidor_db'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'SERVIDOR DE APLICACION' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'v_servidor_ap'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'USUAURIO DE LA BASE DE DATOS' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'v_userdb'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'CLAVE DE LA BASE DE DATOS' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'v_clavedb'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'USUARIO QUE REGISTRA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'vusuarioreg'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'FECHA DE REGISTRO DEL SISTEMA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'dfechareg'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'FECHA DE ACTUALIZAICON DE DATOS DEL SISTEMA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'dfechaact'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'USUARIO DE ACTUALIZACION DE DATOS' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_sistema', @level2type=N'COLUMN',@level2name=N'vusuarioact'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE USUARIO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_usuario', @level2type=N'COLUMN',@level2name=N'iid_usuario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'ID DE PERSONA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_usuario', @level2type=N'COLUMN',@level2name=N'iid_persona'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'FECHA DE REGISTRO' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_usuario', @level2type=N'COLUMN',@level2name=N'dfecha'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'USUARIO DEL SISTEMA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_usuario', @level2type=N'COLUMN',@level2name=N'v_usuario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'FECHA DE ACTUALIZACION' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_usuario', @level2type=N'COLUMN',@level2name=N'fecha_upd'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'USUARIO QUIEN ACTUALIZA' , @level0type=N'SCHEMA',@level0name=N'panel', @level1type=N'TABLE',@level1name=N'tb_usuario', @level2type=N'COLUMN',@level2name=N'vusuarioupd'
GO
