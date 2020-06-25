<?php

$args = array(  
    'post_type' => 'payment-methods',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'orderby' => 'title', 
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
            <th><?php echo __('Payment Method', $text_domain); ?></th>
            <th><?php echo __('Min Deposit', $text_domain); ?></th>
            <th><?php echo __('Max Deposit', $text_domain); ?></th>
            <th><?php echo __('Deposit Fee', $text_domain).' %*'; ?></th>
            <th data-breakpoints="xs sm"><?php echo __('Deposit Processing Time', $text_domain); ?></th>
            <th data-breakpoints="xs sm"><?php echo __('Min Withdrawal', $text_domain); ?></th>
            <th data-breakpoints="xs sm"><?php echo __('Max Withdrawal', $text_domain); ?></th>
            <th data-breakpoints="xs sm"><?php echo __('Withdrawal Fee', $text_domain).' %*'; ?></th>
            <th data-breakpoints="xs sm"><?php echo __('Withdrawal Processing Time', $text_domain); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts_id as $post_id) :
           $thumbnail = get_the_post_thumbnail($post_id); 
    ?>
        <tr>
            <td class="footable-img"><?php echo $thumbnail; ?></td>
            <td><?php echo get_post_meta( $post_id, '_min_deposit_text_field', true); ?></td>
            <td><?php echo get_post_meta( $post_id, '_max_deposit_text_field', true); ?></td>
            <td><?php echo get_post_meta( $post_id, '_deposit_fee_text_field', true).' %'; ?></td>
            <td><?php echo get_post_meta( $post_id, '_deposit_processing_time_text_field', true); ?></td>
            <td><?php echo get_post_meta( $post_id, '_min_withdrawal_text_field', true); ?></td>
            <td><?php echo get_post_meta( $post_id, '_max_withdrawal_text_field', true); ?></td>
            <td><?php echo get_post_meta( $post_id, '_withdrawal_fee_text_field', true).' %'; ?></td>
            <td><?php echo get_post_meta( $post_id, '_withdrawal_processing_time_text_field', true); ?></td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>
</div>