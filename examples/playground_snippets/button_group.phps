use k1lib\html\bootstrap\components\button;
use k1lib\html\bootstrap\components\button_group;
use k1lib\html\html_document;

$doc = new html_document();
$group = new button_group();
$group->add_button(button::primary('Left'));
$group->add_button(button::primary('Middle'));
$group->add_button(button::primary('Right'));
$doc->body()->append_child($group);
echo $doc->generate();
