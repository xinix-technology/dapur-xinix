<div class="float-menu">
<h2>Modules</h2>
<?php $modules = f('app')->config('bono.middlewares')['Bono\Middleware\ControllerMiddleware']['mapping'] ?>
    <?php foreach($modules as $module => $v): ?>
    <a href="<?php echo URL::site($module) ?>">
        <?php echo $module ?>
    </a>
    <?php endforeach ?>
</div>

<h2>Hello Team!</h2>

<p>
    Ini adalah kumpulan schema yang bisa kalian gunakan pada saat mengerjakan projek. Apabila masih ada kekurangan dan butuh penambahan fitur, kalian bisa menghubungi Divisi Informasional. Disini sudah disediakan contoh dan cara pengunaannya. Semoga Bermanfaat :)
</p>

<p>
    Best regards,<br>
    Division IT Informational
</p>
