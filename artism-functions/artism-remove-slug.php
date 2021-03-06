<?php
/**
 * Remove the slug from published post permalinks. Only affect our custom post type, though.
 */
function artism_remove_cpt_slug( $post_link, $post, $leavename ) {

    if ( 'artwork' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'artism_remove_cpt_slug', 10, 3 );


/**
 * Have WordPress match postname to any of our public post types (post, page, race)
 * All of our public post types can have /post-name/ as the slug, so they better be unique across all posts
 * By default, core only accounts for posts and pages where the slug is /post-name/
 */
function artism_parse_request_trick( $query ) {

    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;

    // Only loop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'page', 'artwork' ) );
    }
}
add_action( 'pre_get_posts', 'artism_parse_request_trick' );
