
<?php
global $options;
foreach($options as $value){
    if(get_settings($value['id']) === false){$$value['id'] = $value['std'];} else {$$value['id'] = get_settings($value['id']);}
}
wp_footer();
?>
</body>

</html>