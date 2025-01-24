<h1>Your Order</h1>
<ul>
    <?php foreach($items as $item): ?>
    <li>
        <?= $item['product']['name']; ?> - Quantity: <?= $item['quantity']; ?> - Price: $<?= $item['product']['price']; ?>
    </li>
    <?php endforeach; ?>
</ul>
<p>Total: $<?= $total; ?></p>
<a href="/products"> Continue show menu </a>