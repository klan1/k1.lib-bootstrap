use k1lib\html\bootstrap\components\navbar;
use k1lib\html\html_document;

$doc = new html_document();
$navbar = new navbar('Brand');
$navbar->add_item('Home', '#', true);
$navbar->add_item('Link', '#');
$navbar->add_item('Disabled', '#', false, true);
$doc->body()->append_child($navbar);
echo $doc->generate();
