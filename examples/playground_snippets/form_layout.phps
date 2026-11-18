use k1lib\html\bootstrap\components\form_control;
use k1lib\html\html_document;
use k1lib\html\label;

$doc = new html_document();

// [Klan1-Developer IA] Form grid with gutters
$row = $doc->body()->append_div('row g-3 mb-3');
$first = $row->append_div('col-md-6');
$first->append_child(new label('Email', 'inputEmail4', 'form-label'));
$first->append_child(new form_control('email', 'email', '', 'inputEmail4'));
$last = $row->append_div('col-md-6');
$last->append_child(new label('Password', 'inputPassword4', 'form-label'));
$last->append_child(new form_control('password', 'password', '', 'inputPassword4'));

// [Klan1-Developer IA] Horizontal form
$h_row = $doc->body()->append_div('row mb-3');
$h_row->append_child(new label('Email', 'inputEmail3', 'col-sm-2 col-form-label'));
$h_col = $h_row->append_div('col-sm-10');
$h_col->append_child(new form_control('email', 'email3', '', 'inputEmail3'));

// [Klan1-Developer IA] Inline form
$inline = $doc->body()->append_div('row row-cols-lg-auto g-3 align-items-center');
$inline_col = $inline->append_div('col-12');
$inline_col->append_child(new label('Username', 'inlineUsername', 'visually-hidden'));
$inline_col->append_child(new form_control('text', 'username', '', 'inlineUsername', 'Username'));

echo $doc->generate();
