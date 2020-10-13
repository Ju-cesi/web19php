create table categories
(
    Libelle varchar(50) null,
    Id_cat  int auto_increment
        primary key,
    Icone   varchar(25) null
);

create table articles
(
    Id              bigint auto_increment
        primary key,
    Titre           varchar(50) null,
    Description     text        null,
    DateAjout       date        null,
    Auteur          varchar(25) null,
    ImageRepository varchar(50) null,
    ImageFileName   varchar(50) null,
    Id_cat          int         null,
    constraint fk_categories
        foreign key (Id_cat) references categories (Id_cat)
);

