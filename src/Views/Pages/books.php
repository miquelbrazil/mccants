<h1>The McCant's Boys Can Book Series</h1>

<?php $books = $books ?? []; if (count($books) > 0): ?>
<ul>
    <?php $bookPrefix = "The McCant's Boys Can: "; foreach($books as $id => $book): ?>
    <li><a href="book/<?= $id + 1 ?>"><?= $bookPrefix . $book["title"] ?></a></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<footer>
    <ul>
        <li><a href="/">Home</li>
    </ul>
</footer>