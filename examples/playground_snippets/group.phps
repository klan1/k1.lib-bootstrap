use k1lib\html\html_document;
use k1lib\html\div;
use k1lib\html\h1;
use k1lib\html\p;
use k1lib\html\bootstrap\components\navbar;
use k1lib\html\bootstrap\components\alert;
use k1lib\html\bootstrap\components\button;
use k1lib\html\bootstrap\components\card;
use k1lib\html\bootstrap\components\table_from_data;
use k1lib\html\bootstrap\components\badge;
use k1lib\html\bootstrap\components\progress;
use k1lib\html\bootstrap\components\modal;
use k1lib\html\bootstrap\components\accordion;
use k1lib\html\bootstrap\components\list_group;

$doc = new html_document();
$doc->head()->set_title('Bootstrap Kitchen Sink');
$body = $doc->body();

$navbar = new navbar('My App');
$navbar->add_item('Home', '#', true);
$navbar->add_item('Features', '#');
$navbar->add_item('Pricing', '#');
$body->append_child($navbar);

$container = new div('container py-4');
$body->append_child($container);

$welcome = new alert('Welcome to the Bootstrap kitchen sink!', 'primary');
$container->append_child($welcome);

$title = new h1('Dashboard');
$container->append_child($title);

$description = new p('Several Bootstrap components together.');
$container->append_child($description);

$row = new div('row');
$container->append_child($row);

$col1 = new div('col-md-6');
$row->append_child($col1);
$badge = new badge('New', 'danger');
$col1->append_child($badge);
$progress = new progress([['value' => 60, 'type' => 'success', 'label' => '60%']]);
$col1->append_child($progress);
$list = new list_group([
    ['text' => 'Item 1', 'href' => '#'],
    ['text' => 'Item 2', 'href' => '#', 'active' => true],
]);
$col1->append_child($list);

$col2 = new div('col-md-6');
$row->append_child($col2);
$card = new card('Card title', 'Subtitle', 'Card content with a button.');
$card->set_footer('Card footer');
$col2->append_child($card);

$modalTrigger = button::primary('Open Modal');
$modalTrigger->set_attrib('data-bs-toggle', 'modal');
$modalTrigger->set_attrib('data-bs-target', '#sinkModal');
$col2->append_child($modalTrigger);
$modal = new modal('Modal title', '<p>Modal body.</p>', ['id' => 'sinkModal', 'btn_ok' => 'OK']);
$col2->append_child($modal);

$table = new table_from_data();
$table->set_data([
    ['name' => 'Name', 'role' => 'Role'],
    ['name' => 'Ana', 'role' => 'Admin'],
    ['name' => 'Luis', 'role' => 'User'],
]);
$container->append_child($table);

$accordion = new accordion('sink');
$accordion->add_item('Section 1', '<p>Content 1</p>', 's1', true);
$accordion->add_item('Section 2', '<p>Content 2</p>', 's2');
$container->append_child($accordion);

echo $doc->generate();
