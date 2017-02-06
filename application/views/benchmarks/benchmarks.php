<!--
This is the View for getting benchmark times. It was written
using a CodeIgnitor tutorial found here:- https://codeigniter.com/userguide2/libraries/benchmark.html.
-->

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

<p>
    <?php
        echo $this->benchmark->memory_usage();
    ?>
</p>
