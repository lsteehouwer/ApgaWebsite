<main>
    <h1><?php echo $title; ?></h1>
    <?php foreach($challenges as $index => $challenge): ?>
        <h2 id="<?php echo $challenge['letter']; ?>" ><?php printf("Challenge %s-%s", $challenge['week'], $challenge['letter']); ?> </h2>
        <?php echo $challenge['description'];?>
        
        <?php if(empty($challenge['scores'])): ?>
            <h3>Nog geen resultaten beschikbaar</h3>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th class="numeric rank" >#</th>
                    <th class="alpha username">Username</th>
                    <th class="numeric score">Score</th>
                </tr>
            </thead>
            <tbody>
            <?php $rank = 1; ?>
            <?php foreach($challenge['scores'] as $i => $score): ?>
                <tr>
                    <td class="numeric rank"><?php echo $rank; ?></td>
                    <td class="alpha username"><?php echo $score['username']; ?></td>
                    <td class="numeric score"><?php echo $score['score']; ?></td>
                    <?php 
                        if ($i + 1 < count($challenge['scores']) &&
                            $score['score'] != $challenge['scores'][$i + 1]['score'])
                        {
                            $rank = $i + 2;
                        }
                    ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    <?php endforeach; ?>
</main>