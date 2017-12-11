<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Showtime $showtime
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Showtimes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="showtimes form large-9 medium-8 columns content">
     <?= $this->Form->create($planning) ?>
    <fieldset>
        <legend><?= __('planning') ?></legend>
        <?php
            echo $this->Form->control('salle', ['options' => $rooms]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php if(isset($films)): ?>
    <table class="vertical-table">
        <tr>
            <th scope="row">Liste des films : </th>
        <tr>
        
    </table>
    <table>
        <thead>
        <tr>
            <th scope="col">L</th>
            <th scope="col">M</th>
            <th scope="col">M</th>
            <th scope="col">J</th>
            <th scope="col">V</th>
            <th scope="col">S</th>
            <th scope="col">D</th>
        </tr>
        </thead>
    </table>
    <div id="contentBox" style="margin:0px auto; width:70%">
            <?php for($i=0;$i<7;$i++): ?>
                <table style="float:left; margin:0; width:14.2%;">
                    <?php 
                        if(isset($films[$i])):
                            foreach($films[$i] as $film): ?>
                            <tr>
                                <td>
                                    <?= h($film->movie->name ); ?></br>
                                    de <?= h($film->start->i18nFormat('HH:mm')); ?></br>
                                    à <?= h($film->end->i18nFormat('HH:mm')); ?></br>
                                </td>
                            </tr>
                          <?php endforeach;
                        else:
                            echo "<tr><td> Pas de film prévu </td></tr>";
                    endif;?>
            </table>
        <?php endfor;  ?>      
    </div>
<?php endif; ?>
