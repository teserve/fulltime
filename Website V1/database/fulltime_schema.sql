CREATE TABLE User (
	user_id int auto_increment,
	username varchar(30) not null unique,
	password varchar(60) not null unique,
	need_pwch bool default FALSE,
	email varchar(50),
	phone varchar(10),
	first_name varchar(30),
	last_name varchar(30) not null,
	mid_name varchar(30),
	profile_pic varchar(50),
	creation date,
	inst_id int,
	inst_text varchar(60),
	PRIMARY KEY (user_id),
	FOREIGN KEY (inst_id) REFERENCES Institute(inst_id),
	CHECK (REGEXP(email, '.+@.+\..+)'))
);

CREATE TABLE Institute (
	inst_id int auto_increment,
	name varchar(100),
	owner_id int,
	academic bool default FALSE,
	PRIMARY KEY (inst_id),
	FOREIGN KEY (owner_id) REFERENCES User(user_id)
);

CREATE TABLE Student (
	user_id int,
	start_time date not null,
	grad_time date,
	degree varchar(3),
	major varchar(50),
	skills varchar(256),
	resume varchar(50)
	PRIMARY KEY (user_id),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
);

CREATE TABLE Employees (
	user_id int,
	job_title varchar(50),
	can_post_jobs bool,
	is_advisor bool,
	PRIMARY KEY (user_id) REFERENCES User(user_id),
	FOREIGN KEY (user_id),
);

CREATE TABLE Job_posting (
	job_id int auto_increment,
	inst_id int not null,
	industry varchar(30),
	skills varchar(256),
	gpa_req float,
	location varchar(20),
	pos_type varchar(15),
	deg_req varchar(3),
	yr_req int,
	views int,
	PRIMARY KEY (job_id),
	FOREIGN KEY (inst_id) REFERENCES Institutes(inst_id)
);

CREATE TABLE Student_matches (
	job_id int,
	user_id int,
	score float,
	PRIMARY KEY (job_id, user_id),
	FOREIGN KEY (job_id) REFERENCES Job_posting(job_id),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
);

CREATE TABLE Reviews (
	review_id int auto_increment,
	inst_id int,
	user_id int,
	rating int,
	title varchar(50),
	review_date datetime,
	description varchar(300),
	PRIMARY KEY (review_id),
	FOREIGN KEY (inst_id)REFERENCES Institutes(inst_id)
	FOREIGN KEY (user_id) REFERENCES User(user_id),
);
