<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Pengguna</th>
            <th>Aktivitas</th>
            <th>Waktu</th>
            <th>IP Address</th>
            <th>Status Login</th>
            <th>Device</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['aktivitas']; ?></td>
            <td><?php echo $row['waktu']; ?></td>
            <td><?php echo $row['user_agent']; ?></td>
            <td><?php echo $row['ip_address']; ?></td>
            <td><?php echo $row['lokasi']; ?></td>
          
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
