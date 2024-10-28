<?php
class BankAccount {
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $balance = 0) {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount > $this->balance) {
            echo "Insufficient funds\n";
        } else {
            $this->balance -= $amount;
        }
    }

    public function getBalance() {
        return $this->balance;
    }
}

// Example Usage
$account = new BankAccount("12345678", 1000);
$account->deposit(500);
echo "Balance after deposit: " . $account->getBalance() . "\n";
$account->withdraw(300);
echo "Balance after withdrawal: " . $account->getBalance() . "\n";
?>
