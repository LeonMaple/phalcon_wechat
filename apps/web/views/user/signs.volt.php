<h4> Hi <?php echo $user->name; ?> </h4>
<h4> Hi <?php echo $user->open_id; ?> </h4>
<div>
    <p>Your sign records </p>
    <ol>
        <?php foreach ($signs as $sign) { ?>
            <li><?php echo $sign->time; ?></li>
        <?php } ?>
    </ol>

</div>
