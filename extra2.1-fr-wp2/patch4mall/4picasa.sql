
delimiter //

drop procedure if exists `save_picasa_albums`;
create procedure save_picasa_albums(in al_id char(32), in al_num int, in al_title char(32), in al_feature varchar(256))
begin
    select @date:=now() ;

    create table if not exists albums(
       id int not null primary key auto_increment,
       al_id  char(32) not null unique,
       al_num int  not null default 0,
       al_title char(32),
       al_feature varchar(256)
       );

    INSERT INTO `albums` (`al_id`,`al_num`,`al_title`,`al_feature`) VALUES (al_id, al_num, al_title, al_feature);

end //



drop procedure if exists `save_picasa_photos`;
create procedure save_picasa_photos(in ph_id char(32), in ph_width int, in ph_height int, in ph_type varchar(16), in ph_src varchar(256), in ph_title varchar(32)) 
begin   
    select @date:=now() ;

    create table if not exists photos(
       id int not null primary key auto_increment,
       ph_id  char(32) not null unique,
       ph_width int ,
       ph_height int,
       ph_type varchar(16),
       ph_src  varchar(256) not null,
       ph_title varchar(32)
       );

    INSERT INTO `photos` (`ph_id`,`ph_width`,`ph_height`,`ph_type`,`ph_src`,`ph_title`) VALUES (ph_id, ph_width, ph_height, ph_type, ph_src, ph_title);

end //

delimiter ;
