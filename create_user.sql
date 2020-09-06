/*
* @Author: owlcity
* @Date:   2020-09-04 13:26:35
* @Last Modified by:   owlcity
* @Last Modified time: 2020-09-04 13:34:09
*/
CREATE TABLE think_user (
    user_id int(11) not null primary key auto_increment,
    user_name varchar(255) not null,
    user_sex int(11) default null,
    user_tel varchar(255) default null,
    user_email varchar(255) default null,
    user_address varchar(255) default null,
    user_birth varchar(255) default null,
    user_password varchar(255) default null,
    user_signature varchar(255) default null,
    user_hobby varchar(255) default null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;