SELECT
        `lkp_variedades`.`name` AS `variedad`,
        `lkp_variedades`.`id` AS `variedad_id`,
         CONCAT(UPPER(LEFT(`lkp_variedades`.`propiedad`,1)),SUBSTRING(`lkp_variedades`.`propiedad`,2)) AS `tipo_variedad`,
        `lkp_variedades`.`propiedad` AS `tipo_variedad_id`,
        
        `lkp_cultivos`.`name` AS `cultivo`,
        `lkp_cultivos`.`id` AS `cultivo_id`,
         CONCAT(UPPER(LEFT(`lkp_cultivos`.`propiedad`,1)),SUBSTRING(`lkp_cultivos`.`propiedad`,2)) AS `tipo_cultivo`,
        `lkp_cultivos`.`propiedad` AS `tipo_cultivo_id`,
        `lkp_variedades`.`image` AS `image`
       
                
        FROM `lkp_variedades`
      	LEFT JOIN `lkp_cultivos` ON `lkp_cultivos`.`id` = `lkp_variedades`.`lkp_cultivo_id`
        