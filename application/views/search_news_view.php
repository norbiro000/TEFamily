<?php 
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('search_news/getData');
echo form_label('Search : ');
//echo form_input('search');
$options = array(
                  'news_newsid'  => 'News ID',
                  'news_topic'    => 'Topic',
                  'news_details'   => 'Details',
                );
echo form_dropdown('shirts', $options, 'large');

echo "<input type='text' name='search'>";
echo "<div class='error_msg'>";
if (isset($message_display)) {
echo $message_display;
}
echo "</div>";
echo form_submit('submit', 'search');
echo form_close();
 ?>