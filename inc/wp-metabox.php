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


<form class="w-full max-w-lg">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full md:w-1/4 sm:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
      Min Deposit
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="number" min="0" name="_min_deposit_text_field"
            value="<?php echo $min_deposit_textfield; ?>" placeholder="Min Deposit">
      
    </div>
    <div class="w-full md:w-1/4 sm:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
      Max Deposit
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" min="0" name="_max_deposit_text_field"
			value="<?php echo $max_deposit_textfield; ?>" placeholder="Max Deposit">
    </div>
    <div class="w-full md:w-1/4 sm:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
      Deposit Fee
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" min="0" name="_deposit_fee_text_field"
			value="<?php echo $deposit_fee_textfield; ?>" placeholder="Deposit Fee">
    </div>
    <div class="w-full md:w-1/4 sm:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
      Deposit Processing Time
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" min="1" name="_deposit_processing_time_text_field"
			value="<?php echo $deposit_processing_time_textfield; ?>" placeholder="Deposit Processing Time">
    </div>
    <div class="w-full md:w-1/4 sm:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
      Min Withdrawal
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" min="0" name="_min_withdrawal_text_field"
			value="<?php echo $min_withdrawal_textfield; ?>" placeholder="Min Withdrawal">
    </div>
    <div class="w-full md:w-1/4 sm:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
      Max Withdrawal
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" min="0" name="_max_withdrawal_text_field"
			value="<?php echo $max_withdrawal_textfield; ?>" placeholder="Max Withdrawal">
    </div>
    <div class="w-full md:w-1/4 sm:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
      Withdrawal Fee
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" min="0" name="_withdrawal_fee_text_field"
			value="<?php echo $withdrawal_fee_textfield; ?>" placeholder="Withdrawal Fee">
    </div>
    <div class="w-full md:w-1/4 sm:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
      Withdrawal Processing Time
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" min="1" name="_withdrawal_processing_time_text_field"
			value="<?php echo $withdrawal_processing_time_textfield; ?>" placeholder="Withdrawal Processing Time">
    </div>

    
  </div>
</form>


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
