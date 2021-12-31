<?php
// $comments = get_comments();
if ( post_password_required() ) {
	return;
}

echo '<h2>'.$wp_query->comment_count.' Comments "'.$post->post_title.'"</h2>';
?>
<div class="commautor">
    <div class="comtop"><textarea class="txt" placeholder="Comment.."></textarea><button class="secom">Post
            Comment</button></div>
</div>
<?php
// print_r($_comments);
function commrepartor($argo){
    $commm = '';
    foreach($argo as $com){
        
        $vooducom="<li class='commautor' id=".$com->comment_ID."><img src=".get_avatar_data($com->user_id)['url']."><div>
        <span class='nm'>$com->comment_author</span>
        <span class='ago'>".human_time_diff(strtotime($com->comment_date), current_time( 'timestamp' ) )." ago</span>
            <div class='comm'>$com->comment_content</div>
            <div class='rep'>Reply</div>
        </div></li>";

        if(!empty($com->get_children())){
            $vooducom=$vooducom.commrepartor($com->get_children());
        }
        $commm=$vooducom.$commm;
    }
    
    return "<ul>$commm</ul>";
}



echo commrepartor($_comments);

// print_r($_comments);


?>