-- Создание пользователя и базы данных
create user 'news_user'@'localhost' identified by 'dfjkwsnrf72dfbwhe';
create database news;
grant all privileges on news.* to 'news_user'@'localhost';

use news;

-- Создание таблицы новостных статей
create table article(
    id           int not null auto_increment,
    title        varchar(255) not null,
    img_url      varchar(255),
    content      text,
    created_at   datetime not null,
    updated_at   datetime,
    primary key (id)
) engine = InnoDB;

insert into article(title, img_url, content, created_at) values
    (
        'Инаугурация Трампа', 
        'trump.jpg', 
        'Вторая инаугурация Дональда Трампа в качестве 47-го президента США состоялась 20 января 2025 года в 12:00 по местному времени в Вашингтоне.', 
        '2025-01-20 22:15:30'
    ),
    (
        'Из зоопарка сбежал тигр',
        'tiger.jpg', 
        'Из зоопарка в городе N сбежал взрослый тигр. Местные жители напуганы, поскольку большую кошку до сих пор не удалось поймать.', 
        '2025-01-22 12:41:00'
    ), 
    (
        'Проблемы с асфальтом', 
        'asfalt.jpg', 
        'Этой осенью в городе N уложили асфальт на всех центральных улицах. Но местные жители не довольны качеством дорожного покрытия. По их словам, дорожники укладывали асфальт в дождь.', 
        '2025-01-22 14:32:18'
    );