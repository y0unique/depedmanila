-- create a view with a name usersVW from userstbl
CREATE VIEW usersVW AS
SELECT 
    user_username AS "username",
    user_email AS "email",
    user_type AS "type",
    user_status AS "status"
FROM userstbl;

--alter usersVW add user_id as id
ALTER VIEW usersVW AS
SELECT 
    user_id AS "id",
    user_username AS "username",
    user_email AS "email",
    user_type AS "type",
    user_password AS "password",
    user_status AS "status"
FROM userstbl;

-- create a view with a name issuancesVW from issuancestbl
CREATE VIEW issuancesVW AS
SELECT
    tracking_number AS "tracking number",
    issuances_title AS "title",
    issuances_link AS "link",
    issuances_number AS "number",
    issuances_date AS "date",
    issuances_type AS "type",
    issuances_status AS "status"
FROM issuancestbl;

--alter issuancesVW add issuances_id as id
ALTER VIEW issuancesVW AS
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

-- create a view with a name carouselVW from imagestbl where image_type = 'carousel'
CREATE VIEW carouselVW AS
SELECT
    image_name AS "name",
    image_title AS "title",
    image_description AS "description",
    image_type AS "type",
    image_status AS "status"
FROM imagestbl WHERE image_type = 'carousel';

--alter carouselVW add issuances_id as id
ALTER VIEW carouselVW AS
SELECT
    image_id AS "id",
    image_name AS "name",
    image_title AS "title",
    image_description AS "description",
    image_type AS "type",
    image_status AS "status"
FROM imagestbl WHERE image_type = 'carousel' AND image_status = 'active';

-- create a view with a name chiefsOfficesVW from officestbl where employee_post = 'chief'
CREATE VIEW chiefsOfficesVW AS
SELECT
    employee_name AS "name",
    employee_office AS "office",
    employee_position AS "position",
    employee_email AS "email",
    employee_status AS "status"
FROM officestbl WHERE employee_post = 'chief';

--alter chiefsOfficesVw
ALTER VIEW chiefsOfficesVW AS
SELECT
    offices_id AS "id",
    employee_name AS "name",
    employee_office AS "office",
    employee_position AS "position",
    employee_email AS "email",
    employee_status AS "status"
FROM officestbl WHERE employee_post = 'chief' AND employee_status = 'active';

-- create a view with a name cidOfficesVW from officestbl where employee_post = 'chief'
CREATE VIEW cidOfficesVW AS
SELECT
    employee_name AS "name",
    employee_office AS "office",
    employee_position AS "position",
    employee_email AS "email",
    employee_status AS "status"
FROM officestbl WHERE employee_post = 'CID';

--alter cidOfficesVW
ALTER VIEW cidOfficesVW AS
SELECT
    offices_id AS "id",
    employee_name AS "name",
    employee_office AS "office",
    employee_position AS "position",
    employee_email AS "email",
    employee_status AS "status"
FROM officestbl WHERE employee_post = 'CID' AND employee_status = 'active';

-- create a view with a name sgodOfficesVW from officestbl where employee_post = 'chief'
CREATE VIEW sgodOfficesVW AS
SELECT
    employee_name AS "name",
    employee_office AS "office",
    employee_position AS "position",
    employee_email AS "email",
    employee_status AS "status"
FROM officestbl WHERE employee_post = 'SGOD';

--alter sgodOfficesVW
ALTER VIEW sgodOfficesVW AS
SELECT
    offices_id AS "id",
    employee_name AS "name",
    employee_office AS "office",
    employee_position AS "position",
    employee_email AS "email",
    employee_status AS "status"
FROM officestbl WHERE employee_post = 'SGOD' AND employee_status = 'active';

-- create a view with a name OfficesVW
CREATE VIEW OfficesVW AS
SELECT
    offices_id AS "id",
    employee_name AS "name",
    employee_office AS "office",
    employee_position AS "position",
    employee_position AS "post",
    employee_email AS "email",
    employee_status AS "status"
FROM officestbl WHERE employee_status = 'active';

--alter OfficesVW
ALTER VIEW OfficesVW AS
SELECT
    offices_id AS "id",
    employee_name AS "name",
    employee_office AS "office",
    employee_position AS "position",
    employee_post AS "post",
    employee_email AS "email",
    employee_status AS "status"
FROM officestbl WHERE employee_status = 'active';

-- create a view with a name dailyVisitysVW from dailyvisitstbl where daily_visitors_visit_status = 'active'
CREATE VIEW dailyVisitorsVW AS
SELECT
    daily_visitors_ip_address AS "ip address",
    daily_visitors_visit_date AS "date",
	daily_visitors_visit_status AS "status"
FROM dailyvisitstbl WHERE daily_visitors_visit_status = 'active';

-- create a view with a name downloadableFilesVW from filestbl where file_type = 'downloadable'
CREATE VIEW downloadableFilesVW AS
SELECT
    file_type AS "type",
    file_title AS "title",
    file_link AS "link",
    file_date AS "date",
    file_status AS "status"
FROM filestbl WHERE file_type = 'downloadable';

--alter downloadableFilesVW
ALTER VIEW downloadableFilesVW AS
SELECT
    file_id AS "id",
    file_type AS "type",
    file_title AS "title",
    file_link AS "link",
    file_date AS "date",
    file_status AS "status"
FROM filestbl WHERE file_type = 'downloadable' AND file_status = 'active';

-- create a view with a name transparencyFilesVW from filestbl where file_type = 'transparency'
CREATE VIEW transparencyFilesVW AS
SELECT
    file_type AS "type",
    file_title AS "title",
    file_link AS "link",
    file_date AS "date",
    file_publishDate AS "publish date",
    file_closingDate AS "closing date",
    file_awardedTo AS "awarded to",
    file_referenceNum AS "reference number",
    file_procurementMode AS "procurement mode",
    file_status AS "status"
FROM filestbl WHERE file_type = 'transparency';

--alter transparencyFilesVW
ALTER VIEW transparencyFilesVW AS
SELECT
    file_id AS "id",
    file_type AS "type",
    file_title AS "title",
    file_link AS "link",
    file_date AS "date",
    file_publishDate AS "publish_date",
    file_closingDate AS "closing_date",
    file_awardedTo AS "awarded_to",
    file_referenceNum AS "reference_number",
    file_procurementMode AS "procurement_mode",
    file_status AS "status"
FROM filestbl WHERE file_type = 'transparency' AND file_status = 'active';

-- create a view with a name socialmediaVW from socialmediatbl
CREATE VIEW socialmediaVW AS
SELECT
	socialMedia_type AS "type",
    socialMedia_link AS "link",
    socialMedia_title AS "title",
    socialMedia_post AS "post",
    socialMedia_status AS "status"
FROM socialmediatbl;

--alter socialmediaVW
ALTER VIEW socialmediaVW AS
SELECT
    socialMedia_id AS "id",
    socialMedia_type AS "type",
    socialMedia_link AS "link",
    socialMedia_title AS "title",
    socialMedia_post AS "post",
    socialMedia_status AS "status"
FROM socialmediatbl WHERE socialMedia_status = 'active';



-- create a view with a name timelogVW from timelogtbl inner join userstbl on timelogtbl.user_id = userstbl.user_id and log_date and log_time as date time
CREATE VIEW timelogVW AS
SELECT
    userstbl.user_id AS "user id",
    userstbl.user_username AS "username",
    log_action AS "action",
    concat(log_date, ' ', log_time) AS "date time",
    log_status  AS "status"
FROM timelogtbl
INNER JOIN userstbl ON
timelogtbl.user_id = userstbl.user_id;

--alter timelogVW add time_id as id
ALTER VIEW timelogVW AS
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

-- create a view with a name elemSchoolsVW from schoolstbl where school_type = 'Elementary'
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
FROM schoolstbl WHERE school_type = 'Elementary';

--alter elemSchoolsVW
ALTER VIEW elemSchoolsVW AS
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
FROM schoolstbl WHERE school_type = 'Elementary' AND school_status = 'active';

-- create a view with a name highSchoolsVW from schoolstbl where school_type = HighSchool
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
FROM schoolstbl WHERE school_type = 'HighSchool';

--alter highSchoolsVW
ALTER VIEW highSchoolsVW AS
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

-- create a view with a name jhsSchoolsVW from schoolstbl where school_type = HighSchool and school_shsAvailability = 'no'
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
FROM schoolstbl WHERE school_type = 'HighSchool' AND school_shsAvailability = 'no';

--alter jhsSchoolsVW
ALTER VIEW jhsSchoolsVW AS
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
FROM schoolstbl WHERE school_type = 'HighSchool'  AND school_shsAvailability = 'no' AND school_status = 'active';

-- create a view with a name shsSchoolsVW from schoolstbl where school_type = HighSchool school_shsAvailability = 'yes'
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
FROM schoolstbl WHERE school_type = 'HighSchool' AND school_shsAvailability = 'yes';

--alter shsSchoolsVW
ALTER VIEW shsSchoolsVW AS
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
FROM schoolstbl WHERE school_type = 'HighSchool' AND school_shsAvailability = 'yes' AND school_status = 'active';

-- create a view with a name spedSchoolsVW from schoolstbl where school_spedAvailablity = 'yes'
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
FROM schoolstbl WHERE school_spedAvailablity = 'yes';

--alter spedSchoolsVW
ALTER VIEW spedSchoolsVW AS
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

--create a view with a name schoolsvw from schoolstbl
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

--create a view with a name filesvw from filestbl
CREATE VIEW filesVW AS
SELECT
    file_id AS "id",
    file_type AS "type",
    file_title AS "title",
    file_link AS "link",
    file_department AS "department",
    file_date AS "date",
    file_publishDate AS "publish_date",
    file_closingDate AS "closing_date",
    file_awardedTo AS "awarded_to",
    file_referenceNum AS "reference_number",
    file_procurementMode AS "procurement_mode",
    file_procurementYear AS "procurement_year",
    file_procurementType AS "procurement_type",
    file_status AS "status"
FROM filestbl WHERE file_status = 'active';

CREATE VIEW materialfilesVW AS
SELECT
    file_id AS "id",
    file_type AS "type",
    file_title AS "title",
    file_link AS "link",
    file_department AS "department",
    file_date AS "date",
    file_status AS "status"
FROM filestbl WHERE file_type = 'material' AND file_status = 'active';

CREATE VIEW procurementfilesVW AS
SELECT
    file_id AS "id",
    file_type AS "type",
    file_title AS "title",
    file_link AS "link",
    file_date AS "date",
    file_procurementYear AS "pyear",
    file_procurementType AS "ptype",
    file_status AS "status"
FROM filestbl WHERE file_type = 'procurement' AND file_status = 'active';

--alter issuancesVW add issuances_id as id
ALTER VIEW issuancesVW AS
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

--alter issuancesVW add issuances_id as id
CREATE VIEW issuancescategoryVW AS
SELECT
    issuances_type AS "type",
    issuances_type_name AS "name",
    issuances_status AS "status"
FROM issuancescategorytbl WHERE issuances_status = 'active';

CREATE VIEW departmentsVW AS
SELECT
    department_id AS "id",
    department_name AS "name",
    department_contact AS "contact",
    department_email AS "email",
    department_status AS "status"
FROM departmentstbl WHERE department_status = 'active';
--adds a unique index to the user_username column in usertbl, if it
--already exists, it will be dropped and recreated
ALTER TABLE userstbl ADD UNIQUE INDEX user_username (user_username);



ALTER VIEW OfficesVW AS
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