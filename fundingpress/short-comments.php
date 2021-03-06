            <div class="comment-form">

<?php
    $req = get_option('require_name_email');
    if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
        die ( 'Please do not load this page directly. Thanks!' );
    if ( ! empty($post->post_password) ) :
        if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
                <div class="nopassword"><?php esc_html_e('This post is password protected. Enter the password to view any comments.', 'fundingpress') ?></div>
            </div>
<?php
        return;
    endif;
endif;
?>

<?php if ( have_comments() ) : ?>
<?php
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
    get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>

<?php if ( ! empty($comments_by_type['comment']) ) : ?>
                <div id="comments-list" class="comments">
                    <h4><?php printf($comment_count > 1 ? esc_html__('<span>%d</span> Comments', 'fundingpress') : esc_html__('<span>One</span> Comment', 'fundingpress'), $comment_count) ?></h4>

<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
                    <div id="comments-nav-above" class="comments-navigation">
                                <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                    </div>
<?php endif; ?>

                    <ol>
<?php wp_list_comments('type=comment&callback=funding_custom_comments_post'); ?>
                    </ol>

<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
                <div id="comments-nav-below" class="comments-navigation">
                        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
            </div>
<?php endif; ?>
                </div>
<?php endif;  ?>

<?php if ( ! empty($comments_by_type['pings']) ) : ?>
                <div id="trackbacks-list" class="comments">
                    <h4><?php printf($ping_count > 1 ? esc_html__('<span>%d</span> Trackbacks', 'fundingpress') : esc_html__('<span>One</span> Trackback', 'fundingpress'), $ping_count) ?></h4>

                    <ol>
<?php wp_list_comments('type=pings&callback=funding_custom_pings'); ?>
                    </ol>
                </div>
<?php endif  ?>
<?php endif ?>

<?php if ( 'open' == $post->comment_status ) : ?>
                <div id="respond">
                    <h4><?php comment_form_title( esc_html__('Leave a comment', 'fundingpress'), esc_html__('Post a Reply to %s', 'fundingpress') ); ?></h4>
                    <div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
                    <p id="login-req"><?php printf(esc_html__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'fundingpress'),
                    get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>
<?php else : ?>
                    <div class="formcontainer">
                        <form id="commentform" action="<?php echo esc_url(get_option('siteurl')); ?>/wp-comments-post.php" method="post">
<?php if ( $user_ID ) : ?>
<?php else : ?>
                            <p id="comment-notes"><?php esc_html_e('Your email is <em>never</em> published nor shared.', 'fundingpress') ?> <?php if ($req) esc_html_e('Required fields are marked <span class="required">*</span>', 'fundingpress') ?></p>
              <div id="form-section-author" class="form-section">
<div class="form-label"><label for="author"><?php esc_html_e('Name', 'fundingpress') ?> <?php if ($req) echo '<span class="required">*</span>'; ?></label></div>
                                <div class="form-input"><input id="author" name="author" type="text" value="<?php echo esc_attr($comment_author); ?>" size="30" maxlength="20" tabindex="3" /></div>
              </div>
              <div id="form-section-email" class="form-section">
                               <div class="form-label"><label for="email"><?php esc_html_e('Email', 'fundingpress') ?> <?php if ($req) echo '<span class="required">*</span>'; ?></label></div>
                                <div class="form-input"><input id="email" name="email" type="text" value="<?php echo esc_attr($comment_author_email); ?>" size="30" maxlength="50" tabindex="4" /></div>
              </div>
              <div id="form-section-url" class="form-section">
                                <div class="form-label"><label for="url"><?php esc_html_e('Website', 'fundingpress') ?></label></div>
                                <div class="form-input"><input id="url" name="url" type="text" value="<?php echo esc_url($comment_author_url); ?>" size="30" maxlength="50" tabindex="5" /></div>
              </div>
<?php endif /* if ( $user_ID ) */ ?>
              <div id="form-section-comment" class="form-section">
                                <div class="form-textarea">
                                    <div class="form-label"><label for="author"><?php esc_html_e('Comment', 'fundingpress') ?></label></div>
                                    <textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea></div>
              </div>
<?php do_action('comment_form', $post->ID); ?>
                            <div class="form-submit"><input id="submit" name="submit"  class="button-small button-green" type="submit" value="<?php esc_html_e('Post', 'fundingpress') ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo esc_attr($id); ?>" /></div>
<?php comment_id_fields(); ?>

                        </form>
                    </div>
<?php endif  ?>
                </div>
<?php endif  ?>
            </div>