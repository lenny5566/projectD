USE [testDB]
GO
/****** Object:  Table [dbo].[Student]    Script Date: 2018/1/19 17:53:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Student](
	[SID] [int] NOT NULL,
	[TID] [int] NULL,
	[Name] [nchar](50) NOT NULL,
	[Sex] [char](10) NULL,
	[Grade] [int] NULL,
 CONSTRAINT [PK__tmp_ms_x__CA1959702D07A5FA] PRIMARY KEY CLUSTERED 
(
	[SID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Teacher]    Script Date: 2018/1/19 17:53:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Teacher](
	[TID] [int] NOT NULL,
	[TName] [nchar](10) NOT NULL,
	[TPhone] [varchar](20) NULL,
	[TSubject] [nchar](10) NULL,
	[TSex] [nchar](10) NULL,
PRIMARY KEY CLUSTERED 
(
	[TID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (3, 5, N'003                                               ', N'female    ', 1)
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (4, 5, N'004                                               ', N'male      ', 3)
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (5, 3, N'005                                               ', N'female    ', 2)
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (6, 8, N'006                                               ', N'female    ', 2)
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (7, 6, N'007                                               ', N'male      ', 1)
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (8, 7, N'008                                               ', N'male      ', 3)
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (9, 3, N'009                                               ', N'female    ', 2)
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (10, 8, N'010                                               ', N'male      ', 3)
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (12, 4, N'012                                               ', N'male      ', 1)
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (13, 6, N'013                                               ', N'male      ', 2)
INSERT [dbo].[Student] ([SID], [TID], [Name], [Sex], [Grade]) VALUES (14, 6, N'014                                               ', N'female    ', 3)
INSERT [dbo].[Teacher] ([TID], [TName], [TPhone], [TSubject], [TSex]) VALUES (2, N'David     ', N'02-4354657', N'Math      ', N'male      ')
INSERT [dbo].[Teacher] ([TID], [TName], [TPhone], [TSubject], [TSex]) VALUES (3, N'Chen      ', N'04-2342343', N'Science   ', N'male      ')
INSERT [dbo].[Teacher] ([TID], [TName], [TPhone], [TSubject], [TSex]) VALUES (4, N'Ruby      ', N'03-3424234', N'Chinese   ', N'female    ')
INSERT [dbo].[Teacher] ([TID], [TName], [TPhone], [TSubject], [TSex]) VALUES (5, N'Tom       ', N'09-2342411', N'Chinese   ', N'male      ')
INSERT [dbo].[Teacher] ([TID], [TName], [TPhone], [TSubject], [TSex]) VALUES (6, N'Qoo       ', N'09-3934223', N'Food      ', N'male      ')
INSERT [dbo].[Teacher] ([TID], [TName], [TPhone], [TSubject], [TSex]) VALUES (7, N'Bob       ', N'09-2423424', N'C#        ', N'male      ')
INSERT [dbo].[Teacher] ([TID], [TName], [TPhone], [TSubject], [TSex]) VALUES (8, N'Cindy     ', N'09-2342341', N'English   ', N'female    ')
INSERT [dbo].[Teacher] ([TID], [TName], [TPhone], [TSubject], [TSex]) VALUES (9, N'Rdu       ', N'02-5234234', N'Chinese   ', N'male      ')
INSERT [dbo].[Teacher] ([TID], [TName], [TPhone], [TSubject], [TSex]) VALUES (11, N'y         ', N'555', N'gg        ', N'tg        ')
ALTER TABLE [dbo].[Student]  WITH NOCHECK ADD  CONSTRAINT [FK__Student__TID__1A14E395] FOREIGN KEY([TID])
REFERENCES [dbo].[Teacher] ([TID])
NOT FOR REPLICATION 
GO
ALTER TABLE [dbo].[Student] CHECK CONSTRAINT [FK__Student__TID__1A14E395]
GO
