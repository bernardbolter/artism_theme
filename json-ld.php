<?php
$art_json_ld = get_post_meta($post->ID);
$art_title = get_the_title();
$art_array = array(
  '@context' => 'http://www.schema.org',
  '@type' => 'VisualArtwork',
  'name' => $art_title ? $art_title : false,
  'artMedium' => $art_json_ld['artMedium'][0] ? $art_json_ld['artMedium'][0] : false,
  'artworkSurface' => $art_json_ld['artworkSurface'][0] ? $art_json_ld['artworkSurface'][0] : false,
  'artform' => $art_json_ld['artform'][0] ? $art_json_ld['artform'][0] : false,
  'width' => $art_json_ld['width'][0] ? array('@type' => 'Distance', 'name' => $art_json_ld['width'][0]) : false,
  'height' => $art_json_ld['height'][0] ? array('@type' => 'Distance', 'name' => $art_json_ld['height'][0]) : false,
  'depth' => $art_json_ld['depth'][0] ? array('@type' => 'Distance', 'name' => $art_json_ld['depth'][0]) : false,
  'artEdition' => $art_json_ld['artEdition'][0] ? $art_json_ld['artEdition'][0] : false,
  'dateCreated' => $art_json_ld['dateCreated'][0] ? $art_json_ld['dateCreated'][0] : false,
  'creator' => $art_json_ld['creator'][0] ? array('@type' => 'Person', 'name' => $art_json_ld['creator'][0], 'sameAs' => 'http://www.bernardbolter.com') : false,
  'contributor' => $art_json_ld['contributor'][0] ? $art_json_ld['contributor'][0] : false,
  'contentLocation' => $art_json_ld['contentLocation'][0] ? $art_json_ld['contentLocation'][0] : false,
  'locationCreated' => $art_json_ld['locationCreated'][0] ? $art_json_ld['locationCreated'][0] : false,
  'headline' => $art_json_ld['headline'][0] ? $art_json_ld['headline'][0] : false,
  'about' => $art_json_ld['about'][0] ? $art_json_ld['about'][0] : false,
  'description' => $art_json_ld['description'][0] ? $art_json_ld['description'][0] : false,
  'genre' => $art_json_ld['genre'][0] ? $art_json_ld['genre'][0] : false,
  'keywords' => $art_json_ld['keywords'][0] ? $art_json_ld['keywords'][0] : false,
);

$art_array_filter = array_filter($art_array);

echo '<script type="application/ld+json">';
echo json_encode($art_array_filter);
echo '</script>';

?>
