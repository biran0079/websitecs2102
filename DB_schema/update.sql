-- Update 1`
ALTER TABLE `post_node` ADD `visit_times` INT NOT NULL DEFAULT '0';

--Update 2'
 ALTER TABLE `category` ADD UNIQUE (`c_name`)
 
--Update 3'
 ALTER TABLE `category` ADD `add_by` INT NOT NULL; 
 
--Update 4'
 ALTER TABLE `tag` ADD `add_by` INT NOT NULL; 