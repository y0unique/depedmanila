--CREATE DATABASE
CREATE DATABASE depedmanila_main;

--CREATE TABLES

--TABLE FOR USERS
CREATE TABLE userstbl(
    user_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_username varchar(50) NOT NULL,
    user_email varchar(50) NOT NULL,
    user_password longtext NOT NULL,
    user_type varchar(20) NOT NULL,
    user_profile longtext NOT NULL,
    user_department varchar (250) NOT NULL,
    user_status varchar(11) NOT NULL DEFAULT 'active'
);

--TABLE FOR TIMELOG
CREATE TABLE timelogtbl(
    time_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id int(11) NOT NULL,
    log_action longtext NOT NULL,
    log_date date NOT NULL,
    log_time time NOT NULL,
    log_status varchar(11) NOT NULL DEFAULT 'active',
    CONSTRAINT timelogtbl_user_idFK	FOREIGN KEY (user_id) REFERENCES userstbl(user_id)
);

--TABLE FOR SOCIAL MEDIA
CREATE TABLE socialmediatbl(
    socialMedia_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    socialMedia_type varchar(50) NOT NULL,
    socialMedia_link longtext NOT NULL,
    socialMedia_title longtext NOT NULL,
    socialMedia_post longtext NOT NULL,
    socialMedia_status varchar(11) NOT NULL DEFAULT 'active'
);

--TABLE FOR SERVICES
CREATE TABLE servicestbl(
    services_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    services_title varchar(100) NOT NULL,
    services_description longtext NOT NULL,
    services_link longtext NOT NULL,
    services_icon shorttext NOT NULL,
    services_status varchar(11) NOT NULL DEFAULT 'active'
);

--TABLE FOR SCHOOLS
CREATE TABLE schoolstbl(
    schooltbl_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    school_id varchar(11) NOT NULL,
    school_name varchar(100) NOT NULL,
    school_address varchar(200) NOT NULL,
    school_principal varchar(50) NOT NULL,
    school_contact varchar(30) NOT NULL,
    school_link longtext NOT NULL,
    school_email varchar(50) NOT NULL,
    school_district varchar(5) NOT NULL,
    school_type varchar(20) NOT NULL,
    school_shsAvailability varchar(11) NOT NULL,
    school_spedAvailablity varchar(11) NOT NULL,
    school_status varchar(11) NOT NULL DEFAULT 'active'
);

--TABLE FOR DEPARTMENTS
CREATE TABLE departmentstbl(
    department_id varchar(20) NOT NULL PRIMARY KEY,
    department_name varchar(100) NOT NULL,
    department_contact varchar(30) NOT NULL,
    department_email varchar(50) NOT NULL,
    department_status varchar(11) NOT NULL DEFAULT 'active'
);

--TABLE FOR OFFICES
CREATE TABLE officestbl(
    offices_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    department_id varchar(20) NOT NULL,
    employee_name varchar(50) NOT NULL,
    employee_picture longtext NOT NULL,
    employee_office varchar(100) NOT NULL,
    employee_position varchar(200) NOT NULL,
    employee_post varchar(50) NOT NULL,
    employee_type varchar(100) NOT NULL,
    employee_email varchar(50) NOT NULL,
    employee_status varchar(11) NOT NULL DEFAULT 'active',
    CONSTRAINT officestbl_department_idFK FOREIGN KEY (department_id) REFERENCES departmentstbl(department_id)
);

--TABLE FOR ISSUANCES CATEGORY
CREATE TABLE issuancescategorytbl(
    issuances_type varchar(50) NOT NULL PRIMARY KEY,
    issuances_type_name varchar(50) NOT NULL,
    issuances_status varchar(11) NOT NULL DEFAULT 'active'
);

--TABLE FOR ISSUANCES
CREATE TABLE issuancestbl(
    issuances_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tracking_number varchar(50) NOT NULL,
    issuances_title varchar(200) NOT NULL,
    issuances_link longtext NOT NULL,
    issuances_number varchar(20) NOT NULL,
    issuances_date date NOT NULL,
    issuances_type varchar(50) NOT NULL,
    issuances_status varchar(11) NOT NULL DEFAULT 'active',
    CONSTRAINT issuestbl_issuances_typeFK	FOREIGN KEY (issuances_type) REFERENCES issuancescategorytbl(issuances_type)
);

--TABLE FOR IMAGES
CREATE TABLE imagestbl(
    image_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    image_name longtext NOT NULL,
    image_title varchar(100) NOT NULL,
    image_description varchar(200) NOT NULL,
    image_type varchar(20) NOT NULL,
    image_status varchar(11) NOT NULL DEFAULT 'active'
);

--TABLE FOR FILES
CREATE TABLE filestbl(
    file_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    file_type varchar(50) NOT NULL,
    file_title varchar(200) NOT NULL,
    file_link longtext NOT NULL,
    file_date datetime NOT NULL DEFAULT current_timestamp(),
    file_department varchar(20) NULL,
    file_status varchar(11) NOT NULL DEFAULT 'active'
);

--TABLE FOR BAC
CREATE TABLE bacfilestbl(
    bacfile_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    bacfile_type varchar(50) NOT NULL,
    bacfile_title varchar(200) NOT NULL,
    bacfile_link longtext NOT NULL,
    bacfile_date datetime NOT NULL DEFAULT current_timestamp(),
    bacfile_procurementYear year NULL,
    bacfile_procurementType varchar(50) NULL,
    bacfile_publishDate date NULL,
    bacfile_closingDate date NULL,
    bacfile_awardedTo varchar(200) NULL,
    bacfile_referenceNum varchar(20) NULL,
    bacfile_procurementMode varchar(50) NULL,
    bacfile_status varchar(11) NOT NULL DEFAULT 'active'
);

--TABLE FOR DAILY VISITORS
CREATE TABLE dailyvisitstbl(
    daily_visitors_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    daily_visitors_ip_address text NOT NULL,
    daily_visitors_date date NOT NULL DEFAULT current_timestamp(),
    daily_visitors_status varchar(11) NOT NULL DEFAULT 'active'
);


--DUMPING DATA INTO TABLES 



--CREATING VIEWS

--carouselvw
CREATE VIEW carouselVW AS
SELECT
    image_id AS "id",
    image_name AS "name",
    image_title AS "title",
    image_description AS "description",
    image_type AS "type",
    image_status AS "status"
FROM imagestbl WHERE image_type = 'carousel' AND image_status = 'active';

--dailyVisitorsVW
CREATE VIEW dailyVisitorsVW AS
SELECT
    daily_visitors_ip_address AS "ip address",
    daily_visitors_date AS "date",
	daily_visitors_status AS "status"
FROM dailyvisitstbl WHERE daily_visitors_status = 'active';

--departmentsvw
CREATE VIEW departmentsVW AS
SELECT
    department_id AS "id",
    department_name AS "name",
    department_contact AS "contact",
    department_email AS "email",
    department_status AS "status"
FROM departmentstbl WHERE department_status = 'active';

--downloadableFilesVW
CREATE VIEW downloadableFilesVW AS
SELECT
    file_id AS "id",
    file_type AS "type",
    file_title AS "title",
    file_link AS "link",
    file_date AS "date",
    file_status AS "status"
FROM filestbl WHERE file_type = 'DOWNLOADABLES' AND file_status = 'active';

--elemschoolsvw
CREATE VIEW elemSchoolsVW AS
SELECT
    school_id AS "id",
    school_name AS "name",
    school_address AS "address",
    school_principal AS "principal",
    school_contact AS "contact",
    school_link AS "link",
    school_email AS "email",
    school_district AS "district",
    school_type AS "type",
    school_status AS "status"
FROM schoolstbl WHERE school_type = 'ELEMENTARY SCHOOLS' AND school_status = 'active';

--filesvw
CREATE VIEW filesVW AS
SELECT
    file_id AS "id",
    file_type AS "type",
    file_title AS "title",
    file_link AS "link",
    file_department AS "department",
    file_date AS "date",
    file_status AS "status"
FROM filestbl WHERE file_status = 'active';

--highschoolsvw
CREATE VIEW highSchoolsVW AS
SELECT
    school_id AS "id",
    school_name AS "name",
    school_address AS "address",
    school_principal AS "principal",
    school_contact AS "contact",
    school_link AS "link",
    school_email AS "email",
    school_district AS "district",
    school_type AS "type",
    school_status AS "status"
FROM schoolstbl WHERE school_type = 'HighSchool' AND school_status = 'active';

--issuancescategoryvw	
CREATE VIEW issuancescategoryVW AS
SELECT
    issuances_type AS "type",
    issuances_type_name AS "name",
    issuances_status AS "status"
FROM issuancescategorytbl WHERE issuances_status = 'active';

--issuancesvw
CREATE VIEW issuancesVW AS
SELECT
    issuances_id AS "id",
    tracking_number AS "tracking_number",
    issuances_title AS "title",
    issuances_link AS "link",
    issuances_number AS "number",
    issuances_date AS "date",
    issuances_type AS "type",
    issuances_status AS "status"
FROM issuancestbl WHERE issuances_status = 'active';

--jhsschoolsvw
CREATE VIEW jhsSchoolsVW AS
SELECT
    school_id AS "id",
    school_name AS "name",
    school_address AS "address",
    school_principal AS "principal",
    school_contact AS "contact",
    school_link AS "link",
    school_email AS "email",
    school_district AS "district",
    school_type AS "type",
    school_status AS "status"
FROM schoolstbl WHERE school_type = 'JUNIOR HIGH SCHOOLS' AND school_status = 'active';

--materialfilesvw
CREATE VIEW materialfilesVW AS
SELECT
    file_id AS "id",
    file_type AS "type",
    file_title AS "title",
    file_link AS "link",
    file_department AS "department",
    file_date AS "date",
    file_status AS "status"
FROM filestbl WHERE file_type = 'MATERIALS' AND file_status = 'active';

--officesvw
CREATE VIEW OfficesVW AS
SELECT
    offices_id AS "id",
    department_name AS "department",
    employee_name AS "name",
    employee_picture AS "picture",
    employee_office AS "office",
    employee_position AS "position",
    employee_post AS "post",
    employee_type AS "type",
    employee_email AS "email",
    employee_status AS "status"
FROM officestbl
    INNER JOIN departmentstbl ON
    officestbl.department_id = departmentstbl.department_id
WHERE employee_status = 'active';

--procurementfilesvw
CREATE VIEW procurementfilesVW AS
SELECT
    bacfile_id AS "id",
    bacfile_type AS "type",
    bacfile_title AS "title",
    bacfile_link AS "link",
    bacfile_date AS "date",
    bacfile_procurementYear AS "pyear",
    bacfile_procurementType AS "ptype",
    bacfile_status AS "status"
FROM bacfilestbl WHERE bacfile_type = 'PROCUREMENT' AND bacfile_status = 'active';

--schoolsvw
CREATE VIEW schoolsVW AS
SELECT
    schooltbl_id AS "school_id",
    school_id AS "id",
    school_name AS "name",
    school_address AS "address",
    school_principal AS "principal",
    school_contact AS "contact",
    school_link AS "link",
    school_email AS "email",
    school_district AS "district",
    school_type AS "type",
    school_shsAvailability AS "shs_availability",
    school_spedAvailablity AS "sped_availability",
    school_status AS "status"
FROM schoolstbl WHERE school_status = 'active';

--shsschoolsvw
CREATE VIEW shsSchoolsVW AS
SELECT
    school_id AS "id",
    school_name AS "name",
    school_address AS "address",
    school_principal AS "principal",
    school_contact AS "contact",
    school_link AS "link",
    school_email AS "email",
    school_district AS "district",
    school_type AS "type",
    school_status AS "status"
FROM schoolstbl WHERE school_type = 'JUNIOR HIGH SCHOOLS' AND school_shsAvailability = 'yes' AND school_status = 'active';

--socialmediavw
CREATE VIEW socialmediaVW AS
SELECT
    socialMedia_id AS "id",
    socialMedia_type AS "type",
    socialMedia_link AS "link",
    socialMedia_title AS "title",
    socialMedia_post AS "post",
    socialMedia_status AS "status"
FROM socialmediatbl WHERE socialMedia_status = 'active';

--servicesvw
CREATE VIEW servicesVW AS
SELECT
    services_id AS "id",
    services_title AS "title",
    services_description AS "description",
    services_link AS "link",
    services_status AS "status",
    services_icon AS "icon"
FROM servicestbl WHERE services_status = 'active';

--spedschoolsvw
CREATE VIEW spedSchoolsVW AS
SELECT
    school_id AS "id",
    school_name AS "name",
    school_address AS "address",
    school_principal AS "principal",
    school_contact AS "contact",
    school_link AS "link",
    school_email AS "email",
    school_district AS "district",
    school_type AS "type",
    school_status AS "status"
FROM schoolstbl WHERE school_spedAvailablity = 'yes' AND school_status = 'active';

--timelogvw
CREATE VIEW timelogVW AS
SELECT
    timelogtbl.time_id AS "id",
    userstbl.user_id AS "user_id",
    userstbl.user_username AS "username",
    timelogtbl.log_action AS "action",
    timelogtbl.log_date AS "date",
    timelogtbl.log_time AS "time",
    timelogtbl.log_status  AS "status"
FROM timelogtbl
INNER JOIN userstbl ON
timelogtbl.user_id = userstbl.user_id WHERE log_status = 'active';

--transparencyfilesvw
CREATE VIEW transparencyFilesVW AS
SELECT
    bacfile_id AS "id",
    bacfile_type AS "type",
    bacfile_title AS "title",
    bacfile_link AS "link",
    bacfile_date AS "date",
    bacfile_publishDate AS "publish_date",
    bacfile_closingDate AS "closing_date",
    bacfile_awardedTo AS "awarded_to",
    bacfile_referenceNum AS "reference_number",
    bacfile_procurementMode AS "procurement_mode",
    bacfile_status AS "status"
FROM bacfilestbl WHERE bacfile_type = 'INVITATION TO BID' AND bacfile_status = 'active';

--usersvw
CREATE VIEW usersVW AS
SELECT 
    user_id AS "id",
    user_username AS "username",
    user_email AS "email",
    user_type AS "type",
    user_password AS "password",
    user_department AS "department",
    user_status AS "status"
FROM userstbl  WHERE user_status = 'active';

--bacfilesvw
CREATE VIEW bacFilesVW AS
SELECT
    bacfile_id AS "id",
    bacfile_type AS "type",
    bacfile_title AS "title",
    bacfile_link AS "link",
    bacfile_date AS "date",
    bacfile_procurementYear AS "procurement_year",
    bacfile_procurementType AS "procurement_type",
    bacfile_publishDate AS "publish_date",
    bacfile_closingDate AS "closing_date",
    bacfile_awardedTo AS "awarded_to",
    bacfile_referenceNum AS "reference_number",
    bacfile_procurementMode AS "procurement_mode",
    bacfile_status AS "status"
FROM bacfilestbl WHERE bacfile_status = 'active';

ALTER TABLE tablename AUTO_INCREMENT = 1