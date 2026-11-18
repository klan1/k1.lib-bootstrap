use k1lib\html\bootstrap\components\accordion;
use k1lib\html\html_document;

$doc = new html_document();
$accordion = new accordion('example');
$accordion->add_item('Section 1', '<p>Content 1</p>', 's1', true);
$accordion->add_item('Section 2', '<p>Content 2</p>', 's2');
$accordion->add_item('Section 3', '<p>Content 3</p>', 's3');
$doc->body()->append_child($accordion);
echo $doc->generate();
