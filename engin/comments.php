<?php
// =============================================================================
// COMMENTS.PHP
// -----------------------------------------------------------------------------
// Show the comments list of every custom Post Type - List and for blog posts.
// Show the comment form for write a new comment.
// =============================================================================

if (post_password_required()) {
	return;
}

$engin_args = array(
  'id_form'           => 'commentform',
  'class_form'      => 'form-box',
  'id_submit'         => 'submit',
  'class_submit'      => 'btn btn-default',
  'name_submit'       => 'submit',
  'title_reply'       => esc_attr__('Leave a Reply',"engin"),
  'title_reply_before' => '<hr class="space s"><hr><hr class="space s"><h4>',
  'title_reply_after' => '</h4>',
  'title_reply_to'    => esc_attr__('Leave a Reply to %s',"engin"),
  'cancel_reply_link' => esc_attr__('Cancel Reply',"engin"),
  'label_submit'      => esc_attr__('Post Comment',"engin"),
  'format'            => 'xhtml',
  'comment_field' =>  '<hr class="space xs"><p>' . esc_attr__('Comment',"engin") . '</p><textarea id="comment" name="comment" class="form-control"></textarea>',
  'must_log_in' => '<p class="must-log-in">' . sprintf('You must be <a href="%s">logged in</a> to post a comment.',wp_login_url( apply_filters( 'the_permalink', get_permalink()))) . '</p>',
  'logged_in_as' => '<p class="logged-in-as">' . sprintf('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( )))) . '</p>',
  'comment_notes_before' => '<p class="comment-notes">' . esc_attr__('Your email address will not be published.',"engin")  . '</p>',
  'comment_notes_after' => '<hr class="space s">',
  'fields' => apply_filters('comment_form_default_fields', array(
      'author' =>'<div class="row"><div class="col-md-4"><p>' . esc_attr__('Name',"engin") . '</p><input type="text" id="author" name="author" class="form-control" value=""></div>',
      'email' => '<div class="col-md-4"><p>' . esc_attr__('Email',"engin") . '</p><input type="text" id="email" name="email" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"></div>',
      'url' =>'<div class="col-md-4"><p>' . esc_attr__('Url',"engin") . '</p><input type="text" id="url" name="url" class="form-control" value=""></div></div><hr class="space s">',
   ))
);

function engin_comments_list($comment, $args, $depth) {
    $comment_type = get_comment_type();
    if ($comment_type == 'trackback' || $comment_type == 'pingback') { ?>
<div class="item row">
    <div class="col-md-12">
        <p class="name">
            <?php esc_attr_e( 'Pingback: ',"engin"); comment_author_link(); ?>
        </p>
    </div>
</div>
<?php } else { ?>
<div class="item row" id="div-comment-<?php comment_ID() ?>">
    <img src="<?php $tmp = get_avatar_data($comment); echo esc_url($tmp["url"]) ?>" class="col-md-1" />
    <div class="col-md-11">
        <?php
        $comment_author = ucfirst($comment->comment_author);
        $comment_txt = $comment->comment_content;
        ?>
        <p class="name">
						<?php echo (($comment_author == "") ? esc_attr__("A WordPress Commenter","engin"): sanitize_text_field($comment_author)) ?>
            <span>
                <?php echo esc_attr(get_comment_date()) ?>
            </span>
        </p>
        <p class="msg">
            <?php echo (($comment_txt == "") ? esc_attr__("This the comment text generated automatically by WordPress","engin"):$comment_txt) ?>
        </p>
        <div class="reply">
            <?php comment_reply_link(array('add_below' => 'div-comment', 'reply_text' => esc_attr__( 'Reply ',"engin") . '<span>&darr;</span>', 'depth' => $depth, 'max_depth' => 10)); ?>
        </div>
    </div>
</div>
<?php
    }
}
?>
<div id="comments" class="comments-area">
    <?php if (have_comments()) { ?>
    <div class="comments-container">
        <hr class="space s" />
        <hr />
        <hr class="space s" />
        <div class="comment-list">
            <?php
              $n = get_comments_number();
              $world = esc_attr__("comment","engin");
              if ($n > 1)  $world .= "s";
            ?>
            <h5>
                <?php echo get_comments_number() . " " . $world ?>
            </h5>
            <?php  wp_list_comments(array('callback' => 'engin_comments_list')); ?>
        </div>
        <div class="pagination pagination-sm">
            <?php paginate_comments_links(); ?>
        </div>
    </div>
    <?php }
          comment_form($engin_args);
    ?>
</div>
