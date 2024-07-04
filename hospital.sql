CREATE DATABASE HOSPITAL;
USE HOSPITAL;

CREATE TABLE PATIENT(
	PATIENT_ID	CHAR(5)	NOT NULL,
    PNAME		VARCHAR(25)	NOT NULL,
    AGE			INT,
    SEX			CHAR,
    ADDRESS		VARCHAR(50),
    PHONE 		CHAR(10) NOT NULL,
    PRIMARY KEY (PATIENT_ID));
    
CREATE TABLE DOCTOR(
 DID CHAR(5) NOT NULL,
 DNAME VARCHAR(25) NOT NULL,
 DSEX VARCHAR(7),
 DADDRESS VARCHAR(50),
 DAGE INT,
 DPHONE CHAR(10),
 DEPT_NUM INT,
 PRIMARY KEY (DID));
 
 CREATE TABLE DEPARTMENT(
  DEPT_NAME VARCHAR(20),
  DEPT_NO INT,
  PRIMARY KEY (DEPT_NO),
  UNIQUE(DEPT_NAME));

CREATE TABLE SLOT
		(DID INT     NOT NULL,
		SLOT_NO INT    NOT NULL,
		SDATE DATE,
		TIME_FROM TIME,
		TIME_TO TIME,
		STATUS VARCHAR (30),
		PRIMARY KEY (DID, SLOT_NO));
        
CREATE TABLE APPOINTMENT
		(APP_NO INT     NOT NULL,
		SNO INT 	NOT NULL,
		PID INT,
		ASTATUS VARCHAR (15),
		PRIMARY KEY (APP_NO));
        
CREATE TABLE LOGIN
		(EMAIL VARCHAR(40)    NOT NULL,
		PAT_ID INT,
		LOGIN_NAME VARCHAR (40),
		PASSWORD VARCHAR (30),
		PRIMARY KEY (EMAIL,PAT_ID));

INSERT INTO DEPARTMENT VALUES('NEUROLOGY',01);
INSERT INTO DEPARTMENT VALUES('RADIOLOGY',02);
INSERT INTO DEPARTMENT VALUES('GYNAECOLOGIST',03);
INSERT INTO DEPARTMENT VALUES('OPD',04);
INSERT INTO DEPARTMENT VALUES('CARDIOLOGY',05);

INSERT INTO DOCTOR VALUES('D0001','ANSHUL MEHRA','MALE','SECTOR 21, CANAUGHT PLACE, NEW DELHI','49','7778880999','01');
INSERT INTO DOCTOR VALUES('D0002','AAMIR SIDDHIQUI','MALE','SECTOR 09, NOIDA, UP ','48','9983473238', '02');
INSERT INTO DOCTOR VALUES('D0003','RIDDHI RAWAT','FEMALE','SECTOR 19, SAKET, NEW DELHI','38','8841968274', '03');
INSERT INTO DOCTOR VALUES('D0004','SEEMA SINGH','FEMALE','SECTOR 8, LAJPATNAGAR, NEW DELHI','43','9167349385', '04');
INSERT INTO DOCTOR VALUES('D0005','HEMANT PANDEY','MALE','SECTOR 3, HAUJ KHAS, NEW DELHI','41','8473297449', '05');