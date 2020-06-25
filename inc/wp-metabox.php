<?php

function brand_payment_fields(){
 
    add_meta_box(
            'brand-payment-fields',
            'Brand Payment Methods',
            'brand_payment_add_fields',
            'payment-methods',
            'normal',
            'high'
        );
}
 
add_action('add_meta_boxes', 'brand_payment_fields');
 
function brand_payment_add_fields(){
 
    global $post;

    
 
    // Get Value of Fields From Database
    $min_deposit_textfield = get_post_meta( $post->ID, '_min_deposit_text_field', true);
    $max_deposit_textfield = get_post_meta( $post->ID, '_max_deposit_text_field', true);
    $deposit_fee_textfield = get_post_meta( $post->ID, '_deposit_fee_text_field', true);
    $deposit_processing_time_textfield = get_post_meta( $post->ID, '_deposit_processing_time_text_field', true);
    $min_withdrawal_textfield = get_post_meta( $post->ID, '_min_withdrawal_text_field', true);
    $max_withdrawal_textfield = get_post_meta( $post->ID, '_max_withdrawal_text_field', true);
    $withdrawal_fee_textfield = get_post_meta( $post->ID, '_withdrawal_fee_text_field', true);
    $withdrawal_processing_time_textfield = get_post_meta( $post->ID, '_withdrawal_processing_time_text_field', true);
    
     
?>

<div class="field is-horizontal">

	<div class="field-body">
        <div class="field">
        <label class="label">Min Deposit</label>
        <div class="control">
        <input class="input" type="number" min="0" name="_min_deposit_text_field"
            value="<?php echo $min_deposit_textfield; ?>" placeholder="Min Deposit" />
        </div>    

		</div>
		<div class="field">
        <label class="label">Max Deposit</label>
        <div class="control">
        <input class="input" type="number" min="0" name="_max_deposit_text_field"
			value="<?php echo $max_deposit_textfield; ?>" placeholder="Max Deposit" />
        </div>

        </div>
        
        <div class="field">
        <label class="label">Deposit Fee</label>
        <div class="control">
        <input class="input" type="number" min="0" name="_deposit_fee_text_field"
			value="<?php echo $deposit_fee_textfield; ?>" placeholder="Deposit Fee" />
        </div>
        </div>
        
        <div class="field">
        <label class="label">Deposit Processing Time</label>
        <div class="control">
        <input class="input" type="text" name="_deposit_processing_time_text_field"
			value="<?php echo $deposit_processing_time_textfield; ?>" placeholder="Deposit Processing Time" />
        </div>
        </div>
        

	</div>
</div>



<div class="field is-horizontal">

	<div class="field-body">
        <div class="field">
        <label class="label">Min Withdrawal</label>
        <div class="control">
        <input class="input" type="number" min="0" name="_min_withdrawal_text_field"
			value="<?php echo $min_withdrawal_textfield; ?>" placeholder="Min Withdrawal" />
        </div>    

		</div>
		<div class="field">
        <label class="label">Max Withdrawal</label>
        <div class="control">
        <input class="input" type="number" min="0" name="_max_withdrawal_text_field"
			value="<?php echo $max_withdrawal_textfield; ?>" placeholder="Max Withdrawal" />
        </div>

        </div>
        
        <div class="field">
        <label class="label">Withdrawal Fee</label>
        <div class="control">
        <input class="input" type="number" min="0" name="_withdrawal_fee_text_field"
			value="<?php echo $withdrawal_fee_textfield; ?>" placeholder="Withdrawal Fee" />
        </div>
        </div>
        
        <div class="field">
        <label class="label">Withdrawal Processing Time</label>
        <div class="control">
        <input class="input" type="text" name="_withdrawal_processing_time_text_field"
			value="<?php echo $withdrawal_processing_time_textfield; ?>" placeholder="Withdrawal Processing Time" />
        </div>
        </div>
        

	</div>
</div>






<?php    
}



// Now Save these multiple fields value in the Database
 
function brand_payment_save_fields_metabox(){
 
    global $post;
 
 
    if(isset($_POST["_min_deposit_text_field"])) :
    update_post_meta($post->ID, '_min_deposit_text_field', $_POST["_min_deposit_text_field"]);
    endif;

    if(isset($_POST["_max_deposit_text_field"])) :
    update_post_meta($post->ID, '_max_deposit_text_field', $_POST["_max_deposit_text_field"]);
    endif;

    if(isset($_POST["_deposit_fee_text_field"])) :
    update_post_meta($post->ID, '_deposit_fee_text_field', $_POST["_deposit_fee_text_field"]);
    endif;

    if(isset($_POST["_deposit_processing_time_text_field"])) :
    update_post_meta($post->ID, '_deposit_processing_time_text_field', $_POST["_deposit_processing_time_text_field"]);
    endif;

    if(isset($_POST["_min_withdrawal_text_field"])) :
    update_post_meta($post->ID, '_min_withdrawal_text_field', $_POST["_min_withdrawal_text_field"]);
    endif;

    if(isset($_POST["_max_withdrawal_text_field"])) :
    update_post_meta($post->ID, '_max_withdrawal_text_field', $_POST["_max_withdrawal_text_field"]);
    endif;

    if(isset($_POST["_withdrawal_fee_text_field"])) :
    update_post_meta($post->ID, '_withdrawal_fee_text_field', $_POST["_withdrawal_fee_text_field"]);
    endif;
    
    if(isset($_POST["_withdrawal_processing_time_text_field"])) :
    update_post_meta($post->ID, '_withdrawal_processing_time_text_field', $_POST["_withdrawal_processing_time_text_field"]);
    endif;
 
 
 
}
 
add_action('save_post', 'brand_payment_save_fields_metabox');
