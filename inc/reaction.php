<?php

function cpm_reactions_system($content) {
    
    $cpm_db = new CPM_DB;
    //fetch Stats for reactions
    $post_id = get_the_ID();
    $like_reactions = $cpm_db->cpm_reaction_count($post_id, 1);
    // $like_reactions = cpm_format_reaction_numbers($like_reactions);
    $heart_reactions = $cpm_db->cpm_reaction_count($post_id, 2);
    // $heart_reactions = cpm_format_reaction_numbers($heart_reactions);
    $laugh_reactions = $cpm_db->cpm_reaction_count($post_id, 3);
    // $laugh_reactions = cpm_format_reaction_numbers($laugh_reactions);
    $angry_reactions = $cpm_db->cpm_reaction_count($post_id, 4);
    // $angry_reactions = cpm_format_reaction_numbers($angry_reactions);


    // Make sure single post is being viewed.
    if(is_single()) {

                $reactions_wrap_start = '<div class="cpm-reactions-container emoji-reactions">';
           

            //Like Reaction Button
            $like_reaction = '<div class="cpm-reaction-icon-box cpm-like-reaction">';
                $like_reaction .= '<a href="javascript:" onclick="cpm_save_reaction_ajax('.$post_id.',1)" class="cpm-reaction">';
                        $like_reaction .= '<span class="cpm-reaction-icon hover-text-like" like-data-text="Like"><img src="'.CPM_PLUGIN_DIR.'assets/img/emoji_like_1.png" alt="Like Reaction"></span>';
                        $like_reaction .= '<span id="cpmR1" class="cpm-reaction-count">'.$like_reactions.'</span>';       
                        // $like_reaction .= '<span class="cpm-reation-tooltip">like</span>';
             
                $like_reaction .= '</a>';
            $like_reaction .= '</div>';

            //Love Reaction Button
            $love_reaction = '<div class="cpm-reaction-icon-box cpm-love-reaction">';
                $love_reaction .= '<a href="javascript:" onclick="cpm_save_reaction_ajax('.$post_id.',2)" class="cpm-reaction">';

                        $love_reaction .= '<span title="love" class="cpm-reaction-icon hover-text-love" love-data-text="Love"><img src="'.CPM_PLUGIN_DIR.'/assets/img/emoji_love_1.png" alt="Like Reaction"></span>';
             
               
                        $love_reaction .= '<span id="cpmR2" class="cpm-reaction-count">'.$heart_reactions.'</span>';
                  
               
                        // $love_reaction .= '<span class="cpm-reation-tooltip">love</span>';
                  

                $love_reaction .= '</a>';
            $love_reaction .= '</div>';

            //Laugh Reaction Button
            $laugh_reaction = '<div class="cpm-reaction-icon-box cpm-laugh-reaction">';
                $laugh_reaction .= '<a href="javascript:" onclick="cpm_save_reaction_ajax('.$post_id.',3)" class="cpm-reaction">';

                   
                        $laugh_reaction .= '<span title="laugh" class="cpm-reaction-icon hover-text-laugh" laugh-data-text="Laugh"><img src="'.CPM_PLUGIN_DIR.'/assets/img/emoji_laugh_1.png" alt="Like Reaction"></span>';
                
                
                        $laugh_reaction .= '<span id="cpmR3" class="cpm-reaction-count">'.$laugh_reactions.'</span>';
                 
               
                        // $laugh_reaction .= '<span class="cpm-reation-tooltip">laugh</span>';
                 

                $laugh_reaction .= '</a>';
            $laugh_reaction .= '</div>';


            //Angry Reaction Button
            $angry_reaction = '<div class="cpm-reaction-icon-box cpm-angry-reaction">';
                $angry_reaction .= '<a href="javascript:" onclick="cpm_save_reaction_ajax('.$post_id.',4)" class="cpm-reaction">';

                 
                        $angry_reaction .= '<span title="angry" class="cpm-reaction-icon hover-text-angry" angry-data-text="angry"><img src="'.CPM_PLUGIN_DIR.'/assets/img/emoji_angry_1.png" alt="Like Reaction"></span>';
                 
                
                        $angry_reaction .= '<span id="cpmR4" class="cpm-reaction-count">'.$angry_reactions.'</span>';
              
                  
                        // $angry_reaction .= '<span class="cpm-reation-tooltip">angry</span>';
                 

                $angry_reaction .= '</a>';
            $angry_reaction .= '</div>';
        
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

