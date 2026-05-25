<?php
$component_name = 'Table from Data';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Table from Data</h2>
    <div class="component-ref">\k1lib\html\bootstrap\table_from_data &rarr; src/klan1/html/bootstrap/table_from_data.php</div>

    <div class="preview-label">Basic Table</div>
    <div class="preview-box">
        <?php
        $data = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'User'],
            ['name' => 'Bob Wilson', 'email' => 'bob@example.com', 'role' => 'Editor'],
        ];
        $columns = ['name', 'email', 'role'];
        $table = new \k1lib\html\bootstrap\table_from_data($data, $columns, 'users-table');
        echo $table->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$data</span> = [
    [<span class="textsuccess">'name'</span> => <span class="textsuccess">'John'</span>, <span class="textsuccess">'email'</span> => <span class="textsuccess">'john@example.com'</span>],
    [<span class="textsuccess">'name'</span> => <span class="textsuccess">'Jane'</span>, <span class="textsuccess">'email'</span> => <span class="textsuccess">'jane@example.com'</span>],
];
<span class="textwarning">$columns</span> = [<span class="textsuccess">'name'</span>, <span class="textsuccess">'email'</span>];
<span class="textwarning">$table</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\table_from_data(<span class="textwarning">$data</span>, <span class="textwarning">$columns</span>);
<span class="textwarning">echo</span> <span class="textwarning">$table</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
