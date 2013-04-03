<form action="<?php echo site_url('guestbook/post'); ?>" method="post" accept-charset="utf-8">

    <label>Nama : <input type="text" name="nama" value=""></label><br />
    <label>Email : <input type="text" name="email" value=""></label><br />
    <label for="komentar">Komentar</label><br />
    <textarea name="komentar" id="komentar"></textarea><br />

    <button type="submit">Bukutamu</button>
    
</form>

<hr />


<?php foreach($guestbooks->result() as $gb): ?>

Nama : <?php echo $gb->nama ?> <?php echo $gb->email; ?><br />
Waktu : <?php echo date('d m Y', $gb->waktu); ?><br />
Komentar : <?php echo $gb->comment; ?><br />

<?php endforeach; ?>