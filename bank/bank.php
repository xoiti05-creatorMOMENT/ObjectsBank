<?php
include "classes/Account.php";
include "classes/Customer.php";
include "includes/header.php";

$accounts = [
    new Account("1001", "Savings", 15000),
    new Account("1002", "Checking", -500),
    new Account("1003", "Payment", 200),
    new Account("1004", "Deposit", 50000)
];

$customer = new Customer("Ericson", "Galang", $accounts);
?>

<h2>Name: <?php echo $customer->getFullName(); ?></h2>

<table>
    <tr>
        <th>Account Number</th>
        <th>Account Type</th>
        <th>Balance</th>
    </tr>

    <?php foreach ($customer->accounts as $account): ?>
        <tr>
            <td><?php echo $account->accountNumber; ?></td>
            <td><?php echo $account->accountType; ?></td>

            <?php if ($account->balance >= 0): ?>
                <td class="credit">₱<?php echo number_format($account->balance, 2); ?></td>
            <?php else: ?>
                <td class="overdrawn">₱<?php echo number_format($account->balance, 2); ?></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

<?php include "includes/footer.php"; ?>