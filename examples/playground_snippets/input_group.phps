use k1lib\html\bootstrap\components\button;
use k1lib\html\bootstrap\components\form_control;
use k1lib\html\bootstrap\components\form_select;
use k1lib\html\bootstrap\components\form_textarea;
use k1lib\html\bootstrap\components\input_group;
use k1lib\html\html_document;
use k1lib\html\input;
use k1lib\html\span;

$doc = new html_document();

// [Klan1-Developer IA] Basic example: addon before
$group = new input_group();
$group->add_addon('@', 'before');
$group->add_control(new form_control('text', 'username', '', 'username', 'Username'));
$doc->body()->append_child($group);

// [Klan1-Developer IA] Addon after
$group = new input_group();
$group->add_control(new form_control('text', 'recipient', '', 'recipient', "Recipient's username"));
$group->add_addon('@example.com', 'after');
$doc->body()->append_child($group);

// [Klan1-Developer IA] Addons on both sides
$group = new input_group();
$group->add_addon('$', 'before');
$group->add_control(new form_control('text', 'amount', '', 'amount', ''));
$group->add_addon('.00', 'after');
$doc->body()->append_child($group);

// [Klan1-Developer IA] Button
$group = new input_group();
$group->add_control(new form_control('text', 'search', '', 'search', 'Search'));
$group->add_button(new button('Button'));
$doc->body()->append_child($group);

// [Klan1-Developer IA] Select
$group = new input_group();
$select = new form_select('pref');
$select->set_options(['1' => 'One', '2' => 'Two'], '1');
$group->add_control($select);
$doc->body()->append_child($group);

// [Klan1-Developer IA] Textarea
$group = new input_group();
$group->add_addon('With textarea', 'before');
$group->add_control(new form_textarea('comments'));
$doc->body()->append_child($group);

// [Klan1-Developer IA] Checkbox addon
$group = new input_group();
$checkbox_addon = new span('input-group-text');
$checkbox_addon->append_child(new input('checkbox', 'check1', '', NULL, 'check1'));
$group->append_child_head($checkbox_addon);
$group->add_control(new form_control('text', 'text1', '', 'text1', 'Text'));
$doc->body()->append_child($group);

// [Klan1-Developer IA] Sizing
$group = new input_group('lg');
$group->add_addon('@', 'before');
$group->add_control(new form_control('text', 'lg', '', 'lg', 'Large'));
$doc->body()->append_child($group);

$group = new input_group('sm');
$group->add_addon('@', 'before');
$group->add_control(new form_control('text', 'sm', '', 'sm', 'Small'));
$doc->body()->append_child($group);

echo $doc->generate();
