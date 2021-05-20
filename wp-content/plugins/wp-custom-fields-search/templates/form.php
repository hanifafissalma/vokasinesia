<?php
    echo $args['before_widget'];
    if($settings && array_key_exists('show_title',$settings) && $settings['show_title']) { 
        echo $args['before_title'];
        echo $settings['form_title'];
        echo $args['after_title'];
    } 
?>
<?php do_action('wpcfs-before-form') ?>
<form method='<?php echo $method?>' action='<?php echo htmlspecialchars($results_page)?>' class='wpcfs-search-form' id='<?php echo htmlspecialchars($form_id)?>'>
<div class="row">
    <div class="col-12"><h2 class="mb-2">Pencarian</h2></div>
<?php foreach($components as $config) { 
?>      
	<div class='col-md-4 <?php echo sanitize_html_class($config['html_name'])." ".sanitize_html_class(strtolower($config['label']))." ".sanitize_html_class(strtolower($config['class']->get_name()));?>'>
            <label for="<?php echo htmlspecialchars($config['html_id'])?>">
                <?php echo $config['label']; ?>
            </label>
            <div class="form-group">
    	    	<?php echo $config['class']->render($config,$query); ?>
            </div>
        </div>
	<?php } ?>

<div class='col-12'>
    <input type='submit' class='btn btn-customsearch' value='<?php echo __("Cari","wp_custom_fields_search")?>'>
</div>

<?php echo $hidden; ?>
</div>
</form>
<?php do_action('wpcfs-after-form') ?>
<?php echo $args['after_widget']?>
