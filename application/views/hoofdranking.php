<main>
    <h1>Nieuws</h1>
        <ul>
	    <li>07-09-2018: We gaan weer van start!</li>
        </ul>
    <h1>Hoofdranking</h1>
    <p>Hier is het overzicht gegeven van de hoeveelheid verdiende punten totaal (alle challenges).</p>

    <?php if (isset($scores) && !empty($scores)): ?>
        <table>
            <thead>
                <tr>
                    <th class="numeric rank" >#</th>
                    <th class="alpha username">Username</th>
                    <th class="numeric score">Score</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $rank = 1;
             ?>
            <?php foreach($scores as $i => $score): ?>
                <tr>
                    <td class="numeric rank"><?php echo $rank; ?></td>
                    <td class="alpha username"><?php echo $score['username']; ?></td>
                    <td class="numeric score"><?php echo $score['score']; ?></td>
                </tr>
                <?php 
                    if ($i + 1 < count($scores) &&
                        $score['score'] != $scores[$i + 1]['score'])
                    {
                        $rank = $i + 2;
                    }
                ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <h2>Geen scores beschikbaar</h2>
    <?php endif; ?>
        
</main>
