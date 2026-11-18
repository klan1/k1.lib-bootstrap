use k1lib\html\bootstrap\components\grid;
use k1lib\html\html_document;

$doc = new html_document();
$grid = new grid(2, 3);
$grid->row(1)->cell(1)->set_value('Row 1 Col 1');
$grid->row(1)->cell(2)->set_value('Row 1 Col 2');
$grid->row(1)->cell(3)->set_value('Row 1 Col 3');
$grid->row(2)->cell(1)->set_value('Row 2 Col 1');
$grid->row(2)->cell(2)->set_value('Row 2 Col 2');
$grid->row(2)->cell(3)->set_value('Row 2 Col 3');
$doc->body()->append_child($grid);
echo $doc->generate();
