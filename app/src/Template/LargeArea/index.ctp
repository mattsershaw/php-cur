<div>
    <p></p>
    <h3>List Large area</h3>
    <table>
    <thead>
        <tr>
            <th>NAME</th>
            <th>PREFECTURE NAME</th>
            <th>PREFECTURE ID</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($large_area->toArray() as $obj): ?>
        <tr>
            <td><?= h($obj->name) ?></td>
            <td><?= h($obj->prefecture_name) ?></td>
            <td><?= h($obj->prefecture_id) ?></td>
            <td><a href="<?=$this->Url->build(['controller'=>'city','action'=>'index']); ?>?prefecture_id=<?=$obj->prefecture_id ?>">進む</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>