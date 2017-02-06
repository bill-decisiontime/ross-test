<p>
    <?php
        echo $this->benchmark->elapsed_time('dog', 'cat');
    ?>
</p>
<p>
    <?php
        echo $this->benchmark->elapsed_time('cat', 'bird');
    ?>
</p>
<p>
    <?php
        echo $this->benchmark->elapsed_time('dog', 'bird');
    ?>
</p>

<p>
    <?php
        echo $this->benchmark->elapsed_time();
    ?>
</p>
