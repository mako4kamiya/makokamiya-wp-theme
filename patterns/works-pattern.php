<?php
/**
 * Title: WORKS風投稿
 * Slug: makokamiya-wp-theme/makokamiya-patterns
 * Categories: makokamiya-patterns
 * Description: single-works.php風のレイアウト
 */
?>
<!-- wp:group {"className":"left"} -->
<div class="wp-block-group left">
    <!-- wp:group {"className":"left-fixed"} -->
    <div class="wp-block-group left-fixed">
        <!-- wp:group {"className":"left-contents"} -->
        <div class="wp-block-group left-contents">
            <!-- wp:group {"className":"overview"} -->
            <div class="wp-block-group overview">
                <!-- wp:group {"className":"titlelist"} -->
                <div class="wp-block-group titlelist">
                    <!-- wp:group {"className":"tags"} -->
                    <div class="wp-block-group tags">
                        <!-- wp:paragraph {"className":"tag"} -->
                        <p class="tags">#タグ1</p>
                        <!-- /wp:paragraph -->
                        <!-- wp:paragraph {"className":"tag"} -->
                        <p class="tags">#タグ2</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                    <!-- wp:spacer {"height":"48px"} -->
                    <div style="height:48px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->
                    <!-- wp:paragraph -->
                    <p><a class="url" href="https://example.com" target="_blank">https://example.com</a></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
                <!-- wp:group -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"className":"role"} -->
                    <p class="role">デザイン, コーディング</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"className":"tool"} -->
                    <p class="tool">Photoshop, VSCode</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"className":"creationtime"} -->
                    <p class="creationtime">2週間</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
                <!-- wp:paragraph -->
                <p>ここに要約文を入力してください。</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"right"} -->
<div class="wp-block-group right">
    <!-- wp:group {"className":"right-contents"} -->
    <div class="wp-block-group right-contents">
        <!-- wp:group {"className":"thumbnail"} -->
        <div class="wp-block-group thumbnail">
            <!-- wp:post-featured-image {"className":""} /-->
        </div>
        <!-- /wp:group -->
        <!-- wp:paragraph -->
        <p>ここに本文を入力してください。</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->