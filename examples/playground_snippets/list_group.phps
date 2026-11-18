use k1lib\html\bootstrap\components\list_group;
use k1lib\html\html_document;

$doc = new html_document();

// [Klan1-Developer IA] Basic example from the Bootstrap docs
$list = new list_group([
    ['text' => 'Item 1', 'href' => '#'],
    ['text' => 'Item 2', 'href' => '#', 'active' => true],
    ['text' => 'Item 3'],
]);
$doc->body()->append_child($list);

// [Klan1-Developer IA] With badges from the Bootstrap docs
$badges = new list_group([
    ['text' => 'Item 1', 'href' => '#', 'badge' => '14'],
    ['text' => 'Item 2', 'href' => '#', 'badge' => '2'],
    ['text' => 'Item 3', 'href' => '#', 'badge' => '1'],
]);
$doc->body()->append_child($badges);

// [Klan1-Developer IA] Numbered from the Bootstrap docs
$numbered = new list_group([
    ['text' => 'Item 1', 'href' => '#'],
    ['text' => 'Item 2', 'href' => '#'],
    ['text' => 'Item 3', 'href' => '#'],
], false, true);
$doc->body()->append_child($numbered);

// [Klan1-Developer IA] Horizontal from the Bootstrap docs
$horizontal = new list_group([
    ['text' => 'Item 1', 'href' => '#'],
    ['text' => 'Item 2', 'href' => '#'],
    ['text' => 'Item 3', 'href' => '#'],
], false, false, true);
$doc->body()->append_child($horizontal);

echo $doc->generate();
