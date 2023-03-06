DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    TRIGGER `2nd milestone`.`deleteemp` AFTER DELETE
    ON `2nd milestone`.`employee`
    FOR EACH ROW BEGIN

	
	INSERT INTO delete_emp 
	(emp_id_del, del_name,times)
	VALUES
	(OLD.emp_id,OLD.name,CURRENT_TIME());
	
	
	
	
	
    END$$

DELIMITER ;