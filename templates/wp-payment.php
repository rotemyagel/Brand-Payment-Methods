<?php

global $text_domain;


$args = array(  
    'post_type' => 'payment-methods',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'orderby' => 'menu_order', 
    'fields' => 'ids',
    'order' => 'ASC'
);

$payment = new WP_Query( $args );

$posts_id = $payment->posts;

// Restore original Post Data
wp_reset_postdata();

?>



<div class="payment-method">
<table class="payment-method-table" style="margin-top: 15px;">
    <thead>
        <tr>
            <th><?php  _e('Payment Method', $text_domain); ?></th>
            <th><?php  _e('Min Deposit', $text_domain); ?></th>
            <th><?php  _e('Max Deposit', $text_domain); ?></th>
            <th><?php  _e('Deposit Fee', $text_domain).' %*'; ?></th>
            <th data-breakpoints="xs sm"><?php  _e('Deposit Processing Time', $text_domain); ?></th>
            <th data-breakpoints="xs sm"><?php  _e('Min Withdrawal', $text_domain); ?></th>
            <th data-breakpoints="xs sm"><?php  _e('Max Withdrawal', $text_domain); ?></th>
            <th data-breakpoints="xs sm"><?php  _e('Withdrawal Fee', $text_domain).' %*'; ?></th>
            <th data-breakpoints="xs sm"><?php  _e('Withdrawal Processing Time', $text_domain); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts_id as $post_id) :
           $thumbnail = get_the_post_thumbnail($post_id);
           $min_deposit_post_meta = get_post_meta( $post_id, '_min_deposit_text_field', true); 
           $max_deposit_post_meta = get_post_meta( $post_id, '_max_deposit_text_field', true); 
           $deposit_fee_post_meta = get_post_meta( $post_id, '_deposit_fee_text_field', true); 
           $deposit_processing_time_post_meta = get_post_meta( $post_id, '_deposit_processing_time_text_field', true); 
           $min_withdrawal_post_meta = get_post_meta( $post_id, '_min_withdrawal_text_field', true); 
           $max_withdrawal_post_meta = get_post_meta( $post_id, '_max_withdrawal_text_field', true); 
           $withdrawal_fee_post_meta = get_post_meta( $post_id, '_withdrawal_fee_text_field', true); 
           $withdrawal_processing_time_post_meta = get_post_meta( $post_id, '_withdrawal_processing_time_text_field', true); 
    ?>
        <tr>
            <td class="footable-img"><?php echo $thumbnail ?: __('N/A', $text_domain); ?></td>
            <td><?php echo $min_deposit_post_meta ?: __('N/A', $text_domain); ?></td>
            <td><?php echo $max_deposit_post_meta ?:  __('N/A', $text_domain); ?></td>
            <td><?php echo $deposit_fee_post_meta ? $deposit_fee_post_meta.'%' :  __('N/A', $text_domain); ?></td>
            <td><?php echo $deposit_processing_time_post_meta ?: '<div class="time">'.__('INSTANT', $text_domain).'</div>'; ?></td>
            <td><?php echo $min_withdrawal_post_meta ?:  __('N/A', $text_domain); ?></td>
            <td><?php echo $max_withdrawal_post_meta ?:  __('N/A', $text_domain); ?></td>
            <td><?php echo $withdrawal_fee_post_meta ? $withdrawal_fee_post_meta.'%' :  __('N/A', $text_domain); ?></td>
            <td><?php echo $withdrawal_processing_time_post_meta ?: '<div class="time">'.__('INSTANT', $text_domain).'</div>'; ?></td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>
</div>