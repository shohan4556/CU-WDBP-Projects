
    
    CREATE TABLE IF NOT EXISTS stu_info( id INT(15) NOT NULL auto_increment, PRIMARY KEY (id), name VARCHAR(25) NOT NULL, address VARCHAR(255) NOT NULL, phone VARCHAR(25) NOT NULL, email VARCHAR(255) NOT NULL );
     CREATE TABLE IF NOT EXISTS stu_result( id INT(15) NOT NULL auto_increment, subject VARCHAR(30) NOT NULL,code VARCHAR(10) NOT NULL,marks VARCHAR(10) NOT NULL, KEY (id), FOREIGN KEY (id) REFERENCES stu_info(id) ON DELETE CASCADE, PRIMARY KEY (id) );
    
    --------------=---------------------
    
    
    INSERT INTO stu_info (id, name, address, phone, email) VALUES ('1', 'aa', 'aa', '02125', 'bbb'), (NULL, 'ss', 'sss', '0255', 'sss'), (NULL, 'dddd', 'ssss', '22222', 'sssss'), (NULL, 'ffffff', 'ddddd', '52365', 'ssss'), (NULL, 'ggggg', 'gggg', '55555', 'ggggg');
    ----------------*----------------
    INSERT INTO stu_result (id, subject, code, marks) VALUES ('1', 'CSE', '111', '40'), ('2', 'cse', '111', '75'), ('3', 'CSE', '111', '80'), ('4', 'CSE', '111', '35'), ('5', 'CSE', '111', '85');
    ------------------*--------------------
    SELECT * FROM stu_info INNER JOIN stu_result ON stu_info.id=stu_result.id;not now
    --------------*---------------
    
    SELECT stu_info.id,stu_info.name,stu_info.address,stu_info.phone,stu_info.email,

stu_result.subject,stu_result.code,stu_result.marks FROM stu_info,stu_result WHERE  stu_info.id=stu_result.id;
-----------------*---------------


DELETE FROM stu_result WHERE marks<=40;

-------------------*-------------------

SELECT stu_info.id,stu_info.name,stu_info.address,stu_info.phone,stu_info.email,

stu_result.subject,stu_result.code,stu_result.marks FROM stu_info,stu_result WHERE stu_info.phone=55555 AND  stu_result.marks>=75  AND stu_info.id=stu_result.id ;
-----------------*-------------------------


UPDATE stu_info,stu_result SET phone='55555' WHERE stu_result.marks>=80 AND stu_info.id=stu_result.id;
-------------------*---------------------