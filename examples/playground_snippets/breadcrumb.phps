use k1lib\html\bootstrap\components\breadcrumb;
use k1lib\html\html_document;

$doc = new html_document();
$breadcrumb = new breadcrumb();
$breadcrumb->add_item('Home', '#');
$breadcrumb->add_item('Library', '#');
$breadcrumb->add_item('Data');
$doc->body()->append_child($breadcrumb);
echo $doc->generate();
