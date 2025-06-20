<div id="<?php echo esc_attr( get_the_ID() ); ?>" class="swiper-slide">
    <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail('large'); ?>
    <?php else : ?>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/default-thumbnail.png' ); ?>" alt="<?php the_title_attribute(); ?>" class="wp-post-image"/>
    <?php endif; ?>
    <div class="caption">
        <div class="tags">
            <?php $tags = get_the_terms( get_the_ID(), 'works_tag' ); ?>
            <?php if ( $tags && ! is_wp_error( $tags ) ) : ?>
                <?php foreach ( $tags as $tag ) : ?>
                    <span class="tag">#<?php echo esc_html( $tag->name ); ?></span>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if( get_the_title() ) : ?>
            <p class="title"><?php the_title(); ?></p>
        <?php else : ?>
            <p class="title">(タイトルなし)</p>
        <?php endif; ?>
        <?php $roles = get_the_terms( get_the_ID(), 'works_role' ); ?>
        <?php if ( $roles && ! is_wp_error( $roles ) ) : ?>
            <p class="role">
                <?php
                    $role_slugs = wp_list_pluck( $roles, 'slug' );
                    echo esc_html( implode(' / ', $role_slugs) );
                ?>
            </p>
        <?php endif; ?>
    </div>
    <a href="<?php the_permalink(); ?>"></a>
</div>