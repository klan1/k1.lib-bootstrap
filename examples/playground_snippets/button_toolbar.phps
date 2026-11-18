use k1lib\html\bootstrap\components\button;
use k1lib\html\bootstrap\components\button_group;
use k1lib\html\bootstrap\components\button_toolbar;
use k1lib\html\html_document;

$doc = new html_document();
$toolbar = new button_toolbar('Example toolbar');
$group_1 = new button_group();
$group_1->add_button(new button('Left'));
$group_1->add_button(new button('Middle'));
$toolbar->add_group($group_1, 'me-2');
$group_2 = new button_group();
$group_2->add_button(new button('Right'));
$toolbar->add_group($group_2);
$doc->body()->append_child($toolbar);
echo $doc->generate();
