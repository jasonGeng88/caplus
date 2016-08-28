update wp_posts set guid=REPLACE (guid,'www.localca.com','45.63.121.127');

update wp_posts set post_content=REPLACE (post_content,'www.localca.com','45.63.121.127');

update wp_options set option_value=REPLACE (option_value,'45.63.121.127','45.79.105.233');

update wp_postmeta set meta_value=REPLACE (meta_value,'45.63.121.127','45.79.105.233');