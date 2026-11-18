use k1lib\html\bootstrap\components\form_select;
use k1lib\html\html_document;

$doc = new html_document();

// [Klan1-Developer IA] Default from the Bootstrap docs
$select = new form_select('select', 'exampleSelect');
$select->set_attrib('aria-label', 'Default select example');
$select->append_option(NULL, 'Open this select menu', TRUE);
$select->append_option('1', 'One');
$select->append_option('2', 'Two');
$select->append_option('3', 'Three');
$doc->body()->append_child($select);

// [Klan1-Developer IA] Sizing from the Bootstrap docs
$large = new form_select('select', 'largeSelect', 'lg');
$large->append_option(NULL, 'Open this select menu', TRUE);
$large->append_option('1', 'One');
$doc->body()->append_child($large);

$small = new form_select('select', 'smallSelect', 'sm');
$small->append_option(NULL, 'Open this select menu', TRUE);
$small->append_option('1', 'One');
$doc->body()->append_child($small);

// [Klan1-Developer IA] Multiple from the Bootstrap docs
$multiple = new form_select('select', 'multipleSelect', null, true);
$multiple->append_option(NULL, 'Open this select menu', TRUE);
$multiple->append_option('1', 'One');
$multiple->append_option('2', 'Two');
$doc->body()->append_child($multiple);

// [Klan1-Developer IA] Size attribute from the Bootstrap docs
$size = new form_select('select', 'sizeSelect');
$size->set_attrib('size', '3');
$size->append_option(NULL, 'Open this select menu', TRUE);
$size->append_option('1', 'One');
$doc->body()->append_child($size);

// [Klan1-Developer IA] Disabled from the Bootstrap docs
$disabled = new form_select('select', 'disabledSelect', null, false, true);
$disabled->append_option(NULL, 'Open this select menu', TRUE);
$disabled->append_option('1', 'One');
$doc->body()->append_child($disabled);

echo $doc->generate();
