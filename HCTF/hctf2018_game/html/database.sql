use ctf;
create table user(
id int(14) unsigned auto_increment primary key,
username varchar(255) NOT NULL,
password varchar(32) NOT NULL,
sex tinyint(1) unsigned,
score int(14) unsigned default 0
);
insert into user(username, password, sex) values("admin","dsa8&&!@#$%^&d1ngy1as3dja",1);
insert into user(username, password, sex) values("hacker","google",2);
insert into user(username, password, sex) values("beauty","hctfffsadfffff",1);