<?php

/**
 * It fetches the reaction count from the database and displays the reaction buttons
 * 
 * @param content The content of the post.
 * 
 * @return The content of the post.
 */
function cpm_reactions_system($content)
{
   /* Creating a new instance of the CPM_DB class and getting the post ID. */
    $cpm_db = new CPM_DB;
    $post_id = get_the_ID();
/* Fetching the reaction count from the database. */
    $like_reactions = $cpm_db->cpm_reaction_count($post_id, 1);
    $heart_reactions = $cpm_db->cpm_reaction_count($post_id, 2);
    $laugh_reactions = $cpm_db->cpm_reaction_count($post_id, 3);
    $angry_reactions = $cpm_db->cpm_reaction_count($post_id, 4);

    // Make sure single post is being viewed.
    if (is_single()) {

        $reactions_wrap_start = '<div class="cpm-reactions-container emoji-reactions">';
     
          $like_reaction = '';
          $like_reaction .= '<div class="cpm-reaction-icon-box cpm-like-reaction">';
          $like_reaction .= '<a href="javascript:" onclick="cpm_save_reaction_ajax(' . $post_id . ',1)" class="cpm-reaction">';
          $like_reaction .= '<span class="cpm-reaction-icon ' . ($like_reactions == 1 ? 'highlighted' : '') . ' hover-text-like" like-data-text="Like"><img src="' . CPM_PLUGIN_DIR . 'assets/img/emoji_like_1.png" alt="Like Reaction"></span>';
          $like_reaction .= '<span id="cpmR1" class="cpm-reaction-count">' . $like_reactions . '</span>';
          $like_reaction .= '</a></div></div>';
      
    
      
      




        ////////////////////////
        $reactions_wrap_start = '<div class="cpm-reactions-container emoji-reactions">';
        //Like Reaction Button
        $like_reaction = '<div class="cpm-reaction-icon-box cpm-like-reaction">';
        $like_reaction .= '<a href="javascript:" onclick="cpm_save_reaction_ajax(' . $post_id . ',1)" class="cpm-reaction">';

        $like_reaction .= '<span class="cpm-reaction-icon hover-text-like" like-data-text="Like"><img src="' . CPM_PLUGIN_DIR . 'assets/img/emoji_like_1.png" alt="Like Reaction"  class="'.($like_reactions == 1 ? 'highlighted' : '').'"></span>';

        $like_reaction .= '<span id="cpmR1" class="cpm-reaction-count">' . $like_reactions . '</span>';
        $like_reaction .= '</a>'.'</div>';

        //Love Reaction Button
        $love_reaction = '<div class="cpm-reaction-icon-box cpm-love-reaction">';
        $love_reaction .= '<a href="javascript:" onclick="cpm_save_reaction_ajax(' . $post_id . ',2)" class="cpm-reaction">';

        $love_reaction .= '<span class="cpm-reaction-icon hover-text-love" love-data-text="Love"><img src="' . CPM_PLUGIN_DIR . '/assets/img/emoji_love_1.png" alt="Like Reaction"></span>';

        $love_reaction .= '<span id="cpmR2" class="cpm-reaction-count">' . $heart_reactions . '</span>';
        $love_reaction .= '</a>'.'</div>';

        //Laugh Reaction Button
        $laugh_reaction = '<div class="cpm-reaction-icon-box cpm-laugh-reaction">';
        $laugh_reaction .= '<a href="javascript:" onclick="cpm_save_reaction_ajax(' . $post_id . ',3)" class="cpm-reaction">';

        $laugh_reaction .= '<span class="cpm-reaction-icon hover-text-laugh" laugh-data-text="Laugh"><img src="' . CPM_PLUGIN_DIR . '/assets/img/emoji_laugh_1.png" alt="Like Reaction"></span>';

        $laugh_reaction .= '<span id="cpmR3" class="cpm-reaction-count">' . $laugh_reactions . '</span>';
        $laugh_reaction .= '</a>'.'</div>';

        //Angry Reaction Button
        $angry_reaction = '<div class="cpm-reaction-icon-box cpm-angry-reaction">';
        $angry_reaction .= '<a href="javascript:" onclick="cpm_save_reaction_ajax(' . $post_id . ',4)" class="cpm-reaction">';

        $angry_reaction .= '<span class="cpm-reaction-icon hover-text-angry" angry-data-text="angry"><img src="' . CPM_PLUGIN_DIR . '/assets/img/emoji_angry_1.png" alt="Like Reaction"></span>';

        $angry_reaction .= '<span id="cpmR4" class="cpm-reaction-count">' . $angry_reactions . '</span>';

        $angry_reaction .= '</a>'.'</div>';

        $reactions_wrap_end = '</div>';
        $cpm_ajax_response = '<div id="cpmAjaxResponse" class="cpm-ajax-response"><span></span></div>';
        $content .= $reactions_wrap_start;
        $content .= $like_reaction;
        $content .= $love_reaction;
        $content .= $laugh_reaction;
        $content .= $angry_reaction;
        $content .= $reactions_wrap_end;
        $content .= $cpm_ajax_response;

    }
    return $content;
}

add_filter('the_content', 'cpm_reactions_system');