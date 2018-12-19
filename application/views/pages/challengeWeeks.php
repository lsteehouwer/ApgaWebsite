<main>
    <h1>Challenges</h1>
    <p>De challenges zijn per week samengesteld, ga dus naar de pagina voor de bijbehorden week om een challenge te vinden.</p>
    <ul>
    <?php for ($i = 1; $i < 10; $i++): ?>
        <li><a href="<?php echo site_url('challenges/'.$i); ?>">Challenges Week: <?php echo $i ?></a></li>
    <?php endfor; ?>
    </ul>
</main>