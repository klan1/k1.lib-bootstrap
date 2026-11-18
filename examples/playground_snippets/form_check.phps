use k1lib\html\bootstrap\components\form_check;
use k1lib\html\html_document;

$doc = new html_document();

// [Klan1-Developer IA] Checkboxes from the Bootstrap docs
$default_check = new form_check('Default checkbox', 'flexCheckDefault', '', 'checkbox', 'flexCheckDefault');
$checked_check = new form_check('Checked checkbox', 'flexCheckChecked', '', 'checkbox', 'flexCheckChecked', true);
$indeterminate_check = new form_check('Indeterminate checkbox', 'flexCheckIndeterminate', '', 'checkbox', 'flexCheckIndeterminate');
$indeterminate_check->set_indeterminate(true);
$disabled_check = new form_check('Disabled checkbox', 'flexCheckDisabled', '', 'checkbox', 'flexCheckDisabled');
$disabled_check->set_disabled(true);
$checked_disabled_check = new form_check('Checked disabled checkbox', 'flexCheckCheckedDisabled', '', 'checkbox', 'flexCheckCheckedDisabled', true);
$checked_disabled_check->set_disabled(true);
$doc->body()->append_child($default_check);
$doc->body()->append_child($checked_check);
$doc->body()->append_child($indeterminate_check);
$doc->body()->append_child($disabled_check);
$doc->body()->append_child($checked_disabled_check);

// [Klan1-Developer IA] Radios from the Bootstrap docs
$radio_1 = new form_check('Default radio', 'flexRadioDefault', '', 'radio', 'flexRadioDefault1');
$radio_2 = new form_check('Checked radio', 'flexRadioDefault', '', 'radio', 'flexRadioDefault2', true);
$doc->body()->append_child($radio_1);
$doc->body()->append_child($radio_2);

// [Klan1-Developer IA] Switches from the Bootstrap docs
$switch = new form_check('Switch checkbox', 'flexSwitchCheckDefault', '', 'checkbox', 'flexSwitchCheckDefault');
$switch->set_switch(true);
$switch_disabled = new form_check('Disabled switch', 'flexSwitchCheckDisabled', '', 'checkbox', 'flexSwitchCheckDisabled');
$switch_disabled->set_switch(true)->set_disabled(true);
$doc->body()->append_child($switch);
$doc->body()->append_child($switch_disabled);

// [Klan1-Developer IA] Inline checks from the Bootstrap docs
$inline_1 = new form_check('Inline checkbox', 'flexCheckInline', '', 'checkbox', 'flexCheckInline1');
$inline_1->set_inline(true);
$inline_2 = new form_check('Inline radio', 'flexRadioInline', '', 'radio', 'flexRadioInline1');
$inline_2->set_inline(true);
$doc->body()->append_child($inline_1);
$doc->body()->append_child($inline_2);

echo $doc->generate();
