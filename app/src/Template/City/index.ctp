<div>
    <p></p>
    <h3>List City</h3>
    <table>
    <thead>
        <tr>
            <th>NAME</th>
            <th>CITYCODE</th>
            <th>PREFECTURE ID</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data->toArray() as $city): ?>
        <tr>
       
            <td><?= h($city->name) ?></td>
            <td><?= h($city->citycode) ?></td>
            <td><?= h($city->prefecture_id) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>