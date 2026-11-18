use k1lib\html\bootstrap\components\pagination;
use k1lib\html\html_document;

$doc = new html_document();

// [Klan1-Developer IA] Default from the Bootstrap docs
$pagination = new pagination(3, 10, '/docs/');
$doc->body()->append_child($pagination);

// [Klan1-Developer IA] Alignment from the Bootstrap docs
$centered = new pagination(3, 10, '/docs/');
$centered->set_alignment('center');
$doc->body()->append_child($centered);

// [Klan1-Developer IA] Sizing from the Bootstrap docs
$large = new pagination(3, 10, '/docs/');
$large->set_size('lg');
$doc->body()->append_child($large);

echo $doc->generate();
