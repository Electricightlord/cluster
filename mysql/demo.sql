create table user(
        id int(4) not null primary key auto_increment,
        username varchar(32) not null,
        password varchar(32) not null,
        index in_username_password(`username`,`password`)
)engine=innodb default charset=utf8;
