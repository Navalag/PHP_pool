SELECT UPPER(db_agalavan.user_card.last_name) AS 'NAME', db_agalavan.user_card.first_name, db_agalavan.subscription.price FROM db_agalavan.user_card INNER JOIN db_agalavan.member ON db_agalavan.user_card.id_user=db_agalavan.member.id_user_card INNER JOIN db_agalavan.subscription ON db_agalavan.member.id_sub=db_agalavan.subscription.id_sub WHERE db_agalavan.subscription.price > 42 ORDER BY last_name ASC, first_name ASC;
