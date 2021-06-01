SELECT 
MAX(`data_template`.`id`) AS `id`,
LEFT(`data_template`.`fecha_hora`,10) AS `fecha`,
`data_template`.`id_station` AS `id_station`,
`data_template`.`uploader_id` AS `uploader_id`,

MAX(`data_template`.`temperatura_interna`) AS `max_temperatura_interna`,
MIN(`data_template`.`temperatura_interna`) AS `min_temperatura_interna`,
AVG(`data_template`.`temperatura_interna`) AS `avg_temperatura_interna`,

MAX(`data_template`.`humedad_interna`) AS `max_humedad_interna`,
MIN(`data_template`.`humedad_interna`) AS `min_humedad_interna`,
AVG(`data_template`.`humedad_interna`) AS `avg_humedad_interna`,

MAX(`data_template`.`temperatura_externa`) AS `max_temperatura_externa`,
MIN(`data_template`.`temperatura_externa`) AS `min_temperatura_externa`,
AVG(`data_template`.`temperatura_externa`) AS `avg_temperatura_externa`,

MAX(`data_template`.`humedad_externa`) AS `max_humedad_externa`,
MIN(`data_template`.`humedad_externa`) AS `min_humedad_externa`,
AVG(`data_template`.`humedad_externa`) AS `avg_humedad_externa`,

MAX(`data_template`.`presion_relativa`) AS `max_presion_relativa`,
MIN(`data_template`.`presion_relativa`) AS `min_presion_relativa`,
AVG(`data_template`.`presion_relativa`) AS `avg_presion_relativa`,

MAX(`data_template`.`presion_absoluta`) AS `max_presion_absoluta`,
MIN(`data_template`.`presion_absoluta`) AS `min_presion_absoluta`,
AVG(`data_template`.`presion_absoluta`) AS `avg_presion_absoluta`,

MAX(`data_template`.`velocidad_viento`) AS `max_velocidad_viento`,
MIN(`data_template`.`velocidad_viento`) AS `min_velocidad_viento`,
AVG(`data_template`.`velocidad_viento`) AS `avg_velocidad_viento`,

MAX(`data_template`.`sensacion_termica`) AS `max_sensacion_termica`,
MIN(`data_template`.`sensacion_termica`) AS `min_sensacion_termica`,
AVG(`data_template`.`sensacion_termica`) AS `avg_sensacion_termica`,

MAX(`data_template`.`lluvia_24_horas`) AS `lluvia_24_horas_total` 

FROM `data_template` 
GROUP BY `fecha`,`data_template`.`id_station`,`data_template`.`uploader_id`