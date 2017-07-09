	
	<?php

		$current_tax = get_query_var( 'typeexcursion' ); 

		$term = get_term_by( 'slug', $current_tax, 'typeexcursion');

		if($term->parent == 0){
			echo get_template_part('tax-typeexcursion-parent'); 
		}else{
			echo get_template_part('tax-typeexcursion-sub');
		}	

	?>

