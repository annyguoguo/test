set default_storage_engine=InnoDB;  
set character_set_client = gbk ;   
set character_set_connection = gbk ;   
set character_set_database = gbk ;   
set character_set_results = gbk ;   
set character_set_server = gbk ;   
create database register;   
use register;   
create table users(   
     user_id int primary key auto_increment,   
     userName char(20) not null unique,   
     password char(10) not null,   
     sex char(10) not null,   
     interests char(100),   
     my_picture char(200),   
     remark text   
);   