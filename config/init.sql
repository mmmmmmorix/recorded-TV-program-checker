create database sns_php;

grant all on sns_php.* to dbuser@localhost identified by 'dbuserpass0505';

use sns_php;

create table users (
  id int not null auto_increment primary key,
  groupid varchar(255),
  username varchar(255) unique,
  password varchar(255)
);

create table groups (
  id int not null auto_increment primary key,
  groupid varchar(255) unique,
  numOfCheckbox tinyint(1) default 0
);

create table recprogs (
  id int not null auto_increment primary key,
  groupid varchar(255),
  title text,
  state_1 tinyint(1) default 0,
  state_2 tinyint(1) default 0,
  state_3 tinyint(1) default 0,
  state_4 tinyint(1) default 0,
  state_5 tinyint(1) default 0,
  state_6 tinyint(1) default 0,
  state_7 tinyint(1) default 0,
  state_8 tinyint(1) default 0,
  state_9 tinyint(1) default 0,
  state_10 tinyint(1) default 0,
  added datetime
);

create table auto_login (
 id int not null auto_increment primary key,
 username varchar(255),
 auto_login_key varchar(255)
);


desc users;
