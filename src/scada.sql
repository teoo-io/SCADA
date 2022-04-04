DROP DATABASE IF EXISTS scada;
CREATE DATABASE scada;
USE scada;

DROP TABLE IF EXISTS user;

CREATE TABLE user (
                      email VARCHAR(256) NOT NULL PRIMARY KEY,
                      password VARCHAR(64) NOT NULL,
                      access INTEGER(1),
                      date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS comment;

CREATE TABLE comment (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         user_email VARCHAR(256),
                         comment_timedate TIMESTAMP,
                         comment_content CHAR(200),
                         FOREIGN KEY(user_email)
                             REFERENCES user(email)
);

CREATE TABLE user_comment (
                              user_email  VARCHAR(256),
                              comment_id INT,
                              PRIMARY KEY (user_email, comment_id),
                              FOREIGN KEY (user_email)
                                  REFERENCES user(email),
                              FOREIGN KEY (comment_id)
                                  REFERENCES comment(id)
);

DROP TABLE IF EXISTS application;

CREATE TABLE application (
                                       app_id INT AUTO_INCREMENT PRIMARY KEY,
                                       app_name VARCHAR(64) NOT NULL,
                                       app_title VARCHAR(64) NOT NULL,
                                       app_logo VARCHAR(256) DEFAULT 'fas fa-truck-pickup',
                                       app_directory VARCHAR(256) DEFAULT 'index.php',
                                       app_enabled BOOLEAN
);

INSERT INTO application (app_name,app_title,app_logo,app_directory,app_enabled) values('clinometer','Clinometer','fas fa-mountain','clinometer.php',FALSE);
INSERT INTO application (app_name,app_title,app_logo,app_directory,app_enabled) values('cam-view','Camera Views','fas fa-video','cam-view.php',FALSE);
INSERT INTO application (app_name,app_title,app_logo,app_directory,app_enabled) values('lights','External Lights','fas fa-lightbulb','lights.php',TRUE);
INSERT INTO user (email, password, access) values('m@teoo.io','123','1');
SELECT count(*) as total FROM user WHERE email='m@teoo.io' AND password='123';
SELECT * FROM user;
SELECT count(*) as total FROM user WHERE email='m@teoo.io';