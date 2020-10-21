SELECT
        `comunidad`.`name` AS `comunidad`,
        `comunidad`.`id` as `comunidad_id`,
        `municipio`.`name` AS `municipio`,
        `municipio_id` AS `municipio_id`,
        `departamento`.`name` AS `departamento`,
        `departamento_id` AS `departamento_id`,
        `regions`.`name` AS `region`,
        `region_id` AS `region_id`
                
        FROM `comunidad`
        LEFT JOIN `municipio` ON `municipio`.`id` = `comunidad`.`municipio_id`
        LEFT JOIN `departamento` ON `departamento`.`id` = `municipio`.`departamento_id`
        LEFT JOIN `regions` ON `regions`.`id` = `departamento`.`region_id`