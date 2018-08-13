create table UserTE( 

idUserTE int auto_increment,
Login varchar(50) not null,
Senha varchar(512) not null, 
UserTELevel boolean not null,
UserTEStatus char(1) not null,
primary key (idUserTE)

);

create table UserTEScore( 

idUserTEScore int auto_increment,
Gold varchar(50) not null,
Silver varchar(512) not null, 
Bronze boolean not null,
idUserTEFK int,
primary key (idUserTEScore),
constraint FKidUserTEScore foreign key (idUserTEFK) references UserTE(idUserTE)

);

create table UserTEInfo( 

idUserTEInfo int auto_increment,
UserTEName varchar(50) not null,
Institution varchar(50) not null, 
Birthday date not null,
Phone varchar(13),
Address varchar(100) not null,
Email varchar(50) not null,
SubscribtionDate datetime not null,
UserTEimage varchar(200) not null,
idUserTEFK int,
primary key (idUserTEInfo),
foreign key (idUserTEFK) references UserTE(idUserTE)

);

create table UserTEAcessInfo( 

idUserTEAcessInfo int auto_increment,
Device varchar(50) not null,
IP varchar(512) not null, 
Provider varchar(50) not null,
MAC char(12),
Browser varchar(50) not null,
Region varchar(50) not null,
DateTimeAccess datetime not null,
idUserTEFK int,
primary key (idUserTEAcessInfo),
foreign key (idUserTEFK) references UserTE(idUserTE)

);

create table UserTEAlert( 

idUserTEAlert int auto_increment,
AlertContent varchar(50) not null,
AlertDate datetime not null,
AlertLink varchar(200) not null,
AlertVisualized boolean not null,
idUserTEFK int,
primary key (idUserTEAlert),
foreign key (idUserTEFK) references UserTE(idUserTE)

);

create table GroupChat( 

idGroupChat int auto_increment,
GroupName varchar(50) not null,
primary key (idGroupChat)

);

create table Messages( 

ContentMessage varchar(50) not null,
DateTimeMessage datetime not null,
idGroupChatFK int,
idUserTEFromFK int,
idUserTEToFK int,
foreign key (idGroupChatFK) references GroupChat(idGroupChat),
foreign key (idUserTEFromFK) references UserTE(idUserTE),
foreign key (idUserTEToFK) references UserTE(idUserTE)

);

create table StudyArea(

idStudyArea int auto_increment,
StudyAreaName varchar(50) not null,
primary key (idStudyArea)

);

create table StudyAreaFavorite(

idStudyAreaFavorite int auto_increment,
idUserTEFK int,
idStudyAreaFK int,
primary key (idStudyAreaFavorite),
foreign key (idUserTEFK) references UserTE(idUserTE),
foreign key (idStudyAreaFK) references StudyArea(idStudyArea)
);



create table StudySubject(

idStudySubject int auto_increment,
StudySubjectName varchar(50) not null,
StudySubjectDesciption varchar(50) not null,
primary key (idStudySubject)

);

create table StudySubjectFavorite(

idStudySubjectFavorite int auto_increment,
idUserTEFK int,
idStudySubjectFK int,
primary key (idStudySubjectFavorite),
foreign key (idUserTEFK) references UserTE(idUserTE),
foreign key (idStudySubjectFK) references StudySubject(idStudySubject)

);

create table Discipline(

idDiscipline int auto_increment,
DisciplineName varchar(50),
idStudyAreaFK int,
primary key (idDiscipline),
foreign key (idStudyAreaFK) references StudyArea(idStudyArea)

);

create table DisciplineFavorite(

DisciplineFavorite int auto_increment,
idUserTEFK int,
idDisciplineFK int,
primary key (DisciplineFavorite),
foreign key (idUserTEFK) references UserTE(idUserTE),
foreign key (idDisciplineFK) references Discipline(idDiscipline)

);

create table DisciplineHasSubject(

idDisciplineFK int,
idStudySubjectFK int,
foreign key (idDisciplineFK) references Discipline(idDiscipline),
foreign key (idStudySubjectFK) references StudySubject(idStudySubject)

);

create table UserTEHasDiscipline(

idUserTEFK int,
idDisciplineFK int,
foreign key (idUserTEFK) references UserTE(idUserTE),
foreign key (idDisciplineFK) references Discipline(idDiscipline)

);

create table UserTEFavorite(

idUserTEFavorite int auto_increment,
idUserTEFK int,
idUserTEFavoritedFK int,
primary key (idUserTEFavorite),
foreign key (idUserTEFK) references UserTE(idUserTE),
foreign key (idUserTEFavoritedFK) references UserTE(idUserTE)

);

create table UserTEGroupChat( 
idUserTEGroupChat int auto_increment,
UserTEEnabled boolean not null,
EntryDate datetime not null,
ExitDate datetime not null,
idGroupChatFK int,
idUserTEFK int,
primary key (idUserTEGroupChat),
foreign key (idGroupChatFK) references GroupChat(idGroupChat),
foreign key (idUserTEFK) references UserTE(idUserTE)

);

create table QuestionFolder(
idQuestionFolder int auto_increment,
FolderName varchar(100) not null,
Shared boolean not null,
idUserTEFK int,
primary key (idQuestionFolder),
foreign key (idUserTEFK) references UserTE(idUserTE)
);


create table UserTESharedFolder(
idUserTESharedFolder int auto_increment,
FolderPermission tinyint not null,
idUserTEFK int,
idQuestionFolderFK int,
primary key (idUserTESharedFolder),
foreign key (idUserTEFK) references UserTE(idUserTE),
foreign key (idQuestionFolderFK) references QuestionFolder(idQuestionFolder)
);


create table UserTEQuizCreated(

idUserTEQuizCreated int auto_increment,
QuizName varchar(100) not null,
CreationDateTime datetime not null,
idUserTEFK int,
idStudySubjectFK int,
idDisciplineFK int,
primary key (idUserTEQuizCreated),
foreign key (idUserTEFK) references UserTE(idUserTE),
foreign key (idStudySubjectFK) references StudySubject(idStudySubject),
foreign key (idDisciplineFK) references Discipline(idDiscipline)


);


create table QuizType(
idQuizType int auto_increment,
QuizType varchar(45),
primary key (idQuizType)
);


create table QuizConfig(
idQuizConfig int auto_increment,
LimitTime int,
Points int,
NofQuestions int not null,
Randomize boolean not null,
idQuizTypeFK int,
idUserTEQuizCreatedFK int,
primary key (idQuizConfig),
foreign key (idQuizTypeFK) references QuizType(idQuizType),
foreign key (idUserTEQuizCreatedFK) references UserTEQuizCreated(idUserTEQuizCreated)
);


create table QuizQuestion(
idQuizQuestion int auto_increment,
QuestionWording varchar(500) not null,
idQuestionFolderFK int,
primary key (idQuizQuestion),
foreign key (idQuestionFolderFK) references QuestionFolder(idQuestionFolder)

);

create table Alternative(

idAlternative int auto_increment,
content varchar(300) not null,
idQuizQuestionFK int,
isCorrect boolean not null,
primary key (idAlternative),
foreign key (idQuizQuestionFK) references QuizQuestion(idQuizQuestion)
);

create table QuizCreatedToQuestion(
idUserTEQuizCreatedFK int,
idQuizQuestionFK int,
foreign key (idUserTEQuizCreatedFK) references UserTEQuizCreated(idUserTEQuizCreated),
foreign key (idQuizQuestionFK) references QuizQuestion(idQuizQuestion)
);


create table UserTEAskedQuiz(
idUserTEAskedQuiz int auto_increment,
askedQuiz boolean not null,
idUserTEFK int,
idUserTEQuizCreatedFK int,
primary key (idUserTEAskedQuiz),
foreign key (idUserTEFK) references UserTE(idUserTE),
foreign key (idUserTEQuizCreatedFK) references UserTEQuizCreated(idUserTEQuizCreated)

);

create table UserTEAskedQuizQuestion(
idUserTEAskedQuizQuestion int auto_increment,
Hit boolean not null,
Favoritequestion boolean not null,
idUserTEAskedQuizFK int,
idQuizQuestionFK int,
idAlternativeFK int,
primary key (idUserTEAskedQuizQuestion),
foreign key (idUserTEAskedQuizFK) references UserTEAskedQuiz(idUserTEAskedQuiz),
foreign key (idQuizQuestionFK) references QuizQuestion(idQuizQuestion),
foreign key (idAlternativeFK) references Alternative(idAlternative)

);


create table Page(

idPage int auto_increment,
linkPage varchar(500) not null,
primary key (idPage)

);

create table UserTEAcessPage(

idUserTEAcessPage int auto_increment,
PageAccessDataTime datetime not null,
TimeInPage time,
idUserTEFK int,
idPageFK int,
primary key (idUserTEAcessPage),
foreign key (idUserTEFK) references UserTE(idUserTE),
foreign key (idPageFK) references Page(idPage)

);

create table PageObject(
idPageObject int auto_increment,
PageObjectName varchar(50),
primary key (idPageObject)

);

create table UserTEAcessObject(

idUserTEFK int,
idPageObjectFK int,
foreign key (idUserTEFK) references UserTE(idUserTE),
foreign key (idPageObjectFK) references PageObject(idPageObject)
);

create table PageTOObject(

idPageFK int,
idPageObjectFK int,
foreign key (idPageFK) references Page(idPage),
foreign key (idPageObjectFK) references PageObject(idPageObject)
);

