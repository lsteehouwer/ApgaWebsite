<nav>
    <ul>
        <li>
            <a href="<?php echo site_url('')?>">Hoofdranking</a>
        </li>
        <li>
            <a href="<?php echo site_url('challengeWeeks'); ?>">Challenges</a>
            <ul>
            <?php for($i = 1; $i <= 9; $i++): ?>
                <li>
                    <a href="<?php echo site_url('challenges/'.$i); ?>">
                        Week <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
            </ul>
        </li>
        <li>
            <a href="<?php echo site_url('spelregels');?>">Spelregels</a>
        </li>
        <li>
            <a href="http://www.cs.uu.nl/docs/vakken/b3apga/">Vaksite</a>
        </li>
    </ul>
</nav>