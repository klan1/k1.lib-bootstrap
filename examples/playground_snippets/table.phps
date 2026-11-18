use k1lib\html\bootstrap\components\table_from_data;
use k1lib\html\html_document;

$doc = new html_document();

// [Klan1-Developer IA] Striped + hover (default) from the Bootstrap docs
$table = new table_from_data();
$table->set_data([
    ['name' => 'Name', 'email' => 'Email'],
    ['name' => 'Ana', 'email' => 'ana@example.com'],
    ['name' => 'Luis', 'email' => 'luis@example.com'],
]);
$doc->body()->append_child($table);

// [Klan1-Developer IA] Bordered + dark from the Bootstrap docs
$bordered = new table_from_data('table mb-0');
$bordered->set_data([
    ['name' => 'Name', 'email' => 'Email'],
    ['name' => 'Ana', 'email' => 'ana@example.com'],
    ['name' => 'Luis', 'email' => 'luis@example.com'],
]);
$bordered->set_bordered(true)->set_dark(true);
$doc->body()->append_child($bordered);

echo $doc->generate();
