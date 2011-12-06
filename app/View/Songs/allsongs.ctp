
<h3>All Songs</h3>
<table>
    <tr>
        <th>oOo</th>
        <th>oOo</th>
        <th>oOo</th>
    </tr>
    <?php foreach ($songs as $song): ?>
    <tr>
        <td><? 
            // Fixme - format in mysql
            echo date("M-d-y H:i:s", strtotime($song['Song']['created'])); 
        ?></td>
        <td>
            <?
            $parts = json_decode($song['Song']['arrangement'], true);
            $debug = $parts['_debug'];
            unset($parts['_debug']);

            foreach ($parts as $k=>$v) {
                print "<strong>$k</strong> <em>$v</em><br/>";
            }
            ?>
        </td>
        <td>
            <?
            foreach ($debug as $k=>$v) {
                print "&nbsp;&nbsp;&nbsp;&nbsp;<small>$k: '<em>$v</em>'</small><br />";
            }
            ?>
        </td>
    </tr>
    <? endforeach; ?>
</table>
