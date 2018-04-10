SELECT title, summary FROM db_agalavan.film WHERE LOWER(summary) LIKE LOWER('%Vincent%') ORDER BY id_film ASC;
