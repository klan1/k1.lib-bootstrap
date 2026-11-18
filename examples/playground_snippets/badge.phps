use k1lib\html\bootstrap\components\badge;
use k1lib\html\html_document;

$doc = new html_document();
$primaryBadge = new badge('Primary', 'primary');
$successBadge = new badge('Success', 'success', true);
$doc->body()->append_child($primaryBadge);
$doc->body()->append_child($successBadge);
echo $doc->generate();
