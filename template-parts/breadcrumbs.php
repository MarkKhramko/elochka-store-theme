<?php
if (!is_home() && !is_front_page()) :
    if (function_exists('woocommerce_breadcrumb')) :
        ?>
        <section class="breadcrumbs">
            <div class="container">
                <?php woocommerce_breadcrumb(); ?>
            </div>
        </section>
    <?php
    endif;
endif;
?>