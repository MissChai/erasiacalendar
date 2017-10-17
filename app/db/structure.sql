DROP TABLE if exists t_event;
DROP TABLE if exists t_location;
DROP TABLE if exists t_user;

CREATE TABLE t_location (
	loc_id integer not null PRIMARY KEY auto_increment,
	loc_continent varchar(255) not null,
	loc_country varchar(255),
	loc_place varchar(255)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE t_event (
	evt_id integer not null PRIMARY KEY auto_increment,
	evt_name varchar(255) not null,
	evt_description text,
	evt_topic varchar(255) DEFAULT null,
	evt_is_annual int(1) not null DEFAULT 1,
	evt_begin_date date not null,
	evt_end_date date not null,
	loc_id integer,
	CONSTRAINT fk_evt_loc foreign key(loc_id) references t_location(loc_id) ON DELETE no action ON UPDATE no action
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE t_user (
	usr_id integer not null PRIMARY KEY auto_increment,
	usr_username varchar(255) not null,
	usr_password varchar(255) not null,
	usr_role varchar(255) not null DEFAULT 'ROLE_USER'
) ENGINE = InnoDB DEFAULT CHARSET = latin1;