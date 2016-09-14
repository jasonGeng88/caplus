set @old_url='45.79.105.233';
set @new_url='www.caplus.tokyo';
update wp_posts set guid=REPLACE (guid, @old_url,@new_url);

update wp_posts set post_content=REPLACE (post_content, @old_url,@new_url);

update wp_options set option_value=REPLACE (option_value, @old_url,@new_url);

update wp_postmeta set meta_value=REPLACE (meta_value, @old_url,@new_url);