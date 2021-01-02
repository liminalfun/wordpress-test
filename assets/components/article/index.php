<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
    <?php if (!empty($args['header'])) { ?>
        <div class="article__header entry-header">
            <?php echo $args['header']; ?>
        </div>
    <?php } ?>
    <?php if (!empty($args['content'])) { ?>
        <div class="article__content entry-content">
            <?php echo $args['content']; ?>
        </div>
    <?php } ?>
</article>
